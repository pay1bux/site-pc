<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| General Model
|--------------------------------------------------------------------------
|
| @package       CodeIgniter
| @subpackage    Libraries
| @license       GPLv3 <http://www.gnu.org/licenses/gpl-3.0.txt>
| @version       1.0
| @author        Andrei DEMIAN
|
*/

class MY_Model extends Model
{

	public $results_count = 0;
	protected $table = 'table';
	protected $category = 'category';	
	protected $primary_key = 'id';

	
	function get_by_id($id)
    { 
		$this->db->where($this->primary_key, $id);
		$query_db = $this->db->get($this->table);
		if($query_db->num_rows() == 1) {
			return $query_db->row_array(); 
		}      
		return FALSE;       
    }
    
    /* 	
     * 		The function gets a certain field from the default table
     * 		@params: desired_field, where_field , where_value, debug[TRUE/FALSE]
     * 
     */ 
    function get_field($field, $where_field, $where_value, $debug = FALSE)
    {
    	
    	$this->db->select($field)->from($this->table)->where($where_field, $where_value);
    	$query_db = $this->db->get();
    	
    	if($debug)
    	{
    		print_a('Arguments~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~');
    		print_a($field);
    		print_a($where_field);
    		print_a($where_value);
    		
    		print_a('SQL returned handle ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~');
    		print_a($query_db);
    		
    		print_a('DB data~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~');
    		print_a($query_db->row_array());
    	}
    	else
    	{
    		if($query_db->num_rows)
    		{
    			$results = $query_db->row_array(); 
    			return $results[$field];
    			
    		}
    		return FALSE;
    	}
    	
    }
    
	function find($id)
	{
		$query = $this->db->where($this->primary_key, $id)->get($this->table);
		
		if ($query->num_rows() == 1)
		{
			return $query->row();
		}
		
		return FALSE;
	}
	
	function get_for_select($first_option = FALSE, $field = "name") {
		$options =  array();
		if ($first_option !== FALSE)
		{
			$options[''] = $first_option;
		}	
 		$this->db->order_by($field, "asc");
 		$query_db = $this->db->get($this->table);
 		$results = $query_db->result_array();
		foreach($results as $result) {
 			$options[$result['id']] = $result[$field];
 		}
 		return $options;
    }
		
	//---------------------------------------------------------------
	
	
	function find_all($sort = 'default' , $order = 'asc')
	{
		if ($sort = 'default') $sort = $this->primary_key;
		
		$query = $this->db->order_by($sort, $order)
					->get($this->table);
		
		if ($query->num_rows() >= 1)
		{
			return $query->result();
		}
		
		return FALSE;
	}
	
	 
	//---------------------------------------------------------------
	
	
	function find_if($criteria, $sort = 'default', $order = 'asc')
	{
		if ($sort = 'default') $sort = $this->primary_key;
		
		$query = $this->db->where($criteria)
					->order_by($sort, $order) 
					->get($this->table);
	   
		if ($query->num_rows() >= 1);
		{
			return $query->result();
		}
		
		return FALSE;
	}
	
	
	//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	// CREATE, UPDATE & DESTROY FUNCTIONS
	//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	
	
	function create($data)
	{		
		$this->db->insert($this->table, $data); 
		
		if ($this->db->affected_rows() === 1)
		{
			return $this->db->insert_id();
		}
		
		return FALSE;
	}
	
	//---------------------------------------------------------------
	
	
	function update ($id, $data)
	{	
		$this->db->where($this->primary_key, $id)
					->update($this->table, $data);
		
		if ($this->db->affected_rows() === 1)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	
	//---------------------------------------------------------------
	
	
	function destroy($id)
	{	
		$this->db->where($this->primary_key, $id)			
					->delete($this->table);		
			
		if ($this->db->affected_rows() === 1)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function destroy_link($field,$id)
	{	
		$this->db->where($field, $id)			
				 ->delete($this->table);		
			
		if ($this->db->affected_rows() === 1)
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	//---------------------------------------------------------------
	
	function translation_create($data)
	{		
		$this->db->insert($this->table_translation, $data); 
		if ($this->db->affected_rows() === 1)
		{
			return $this->db->insert_id();
		}
		return FALSE;
	}
	
	function translation_get($id_item)
	{
		$results = array();
		$this->db->where($this->item_translation, $id_item);
		$query_db = $this->db->get($this->table_translation);
		if($query_db->num_rows() > 0) {
			$results = $query_db->result_array(); 
		}
		return $results;
	}
	
	function translation_update($data, $id_item, $id_language)
	{	
		$this->db->where($this->item_translation, $id_item);
		$this->db->where('id_language', $id_language);
		$this->db->update($this->table_translation, $data);
		if ($this->db->affected_rows() === 1)
		{
			return TRUE;
		}
		return FALSE;
	}
	
	function translation_exists($id_item, $id_language)
	{
		$this->db->where($this->item_translation, $id_item);
		$this->db->where('id_language', $id_language);
		$query_db = $this->db->get($this->table_translation);
		return $query_db->num_rows();
	}
	
	function is_field_available($field, $field_value, $id = 0)
	{
		$this->db->select('1', FALSE);
		$this->db->where($field, $field_value);
		if($id != 0) {
			$this->db->where('id != ', $id);
		}
		$query = $this->db->get($this->table);
		return $query->num_rows() == 0;
	}
}

/* End of file MY_model.php */
/* Location: ./application/libraries/MY_model.php */
