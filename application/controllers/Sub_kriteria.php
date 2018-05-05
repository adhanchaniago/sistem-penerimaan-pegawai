<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_kriteria extends Kominfo 
{
	public function __construct()
	{
		parent::__construct();	
	}

	public function index()
	{
		$this->page_title->push('Sub Kriteria', 'Data Sub Kriteria');

		$this->data = array(
			'title' => "Data Sub Kriteria", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			//'bobot' => $this->bobot->get_all($this->per_page, $this->page,'result'),	
		);

		$this->template->view('Kominfo/Sub_kriteria/data-sub_kriteria', $this->data);
	}

}

/* End of file Sub_kriteria.php */
/* Location: ./application/controllers/Sub_kriteria.php */