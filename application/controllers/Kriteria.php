<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends Kominfo 
{
	public function __construct()
	{
		parent::__construct();
	}	

	public function index()
	{
		$this->page_title->push('Kriteria', 'Data Kriteria');

		$this->data = array(
			'title' => "Data Kriteria", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			//'bobot' => $this->bobot->get_all($this->per_page, $this->page,'result'),	
		);

		$this->template->view('Kominfo/kriteria/data-kriteria', $this->data);
	}

}

/* End of file kriteria.php */
/* Location: ./application/controllers/kriteria.php */