<?php

class Resurse_model extends CI_Model
{

    var $table = 'resurse';
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

    function getUltimeleEvenimente()
    {
        $sql = "SELECT * FROM resurse WHERE tip_id = 7 AND data > NOW() ORDER BY data LIMIT 5";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getUltimulDevotional()
    {
        $sql = "SELECT titlu, continut, id FROM resurse WHERE tip_id = 8 ORDER BY id DESC LIMIT 1";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }

    function getUltimulBuletin()
    {
        $sql = "SELECT a.url FROM resurse r, attachment a WHERE r.tip_id = 6 AND a.resurse_id = r.id ORDER BY r.id DESC LIMIT 1";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }

    function getResurse()
    {
        $sql = "SELECT * FROM $this->table";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getResurseWithAll()
    {
        $sql = "SELECT r.*, a.nume as autor_nume, c.nume as categorie_nume, t.nume as tip_nume
                    FROM $this->table r, autor a, tip_resurse t, categorie_resurse c
                    WHERE r.autor_id = a.id AND r.tip_id = t.id AND r.categorie_id = c.id
                    ORDER BY ID DESC";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getResurseWithAllById($idResursa)
    {
        $sql = "SELECT r.*, a.nume as autor_nume, c.nume as categorie_nume, t.nume as tip_nume
                    FROM $this->table r, autor a, tip_resurse t, categorie_resurse c
                    WHERE r.autor_id = a.id AND r.tip_id = t.id AND r.categorie_id = c.id AND r.id = $idResursa";

        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }

    function getResursaById($idResursa)
    {
        $sql = "SELECT * FROM resurse r where r.id = $idResursa LIMIT 1";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }


    function getResursaByTip($idTip)
    {
        $sql = "SELECT * FROM resurse r where r.tip_id = $idTip";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getResurseByTipWithAtt($codTip, $limit = 10)
    {
        $sql = "SELECT r.*, r.id as r_id, a.*, tr.*
                    FROM $this->table r, attachment a, tip_resurse tr
                    WHERE r.tip_id=tr.id AND a.resurse_id = r.id AND tr.cod='$codTip'
                    LIMIT $limit";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function countResurseByTipWithAtt($codTip)
    {
        $sql = "SELECT r.*, r.id as r_id, a.*, tr.*
                    FROM $this->table r, attachment a, tip_resurse tr
                    WHERE r.tip_id=tr.id AND a.resurse_id = r.id AND tr.cod='$codTip'";
        $q = $this->db->query($sql);

        return $q->num_rows();

        }


    function getResurseByIdAndTip($codTip, $idResursa)
    {
        $sql = "SELECT r.*
                    FROM $this->table r, tip_resurse tr
                    WHERE r.tip_id = tr.id AND tr.cod = '$codTip' and r.id = $idResursa";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }

    function nextResursaByIdAndTip($codTip, $idResursa)
              {
        $sql = "SELECT r.*
                    FROM $this->table r, tip_resurse tr
                    WHERE r.tip_id = tr.id AND tr.cod = '$codTip' and r.id > $idResursa ORDER BY r.id ASC LIMIT 1 ";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }

        function prevResursaByIdAndTip($codTip, $idResursa)
              {
        $sql = "SELECT r.*
                    FROM $this->table r, tip_resurse tr
                    WHERE r.tip_id = tr.id AND tr.cod = '$codTip' and r.id < $idResursa ORDER BY r.id DESC LIMIT 1 ";
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }
    

}