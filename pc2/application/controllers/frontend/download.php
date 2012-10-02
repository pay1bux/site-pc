<?php

class Download extends CI_Controller {

    function __construct()
    {
        parent::__construct();
    }


    function down($idAtasament) {
        $this->load->model('atasament_model');
        $this->load->model('resurse_model');
        $atasament = $this->atasament_model->getAtasament($idAtasament);
        $this->resurse_model->incrementDownload($atasament['resurse_id']);
        redirect($atasament['url']);
    }

}
