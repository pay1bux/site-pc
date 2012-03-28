<?php

class Autori extends CI_Controller {
	
	function add() {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));
//            $this->load->library('form_validation');

            $postdata = $this->input->post('autori');
            $input = array(
							'nume' => $postdata['nume']
						);

            $this->load->model('autor_model');
            $this->autor_model->create($input);
            redirect('admin/lista-autori');
        }

        


        $data['main_content'] = 'admin/autori/edit';
        $this->load->view('frontend/template', $data);
    }

    function edit($idAutor) {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));
//            $this->load->library('form_validation');

            $postdata = $this->input->post('autori');
            $input = array(
							'nume' => $postdata['nume']
						);

            $this->load->model('autor_model');
            $this->autor_model->update($idAutor, $input);
            redirect('admin/lista-autori');
        }
        $this->load->helper(array('form', 'url'));
    	$this->load->library('form_validation');

        $this->load->model('autor_model');
        $data['form_values'] = $this->autor_model->getAutorById($idAutor);

        $this->load->model('autor_model');
        $autori = $this->autor_model->getAutori();
        $data['autori'] = $this->adaptArray($autori);


        $data['main_content'] = 'admin/autori/edit';
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
        $this->load->model('autor_model');
        $autori = $this->autor_model->getAutori();
        $data['autori'] = $autori;
        $data['main_content'] = 'admin/autori/lista';
		$this->load->view('frontend/template', $data);
    }
}
