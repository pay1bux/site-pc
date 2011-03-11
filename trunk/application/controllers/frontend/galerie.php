<?php

class Galerie extends Controller {

	function Home()
	{
		parent::Controller();	
	}
	
	function index($id_category = 0)
	{
		$this->load->model('Images_categories_model');
		$this->load->model('Images_model');
		$data['categories'] = $this->Images_categories_model->get();
		
		if (! empty($data['categories'])) 
		{
			if ($id_category == 0) 
			{
				$id_category = $data['categories'][0]['id'];
			}
		}
		
		$data['images'] = $this->Images_model->get(array('id_cat' => $id_category));
		
		$data['id_category'] = $id_category;
		
		$data['main_content'] = 'frontend/galerie/content';
		$this->load->view('frontend/template', $data);
	}
}
