<?php

class Eveniment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('resurse_model');
    }

    function lista($date = null) {
        if (!isset($date)) {
            $date = date("Y-m-d");
            $an = date("Y");
            $luna = date("m");
            $zi = date("d");
        } else {
            $componente = explode("-", $date);
            $date = $componente[2] . "-" . $componente[1] . "-" . $componente[0];
            $an = $componente[2];
            $luna = $componente[1];
            $zi = $componente[0];
        }
        if ($luna == 12) {
            $luna_urm = 1;
            $an_urm = $an + 1;
        } else {
            $luna_urm = $luna + 1;
            $an_urm = $an;
        }
        if ($luna == 1) {
            $luna_ant = 12;
            $an_ant = $an - 1;
        } else {
            $luna_ant = $luna - 1;
            $an_ant = $an;
        }
        $ziuaSaptamanii = date("w", mktime(0, 0, 0, $luna, $zi, $an));

        $evenimente = $this->resurse_model->getEvenimenteByDay($date);

        $data['evenimente'] = $evenimente;

        $this->lang->load('calendar', 'romana');
        $prefs = array (
            'start_day'    => 'monday',
            'show_next_prev'  => TRUE,
            'next_prev_url'   => 'http://example.com/index.php/calendar/show/'
        );
        $prefs['template'] = '

           {table_open}<table border="0" cellpadding="0" cellspacing="0" class="calendar-table">{/table_open}

           {heading_row_start}<tr>{/heading_row_start}

           {heading_previous_cell}<th><a href="' . site_url("lista-evenimente/01-" . $luna_ant . "-" . $an_ant) . '">&lt;&lt;</a></th>{/heading_previous_cell}
           {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
           {heading_next_cell}<th><a href="' . site_url("lista-evenimente/01-" . $luna_urm . "-" . $an_urm) . '">&gt;&gt;</a></th>{/heading_next_cell}

           {heading_row_end}</tr>{/heading_row_end}

           {week_row_start}<tr>{/week_row_start}
           {week_day_cell}<td>{week_day}</td>{/week_day_cell}
           {week_row_end}</tr>{/week_row_end}

           {cal_row_start}<tr>{/cal_row_start}
           {cal_cell_start}<td>{/cal_cell_start}

           {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
           {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

           {cal_cell_no_content}{day}{/cal_cell_no_content}
           {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

           {cal_cell_blank}&nbsp;{/cal_cell_blank}

           {cal_cell_end}</td>{/cal_cell_end}
           {cal_row_end}</tr>{/cal_row_end}

           {table_close}</table>{/table_close}
        ';
        $this->load->library('calendar', $prefs);
        $evenimenteLuna = array();
        for ($i = 1; $i <= cal_days_in_month(CAL_GREGORIAN, $luna, $an); $i++) {
            $evenimente = $this->resurse_model->getEvenimenteByDay($an . "-" . $luna . "-". $i);
            if (isset($evenimente))
                $evenimenteLuna[$i] = site_url("lista-evenimente/" . $i . "-" . $luna . "-" . $an);
        }
        $data['calendar'] = $this->calendar->generate($an, $luna, $evenimenteLuna);
        $data['ziuaSaptamanii'] = $ziuaSaptamanii;
        $data['data'] = $an . "-" . $luna . "-". $zi;

        $data['main_content'] = 'frontend/eveniment/lista';
        $this->load->view('frontend/template', $data);
    }
}

