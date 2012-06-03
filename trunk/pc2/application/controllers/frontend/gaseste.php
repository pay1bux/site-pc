<?php

class Gaseste extends CI_Controller {


	function index() {


        $data['main_content'] = 'frontend/gaseste/gaseste';
        $data['page_title'] = ' Gaseste-ti locul - Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }

}
