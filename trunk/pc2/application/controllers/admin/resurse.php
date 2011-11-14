<?php

class Resurse extends CI_Controller {
	
	function add() {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));

            $postdata = $this->input->post('resurse');
            $input = array(
							'titlu' => $postdata['titlu'],
							'autor_id' => $postdata['autor'],
                            'tip_id' => $postdata['tip_id'],
							'categorie_id' => $postdata['categorie'],
							'continut' => $postdata['continut'],
							'data' => $postdata['data']
						);

            $this->load->model('resurse_model');
            $this->resurse_model->create($input);
            redirect('admin/lista-resurse');
        }

        $this->load->model('tip_model');
        $tipuri = $this->tip_model->getTipuri();
        $data['tipuri'] = $this->adaptArray($tipuri);

        $this->load->model('autor_model');
        $autori = $this->autor_model->getAutori();
        $data['autori'] = $this->adaptArray($autori);

        $this->load->model('categorie_model');
        $categorii = $this->categorie_model->getCategorii();
        $data['categorii'] = $this->adaptArray($categorii);

        $data['main_content'] = 'admin/resurse/edit';
        $this->load->view('frontend/template', $data);
    }

    function edit($idResursa)  {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));

            $postdata = $this->input->post('resurse');
            $input = array(
							'titlu' => $postdata['titlu'],
							'autor_id' => $postdata['autor'],
							'categorie_id' => $postdata['categorie'],
							'continut' => $postdata['continut'],
							'data' => $postdata['data']
						);

            $this->load->model('resurse_model');
            $this->resurse_model->update($idResursa, $input);
            redirect('admin/lista-resurse');
        }

        $this->load->model('resurse_model');
        $data['form_values'] = $this->resurse_model->getResursaById($idResursa);

        $this->load->model('tip_model');
        $tipuri = $this->tip_model->getTipuri();
        $data['tipuri'] = $this->adaptArray($tipuri);

        $this->load->model('autor_model');
        $autori = $this->autor_model->getAutori();
        $data['autori'] = $this->adaptArray($autori);

        $this->load->model('categorie_model');
        $categorii = $this->categorie_model->getCategorii();
        $data['categorii'] = $this->adaptArray($categorii);
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

           function lista() {
        $this->load->model('resurse_model');
        $resurse = $this->resurse_model->getResurseWithAll();
        $data['resurse'] = $resurse;

       $this->load->model('atasament_model');
       $nr_atasamente =  $this->atasament_model->getNumarAtasamente(2);
       $data['nr_atasamente'] = $nr_atasamente;

        $data['main_content'] = 'admin/resurse/lista';
		$this->load->view('frontend/template', $data);
    }

}

