<?php

class ImaginePromo extends CI_Controller {

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

    function add($idImagine = null) {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));

            $config['upload_path'] = FOLDER_IMAGINI_PROMO;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '0';

            $this->load->model('tip_model');
            $tipImaginePromo = $this->tip_model->getTipByCod("imagine-promo");
            $postdata = $this->input->post('imaginePromo');

            // Conversie checkbox
            if (isset($postdata['vizibil'])) {
                $postdata['vizibil'] = 1;
            } else {
                $postdata['vizibil'] = 0;
            }

            $input = array(
                'titlu' => $postdata['titlu'],
                'autor_id' => 1,
                'categorie_id' => 1,
                'views' => 0,
                'download' => 0,
                'vizibil' => $postdata['vizibil'],
                'tip_id' => $tipImaginePromo->id
            );

            $this->load->model('resurse_model');
            if (isset($idImagine)) {
                $this->resurse_model->update($idImagine, $input);
                $imaginePromoId = $idImagine;
            } else {
                $imaginePromoId = $this->resurse_model->create($input);
            }

            $this->load->library('upload', $config);

            if ($this->upload->do_upload()) {
                $uploadData = $this->upload->data();

                // Verifica dimensiunile pozei
                if ($uploadData[image_width]  == PROMO_IMAGE_WIDTH && $uploadData[image_height] == PROMO_IMAGE_HEIGHT) {

                    $this->load->model('atasament_model');
                    // Daca e editare, se sterge poza si thumbnail-ul vechi
                    if (isset($idImagine)) {
                        $existentAttachment = $this->atasament_model->getAtasamenteById($idImagine);
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
                        'url' => FOLDER_IMAGINI_PROMO . $uploadData['file_name'],
                        'embed' => "",
                        'marime' => $size,
                        'durata' => 0,
                        'format' => $uploadData['file_ext'],
                        'resurse_id' => $imaginePromoId,
                        'thumb' => FOLDER_IMAGINI_PROMO . $thumbnailFilename
                    );

                    $this->atasament_model->create($attachInput);
                }
                else {
                    $this->session->set_flashdata('error', '<h1>Imaginea trebuie sa aiba dimensiunile ' . PROMO_IMAGE_WIDTH . " x " . PROMO_IMAGE_HEIGHT . "</h1>");
                    redirect('admin/editeaza-imagine-promo/' . $imaginePromoId);
                }
            }

            redirect('admin/lista-imagini-promo');
        }
        if (isset($idImagine)) {
            $this->load->model('resurse_model');
            $filtru = array('tip' => 'imagine-promo', 'id' => $idImagine, 'limit' => 1);
            $imaginePromo = $this->resurse_model->getResurseWithAtt($filtru);
            $imaginePromo = $imaginePromo[0];

            // Conversie checkbox
            if ($imaginePromo['vizibil'] == 1) {
                $imaginePromo['vizibil'] = 1;
            } else {
                $imaginePromo['vizibil'] = 0;
            }

            $data['form_values'] = $imaginePromo;
//            var_dump($imaginePromo);
//            die();
        } else {
            $data['form_values'] = array();
        }
        $data['main_content'] = 'admin/imaginepromo/edit';
        $this->load->view('admin/template', $data);
    }

    function delete($idImagine = null) {
        if (isset($idImagine)) {
            $this->load->model('resurse_model');

            $this->load->model('atasament_model');
            $atasamente = $this->atasament_model->getAtasamenteById($idImagine);
            // Daca exista atasament vechi stergem pozele si atasamentul
            foreach($atasamente as $atasament) {
                $err = unlink($atasament['url']);
                $err = unlink($atasament['thumb']);
                $this->atasament_model->destroy($atasament['id']);
            }

            $this->resurse_model->destroy($idImagine);

        }
        redirect('admin/lista-imagini-promo');
    }

    function lista() {
        $this->load->model('resurse_model');

        $filtru = array('tip' => 'imagine-promo', 'order' => 'r_id', 'orderType' => 'DESC');
        $resurse = $this->resurse_model->getResurseWithAtt($filtru);
        $data['resurse'] = $resurse;

        $data['main_content'] = 'admin/imaginepromo/lista';
        $this->load->view('admin/template', $data);
    }
}

