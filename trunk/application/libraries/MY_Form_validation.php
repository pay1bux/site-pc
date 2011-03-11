<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    function My_Form_validation()
    {
        parent::CI_Form_validation();
    }

	/**
     * valid_url
     *
     * @access    public
     * @param    field
     * @return    bool
     */
    
	function valid_phone_number($field)
    {
        //$CI =& get_instance();

        //$CI->form_validation->set_message('valid_url', 'The %s field must contain a valid url.');

        return ( ! preg_match('/^\(([0-9]{3})\)\s([0-9]{3})\-([0-9]{4})$/i', $field)) ? FALSE : TRUE;
    }
    
    
    function valid_url($field)
    {
        //$CI =& get_instance();

        //$CI->form_validation->set_message('valid_url', 'The %s field must contain a valid url.');

        return ( ! preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $field)) ? FALSE : TRUE;
    }

	function numeric($str)
	{
		if ($str === '') return TRUE;
		return (bool)preg_match( '/^[\-+]?[0-9]*\.?[0-9]+$/', $str);
	}

	function integer($str)
	{
		if ($str === '') return TRUE;
		return (bool)preg_match( '/^[\-+]?[0-9]+$/', $str);
	}

	function less_than($str, $value)
	{
		$CI =& get_instance();
		$CI->form_validation->set_message('less_than', 'The %s field must be less than %s');
		return $str < $value;
	}

	function greater_than($str, $value)
	{
		$CI =& get_instance();
		$CI->form_validation->set_message('greater_than', 'The %s field must be greater than %s');
		return $str > $value;
	}

}
