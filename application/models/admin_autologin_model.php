<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * User_Autologin
 *
 * This model represents user autologin data. It can be used
 * for user verification when user claims his autologin passport.
 *
 * @package	Admin Auth
 * @author	Ilya Konyukhov (http://konyukhov.com/soft/)
 */
class Admin_autologin_model extends Model
{
	private $table_name			= 'admin_autologin';
	private $admin_users_table_name	= 'admin_user';

	function __construct()
	{
		parent::__construct();

		$ci =& get_instance();
		$this->table_name		= $ci->config->item('db_table_prefix', 'admin_auth').$this->table_name;
		$this->admin_users_table_name	= $ci->config->item('db_table_prefix', 'admin_auth').$this->admin_users_table_name;
	}

	/**
	 * Get user data for auto-logged in user.
	 * Return NULL if given key or user ID is invalid.
	 *
	 * @param	int
	 * @param	string
	 * @return	object
	 */
	function get($admin_user_id, $key)
	{
		$this->db->select($this->admin_users_table_name.'.id');
		$this->db->select($this->admin_users_table_name.'.username');
		$this->db->select($this->admin_users_table_name.'.first_name');
		$this->db->select($this->admin_users_table_name.'.last_name');
		$this->db->from($this->admin_users_table_name);
		$this->db->join($this->table_name, $this->table_name.'.admin_user_id = '.$this->admin_users_table_name.'.id');
		$this->db->where($this->table_name.'.admin_user_id', $admin_user_id);
		$this->db->where($this->table_name.'.key_id', $key);
		$query = $this->db->get();
		if ($query->num_rows() == 1) return $query->row();
		return NULL;
	}

	/**
	 * Save data for user's autologin
	 *
	 * @param	int
	 * @param	string
	 * @return	bool
	 */
	function set($admin_user_id, $key)
	{
		return $this->db->insert($this->table_name, array(
			'admin_user_id' => $admin_user_id,
			'key_id'	 	=> $key,
			'admin_user_agent' 	=> substr($this->input->user_agent(), 0, 149),
			'last_ip' 		=> $this->input->ip_address(),
		));
	}

	/**
	 * Delete user's autologin data
	 *
	 * @param	int
	 * @param	string
	 * @return	void
	 */
	function delete($admin_user_id, $key)
	{
		$this->db->where('admin_user_id', $admin_user_id);
		$this->db->where('key_id', $key);
		$this->db->delete($this->table_name);
	}

	/**
	 * Delete all autologin data for given user
	 *
	 * @param	int
	 * @return	void
	 */
	function clear($admin_user_id)
	{
		$this->db->where('admin_user_id', $admin_user_id);
		$this->db->delete($this->table_name);
	}

	/**
	 * Purge autologin data for given user and login conditions
	 *
	 * @param	int
	 * @return	void
	 */
	function purge($admin_user_id)
	{
		$this->db->where('admin_user_id', $admin_user_id);
		$this->db->where('admin_user_agent', substr($this->input->user_agent(), 0, 149));
		$this->db->where('last_ip', $this->input->ip_address());
		$this->db->delete($this->table_name);
	}
}

/* End of file user_autologin.php */
/* Location: ./application/models/auth/user_autologin.php */