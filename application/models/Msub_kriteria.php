<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msub_kriteria extends Kominfo_model 
{

	public function __construct()
	{
		parent::__construct();
	}

// ini tabel join
	public function get_all($param = 0)
	{
		$this->db->select('*');
		$this->db->from('tbl_sub_kriteria');
		$this->db->join('tbl_kriteria', '.tbl_kriteria.id_kriteria = tbl_sub_kriteria.id_kriteria','LEFT');

		//$this->db->group_by('tbl_kriteria.nama_kriteria', $param);
		$this->db->order_by('tbl_kriteria.id_kriteria', 'ASC');

		return $this->db->get()->result();

	}

	public function get($param = 0)
	{
		return $this->db->get_where('tbl_kriteria', array('id_kriteria' => $param))->row();
	}

	public function get_sub($param = 0)
	{
		return $this->db->get_where('tbl_sub_kriteria', array('id_sub_kriteria' => $param))->row();
	}

	public function gett_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('query') != '')
			$this->db->like('nama_kriteria', $this->input->get('query'))
					 ->or_like('jenis_kriteria', $this->input->get('query'));
					 
		
		if($type == 'result')
		{	
			//$this->db->select('*');
			$this->db->from('tbl_sub_kriteria');
			$this->db->join('tbl_sub_kriteria', 'tbl_sub_kriteria.id_kriteria = tbl_kriteria.id_kriteria', 'left');

			
			return $this->db->get($limit, $offset)->result();

			//return $this->db->get('tbl_kriteria', $limit, $offset)->result();
		} else {

			//$this->db->select('*');
			$this->db->from('tbl_sub_kriteria');
			$this->db->join('tbl_kriteria', 'tbl_kriteria.id_kriteria = tbl_sub_kriteria.id_kriteria', 'left');

			return $this->db->get($limit, $offset)->num_rows();

			//return $this->db->get('tbl_kriteria')->num_rows();
		}
	}

	public function create()
	{
		$data = array(
			'id_kriteria' => $this->input->post('nama_kriteria'),
			'nama_subkriteria' => $this->input->post('nama_subkriteria'),
			'nilai_ideal' =>$this->input->post('nilai_ideal'),
			
		);

		$this->db->insert('tbl_sub_kriteria', $data);

		$data1 = array(
			'id_kriteria' => $this->input->post('nama_kriteria'),
			'NPS' =>$this->input->post('nilai_ideal'),
			
		);

		$this->db->insert('tbl_profile_standar', $data1);
		
		// $data2 = array(
		// 	'id_kriteria' => $this->input->post('nama_kriteria'),
		// 	'nama' => $this->input->post('nama_kriteria'),
			
		// );
		//  $this->db->insert('tbl_tes', $data2);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Sub Kriteria ditambahkan.', 
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
			// 'id_sub_kriteria' => $this->input->post('id_sub_kriteria'),
			'id_kriteria' => $this->input->post('nama_kriteria'),
			'nama_subkriteria' => $this->input->post('nama_subkriteria'),
			'nilai_ideal' =>$this->input->post('nilai_ideal'),
			
		);

		$this->db->update('tbl_sub_kriteria', $data, array('id_sub_kriteria' => $param));

		$data1 = array(
			'id_kriteria' => $this->input->post('nama_kriteria'),
			'NPS' =>$this->input->post('nilai_ideal'),
			
		);

		$this->db->update('tbl_profile_standar', $data1);
		
		
		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Sub Kriteria ditambahkan.', 
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
		
		$this->db->delete('tbl_sub_kriteria', array('id_sub_kriteria' => $param));
		//$this->db->delete('tbl_profile_standar', array('ID_NPS' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'data Sub Kriteria dihapus.', 
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

/* End of file Msub_kriteria.php */
/* Location: ./application/models/Msub_kriteria.php */