<?php

class Devotional extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $logged_in = $this->session->userdata('logged_in');
        $email = $this->session->userdata('email');
        if ($logged_in == FALSE || !$this->user_model->checkDrept($email, 'devotional')) {
            redirect('login', 'refresh');
        }
    }

    function add($idDevotional = null) {
        if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));

            $config['upload_path'] = 'uploads/imagini-devotional/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '0';

            $this->load->model('tip_model');
            $tip_devotional = $this->tip_model->getTipByCod("articole");
            $postdata = $this->input->post('devotional');
            $input = array(
                'titlu' => $postdata['titlu'],
                'data' => $postdata['data'],
                'autor_id' => $postdata['autor_id'],
                'categorie_id' => 1,
                'continut' => $postdata["continut"],
                'views' => 0,
                'download' => 0,
                'tip_id' => $tip_devotional->id
            );

            $this->load->model('resurse_model');
            if (isset($idDevotional)) {
                $this->resurse_model->update($idDevotional, $input);
                $devotionalId = $idDevotional;
            } else {
                $devotionalId = $this->resurse_model->create($input);
            }




            $this->load->library('upload', $config);

            if ($this->upload->do_upload()) {
                $uploadData = $this->upload->data();

                $this->load->model('atasament_model');
                // Daca e editare, se sterge poza si thumbnail-ul vechi
                if (isset($idDevotional)) {
                    $existentAttachment = $this->atasament_model->getAtasamenteById($idDevotional);
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
                $config['width'] = 142;
                $config['height'] = 121;
                $this->load->library('image_lib', $config);
                $thumbnailFilename = $uploadData['raw_name'] . $config['thumb_marker'] . $uploadData['file_ext'];

                if ( ! $this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                }

                $attachInput = array(
                    'url' => "uploads/imagini-devotional/" . $uploadData['file_name'],
                    'embed' => "",
                    'marime' => $size,
                    'durata' => 0,
                    'format' => $uploadData['file_ext'],
                    'resurse_id' => $devotionalId,
                    'thumb' => "uploads/imagini-devotional/" . $thumbnailFilename
                );

                $this->atasament_model->create($attachInput);
            }

            redirect('admin/lista-devotionale');
        }
        $this->load->model('autor_model');
        $autori = $this->autor_model->getAutori();
        $data['autori'] = $this->adaptArray($autori);

        if (isset($idDevotional)) {
            $this->load->model('resurse_model');
            $filtru = array('tip' => 'articole', 'id' => $idDevotional, 'limit' => 1);
            $devotional = $this->resurse_model->getResurseWithAtt($filtru);
            $devotional = $devotional[0];

            $data['form_values'] = $devotional;

        } else {
            $data['form_values'] = array();
        }
        $data['main_content'] = 'admin/devotional/edit';
        $this->load->view('frontend/template', $data);
    }

    function delete($idDevotional = null) {
        if (isset($idDevotional)) {
            $this->load->model('resurse_model');

            $this->load->model('atasament_model');
            $atasamente = $this->atasament_model->getAtasamenteById($idDevotional);
            // Daca exista atasament vechi stergem pozele si atasamentul
            foreach($atasamente as $atasament) {
                $err = unlink($atasament['url']);
                $err = unlink($atasament['thumb']);
                $this->atasament_model->destroy($atasament['id']);
            }


            $this->resurse_model->destroy($idDevotional);

        }

        redirect('admin/lista-devotionale');
    }

    function lista($page = 0) {
        $this->load->model('resurse_model');

        $filtru = array('tip' => 'articole', 'count_rows' => 'true');

        $counter = $this->resurse_model->getResurseWithAtt($filtru);
        $numar = $counter[0]['COUNT(*)'];

        $this->load->library('pagination');
        $config['per_page'] = 10;


        $filtru = array('tip' => 'articole', 'order' => 'r_id', 'orderType' => 'DESC', 'limit' => $page, 'number' => $config['per_page']);
        $resurse = $this->resurse_model->getResurseWithAtt($filtru);
        $data['resurse'] = $resurse;


        $config['base_url'] = site_url('admin/lista-devotionale');
        $config['total_rows'] = $numar;

        $config['first_url'] = '0';
        $config['num_links'] = 3;
        $config['last_link'] = '';
        $config['first_link'] = '';
        $config['uri_segment'] = 3;
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


        $data['main_content'] = 'admin/devotional/lista';
        $this->load->view('frontend/template', $data);
    }

    function adaptArray($arr)
    {
        $arrayBun = array();
        foreach ($arr as $ar) {
            $arrayBun[$ar["id"]] = $ar["nume"];
        }
        return $arrayBun;
    }

}


