<?php

class Video extends CI_Controller {

    var $tipuri = array("cele-mai-noi" => array("nume" => "Cele mai noi", "cod" => "")
    , "cele-mai-ascultate" => array("nume" => "Cele mai ascultate", "cod" => "")
    , "arhiva-video-tineret" => array("nume" => "Tineret", "cod" => TIP_ARHIVA_VIDEO_TINERET)
    , "studiu-video" => array("nume" => "Studii", "cod" => TIP_STUDIU_VIDEO)
    , "arhiva-video-evenimente" => array("nume" => "Evenimente", "cod" => TIP_ARHIVA_VIDEO_EVENIMENTE)
    , "arhiva-video" => array("nume" => "Arhiva", "cod" => TIP_ARHIVA_VIDEO));

    function index($tip = "cele-mai-noi", $autor = null, $album = null, $page=0) {

        $data['main_content'] = 'frontend/resurse/video';
        $data['page_title'] = 'Arhiva Video - Biserica Penticostala Poarta Cerului, Timisoara';

        if(is_numeric($autor))
        {
            $page=$autor;
            $autor= null;
        }
        if(is_numeric($album))
        {
            $page=$album;
            $album=null;
        }

        $result = $this->getResurseDupaTip($tip, $autor, $album, $page);

        $data['video'] = $result['video'];
        $data['selected'] = $result['selected'];
        $data['submenus'] = $result['submenus'];
        $data['selected_submenus'] = $autor;
        $data['albume'] = $result['albume'];
        $data['selected_albume'] = $album;
        $data['meniu'] = $this->tipuri;
        $data['paginare'] =  $result['paginare'];

        $this->load->view('frontend/template', $data);
    }

    function cautare($cuvinte, $page= 0 ) {
        $this->load->model('meniu_model');
        $this->load->model('resurse_model');
        $data['main_content'] = 'frontend/resurse/video';
        $data['page_title'] = 'Arhiva Video - Biserica Penticostala Poarta Cerului, Timisoara';

        $data['meniu'] = $this->tipuri;
        $data['selected'] = 'cautare';
        $data['submenus'] = array();
        $cuvinte = urldecode($cuvinte);
        $cautare = $cuvinte;
        $data['cuvinte'] = $cuvinte;
        $cuvinte = explode(" ", $cuvinte);


        $filtru = array("domeniu" => "video", "order" => "data_adaugare", "orderType" => "desc", "cuvinte" => $cuvinte, 'count_rows' => 'true');

        $counter = $this->resurse_model->getResurseWithAtt($filtru);
        $numar = $counter[0]['COUNT(*)'];
$data['cautare_total']= $numar;
        $this->load->library('pagination');
        $config['per_page'] = 9;
        $config['base_url'] = site_url('arhiva-video/cautare/'.$cautare);
        $config['total_rows'] = $numar;

        $config['first_url'] = '0';
        $config['num_links'] = 3;
        $config['last_link'] = '';
        $config['first_link'] = '';
        $config['uri_segment'] = 4;
        $config['num_tag_open'] = '<div class="pagina_s">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<div class="pagina_a">';
        $config['cur_tag_close'] = '</div>';

        $config['prev_tag_open'] = '<div class="pagina_b">';
        $config['prev_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="pagina_b">';
        $config['next_tag_close'] = '</div>';


        $this->pagination->initialize($config);

        $data['paginare'] = $this->pagination->create_links();


        $filters = array("domeniu" => "video", "order" => "data_adaugare", "orderType" => "desc", "cuvinte" => $cuvinte, 'limit' => $page, 'number' => $config['per_page']);
        $data['video'] = $this->resurse_model->getResurseWithAtt($filters);

        $this->load->view('frontend/template', $data);
    }

    function getResurseDupaTip($tip, $autor = null, $album = null, $page) {
        $this->load->model('meniu_model');
        if (isset($autor))
            $meniu = $this->meniu_model->getMeniuAnume($this->tipuri[$tip]["cod"], $autor);
        if (isset($album))
            $meniuAlbum = $this->meniu_model->getSubmeniuAnume($this->tipuri[$tip]["cod"], $album);

        $this->load->model('resurse_model');
        $config['per_page'] = 12; // limita pe pagina * trebuie aici sus.
        $filters = array();
        $filtersCount = array();
        if ($this->tipuri[$tip]["cod"] == "") {
            if ($tip == "cele-mai-noi") {
                $config['per_page'] = 9;
                $filters = array("domeniu" => "video", "order" => "data_adaugare", "orderType" => "desc", "limit" => $page, "number" => $config['per_page']);
                $filtersCount = array("domeniu" => "video", 'count_rows' => 'true');
            } else {
                $filters = array("domeniu" => "video", "order" => "views", "orderType" => "desc", "limit" => $page, "number" => $config['per_page']);
                $filtersCount = array("domeniu" => "video", 'count_rows' => 'true');
            }
        } else {
            $filters = array("tip" => $this->tipuri[$tip]["cod"], "order" => "data_adaugare", "orderType" => "desc", "limit" => $page, "number" => $config['per_page']);
            $filtersCount = array("tip" => $this->tipuri[$tip]["cod"], 'count_rows' => 'true');
            if (isset($album)) {
                $filters["meniu"] = $meniuAlbum[0]["id"];
                $filtersCount["meniu"] = $meniuAlbum[0]["id"];
            } else {
                if (isset($autor)) {
                    $iduri = $this->meniu_model->getIduri($this->tipuri[$tip]["cod"], $meniu[0]["id"]);
                    $iduriBune = array();
                    foreach ($iduri as $id)
                        $iduriBune[] = $id["id"];
                    $filters["meniuri"] = $iduriBune;
                    $filtersCount["meniuri"] = $iduriBune;
                }
            }
        }

        //* PAGINAREA

        $counter = $this->resurse_model->getResurseWithAtt($filtersCount);

        $numar = $counter[0]['COUNT(*)'];


        $this->load->library('pagination');
        $config['base_url'] = site_url('arhiva-video/'.$tip.'/'.$autor.'/'.$album);
        $config['total_rows'] = $numar;

        $config['first_url'] = '0';
        $config['num_links'] = 2;
        $config['last_link'] = '';
        $config['first_link'] = '';

        if(isset($autor)) {
            $config['uri_segment'] = 4; }
        if(isset($album)) {
            $config['uri_segment'] = 5; }

        $config['num_tag_open']='<div class="pagina_s">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<div class="pagina_a">';
        $config['cur_tag_close'] = '</div>';

        $config['prev_tag_open'] = '<div class="pagina_b">';
        $config['prev_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="pagina_b">';
        $config['next_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        //* END OF PAGINAREA

        $result = array();
        $result['video'] = $this->resurse_model->getResurseWithAtt($filters);
        $result['selected'] = $tip;
        $result['paginare'] =  $this->pagination->create_links();
        $result['submenus'] = $this->meniu_model->getMeniu($this->tipuri[$tip]["cod"]);
        if ($autor != null) {
            $result['albume'] = $this->meniu_model->getSubmeniu($this->tipuri[$tip]["cod"], $meniu[0]["id"]);
        } else {
            $result['albume'] = array();
        }

        return $result;
    }
}
