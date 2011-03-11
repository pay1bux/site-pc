<?php
class Contact extends Controller
{
	function index() 
	{
		if (! strcmp($_SERVER["REQUEST_METHOD"], "POST"))
		{
			$val = $this->form_validation;
			$val->set_rules('contact[name]', 'Nume', 'required');
			$val->set_rules('contact[email]', 'Email', 'required|valid_email');
			$val->set_rules('contact[message]', 'Mesaj', 'required');
			
			if ($val->run())
			{
				$this->load->library('Email');
				$post_data = $this->input->post('contact');
				$this->email->from('contact@electrologus.ro', 'Electrologus');
				$this->email->to('tabita.ctin@gmail.com');
				$this->email->subject('Electrologus - Contact');
				$this->load->helper('email_template');
					
				$email_body = $this->load->view(
								'emails/contact', 
								array(
									'name' => $post_data['name'], 
									'email' => $post_data['email'],
									'message' => $post_data['message']), 
								TRUE);
								
				$this->email->message(set_email($email_body, array('subject' => 'Contact')));
				$this->email->send();
				
				$this->email->from('contact@electrologus.ro', 'Electrologus');
				$this->email->to('electrologus@yahoo.com');
				$this->email->subject('Electrologus - Contact');
				$this->load->helper('email_template');
				$this->email->message(set_email($email_body, array('subject' => 'Contact')));
				$this->email->send();
				
				$this->session->set_flashdata('success', 'Mesajul dumneavoastra a fost trimis cu succes.');
				redirect('contact');
			}
		}
		
		$data['main_content'] = 'frontend/contact/index';
		$data['page_title'] = 'Contact';
		$this->load->view('frontend/template', $data);
	}
	
}