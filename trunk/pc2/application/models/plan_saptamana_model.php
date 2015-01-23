<?php

class Plan_Saptamana_model extends CI_Model
{

    var $table = 'plan_saptamana';
    var $primary_key = 'id';

    function getPlanSaptamanaByWeek($week)
    {
        $sql = "SELECT * FROM $this->table a WHERE a.id = $week";
        $q = $this->db->query($sql);
        if ($q->num_rows() >= 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

}