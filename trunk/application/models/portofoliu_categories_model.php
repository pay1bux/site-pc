<?php
class Portofoliu_categories_model extends MY_Model {
	
	var $table = 'portofoliu_categories';

	function get($filters = array()) 	
	{
		$select = "SELECT portofoliu_categories.*";
 		$from = " FROM portofoliu_categories";
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
    	$CI = & get_instance();
    	$query = "SELECT `portofoliu`.`id` FROM `portofoliu`  WHERE `id_category`='".$id_category."'";
    	$query_db = $this->db->query($query);
        $results = $query_db->result_array();
    	foreach ($results as $result)
    	{
    		$CI->Portofoliu_model->destroy($result['id']);
    	}
    	//delete category
    	$this->db->where('id', $id_category)->delete($this->table);
    }
    
	function get_for_select($first_option = FALSE) {
		$options =  array();
		if ($first_option !== FALSE)
		{
			$options[''] = $first_option;
		}	
 		$this->db->order_by('sort', "asc");
 		$query_db = $this->db->get($this->table);
 		$results = $query_db->result_array();
		foreach($results as $result) {
 			$options[$result['id']] = $result['name'];
 		}
 		return $options;
    }
    
	function get_all($filters = array()) 	
	{
		$query = "SELECT portofoliu_categories.* FROM portofoliu_categories ORDER BY sort";
 		$query_db = $this->db->query($query);
 		$results =  $query_db->result_array();
 		foreach ($results as $i => $result) 
 		{
 			$query = "SELECT portofoliu.* FROM portofoliu WHERE id_category = '".$result['id']."' ORDER BY sort";
 			$query_db = $this->db->query($query);
 			$results[$i]['items'] = $query_db->result_array();
 		}
 		return $results;
    }
}