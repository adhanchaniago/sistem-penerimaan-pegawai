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
                    <label for="nomor" class="control-label col-md-3 col-xs-12">Nama Kriteria : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                    	<select name="nama_kriteria" class="form-control select2">
							<option value="">-- Pilih Nama Kriteria --</option>
							<?php foreach($this->kriteria->get_all() as $kre => $get) :?>
								<option value="<?php echo $get->id_kriteria ?>"<?php if($get->nama_kriteria) echo 'selected'; ?>>
									<?php echo $get->nama_kriteria ?></option> 
							<?php endforeach; ?>
			
						</select>
						<p class="help-block"><?php echo form_error('nama_kriteria', '<small class="text-red">', '</small>'); ?></p>     
                    </div>
                </div>
                <div class="form-group">
                   <label for="deskripsi" class="control-label col-md-3 col-xs-12">Nama Sub Kriteria : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                    	<input type="text"  class="form-control" name="nama_subkriteria" value="<?php echo $sub->nama_subkriteria ?>" placeholder="Nama Sub Kriteria">
                    	<p class="help-block"><?php echo form_error('nama_subkriteria', '<small class="text-danger">', '</small>'); ?></p>         
                    </div>              
                </div>
                <div class="form-group">
                   <label for="deskripsi" class="control-label col-md-3 col-xs-12">Jenis Kriteria : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                    	<select name="jenis_kriteria" class="form-control select2">
                           <option value="">-- Pilih Nama Kriteria --</option>
							<?php foreach($this->kriteria->get_all() as $kre => $get) :?>
								<option value="<?php echo $get->jenis_kriteria ?>"<?php if($get->jenis_kriteria) echo 'selected'; ?>>
									<?php echo $get->jenis_kriteria ?></option> 
							<?php endforeach; ?>

						</select>
						<p class="help-block"><?php echo form_error('jenis_kriteria', '<small class="text-red">', '</small>'); ?></p>             
                    </div>              
                </div>
                <div class="form-group">
                   <label for="deskripsi" class="control-label col-md-3 col-xs-12">Nilai Ideal : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                    	<input type="text"  class="form-control"  name="nilai" value="<?php echo $sub->nilai ?>" placeholder="Nilai">
                    	<p class="help-block"><?php echo form_error('nilai', '<small class="text-danger">', '</small>'); ?></p>         
                    </div>              
                </div>
			</div>
			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('sub_kriteria') ?>" class="btn btn-app pull-right">
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