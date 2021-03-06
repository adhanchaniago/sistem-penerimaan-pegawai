<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkonversi extends Kominfo_model 
{

	public function __construct()

	{
		parent::__construct();
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('query') != '')
			$this->db->like('nama', $this->input->get('query'))
					 ->or_like('nilai', $this->input->get('query'));

		if($type == 'result')
		{
			
			return $this->db->get('tbl_konversi', $limit, $offset)->result();
			
		} else {
			return $this->db->get('tbl_konversi')->num_rows();
			
		}
	}

	public function gett_all()
	{
		$this->db->select('*');
		$this->db->from('tbl_konversi');
		$this->db->join('tbl_tes', 'tbl_tes.id_kriteria = tbl_konversi.id_kriteria','LEFT');

		//$this->db->group_by('id_tes');
		// $this->db->order_by('nilai', 'ASC');
		// $this->db->order_by('nama', 'desc');
		
		return $this->db->get()->result();
	}

	public function get_konversinama($param = 0)
	{
		return $this->db->get_where('tbl_konversi', array('id_konversi' => $param))->num_rows();
	}

	public function get_nm($param = 0)
	{
		return $this->db->get_where('tbl_tes', array('id_tes' => $param))->num_rows();
	}

	public function get_update($param = 0)
	{
		$this->db->select('*');
		$this->db->from('tbl_konversi');
		$this->db->join('tbl_tes', 'tbl_tes.id_kriteria = tbl_konversi.id_kriteria','LEFT');

		$this->db->group_by('tbl_konversi.id_kriteria');
		$this->db->order_by('nama', 'ASC');
		
		return $this->db->get()->result();

	}

	public function get_nama($limit = 20, $offset = 0, $type = 'result')
	{
					
		if($type == 'result')
		{
			$this->db->group_by('id_tes');
			return $this->db->get('tbl_tes', $limit, $offset)->result();
			
		} else {
			$this->db->group_by('id_tes');
			return $this->db->get('tbl_tes')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('tbl_konversi', array('id_konversi' => $param))->row();
	}

	public function create()
	{
		$data = array(
			//'id_tes' => $this->input->post('id_tes'),
			'id_kriteria' => $this->input->post('id_kriteria'),
			'nilai' => $this->input->post('nilai'),
			'range' => $this->input->post('range'),
			
		);
		$this->db->insert('tbl_konversi', $data);

		// $data = array(
		// 	'' => $this->input->post('nama_konversi'),
		// );
		// $this->db->insert('nm_konversi', $data);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Konversi Nilai ditambahkan.', 
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
			'id_kriteria' => $this->input->post('id_kriteria'),
			'nilai' => $this->input->post('nilai'),
			'range' => $this->input->post('range'),
			
		);

		$this->db->update('tbl_konversi', $data, array('id_konversi' => $param));

		// $data = array(
		// 	'nama_konversi' => $this->input->post('nama_konversi'),
		// );
		// $this->db->insert('nm_konversi', $data);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Konversi di update.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Data Gagal Di ubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}
	
	public function delete($param = 0)
	{
		$this->db->delete('tbl_konversi', array('id_konversi' => $param));
		//$this->db->delete('tbl_sub_kriteria', array('id_sub_kriteria' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'data Konversi dihapus.', 
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

/* End of file Mkonversi.php */
/* Location: ./application/models/Mkonversi.php */