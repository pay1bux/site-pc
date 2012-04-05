<?php

class Audio extends CI_Controller {
	
	function index() {

        $data['main_content'] = 'frontend/resurse/audio';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->model('resurse_model');
        $filters = array("domeniu" => "audio", "order" => "data_adaugare", "orderType" => "desc");
        $data['audio'] = $this->resurse_model->getResurseWithAtt($filters);
        $data['selected'] = "celeMaiNoi";

        $this->load->view('frontend/template', $data);
    }

	function celeMaiAscultate() {

        $data['main_content'] = 'frontend/resurse/audio';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->model('resurse_model');
        $filters = array("domeniu" => "audio", "order" => "views", "orderType" => "desc");
        $data['audio'] = $this->resurse_model->getResurseWithAtt($filters);
        $data['selected'] = "celeMaiAscultate";

        $this->load->view('frontend/template', $data);
    }

	function predici() {

        $data['main_content'] = 'frontend/resurse/audio';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->model('resurse_model');
        $filters = array("tip" => TIP_PREDICA_AUDIO, "order" => "views", "orderType" => "desc");
        $data['audio'] = $this->resurse_model->getResurseWithAtt($filters);
        $data['selected'] = "predici";

        $this->load->view('frontend/template', $data);
    }

	function studii() {

        $data['main_content'] = 'frontend/resurse/audio';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->model('resurse_model');
        $filters = array("tip" => TIP_STUDIU_AUDIO, "order" => "views", "orderType" => "desc");
        $data['audio'] = $this->resurse_model->getResurseWithAtt($filters);
        $data['selected'] = "studii";

        $this->load->view('frontend/template', $data);
    }

	function muzica() {

        $data['main_content'] = 'frontend/resurse/audio';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->model('resurse_model');
        $filters = array("tip" => TIP_CANTEC_AUDIO, "order" => "views", "orderType" => "desc");
        $data['audio'] = $this->resurse_model->getResurseWithAtt($filters);
        $data['selected'] = "muzica";

        $this->load->view('frontend/template', $data);
    }

	function poezii() {

        $data['main_content'] = 'frontend/resurse/audio';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->model('resurse_model');
        $filters = array("tip" => TIP_POEZIE_AUDIO, "order" => "views", "orderType" => "desc");
        $data['audio'] = $this->resurse_model->getResurseWithAtt($filters);
        $data['selected'] = "poezii";

        $this->load->view('frontend/template', $data);
    }

	function marturii() {

        $data['main_content'] = 'frontend/resurse/audio';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->model('resurse_model');
        $filters = array("tip" => TIP_MARTURIE_AUDIO, "order" => "views", "orderType" => "desc");
        $data['audio'] = $this->resurse_model->getResurseWithAtt($filters);
        $data['selected'] = "marturii";

        $this->load->view('frontend/template', $data);
    }

	function diverse() {

        $data['main_content'] = 'frontend/resurse/audio';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->model('resurse_model');
        $filters = array("tip" => TIP_DIVERSE_AUDIO, "order" => "views", "orderType" => "desc");
        $data['audio'] = $this->resurse_model->getResurseWithAtt($filters);
        $data['selected'] = "diverse";

        $this->load->view('frontend/template', $data);
    }




}
