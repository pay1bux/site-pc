<?php

class Autori_importanti_model extends CI_Model
{

    var $table = 'autori_importanti';
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

    function getAutoriImportanti($tip = "") {
        $sql = "SELECT a.nume as nume, a.cod as cod_nume, t.cod as cod FROM $this->table a, tip_resurse t
                WHERE a.tip_id = t.id and t.cod = '$tip' order by a.tip_id";
        $q = $this->db->query($sql);
        if ($q->num_rows() >= 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getAutorImportant($tip, $cod_nume) {
        $sql = "SELECT a.nume as nume, a.cod as cod_nume, t.cod as cod FROM $this->table a, tip_resurse t
                WHERE a.tip_id = t.id and t.cod = '$tip' and a.cod = '$cod_nume' limit 1";
        $q = $this->db->query($sql);
        if ($q->num_rows() >= 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }
}