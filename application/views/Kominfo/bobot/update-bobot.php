<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-10 col-md-offset-1 col-xs-12">
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
                    <label for="nomor" class="control-label col-md-3 col-xs-12">Selisi : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                    	<input type="text"  class="form-control" autofocus name="selisih" value="<?php echo $get->selisih ?>" placeholder="Selisih">
                    	<p class="help-block"><?php echo form_error('selisih', '<small class="text-danger">', '</small>'); ?></p>         
                    </div>
                    
                </div>
                <div class="form-group">
                   <label for="deskripsi" class="control-label col-md-3 col-xs-12">Bobot Nilai : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                    	<input type="text"  class="form-control" autofocus name="bobot_nilai" value="<?php echo $get->bobot_nilai ?>" placeholder="Bobot Nilai">
                    	<p class="help-block"><?php echo form_error('bobot_nilai', '<small class="text-danger">', '</small>'); ?></p>         
                    </div>              
                </div>
                <div class="form-group">
                    <label for="deskripsi" class="control-label col-md-3 col-xs-12">Keterangan : <strong class="text-red">*</strong></label>
                   	<div class="col-md-8">
                   		<textarea name="ket" rows="6" class="form-control" placeholder="Keterangan"><?php echo $get->ket ?></textarea>
                   		<p class="help-block"><?php echo form_error('ket', '<small class="text-danger">', '</small>'); ?></p>      
                    </div>
                </div>
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('bobot') ?>" class="btn btn-app pull-right">
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
	</dov>
</div>