<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panduan extends Kominfo 
{
	public $level;

	public  function __construct()
	{
		parent::__construct();
		$this->load->model('mpanduan','panduan');
		$this->load->js(base_url('assets/public/app/panduan.js'));
		$this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');
		
		$this->page = $this->input->get('page');
		$this->level = $this->input->get('level');
		
	}

	public function index()
	{
		$this->page_title->push('Panduan', 'Panduan Aplikasi');

		$this->data = array(
			'title' => "Panduan Aplikasi", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'data' => $this->panduan->get_all($this->per_page, $this->page,'result'),
			
		);

		$this->template->view('Kominfo/panduan/data-panduan', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Panduan Aplikasi', 'Tambah Data Panduan Aplikasi');


		$this->breadcrumbs->unshift(2, 'Data Pengguna Aplikasi', "panduan");

		$this->form_validation->set_rules('nomor', 'Nomor', 'trim|required');
		$this->form_validation->set_rules('nama_panduan', 'Nama Panduan', 'trim|required');
		

		if ($this->form_validation->run() == TRUE)
		{
			$this->panduan->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Panduan Aplikasi", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('Kominfo/panduan/create-panduan', $this->data);
	}

	public function update($param = 0)
	{
		if (!$param) {
			show_404();
		}

		if ($this->panduan->cek($param) == 0) {
			show_404();
			
		}

		$this->page_title->push('Panduan Aplikasi', 'Ubah Data Panduan Aplikasi');


		$this->breadcrumbs->unshift(2, 'Data Pengguna Aplikasi', "panduan");

		$this->form_validation->set_rules('nomor', 'Nomor', 'trim|required');
		$this->form_validation->set_rules('nama_panduan', 'Nama Panduan', 'trim|required');
		

		if ($this->form_validation->run() == TRUE)
		{
			$this->panduan->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Ubah Panduan Aplikasi", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->panduan->get($param)
		);


		$this->template->view('Kominfo/panduan/update-panduan', $this->data);
	}

	public function delete($param = 0)
	{
		$this->panduan->delete($param);

		redirect('panduan');
	}
}

/* End of file Panduan.php */
/* Location: ./application/controllers/Panduan.php */