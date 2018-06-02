<pre>
  <?php print_r($get) ?>
</pre>
<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
  <div class="col-md-12">
  
  <div class="box">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Hasil Tes</h3>
          <div class="pull-right">
            <a href=""  class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="glyphicon glyphicon-print"></i> CETAK</a>
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
                  <th>Nama Lengkap</th>
                  <th>Wawancara</th>
                  <th>Tes Tertulis</th>
                  <th>Tes Microsoft Word</th>
                  <th>Tes Microsoft Excel</th>
                  <th>Tes Keahlian</th>
                  <th></th>
                </tr>
            </thead>
            <tbody>

              <td></td>
          
                <?php foreach ($this->hasil->ngambil() as $row) : ?>
                 <td><?php echo $row->nama_lengkap; ?></td>
                 <?php foreach ($this->hasil->ngambil()) : ?>
                  <td><?php echo $this->hasil->ngambil($id_kriteria)->range; ?></td>
                 <?php endforeach; ?>
              <?php endforeach; ?>

         
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
  
</div>
