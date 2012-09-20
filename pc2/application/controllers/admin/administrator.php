<?php

class Administrator extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE) {
            redirect('login', 'refresh');
        }
    }

    function index() {
        $data['main_content'] = 'admin/administrator';

        $email = $this->session->userdata('email');
        $data['administrareResurse'] = $this->user_model->checkDrept($email, 'administrare-resurse');
        $data['buletin'] = $this->user_model->checkDrept($email, 'buletin');
        $data['eveniment'] = $this->user_model->checkDrept($email, 'eveniment');
        $data['email'] = $email;
        $this->load->view('admin/template', $data);
    }
}

?>