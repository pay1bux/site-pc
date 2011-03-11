<?php 
class Admin_user_model extends MY_Model {
	
	var $table = 'admin_user';
	
	function get($filters = array()) 	
	{
		$select = "SELECT admin_user.*";
 		$from = " FROM admin_user";
 		$order = " ORDER BY first_name";
 		
		$limit = "";
        if (isset($filters['limit'])) {
        	$limit = " LIMIT " . $filters['limit'] . " OFFSET " . $filters['offset'];
        }
 		
        $where = "";
        
		$query = $select . $from . $where . $order . $limit;
 		$query_db = $this->db->query($query);
 		$results =  $query_db->result_array();
 		
 		//count all
 		$count_select = "SELECT COUNT(1) as count";
		$query = $count_select . $from . $where;
		$query_db = $this->db->query($query);
        $nr_results = $query_db->result_array();
       	$this->results_count = $nr_results[0]['count'];
 		
 		return $results;
    }
	
	function get_by_username_and_password($username, $password)
    { 
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$query_db = $this->db->get($this->table);
		if($query_db->num_rows() == 1) {
			return $query_db->row_array(); 
		}      
		return FALSE;  
    }
    
	function get_to_notify()
    { 
		//$this->db->where('recv_emails', 1);
		$query_db = $this->db->get($this->table);
		return $query_db->result_array(); 
    }
	
}
/* End of file Admin_user_model.php */
/* Location: ./system/models/admin_user_model.php */