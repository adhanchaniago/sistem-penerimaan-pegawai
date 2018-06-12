<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends Kominfo
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
		$this->load->model('mpengumuman','pengumuman');
		$this->page = $this->input->get('page');
	}

	public function index()
	{
		$this->page_title->push('Pengumuman', 'Data Pengumuman');
		$config = $this->template->pagination_list();
		$config['base_url'] = site_url("pengumuman?per_page={$this->per_page}&query={$this->query}");
		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->pengumuman->get_all(null, null, 'num');

		$this->data = array(
			'title' => "Data Hasil Prengkingan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'pengumuman' => $this->pengumuman->get_all($this->per_page, $this->page, 'result'),
			// 'get' => $this->hasil->ngambil(),
			// 'nama' => $this->hasil->get_nama(),
		);

		$this->template->view('Kominfo/pengumuman/data-pengumuman', $this->data);
	}
}

/* End of file Pengumuman.php */
/* Location: ./application/controllers/Pengumuman.php */