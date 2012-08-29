<?php

class Buletin extends CI_Controller {

    function add() {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));

            $config['upload_path'] = 'uploads/buletine/';
            $config['allowed_types'] = 'pdf';
            $config['max_size']	= '0';
            $config['overwrite']  = 'true';

            $this->load->library('upload', $config);

            $postdata = $this->input->post('buletin');
            $input = array(
                'titlu' => $postdata['titlu'],
                'data' => $postdata['data'],
                'autor_id' => 1,
                'categorie_id' => 1,
                'continut' => "",
                'views' => 0,
                'download' => 0,
                'tip_id' => 6 //TODO: De modificat?
            );

            if ( ! $this->upload->do_upload()) {
                $data['error'] = $this->upload->display_errors();
                $data['form_values'] = $postdata;
            }
            else {
                $uploadData = $this->upload->data();

                $this->load->model('resurse_model');
                $buletinId = $this->resurse_model->create($input);
                $size = $uploadData['file_size'] / 1024;

                // TODO: De facut thumbnails

                $attachInput = array(
                    'url' => "uploads/buletine/" . $uploadData['file_name'],
                    'embed' => "",
                    'marime' => $size,
                    'durata' => 0,
                    'format' => "pdf",
                    'resurse_id' => $buletinId,
                    'thumb' => ""
                );

                $this->load->model('atasament_model');
                $this->atasament_model->create($attachInput);
                redirect('admin/lista-buletine');
            }
        }
        $data['main_content'] = 'admin/buletin/edit';
        $this->load->view('frontend/template', $data);
    }

    function edit($idBuletin) {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));
//            $this->load->library('form_validation');

            $postdata = $this->input->post('atasamente');
            $input = array(
                'url' => $postdata['url'],
                'embed' => $postdata['embed'],
                'marime' => $postdata['marime'],
                'format' => $postdata['format']
            );

        }
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->model('atasament_model');
        $data['form_values'] = $this->atasament_model->getAtasament($idBuletin);

        $data['main_content'] = 'admin/atasamente/edit';
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
        $filtru = array('tip' => 'buletin-duminical');
        $resurse = $this->resurse_model->getResurseWithAtt($filtru);
        $data['resurse'] = $resurse;

        $data['main_content'] = 'admin/buletin/lista';
        $this->load->view('frontend/template', $data);
    }
}

