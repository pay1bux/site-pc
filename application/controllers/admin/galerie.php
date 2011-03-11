<?php
class Galerie extends Controller {

	function __construct() 
	{
		parent::Controller();
		if ($this->admin_auth->is_logged_in() === FALSE) 
		{
			redirect('admin/auth/login');
		}
		
		$this->load->model('Images_categories_model');
		$this->load->model('Images_model');
		$this->load->library('upload');
    	$this->load->library('image_lib');
	}
	
	function browse($page = 0)
	{
		$url = site_url('admin/galerie/browse'); 
		if (! strcmp($_SERVER['REQUEST_METHOD'],'POST'))
		{
			if (isset($_POST['per_page']))
			{
				$this->session->set_userdata('admin_per_page', $_POST['per_page']);
			}
			if(isset($_POST['admin_filter_gallery']))
			{
				$this->session->set_userdata('admin_filter_gallery', $_POST['admin_filter_gallery']);
			}
			if(isset($_POST['reset']))
			{
				$this->session->unset_userdata('admin_filter_gallery');
			}
		}

		if ($this->session->userdata('admin_filter_gallery') !== FALSE)
		{
			$data['form_values']['admin_filter_gallery'] = $this->session->userdata('admin_filter_gallery');
			$filters = $this->utils->prepare_filters($this->session->userdata('admin_filter_gallery'));
		}
		if ($this->session->userdata('admin_per_page') !== FALSE)
		{
			$data['per_page'] = $this->session->userdata('admin_per_page');
		}
		else
		{
			$data['per_page'] = RESULTS_PER_PAGE;
		}
		
		$filters['limit'] = $data['per_page'];
		$filters['offset'] = $page;
		$data['results'] = $this->Images_model->get($filters);
		$data['results_count'] = $this->Images_model->results_count;
		
		// Pagination prep
		$this->load->library('Pagination');
		$config['base_url'] = $url .'/';
		$config['total_rows'] = $data['results_count'];
		$config['per_page'] = $data['per_page'];
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['pagination_links'] = $this->pagination->create_links();
		$data['categories_dropdown'] = $this->Images_categories_model->get_for_select('-');
		$data['main_content'] = 'admin/galerie/browse';
		$data['action'] = $url;
		$this->load->view('admin/template', $data);
	}
	
	function add()
    {
		if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) 
		{
			if ($this->_validate(true))
			{
				if (is_uploaded_file($_FILES['image']['tmp_name']))
				{
					$postdata = $this->input->post('item');
					$input = array(
								'sort' => $postdata['sort'],
								'id_category' => $postdata['id_category']
							);
					
					$id = $this->Images_model->create($input);
					$err = $this->_process_image($id);
		            if(empty($err))
		            {
		            	$this->session->set_flashdata('success', 'Imaginea a fost creata cu succes.');
						redirect('admin/galerie/browse');
		            }
		            else
		            {
						$data['errors'] = $err;
		            }
				}
				else
				{
					$data['errors'][] = 'Selectati imaginea.';
				}
			}
			$data['form_values'] = $_POST;
		}
		$data['categories_dropdown'] = $this->Images_categories_model->get_for_select('-');
		$data['main_content'] = 'admin/galerie/add';
		$this->load->view('admin/template', $data);
    }
	
	function _validate()
    {
        $this->form_validation->set_rules('item[id_category]', 'Categorie', 'required');
        $this->form_validation->set_rules('item[sort]', 'Ordine', 'integer');
        return $this->form_validation->run();
    }
    
	function edit($id = 0)
    {
        if (! $item = $this->Images_model->get_by_id($id))
        {
            $this->load->view('admin/404');
            return;
        }
        
		if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) 
		{
			if ($this->_validate())
			{
				$postdata = $this->input->post('item');
				$input = array(
						'sort' => $postdata['sort'],
						'id_category' => $postdata['id_category']
					);
			   
				$this->Images_model->update($id, $input);
				$err = $this->_process_image($id);
	            if(empty($err))
	            {
	            	$this->session->set_flashdata('success', 'Imaginea a fost editata cu succes.');
					redirect('admin/galerie/browse');
	            }
	            else
	            {
					$data['errors'] = $err;
	            }
			}
			$data['form_values'] = $_POST;
		}
		else
		{
			$data['form_values']['item'] = $item;
		}
		$data['categories_dropdown'] = $this->Images_categories_model->get_for_select('-');
		$data['item'] = $item;
		$data['main_content'] = 'admin/galerie/edit';
		$this->load->view('admin/template', $data);
    }
    
	function _process_image($id) 
	{
	 	$errors = array();
		if(is_uploaded_file($_FILES['image']['tmp_name']))
		{
			$upload_config['upload_path'] = ORIGINAL_IMG_PATH;
			$upload_config['allowed_types'] = 'gif|jpg|png';
			$upload_config['max_size']	= 0;
			$upload_config['overwrite']	= FALSE;
			$upload_config['max_width']  =  0;
			$upload_config['max_height']  = 0;
			
			$original_name = $_FILES['image']['name'];
			$this->upload->initialize($upload_config);
			if ( ! $this->upload->do_upload('image'))
			{
				$errors[] = $this->upload->display_errors($original_name.': ','');
			}	
			else 
			{
				$image_data = $this->upload->data();
				$image_name = $image_data['file_name'];	
				$resize_config['source_image'] = ORIGINAL_IMG_PATH . $image_name;
				$resize_config['maintain_ratio'] = FALSE;
				//thumb
				$resize_config['new_image'] = THUMB_IMG_PATH . $image_name;
				$resize_config['width'] = GALLERY_THUMB_IMG_WIDTH;
				$resize_config['height'] = GALLERY_THUMB_IMG_HEIGHT;
				$resize_config['fixed_height'] = 1;
				$this->image_lib->initialize($resize_config);
				if ($this->image_lib->resize_into_box('thumbnail') == FALSE)
				{
				   $errors[] = $this->image_lib->display_errors($original_name.': ','');
				}
				
				//normal
				$resize_config['maintain_ratio'] = TRUE;
				$resize_config['new_image'] = NORMAL_IMG_PATH . $image_name;
				$resize_config['width'] = GALLERY_NORMAL_IMG_WIDTH;
				$resize_config['height'] = GALLERY_NORMAL_IMG_HEIGHT;
				$this->image_lib->initialize($resize_config);
				if ($this->image_lib->resize() == FALSE)
				{
				   $errors[] = $this->image_lib->display_errors($original_name.': ','');
				}
				
				//zoom
				$resize_config['new_image'] = ZOOM_IMG_PATH . $image_name;
				$resize_config['width'] = GALLERY_ZOOM_IMG_WIDTH;
				$resize_config['height'] = GALLERY_ZOOM_IMG_HEIGHT;
				$this->image_lib->initialize($resize_config);
				if ($this->image_lib->resize() == FALSE)
				{
				   $errors[] = $this->image_lib->display_errors($original_name.': ','');
				}
				
				if (empty($errors))
				{
					//delete old image
					$info = $this->Images_model->get_by_id($id);
					if (! empty($info['filename']))
					{
						$this->Images_model->unlink_image($info['filename']);
					}
					$this->Images_model->update($id, array('filename' => $image_name));
				}
			}
		}
		return $errors;	
	 }
    
	function delete($id = 0)
    {
    	if (! $item = $this->Images_model->get_by_id($id))
        {
            show_404();
            return;
        }
        $this->Images_model->destroy($id);
		$this->session->set_flashdata('success', 'Imaginea a fost stearsa cu succes.');
		redirect('admin/galerie/browse');  
    }
	
	function browse_categories($page = 0)
	{
		$url = site_url('admin/galerie/browse_categories'); 
		if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) 
		{
			if (isset($_POST['per_page'])) 
			{
				$this->session->set_userdata('per_page', $_POST['per_page']);
			}
		}
		if ($this->session->userdata('per_page') !== FALSE) 
		{
			$data['per_page'] = $this->session->userdata('per_page');
		}
		else 
		{
			$data['per_page'] = RESULTS_PER_PAGE;
		}
		$filters['limit'] = $data['per_page'];
		$filters['offset'] = $page;
		$data['results'] = $this->Images_categories_model->get($filters);
		$data['results_count'] = $this->Images_categories_model->results_count;
		
		// Pagination prep
		$this->load->library('Pagination');
		$config['base_url'] = $url .'/';
		$config['total_rows'] = $data['results_count'];
		$config['per_page'] = $data['per_page'];
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['pagination_links'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin/galerie/browse_categories';
		$data['action'] = $url;
		$this->load->view('admin/template', $data);
	}
	
	function add_category()
    {
		if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) 
		{
			if ($this->_validate_category())
			{
				$postdata = $this->input->post('category');
				$input = array(
							'name' => $postdata['name'],
							'sort' => $postdata['sort']
						);
				
				$id_category = $this->Images_categories_model->create($input);
				$this->session->set_flashdata('success', 'Categoria a fost creata cu succes.');
				redirect('admin/galerie/browse_categories');
			}
			$data['form_values'] = $_POST;
		}
		$data['main_content'] = 'admin/galerie/add_category';
		$this->load->view('admin/template', $data);
    }
	
	function _validate_category()
    {
        $this->form_validation->set_rules('category[name]', 'Nume', 'required');
        $this->form_validation->set_rules('category[sort]', 'Ordine', 'integer');
        return $this->form_validation->run();
    }
    
	function edit_category($id_category = 0)
    {
        if (! $category = $this->Images_categories_model->get_by_id($id_category))
        {
            $this->load->view('admin/404');
            return;
        }
        
		if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) 
		{
			if ($this->_validate_category())
			{
				$postdata = $this->input->post('category');
				$input = array(
						'name' => $postdata['name'],
						'sort' => $postdata['sort']
					);
			   
				$this->Images_categories_model->update($id_category, $input);
				$this->session->set_flashdata('success', 'Categoria a fost editata cu succes.');
				redirect('admin/galerie/browse_categories');
			}
			$data['form_values'] = $_POST;
		}
		else
		{
			$data['form_values']['category'] = $category;
		}
		
		$data['category'] = $category;
		$data['main_content'] = 'admin/galerie/edit_category';
		$this->load->view('admin/template', $data);
    }
    
	function delete_category($id_category = 0)
    {
    	if (! $category = $this->Images_categories_model->get_by_id($id_category))
        {
            show_404();
            return;
        }
        $this->Images_categories_model->destroy($id_category);
		$this->session->set_flashdata('success', 'Categoria a fost stearsa cu succes.');
		redirect('admin/galerie/browse_categories');  
    }
    
}	