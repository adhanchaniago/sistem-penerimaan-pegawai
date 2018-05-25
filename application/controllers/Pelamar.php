<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar extends Kominfo 
{
	public $query;

	public $per_page;

	public $page = 20;

	public  function __construct()
	{
		parent::__construct();
		$this->query = $this->input->get('query');
		$this->load->model('mpelamar', 'pelamar');
		$this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');
		$this->load->js(base_url('assets/public/app/pelamar.js'));
		$this->page = $this->input->get('page');
		$this->query = $this->input->get('query');
	}

	public function index()
	{
		$this->page_title->push('Pelamar', 'Data Pelamar');

		$config = $this->template->pagination_list();
		$config['base_url'] = site_url("pelamar?per_page={$this->per_page}&query={$this->query}");
		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->pelamar->get_all(null, null, 'num');

		$this->data = array(
			'title' => "Data Pelamar", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'pelamar' => $this->pelamar->get_all($this->per_page, $this->page, 'result'),
			//'download' => $this->pelamar->get_download(),		
		);

		$this->template->view('Kominfo/pelamar/data-pelamar', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Lamaran Pekerjaan', 'Tambah Data Pelamar');

		$this->form_validation->set_rules('nama_lengkap', 'Nama', 'trim|required');
		$this->form_validation->set_rules('no_ktp', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten/ Kota ', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamataan ', 'trim|required');
		$this->form_validation->set_rules('desa', 'Kelurahan/ Desa ', 'trim|required');
		$this->form_validation->set_rules('pend_terakhir', 'Pendidikan Terakhir', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->pelamar->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Panduan Aplikasi", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'provinsi' => $this->pelamar->get_all_provinsi(),
			'kd_pelamar' => $this->pelamar->get_no_invoice(),
		);

		$this->template->view('Kominfo/pelamar/create-pelamar', $this->data);
	}

	public function update($param = 0)
	{
		if (!$param) {
			show_404();
		}

		if ($this->pelamar->cek($param) == 0) {
			show_404();
			
		}

		$this->page_title->push('Lamaran Pekerjaan', 'Tambah Data Pelamar');

		$this->form_validation->set_rules('nama_lengkap', 'Nama', 'trim|required');
		$this->form_validation->set_rules('no_ktp', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten/ Kota ', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamataan ', 'trim|required');
		$this->form_validation->set_rules('desa', 'Kelurahan/ Desa ', 'trim|required');
		$this->form_validation->set_rules('pend_terakhir', 'Pendidikan Terakhir', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->pelamar->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Panduan Aplikasi", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'provinsi' => $this->pelamar->get_all_provinsi(),
			'kd_pelamar' => $this->pelamar->get_no_invoice(),
			'get' => $this->pelamar->get($param),
		);

		$this->template->view('Kominfo/pelamar/update-pelamar', $this->data);
	}

	public function delete($param = 0)
	{
		$this->pelamar->delete($param);

		redirect('pelamar');
	}

	public function add_ajax_kab($id_prov)
	{
	      $query = $this->db->get_where('regencies', array('province_id'=> $id_prov));
	      $data = "<option value=''> - PILIH Kabupaten/Kota -</option>";
	      foreach ($query->result() as $value) {
	          $data .= "<option value='".$value->id."'>".$value->name."</option>";
	      }
	      echo $data;
  	}
  
  	public function add_ajax_kec($id_kab)
	 {
	      $query = $this->db->get_where('districts',array('regency_id'=>$id_kab));
	      $data = "<option value=''> - PILIH Kecamatan - </option>";
	      foreach ($query->result() as $value) {
	          $data .= "<option value='".$value->id."'>".$value->name."</option>";
	      }
	      echo $data;
	 }
  
  	public function add_ajax_des($id_kec)
	  {
	      $query = $this->db->get_where('villages',array('district_id'=>$id_kec));
	      $data = "<option value=''> - PILIH Kelurahan/Desa - </option>";
	      foreach ($query->result() as $value) {
	          $data .= "<option value='".$value->id."'>".$value->name."</option>";
	      }
	      echo $data;
	  }

	 public function get_no_invoice()
	  {
	  	$this->pelamar->get_no_invoice();
	  }

	//   public function download()
	//   {
	//   	if ($file) 
	//   	{
	// 	    $file = realpath ( "download" ) . "\\" . $file;
	// 	    // check file exists    
	// 	    if (file_exists($file)) 
	// 	    {
	// 	     // get file content
	// 	     $data = file_get_contents($file);
	// 	     //force download
	// 	     force_download($file,$data);
	// 	    } else
	// 	    {
	// 	     // Redirect to base url
	// 	     redirect (base_url());
	//   		}
	// 	}
	// }

}

/* End of file Pelamar.php */
/* Location: ./application/controllers/Pelamar.php */