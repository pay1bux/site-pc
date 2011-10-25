<?php

class Adauga_resursa extends CI_Controller {
	
	function index() {       
        $data['main_content'] = 'admin/adaugare/resurse';
        $this->load->view('frontend/template', $data);
    }
}

