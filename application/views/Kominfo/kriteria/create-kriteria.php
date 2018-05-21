<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-10 col-md-offset-1 col-xs-12">
		<div class="box box-primary">
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(current_url(), array('class' => 'form-horizontal'));
// echo form_hidden('user_id', $user->id );
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
			
				<div class="form-group">
                    <label for="nomor" class="control-label col-md-3 col-xs-12">Nama Kriteria : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                    	<input type="text"  class="form-control" autofocus name="nama_kriteria" value="<?php echo set_value('nama_kriteria'); ?>" placeholder="Nama Kriteria">
                    	<p class="help-block"><?php echo form_error('nama_kriteria', '<small class="text-danger">', '</small>'); ?></p>         
                    </div>
                </div>
                <div class="form-group">
                   <label for="deskripsi" class="control-label col-md-3 col-xs-12">Jenis Kriteria : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                    	<input type="text"  class="form-control" autofocus name="jenis_kriteria" value="<?php echo set_value('jenis_kriteria'); ?>" placeholder="Jenis Kriteria">
                    	<p class="help-block"><?php echo form_error('jenis_kriteria', '<small class="text-danger">', '</small>'); ?></p>         
                    </div>              
                </div>
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('kriteria') ?>" class="btn btn-app pull-right">
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