<?php

class Adaugare extends CI_Controller {
	
	function index() {       
        $data['main_content'] = 'admin/lista-resurse';
        $this->load->view('frontend/template', $data);
    }
}

