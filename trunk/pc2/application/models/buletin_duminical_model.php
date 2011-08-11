<?php

class Buletin_duminical_model extends CI_Model {

    function getUltimulBuletin(){

        $sql = $this->db->query("SELECT a.url FROM resurse r, attachment a WHERE r.tip_id = 6 AND a.resurse_id = r.id ORDER BY r.id DESC LIMIT 1");

        if($sql->num_rows() > 0) {
            foreach($sql->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
}