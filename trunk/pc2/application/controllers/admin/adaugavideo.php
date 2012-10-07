<?php

class Adaugavideo extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $logged_in = $this->session->userdata('logged_in');
        $email = $this->session->userdata('email');
        if ($logged_in == FALSE || !$this->user_model->checkDrept($email, 'adaugare-video')) {
            redirect('login', 'refresh');
        }
    }

    function add() {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $dataAdaugarii = $this->input->post('data');
            $xml = file_get_contents("http://archives.bisericilive.com/getfeed?cid=poartaceruluiro");

            $this->load->library('xmlparser');

            $array = $this->xmlparser->GetXMLTree(strstr($xml, '<?'));

//            $data['url_nou'] = $result->url_nou;
//            $data['files'] = $result->files;

//            $fisiereCuErori = array();
//            foreach($result->files as $file) {
//
//            }

//            $data['fisiereCuErori'] = $fisiereCuErori;
        }
        $this->load->model('resurse_model');
        $filters = array("domeniu" => "video", "tip"=> "arhiva-video-programe", "order" => "data_adaugare", "orderType" => "desc", "limit" => 1);
        $last = $this->resurse_model->getResurseWithAtt($filters);
        $xml = file_get_contents("http://archives.bisericilive.com/getfeed?cid=poartaceruluiro");

        $this->load->library('xmlparser');

        $array = $this->xmlparser->GetXMLTree(strstr($xml, '<?'));
//        print_r($array);
        foreach($array['RSS'][0]['CHANNEL'][0]['ITEM'] as $i => $node) {
            if ($node['ARCHIVEDTIMESTAMP'][0]['VALUE'] > 1349371202 && $node['ARCHIVEDTIMESTAMP'][0]['VALUE'] > strtotime($last[0]['data_adaugare'])) {
                print_r($node);
                print_r(strtotime($node['PUBDATE'][0]['VALUE']));
                print_r(strtotime($last[0]['data_adaugare']));
            }
        }
//        print_r($array);
        die();

        $data['data_adaugarii'] = date("Y-m-d");

        $data['main_content'] = 'admin/adaugaaudio';
        $this->load->view('frontend/template', $data);
    }
}

