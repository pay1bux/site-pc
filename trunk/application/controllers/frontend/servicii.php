<?php

class Servicii extends Controller {

	
	function index()
	{
        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost/pc/';
        $config['total_rows'] = $this->db->get('pec_videos_list')->num_rows();
        $config['per_page'] = '10';
        $config['num_links'] = '2';
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
        
        $this->pagination->initialize($config);

        $data['records'] = $this->db->get('pec_videos_list', $config['per_page'], $this->uri->segment(3));


        
        $data['main_content'] = 'frontend/servicii/index';

        $this->load->view('includes/template', $data);
    }
}
