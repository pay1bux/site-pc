<?php
class Error extends Controller {
 
	function error_404()
	{
		$this->load->view('frontend/404');
	}
}
