<?php

class Adauga_autor extends CI_Controller {
	
	function index() {       
        $data['main_content'] = 'admin/adaugare/autori';
        $this->load->view('frontend/template', $data);
    }
}

