<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_kriteria extends Kominfo 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->js(base_url('assets/public/app/sub_kriteria.js'));
		$this->load->model('mkriteria','kriteria');
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

	public function create()
	{
		$this->page_title->push('Sub Kriteria', 'Tambah Data Sub Kriteria');

		$this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'trim|required');
		$this->form_validation->set_rules('nama_subkriteria', 'Nama Sub Kriteria', 'trim|required');
		//$this->form_validation->set_rules('jenis_kriteria', 'Jenis Kriteria', 'trim|required');
		$this->form_validation->set_rules('nilai_ideal', 'Nilai', 'trim|required');


		if ($this->form_validation->run() == TRUE)
		{
			$this->sub_kriteria->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Sub Kriteria", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'kriteria' => $this->kriteria->get_all(),
			'get_core' => $this->kriteria->get_core($this->per_page, $this->page,'result'),
		);

		$this->template->view('Kominfo/sub_kriteria/create-sub_kriteria', $this->data);
	}

	public function update($param = 0)
	{
		$this->page_title->push('Sub Kriteria', 'Ubah Data Sub Kriteria');

		$this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'trim|required');
		$this->form_validation->set_rules('nama_subkriteria', 'Nama Sub Kriteria', 'trim|required');
		//$this->form_validation->set_rules('jenis_kriteria', 'Jenis Kriteria', 'trim|required');
		$this->form_validation->set_rules('nilai_ideal', 'Nilai', 'trim|required');


		if ($this->form_validation->run() == TRUE)
		{
			$this->sub_kriteria->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Sub Kriteria", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			//'kriteria' => $this->kriteria->get_all($this->per_page, $this->page,'result'),
			'kri'=> $this->sub_kriteria->get($param),
			'sub'=> $this->sub_kriteria->get_sub($param),

		);

		$this->template->view('Kominfo/sub_kriteria/update-sub_kriteria', $this->data);
	}
	
	public function delete($param = 0)
	{
		$this->sub_kriteria->delete($param);

		redirect('sub_kriteria');
	}
}

/* End of file Sub_kriteria.php */
/* Location: ./application/controllers/Sub_kriteria.php */