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
							<?php foreach($kriteria as $kre){
                            echo '<option value="'.$kre->id_kriteria.'">'.$kre->nama_kriteria.'</option>';
                           } ?>
							
						</select>
						<p class="help-block"><?php echo form_error('nama_kriteria', '<small class="text-red">', '</small>'); ?></p>     
                    </div>
                </div>
                <div class="form-group">
                   <label for="deskripsi" class="control-label col-md-3 col-xs-12">Nama Sub Kriteria : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                    	<input type="text"  class="form-control" name="nama_subkriteria" value="<?php echo set_value('nama_subkriteria'); ?>" placeholder="Nama Sub Kriteria">
                    	<p class="help-block"><?php echo form_error('nama_subkriteria', '<small class="text-danger">', '</small>'); ?></p>         
                    </div>              
                </div>
                <div class="form-group">
                   <label for="deskripsi" class="control-label col-md-3 col-xs-12">Jenis Kriteria : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                    	<select name="jenis_kriteria" class="form-control select2">
							<option value="">-- Pilih Jenis Kriteria --</option>
							<?php foreach($get_core as $kre){
                            echo '<option value="'.$kre->jenis_kriteria.'">'.$kre->jenis_kriteria.'</option>';
                           } ?>	
						</select>
						<p class="help-block"><?php echo form_error('jenis_kriteria', '<small class="text-red">', '</small>'); ?></p>             
                    </div>              
                </div>
                <div class="form-group">
                   <label for="deskripsi" class="control-label col-md-3 col-xs-12">Nilai Ideal : <strong class="text-red">*</strong></label>
                    <div class="col-md-8">
                    	<!-- <input type="text"  class="form-control" name="nilai_ideal" value="<?php echo set_value('nilai'); ?>" placeholder="Nilai"> -->
                    	<select name="nilai_ideal" class="form-control select2">
							<option value="">-- PILIH --</option>
							<option value="1" <?php if(set_value('nilai_ideal')=='10-20') echo "selected"; ?>>10-20</option>
							<option value="2" <?php if(set_value('nilai_ideal')=='30-40') echo "selected"; ?>>30-40</option>
							<option value="3" <?php if(set_value('nilai_ideal')=='50-60') echo "selected"; ?>>50-60</option>
							<option value="4" <?php if(set_value('nilai_ideal')=='70-80') echo "selected"; ?>>70-80</option>
							<option value="5" <?php if(set_value('nilai_ideal')=='90-100') echo "selected"; ?>>90-100</option>
						</select>
                    	<p class="help-block"><?php echo form_error('nilai_ideal', '<small class="text-danger">', '</small>'); ?></p>         
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