<?php

class Plan_model extends CI_Model
{

    var $table = 'plan';
    var $primary_key = 'id';

    function getPlanByDay($day)
    {
        $sql = "SELECT * FROM $this->table a WHERE a.ziua = $day";
        $q = $this->db->query($sql);
        if ($q->num_rows() >= 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

}