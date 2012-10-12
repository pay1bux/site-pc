<?php

class User_model extends CI_Model{

    var $table = 'user';
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

    function checkLogin($email, $password){
        $email = mysql_real_escape_string($email);
        $password = mysql_real_escape_string($password);
        $sql = "SELECT * FROM $this->table where email = '$email' AND parola = '$password'";
        $q = $this->db->query($sql);

        if($q->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function checkDrept($email, $codDrept) {
        $email = mysql_real_escape_string($email);
        $codDrept = mysql_real_escape_string($codDrept);
        $sql = "SELECT * FROM $this->table as u LEFT JOIN drepturi_user AS du ON  u.id = du.user_id
                LEFT JOIN drepturi AS d ON  du.drepturi_id = d.id
                WHERE u.email = '$email' AND d.cod = '$codDrept'";
        $q = $this->db->query($sql);

        if($q->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function getUseri(){
        $sql = "SELECT * FROM $this->table ORDER BY ID DESC";
        $q = $this->db->query($sql);

        if($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

    function getUserById($idUser){
        $sql = "SELECT * FROM $this->table u WHERE u.id = $idUser LIMIT 1";
        $q = $this->db->query($sql);

        if($q->num_rows() > 0) {
            return $q->row_array();
        } else {
            return null;
        }
    }




    function getDestinatari(){
        $sql = "SELECT id,email,nume FROM user u WHERE u.public='1' ";
        $q = $this->db->query($sql);

        if($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return null;
        }
    }

}