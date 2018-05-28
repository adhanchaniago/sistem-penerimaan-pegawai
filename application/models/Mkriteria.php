<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkriteria extends Kominfo_model 
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('query') != '')
			$this->db->like('nama_kriteria', $this->input->get('query'))
					 ->or_like('jenis_kriteria', $this->input->get('query'));
					 
		// $this->db->group_by('jenis_kriteria');
		
		if($type == 'result')
		{
			return $this->db->get('tbl_kriteria', $limit, $offset)->result();
		} else {
			return $this->db->get('tbl_kriteria')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('tbl_kriteria', array('id_kriteria' => $param))->row();
	}

	public function get_core($limit = 20, $offset = 0, $type = 'result')
	{
		$this->db->group_by('jenis_kriteria');

		if($type == 'result')
		{
			return $this->db->get('tbl_kriteria', $limit, $offset)->result();
		} else {
			return $this->db->get('tbl_kriteria')->num_rows();
		}
	}


	public function create()
	{
		$data = array(
			'nama_kriteria' => $this->input->post('nama_kriteria'),
			'jenis_kriteria' => $this->input->post('jenis_kriteria'),
			
		);
		 $this->db->insert('tbl_kriteria', $data);

		$data1 = array(
			'id_kriteria' => $this->input->post('nama_kriteria'),
			'nama' => $this->input->post('nama_kriteria'),
			
		);
		 $this->db->insert('tbl_tes', $data1);


		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Kriteria ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}

	}

	public function update($param = 0)
	{
		$data = array(
			'nama_kriteria' => $this->input->post('nama_kriteria'),
			'jenis_kriteria' => $this->input->post('jenis_kriteria'),
			
		);
		$this->db->update('tbl_kriteria', $data , array('id_kriteria' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Kriteria berhasil di update.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal update data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}

	}

	public function delete($param = 0)
	{
		$this->db->delete('tbl_kriteria', array('id_kriteria' => $param));
		$this->db->delete('tbl_sub_kriteria', array('id_kriteria' => $param));
		$this->db->delete('tbl_profile_standar', array('id_kriteria' => $param));
		$this->db->delete('tbl_tes', array('id_tes' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'data Kriteria dihapus.', 
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

/* End of file Mkriteria.php */
/* Location: ./application/models/Mkriteria.php */