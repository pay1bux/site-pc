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

    function send($email)
    {
           $this->load->library('email');

        $this->email->from($email['email'], $email['nume']);
        $this->email->to($email['destinatar']);
        $this->email->cc('another@another-example.com');
        $this->email->bcc('poartacerului@gmail.com');

        $this->email->subject('Contact Poarta Cerului');
        $this->email->message($email['mesaj']);

        $this->email->send();

        echo $this->email->print_debugger();
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