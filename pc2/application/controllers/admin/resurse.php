<?php

class Resurse extends CI_Controller {
	
	function add() {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));
//            $this->load->library('form_validation');

            $postdata = $this->input->post('resurse');
            $input = array(
							'titlu' => $postdata['titlu'],
							'autor_id' => $postdata['autor'],
							'categorie_id' => $postdata['categorie'],
							'continut' => $postdata['continut'],
							'data' => $postdata['data']
						);

            $this->load->model('resurse_model');
            $this->resurse_model->create($input);
            var_dump($input);
            die();
            redirect('admin/lista-resurse');
        }

        $this->load->model('tip_model');
        $tipuri = $this->tip_model->getTipuri();

        $tipuriBune = array();
        foreach($tipuri as $tip) {
            $tipuriBune[$tip["id"]] = $tip["nume"];
        }
        $data['tipuri'] = $tipuriBune;

        $this->load->model('autor_model');
        $autori = $this->autor_model->getAutori();

        $autoriBune = array();
        foreach($autori as $autor) {
            $autoriBune[$autor["id"]] = $autor["nume"];
        }
        $data['autori'] = $autoriBune;

        $data['main_content'] = 'admin/resurse/edit';
        $this->load->view('frontend/template', $data);
    }

    function edit($idResursa) {
        $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');

        $data['main_content'] = 'admin/resurse/lista';
		$this->load->view('frontend/template', $data);
    }
}

