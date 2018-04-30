<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdaftar extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function create()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'no_telp' => $this->input->post('no_telp'),
			'email' => $this->input->post('email'),
			'level' => Username,
		);

		$this->db->insert('users', $data);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Anda Telah Terdaftar.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal Mendaftar.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

}

/* End of file Mdaftar.php */
/* Location: ./application/models/Mdaftar.php */