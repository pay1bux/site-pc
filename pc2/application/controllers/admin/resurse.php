<?php

class Resurse extends CI_Controller {

  public $search = false;

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model');
        $logged_in = $this->session->userdata('logged_in');
        $email = $this->session->userdata('email');
        if ($logged_in == FALSE || !$this->user_model->checkDrept($email, 'administrare-resurse')) {
            redirect('login', 'refresh');
        }
    }

    function add()
    {
        if (!strcmp($_SERVER['REQUEST_METHOD'], 'POST')) {
            $this->load->helper(array('form', 'url'));

            $postdata = $this->input->post('resurse');
            $input = array(
                'titlu' => $postdata['titlu'],
                'autor_id' => $postdata['autor'],
                'tip_id' => $postdata['tip_id'],
                'categorie_id' => $postdata['categorie'],
                'continut' => $postdata['continut'],
                'data' => $postdata['data']
            );

            $this->load->model('resurse_model');
            $this->resurse_model->create($input);
            redirect('admin/lista-resurse');
        }

        $this->load->model('tip_model');
        $tipuri = $this->tip_model->getTipuri();
        $data['tipuri'] = $this->adaptArray($tipuri);

        $this->load->model('autor_model');
        $autori = $this->autor_model->getAutori();
        $data['autori'] = $this->adaptArray($autori);

        $this->load->model('categorie_model');
        $categorii = $this->categorie_model->getCategorii();
        $data['categorii'] = $this->adaptArray($categorii);

        $data['main_content'] = 'admin/resurse/edit';
        $this->load->view('admin/template', $data);
    }

    function edit($idResursa)
    {
        if (!strcmp($_SERVER['REQUEST_METHOD'], 'POST')) {
            $this->load->helper(array('form', 'url'));

            $postdata = $this->input->post('resurse');
            $input = array(
                'titlu' => $postdata['titlu'],
                'autor_id' => $postdata['autor'],
                'tip_id'=> $postdata['tip_id'],
                'categorie_id' => $postdata['categorie'],
                'continut' => $postdata['continut'],
                'data' => $postdata['data']
            );

            $this->load->model('resurse_model');
            $this->resurse_model->update($idResursa, $input);
            redirect('admin/lista-resurse');
        }

        $this->load->model('resurse_model');
        $data['form_values'] = $this->resurse_model->getResursaById($idResursa);

        $this->load->model('tip_model');
        $tipuri = $this->tip_model->getTipuri();
        $data['tipuri'] = $this->adaptArray($tipuri);

        $this->load->model('autor_model');
        $autori = $this->autor_model->getAutori();
        $data['autori'] = $this->adaptArray($autori);

        $this->load->model('categorie_model');
        $categorii = $this->categorie_model->getCategorii();
        $data['categorii'] = $this->adaptArray($categorii);
//        var_dump($data['form_values']);
//        die();

        $data['main_content'] = 'admin/resurse/edit';
        $this->load->view('admin/template', $data);
    }

    function adaptArray($arr)
    {
        $arrayBun = array();
        foreach ($arr as $ar) {
            $arrayBun[$ar["id"]] = $ar["nume"];
        }
        return $arrayBun;
    }

    function lista($tip = null, $cuvinte = null, $page = 0)
    {
        $this->load->library('pagination');
        $this->load->model('resurse_model');
        $config['per_page'] = 10;

        if($tip == null)
        {
            $tip=$cuvinte;

        }

        if($cuvinte != null)
        {
        $search=true;
        }

            if($search == true)
            {
            $cuvinte = urldecode($cuvinte);
            $data['cuvinte'] = $cuvinte;
            $cuvinte = explode(" ", $cuvinte);

            //*pentru paginare pe cautare
            $filters = array( 'count_rows' => 'true', 'cuvinte' => $cuvinte );
            $counter = $this->resurse_model->getResurseWithAtt($filters);
            $numar = $counter[0]['COUNT(*)'];

            //*cautare dupa cuvinte cheie
            $filters = array('order' => 'data_adaugare', 'orderType' => 'DESC', 'limit' => $page, 'number' => $config['per_page'], "cuvinte" => $cuvinte);
        }
        else{
            //*pentru paginarea tuturor resurselor
            $filters = array( 'count_rows' => 'true');
            $counter = $this->resurse_model->getResurseWithAtt($filters);
            $numar = $counter[0]['COUNT(*)'];


            $filters = array('order' => 'data_adaugare', 'orderType' => 'DESC', 'limit' => $page, 'number' => $config['per_page'], "cuvinte" => $cuvinte);

        }



        $this->load->library('pagination');



        $config['base_url'] = site_url('admin/lista-resurse');
        $config['total_rows'] = $numar;
        $config['per_page'] = 15;
        $config['first_url'] = '0';
        $config['num_links'] = 3;
        $config['last_link'] = '';
        $config['first_link'] = '';
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


        $resurse = $this->resurse_model->getResurseWithAtt($filters);
        $data['resurse'] = $resurse;


        $this->load->model('atasament_model');
        $nr_atasamente = $this->atasament_model->getNumarAtasamente(2);
        $data['nr_atasamente'] = $nr_atasamente;

        $data['main_content'] = 'admin/resurse/lista';
        $this->load->view('admin/template', $data);
    }

    function cautare($cuvinte) {
        $this->load->model('meniu_model');
        $this->load->model('resurse_model');
        $data['main_content'] = 'admin/resurse/lista';
        $data['page_title'] = 'Arhiva Audio - Biserica Penticostala Poarta Cerului, Timisoara';

        $cuvinte = urldecode($cuvinte);
        $data['cuvinte'] = $cuvinte;
        $cuvinte = explode(" ", $cuvinte);
        $filters = array("order" => "data_adaugare", "orderType" => "desc", "cuvinte" => $cuvinte);
        $data['resurse'] = $this->resurse_model->getResurseWithAtt($filters);

        $this->load->view('admin/template', $data);
    }


    function delete($idResursa = null) {
        if (isset($idResursa)) {
            $this->load->model('resurse_model');

            $this->load->model('atasament_model');
            $atasamente = $this->atasament_model->getAtasamenteById($idResursa);

            // Daca exista atasament vechi stergem pozele si atasamentul
            foreach($atasamente as $atasament) {
                $err = unlink($atasament['url']);
                $err = unlink($atasament['thumb']);
                $this->atasament_model->destroy($atasament['id']);
            }

            $this->resurse_model->destroy($idResursa);

        }
        redirect('admin/lista-resurse');
    }






}

