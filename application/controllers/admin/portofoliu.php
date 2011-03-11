<?php
class Portofoliu extends Controller {

	function __construct() 
	{
		parent::Controller();
		if ($this->admin_auth->is_logged_in() === FALSE) 
		{
			redirect('admin/auth/login');
		}
		
		$this->load->model('Portofoliu_categories_model');
		$this->load->model('Portofoliu_model');
	}
	
	function browse($page = 0)
	{
		$url = site_url('admin/portofoliu/browse'); 
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
		$data['results'] = $this->Portofoliu_model->get($filters);
		$data['results_count'] = $this->Portofoliu_model->results_count;
		
		// Pagination prep
		$this->load->library('Pagination');
		$config['base_url'] = $url .'/';
		$config['total_rows'] = $data['results_count'];
		$config['per_page'] = $data['per_page'];
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['pagination_links'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin/portofoliu/browse';
		$data['action'] = $url;
		$this->load->view('admin/template', $data);
	}
	
	function add()
    {
		if (! strcmp($_SERVER['REQUEST_METHOD'],'POST')) 
		{
			if ($this->_validate())
			{
				$postdata = $this->input->post('item');
				$input = array(
							'name' => $postdata['name'],
							'sort' => $postdata['sort'],
							'id_category' => $postdata['id_category']
						);
				
				$id = $this->Portofoliu_model->create($input);
				$this->session->set_flashdata('success', 'Lucrarea a fost creata cu succes.');
				redirect('admin/portofoliu/browse');
			}
			$data['form_values'] = $_POST;
		}
		$data['categories_dropdown'] = $this->Portofoliu_categories_model->get_for_select('-');
		$data['main_content'] = 'admin/portofoliu/add';
		$this->load->view('admin/template', $data);
    }
	
	function _validate()
    {
        $this->form_validation->set_rules('item[name]', 'Nume', 'required');
        $this->form_validation->set_rules('item[id_category]', 'Categorie', 'required');
        $this->form_validation->set_rules('item[sort]', 'Ordine', 'integer');
        return $this->form_validation->run();
    }
    
	function edit($id = 0)
    {
        if (! $item = $this->Portofoliu_model->get_by_id($id))
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
						'name' => $postdata['name'],
						'sort' => $postdata['sort'],
						'id_category' => $postdata['id_category']
					);
			   
				$this->Portofoliu_model->update($id, $input);
				$this->session->set_flashdata('success', 'Lucrarea a fost editata cu succes.');
				redirect('admin/portofoliu/browse');
			}
			$data['form_values'] = $_POST;
		}
		else
		{
			$data['form_values']['item'] = $item;
		}
		$data['categories_dropdown'] = $this->Portofoliu_categories_model->get_for_select('-');
		$data['item'] = $item;
		$data['main_content'] = 'admin/portofoliu/edit';
		$this->load->view('admin/template', $data);
    }
    
	function delete($id = 0)
    {
    	if (! $item = $this->Portofoliu_model->get_by_id($id))
        {
            show_404();
            return;
        }
        $this->Portofoliu_model->destroy($id);
		$this->session->set_flashdata('success', 'Lucrarea a fost stearsa cu succes.');
		redirect('admin/portofoliu/browse');  
    }
	
	function browse_categories($page = 0)
	{
		$url = site_url('admin/portofoliu/browse_categories'); 
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
		$data['results'] = $this->Portofoliu_categories_model->get($filters);
		$data['results_count'] = $this->Portofoliu_categories_model->results_count;
		
		// Pagination prep
		$this->load->library('Pagination');
		$config['base_url'] = $url .'/';
		$config['total_rows'] = $data['results_count'];
		$config['per_page'] = $data['per_page'];
		$config['uri_segment'] = 4;
		$this->pagination->initialize($config);
		$data['pagination_links'] = $this->pagination->create_links();
		
		$data['main_content'] = 'admin/portofoliu/browse_categories';
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
				
				$id_category = $this->Portofoliu_categories_model->create($input);
				$this->session->set_flashdata('success', 'Categoria a fost creata cu succes.');
				redirect('admin/portofoliu/browse_categories');
			}
			$data['form_values'] = $_POST;
		}
		$data['main_content'] = 'admin/portofoliu/add_category';
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
        if (! $category = $this->Portofoliu_categories_model->get_by_id($id_category))
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
			   
				$this->Portofoliu_categories_model->update($id_category, $input);
				$this->session->set_flashdata('success', 'Categoria a fost editata cu succes.');
				redirect('admin/portofoliu/browse_categories');
			}
			$data['form_values'] = $_POST;
		}
		else
		{
			$data['form_values']['category'] = $category;
		}
		
		$data['category'] = $category;
		$data['main_content'] = 'admin/portofoliu/edit_category';
		$this->load->view('admin/template', $data);
    }
    
	function delete_category($id_category = 0)
    {
    	if (! $category = $this->Portofoliu_categories_model->get_by_id($id_category))
        {
            show_404();
            return;
        }
        $this->Portofoliu_categories_model->destroy($id_category);
		$this->session->set_flashdata('success', 'Categoria a fost stearsa cu succes.');
		redirect('admin/portofoliu/browse_categories');  
    }
    
}	