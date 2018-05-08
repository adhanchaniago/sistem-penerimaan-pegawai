<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_kriteria extends Kominfo 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->js(base_url('assets/public/app/sub_kriteria.js'));
		$this->load->model('msub_kriteria','sub_kriteria');
		$this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');
		$this->page = $this->input->get('page');	
	}

	public function index()
	{
		$this->page_title->push('Sub Kriteria', 'Data Sub Kriteria');

		$this->data = array(
			'title' => "Data Sub Kriteria", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'sub_kriteria' => $this->sub_kriteria->get_all($this->per_page, $this->page,'result'),	
		);

		$this->template->view('Kominfo/Sub_kriteria/data-sub_kriteria', $this->data);
	}

}

/* End of file Sub_kriteria.php */
/* Location: ./application/controllers/Sub_kriteria.php */