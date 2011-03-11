<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Auth {
	
	protected
    	$profile        = null,
		$groups         = null,
    	$permissions    = null;
	
	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->model('Admin_user_model');
		
		$this->CI->load->config('admin_auth', TRUE);
		
		// Try to autologin
		$this->autologin();
	}
	
	function get_id()
	{
		return $this->CI->session->userdata('admin_auth_user_id');
	}
	
	function get_profile()
	{
		return $this->CI->Admin_user_model->get_by_id($this->get_id());
	}
	
	function login($username, $password, $remember = FALSE)
	{
		$user = $this->CI->Admin_user_model->get_by_username_and_password($username, $password);
		if ($remember) {
			$this->create_autologin($user['id']);
		}
		
		$this->_set_session($user); 
		$this->_set_last_ip_and_last_login($user['id']);	
	}
	
	function _set_session($data)
	{
		// Set session data array
		$user = array(						
			'admin_auth_user_id'  => $data['id'],
			'admin_auth_username' => $data['username'],
			'admin_auth_name'     => $data['first_name'] . ' ' . $data['last_name'],
			'admin_logged_in'	  => TRUE
		);

		$this->CI->session->set_userdata($user);
	}
	
	
	function is_logged_in()
	{
		return $this->CI->session->userdata('admin_logged_in');
	}
	
	function logout()
	{
		$this->delete_autologin();
		
		$this->CI->session->unset_userdata('admin_logged_in');
		$this->CI->session->unset_userdata('admin_auth_user_id');
		$this->CI->session->unset_userdata('admin_auth_username');
		$this->CI->session->unset_userdata('admin_auth_name');	
	}
	
	/**
	 * Save data for user's autologin
	 *
	 * @param	int
	 * @return	bool
	 */
	private function create_autologin($user_id)
	{
		$this->CI->load->helper('cookie');
		$key = substr(md5(uniqid(rand().get_cookie($this->CI->config->item('sess_cookie_name')))), 0, 16);

		//echo $key;
		$this->CI->load->model('Admin_autologin_model');
		$this->CI->Admin_autologin_model->purge($user_id);

		if ($this->CI->Admin_autologin_model->set($user_id, md5($key))) {
			set_cookie(array(
					'name' 		=> $this->CI->config->item('admin_autologin_cookie_name', 'admin_auth'),
					'value'		=> serialize(array('admin_user_id' => $user_id, 'key' => $key)),
					'expire'	=> $this->CI->config->item('admin_autologin_cookie_life', 'admin_auth'),
			));
						
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * Clear user's autologin data
	 *
	 * @return	void
	 */
	private function delete_autologin()
	{
		$this->CI->load->helper('cookie');
		if ($cookie = get_cookie($this->CI->config->item('admin_autologin_cookie_name', 'admin_auth'), TRUE)) {

			$data = unserialize($cookie);

			$this->CI->load->model('Admin_autologin_model');
			$this->CI->Admin_autologin_model->delete($data['admin_user_id'], md5($data['key']));

			delete_cookie($this->CI->config->item('admin_autologin_cookie_name', 'admin_auth'));
		}
	}

	/**
	 * Login user automatically if he/she provides correct autologin verification
	 *
	 * @return	void
	 */
	private function autologin()
	{
		
		if (!$this->is_logged_in() AND !$this->is_logged_in(FALSE)) {			// not logged in (as any user)
			
			$this->CI->load->helper('cookie');
			if ($cookie = get_cookie($this->CI->config->item('admin_autologin_cookie_name', 'admin_auth'), TRUE)) {

				$data = unserialize($cookie);
				//print_a($data);

				if (isset($data['key']) AND isset($data['admin_user_id'])) {

					$this->CI->load->model('Admin_autologin_model');
					if (!is_null($user = $this->CI->Admin_autologin_model->get($data['admin_user_id'], md5($data['key'])))) {

						$this->CI->session->set_userdata(array(						
							'admin_auth_user_id'  => $user->id,
							'admin_auth_username' => $user->username,
							'admin_auth_name'     => $user->first_name . ' ' . $user->last_name,
							'admin_logged_in'	  => TRUE
						));
						
						
						$this->_set_last_ip_and_last_login($user->id);	

						// Renew users cookie to prevent it from expiring
						set_cookie(array(
								'name' 		=> $this->CI->config->item('admin_autologin_cookie_name', 'admin_auth'),
								'value'		=> $cookie,
								'expire'	=> $this->CI->config->item('admin_autologin_cookie_life', 'admin_auth'),
						));

					}
					
				}
			}
			
		}
		
		return FALSE;
	}

	
	// Set last ip and last login function when user login
	function _set_last_ip_and_last_login($user_id)
	{
		$data['last_ip'] = $this->CI->input->ip_address();
		$data['last_login'] = date('Y-m-d H:i:s', time());
		$this->CI->Admin_user_model->update($user_id, $data);
	}
	
	
}
?>