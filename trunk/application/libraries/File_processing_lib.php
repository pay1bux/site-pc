<?php
class File_processing_lib  {
 	
	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('upload');
    	$this->CI->load->library('image_lib');
	}
	
	function process_image($input_file, $category, $postdata = array(), $id_image = 0)
	{
		if (! empty($postdata) && $id_image > 0) //edit image translations
		{
			$this->_save_images_translations($postdata, $id_image);	
		}
		
		$errors = array();
		if(is_uploaded_file($_FILES[$input_file]['tmp_name']))
		{
			$upload_config['upload_path'] = ORIGINAL_IMG_PATH;
			$upload_config['allowed_types'] = 'gif|jpg|png';
			$upload_config['max_size']	= 0;
			$upload_config['overwrite']	= FALSE;
			$upload_config['max_width']  =  0;
			$upload_config['max_height']  = 0;
			
			$original_name = $_FILES[$input_file]['name'];
			$this->CI->upload->initialize($upload_config);
			if ( ! $this->CI->upload->do_upload($input_file))
			{
				$errors[] = $this->CI->upload->display_errors($original_name.': ','');
			}	
			else 
			{
				$image_data = $this->CI->upload->data();
				$image_name = $image_data['file_name'];	
				
				$resize_config['maintain_ratio'] = FALSE; //daca este TRUE va modifica la initializare width si height
				$resize_config['bg_color'] = $category['background_colour'];
				$resize_config['align'] = $category['align'];
				$resize_config['source_image'] = ORIGINAL_IMG_PATH . $image_name;
				
				//minithumb
				$resize_config['new_image'] = MINITHUMB_IMG_PATH . $image_name;
				$resize_config['width'] = 100;
				$resize_config['height'] = 100;
				$resize_config['fixed_height'] = 1;
				$this->CI->image_lib->initialize($resize_config);
				if ($this->CI->image_lib->resize_into_box('thumbnail') == FALSE)
				{
				   $errors .= $this->CI->image_lib->display_errors('<li>'.$original_name.': ','</li>');
				}
				
				//normal
				$resize_config['new_image'] = NORMAL_IMG_PATH . $image_name;
				$resize_config['width'] = $category['width_normal'];
				$resize_config['height'] = $category['height_normal'];
				$resize_config['fixed_height'] = $category['fixed_height'];
				$this->CI->image_lib->initialize($resize_config);
				if ($this->CI->image_lib->resize_into_box() == FALSE)
				{
				   $errors[] = $this->CI->image_lib->display_errors($original_name.': ','');
				}
				
				//thumb
				$resize_config['new_image'] = THUMB_IMG_PATH . $image_name;
				$resize_config['width'] = $category['width_thumb'];
				$resize_config['height'] = $category['height_thumb'];
				$resize_config['fixed_height'] = $category['fixed_height'];
				$this->CI->image_lib->initialize($resize_config);
				if ($this->CI->image_lib->resize_into_box('thumbnail') == FALSE)
				{
				   $errors[] = $this->CI->image_lib->display_errors($original_name.': ','');
				}
				
				//zoom
				$resize_config['new_image'] = ZOOM_IMG_PATH . $image_name;
				$resize_config['width'] = $category['width_zoom'];
				$resize_config['height'] = $category['height_zoom'];
				$resize_config['fixed_height'] = $category['fixed_height'];
				$this->CI->image_lib->initialize($resize_config);
				if ($this->CI->image_lib->resize_into_box() == FALSE)
				{
				   $errors[] = $this->CI->image_lib->display_errors($original_name.': ','');
				}
				
				if (empty($errors))
				{
					if ($id_image == 0)
					{
						$input = array(
								'id_images_category' => $category['id'],
								'filename' => $image_name,
								'original_filename' => $original_name
							);
						$id_image = $this->CI->Images_model->create($input);
						if (! empty($postdata))
						{
							$this->_save_images_translations($postdata, $id_image);
						}	
					}
					else
					{
						//delete old images
						$image = $this->CI->Images_model->get_by_id($id_image);
						if (! empty($image['filename']))
						{
							$this->unlink_image($image['filename']);
						}
						$input = array(
								'id_images_category' => $category['id'],
								'filename' => $image_name,
								'original_filename' => $original_name
							);
						$this->CI->Images_model->update($id_image, $input);	
					}
				}
			}
		}
		
		if (empty($errors))
		{
			return array('errors' => $errors, 'id_image' => $id_image);
		}
		return array('errors' => $errors);
	}
	
	function _save_images_translations($postdata, $id_image)
    {
    	foreach($this->CI->languages_lib->get_all() as $lang)
		{
            $input = array(
            	'alt' => $postdata['alt'][$lang['id']],
            	'description' => $postdata['description'][$lang['id']]
            );
            if ($this->CI->Images_model->translation_exists($id_image, $lang['id']))
            {
            	$this->CI->Images_model->translation_update($input, $id_image, $lang['id']);
            }
            else 
            {
            	$input['id_language'] = $lang['id'];
            	$input['id_image'] = $id_image;
            	$this->CI->Images_model->translation_create($input);
            }
		}
    }
    
    function unlink_image($file)
    {
    	if (file_exists(ORIGINAL_IMG_PATH.$file))
    	{
    		unlink(ORIGINAL_IMG_PATH.$file);
    	}
    	if (file_exists(MINITHUMB_IMG_PATH.$file))
    	{
    		unlink(MINITHUMB_IMG_PATH.$file);
    	}
    	if (file_exists(NORMAL_IMG_PATH.$file))
    	{
    		unlink(NORMAL_IMG_PATH.$file);
    	}
    	if (file_exists(THUMB_IMG_PATH.$file))
    	{
    		unlink(THUMB_IMG_PATH.$file);
    	}
    	if (file_exists(ZOOM_IMG_PATH.$file))
    	{
    		unlink(ZOOM_IMG_PATH.$file);
    	}
    }

}
/* End of file File_processing_lib.php */