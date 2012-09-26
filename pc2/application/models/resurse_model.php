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

    function getResurseByTipWithAtt($codTip, $limit = 0)
    {
        $sql = "SELECT r.*, r.id as r_id, a.*, tr.*
                    FROM $this->table r, attachment a, tip_resurse tr
                    WHERE r.tip_id=tr.id AND a.resurse_id = r.id AND tr.cod='$codTip'";
                   // WHERE r.tip_id=tr.id AND a.resurse_id = r.id AND tr.cod='$codTip'";
        if ($limit != 0) {
            $sql .= " LIMIT $limit";
        }
        var_dump($sql);
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getResurseByTipWithAttLike($domeniu, $limit = 0)
    {
        $sql = "SELECT r.*, r.id as r_id, a.*, tr.*
                    FROM $this->table r, attachment a, tip_resurse tr
                    WHERE r.tip_id=tr.id AND a.resurse_id = r.id AND tr.cod LIKE '%$domeniu%'";
        if ($limit != 0) {
            $sql .= " LIMIT $limit";
        }
        $q = $this->db->query($sql);

        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getResurseWithAtt($filters)
    {
        if (isset($filters["categorie"])) {
            $sql = "SELECT r.*, r.id AS r_id, a.*, tr.*, tr.nume as nume_tip, aut.nume as nume_autor, cr.*
                        FROM $this->table AS r
                        LEFT JOIN attachment AS a ON r.id = a.resurse_id,
                        tip_resurse AS tr, autor AS aut, categorie_resurse AS cr
                        WHERE r.tip_id = tr.id AND r.autor_id = aut.id AND r.categorie_id = cr.id";
        } else {
            $sql = "SELECT r.*, r.id AS r_id, a.*, tr.*, tr.nume as nume_tip, aut.nume as nume_autor ";
            if ($filters["tip"] == 'evenimente') {
                $sql .= ", de.* ";
            }
            $sql .= "FROM $this->table AS r
                        LEFT JOIN attachment AS a ON r.id = a.resurse_id,
                        tip_resurse AS tr, autor AS aut";
            if ($filters["tip"] == 'evenimente') {
                $sql .= ", detalii_eveniment AS de ";
            }
            $sql .= "WHERE r.tip_id = tr.id AND r.autor_id = aut.id";
            if ($filters["tip"] == 'evenimente') {
                $sql .= " AND de.resurse_id = r.id";
            }
        }

        if (isset($filters["id"])) {
            $sql .= " AND r.id = " . $filters["id"];
        }

        if (isset($filters["categorie"])) {
            $sql .= " AND cr.id = '%" . $filters["categorie"] . "%'";
        }
        if (isset($filters["cuvinte"])) {
            $sql .= " AND (";
            $i = 0;
            foreach($filters['cuvinte'] as $cuvant) {
                if ($i > 0)
                    $sql .= " AND ";
                $sql .= " CONCAT_WS(' ', r.titlu, aut.nume) LIKE '%" . $cuvant . "%'";
                $i++;
            }
            $sql .= ") ";
        }
        if (isset($filters["domeniu"])) {
            $sql .= " AND tr.cod LIKE '%" . $filters["domeniu"] . "%'";
        }
        if (isset($filters["tip"])) {
            $sql .= " AND tr.cod = '" . $filters["tip"] . "'";
        }
        if (isset($filters["autor"])) {
            $sql .= " AND aut.nume = '" . $filters["autor"] . "'";
        }
        if (isset($filters["meniu"])) {
            $sql .= " AND r.meniu_id = '" . $filters["meniu"] . "'";
        }
        if (isset($filters["meniuri"])) {
            $sql .= "AND (";
            $i = 0;
            foreach($filters["meniuri"] as $meniuId) {
                if ($i > 0)
                    $sql .= " OR ";
                $sql .= "r.meniu_id = '" . $meniuId . "'";
                $i++;
            }
            $sql .= ")";
        }
        if (isset($filters["order"])) {
            $sql .= " ORDER BY " . $filters["order"] . " ";
        }
        if (isset($filters["orderType"])) {
            $sql .= " " . $filters["orderType"] . " ";
        }

        if (isset($filters["limit"])) {
            $sql .= " LIMIT " . $filters["limit"];
        }

        if (isset($filters["number"])) {
            $sql .= " , " . $filters["number"];
        }
        
        $q = $this->db->query($sql);
//        var_dump($sql);

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