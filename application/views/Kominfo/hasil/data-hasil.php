
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
                  <th class="text-center">No</th>
                  <th class="text-center">Nama Lengkap</th>
                  <th class="text-center">Wawancara</th>
                  <th class="text-center">Tes Tertulis</th>
                  <th class="text-center">Tes Microsoft Word</th>
                  <th class="text-center">Tes Microsoft Excel</th>
                  <th class="text-center">Tes Keahlian</th>
                </tr>
            </thead>
            <tbody>
             <!--  Nilai Asli Calon Karyawan -->
              <?php 
              foreach ($this->hasil->get_pelamar() as $key => $value): ?>
                   <tr>
                     <td class="text-center"> <?php echo ++$key ?></td>
                     <td class="text-center"><?php echo $value->nama_lengkap ?></td>
                      <?php foreach ($this->hasil->ngambil($value->kd_pelamar) as $key => $value): ?>
                      <td class="text-center"><?php echo $value->range ?></td>
                      <?php endforeach ?>  
                   </tr>
                <?php endforeach ?>  
            </tbody>
          </table>
          <br>
          <br>
          <table class="table table-bordered">
            <thead class="text-center bg-silver" style="font-weight: bold;">
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama Lengkap</th>
                  <th class="text-center">Wawancara</th>
                  <th class="text-center">Tes Tertulis</th>
                  <th class="text-center">Tes Microsoft Word</th>
                  <th class="text-center">Tes Microsoft Excel</th>
                  <th class="text-center">Tes Keahlian</th>
                </tr>
            </thead>
            <tbody>
             <!--  Nilai Setelah Dikonversikan -->
              <?php 
              foreach ($this->hasil->get_pelamar() as $key => $value): ?>
                   <tr>
                     <td class="text-center"> <?php echo ++$key ?></td>
                     <td class="text-center"><?php echo $value->nama_lengkap ?></td>
                      <?php foreach ($this->hasil->ngambil($value->kd_pelamar) as $key => $value): ?>
                      <td class="text-center"><?php echo $value->nilai ?></td>
                      <?php endforeach ?>
                   </tr>
                <?php endforeach ?>
            </tbody>
            <!-- Nilai Profile Ideal Prusahaan -->
            <th class="color text-center"></th>
            <th class="color text-center">Nilai Profile</th>
              <?php foreach ($this->hasil->ngambil($value->kd_pelamar) as $value) : ?>
                <td class="color text-center"><?php echo $value->nilai_ideal ?></td>
                <?php endforeach; ?>

            <tbody>
             <!--  Nilai Setelah Dikonversikan -->
              <?php 
              foreach ($this->hasil->get_pelamar() as $key => $value): ?>
                   <tr>
                     <td class="text-center"> <?php echo ++$key ?></td>
                     <td class="text-center"><?php echo $value->nama_lengkap ?></td>
                      <?php foreach ($this->hasil->ngambil($value->kd_pelamar) as $key => $value): ?>
                      <td class="text-center"><?php echo $value->nilai - $value->nilai_ideal ?></td>
                      <?php endforeach ?>
                   </tr>
                <?php endforeach ?>
            </tbody>
          </table>
          <br><br>

          <table class="table table-bordered">
            <thead class="text-center bg-silver" style="font-weight: bold;">
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama Lengkap</th>
                  <th class="text-center">Wawancara</th>
                  <th class="text-center">Tes Tertulis</th>
                  <th class="text-center">Tes Microsoft Word</th>
                  <th class="text-center">Tes Microsoft Excel</th>
                  <th class="text-center">Tes Keahlian</th>
                </tr>
            </thead>
            <tbody>
            
              <?php 
              foreach ($this->hasil->get_pelamar() as $key => $value): ?>
                   <tr>
                     <td class="text-center"> <?php echo ++$key ?></td>
                     <td class="text-center"><?php echo $value->nama_lengkap ?></td>
                      <?php foreach ($this->hasil->ngambil($value->kd_pelamar) as $key => $value): ?>
                      <td class="text-center"><?php echo pembobotan($value->nilai - $value->nilai_ideal) ?></td>
                      <?php endforeach ?>  
                   </tr>
                <?php endforeach ?>  
            </tbody>
          </table>
<!-- Data Core Faktor -->
          <br>
          <br>
          <table class="table table-bordered">
            <thead class="text-center bg-silver" style="font-weight: bold;">
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama Lengkap</th>
                  <th class="text-center">Wawancara</th>
                  <th class="text-center">Tes Tertulis</th>
                  <th class="text-center">Tes Keahlian</th>
                  <th class="text-center">Nilai Core Factor</th>
                  <th class="text-center">Nilai Core Factor dibagi 3</th>
                  <th class="text-center">Total Nilai Core Factor</th>
                </tr>
            </thead>
                <?php 
                foreach ($this->hasil->get_pelamar() as $key => $value): ?>
                   <tr>
                     <td class="text-center"> <?php echo ++$key ?></td>
                     <td class="text-center"><?php echo $value->nama_lengkap ?></td>

                      <?php 
                      $total1 = 0;
                      $bagi1 = 3;
                      $kali1 = 0.6;
                      $corefactor = array();
                      foreach ($this->hasil->ngambil($value->kd_pelamar) as $key => $value):
                      if ($key <= 1 or  $key == 4 )  {
                          $total1 += pembobotan($value->nilai - $value->nilai_ideal);
                          $corefactor[] = pembobotan($value->nilai - $value->nilai_ideal);
                          $pembagian1 = $total1 / $bagi1;
                          $hasil1 = $pembagian1 * $kali1;
                        } 
                      ?>
                      <?php endforeach ?>
                    
                        <td class=" text-center"><?php echo $corefactor[0] ?></td>
                        <td class=" text-center"><?php echo $corefactor[1] ?></td>
                        <td class=" text-center"><?php echo $corefactor[2] ?></td>
                        <td class="text-center"><?php echo $total1; ?></td>
                        <td class="text-center"><?php echo $pembagian1 ?></td> 
                        <td class="text-center"><?php echo $hasil1; ?></td>           
                   </tr>
                <?php endforeach ?>  

          </table>

<!-- Data Secondery Factor -->
          <br>
          <br>
          <table class="table table-bordered">
            <thead class="text-center bg-silver" style="font-weight: bold;">
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Nama Lengkap</th>
                  <th class="text-center">Tes Microsoft Word</th>
                  <th class="text-center">Tes Microsoft Excel</th>
                  <th class="text-center">Total Nilai Secondery</th>
                  <th class="text-center">Nilai Secondery dibagi 2</th>
                  <th class="text-center">Total Nilai Secondery Factor</th>
                </tr>
            </thead>
                <?php 
                foreach ($this->hasil->get_pelamar() as $key => $value): ?>
                   <tr>
                     <td class="text-center"> <?php echo ++$key ?></td>
                     <td class="text-center"><?php echo $value->nama_lengkap ?></td>

                      <?php 
                       $total = 0;
                       $bagi = 2;
                       $kali = 0.4;
                       $dataSecondery = array();
                      foreach ($this->hasil->ngambil($value->kd_pelamar) as $key => $value):
                      if ($key >= 2 && $key < 4)  {
                          $total += pembobotan($value->nilai - $value->nilai_ideal);
                          $dataSecondery[] = pembobotan($value->nilai - $value->nilai_ideal);
                          $pembagian = $total / $bagi;
                          $hasil = $pembagian * $kali;
                        } 
                      ?>
                      <?php endforeach ?>
                    
                        <td class=" text-center"><?php echo $dataSecondery[0] ?></td>
                        <td class=" text-center"><?php echo $dataSecondery[1] ?></td>
                        <td class="text-center"><?php echo $total; ?></td>
                        <td class="text-center"><?php echo $pembagian ?></td>
                        <td class="text-center"><?php echo $hasil ?></td>  
                   </tr>
                <?php endforeach ?>  

          </table>
        </div>
      </div>
    </div>
</div>
  
</div>
