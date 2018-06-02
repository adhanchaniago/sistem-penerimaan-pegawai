<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil extends Kominfo 
{
	public $query;

	public $per_page;

	public $page = 20;

	public function __construct()
	{
		parent:: __construct();
		$this->load->js(base_url('assets/public/app/analisa.js'));
		$this->load->model('manalisa','analisa');
		$this->load->model('mhasil','hasil');
		$this->page = $this->input->get('page');
	}

	public function index()
	{
		$this->page_title->push('Hasil', 'Data Hasil Prengkingan');
		$config = $this->template->pagination_list();
		$config['base_url'] = site_url("analisa?per_page={$this->per_page}&query={$this->query}");
		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->analisa->get_all(null, null, 'num');

		$this->data = array(
			'title' => "Data Hasil Prengkingan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'analisa' => $this->analisa->get_all($this->per_page, $this->page, 'result'),
			'get' => $this->hasil->ngambil(),
			'nama' => $this->hasil->get_nama(),
		);

		$this->template->view('Kominfo/hasil/data-hasil', $this->data);
	}

}

/* End of file Hasil.php */
/* Location: ./application/controllers/Hasil.php */