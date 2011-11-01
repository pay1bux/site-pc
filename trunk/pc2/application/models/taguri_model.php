<?php

class Taguri_model extends CI_Model{

    var $table = 'tag';
    var $primary_key = 'id';

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


     function getTaguriWithAllById($idResursa){
         // Stai sa ne intelegem: avem asa: nume tip tag, si valoare... altceva nu mai este
           $sql = "SELECT t.*, tt.tip_tag as nume_tip
                    FROM $this->table t, tip_tag tt
                    WHERE t.tip_tag_id = tt.id
                    AND t.resurse_id = $idResursa";

        $q = $this->db->query($sql);

        if($q->num_rows() >= 0) {
            return $q->result_array();
        } else {
            return null ;
        }
    }

     function getTagById($idTag){
          {
        $sql = "SELECT * FROM $this->table t WHERE t.id = $idTag";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }
     }


}