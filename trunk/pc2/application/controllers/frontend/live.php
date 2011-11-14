<?php

class Live extends CI_Controller {
	
	function index() {

        $data['main_content'] = 'frontend/live/live';
        $data['page_title'] = ' Live - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }

}
