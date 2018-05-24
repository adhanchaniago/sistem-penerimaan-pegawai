<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpelamar extends Kominfo_model 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function gett_all()
	{
		$this->db->select('*');
		$this->db->from('tbl_pelamar');
		$this->db->join('districts', '.districts.id = tbl_pelamar.id','LEFT');
		$this->db->join('regencies', '.regencies.id = tbl_pelamar.id','LEFT');
		$this->db->join('villages', '.villages.id = tbl_pelamar.id','LEFT');
		return $this->db->get()->result();
	}
	
	public function cek($param = 0)
	{
		return $this->db->get_where('tbl_pelamar', array('kd_pelamar' => $param) )->num_rows();
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('query') != '')
			$this->db->like('kd_pelamar', $this->input->get('query'))
						->or_like('nama_lengkap', $this->input->get('query'));

		if($type == 'result')
		{
			return $this->db->get('tbl_pelamar', $limit, $offset)->result();
		} else {
			return $this->db->get('tbl_pelamar')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('tbl_pelamar', array('kd_pelamar' => $param))->row();
		
	}


	public function create()
	{
		$config['upload_path'] = './assets/images/documen/';
		$config['allowed_types'] = 'gif|jpg|JPG|png|pdf|PDF|jpeg|JPEG';
		$config['max_size']  = '5120';
		$config['max_width']  = '4000';
		$config['max_height']  = '3000';
		
		$this->upload->initialize($config);
		
		if($this->upload->do_upload('foto')) 
		{
			$foto = $this->upload->file_name;
		} else {
			$foto = 'No Images';
		}

		if($this->upload->do_upload('file')) 
		{
			$file = $this->upload->file_name;
		} else {
			$file = 'No Berkas';
		}

		$pelamar = array(
			'kd_pelamar'=> $this->input->post('no_invoice'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'no_ktp' => $this->input->post('no_ktp'),
			'tmp_lahir' => $this->input->post('tmp_lahir'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat' => $this->input->post('alamat'),
			'agama' => $this->input->post('agama'),
			'rt' => $this->input->post('rt'),
			'rw' => $this->input->post('rw'),
			'provinsi' => $this->input->post('provinsi'),
			'kabupaten' => $this->input->post('kabupaten'),
			'kecamatan' => $this->input->post('kecamatan'),
			'desa' => $this->input->post('desa'),
			'pend_terakhir' => $this->input->post('pend_terakhir'),
			'foto' => $foto,
			'file' => $file
		);

		$this->db->insert('tbl_pelamar', $pelamar);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Penduduk ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}

	public function update($param = 0)
	{
		$get = $this->get($param);

		$config['upload_path'] = './assets/images/documen/';
		$config['allowed_types'] = 'gif|jpg|JPG|png|pdf|PDF|jpeg|JPEG';
		$config['max_size']  = '5120';
		$config['max_width']  = '4000';
		$config['max_height']  = '3000';
		
		$this->upload->initialize($config);
		
		if($this->upload->do_upload('foto')) 
		{
			if($get->foto != FALSE)
				@unlink("assets/images/documen/{$get->foto}");

			$foto = $this->upload->file_name;
		} else {
			$foto = $get->foto;
		}

		if($this->upload->do_upload('file')) 
		{
			if($get->file != FALSE)
				@unlink("assets/images/documen/{$get->file}");

			$file = $this->upload->file_name;
		} else {
			$file = $get->file;
		}

		$pelamar = array(
			// 'kd_pelamar'=> $this->input->post('no_invoice'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'no_ktp' => $this->input->post('no_ktp'),
			'tmp_lahir' => $this->input->post('tmp_lahir'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'alamat' => $this->input->post('alamat'),
			'agama' => $this->input->post('agama'),
			'rt' => $this->input->post('rt'),
			'rw' => $this->input->post('rw'),
			'provinsi' => $this->input->post('provinsi'),
			'kabupaten' => $this->input->post('kabupaten'),
			'kecamatan' => $this->input->post('kecamatan'),
			'desa' => $this->input->post('desa'),
			'pend_terakhir' => $this->input->post('pend_terakhir'),
			'foto' => $foto

		);

		$this->db->update('tbl_pelamar', $pelamar, array('kd_pelamar' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Penduduk di Update.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal di update data.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}

	public function delete($param = 0)
	{
		$get = $this->get($param);

		if($get->foto != FALSE)
			@unlink("assets/images/documen/{$get->foto}");
		if($get->file != FALSE)
			@unlink("assets/images/documen/{$get->file}");

		$this->db->delete('tbl_pelamar', array('kd_pelamar' => $param));
		// $this->db->delete('tbl_analisa', array('id_analisa' => $param));
		// $this->db->delete('notifikasi', array('id_notifikasi' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'data pelamar dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dihapus.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}


	public function get_no_invoice()
	{
		$q = $this->db->query("SELECT MAX(RIGHT(kd_pelamar,1)) AS kd_max FROM tbl_pelamar ");

		//return($q->row());

	    $kd = "";
	    if($q->num_rows()>0)
			{
			    foreach($q->result() as $k )
				{
			        $urut = ((int)$k->kd_max)+1;
			        $kd = sprintf("%04s", $urut);
			    }
			    }else{
			        $kd = "0001";
		    	}
		    date_default_timezone_set('Asia/Jakarta');
		    
		    return $kd;
	}

	public function get_all_provinsi()
	{
		$this->db->select('*');

		$this->db->from('provinces');
		   
		$query = $this->db->get();
		   
		return $query->result();
	}

	public function desa($id = 0)
	{
		return $this->db->get_where('villages', array('id' => $id) )->row();
	}

	public function kabupaten($id = 0)
	{
		return $this->db->get_where('regencies', array('id' => $id) )->row();
	}

	public function kecamatan($id = 0)
	{
		return $this->db->get_where('districts', array('id' => $id) )->row();
	}

		public function provinsi($id = 0)
	{
		return $this->db->get_where('provinces', array('id' => $id) )->row();
	}

}

/* End of file Mpelamar.php */
/* Location: ./application/models/Mpelamar.php */