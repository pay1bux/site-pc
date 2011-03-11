<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Image_lib extends CI_Image_lib {

	var $align = "center";
	var $bg_color = "ffffff";
	var $fixed_height = 1;
	var $temp_width;
	var $temp_height;

	function MY_Image_lib($props = array())
	{
		$convert_path = $this->_get_convert_path();
		if ($convert_path === FALSE)
		{
			$props['image_library'] = 'gd2';
		}
		else
		{
			$props['image_library'] = 'imagemagick';
			$props['library_path'] = $convert_path;
		}
		parent::CI_Image_lib();
	}

	function _get_convert_path() 
	{
		if(!preg_match('/passthru/', ini_get('disable_functions')))
		{
			ob_start();
			passthru("which convert");
			$convert_path_tmp = ob_get_contents();
			$convert_path_tmp = str_replace(array("\n","\r"),array("",""),$convert_path_tmp);
			ob_end_clean();
			if(strlen($convert_path_tmp) > 7) 
			{
				return $convert_path_tmp;
			}
		}
		return FALSE;
	}
	
	function resize_into_box($action = 'resize')
	{
		if ($this->fixed_height == 0)
		{
			if ($this->orig_width < $this->width)
			{
				$this->height = $this->orig_height;
			}
			else
			{
				$this->height = ceil($this->width*$this->orig_height/$this->orig_width);
			}
		}
		
		$protocol = 'resize_into_box_'.$this->image_library;

		if (preg_match('/gd2$/i', $protocol))
		{
			$protocol = 'resize_into_box_gd';
		}

		return $this->$protocol($action);
	}
	
	function resize_into_box_gd($action) {
		
		$original_aspect = $this->orig_width/$this->orig_height;
		$required_aspect = $this->width/$this->height;
		
		$temp1_height = min($this->height, $this->orig_height);
		$temp1_width = min($this->width, $this->orig_width);

		if($original_aspect >= $required_aspect)
		{
            $this->temp_width = $temp1_width;
            $this->temp_height = $temp1_width / $original_aspect;
        } 
        else 
        {
            $this->temp_width = $temp1_height * $original_aspect;
            $this->temp_height = $temp1_height;
        }
        
		// Position the image
        switch($this->align) {
        	case "center":
		        $xPos = floor(($this->width - $this->temp_width) / 2);
		        $yPos = floor(($this->height - $this->temp_height) / 2);
        		break;
        	case "top":
        		$xPos = floor(($this->width - $this->temp_width) / 2);
		        $yPos = 0;
        		break;
        	case "bottom":
        		$xPos = floor(($this->width - $this->temp_width) / 2);
		        $yPos = $this->height - $this->temp_height;
        		break;
        	case "left":
		        $xPos = 0;
		        $yPos = floor(($this->height - $this->temp_height) / 2);
        		break;
        	case "right":
		        $xPos = $this->width - $temp_width;
		        $yPos = floor(($this->height - $this->temp_height) / 2);
        		break;
        }
        
		// If resizing the x/y axis must be zero
		$this->x_axis = 0;
		$this->y_axis = 0;

		// Create the image handle
		if ( ! ($src_img = $this->image_create_gd()))
		{
			return FALSE;
		}

		// Create The Image
		if ($this->image_library == 'gd2' AND function_exists('imagecreatetruecolor'))
		{
			$create    = 'imagecreatetruecolor';
			$copy    = 'imagecopyresampled';
		}
		else
		{
			$create    = 'imagecreate';
			$copy    = 'imagecopyresized';
		}

		// Create
		$dst_img = $create($this->width, $this->height);

		// White...
		$bg_rgb = $this->hex_to_rgb($this->bg_color);
		imagefill ( $dst_img, 0, 0, imagecolorallocate ( imagecreatetruecolor ( 140, 140 ), $bg_rgb['r'], $bg_rgb['g'], $bg_rgb['g']));

		// Move into workspace
		$copy($dst_img, $src_img, $xPos, $yPos, $this->x_axis, $this->y_axis, $this->temp_width, $this->temp_height, $this->orig_width, $this->orig_height);

		// Show the image
		if ($this->dynamic_output == TRUE)
		{
			$this->image_display_gd($dst_img);
		}
		else
		{
			// Or save it
			if ( ! $this->image_save_gd($dst_img))
			{
				return FALSE;
			}
		}

		// Kill the file handles
		imagedestroy($dst_img);
		imagedestroy($src_img);

		// Set the file to 777
		@chmod($this->full_dst_path, 0777);

		return TRUE;
	}
	
	function resize_into_box_imagemagick($action)
	{
		//  Do we have a vaild library path?
		if ($this->library_path == '')
		{
			$this->set_error('imglib_libpath_invalid');
			return FALSE;
		}

		if ( ! preg_match("/convert$/i", $this->library_path))
		{
			$this->library_path = rtrim($this->library_path, '/').'/';

			$this->library_path .= 'convert';
		}
		
		// Execute the command
		$cmd = $this->library_path." -quality ".$this->quality;
		
		switch($this->align) {
        	case "center":
		        $align = "center";
        		break;
        	case "top":
        		$align = "north";
        		break;
        	case "bottom":
        		$align = "south";
        		break;
        	case "left":
		        $align = "west";
        		break;
        	case "right":
		        $align = "east";
        		break;
        }

		$max_final = max($this->height, $this->width);
		$max_orig = max($this->orig_height, $this->orig_width);
		$max = min($max_final,$max_orig);
		$cmd .= " -".$action." ".$max."x".$max." -background '#".$this->bg_color."' -gravity ".$align." -auto-orient -extent ".$this->width."x".$this->height." \"$this->full_src_path\" \"$this->full_dst_path\" 2>&1";
		
		$retval = 1;

		@exec($cmd, $output, $retval);

		//	Did it work?
		if ($retval > 0)
		{
			$this->set_error('imglib_image_process_failed');
			return FALSE;
		}

		// Set the file to 777
		@chmod($this->full_dst_path, DIR_WRITE_MODE);

		return TRUE;
	}

	function hex_to_rgb($hex) 
	{
		$hex = ereg_replace("#", "", $hex);
		$color = array();
		if(strlen($hex) == 3) 
		{
			$color['r'] = hexdec(substr($hex, 0, 1) . $r);
			$color['g'] = hexdec(substr($hex, 1, 1) . $g);
			$color['b'] = hexdec(substr($hex, 2, 1) . $b);
		}
		else if(strlen($hex) == 6)
		{
			$color['r'] = hexdec(substr($hex, 0, 2));
			$color['g'] = hexdec(substr($hex, 2, 2));
			$color['b'] = hexdec(substr($hex, 4, 2));
		}
		return $color;
	}
	
	//http://thinktank.goldfishdesign.co.nz/node/67
	/*function resize_then_crop()
	{
		$orginal_aspect = $this->orig_width/$this->orig_height;

		$required_aspect = $this->width/$this->height;

	/*	if($orginal_aspect >= $required_aspect){
			$temp_width = $this->height * $orginal_aspect;
			$temp_height = $this->height;

			// Position the image
			$xPos = floor(($this->width - $temp_width) / 2);
			$yPos = 0;
		} else {
			$temp_width = $this->width;
			$temp_height = $this->width / $orginal_aspect;

			// Position the image
			$xPos = 0;
			$yPos = floor(($this->height - $temp_height) / 2);
		}*/

		// If resizing the x/y axis must be zero
		/*$this->x_axis = 0;
		$this->y_axis = 0;

		// Create the image handle
		if ( ! ($src_img = $this->image_create_gd()))
		{
			return FALSE;
		}

		// Create The Image
		if ($this->image_library == 'gd2' AND function_exists('imagecreatetruecolor'))
		{
			$create    = 'imagecreatetruecolor';
			$copy    = 'imagecopyresampled';
		}
		else
		{
			$create    = 'imagecreate';
			$copy    = 'imagecopyresized';
		}


		// Create
		$dst_img = $create($this->width, $this->height);

		// White...
		imagefill ( $dst_img, 0, 0, imagecolorallocate ( imagecreatetruecolor ( 140, 140 ), 255, 255, 255 ) );

		// Move into workspace
		$copy($dst_img, $src_img, $xPos, $yPos, $this->x_axis, $this->y_axis, $temp_width, $temp_height, $this->orig_width, $this->orig_height);

		// Show the image
		if ($this->dynamic_output == TRUE)
		{
			$this->image_display_gd($dst_img);
		}
		else
		{
			// Or save it
			if ( ! $this->image_save_gd($dst_img))
			{
				return FALSE;
			}
		}

		// Kill the file handles
		imagedestroy($dst_img);
		imagedestroy($src_img);

		// Set the file to 777
		@chmod($this->full_dst_path, 0777);

		return TRUE;
	}
	*/
}