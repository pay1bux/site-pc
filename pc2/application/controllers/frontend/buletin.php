<?php

class Buletin extends CI_Controller {

    function index() {

        $this->load->model('resurse_model');
        $filtru = array('tip' => 'buletin-duminical', 'order' => 'titlu', 'orderType' => 'DESC', 'limit' => 10);
        $buletine = $this->resurse_model->getResurseWithAtt($filtru);

        $data['main_content'] = 'frontend/resurse/buletin';
        $data['page_title'] = 'Biserica Penticostala Poarta Cerului, Timisoara - Buletin duminical';
        $data['buletine'] = $buletine;

        $this->load->view('frontend/template', $data);
    }
}
