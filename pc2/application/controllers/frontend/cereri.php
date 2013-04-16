    <?php

class Cereri extends CI_Controller {


	function index($page = 0) {

        $this->load->model('cerere_model');

        $numar = $this->cerere_model->countCereri();
        $this->load->library('pagination');
        $config['base_url'] = site_url('cereri-rugaciune');
        $config['total_rows'] = $numar['COUNT(id)'];
        $config['per_page'] = 8;
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

        $filtru['limit']= $page;
        $filtru['number']=$config['per_page'];

        $data['cereri'] = $this->cerere_model->getCereri($filtru);


        $data['main_content'] = 'frontend/cereri/cereri';
        $data['page_title'] = ' Cereri de rugaciune - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }

}
