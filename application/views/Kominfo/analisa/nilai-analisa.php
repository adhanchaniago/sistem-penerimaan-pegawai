<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="row">
<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
    <div class="col-md-4">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<div class="profile-user-img img-responsive img-circle">
				<?php if ($this->muniversal->get_account_by_login($this->session->userdata('ID'))->photo == NULL ) : ?>
	              <img width="100%" src="<?php echo base_url('assets/public/image/avatar.jpg') ?>" class="img-circle" alt="User Image">
	          	<?php else : ?>
	          	  <img width="100%" src="<?php echo base_url('assets/public/image/'.$this->muniversal->get_account_by_login($this->session->userdata('ID'))->photo) ?>" class="img-circle" alt="User Image">
	          	<?php endif ?>
	        	</div>
        		<br>
				
				<h3 class="profile-username text-center"><?php echo ucwords($get->nama_lengkap) ?></h3>

				<p class="text text-center"></p>

					<table class="table" style="font-family: arial;">
						<tbody>
							<tr>
								<th class="small text-right">No. KTP :</th>
								<td class="small"><?php echo $get->no_ktp ?></td>
							</tr>
							<tr>
								<th class="small text-right">Tempat, Tanggal Lahir :</th>
								<td class="small"><?php echo ucwords($get->tmp_lahir).', '.date_id($get->tgl_lahir) ?></td>
							</tr>
							<tr>
								<th class="small text-right">Jenis Kelamin :</th>
								<td class="small"><?php echo ucwords($get->jenis_kelamin )?></td>
							</tr>
							<tr>
								<th class="small text-right">Alamat :</th>
								<td class="small"><?php echo ucwords($get->alamat) ?></td>
							</tr>
							<tr>
								<th class="small text-right">Agama :</th>
								<td class="small"><?php echo ucwords($get->agama) ?></td>
							</tr>
							<tr>
								<th class="small text-right">Pendidikan Terakhir :</th>
								<td class="small"><?php echo ucwords($get->pend_terakhir) ?></td>
							</tr>
							<tr>
								<th class="small text-right">Pengalaman Kerja :</th>
								<td class="small">gsdgs</td>
								
							</tr>
						</tbody>
					</table>
			</div>
		</div>

    </div>

    <div class="col-md-8 pull-right">
      <div class="nav-tabs-custom">
        <div class="box box-primary">
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(current_url(), array('class' => 'form-horizontal'));
echo form_hidden('kd_pelamar', $get->kd_pelamar );
?>
			<div class="box-body">
				<div class="form-group">
					<div class="col-md-8">
						<input type="hidden" name="kd_pelamar" class="form-control" value="<?php echo $get->kd_pelamar ?>">
					</div>
				</div>
				
				<p class="text-center" style="font-size: 24px; font-family: arial;">Form Penilaian</p>
				<hr>
				<div class="form-group">
					<label for="no_sk" class="control-label col-md-3 col-xs-12">Wawancara : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="wawancara" class="form-control" value="<?php echo set_value('wawancara'); ?>">
						<p class="help-block"><?php echo form_error('wawancara', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="no_sk" class="control-label col-md-3 col-xs-12">Tes Tertulis : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="tes_tertulis" class="form-control" value="<?php echo set_value('tes_tertulis'); ?>">
						<p class="help-block"><?php echo form_error('tes_tertulis', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="no_sk" class="control-label col-md-3 col-xs-12">Tes Praktek Word : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="tes_praktek1" class="form-control" value="<?php echo set_value('tes_praktek1'); ?>">
						<p class="help-block"><?php echo form_error('tes_praktek1', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="no_sk" class="control-label col-md-3 col-xs-12">Tes Praktek Excel : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="tes_praktek2" class="form-control" value="<?php echo set_value('tes_praktek2'); ?>">
						<p class="help-block"><?php echo form_error('tes_praktek2', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="no_sk" class="control-label col-md-3 col-xs-12">Tes Keahlian : <strong class="text-blue">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="tes_keahlian" class="form-control" value="<?php echo set_value('tes_keahlian'); ?>">
						<p class="help-block"><?php echo form_error('no_sk', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>


			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('analisa') ?>" class="btn btn-app pull-right">
						<i class="ion ion-reply"></i> Kembali
					</a>
				</div>
				<div class="col-md-6 col-xs-6">
					<button type="submit" class="btn btn-app pull-right">
						<i class="fa fa-save"></i> Simpan
					</button>
				</div>
			</div>
			<div class="box-footer with-border">
					<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
					<small><strong class="text-blue">*</strong>	Field Optional</small>
			</div>
<?php  
// End Form
echo form_close();
?>
        </div>
      </div>
    </div>
</div>
<?php
/* End of file main-anggota.php */
/* Location: ./application/views/pages/anggota/main-anggota.php */