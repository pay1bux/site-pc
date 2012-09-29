<?php

class Video extends CI_Controller {

	function index($tip = "cele-mai-noi", $autor = null, $album = null) {

        $data['main_content'] = 'frontend/resurse/video';
        $data['page_title'] = 'Arhiva Video - Biserica Penticostala Poarta Cerului, Timisoara';

        $result = $this->getResurseDupaTip($tip, $autor, $album);



        $this->load->view('frontend/template', $data);
    }



    function getResurseDupaTip($tip, $autor = null, $album = null) {
        $this->load->model('meniu_model');
        if (isset($autor))
            $meniu = $this->meniu_model->getMeniuAnume($this->tipuri[$tip]["cod"], $autor);
        if (isset($album))
            $meniuAlbum = $this->meniu_model->getSubmeniuAnume($this->tipuri[$tip]["cod"], $album);

        $this->load->model('resurse_model');
        $filters = array();
        if ($this->tipuri[$tip]["cod"] == "") {
            if ($tip == "celeMaiNoi") {
                $filters = array("domeniu" => "audio", "order" => "data_adaugare", "orderType" => "desc");
            } else {
                $filters = array("domeniu" => "audio", "order" => "views", "orderType" => "desc");
            }
        } else {
            $filters = array("tip" => $this->tipuri[$tip]["cod"], "order" => "views", "orderType" => "desc");
            if (isset($album)) {
                $filters["meniu"] = $meniuAlbum[0]["id"];
            } else {
                if (isset($autor)) {
                    $iduri = $this->meniu_model->getIduri($this->tipuri[$tip]["cod"], $meniu[0]["id"]);
                    $iduriBune = array();
                    foreach ($iduri as $id)
                        $iduriBune[] = $id["id"];
                    $filters["meniuri"] = $iduriBune;
                }
            }
        }

        $result = array();
        $result['audio'] = $this->resurse_model->getResurseWithAtt($filters);
        $result['selected'] = $tip;
        $result['submenus'] = $this->meniu_model->getMeniu($this->tipuri[$tip]["cod"]);
        if ($autor != null) {
            $result['albume'] = $this->meniu_model->getSubmeniu($this->tipuri[$tip]["cod"], $meniu[0]["id"]);
        } else {
            $result['albume'] = array();
        }

        return $result;
    }
}
