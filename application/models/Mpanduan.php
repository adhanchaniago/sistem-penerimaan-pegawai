<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpanduan extends Kominfo_model

{
	public function __construct()

	{
		parent::__construct();
	}


	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('query') != '')
			$this->db->like('nomor', $this->input->get('query'))
					 ->or_like('nama_panduan', $this->input->get('query'));
					 
		
		if($type == 'result')
		{
			return $this->db->get('panduan', $limit, $offset)->result();
		} else {
			return $this->db->get('panduan')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('panduan', array('id' => $param))->row();
	}

	public function cek($param = 0)
	{
		return $this->db->get_where('tbl_pelamar', array('id' => $param) )->num_rows();
	}

	public function create ( )
	{
		$data = array(
			'nomor' => $this->input->post('nomor'),
			'nama_panduan' => $this->input->post('nama_panduan'),
			
		);

		$this->db->insert('panduan', $data);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' panduan ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function update ($param = 0)
	{
		$data = array(
			'nomor' => $this->input->post('nomor'),
			'nama_panduan' => $this->input->post('nama_panduan'),
			
		);

		$this->db->update('panduan', $data, array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' panduan ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function delete($param = 0)
	{
		$this->db->delete('panduan', array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'panduan dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dihapus.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

}

/* End of file Mpanduan.php */
/* Location: ./application/models/Mpanduan.php */