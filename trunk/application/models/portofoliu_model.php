<?php
class Portofoliu_model extends MY_Model {
	
	var $table = 'portofoliu';

	function get($filters = array()) 	
	{
		$select = "SELECT portofoliu.*, portofoliu_categories.name AS category";
 		$from = " FROM portofoliu
 				LEFT JOIN portofoliu_categories ON portofoliu_categories.id = portofoliu.id_category";
 		$order = " ORDER BY sort";
 		
		$limit = "";
        if (isset($filters['limit'])) {
        	$limit = " LIMIT " . $filters['limit'] . " OFFSET " . $filters['offset'];
        }
		
		# WHERE FILTERS
        $where = '';
	 	if(isset($extra_cond)){
			$where = ' WHERE '.implode(' AND ', $extra_cond);
		}	
 		
		$query = $select . $from . $where . $order . $limit;
		//print_a($query );
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
    
    function destroy($id_category)
    {
    	$this->db->where('id', $id_category)->delete($this->table);
    }
}