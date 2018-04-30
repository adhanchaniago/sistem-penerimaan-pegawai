<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbobot extends Kominfo_model
{

	public function __construct()

	{
		parent::__construct();
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('query') != '')
			$this->db->like('selisih', $this->input->get('query'))
					 ->or_like('bobot_nilai', $this->input->get('query'));
					 
		
		if($type == 'result')
		{
			return $this->db->get('tbl_bobot', $limit, $offset)->result();
		} else {
			return $this->db->get('tbl_bobot')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('tbl_bobot', array('id_bobot' => $param))->row();
	}

	public function create()
	{
		$data = array(
			'selisih' => $this->input->post('selisih'),
			'bobot_nilai' => $this->input->post('bobot_nilai'),
			'ket' => $this->input->post('ket'),
			
		);
		$this->db->insert('tbl_bobot', $data);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Bobot Nilai ditambahkan.', 
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
			'selisih' => $this->input->post('selisih'),
			'bobot_nilai' => $this->input->post('bobot_nilai'),
			'ket' => $this->input->post('ket'),
			
		);
		$this->db->update('tbl_bobot', $data, array('id_bobot' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Bobot Nilai di update.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}

	}

}

/* End of file Mbobot.php */
/* Location: ./application/models/Mbobot.php */