<?php

class Video extends Controller {

	function Video()
	{
		parent::Controller();
	}

    function index()
    {
        $i=1;
        $data['title'] = "Pagina cu videouri";
        $data['heading'] = "Aici sunt videoclipuri";

        $this->load->model('Video_model');
        $page = 1;
        if ($this->uri->segment(3) != null) {
            $page = $this->uri->segment(3);
        }
        $offset = ($page - 1) * 10;
		$data['results'] = $this->Video_model->getAllWithLimit(array("limit" => 10, "offset" => $offset));

        $data["page"] = $page;
        $data["i"] = $i;
        $data["curent_page"]= $this->Video_model->getById(array("id" => $this->uri->segment(3)));
        $data["last_page"] = $this->Video_model->results_count / 10;
        $data["first_page"] = 1;
        $this->load->view('frontend/video/index', $data);
    }

    function view()
    {
        $this->load->model('Video_model');
		$data['results'] = $this->Video_model->getById(array("id" => $this->uri->segment(3)));

        $data['title'] = $data['results'][0]["title"];
        $data['heading'] = $data['results'][0]["title"];

        $this->load->view('frontend/video/pagina_video', $data);
    }
}
