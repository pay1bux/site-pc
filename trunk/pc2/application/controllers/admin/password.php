<?php

class Password extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $logged_in = $this->session->userdata('logged_in');
        if ($logged_in == FALSE) {
            redirect('login', 'refresh');
        }
    }

    function schimbaparola()
    {
        if (!strcmp($_SERVER['REQUEST_METHOD'], 'POST')) {
            $this->load->helper(array('form', 'url'));

            $postdata = $this->input->post('user');

            $input = array(
                'parola' => $postdata['parola'],
                'parola2' => $postdata['parola2'],
            );

            if ($input['parola'] != $input['parola2']) {
                $this->session->set_flashdata('error', '<h1>Parolele trebuie sa coincida</h1>');
                redirect('admin/schimba-parola');
            }

            $input['parola'] = md5($input['parola']);
            unset($input['parola2']);

            $idUser = $this->user_model->getUserByEmail($this->session->userdata('email'));
            $this->user_model->update($idUser['id'], $input);

            redirect('pcadmin');
        }

        $data['main_content'] = 'admin/user/password';
        $this->load->view('frontend/template', $data);
    }
}