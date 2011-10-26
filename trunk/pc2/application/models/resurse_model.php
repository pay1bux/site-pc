<?php

class Resurse_model extends CI_Model{

    var $table = 'resurse';

    function create($data) {
        $this->db->insert($this->table, $data);

        if ($this->db->affected_rows() === 1)
        {
            return $this->db->insert_id();
        }

        return FALSE;
    }

    function update($id, $data) {
        $this->db->where($this->primary_key, $id)
                ->update($this->table, $data);

        if ($this->db->affected_rows() === 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    function destroy($id) {
        $this->db->where($this->primary_key, $id)
                ->delete($this->table);

        if ($this->db->affected_rows() === 1)
        {
            return TRUE;
        }

        return FALSE;
    }

    function getUltimeleEvenimente(){
        $sql = "SELECT * FROM resurse WHERE tip_id = 7 AND data > NOW() ORDER BY data LIMIT 5";
        $q = $this->db->query($sql);

        if($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getUltimulDevotional(){
        $sql = "SELECT continut FROM resurse WHERE tip_id = 8 ORDER BY id DESC LIMIT 1";
        $q = $this->db->query($sql);

        if($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }

    function getUltimulBuletin(){
        $sql = "SELECT a.url FROM resurse r, attachment a WHERE r.tip_id = 6 AND a.resurse_id = r.id ORDER BY r.id DESC LIMIT 1";
        $q = $this->db->query($sql);

        if($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }
}