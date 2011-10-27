<?php

class Homepage extends CI_Controller {
	
	function index() {

        $this->load->model('resurse_model');
        $data['devotional'] = $this->resurse_model->getUltimulDevotional();

        $this->load->model('resurse_model');
        $data['buletin'] = $this->resurse_model->getUltimulBuletin();

        $this->load->model('resurse_model');
        $data['evenimente'] = $this->resurse_model->getUltimeleEvenimente();

        $data['main_content'] = 'frontend/homepage/homepage';
        // Asa setam titlurile paginilor!
        $data['page_title'] = 'Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }
}
