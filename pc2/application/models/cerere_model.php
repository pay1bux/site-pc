<?php

class Cerere_model extends CI_Model{

    var $table = 'cereri';

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

    function getCereri($filters)
    {
        $sql = "SELECT  nume, localitate, continut, id, data, public FROM cereri WHERE public = 1 ORDER BY id DESC";

        if (isset($filters["limit"])) {
            $sql .= " LIMIT " . $filters["limit"];
        }

        if (isset($filters["number"])) {
            $sql .= " , " . $filters["number"];
        }

        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }
    function countCereri()
    {
        $sql = "SELECT COUNT(id) FROM cereri WHERE public = 1";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }




    }