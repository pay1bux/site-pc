function add()
    {
		if (! strcmp($_SERVER['REQUEST_METHOD'],'POST'))
		{
			if ($this->_validate())
			{
				$postdata = $this->input->post('news');
				$input = array(
							'title' => $postdata['title'],
							'content' => $postdata['content'],
							'visible' => isset($postdata['visible'])?1:0,
							'time_created' => date('Y-m-d H:i:s'),
							'sort' => $postdata['sort']
						);
				if (isset($postdata['homepage']))
				{
					$input['homepage'] = 1;
					$this->News_model->unset_hp_visible();
				}
				else
				{
					$input['homepage'] = 0;
				}
				$id_news = $this->News_model->create($input);
				$this->load->library('File_processing_lib');
				$this->file_processing_lib->news_photo('image', $id_news);
				$this->session->set_flashdata('success', 'Noutatea a fost creata cu succes.');
				redirect('admin/news/browse');
			}
			$data['form_values'] = $_POST;
		}
		$data['main_content'] = 'admin/news/add';
		$this->load->view('admin/template', $data);
    }

	function _validate()
    {
        $this->form_validation->set_rules('news[title]', 'Titlu', 'required');
        $this->form_validation->set_rules('news[content]', 'Continut', 'required');
        return $this->form_validation->run();
    }

	function edit($id_news = 0)
    {
        if (! $news = $this->News_model->get_by_id($id_news))
        {
            $this->load->view('admin/404');
            return;
        }

		if (! strcmp($_SERVER['REQUEST_METHOD'],'POST'))
		{
			if ($this->_validate())
			{
				$postdata = $this->input->post('news');
				$input = array(
							'title' => $postdata['title'],
							'content' => $postdata['content'],
							'visible' => isset($postdata['visible'])?1:0,
							'sort' => $postdata['sort']
						);

				if (isset($postdata['homepage']))
				{
					$input['homepage'] = 1;
					$this->News_model->unset_hp_visible();
				}
				else
				{
					$input['homepage'] = 0;
				}
				$this->News_model->update($id_news, $input);
				$this->load->library('File_processing_lib');
				$this->file_processing_lib->news_photo('image', $id_news);
				$this->session->set_flashdata('success', 'Noutatea a fost editata cu succes.');
				redirect('admin/news/browse');
			}
			$data['form_values'] = $_POST;
		}
		else
		{
			$data['form_values']['news'] = $news;
		}

		$data['news'] = $news;
		$data['main_content'] = 'admin/news/edit';
		$this->load->view('admin/template', $data);
    }


        function create($data)
	{
		$this->db->insert($this->table, $data);

		if ($this->db->affected_rows() === 1)
		{
			return $this->db->insert_id();
		}

		return FALSE;
	}

	//---------------------------------------------------------------


	function update ($id, $data)
	{
		$this->db->where($this->primary_key, $id)
					->update($this->table, $data);

		if ($this->db->affected_rows() === 1)
		{
			return TRUE;
		}

		return FALSE;
	}
