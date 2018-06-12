<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpengumuman extends Kominfo_Model 
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('query') != '')
			$this->db->like('tbl_pelamar.kd_pelamar', $this->input->get('query'))
						->or_like('tbl_pelamar.nama_lengkap', $this->input->get('query'));


		if($type == 'result')
		{	
			return $this->db->get('tbl_pelamar', $limit, $offset)->result();
		} else {
			return $this->db->get('tbl_pelamar')->num_rows();
		}
	}

	public function ngambil($param = 0)
	{
		$this->db->select('*');
		$this->db->from('tbl_nilai');
		$this->db->join('tbl_pelamar', 'tbl_pelamar.kd_pelamar = tbl_nilai.kd_pelamar', 'left');
		$this->db->join('tbl_konversi', 'tbl_konversi.id_konversi = tbl_nilai.id_konversi', 'left');
		$this->db->join('tbl_sub_kriteria', 'tbl_sub_kriteria.id_kriteria = tbl_konversi.id_kriteria ', 'left');
		$this->db->where('tbl_pelamar.kd_pelamar', $param);
		$this->db->order_by('tbl_konversi.id_konversi', 'ASC'); 
		return $this->db->get()->result();

	}

	public function get_pelamar()
	{
		return $this->db->get('tbl_pelamar')->result();
	}

	public function get_nama()
	{
		$this->db->select('*');
		$this->db->from('tbl_nilai');
		$this->db->join('tbl_pelamar', 'tbl_nilai.kd_pelamar = tbl_pelamar.kd_pelamar', 'left');
		// $this->db->where('tbl_nilai.kd_pelamar');

		return $this->db->get()->row();
	}

	public function nilai_profile($param=0)
	{
		$this->db->select('*');
		$this->db->from('tbl_konversi');
		$this->db->join('tbl_sub_kriteria', 'tbl_sub_kriteria.id_kriteria = tbl_konversi.id_kriteria ', 'left');
		$this->db->join('tbl_nilai', 'tbl_konversi.id_konversi = tbl_nilai.id_konversi', 'left');
		$this->db->where('tbl_nilai.kd_pelamar', $param);
		$this->db->order_by('tbl_konversi.id_konversi', 'ASC'); //ASC Dari Kecil Ke besar DESC Dari Besar Ke kecil
		return $this->db->get()->result();

		//return $this->db->get_where('tbl_sub_kriteria.id_kriteria', array('id_kriteria'))->result();

	}
}

/* End of file Mpengumuman.php */
/* Location: ./application/models/Mpengumuman.php */