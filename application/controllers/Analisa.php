<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisa extends Kominfo 
{
	public $query;

	public $per_page;

	public $page = 20;

	public function __construct()
	{
		parent:: __construct();
		$this->load->js(base_url('assets/public/app/analisa.js'));
		//$this->load->model('mpelamar', 'pelamar');
		$this->load->model('manalisa','analisa');
		$this->load->model('mkonversi','konversi');
		$this->load->model('msub_kriteria','sub_kriteria');
		$this->page = $this->input->get('page');
	}

	public function index()
	{
		$this->page_title->push('Analisa', 'Data Analisa');
		$config = $this->template->pagination_list();
		$config['base_url'] = site_url("analisa?per_page={$this->per_page}&query={$this->query}");
		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->analisa->get_all(null, null, 'num');

		$this->data = array(
			'title' => "Data Analisa", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'analisa' => $this->analisa->get_all($this->per_page, $this->page, 'result'),
			//'detail' => $this->analisa->get_saya('tbl_analisa', array('id_analisa' => $param))
				
		);

		$this->template->view('Kominfo/analisa/data-analisa', $this->data);
	}

	public function nilai($param = 0)
	{

		$this->page_title->push('Penilaian', 'Form Penilaian calon Karyawan');

		 $this->form_validation->set_rules('id_konversi[1]', 'Wawancara', 'trim|required');
		 $this->form_validation->set_rules('id_konversi[2]', 'Tes Tertulis', 'trim|required');
		 $this->form_validation->set_rules('id_konversi[3]', 'Tes Microsoft Word', 'trim|required');
		 $this->form_validation->set_rules('id_konversi[4]', 'Tes Microsoft Excel','trim|required');
		 $this->form_validation->set_rules('id_konversi[5]', 'Tes Keahilan', 'trim|required');
		

		if ($this->form_validation->run() == TRUE)
		{
			$this->analisa->create();
			//$this->test();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Form Penilaian", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'data' => $this->analisa->nilai($param),
			'create_nilai1' => $this->analisa->get_create(1),
			'create_nilai2' => $this->analisa->get_create(2),
			'create_nilai3' => $this->analisa->get_create(3),
			'create_nilai4' => $this->analisa->get_create(4),
			'create_nilai5' => $this->analisa->get_create(5),
			'get' => $this->db->get_where('tbl_pelamar', array('kd_pelamar'=> $param))->row()
		);

		$this->template->view('Kominfo/analisa/nilai-analisa', $this->data);
	}

	public function test()
	{
		echo "<pre>";
		print_r ($this->input->post('id_konversi'));
		echo "</pre>";
	}


	public function detail_analisa($param = 0)
	{
		$this->page_title->push('Detail Penilaian', 'Detail Penilaian Karyawan');

		$this->data = array(
			'title' => "Detail Penilaian", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			//'get' => $this->db->get_where('tbl_pelamar', array('kd_pelamar'=> $param))->row(),
			'analisa' => $this->analisa->get_analisa($param),
			'konversi' => $this->konversi->gett_all($this->per_page, $this->page,'result'),
			'sub_kriteria' => $this->sub_kriteria->get_all($this->per_page, $this->page,'result'),
			// 'sub' => $this->sub_kriteria->get_kre($param),
		);


		$this->template->view('Kominfo/analisa/detail-analisa', $this->data);
	}
	
	public function delete($param = 0)
	{
		$this->analisa->delete($param);

		redirect('analisa');
	}
}

/* End of file Analisa.php */
/* Location: ./application/controllers/Analisa.php */