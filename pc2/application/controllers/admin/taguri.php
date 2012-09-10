<?php

class Taguri extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $logged_in = $this->session->userdata('logged_in');
        $email = $this->session->userdata('email');
        if ($logged_in == FALSE || !$this->user_model->checkDrept($email, 'administrare-resurse')) {
            redirect('login', 'refresh');
        }
    }
	
	function add($idResursa) {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));
//            $this->load->library('form_validation');

            $postdata = $this->input->post('tag');
            $input = array(
							'tip_tag_id' => $postdata['tip'],
                            'valoare' => $postdata['valoare'],
                            'resurse_id' => $idResursa
						);

            $this->load->model('taguri_model');
            $this->taguri_model->create($input);
            redirect('admin/lista-taguri-resursa/'.$idResursa);
        }

        $this->load->model('tip_tag_model');
        $tipuri_tag = $this->tip_tag_model->getTipuriTag();
        $data['tipuri_tag'] = $this->adaptArray($tipuri_tag);

        $data['main_content'] = 'admin/taguri/edit';
        $this->load->view('admin/template', $data);
    }

    function edit($idResursa, $idTag) {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));
//            $this->load->library('form_validation');

               $postdata = $this->input->post('tag');
            $input = array(
							'tip_tag_id' => $postdata['tip'],
                            'valoare' => $postdata['valoare'],
                            'resurse_id' => $idResursa
						);

            $this->load->model('taguri_model');
            $this->taguri_model->update($idTag, $input);
            redirect('admin/lista-taguri-resursa/'.$input['resurse_id']);
        }
        $this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');

         $this->load->model('tip_tag_model');
        $tipuri_tag = $this->tip_tag_model->getTipuriTag();
        $data['tipuri_tag'] = $this->adaptArray($tipuri_tag);

        $this->load->model('taguri_model');
        $data['form_values'] = $this->taguri_model->getTagById($idTag);

        $data['main_content'] = 'admin/taguri/edit';
		$this->load->view('admin/template', $data);
    }

    function adaptArray($arr) {
        $arrayBun = array();
        foreach($arr as $ar) {
            $arrayBun[$ar["id"]] = $ar["tip_tag"];
        }
        return $arrayBun;
    }


    function lista($idResursa) {
        $this->load->model('taguri_model');
        $taguri = $this->taguri_model->getTaguriWithAllById($idResursa);
        $data['taguri'] = $taguri;

        $this->load->model('resurse_model');
        $resursa = $this->resurse_model->getResurseWithAllById($idResursa);
        $data['resursa'] = $resursa;

        $data['main_content'] = 'admin/taguri/lista';
		$this->load->view('admin/template', $data);
    }
}

