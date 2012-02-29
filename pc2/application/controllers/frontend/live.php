<?php

class Live extends CI_Controller {

        function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }


	function index() {

          if (!strcmp($_SERVER['REQUEST_METHOD'], 'POST')) {
            $this->load->helper(array('form', 'url'));

            $postdata = $this->input->post('cerere');


            $input = array(
                'nume' => $postdata['nume'],
                'localitate' => $postdata['localitate'],
                'continut' => $postdata['continut'],
                'afiseaza' => $postdata['public']
            );

              if($input['afiseaza']==NULL)
                $input['afiseaza']=0;


            $this->load->model('cerere_model');
            $this->cerere_model->create($input);
            $this->session->set_flashdata('cerere', 'Cererea dumneavoastra a fost trimisa!');
            redirect('live');

        }


        $data['main_content'] = 'frontend/live/live';
        $data['page_title'] = ' Live - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }

}
