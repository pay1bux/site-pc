<?php

class Tip_tag_model extends CI_Model{

        var $table = 'tip_tag';

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


          function getTipuriTag(){
        $sql = "SELECT * FROM $this->table";
        $q = $this->db->query($sql);

       if($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }
}