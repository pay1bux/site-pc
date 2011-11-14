<?php

class Contact extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

	function index() {


         if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) {
            $this->load->helper(array('form', 'url'));

            $postdata = $this->input->post('contact');
            $input = array(
							'nume' => $postdata['nume'],
                            'email' => $postdata['email'],
                            'destinatar' => $postdata['destinatar'],
                            'mesaj' => $postdata['mesaj']
						);

            $this->load->model('email_model');
            $this->email_model->send($input);

           $this->session->set_flashdata('contact', 'Mesajul a fost trimis.');
           redirect('contact');

         }


        $this->load->model('email_model');
        $destinatarii = $this->email_model->getDestinatari();

    //   $destinatarii = $this->adaptArray($destinatarii);

       $destinatari = array(0 => "Alege destinatar");

        foreach($destinatarii as $dest)
        $destinatari[$dest['id']] = $dest['nume'];

         $data['destinatari'] = $destinatari;


        $data['main_content'] = 'frontend/contact/contact';
        $data['page_title'] = 'Contact - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);

    }


        function adaptArray($arr) {
        $arrayBun = array();
        foreach($arr as $ar) {
            $arrayBun = array(
                $ar['id'] => $ar['nume']
            );
            }
        return $arrayBun;
         }

}
