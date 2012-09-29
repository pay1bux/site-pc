<?php

class Devotional extends CI_Controller {
	
	function index($slugTitlu, $id) {
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

    function lista($page = 0) {
        $this->load->model('resurse_model');

        $filtru = array('tip' => 'articole', 'count_rows' => 'true');
        $counter = $this->resurse_model->getResurseWithAtt($filtru);
        $numar = $counter[0]['COUNT(*)'];
        $this->load->library('pagination');
        $config['base_url'] = site_url('devotional');
        $config['total_rows'] = $numar;
        $config['per_page'] = 4;
        $config['first_url'] = '0';
        $config['num_links'] = 2;
        $config['last_link'] = '';
        $config['first_link'] = '';
        $config['uri_segment'] = 2;

        $config['num_tag_open']='<div class="pagina_s">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<div class="pagina_a">';
        $config['cur_tag_close'] = '</div>';

        $config['prev_tag_open'] = '<div class="pagina_b">';
        $config['prev_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="pagina_b">';
        $config['next_tag_close'] = '</div>';


        $this->pagination->initialize($config);

        $data['paginare'] = $this->pagination->create_links();


        $filters = array("tip" => "articole", "order" => "data_adaugare", "orderType" => "desc", 'limit' => $page, 'number' => $config['per_page']);
        $data['devotionale'] = $this->resurse_model->getResurseWithAtt($filters);





        $data['main_content'] = 'frontend/devotional/lista';
        $data['page_title'] = 'Devotional - Biserica Penticostala Poarta Cerului, Timisoara';
        $this->load->view('frontend/template', $data);
    }
}
