<?php

class Homepage extends CI_Controller {
	
	function index() {

        $this->load->model('devotional_model');
        $data['devotional'] = $this->devotional_model->getUltimulDevotional();

        $this->load->model('buletin_duminical_model');
        $data['buletin'] = $this->buletin_duminical_model->getUltimulBuletin();

        $this->load->model('evenimente_model');
        $data['evenimente'] = $this->evenimente_model->getUltimeleEvenimente();

        $data['main_content'] = 'frontend/homepage/homepage';

        $this->load->view('frontend/template', $data);
    }
}
