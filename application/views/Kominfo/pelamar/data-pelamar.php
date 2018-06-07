<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<div class="row">
<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Pelamar</h3>
				</div>
			</div>
			<!-- <pre>
				<?php  //print_r($pelamar) ?>
			</pre> -->
			<?php echo form_open(current_url(), array('method' => 'GET')); ?>
			<div class="box-header">
				<div class="col-md-12">
					<div class="col-md-4">
						<input type="text" class="form-control" name="query" placeholder="Pencarian...." value="<?php echo $this->input->get('query') ?>">
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-warning hvr-shadow btn-flat btn-sm" id="search"><i class="fa fa-search"></i> Cari Data</button>
						<a href="<?php echo base_url('pelamar') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm" id="reset-form"><i class="fa fa-times"></i> Reset</a>
					</div>
					<div class="col-md-3 pull-right">
						<a href="<?php echo base_url('pelamar/create') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm" id="reset-form"><i class="fa fa-plus"></i> Tambahkan</a>
						<a href="" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print" id="reset-form"><i class="fa fa-print"></i> Cetak</a>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
			<div class="box-body no-padding">
				<table class="table table-bordered table-stripped mini-font" >
					<thead class="bg-silver">
						<tr >
							<th rowspan="2" style="vertical-align: middle;">No.</th>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">Kode Pelamar</th>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">Nama Lengkap</th>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">Nomor KTP</th>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">Tempat, Tanggal Lahir</th>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">Jenis Kelamin</th>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">Alamat</th>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">Agama</th>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">Desa</th>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">Kecamatan</th>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">Kabupaten</th>
							<th rowspan="2" class="text-center" style="vertical-align: middle;">Provinsi</th>
							<th style="vertical-align: middle;">Pdk. Terakhir</th>
							<th>Berkas Lamaran</th>
							<th></th>
						</tr>

					</thead>
					<tbody class="hoverTable">

						<?php foreach ($pelamar as $row) : ?>
						<tr style="vertical-align: top">
							<td><?php echo ++$this->page ?>.</td>
							<td><?php echo $row->kd_pelamar ?></td>
							<td><?php echo $row->nama_lengkap ?></td>
							<td><?php echo $row->no_ktp ?></td>
							<td><?php echo ucwords($row->tmp_lahir).', '.date_id($row->tgl_lahir) ?></td>
							<td><?php echo ucwords($row->jenis_kelamin )?></td>
							<td><?php echo ucwords($row->alamat) ?></td>
							<td><?php echo $row->agama ?></td>
							<td><?php echo $this->pelamar->desa($row->desa)->name;  ?></td>
							<td><?php echo $this->pelamar->kecamatan($row->kecamatan)->name;  ?></td>
							<td><?php echo $this->pelamar->kabupaten($row->kabupaten)->name;  ?></td>
							<td><?php echo $this->pelamar->provinsi($row->provinsi)->name; ?></td>
							<td><?php echo $row->pend_terakhir ?></td>

							<td>
								<a class="btn btn-xs btn-danger" href="<?php echo base_url('assets/images/documen/'.$row->file) ?>" ><i class="fa fa-download"></i> <span>Download</span></a>
							</td>							
							
							<td>
								<a href="<?php echo site_url("pelamar/update/{$row->kd_pelamar}") ?>" class="btn btn-xs btn-primary" style="margin-right: 10px" data-toggle="tooltip" data-placement="top" title="Sunting">

									<i class="fa fa-pencil"></i>
								</a>
								<a href="javascript:void(0)" id="delete-pelamar" data-id="<?php echo $row->kd_pelamar ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
				                  <i class="fa fa-trash-o"></i>
				                </a>
							</td>
						</tr>
					<?php endforeach; ?>

					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-12 text-center">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>


<?php if ($this->muniversal->get_account_by_login($this->session->userdata('ID'))->level == 'Admin') : ?> 
<div class="modal fade in modal-danger" id="modal-delete" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-warning"></i> Perhatian!</h4>
                <span>Hapus data ini dari sistem?</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a id="delete-yes" class="btn btn-outline"> Ya </a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php 