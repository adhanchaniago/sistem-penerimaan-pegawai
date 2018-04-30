<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
  <div class="col-md-12">
  
  <div class="box box-primary">
  <div class="box-header">
      <h3 class="box-title">Data Bobot Nilai GAP</h3>
  </div>

  <!-- HAK AKSES -->  
    <div class="box-body">
        <div class="pull-right">
          <a href="<?php echo site_url('bobot/create') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
        </div>
    </div>

  <div class="box-body">
      <table id="tabel1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Selisih</th>
              <th>Bobot Nilai</th>
              <th>Keterangan</th>
            </tr>
          </thead>

          <tbody>
            <?php foreach ($bobot as $row) : ?>
            <tr>
              <td><?php echo ++$this->page ?>.</td>
              <td><?php echo $row->selisih ?></td>
              <td><?php echo $row->bobot_nilai ?></td>
              <td><?php echo $row->ket ?></td>
              <td>
                <a href="<?php echo site_url("") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
                <a href="javascript:void(0)" id="delete-panduan" data-id="" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus">
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
