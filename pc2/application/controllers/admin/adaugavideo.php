<?php

class Adaugavideo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $logged_in = $this->session->userdata('logged_in');
        $email = $this->session->userdata('email');
    }

    function add() {
        $this->load->model('resurse_model');
        $this->load->model('atasament_model');
        $filters = array("domeniu" => "video", "tip"=> "arhiva-video-programe", "order" => "data_adaugare", "orderType" => "desc", "limit" => 1);
        $last = $this->resurse_model->getResurseWithAtt($filters);
        $xml = file_get_contents("http://archives.bisericilive.com/getfeed?cid=poartaceruluiro");

        $this->load->library('xmlparser');

        $array = $this->xmlparser->GetXMLTree(strstr($xml, '<?'));
        $items = $array['RSS'][0]['CHANNEL'][0]['ITEM'];

        $deAfisat = "";
        for($i = count($items) - 1; $i >= 0; $i--) {
            $item = $items[$i];
            if ($item['ARCHIVEDTIMESTAMP'][0]['VALUE'] > strtotime($last[0]['data_adaugare'])) {

                $guid = $item['GUID'][0]['VALUE'];
                $embed = $item['EMBED'][0]['VALUE'];
//                print_r($item);
//                print_r(strtotime($item['PUBDATE'][0]['VALUE']));

                // verifica daca mai exista atasamentul
                $atasamente = $this->atasament_model->getAtasamentArhivaByUrl($guid);

                if (!$atasamente) {
                    // Handle resursa
                    $resursa = array(
                        'titlu' => $item['TITLE'][0]['VALUE'],
                        'data' => date("Y-m-d", $item['ARCHIVEDTIMESTAMP'][0]['VALUE']),
                        'data_adaugare' => date("Y-m-d H:i:s", $item['ARCHIVEDTIMESTAMP'][0]['VALUE']),
                        'autor_id' => 1,
                        'tip_id' => 1,
                        'meniu_id' => 0
                    );
                    $resursaId = $this->resurse_model->create($resursa);

                    // Handle atasament
                    $attach = array(
                        'url' => $guid,
                        'embed' => $embed,
                        'marime' => 0,
                        'durata' => $item['RECORDINGDURATIONSECONDS'][0]['VALUE'],
                        'format' => 'flv',
                        'thumb' => $item['THUMB240'][0]['VALUE'],
                        'resurse_id' => $resursaId
                    );
                    $this->load->model('atasament_model');
                    $this->atasament_model->create($attach);

                    $deAfisat .= "<br />Adaugat: <br />";
                    $deAfisat .= $embed . "<br />";
                } else {
                    $deAfisat .= "<br />Neadaugat pentru ca exista deja: <br />";
                    $deAfisat .= $embed . "<br />";
                }
            }
        }

        if ($deAfisat == "") {
            $deAfisat = "Nu exista nimic nou in feed-ul video.";
        }

        $data['deAfisat'] = $deAfisat;

        $data['main_content'] = 'admin/adaugavideo';
        $this->load->view('frontend/template', $data);
    }
}

