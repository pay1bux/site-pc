<?php

class Portofoliu extends Controller {

	function Portofoliu()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->model('Portofoliu_categories_model');
		$data['results'] = $this->Portofoliu_categories_model->get_all();
		$data['main_content'] = 'frontend/portofoliu/content';
		$this->load->view('frontend/template', $data);
	}
}
