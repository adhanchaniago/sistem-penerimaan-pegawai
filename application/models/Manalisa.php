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

		// $this->db->select('tbl_pelamar.*, notifikasi.id_notifikasi AS status, notifikasi.id_notifikasi  AS id_status, notifikasi.id_notifikasi AS id_status, notifikasi.status,tbl_nilai.*,tbl_pelamar.*,notifikasi.*, tbl_pelamar.kd_pelamar AS id');

		// //$this->db->from('tbl_pelamar.kd_pelamar');

		// $this->db->join('notifikasi', 'tbl_pelamar.kd_pelamar = notifikasi.kd_pelamar', 'left');

		// $this->db->join('tbl_nilai', 'notifikasi.kd_pelamar = tbl_nilai.kd_pelamar', 'left');

		// $this->db->group_by('tbl_nilai.kd_pelamar');

		// $this->db->order_by('kd_pelamar', 'ASC');

		if($type == 'result')
		{
		$this->db->select('tbl_pelamar.*, notifikasi.id_notifikasi AS status, notifikasi.id_notifikasi  AS id_status, notifikasi.id_notifikasi AS id_status, notifikasi.status,tbl_nilai.*,tbl_pelamar.*,notifikasi.*, tbl_pelamar.kd_pelamar AS id');

		$this->db->from('tbl_pelamar');

		$this->db->join('notifikasi', 'tbl_pelamar.kd_pelamar = notifikasi.kd_pelamar', 'left');

		$this->db->join('tbl_nilai', 'notifikasi.kd_pelamar = tbl_nilai.kd_pelamar', 'left');

		$this->db->group_by('tbl_nilai.kd_pelamar');

		$this->db->limit($limit, $offset);
		
		return $this->db->get()->result();
			// return $this->db->get('tbl_pelamar', $limit, $offset)->result();

		} else {
			
		$this->db->select('tbl_pelamar.*, notifikasi.id_notifikasi AS status, notifikasi.id_notifikasi  AS id_status, notifikasi.id_notifikasi AS id_status, notifikasi.status,tbl_nilai.*,tbl_pelamar.*,notifikasi.*, tbl_pelamar.kd_pelamar AS id');

		$this->db->from('tbl_pelamar');

		$this->db->join('notifikasi', 'tbl_pelamar.kd_pelamar = notifikasi.kd_pelamar', 'left');

		$this->db->join('tbl_nilai', 'notifikasi.kd_pelamar = tbl_nilai.kd_pelamar', 'left');

		$this->db->group_by('tbl_nilai.kd_pelamar');

		$this->db->limit($limit, $offset);

			return $this->db->get()->num_rows();

			//return $this->db->get('tbl_pelamar')->num_rows();
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

	// public function get_data1($param = 0)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('tbl_analisa');
	// 	$this->db->join('tbl_pelamar', 'tbl_analisa.kd_pelamar = tbl_pelamar.kd_pelamar', 'left');
	// 	$this->db->where('tbl_analisa.kd_pelamar', $param);

	// 	return $this->db->get()->row();
	// }

	public function get_analisa($param = 0)
	{
		$this->db->select('*');
		$this->db->from('tbl_nilai');
		$this->db->join('tbl_pelamar', 'tbl_nilai.kd_pelamar = tbl_pelamar.kd_pelamar', 'left');
		$this->db->where('tbl_nilai.kd_pelamar', $param);

		return $this->db->get()->row();
	}


	public function get_create($param = 0)
	{
		$this->db->select('*');
		$this->db->from('tbl_tes');
		$this->db->join('tbl_konversi', 'tbl_tes.id_kriteria = tbl_konversi.id_kriteria', 'left');

		$this->db->where('tbl_tes.id_kriteria', $param);
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
		foreach ($this->input->post('id_konversi[]') as $key => $value) 
		{
			$dataNilai[] = array(
				'kd_pelamar' => $this->input->post('kd_pelamar'),
				'id_konversi' => $value,
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
		// $this->db->delete('tbl_analisa', array('id_analisa' => $param));
		// $this->db->delete('notifikasi', array('id_notifikasi' => $param));

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

	public function get_Subkriteria($param = 0)
	{
		return $this->db->get_where('tbl_sub_kriteria', array('id_sub_kriteria', $param ))->row();
	}

	// public function get_kriteria($id = 0)
	// {
	// 	return $this->db->get_where('tbl_kriteria', array('id_kriteria', $id))->row();
	// }

	public function get_Profil($param = 0)
	{
		return $this->db->get_where('tbl_nilai', array('id_nilai' => $param))->row();
	}

	public function join($param = 0)
	{
		$this->db->select('*');
		$this->db->from('tbl_nilai');
		$this->db->join('tbl_konversi', 'tbl_nilai.id_konversi = tbl_konversi.id_konversi', 'left');

		$this->db->where('tbl_nilai.kd_pelamar', $param);
		return $this->db->get()->result();
	}

	public function get_sub_urut($param = 0)
	{
		$this->db->select('*');
		$this->db->from('tbl_sub_kriteria');
		$this->db->join('tbl_kriteria', '.tbl_kriteria.id_kriteria = tbl_sub_kriteria.id_kriteria','LEFT');
		//$this->db->where('tbl_sub_kriteria.id_kriteria');
		$this->db->order_by('tbl_kriteria.id_kriteria', 'ASC'); //ASC Dari Kecil Ke besar DESC Dari Besar Ke kecil
		return $this->db->get()->result();

	}

	public function pengurangan_nilai($param=0)
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

/* End of file Manalisa.php */
/* Location: ./application/models/Manalisa.php */