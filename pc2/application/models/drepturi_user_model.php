<?php

class Drepturi_user_model extends CI_Model{

    var $table = 'drepturi_user';

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

    function getDrepturiUser($idUser){
        $sql = "SELECT * FROM $this->table du LEFT JOIN drepturi d on du.drepturi_id = d.id WHERE du.user_id = $idUser ORDER BY ID ASC";
        $q = $this->db->query($sql);

        if($q->num_rows() > 0) {
            $drepturiRaw = $q->result_array();
            $drepturi = array();
            foreach($drepturiRaw as $drept) {
                $drepturi[$drept['drepturi_id']] = true;
            }
            return $drepturi;
        } else {
            return null;
        }
    }

    function deleteDrepturiUser($idUser){
        $sql = "DELETE FROM $this->table WHERE user_id = $idUser";
        $this->db->query($sql);

        if ($this->db->affected_rows() === 1) {
            return TRUE;
        }
        return FALSE;
    }
}