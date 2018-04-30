<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bobot extends Kominfo 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->js(base_url('assets/public/app/bobot.js'));
		$this->load->model('mbobot','bobot');
		$this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');
		$this->page = $this->input->get('page');
		
	}

	public function index()
	{
		$this->page_title->push('Bobot Nilai GAP', 'Data Nilai GAP');

		$this->data = array(
			'title' => "Panduan Aplikasi", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'bobot' => $this->bobot->get_all($this->per_page, $this->page,'result'),	
		);

		$this->template->view('Kominfo/bobot/data-bobot', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Bobot Nilai', 'Tambah Data Bobot Nilai');

		$this->form_validation->set_rules('selisih', 'Selisi', 'trim|required');
		$this->form_validation->set_rules('bobot_nilai', 'Bobot Nilai', 'trim|required');
		$this->form_validation->set_rules('ket', 'keterangan', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->bobot->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Bobot Nilai", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('Kominfo/bobot/create-bobot', $this->data);
	}

	public function update($param = 0)
	{
		$this->page_title->push('Bobot Nilai', 'Tambah Data Bobot Nilai');

		$this->form_validation->set_rules('selisih', 'Selisi', 'trim|required');
		$this->form_validation->set_rules('bobot_nilai', 'Bobot Nilai', 'trim|required');
		$this->form_validation->set_rules('ket', 'keterangan', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->bobot->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Bobot Nilai", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->bobot->get($param)
		);

		$this->template->view('Kominfo/bobot/update-bobot', $this->data);
	}
}

/* End of file bobot.php */
/* Location: ./application/controllers/bobot.php */