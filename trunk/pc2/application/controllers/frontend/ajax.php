<?php

class Ajax extends CI_Controller {

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


}
