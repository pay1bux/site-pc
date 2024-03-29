<?php

class Homepage extends CI_Controller {
	
	function index() {

        $this->load->model('resurse_model');
        $this->load->model('plan_model');
        $this->load->model('plan_saptamana_model');
        $data['devotional'] = $this->resurse_model->getUltimulDevotional();

        $data['buletin'] = $this->resurse_model->getUltimulBuletin();

        $evenimenteFinal = array();
        $evenimentLive = false;
        $serverDiffFromUTC = date("Z") / 3600;
        $currentDate = new DateTime(date("d") .'-' . date('m') . '-' . date('Y') . ' Europe/Helsinki');
        $summerTime = $currentDate->format('I');
        $ourDiffFromUTC = ($summerTime == 1)? 3 : 2;
        $shiftedCurrentHour = date("G") + ($ourDiffFromUTC - $serverDiffFromUTC);
        for ($i = 0; $i < 30; $i++) {
            $date  = mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y"));
            $date = date("Y-m-d", $date);
            $evenimente = $this->resurse_model->getEvenimenteByDay($date);
            if ($evenimente != null) {
                foreach($evenimente as $eveniment) {
                    if ($eveniment['live'] == 1) {
                        if ($i == 0)
                            if ($eveniment['ora_sfarsit'] < ($shiftedCurrentHour + 1)) {
                                continue;
                            } else {
                                if ($eveniment['ora_inceput'] < ($shiftedCurrentHour + 1)) {
                                    $evenimentLive = true;
                            }
                        }
                        $eveniment['data'] = $date;
                        $evenimenteFinal[] = $eveniment;
                    }
                }
            }
            if (count($evenimenteFinal) >= 4)
                break;
        }

        // plan biblic
        $an = date("Y");
        $luna = date("m");
        $zi = date("d");
        $data['currentDate'] = date("d-m-Y");
        $dayOfYear = date("z", mktime(0, 0, 0, $luna, $zi, $an)) + 1;
        $data['dayOfYear'] = $dayOfYear;
        $weekOfYear = date("W", mktime(0, 0, 0, $luna, $zi, $an));
        $plan = $this->plan_model->getPlanByDay($dayOfYear);
        $planSaptamana = $this->plan_saptamana_model->getPlanSaptamanaByWeek($weekOfYear);

        $data['plan'] = $plan;
        $data['planSaptamana'] = $planSaptamana;

        $data['evenimente'] = $evenimenteFinal;
        $data['evenimentLive'] = $evenimentLive;

        $data['imaginiEvenimente'] = $this->resurse_model->getUrmatoareleEvenimente(5);

        $filtru = array('tip' => 'imagine-promo', 'vizibil' => 1, 'order' => 'r_id', 'orderType' => 'DESC');
        $imaginiPromo = $this->resurse_model->getResurseWithAtt($filtru);
        $data['imaginiPromo'] = $imaginiPromo;

        $data['main_content'] = 'frontend/homepage/homepage';
        // Asa setam titlurile paginilor!
        $data['page_title'] = 'Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }

    function test() {

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
                        if ($i == 0 && $eveniment['ora_sfarsit'] < (date("G") + 1)) {
                            continue;
                        }
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

        $data['main_content'] = 'frontend/homepage/test';
        // Asa setam titlurile paginilor!
        $data['page_title'] = 'Biserica Penticostala Poarta Cerului, Timisoara';

        $this->load->view('frontend/template', $data);
    }
}
