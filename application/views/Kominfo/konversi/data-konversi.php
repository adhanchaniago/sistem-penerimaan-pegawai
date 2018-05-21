<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
  <div class="col-md-12">
  
  <div class="box">
 <!-- <pre>
  <?php //print_r($konversi) ?>
</pre> -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Bordered Table</h3>
          <div class="pull-right">
            <a href="<?php echo site_url('konversi/create') ?>"  class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="input-group input-group-sm pull-right" style="width: 150px; margin-bottom: 20px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>

          <table class="table table-bordered">
            <thead class="text-center bg-silver" style="font-weight: bold;">
                <tr>
                  <th>No</th>
                  <th>Nama Variabel</th>
                  <th>Nilai Konversi</th>
                  <th>Range Konversi</th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
             <?php 
              $no = 1;
              foreach ($konversi as $row): ?>
              <tr class="text-center">
                <td><?php echo $no++ ?>.</td>
                <td><?php echo $row->nama ?></td>
                <td ><?php echo $row->nilai ?></td>
                <td ><?php echo $row->range ?></td>
                <td>
                  <a href="<?php echo site_url("konversi/update/{$row->id_konversi}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
                  <a href="javascript:void(0)" id="delete-konversi" data-id="<?php echo $row->id_konversi ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                  <i class="fa fa-trash-o"></i>
                  </a>
                </td>
              </tr>
              <?php endforeach; ?> 
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
  
</div>

<!-- HAK AKSES -->
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
