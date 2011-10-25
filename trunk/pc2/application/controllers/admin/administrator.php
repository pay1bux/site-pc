<?php
class Administrator extends CI_Controller {

	function index()
	{
	
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('username', 'Email', 'valid_email');
		
		
		if ($this->form_validation->run() == FALSE)
			{
				$data['main_content'] = 'admin/login';
			}
		else
			{
				$data['main_content'] = 'admin/logat';
			}
			
			
			$this->load->view('frontend/template', $data);
	
		}
}
?>