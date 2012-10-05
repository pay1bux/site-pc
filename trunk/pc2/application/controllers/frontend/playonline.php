<?php

class Playonline extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }

    function play($idAtasament) {
        $this->load->model('atasament_model');
        $this->load->model('resurse_model');
        $atasament = $this->atasament_model->getAtasament($idAtasament);
        $this->resurse_model->incrementPlay($atasament['resurse_id']);
        redirect($atasament['url']);
    }
}
