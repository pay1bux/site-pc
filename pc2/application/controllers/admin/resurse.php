<?php

class Resurse extends CI_Controller {

//  public $search = false;

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

        if($cuvinte != null)
        {

            $cuvinte = urldecode($cuvinte);
            $data['cuvinte'] = $cuvinte;
            $cuvinte = explode(" ", $cuvinte);
            $toate = 1;

            $config['uri_segment'] = 6;
            $config['base_url'] = site_url('admin/lista-resurse/cauta') . '/' . $tip . '/' . $data['cuvinte'];

            //*pentru paginare pe cautare
            if( $tip != 0){
                $this->load->model('tip_model');
                $tip = $this->tip_model->getTipById($tip);
                $data['selectedTip'] = $tip['nume'];
                $tip=$tip['cod'];
                $filters = array( 'count_rows' => 'true', 'cuvinte' => $cuvinte, 'tip' => $tip);
                $toate = 0;
            }
            else
                $filters = array( 'count_rows' => 'true', 'cuvinte' => $cuvinte);


            $counter = $this->resurse_model->getResurseWithAtt($filters);
            $numar = $counter[0]['COUNT(*)'];

            //*cautare dupa cuvinte cheie
            if( $toate == 0)
                $filters = array('order' => 'data_adaugare', 'orderType' => 'DESC', 'limit' => $page, 'number' => $config['per_page'], "cuvinte" => $cuvinte, 'tip' => $tip);
            else
                $filters = array('order' => 'data_adaugare', 'orderType' => 'DESC', 'limit' => $page, 'number' => $config['per_page'], "cuvinte" => $cuvinte);

        }
        else{
            if(isset($tip))
                $page = $tip;
            else
                $tip = 0;
            //*pentru paginarea tuturor resurselor
            $config['base_url'] = site_url('admin/lista-resurse');
            $config['uri_segment'] = 3;
            $filters = array( 'count_rows' => 'true');
            $counter = $this->resurse_model->getResurseWithAtt($filters);
            $numar = $counter[0]['COUNT(*)'];

            $filters = array('order' => 'data_adaugare', 'orderType' => 'DESC', 'limit' => $page, 'number' => $config['per_page']);
        }

        $this->load->library('pagination');
        $config['total_rows'] = $numar;
        $config['first_url'] = '0';
        $config['num_links'] = 3;
        $config['last_link'] = '';
        $config['first_link'] = '';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $this->pagination->initialize($config);



        $data['paginare'] = $this->pagination->create_links();


        $resurse = $this->resurse_model->getResurseWithAtt($filters);
        $data['resurse'] = $resurse;


        $this->load->model('atasament_model');
        $nr_atasamente = $this->atasament_model->getNumarAtasamente(2);
        $data['nr_atasamente'] = $nr_atasamente;

        $this->load->model('tip_model');
        $tipuri = $this->tip_model->getTipuri();
        $data['tipuri'] = $this->adaptArray($tipuri);

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

