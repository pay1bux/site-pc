<?php

class Audio extends CI_Controller {

    var $tipuri = array("cele-mai-noi" => array("nume" => "Cele mai noi", "cod" => "")
                        , "cele-mai-ascultate" => array("nume" => "Cele mai ascultate", "cod" => "")
                        , "predici" => array("nume" => "Predici", "cod" => TIP_PREDICA_AUDIO)
                        , "studii" => array("nume" => "Studii", "cod" => TIP_STUDIU_AUDIO)
                        , "muzica" => array("nume" => "Muzica", "cod" => TIP_CANTEC_AUDIO)
                        , "poezii" => array("nume" => "Poezii", "cod" => TIP_POEZIE_AUDIO)
                        , "marturii" => array("nume" => "Marturii", "cod" => TIP_MARTURIE_AUDIO)
                        , "diverse" => array("nume" => "Diverse", "cod" => TIP_DIVERSE_AUDIO));
	
	function index($tip = "cele-mai-noi", $autor = null, $album = null) {

        $data['main_content'] = 'frontend/resurse/audio';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $result = $this->getResurseDupaTip($tip, $autor, $album);

        $data['audio'] = $result['audio'];
        $data['selected'] = $result['selected'];
        $data['submenus'] = $result['submenus'];
        $data['selected_submenus'] = $autor;
        $data['albume'] = $result['albume'];
        $data['selected_albume'] = $album;
        $data['meniu'] = $this->tipuri;

        $this->load->view('frontend/template', $data);
    }

    function cautare($cuvinte) {
        $this->load->model('meniu_model');
        $this->load->model('resurse_model');
        $data['main_content'] = 'frontend/resurse/audio';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $data['meniu'] = $this->tipuri;
        $data['selected'] = 'cautare';
        $data['submenus'] = array();
        $cuvinte = urldecode($cuvinte);
        $data['cuvinte'] = $cuvinte;
        $cuvinte = explode(" ", $cuvinte);
        $filters = array("domeniu" => "audio", "order" => "data_adaugare", "orderType" => "desc", "cuvinte" => $cuvinte);
        $data['audio'] = $this->resurse_model->getResurseWithAtt($filters);

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
            if ($tip == "cele-mai-noi") {
                $filters = array("domeniu" => "audio", "order" => "data_adaugare", "orderType" => "desc");
            } else {
                $filters = array("domeniu" => "audio", "order" => "views", "orderType" => "desc");
            }
        } else {
            $filters = array("tip" => $this->tipuri[$tip]["cod"], "order" => "data_adaugare", "orderType" => "desc");
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
