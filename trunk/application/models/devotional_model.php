<?php

class Devotional_model extends Model{

    function getUltimulDevotional(){
        $sql = "SELECT continut FROM resurse WHERE tip_id = ? ORDER BY id DESC LIMIT 1";
        $q = $this->db->query($sql, 8);

        if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
    }
}