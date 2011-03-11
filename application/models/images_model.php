<?php
class Images_model extends MY_Model {
	
	var $table = 'images';

	function get($filters = array()) 	
	{
		$select = "SELECT images.*, images_categories.name AS category";
 		$from = " FROM images
 				LEFT JOIN images_categories ON images_categories.id = images.id_category";
 		$order = " ORDER BY sort";
 		
		$limit = "";
        if (isset($filters['limit'])) {
        	$limit = " LIMIT " . $filters['limit'] . " OFFSET " . $filters['offset'];
        }
        
        if (! empty($filters['id_cat']))
        {
        	$extra_cond[] = "images.id_category = '".$filters['id_cat']."'";
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
    
    function destroy($id)
    {
    	$image = $this->get_by_id($id);
    	$this->unlink_image($image['filename']);
    	$this->db->where('id', $id)->delete($this->table);
    }
    
    function unlink_image($name)
    {
    	$dirs = array(ORIGINAL_IMG_PATH, THUMB_IMG_PATH, NORMAL_IMG_PATH, ZOOM_IMG_PATH);
    	if (! empty($name))
	    {
	    	foreach ($dirs as $dir)
	    	{
    			$file = $dir . $name;
		    	if (file_exists($file)) 
		    	{
		        	unlink($file);
		        }
	    	}
    	}	
    }
    
}