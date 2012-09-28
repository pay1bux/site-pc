<?php

class Buletin extends CI_Controller
{

    function index($page = 0)
    {


        $this->load->model('resurse_model');
        $filtru = array('tip' => 'buletin-duminical', 'order' => 'data', 'orderType' => 'DESC');

        $counter = $this->resurse_model->getResurseWithAtt($filtru);
        $numar = count($counter);

        $this->load->library('pagination');
        $config['per_page'] = 8;
        $filtru['limit'] = $page;
        $filtru['number'] = $config['per_page'];



        $buletine = $this->resurse_model->getResurseWithAtt($filtru);
        $data['buletine'] = $buletine;

        $config['base_url'] = site_url('buletin-duminical');
        $config['total_rows'] = $numar;

        $config['first_url'] = '0';
        $config['num_links'] = 3;
        $config['last_link'] = 'Ultima';
        $config['first_link'] = 'Prima';
        $config['uri_segment'] = 2;
        $config['num_tag_open'] = '<div class="pagina_s">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<div class="pagina_a">';
        $config['cur_tag_close'] = '</div>';

        $config['prev_tag_open'] = '<div class="pagina_b">';
        $config['prev_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="pagina_b">';
        $config['next_tag_close'] = '</div>';


        $this->pagination->initialize($config);

        $data['paginare'] = $this->pagination->create_links();


        $data['main_content'] = 'frontend/resurse/buletin';
        $data['page_title'] = 'Biserica Penticostala Poarta Cerului, Timisoara - Buletin duminical';


        $this->load->view('frontend/template', $data);
    }
}
