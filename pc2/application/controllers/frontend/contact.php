<?php

class Contact extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    function index()
    {

        $this->load->model('email_model');
        $destinatarii = $this->email_model->getDestinatari();

        $email['destinatar'] = NULL;
        if (!strcmp($_SERVER['REQUEST_METHOD'], 'POST')) {
            $this->load->helper(array('form', 'url'));

            $postdata = $this->input->post('contact');

            $email = array(
                'nume' => $postdata['nume'],
                'email' => $postdata['email'],
                'destinatar' => $destinatarii[$postdata['destinatar'] - 1]['email'],
                'mesaj' => $postdata['mesaj']
            );
        }

        $destinatari = array(0 => "Alege destinatar");
        foreach ($destinatarii as $dest)
            $destinatari[$dest['id']] = $dest['nume'];



        if ($email['destinatar'] != NULL) {
            $this->send($email);
            $this->session->set_flashdata('contact', 'Mesajul dumneavoastra a fost trimis!');
            redirect('contact');
        }



        $data['destinatari'] = $destinatari;
        $data['main_content'] = 'frontend/contact/contact';
        $data['page_title'] = 'Contact - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }



    function send($email)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'poartacerului@gmail.com',
            'smtp_pass' => 'aceruluipoarta'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from($email['email'], $email['nume']);
        $this->email->to($email['destinatar']);
        $this->email->subject('Poarta Cerului - Contact');
        $this->email->message($email['mesaj']);
        $this->email->send();

    }
}