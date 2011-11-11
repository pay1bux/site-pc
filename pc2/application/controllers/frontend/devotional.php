<?php

class Devotional extends CI_Controller {
	
	function index($id) {

        $this->load->model('resurse_model');
        $data['devotionale'] = $this->resurse_model->getResurseByTipWithAtt(8);

        $data['main_content'] = 'frontend/devotional/devotional';
        // Asa setam titlurile paginilor!
        $data['page_title'] = 'Devotional - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }

    function lista()
    {

         $this->load->model('resurse_model');
        $data['devotionale'] = $this->resurse_model->getResurseByTipWithAtt(8);


        
        $data['main_content'] = 'frontend/devotional/devotional';
        $data['page_title'] = 'Devotional - Biserica Penticostala Poarta Cerului, Timisoara';
        $this->load->view('frontend/template', $data);

    }

}
