<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msub_kriteria extends Kominfo_model 
{

	public function __construct()
	{
		parent::__construct();
	}

// ini tabel join
	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('tbl_sub_kriteria');
		$this->db->join('tbl_kriteria', '.tbl_kriteria.id_kriteria = tbl_sub_kriteria.id_kriteria','LEFT');
		return $this->db->get()->result();
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
	

}

/* End of file Msub_kriteria.php */
/* Location: ./application/models/Msub_kriteria.php */