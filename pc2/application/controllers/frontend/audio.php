<?php

class Audio extends CI_Controller {
	
	function index() {

        $data['main_content'] = 'frontend/resurse/audio';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }




}
