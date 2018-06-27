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
echo form_open_multipart(current_url(), array('class' => 'form-horizontal'));
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
					<label for="no_invoice" class="control-label col-md-3 col-xs-12">Kode Pelamar : <strong class="text-red">*</strong></label>
					<div class="col-md-4">
						<input type="text" name="no_invoice" class="form-control" value="<?php echo $get->kd_pelamar; ?>" readonly="readonly">
						<p class="help-block"><?php echo form_error('kd_pelamar', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">Nama Lengkap : <strong class="text-red">*</strong></label>
					<div class="col-md-4">
						<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $get->nama_lengkap ?>">
						<p class="help-block"><?php echo form_error('nama_lengkap', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-3 col-xs-12">Nomor KTP : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="no_ktp" class="form-control" value="<?php echo $get->no_ktp ?>">
						<p class="help-block"><?php echo form_error('no_ktp', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="tmp_lahir" class="control-label col-md-3 col-xs-12">Tempat, Tanggal Lahir : <strong class="text-red">*</strong></label>
					<div class="col-md-4">
						<input type="text" name="tmp_lahir" class="form-control" value="<?php echo $get->tmp_lahir ?>">
						<p class="help-block"><?php echo form_error('tmp_lahir', '<small class="text-red">', '</small>'); ?></p>
					</div>

					<div class="col-md-4">
					  	<div class="input-group">
					    	<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					    	<input type="text" class="form-control" name="tgl_lahir" id="datepicker" value="<?php echo $get->tgl_lahir ?>" placeholder="Ex : 1980-12-31">
					  	</div>
						<p class="help-block"><?php echo form_error('tgl_lahir', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="gender" class="control-label col-md-3">Jenis Kelamin : <strong class="text-red">*</strong></label>
					<div class="col-md-6">
				       	<div class="radio radio-inline radio-primary">
				           <input name="jenis_kelamin" type="radio" value="Laki-Laki" <?php if($get->jenis_kelamin =='Laki-Laki') echo "checked"; ?>> <label for="gender"> Laki-Laki</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="jenis_kelamin" type="radio" value="Perempuan" <?php if($get->jenis_kelamin =='Perempuan') echo "checked"; ?>> <label for="gender"> Perempuan</label>
				       	</div>
				       	<p class="help-block"><?php echo form_error('gender', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="agama" class="control-label col-md-3 col-xs-12">Alamat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<textarea name="alamat" rows="3" class="form-control"><?php echo $get->alamat ?></textarea>
						<p class="help-block"><?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="agama" class="control-label col-md-3 col-xs-12">Agama : <strong class="text-red">*</strong></label>
					<div class="col-md-4">
						<select name="agama" class="form-control select2">
							<option value="">-- PILIH --</option>
							<option value="islam" <?php if($get->agama =='islam') echo "selected"; ?>>Islam</option>
							<option value="kristen" <?php if($get->agama =='kristen') echo "selected"; ?>>Kristen</option>
							<option value="katholik" <?php if($get->agama =='katholik') echo "selected"; ?>>Katholik</option>
							<option value="hindu" <?php if($get->agama =='hindu') echo "selected"; ?>>Hindu</option>
							<option value="buddha" <?php if($get->agama =='buddha') echo "selected"; ?>>Buddha</option>
							<option value="khonghucu" <?php if($get->agama =='khonghucu') echo "selected"; ?>>Khonghucu</option>
							<option value="aliran kepercayaan" <?php if($get->agama =='aliran kepercayaan') echo "selected"; ?>>Lainnya</option>
						</select>
						<p class="help-block"><?php echo form_error('agama', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="rt" class="control-label col-md-3 col-xs-12">RT :<strong class="text-blue">*</strong></label>
					<div class="col-md-6">
						<input type="text" name="rt" class="form-control" value="<?php echo $get->rt ?>">
						<p class="help-block"><?php echo form_error('rt', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="text" class="control-label col-md-3 col-xs-12">RW : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
						<input type="text" name="rw" class="form-control" value="<?php echo $get->rw ?>">
						<p class="help-block"><?php echo form_error('rw', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="alamat" class="control-label col-md-3">Provinsi : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="provinsi" class="form-control select2" id="provinsi">
                           <option>-- PILIH Provinsi --</option>
                           <?php foreach($provinsi as $prov){ ?>
							<option value="<?php echo $prov->id ?>" <?php if($get->provinsi== $prov->id) echo "selected"; ?>><?php echo $prov->name ?></option>
							<?php  } ?>
                        </select>
						<p class="help-block"><?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="kabupaten" class="control-label col-md-3 col-xs-12">Kabupaten/kota : <strong class="text-red">*</strong></label>
                    <div class="col-md-6">
                        <select name="kabupaten" id="kabupaten" class="form-control select2">
                            <option value="<?php echo $get->kabupaten ?>">-- PILIH Kabupaten/Kota --</option>
                            
                        </select>
                        <p class="help-block"><?php echo form_error('kabupaten', '<small class="text-red">', '</small>'); ?></p>
                    </div>
				</div>
				<div class="form-group">
					<label for="kecamatan" class="control-label col-md-3 col-xs-12">Kecamatan : <strong class="text-red">*</strong></label>
					<div class="col-md-6">
	                    <select name="kecamatan" id="kecamatan" class="form-control select2">
	                        <option value="<?php echo $get->kecamatan ?>">-- PILIH Kecamatan --</option>
	                    </select>
	                    <p class="help-block"><?php echo form_error('kecamatan', '<small class="text-red">', '</small>'); ?></p>
                    </div>
				</div>
				<div class="form-group">
					<label for="kelurahan" class="control-label col-md-3 col-xs-12">Kelurahan/Desa : <strong class="text-red">*</strong></label>
                    <div class="col-md-6">
                        <select name="desa" id="desa" class="form-control select2">
                            <option value="<?php echo $get->desa ?>">-- PILIH Kelurahan/Desa --</option>
                        </select>
                        <p class="help-block"><?php echo form_error('desa', '<small class="text-red">', '</small>'); ?></p>
                    </div>
				</div>

				<div class="form-group">
					<label for="Bidang" class="control-label col-md-3 col-xs-12">Pendidikan Terakhir : <strong class="text-red">*</strong></label>
					<div class="col-md-4">
						<input type="text" name="pend_terakhir" class="form-control" value="<?php echo $get->pend_terakhir ?>">
						<p class="help-block"><?php echo form_error('pend_terakhir', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
                    <label for="deskripsi" class="control-label col-md-3 col-xs-12">Pengalaman Kerja : <strong class="text-red">*</strong></label>
                   	<div class="col-md-8">
                   		<textarea name="pengalaman" rows="3" class="form-control"  placeholder="Pengalaman Pekerjaan"><?php echo $get->pengalaman ?></textarea>
                   		<p class="help-block"><?php echo form_error('pengalaman', '<small class="text-red">', '</small>'); ?></p>      
                    </div>
                </div>
				<div class="form-group">
					<label for="telepon" class="control-label col-md-3 col-xs-12">Foto : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
						<input type="file" name="foto" class="form-control" value="<?php echo $get->foto ?>">
					</div>
				</div>
				<div class="form-group">
					<label for="telepon" class="control-label col-md-3 col-xs-12">Berkas Lamaran : <strong class="text-blue">*</strong></label>
					<div class="col-md-4">
						<input type="file" name="file" class="form-control">
						<small style="font-weight:bold ;"><I><strong class="text-red">*) </strong>File Berkas Lamaran Di jadikan Satu dalam Format PDF</I></small>
					</div>
				</div>
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('pelamar') ?>" class="btn btn-app pull-right">
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

<script>
	$(document).ready(function(){
            $("#provinsi").change(function (){
                var url = "<?php echo site_url('pelamar/add_ajax_kab');?>/"+$(this).val();
                $('#kabupaten').load(url);
                return false;
            })
   
   $("#kabupaten").change(function (){
                var url = "<?php echo site_url('pelamar/add_ajax_kec');?>/"+$(this).val();
                $('#kecamatan').load(url);
                return false;
            })
   
   $("#kecamatan").change(function (){
                var url = "<?php echo site_url('pelamar/add_ajax_des');?>/"+$(this).val();
                $('#desa').load(url);
                return false;
            })
        });

    $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
</script>