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
        $data['tipuri'] = $this->adaptArray($tipuri);

        $this->load->model('autor_model');
        $autori = $this->autor_model->getAutori();
        $data['autori'] = $this->adaptArray($autori);

        $data['main_content'] = 'admin/resurse/edit';
        $this->load->view('frontend/template', $data);
    }

    function edit($idResursa) {
        $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');



        $this->load->model('resurse_model');
        $data['form_values'] = $this->resurse_model->getResursaById($idResursa);

        $this->load->model('tip_model');
        $tipuri = $this->tip_model->getTipuri();
        $data['tipuri'] = $this->adaptArray($tipuri);

        $this->load->model('autor_model');
        $autori = $this->autor_model->getAutori();
        $data['autori'] = $this->adaptArray($autori);
//        var_dump($data['form_values']);
//        die();

        $data['main_content'] = 'admin/resurse/edit';
		$this->load->view('frontend/template', $data);
    }

    function adaptArray($arr) {
        $arrayBun = array();
        foreach($arr as $ar) {
            $arrayBun[$ar["id"]] = $ar["nume"];
        }
        return $arrayBun;
    }
}

