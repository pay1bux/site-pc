<?php

class Login extends CI_Controller
{

    function index() {
        parent::__construct();
        $this->load->library('session');
        $data['main_content'] = 'admin/login';
        $this->load->view('frontend/template', $data);
    }

    function verify() {
        $this->load->library('session');
        $this->load->model('user_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $email = $this->input->post('email', TRUE);
        $password = $this->input->post('password', TRUE);

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_password_check['.$email.']');


        if ($this->form_validation->run() == TRUE) {
            $newdata = array(
                'email' => $email,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);

            $redirectUrl = $this->session->flashdata('redirect_url');
            if (isset($redirectUrl) && $redirectUrl != '') {
                redirect($redirectUrl, 'refresh');
            } else {
                redirect('administrator', 'refresh');
            }
        } else {
            $data['main_content'] = 'admin/login';
            $this->load->view('frontend/template', $data);
        }
    }

    public function password_check($password, $email) {
        if ($this->user_model->checkLogin($email, md5($password))) {
            return TRUE;
        }
        else {
            $this->form_validation->set_message('password_check', 'Email-ul si/sau parola sunt gresite!');
            return FALSE;
        }
    }
}

