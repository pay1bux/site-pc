<?php

class Despre extends CI_Controller {


	function index() {


        $data['main_content'] = 'frontend/despre/despre';
        $data['page_title'] = ' Despre noi - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }

}
