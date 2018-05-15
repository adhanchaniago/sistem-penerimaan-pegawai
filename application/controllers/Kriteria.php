<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends Kominfo 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->js(base_url('assets/public/app/kriteria.js'));
		$this->load->model('mkriteria','kriteria');
		$this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');
		$this->page = $this->input->get('page');
	}	

	public function index()
	{
		$this->page_title->push('Kriteria', 'Data Kriteria');

		$this->data = array(
			'title' => "Data Kriteria", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'kriteria' => $this->kriteria->get_all($this->per_page, $this->page,'result'),	
		);

		$this->template->view('Kominfo/kriteria/data-kriteria', $this->data);
	}


	public function create()
	{
		$this->page_title->push('Kriteria', 'Tambah Data Kriteria');

		$this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'trim|required');
		$this->form_validation->set_rules('jenis_kriteria', 'Jenis Kriteria', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->kriteria->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Kriteria", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get_core' => $this->kriteria->get_core(),
		);

		$this->template->view('Kominfo/kriteria/create-kriteria', $this->data);
	}

	public function update($param = 0)
	{
		$this->page_title->push('Kriteria', 'Ubah Data Kriteria');

		$this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'trim|required');
		$this->form_validation->set_rules('jenis_kriteria', 'Jenis Kriteria', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->kriteria->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Kriteria", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get'=> $this->kriteria->get($param),
		);

		$this->template->view('Kominfo/kriteria/update-kriteria', $this->data);
	}


	public function delete($param = 0)
	{
		$this->kriteria->delete($param);

		redirect('kriteria');
	}

}

/* End of file kriteria.php */
/* Location: ./application/controllers/kriteria.php */