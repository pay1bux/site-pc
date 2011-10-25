<?php

class Adaugare extends CI_Controller {
	
	function index() {       
        $data['main_content'] = 'admin/login';
        $this->load->view('frontend/template', $data);
    }
}

