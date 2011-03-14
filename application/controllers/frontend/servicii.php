<?php

class Servicii extends Controller {

	
	function index()
	{
        $data['main_content'] = 'frontend/servicii/index';

        $this->load->view('includes/template', $data);
    }
}
