<?php

class Cereri extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $logged_in = $this->session->userdata('logged_in');
        $email = $this->session->userdata('email');
        if ($logged_in == FALSE || !$this->user_model->checkDrept($email, 'administrare-cereri')) {
            redirect('login', 'refresh');
        }
    }

    function delete($idCerere = null) {
        if (isset($idCerere)) {
            $this->load->model('cerere_model');

            $this->cerere_model->destroy($idCerere);
        }
        redirect('admin/lista-cereri');
    }

    function tiparire($fromDate, $toDate) {
        $this->load->model('cerere_model');

        $filtru = array('fromDate' => $fromDate, 'toDate' => $toDate);
        $cereri = $this->cerere_model->getCereriAll($filtru);

        $this->load->library('Pdf');

        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetTitle('Cereri');
        $pdf->SetTopMargin(5);
        $pdf->setFooterMargin(5);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('poartacerului.ro');
        $pdf->SetDisplayMode('real', 'default');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $output = "<strong>Cereri rugaciune din data $fromDate in data $toDate</strong>";

        foreach($cereri as $cerere) {
            $output .= "<br /><br />Nume: " . $cerere['nume'] . ", Localitate: " . $cerere['localitate'] . ", Data: " . $cerere['data'];
            $output .= "<br />Continut: " . $cerere['continut'];
        }
        $pdf->PrintChapter($output, true);
        $pdf->Output('cereri-rugaciune.pdf', 'I');
    }

    function lista($page = 0) {
        $this->load->model('cerere_model');

        $filtru = array('count_rows' => 'true');

        $counter = $this->cerere_model->getCereriAll($filtru);
        $numar = $counter[0]['COUNT(*)'];

        $this->load->library('pagination');
        $config['per_page'] = 10;

        $filtru = array('limit' => $page, 'number' => $config['per_page']);
        $cereri = $this->cerere_model->getCereriAll($filtru);
        $data['cereri'] = $cereri;


        $config['base_url'] = site_url('admin/lista-cereri');
        $config['total_rows'] = $numar;

        $config['first_url'] = '0';
        $config['num_links'] = 3;
        $config['last_link'] = '';
        $config['first_link'] = '';
        $config['uri_segment'] = 3;
        $config['num_tag_open'] = '<div class="pagina_s">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<div class="pagina_a">';
        $config['cur_tag_close'] = '</div>';

        $config['prev_tag_open'] = '<div class="pagina_b">';
        $config['prev_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="pagina_b">';
        $config['next_tag_close'] = '</div>';


        $this->pagination->initialize($config);

        $data['paginare'] = $this->pagination->create_links();


        $data['main_content'] = 'admin/cereri/lista';
        $this->load->view('admin/template', $data);
    }

    function adaptArray($arr)
    {
        $arrayBun = array();
        foreach ($arr as $ar) {
            $arrayBun[$ar["id"]] = $ar["nume"];
        }
        return $arrayBun;
    }

}


