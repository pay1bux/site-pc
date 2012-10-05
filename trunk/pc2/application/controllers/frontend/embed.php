<?php

class Embed extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function getembed($idAtasament) {
        $this->load->model('atasament_model');
        $this->load->model('resurse_model');
        $atasament = $this->atasament_model->getAtasament($idAtasament);
        $this->resurse_model->incrementPlay($atasament['resurse_id']);

        $data['atasament'] = $atasament;

        $data['main_content'] = 'frontend/resurse/videoembed';
        // Nu includem template-ul
        $this->load->view('frontend/resurse/videoembed', $data);
    }
}
