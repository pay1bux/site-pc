<?php

class Evenimente_model extends CI_Model{

    function getUltimeleEvenimente(){
        $sql = "SELECT * FROM resurse WHERE tip_id = ? AND data > NOW() ORDER BY data LIMIT 5";
        $q = $this->db->query($sql, 7);

        if($q->num_rows() > 0) {
            foreach ($q->result() as $row) {
                $data[] = $row;
            }
            return $data;
        } else {
            return null;
        }
    }
}