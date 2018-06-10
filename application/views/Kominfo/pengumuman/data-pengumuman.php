<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<div class="row">
<!-- 	 <pre>
		<?php print_r($tampil) ?>
	</pre>  -->
<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open(current_url(), array('method' => 'GET')); ?>
			<div class="box-header">
				<div class="col-md-12">
					<div class="col-md-4">
						<input type="text" class="form-control" name="query" placeholder="Pencarian...." value="<?php echo $this->input->get('query') ?>">
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-warning hvr-shadow btn-flat btn-sm" id="search"><i class="fa fa-search"></i> Cari Data</button>
						<a href="" class="btn btn-warning hvr-shadow btn-flat btn-sm" id="reset-form"><i class="fa fa-times"></i> Reset</a>
					</div>
					<div class="col-md-3 pull-right">
						<a href="#" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print" id="reset-form"><i class="fa fa-print"></i> Cetak</a>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
			<div class="box-body no-padding">
				<table class="table table-bordered table-stripped mini-font">
					<thead >
						<tr>
							<th>No</th>
							<th>Kode Pelamar</th>
							<th>No KTP</th>
							<th>Nama</th>
							<th>Tempat dan Tanggal Lahiir</th>
							<th>Jenis Kelamin</th>
							<th>Alamat</th>
							<th>Agama</th>
							<th>Pendidikan </th>
							<th>Pengalaman Kerja</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>

					
					</tbody>
			
				</table>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>
<?php
/* End of file main-anggota.php */
/* Location: ./application/views/pages/anggota/main-anggota.php */