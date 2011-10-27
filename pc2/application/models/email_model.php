<?php

class Email_model extends CI_Model{

    var $table = 'email';

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

    function findEmail($email){
        $sql = "SELECT email FROM email WHERE email = '$email' LIMIT 1";
        $q = $this->db->query($sql);

        if($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }

}