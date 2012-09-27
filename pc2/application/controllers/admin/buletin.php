<?php

class Buletin extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $logged_in = $this->session->userdata('logged_in');
        $email = $this->session->userdata('email');
        if ($logged_in == FALSE || !$this->user_model->checkDrept($email, 'buletin')) {
            redirect('login', 'refresh');
        }
    }

    function add($idBuletin = null) {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));

            $config['upload_path'] = FOLDER_BULETINE;
            $config['allowed_types'] = 'pdf';
            $config['max_size']	= '0';
            $config['overwrite']  = 'true';

            $this->load->model('tip_model');
            $tip_buletin = $this->tip_model->getTipByCod("buletin-duminical");
            $postdata = $this->input->post('buletin');
            $input = array(
                'titlu' => $postdata['titlu'],
                'data' => $postdata['data'],
                'autor_id' => 1,
                'categorie_id' => 1,
                'tip_id' => $tip_buletin->id
            );

            $this->load->model('resurse_model');
            if (isset($idBuletin)) {
                $this->resurse_model->update($idBuletin, $input);
                $buletinId = $idBuletin;
            } else {
                $buletinId = $this->resurse_model->create($input);
            }

            $this->load->library('upload', $config);

            if ($this->upload->do_upload()) {
                $uploadData = $this->upload->data();

                $this->load->model('atasament_model');
                // Daca e editare, se sterge poza si thumbnail-ul vechi
                if (isset($idBuletin)) {
                    $existentAttachment = $this->atasament_model->getAtasamenteById($idBuletin);
                    // Daca exista atasament vechi stergem pozele si atasamentul
                    if ($existentAttachment != null) {
                        $err = unlink($existentAttachment[0]['url']);
                        $err = unlink($existentAttachment[0]['thumb']);
                        // Delete files not in attachments, but added by convention on the file system
                        $err = unlink(FOLDER_IMAGINI_BULETINE . basename($existentAttachment[0]['url'], '.pdf') . "-pag1.png");
                        $err = unlink(FOLDER_IMAGINI_BULETINE . basename($existentAttachment[0]['url'], '.pdf') . "-pag2.png");
                        $err = unlink(FOLDER_IMAGINI_BULETINE . basename($existentAttachment[0]['url'], '.pdf') . "-pag3.png");
                        $err = unlink(FOLDER_IMAGINI_BULETINE . basename($existentAttachment[0]['url'], '.pdf') . "-pag4.png");
                        $this->atasament_model->destroy($existentAttachment[0]['id']);
                    }
                }

                $size = $uploadData['file_size'] / 1024;
                $file = $uploadData['file_name'];
                // Se face thumbnail
                $caleThumbPdf = $this->salveazaImaginePdf($uploadData['full_path']);

                $attachInput = array(
                    'url' => FOLDER_BULETINE . $file,
                    'embed' => "",
                    'marime' => $size,
                    'durata' => 0,
                    'format' => $uploadData['file_ext'],
                    'resurse_id' => $buletinId,
                    'thumb' => $caleThumbPdf
                );

                $this->atasament_model->create($attachInput);
            }
            redirect('admin/lista-buletine');
        }
        if (isset($idBuletin)) {
            $this->load->model('resurse_model');
            $filtru = array('tip' => 'buletin-duminical', 'id' => $idBuletin, 'limit' => 1);
            $buletin = $this->resurse_model->getResurseWithAtt($filtru);
            $buletin = $buletin[0];
            $data['form_values'] = $buletin;
        } else {
            $data['form_values'] = array();
        }
        $data['main_content'] = 'admin/buletin/edit';
        $this->load->view('frontend/template', $data);
    }

    function salveazaImaginePdf($caleFisier) {
        // Fa thumbnail
        $im = new Imagick();
        $im->setResolution(43, 43);
        $im->readImage($caleFisier . "[0]");
        $im->setImageResolution(100,100);
        $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
        $im->setImageFormat("png");
        $d = $im->getImageGeometry();
        $w = $d['width'];
        $h = $d['height'];
        $im->cropImage($w / 2, $h, $w / 2, 0);
        $caleImaginePdf = FOLDER_IMAGINI_BULETINE . basename($caleFisier, '.pdf') . "-thumb.png";
        $im->writeImage($caleImaginePdf);

        // Pagina 1
        $im = new Imagick();
        $im->setResolution(300, 300);
        $im->readImage($caleFisier . "[0]");
        $im->setImageResolution(100,100);
        $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
        $im->setImageFormat("png");
        $d = $im->getImageGeometry();
        $w = $d['width'];
        $h = $d['height'];
        $im->cropImage($w / 2, $h, $w / 2, 0);
        $im->writeImage(FOLDER_IMAGINI_BULETINE . basename($caleFisier, '.pdf') . "-pag1.png");
        $im->destroy();

        // Pagina 4
        $im = new Imagick();
        $im->setResolution(300, 300);
        $im->readImage($caleFisier . "[0]");
        $im->setImageResolution(100,100);
        $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
        $im->setImageFormat("png");
        $im->cropImage($w / 2, $h, 0, 0);
        $im->writeImage(FOLDER_IMAGINI_BULETINE . basename($caleFisier, '.pdf') . "-pag4.png");
        $im->destroy();

        // Pagina 3
        $im = new Imagick();
        $im->setResolution(300, 300);
        $im->readImage($caleFisier . "[1]");
        $im->setImageResolution(100,100);
        $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
        $im->setImageFormat("png");
        $im->cropImage($w / 2, $h, $w / 2, 0);
        $im->writeImage(FOLDER_IMAGINI_BULETINE . basename($caleFisier, '.pdf') . "-pag3.png");
        $im->destroy();

        // Pagina 2
        $im = new Imagick();
        $im->setResolution(300, 300);
        $im->readImage($caleFisier . "[1]");
        $im->setImageResolution(100,100);
        $im->resampleImage(30,30,imagick::FILTER_UNDEFINED,1);
        $im->setImageFormat("png");
        $im->cropImage($w / 2, $h, 0, 0);
        $im->writeImage(FOLDER_IMAGINI_BULETINE . basename($caleFisier, '.pdf') . "-pag2.png");
        $im->destroy();

        return $caleImaginePdf;
    }

    function delete($idBuletin = null) {
        if (isset($idBuletin)) {
            $this->load->model('resurse_model');

            $this->load->model('atasament_model');
            $atasamente = $this->atasament_model->getAtasamenteById($idBuletin);
            // Daca exista atasament vechi stergem pozele si atasamentul
            foreach($atasamente as $atasament) {
                $err = unlink($atasament['url']);
                $err = unlink($atasament['thumb']);
                // Delete files not in attachments, but added by convention on the file system
                $err = unlink(FOLDER_IMAGINI_BULETINE . basename($atasament['url'], '.pdf') . "-pag1.png");
                $err = unlink(FOLDER_IMAGINI_BULETINE . basename($atasament['url'], '.pdf') . "-pag2.png");
                $err = unlink(FOLDER_IMAGINI_BULETINE . basename($atasament['url'], '.pdf') . "-pag3.png");
                $err = unlink(FOLDER_IMAGINI_BULETINE . basename($atasament['url'], '.pdf') . "-pag4.png");
                $this->atasament_model->destroy($atasament['id']);
            }

            $this->resurse_model->destroy($idBuletin);

        }
        redirect('admin/lista-buletine');
    }

    function lista() {
        $this->load->model('resurse_model');
        $filtru = array('tip' => 'buletin-duminical', 'order' => 'r_id', 'orderType' => 'DESC');
        $resurse = $this->resurse_model->getResurseWithAtt($filtru);
        $data['resurse'] = $resurse;

        $data['main_content'] = 'admin/buletin/lista';
        $this->load->view('frontend/template', $data);
    }
}

