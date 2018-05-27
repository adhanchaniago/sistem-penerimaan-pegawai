<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konversi extends Kominfo 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->js(base_url('assets/public/app/konversi2.js'));
		$this->load->js(base_url('assets/public/app/konversi.js'));
		$this->load->js(base_url('assets/public/app/konversi.css'));
		$this->load->model('mkonversi','konversi');

		$this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');
		$this->page = $this->input->get('page');
	}

	public function index()
	{
		$this->page_title->push('Konversi Nilai', 'Data Nilai Konversi');

		$this->data = array(
			'title' => "Konversi Nilai", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'konversi' => $this->konversi->gett_all($this->per_page, $this->page,'result'),
			'nama' => $this->konversi->get_nama(),
			//'nilai_konversi' => $this->konversi->get_konversinama($param),
			//'nama_konversi' => $this->konversi->get_nm($param),

		);

		$this->template->view('Kominfo/konversi/data-konversi', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Konversi Nilai', 'Tambah Nilai Konversi');

		$this->form_validation->set_rules('id_kriteria', 'Nama Variabel', 'trim|required');
		$this->form_validation->set_rules('nilai', 'Nilai Konversi', 'trim|required');
		$this->form_validation->set_rules('range', 'Range Nilai', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->konversi->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Konversi Nilai", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'nama' => $this->konversi->get_nama($this->per_page, $this->page,'result'),
			//'bobot' => $this->bobot->get_all($this->per_page, $this->page,'result'),	
		);

		$this->template->view('Kominfo/konversi/create-konversi', $this->data);
	}

	public function update($param)
	{
		$this->page_title->push('Konversi Nilai', 'Ubah Nilai Konversi');

		$this->form_validation->set_rules('id_nama', 'Nama Variabel', 'trim|required');
		$this->form_validation->set_rules('nilai', 'Nilai Konversi', 'trim|required');
		$this->form_validation->set_rules('range', 'Range Nilai', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->konversi->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Ubah Konversi Nilai", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->konversi->get_update($param),
			//'bobot' => $this->bobot->get_all($this->per_page, $this->page,'result'),	
		);

		$this->template->view('Kominfo/konversi/update-konversi', $this->data);
	}

	public function delete($param = 0)
	{
		$this->konversi->delete($param);

		redirect('konversi');
	}
}

/* End of file Konversi.php */
/* Location: ./application/controllers/Konversi.php */