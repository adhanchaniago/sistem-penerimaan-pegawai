<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function index()
	{
		$this->data = array(
			'title' => "KEMKOMINFO - Sistem Informasi Penerimaan Karyawan Kemkominfo Provinsi Bangka Belitung"
		);

		$this->load->view('Portal', $this->data);
	}


}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */