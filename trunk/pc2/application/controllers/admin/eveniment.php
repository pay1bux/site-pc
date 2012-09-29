<?php

class Eveniment extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $logged_in = $this->session->userdata('logged_in');
        $email = $this->session->userdata('email');
        if ($logged_in == FALSE || !$this->user_model->checkDrept($email, 'eveniment')) {
            redirect('login', 'refresh');
        }
    }

    function add($idEveniment = null) {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));

            $config['upload_path'] = 'uploads/imagini-evenimente/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '0';

            $this->load->model('tip_model');
            $tip_eveniment = $this->tip_model->getTipByCod("evenimente");
            $postdata = $this->input->post('eveniment');
            $input = array(
                'titlu' => $postdata['titlu'],
                'data' => $postdata['data'],
                'autor_id' => 1,
                'categorie_id' => 1,
                'continut' => $postdata["continut"],
                'views' => 0,
                'download' => 0,
                'tip_id' => $tip_eveniment->id
            );

            $this->load->model('resurse_model');
            if (isset($idEveniment)) {
                $this->resurse_model->update($idEveniment, $input);
                $evenimentId = $idEveniment;
            } else {
                $evenimentId = $this->resurse_model->create($input);
            }

            // Conversii checkbox-uri si radio buttons
            if ($postdata['repeta'] == 'Nu') {
                $postdata['repeta'] = null;
            }
            if ($postdata['repeta'] == 'Saptamanal') {
                $postdata['repeta'] = 'saptamanal';
            }
            if (isset($postdata['eveniment'])) {
                $postdata['eveniment'] = 1;
            } else {
                $postdata['eveniment'] = 0;
            }
            if (isset($postdata['newsletter'])) {
                $postdata['newsletter'] = 1;
            } else {
                $postdata['newsletter'] = 0;
            }
            if (isset($postdata['live'])) {
                $postdata['live'] = 1;
            } else {
                $postdata['live'] = 0;
            }
            $inputDetalii = array(
                'resurse_id' => $evenimentId,
                'ora_inceput' => $postdata['ora_inceput'],
                'ora_sfarsit' => $postdata['ora_sfarsit'],
                'repeta' => $postdata['repeta'],
                'eveniment' => $postdata['eveniment'],
                'invitat_predica' => $postdata['invitat_predica'],
                'invitat_lauda' => $postdata['invitat_lauda'],
                'organizator' => $postdata["organizator"],
                'site_organizator' => $postdata["site_organizator"],
                'newsletter' => $postdata["newsletter"],
                'live' => $postdata["live"],
            );

            $this->load->model('detalii_eveniment_model');
            if (isset($idEveniment)) {
                $detaliiEvenimentCurent = $this->detalii_eveniment_model->getByResursaId($idEveniment);
                $this->detalii_eveniment_model->update($detaliiEvenimentCurent['id'], $inputDetalii);
            } else {
                $this->detalii_eveniment_model->create($inputDetalii);
            }

            $this->load->library('upload', $config);

            if ($this->upload->do_upload()) {
                $uploadData = $this->upload->data();

                $this->load->model('atasament_model');
                // Daca e editare, se sterge poza si thumbnail-ul vechi
                if (isset($idEveniment)) {
                    $existentAttachment = $this->atasament_model->getAtasamenteById($idEveniment);
                    // Daca exista atasament vechi stergem pozele si atasamentul
                    if ($existentAttachment != null) {
                        $err = unlink($existentAttachment[0]['url']);
                        $err = unlink($existentAttachment[0]['thumb']);
                        $this->atasament_model->destroy($existentAttachment[0]['id']);
                    }
                }

                $size = $uploadData['file_size'] / 1024;

                // Se face thumbnail
                $config['image_library'] = 'gd2';
                $config['source_image']	= $uploadData['full_path'];
                $config['create_thumb'] = TRUE;
                $config['thumb_marker'] = "_thumb";
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 215;
                $config['height'] = 304;
                $this->load->library('image_lib', $config);
                $thumbnailFilename = $uploadData['raw_name'] . $config['thumb_marker'] . $uploadData['file_ext'];

                if ( ! $this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                $attachInput = array(
                    'url' => "uploads/imagini-evenimente/" . $uploadData['file_name'],
                    'embed' => "",
                    'marime' => $size,
                    'durata' => 0,
                    'format' => $uploadData['file_ext'],
                    'resurse_id' => $evenimentId,
                    'thumb' => "uploads/imagini-evenimente/" . $thumbnailFilename
                );

                $this->atasament_model->create($attachInput);
            }

            redirect('admin/lista-devotionale');
        }
        if (isset($idEveniment)) {
            $this->load->model('resurse_model');
            $filtru = array('tip' => 'evenimente', 'id' => $idEveniment, 'limit' => 1);
            $eveniment = $this->resurse_model->getResurseWithAtt($filtru);
            $eveniment = $eveniment[0];

            // Conversii checkbox-uri si radio buttons
            if ($eveniment['repeta'] == null) {
                $eveniment['repeta'] = 'Nu';
            }
            if ($eveniment['repeta'] == 'saptamanal') {
                $eveniment['repeta'] = 'Saptamanal';
            }
            if ($eveniment['eveniment'] == 1) {
                $eveniment['eveniment'] = 'eveniment';
            } else {
                $eveniment['eveniment'] = null;
            }
            if ($eveniment['newsletter'] == 1) {
                $eveniment['newsletter'] = 'newsletter';
            } else {
                $eveniment['newsletter'] = null;
            }
            if ($eveniment['live'] == 1) {
                $eveniment['live'] = 'live';
            } else {
                $eveniment['live'] = null;
            }

            $data['form_values'] = $eveniment;
//            var_dump($eveniment);
//            die();
        } else {
            $data['form_values'] = array();
        }
        $data['main_content'] = 'admin/devotional/edit';
        $this->load->view('frontend/template', $data);
    }

    function delete($idDevotional = null) {
        if (isset($idDevotional)) {
            $this->load->model('resurse_model');

            $this->load->model('atasament_model');
            $atasamente = $this->atasament_model->getAtasamenteById($idDevotional);
            // Daca exista atasament vechi stergem pozele si atasamentul
            foreach($atasamente as $atasament) {
                $err = unlink($atasament['url']);
                $err = unlink($atasament['thumb']);
                $this->atasament_model->destroy($atasament['id']);
            }


            $this->resurse_model->destroy($idDevotional);

        }
        redirect('admin/lista-devotional');
    }

    function lista() {
        $this->load->model('resurse_model');
        $filtru = array('tip' => 'evenimente');
        $resurse = $this->resurse_model->getResurseWithAtt($filtru);
        $data['resurse'] = $resurse;

        $data['main_content'] = 'admin/eveniment/lista';
        $this->load->view('frontend/template', $data);
    }
}

