<?php

class Atasamente extends CI_Controller {

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

            $postdata = $this->input->post('atasamente');
            $input = array(
							'url' => $postdata['url'],
                            'embed' => $postdata['embed'],
                            'marime' => $postdata['marime'],
                            'format' => $postdata['format'],
                            'resurse_id' => $idResursa
						);

            $this->load->model('atasament_model');
            $this->atasament_model->create($input);
            redirect('admin/lista-atasamente-resursa/'.$idResursa);
        }
        
        $data['main_content'] = 'admin/atasamente/edit';
        $this->load->view('admin/template', $data);
    }

    function edit($idResursa, $idAtasament) {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));
//            $this->load->library('form_validation');

           $postdata = $this->input->post('atasamente');
            $input = array(
							'url' => $postdata['url'],
                            'embed' => $postdata['embed'],
                            'marime' => $postdata['marime'],
                            'format' => $postdata['format'],
                            'resurse_id' => $idResursa
						);

            $this->load->model('atasament_model');
            $this->atasament_model->update($idAtasament, $input);
            redirect('admin/lista-atasamente-resursa/'.$input['resurse_id']);
        }
        $this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');

        $this->load->model('atasament_model');
        $data['form_values'] = $this->atasament_model->getAtasament($idAtasament);

        $data['main_content'] = 'admin/atasamente/edit';
		$this->load->view('admin/template', $data);
    }

    function adaptArray($arr) {
        $arrayBun = array();
        foreach($arr as $ar) {
            $arrayBun[$ar["id"]] = $ar["nume"];
        }
        return $arrayBun;
    }



    function lista($idResursa) {
        $this->load->model('atasament_model');
        $atasamente = $this->atasament_model->getAtasamenteById($idResursa);
        $data['atasamente'] = $atasamente;

        $this->load->model('resurse_model');
        $resursa = $this->resurse_model->getResurseWithAllById($idResursa);
        $data['resursa'] = $resursa;
                
        $data['main_content'] = 'admin/atasamente/lista';
		$this->load->view('admin/template', $data);
    }
}

