<?php

class Adaugaaudio extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $logged_in = $this->session->userdata('logged_in');
        $email = $this->session->userdata('email');
        if ($logged_in == FALSE || !$this->user_model->checkDrept($email, 'adaugare-audio')) {
            redirect('login', 'refresh');
        }
    }

    function getInfoResursa($url) {
        $this->load->model('tip_model');
        $this->load->model('meniu_model');
        $result = array();
        $url = str_replace("http://tineretpc.net/upload-arhiva-audio/", "", $url);
        $expl = explode("/", $url);

        // Cautam tipul resursei
        if (strpos($expl[0], ".mp3") === false) {
            $tip_resursa = "";
            if ($expl[0] == 'diverse')
                $tip_resursa = "diverse-audio";
            if ($expl[0] == 'marturii')
                $tip_resursa = "marturie-audio";
            if ($expl[0] == 'muzica')
                $tip_resursa = "cantec-audio";
            if ($expl[0] == 'poezii')
                $tip_resursa = "poezie-audio";
            if ($expl[0] == 'predici')
                $tip_resursa = "predica-audio";
            if ($expl[0] == 'studii')
                $tip_resursa = "studiu-audio";

            $tip_resursa_result = $this->tip_model->getTipByCod($tip_resursa);
            $tip_id = $tip_resursa_result->id;
            $result['tip_id'] = $tip_id;
        }

        // Cautam id-ul meniului unde va fi resursa
        if (isset($expl[1]) && strpos($expl[1], ".mp3") === false) {
            $meniu = $this->meniu_model->getMeniuAnume($tip_resursa, trim($expl[1]));
            $result['meniu_id'] = $meniu[0]['id'];
        }

        // Cautam id-ul submeniului unde va fi resursa
        if (isset($expl[2]) && strpos($expl[2], ".mp3") === false) {
            $meniu = $this->meniu_model->getSubmeniuAnume($tip_resursa, trim($expl[2]));
            $result['meniu_id'] = $meniu[0]['id'];
        }

        // Cautam datele din filename - titlu, autor
        if ((isset($expl[2]) && strpos($expl[2], ".mp3") !== false) || (isset($expl[3]) && strpos($expl[3], ".mp3") !== false)) {
            if (isset($expl[2]) && strpos($expl[2], ".mp3") !== false) {
                $filename = $expl[2];
            } else {
                $filename = $expl[3];
            }
            $filenameParts = explode("_", $filename);
            $result['autor'] = trim($filenameParts[0]);
            $result['titlu'] = trim($filenameParts[1]);
        }

        return $result;
    }

    function add() {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $dataAdaugarii = $this->input->post('data');
            $result = file_get_contents("http://tineretpc.net/getaudioinfodetails.php?data=" . $dataAdaugarii);
            $result = json_decode($result);
            $data['url_nou'] = $result->url_nou;
            $data['files'] = $result->files;

            $fisiereCuErori = array();
            foreach($result->files as $file) {
                // Get Info Resursa
                $info = $this->getInfoResursa($file->path);

                if (isset($info['tip_id']) && isset($info['meniu_id']) && isset($info['autor']) && isset($info['titlu']) ) {
                    // Handle autor
                    $this->load->model('autor_model');
                    $autor = $this->autor_model->getAutorByNume($info['autor']);
                    if ($autor == null) {
                        $autor_id = $this->autor_model->create(array("nume" => $info['autor']));
                    } else {
                        $autor_id = $autor['id'];
                    }

                    // Handle resursa
                    $resursa = array(
                        'titlu' => $info['titlu'],
                        'data' => $dataAdaugarii,
                        'autor_id' => $autor_id,
                        'tip_id' => $info['tip_id'],
                        'meniu_id' => $info['meniu_id']
                    );
                    $this->load->model('resurse_model');
                    $resursaId = $this->resurse_model->create($resursa);

                    // Handle atasament
                    $path_nou = $result->url_nou . basename($file->path);
                    $attach = array(
                        'url' => $path_nou,
                        'marime' => $file->size,
                        'durata' => $file->play_time,
                        'format' => 'mp3',
                        'resurse_id' => $resursaId
                    );
                    $this->load->model('atasament_model');
                    $this->atasament_model->create($attach);
                } else {
                    // Adauga in lista de erori
                    $fisiereCuErori[] = $file;
                }
            }

            $data['fisiereCuErori'] = $fisiereCuErori;
        }

        $data['data_adaugarii'] = date("Y-m-d");

        $data['main_content'] = 'admin/adaugaaudio';
        $this->load->view('admin/template', $data);
    }
}

