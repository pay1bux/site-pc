<?php

class Servicii extends Controller {

	
	function index()
	{
        $data['main_content'] = 'frontend/servicii/index';

        $this->db->order_by('id', 'desc');
        $data['query'] = $this->db->get('comments');

        $this->load->view('includes/template', $data);
    }
}
