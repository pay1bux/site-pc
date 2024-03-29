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
        $data['devotional'] = $this->user_model->checkDrept($email, 'devotional');
        $data['adaugareAudio'] = $this->user_model->checkDrept($email, 'adaugare-audio');
        $data['adaugareVideo'] = $this->user_model->checkDrept($email, 'adaugare-video');
        $data['imaginePromo'] = $this->user_model->checkDrept($email, 'imagine-promo');
        $data['administrareUseri'] = $this->user_model->checkDrept($email, 'administrare-useri');
        $data['administrareCereri'] = $this->user_model->checkDrept($email, 'administrare-cereri');
        $data['email'] = $email;
        $this->load->view('admin/template', $data);
    }
}

?>