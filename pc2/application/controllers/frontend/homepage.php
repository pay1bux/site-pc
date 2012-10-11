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
                    if ($eveniment['live'] == 1) {
                        $eveniment['data'] = $date;
                        $evenimenteFinal[] = $eveniment;
                    }
                }
            }
            if (count($evenimenteFinal) >= 4)
                break;
        }

        $data['evenimente'] = $evenimenteFinal;

        $data['imaginiEvenimente'] = $this->resurse_model->getUrmatoareleEvenimente(5);

        $filtru = array('tip' => 'imagine-promo', 'vizibil' => 1, 'order' => 'r_id', 'orderType' => 'DESC');
        $imaginiPromo = $this->resurse_model->getResurseWithAtt($filtru);
        $data['imaginiPromo'] = $imaginiPromo;

        $data['main_content'] = 'frontend/homepage/homepage';
        // Asa setam titlurile paginilor!
        $data['page_title'] = 'Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }
}
