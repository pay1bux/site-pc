<?php

class Homepage extends CI_Controller {
	
	function index() {

        $this->load->model('resurse_model');
        $data['devotional'] = $this->resurse_model->getUltimulDevotional();

        $data['buletin'] = $this->resurse_model->getUltimulBuletin();

        $evenimenteFinal = array();
        for ($i = 0; $i < 30; $i++) {
            $date  = mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y"));
            $date = date("Y-m-d", $date);
            $evenimente = $this->resurse_model->getEvenimenteByDay($date);
            if ($evenimente != null) {
                foreach($evenimente as $eveniment) {
                    $eveniment['data'] = $date;
                    $evenimenteFinal[] = $eveniment;
                }
            }
            if (count($evenimenteFinal) >= 4)
                break;
        }

        $data['evenimente'] = $evenimenteFinal;

        $data['main_content'] = 'frontend/homepage/homepage';
        // Asa setam titlurile paginilor!
        $data['page_title'] = 'Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }
}
