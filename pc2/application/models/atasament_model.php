<?php

class Atasament_model extends CI_Model
{

    var $table = 'attachment';
    var $primary_key = 'id';

    function create($data)
    {
        $this->db->insert($this->table, $data);

        if ($this->db->affected_rows() === 1) {
            return $this->db->insert_id();
        }

        return FALSE;
    }

    function update($id, $data)
    {
        $this->db->where($this->primary_key, $id)
                ->update($this->table, $data);

        if ($this->db->affected_rows() === 1) {
            return TRUE;
        }

        return FALSE;
    }

    function destroy($id)
    {
        $this->db->where($this->primary_key, $id)
                ->delete($this->table);

        if ($this->db->affected_rows() === 1) {
            return TRUE;
        }

        return FALSE;
    }

    function getAtasamenteById($idResursa)
    {
        $sql = "SELECT * FROM $this->table a WHERE a.resurse_id = $idResursa";
        $q = $this->db->query($sql);
        if ($q->num_rows() >= 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }



    function getAtasament($idAtasament)
    {
        $sql = "SELECT * FROM $this->table a WHERE a.id = $idAtasament";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }

    function getNumarAtasamente($idResursa)
    {
        $sql = "SELECT id FROM $this->table a WHERE a.resurse_id = $idResursa";
        $q = $this->db->query($sql);
        return $q->num_rows;

        //        function getNumarAtasamente($idResursa){
        //        $sql = "SELECT id COUNT(id) FROM $this->table a GROUP BY id";
        //        $q = $this->db->query($sql);
        //          $numaratoare = $q->result_array();
        //            return $numaratoare;
    }

    function getAtasamentArhivaByUrl($url)
    {
        $sql = "SELECT * FROM $this->table a WHERE a.url = '$url'";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

}