<?php

class Categorii extends CI_Controller {
	
	function add() {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));
//            $this->load->library('form_validation');

            $postdata = $this->input->post('categorie');
            $input = array(
							'nume' => $postdata['nume']
                            );

            $this->load->model('categorie_model');
            $this->categorie_model->create($input);
            redirect('admin/lista-categorii');
        }



        $data['main_content'] = 'admin/categorii/edit';
        $this->load->view('frontend/template', $data);
    }

    function edit($idCategorie) {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));

            $postdata = $this->input->post('categorie');
            $input = array(
							'nume' => $postdata['nume']
						);

            $this->load->model('categorie_model');
            $this->categorie_model->update($idCategorie, $input);
            redirect('admin/lista-categorii');
        }

        $this->load->model('categorie_model');
        $data['form_values'] = $this->categorie_model->getCategoriiById($idCategorie);

        $this->load->model('categorie_model');
        $categorii = $this->categorie_model->getCategorii();
        $data['categorii'] = $this->adaptArray($categorii);


//        var_dump($data['form_values']);
//        die();

        $data['main_content'] = 'admin/categorii/edit';
		$this->load->view('frontend/template', $data);
    }

    function adaptArray($arr) {
        $arrayBun = array();
        foreach($arr as $ar) {
            $arrayBun[$ar["id"]] = $ar["nume"];
        }
        return $arrayBun;
    }

        function lista() {
        $this->load->model('categorie_model');
        $categorii = $this->categorie_model->getCategorii();
        $data['categorii'] = $categorii;
        $data['main_content'] = 'admin/categorii/lista';
		$this->load->view('frontend/template', $data);
    }


}

