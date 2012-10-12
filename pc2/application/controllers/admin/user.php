<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $logged_in = $this->session->userdata('logged_in');
        $email = $this->session->userdata('email');
        if ($logged_in == FALSE || !$this->user_model->checkDrept($email, 'administrare-useri')) {
            redirect('login', 'refresh');
        }
    }

    function add($idUser = null) {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));

            $postdata = $this->input->post('user');
            $postdataDrepturi = $this->input->post('drepturi');

            $input = array(
                'nume' => $postdata['nume'],
                'email' => $postdata['email'],
                'parola' => $postdata['parola'],
                'parola2' => $postdata['parola2'],
                'telefon' => $postdata['telefon'],
                'public' => $postdata['public']
            );

            if ($input['parola'] != $input['parola2']) {
                // TODO: validation step
                if (isset($idUser)) {
                    $this->session->set_flashdata('error', '<h1>Parolele trebuie sa coincida</h1>');
                    redirect('admin/editeaza-user/' . $idUser);
                } else {
                    $this->session->set_flashdata('error', '<h1>Parolele trebuie sa coincida</h1>');
                    redirect('admin/adauga-user');
                }
            }

            // Pregateste input-ul pentru adaugare/editare
            if ($input['parola'] != '') {
                $input['parola'] = md5($input['parola']);
            } else {
                unset($input['parola']);
            }
            unset($input['parola2']);
            if (!isset($input['public'])) {
                $input['public'] = 0;
            } else {
                $input['public'] = 1;
            }

            // Adauga / editeaza user
            if (isset($idUser)) {
                $this->user_model->update($idUser, $input);
                $user_id = $idUser;
            } else {
                $user_id = $this->user_model->create($input);
            }

            $drepturiUser = array();
            foreach($postdataDrepturi as $pd) {
                $drepturiUser[] = array('user_id' => $user_id, 'drepturi_id' => $pd);
            }

            $this->load->model('drepturi_user_model');
            // sterge drepturile existente
            if (isset($idUser)) {
                $this->drepturi_user_model->deleteDrepturiUser($idUser);
            }
            // creaza drepturile selectate
            foreach($drepturiUser as $du) {
                $this->drepturi_user_model->create($du);
            }

            redirect('admin/lista-useri');
        }
        if (isset($idUser)) {
            $user = $this->user_model->getUserById($idUser);
            $this->load->model('drepturi_user_model');
            $drepturiUser = $this->drepturi_user_model->getDrepturiUser($idUser);

            $data['form_values'] = $user;
            $data['drepturiUser'] = $drepturiUser;
//            var_dump($data['form_values']);
//            var_dump($data['drepturiUser']);
//            die();
        } else {
            $data['form_values'] = array();
            $data['drepturiUser'] = array();
        }
        $this->load->model('drepturi_model');
        $drepturi = $this->drepturi_model->getDrepturi();
        $data['drepturi'] = $drepturi;
        $data['main_content'] = 'admin/user/edit';
        $this->load->view('frontend/template', $data);
    }

    function delete($idUser = null) {
        if (isset($idUser)) {
            $this->load->model('drepturi_user_model');
            $this->drepturi_user_model->deleteDrepturiUser($idUser);
            $this->user_model->destroy($idUser);
        }
        redirect('admin/lista-useri');
    }

    function lista() {

        $useri = $this->user_model->getUseri();
        $data['useri'] = $useri;

        $data['main_content'] = 'admin/user/lista';
        $this->load->view('frontend/template', $data);
    }
}

