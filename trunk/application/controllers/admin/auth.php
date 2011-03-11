<?php
class Auth extends Controller {
	
	function login() 
	{
		if ($this->admin_auth->is_logged_in()) 
		{
			redirect('admin/portofoliu/browse');
		}
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_login');	 
		$this->form_validation->set_rules('password', 'Password', 'trim|required');	 	
		$this->form_validation->set_rules('remember_me', 'Remember me', 'integer');
		$this->form_validation->set_message('check_login','Invalid login. Please try again.');
		
		if ($this->form_validation->run() == TRUE)
		{
            $this->admin_auth->login($this->input->post('username'), md5($this->input->post('password')),$this->input->post('remember_me') );   
			redirect('admin/portofoliu/browse');
		}
		
		$this->load->view('admin/auth/login');
	}
	
	public function check_login() 
	{
		$this->load->model('Admin_user_model');
        $user = $this->Admin_user_model->get_by_username_and_password($this->input->post('username'), md5($this->input->post('password')));
        if($user != FALSE) 
        {
        	return TRUE;
        }
        return FALSE;
	}
	
	public function logout() 
	{
		$this->admin_auth->logout();
		redirect('admin/auth/login');
	}
	
	public function not_allowed() 
	{
		$this->load->view('admin/no_access');
	}
}
/* End of file login.php */
/* Location: ./system/backend/controllers/login.php */