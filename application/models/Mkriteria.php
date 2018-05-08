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
					 
		
		if($type == 'result')
		{
			return $this->db->get('tbl_kriteria', $limit, $offset)->result();
		} else {
			return $this->db->get('tbl_kriteria')->num_rows();
		}
	}

}

/* End of file Mkriteria.php */
/* Location: ./application/models/Mkriteria.php */