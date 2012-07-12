<?php

class Audio extends CI_Controller {

    var $tipuri = array("cele-mai-noi" => array("nume" => "Cele mai noi", "cod" => "")
                        , "cele-mai-ascultate" => array("nume" => "Cele mai ascultate", "cod" => "")
                        , "predici" => array("nume" => "Predici", "cod" => TIP_PREDICA_AUDIO)
//                        , "studii" => array("nume" => "Studii", "cod" => TIP_STUDIU_AUDIO)
                        , "muzica" => array("nume" => "Muzica", "cod" => TIP_CANTEC_AUDIO)
                        , "poezii" => array("nume" => "Poezii", "cod" => TIP_POEZIE_AUDIO)
                        , "marturii" => array("nume" => "Marturii", "cod" => TIP_MARTURIE_AUDIO)
                        , "diverse" => array("nume" => "Diverse", "cod" => TIP_DIVERSE_AUDIO));
	
	function index($tip = "cele-mai-noi", $autor = null) {

        $data['main_content'] = 'frontend/resurse/audio';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $result = $this->getResurseDupaTip($tip, $autor);

        $data['audio'] = $result['audio'];
        $data['selected'] = $result['selected'];
        $data['submenus'] = $result['submenus'];
        $data['meniu'] = $this->tipuri;

        $this->load->view('frontend/template', $data);
    }

    function getResurseDupaTip($tip, $autor = null) {
        $this->load->model('autori_importanti_model');
        $autor_complex = $this->autori_importanti_model->getAutorImportant($this->tipuri[$tip]["cod"], $autor);

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
            if (isset($autor)) {
                $filters["autor"] = $autor_complex[0]["nume"];
            }
        }

        $result = array();
        $result['audio'] = $this->resurse_model->getResurseWithAtt($filters);
        $result['selected'] = $tip;
        $result['submenus'] = $this->autori_importanti_model->getAutoriImportanti($this->tipuri[$tip]["cod"]);

        return $result;
    }
}
