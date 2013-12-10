<?php

class Ajax extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }


    function abonareBuletin() {
        $email = $this->input->post('email');
        $this->load->model('email_model');
        if ($this->email_model->findEmail($email) == null) {
            $this->email_model->create(array("email" => $email));
            echo "ok";
        } else {
            echo "ok";
        }
    }

    function adaugaCerere()
    {
        $data = array(
            'nume' => $_POST['nume'],
            'localitate' => $_POST['localitate'],
            'continut' => $_POST['mesaj'],
            'public' => intval($_POST['public'])
        );

        $this->load->model('cerere_model');
        $this->cerere_model->create($data);
    }


    function trimiteEmail()
    {

        $this->load->model('user_model');
        $destinatarii = $this->user_model->getDestinatari();
        foreach ($destinatarii as $dest)
            $destinatarii2[$dest['id']] = $dest['email'];


        $data = array(
            'nume' => $_POST['nume'],
            'email' => $_POST['email'],
            'dest' => $_POST['dest'],
            'mesaj' => $_POST['mesaj']
        );
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'poartacerului@gmail.com',
            'smtp_pass' => 'aceruluipoarta'
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->from($data['email'], $data['nume']);
        $this->email->to($destinatarii2[$data['dest']]);
        $this->email->subject('Poarta Cerului - Contact');
        $this->email->message("Mesaj de la: ".$data['email'].' --- '.$data['mesaj']);
        $this->email->send();



    }

}
