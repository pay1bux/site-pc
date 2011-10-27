<?php

class Ajax extends CI_Controller {

	function abonareBuletin() {
        $email = $this->input->post('email');
        $this->load->model('email_model');
        if ($this->email_model->findEmail($email) == null) {
            $this->email_model->create(array("email" => $email));
        } else {
            echo "Email-ul este deja inscris!";
        }
    }
}
