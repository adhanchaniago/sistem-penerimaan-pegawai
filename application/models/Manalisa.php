<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manalisa extends Kominfo_model 
{

	public function __construct()

	{
		parent::__construct();
	}

// join 3 tabel
	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('query') != '')
			$this->db->like('tbl_pelamar.kd_pelamar', $this->input->get('query'))
						->or_like('tbl_pelamar.nama_lengkap', $this->input->get('query'));

		$this->db->select('tbl_pelamar.*, notifikasi.id_notifikasi AS status, notifikasi.id_notifikasi  AS id_status, notifikasi.id_notifikasi AS id_status, notifikasi.status,tbl_analisa.*,tbl_pelamar.*,notifikasi.*, tbl_pelamar.kd_pelamar AS id');

		//$this->db->from('tbl_pelamar');

		$this->db->join('notifikasi', 'tbl_pelamar.kd_pelamar = notifikasi.kd_pelamar', 'left');

		$this->db->join('tbl_analisa', 'notifikasi.kd_pelamar = tbl_analisa.kd_pelamar', 'left');

		// $this->db->order_by('kd_pelamar', 'ASC');

		if($type == 'result')
		{
			return $this->db->get('tbl_pelamar', $limit, $offset)->result();

		} else {
			
			return $this->db->get('tbl_pelamar')->num_rows();
		}
	}

	public function get($param = 0)
	{
		//return $this->db->get_where('tbl_pelamar', array('id' => $param))->row();
		$this->db->select('*');
		$this->db->from('tbl_pelamar');
		$this->db->join('districts', '.districts.id = tbl_pelamar.id','LEFT');
		$this->db->join('regencies', '.regencies.id = tbl_pelamar.id','LEFT');
		$this->db->join('villages', '.villages.id = tbl_pelamar.id','LEFT');
		return $this->db->get()->row();
	}

	public function nilai($param = 0)
	{

		return $this->db->get_where('tbl_pelamar', array('kd_pelamar' => $param))->result();
	}

	public function get_analisa($param = 0)
	{
		$this->db->select('*');
		$this->db->from('tbl_analisa');
		$this->db->join('tbl_pelamar', 'tbl_analisa.kd_pelamar = tbl_pelamar.kd_pelamar', 'left');
		$this->db->where('tbl_analisa.kd_pelamar', $param);

		return $this->db->get()->row();
	}


	public function get_create($param = 0)
	{
		$this->db->select('*');
		$this->db->from('tbl_tes');
		$this->db->join('tbl_konversi', 'tbl_tes.id_tes = tbl_konversi.id_tes', 'left');

		$this->db->where('tbl_tes.id_tes', $param);
		//$this->db->order_by('nilai', 'desc');
		return $this->db->get()->result();
	}

	public function get_data($param = 0)
	{
		return $this->db->get('tbl_pelamar', array('kd_pelamar' => $param))->row();
	}


	public function create()
	{
		

// Loop nilai berganda
		$dataNilai = array();
		foreach ($this->input->post('id_konversi') as $key => $value) 
		{
			$dataNilai[] = array(
				'kd_pelamar' => $this->input->post('kd_pelamar'),
				'id_konversi' => $value
			);
		}

		$this->db->insert_batch('tbl_nilai', $dataNilai);

		$data2 = array(
			'kd_pelamar' => $this->input->post('kd_pelamar'),
			'status' => 'telah',
		);

		$this->db->insert('notifikasi', $data2);


		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Penilaian Karyawan ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal Menambahkan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}
//Tutup Loop nilai berganda

	public function delete($param = 0)
	{	
		
		$this->db->delete('tbl_pelamar', array('kd_pelamar' => $param));
		$this->db->delete('tbl_analisa', array('id_analisa' => $param));
		$this->db->delete('notifikasi', array('id_notifikasi' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'data analisa dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dihapus.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function get_konversi($value=0)		
	{
		return $this->db->get_where('tbl_konversi', array('id_konversi' => $value ))->row();
	}

	public function get_kre($value= 0)
	{
		return $this->db->get_where('tbl_sub_kriteria', array('id_sub_kriteria' => $value ))->row();
	}
}

/* End of file Manalisa.php */
/* Location: ./application/models/Manalisa.php */