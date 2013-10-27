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

            $config['upload_path'] = FOLDER_IMAGINI_EVENIMENT;
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

                // Verifica dimensiunile pozei
                if ($uploadData[image_width]  == PROMO_IMAGE_WIDTH && $uploadData[image_height] == PROMO_IMAGE_HEIGHT) {

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
                $config['width'] = EVENIMENT_THUMBNAIL_WIDTH;
                $config['height'] = EVENIMENT_THUMBNAIL_HEIGHT;
                $this->load->library('image_lib', $config);
                $thumbnailFilename = $uploadData['raw_name'] . $config['thumb_marker'] . $uploadData['file_ext'];

                if ( ! $this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                $attachInput = array(
                    'url' => FOLDER_IMAGINI_EVENIMENT . $uploadData['file_name'],
                    'embed' => "",
                    'marime' => $size,
                    'durata' => 0,
                    'format' => $uploadData['file_ext'],
                    'resurse_id' => $evenimentId,
                    'thumb' => FOLDER_IMAGINI_EVENIMENT . $thumbnailFilename
                );

                $this->atasament_model->create($attachInput);
                }
                else {
                    $this->session->set_flashdata('error', '<h1>Imaginea trebuie sa aiba dimensiunile ' . PROMO_IMAGE_WIDTH . " x " . PROMO_IMAGE_HEIGHT . "</h1>");
                    redirect('admin/editeaza-eveniment/' . $evenimentId);
                }
            }

            redirect('admin/lista-evenimente');
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
        $data['main_content'] = 'admin/eveniment/edit';
        $this->load->view('admin/template', $data);
    }

    function delete($idEveniment = null) {
        if (isset($idEveniment)) {
            $this->load->model('resurse_model');

            $this->load->model('detalii_eveniment_model');
            $detaliiEvenimentCurent = $this->detalii_eveniment_model->getByResursaId($idEveniment);

            $this->load->model('atasament_model');
            $atasamente = $this->atasament_model->getAtasamenteById($idEveniment);
            // Daca exista atasament vechi stergem pozele si atasamentul
            foreach($atasamente as $atasament) {
                $err = unlink($atasament['url']);
                $err = unlink($atasament['thumb']);
                $this->atasament_model->destroy($atasament['id']);
            }

            $this->detalii_eveniment_model->destroy($detaliiEvenimentCurent['id']);
            $this->resurse_model->destroy($idEveniment);

        }
        redirect('admin/lista-evenimente');
    }

    function lista($page = 0 ) {
        $this->load->model('resurse_model');


        $filtru = array('tip' => 'evenimente', 'count_rows' => 'true');

        $counter = $this->resurse_model->getResurseWithAtt($filtru);
        $numar = $counter[0]['COUNT(*)'];

        $this->load->library('pagination');
        $config['per_page'] = 10;

        $filtru = array('tip' => 'evenimente', 'order' => 'r_id', 'orderType' => 'DESC', 'limit' => $page, 'number' => $config['per_page']);
        $resurse = $this->resurse_model->getResurseWithAtt($filtru);
        $data['resurse'] = $resurse;

        $config['base_url'] = site_url('admin/lista-evenimente');
        $config['total_rows'] = $numar;

        $config['first_url'] = '0';
        $config['num_links'] = 3;
        $config['last_link'] = '';
        $config['first_link'] = '';
        $config['uri_segment'] = 3;
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';


        $this->pagination->initialize($config);

        $data['paginare'] = $this->pagination->create_links();


        $data['main_content'] = 'admin/eveniment/lista';
        $this->load->view('admin/template', $data);
    }
}

