<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Upload extends CI_Upload {

	function MY_Upload()
	{
		parent::CI_Upload();
	}
	
	function set_filename($path, $filename)
	{
		if ($this->encrypt_name == TRUE)
		{		
			mt_srand();
			$filename = md5(uniqid(mt_rand())).$this->file_ext;	
		}
	
		if ( ! file_exists($path.$filename))
		{
			return $filename;
		}
	
		$filename = str_replace($this->file_ext, '', $filename);
		
		$new_filename = '';
		for ($i = 1; $i < 100; $i++)
		{			
			if ( ! file_exists($path.$filename.'-'.$i.$this->file_ext))
			{
				$new_filename = $filename.'-'.$i.$this->file_ext;
				break;
			}
		}

		if ($new_filename == '')
		{
			$this->set_error('upload_bad_filename');
			return FALSE;
		}
		else
		{
			return $new_filename;
		}
	}
	
	function _prep_filename($filename)
	{
		if (strpos($filename, '.') === FALSE)
		{
			return $filename;
		}

		$parts		= explode('.', $filename);
		$ext		= array_pop($parts);
		$filename	= array_shift($parts);

		foreach ($parts as $part)
		{
			if ( ! in_array(strtolower($part), $this->allowed_types) OR $this->mimes_types(strtolower($part)) === FALSE)
			{
				$filename .= '.'.$part.'-';
			}
			else
			{
				$filename .= '.'.$part;
			}
		}
		
		$filename = preg_replace("/[\W]+/","-",strtolower(trim($filename)));
		$filename = preg_replace("/[-]+/","-", $filename);
		$filename = preg_replace("/[_]+/","-", $filename);
		$filename .= '.'.strtolower($ext);
		return $filename;
	}
	
}