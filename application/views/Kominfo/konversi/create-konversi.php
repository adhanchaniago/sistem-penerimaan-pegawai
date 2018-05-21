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

<!-- <pre>
  <?php //print_r($nama) ?>
</pre> -->
      <div class="box-body" style="margin-top: 10px;">
   <!--      <div class="form-group">
            <label for="nomor" class="control-label col-md-3 col-xs-12">Nama variabel : <strong class="text-red">*</strong></label>
            <div class="col-md-8">
              <input type="text"  class="form-control" autofocus name="nama_konversi" value="<?php echo set_value('nama_konversi'); ?>" placeholder="Nama variabel">
              <p class="help-block"><?php echo form_error('nama_konversi', '<small class="text-danger">', '</small>'); ?></p>         
            </div>
        </div> -->

        <div class="form-group">
          <label for="nomor" class="control-label col-md-3 col-xs-12">Nama variabel : <strong class="text-red">*</strong></label>
            <div class="col-md-8">
              <select name="id_nama" class="form-control select2" multiple="multiple" data-placeholder="Pilih Nama Variabel" style="width: 100%;">
               <option value="<?php echo set_value('nama'); ?>"></option>
                <?php foreach($nama as $key => $get) :?>
                  <option value="<?php echo $get->id_nama ?>"><?php echo $get->nama ?></option> 
                <?php endforeach; ?>
                
              </select>
              <p class="help-block"><?php echo form_error('id_nama', '<small class="text-danger">', '</small>'); ?></p>
              <!-- <input id="input" value="Hello world!" /> -->
          </div>
        </div>


        <div class="form-group">
            <label for="nomor" class="control-label col-md-3 col-xs-12">Nilai Konversi : <strong class="text-red">*</strong></label>
            <div class="col-md-8">
              <input type="text"  class="form-control" autofocus name="nilai" value="<?php echo set_value('nilai'); ?>" placeholder="Nilai Konversi">
              <p class="help-block"><?php echo form_error('nilai', '<small class="text-danger">', '</small>'); ?></p>         
            </div>
        </div>

        <div class="form-group">
            <label for="nomor" class="control-label col-md-3 col-xs-12">Range Nilai : <strong class="text-red">*</strong></label>
            <div class="col-md-8">
              <input type="text"  class="form-control" autofocus name="range" value="<?php echo set_value('range'); ?>" placeholder="Range Nilai">
              <p class="help-block"><?php echo form_error('range', '<small class="text-danger">', '</small>'); ?></p>         
            </div>
        </div>

      <div class="box-footer with-border">
        <div class="col-md-4 col-xs-5">
          <a href="<?php echo site_url('konversi') ?>" class="btn btn-app pull-right">
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
          <small><strong class="text-red">*</strong>  Field wajib diisi!</small> <br>
          <small><strong class="text-blue">*</strong> Field Optional</small>
      </div>
<?php  
// End Form
echo form_close();
?>
    </div>
  </div>
</div>
<script type="text/javascript">
var input = document.getElementById('input');
input.focus();
input.select();
</script>