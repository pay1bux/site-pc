<?php

class Meniu_model extends CI_Model
{

    var $table = 'meniu';
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

    function getMeniuAudio() {
        $sql = "SELECT a.nume as nume, a.cod as cod_nume, t.cod as cod FROM $this->table a, tip_resurse t
                WHERE a.tip_id = t.id and t.cod like '%audio' order by a.tip_id";
        $q = $this->db->query($sql);
        if ($q->num_rows() >= 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getMeniu($tip = "") {
        $sql = "SELECT a.id as id, a.nume as nume, a.cod as cod_nume, t.cod as cod FROM $this->table a, tip_resurse t
                WHERE a.tip_id = t.id AND t.cod = '$tip' AND a.parinte IS NULL ORDER BY a.tip_id";
        $q = $this->db->query($sql);
        if ($q->num_rows() >= 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getMeniuAnume($tip, $cod_nume) {
        $sql = "SELECT a.id as id, a.nume as nume, a.cod as cod_nume, t.cod as cod FROM $this->table a, tip_resurse t
                WHERE a.tip_id = t.id AND t.cod = '$tip' AND a.cod = '$cod_nume' AND a.parinte IS NULL LIMIT 1";
        $q = $this->db->query($sql);

        if ($q->num_rows() >= 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getSubmeniu($tip, $id_parinte) {
        $sql = "SELECT a.parinte as parinte, a.nume as nume, a.cod as cod_nume, t.cod as cod FROM $this->table a, tip_resurse t
                WHERE a.tip_id = t.id AND t.cod = '$tip' AND a.parinte = '$id_parinte' LIMIT 1";
        $q = $this->db->query($sql);

        if ($q->num_rows() >= 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getSubmeniuAnume($tip, $cod_nume) {
        $sql = "SELECT a.id as id, a.nume as nume, a.cod as cod_nume, t.cod as cod FROM $this->table a, tip_resurse t
                WHERE a.tip_id = t.id AND t.cod = '$tip' AND a.cod = '$cod_nume'  LIMIT 1";
        $q = $this->db->query($sql);

        if ($q->num_rows() >= 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getIduri($tip, $id_parinte) {
        $sql = "SELECT a.id as id FROM $this->table a, tip_resurse t
                WHERE a.tip_id = t.id AND t.cod = '$tip' AND (a.parinte = $id_parinte OR a.id = $id_parinte)";
        $q = $this->db->query($sql);

        if ($q->num_rows() >= 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }
}