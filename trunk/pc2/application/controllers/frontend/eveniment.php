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

           {heading_previous_cell}<th height = 35px; width= 30px; style="vertical-align: middle; text-align: center; border-right:1px solid #acb137; background-image: url('.IMAGES_PATH.'calendar/header_calendar.png); background-position: 0px 0px;" ><a href="' . site_url("lista-evenimente/01-" . $luna_ant . "-" . $an_ant) . '"><p class="t_calendar">&lt;</p></a></th>{/heading_previous_cell}
           {heading_title_cell}<th height = 35px; style="vertical-align: middle; text-align: center; background-image: url('.IMAGES_PATH.'calendar/header_calendar.png); background-position: -15px 0px;" colspan="{colspan}"><p class="t_calendar">{heading}</p></th>{/heading_title_cell}
           {heading_next_cell}<th height = 35px; width= 30px; style="vertical-align: middle; text-align: center; border-left:1px solid #acb137; background-image: url('.IMAGES_PATH.'calendar/header_calendar.png); background-position: -196px 0px;" ><a href="' . site_url("lista-evenimente/01-" . $luna_urm . "-" . $an_urm) . '"><p class="t_calendar">&gt;</p></a></th>{/heading_next_cell}

           {heading_row_end}</tr>{/heading_row_end}

           {week_row_start}<tr>{/week_row_start}
           {week_day_cell}<td class="calendar_c">{week_day}</td>{/week_day_cell}
           {week_row_end}</tr>{/week_row_end}

           {cal_row_start}<tr>{/cal_row_start}
           {cal_cell_start}<td class="calendar_c" style="color: black">{/cal_cell_start}

           {cal_cell_content}<a class="exista_eveniment" style="vertical-align: middle" href="{content}">{day}</a>{/cal_cell_content}
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
        $data['zi'] = $zi;
        $data['luna'] = $luna;
        $data['an'] = $an;


        //* evenimentele urmatoare *//
        $urm_evenimenteFinal = array();
        for ($i = 0; $i < 30; $i++) {
            $date2  = mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y"));
            $date2 = date("Y-m-d", $date2);
            $urm_evenimente = $this->resurse_model->getEvenimenteByDay($date2);

            if ($urm_evenimente != null) {
                foreach($urm_evenimente as $urm_eveniment) {
                    if ($i == 0 && $urm_eveniment['ora_sfarsit'] < (date("G") + 1))
                        continue;
                    $urm_eveniment['data'] = $date2;
                    $urm_evenimenteFinal[] = $urm_eveniment;
                }
            }
            if (count($urm_evenimenteFinal) >= 7)
                break;
        }


        $data['urmatoare'] = $urm_evenimenteFinal;
        //* end of evenimentele urmatoare *//

        $data['main_content'] = 'frontend/eveniment/lista';
        $this->load->view('frontend/template', $data);
    }
}

