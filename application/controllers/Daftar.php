<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library( array('session', 'form_validation', 'session','template'));
		$this->load->model('mdaftar','daftar');
		//Do your magic here
	}

	
	public function index()
	{

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('no_telp', 'No Handphone', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[12]|required');
		$this->form_validation->set_rules('repeat_pass', 'Ulangi Password', 'trim|matches[password]|required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->daftar->create();

			redirect(current_url());
			
		}

		$this->data = array(
			'title' => "KEMKOMINFO - Sistem Informasi Penerimaan Karyawan Kemkominfo Provinsi Bangka Belitung"
			
		);

		$this->load->view('Kominfo/daftar', $this->data);
	}



}

/* End of file Daftar.php */
/* Location: ./application/controllers/Daftar.php */