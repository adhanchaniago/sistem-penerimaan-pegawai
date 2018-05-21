<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
  <div class="col-md-12">
  
  <div class="box box-primary">
  <div class="box-header">
      <h3 class="box-title">Panduan Aplikasi</h3>
  </div>

  <!-- HAK AKSES -->
  <?php if ($this->muniversal->get_account_by_login($this->session->userdata('ID'))->level == 'Admin') : ?>      
    <div class="box-body">
        <div class="pull-right">
          <a href="<?php echo site_url('panduan/create') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
        </div>
    </div>
  <?php endif; ?>
  <!-- TUTUP HAK AKSES -->

  <div class="box-body">
      <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Panduan</th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($data as $row) : ?>
            <tr>
              <td><?php echo $row->nomor ?></td>
              <td><?php echo ucwords($row->nama_panduan) ?></td>
            
              <td>
               <!-- HAK AKSES -->
            <?php if ($this->muniversal->get_account_by_login($this->session->userdata('ID'))->level == 'Admin') : ?>
                <a href="<?php echo site_url("panduan/update/{$row->id}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
                <a href="javascript:void(0)" id="delete-panduan" data-id="<?php echo $row->id ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
                  <i class="fa fa-trash-o"></i>
                </a>
            <?php endif; ?>
              </td>
            
            <!-- TUTUP HAK AKSES -->
            </tr>

            <?php   endforeach; ?>

          </tbody>
      </table>
  </div>
      
      
</div>
</div>
  
</div>

<!-- HAK AKSES -->
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
<!-- TUTUP HAK AKSES --> 