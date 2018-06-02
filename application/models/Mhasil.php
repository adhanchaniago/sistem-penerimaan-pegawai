<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhasil extends Kominfo_model 
{

	public function __construct()

	{
		parent::__construct();
	}

	public function ngambil()
	{
		$this->db->select('*');
		$this->db->from('tbl_nilai');
		$this->db->join('tbl_pelamar', 'tbl_pelamar.kd_pelamar = tbl_nilai.kd_pelamar', 'left');
		$this->db->join('tbl_konversi', 'tbl_konversi.id_konversi = tbl_nilai.id_konversi', 'left');
		$this->db->join('tbl_sub_kriteria', 'tbl_sub_kriteria.id_kriteria = tbl_konversi.id_kriteria ', 'left');
		return $this->db->get()->result();

	}

	public function get_nama()
	{
		$this->db->select('*');
		$this->db->from('tbl_nilai');
		$this->db->join('tbl_pelamar', 'tbl_nilai.kd_pelamar = tbl_pelamar.kd_pelamar', 'left');
		// $this->db->where('tbl_nilai.kd_pelamar');

		return $this->db->get()->row();
	}
}

/* End of file Mhasil.php */
/* Location: ./application/models/Mhasil.php */