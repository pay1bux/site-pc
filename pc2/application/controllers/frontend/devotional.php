<?php

class Devotional extends CI_Controller {
	
	function index($id) {

        $this->load->model('resurse_model');
        $data['devotionale'] = $this->resurse_model->getResurseByIdAndTip('articole', $id);
    //    $data['recente'] = $this->resurse_model->getResurseByIdAndTip('articole', $id);

        $data['main_content'] = 'frontend/devotional/devotional';
        $data['page_title'] = $data['devotionale']['titlu'] . ' - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->model('resurse_model');
        $data['next']=$this->resurse_model->nextResursaByIdAndTip('articole', $id);
        $this->load->model('resurse_model');
        $data['prev']=$this->resurse_model->prevResursaByIdAndTip('articole', $id);
        

        $this->load->view('frontend/template', $data);
    }


    function lista()
    {

         $this->load->model('resurse_model');
        $data['devotionale'] = $this->resurse_model->getResurseByTipWithAtt('articole');


        
        $data['main_content'] = 'frontend/devotional/lista';
        $data['page_title'] = 'Devotional - Biserica Penticostala Poarta Cerului, Timisoara';
        $this->load->view('frontend/template', $data);

    }

}
