<?php

class Scoalabiblica extends CI_Controller {


	function index() {


        $data['main_content'] = 'frontend/scoalabiblica/scoalabiblica';
        $data['page_title'] = ' Scoala Biblica - Misiunea Crestina Cristos pentru Romania, Timisoara';

        $this->load->view('frontend/template', $data);
    }

}
