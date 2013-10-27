<?php

class Tip_model extends CI_Model{

    var $table = 'tip_resurse';

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

    function getTipuri(){
        $sql = "SELECT * FROM $this->table";
        $q = $this->db->query($sql);

        if($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getTipByCod($cod){
        $sql = "SELECT * FROM $this->table WHERE cod='$cod' LIMIT 1";
        $q = $this->db->query($sql);

        if($q->num_rows() > 0) {
            return $q->row();
        } else {
            return null;
        }
    }


    function getTipById($id){
        $sql = "SELECT * FROM $this->table WHERE id='$id' LIMIT 1";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }
}