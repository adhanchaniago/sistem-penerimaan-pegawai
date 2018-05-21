
  <div class="row">
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Variabel dan Konversi Nilai</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <thead style="font-weight: bold;" >
            <tr class="bg-silver">
              <td>Variabel</td>
              <td>Nilai Konversi</td>
              <td>Range Nilai</td>
              
            </tr>
          </thead>

          <tbody>
            <?php foreach ($konversi as $get) : ?>
              <tr>
            <td><?php echo $get->nama ?></td>
            <td class="text-center"><?php echo $get->nilai ?></td>
            <td class="text-center"><?php echo $get->range ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>


    <div class="col-md-8" style="margin-top: 2px;">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Nilai Tes Calon Karyawan Baru</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
             <thead style="font-weight: bold;" >

              <tr class="bg-silver">
                <td>Calon Karyawan</td>
                <td>Wawancara</td>
                <td>Tes Tertulis</td>
                <td>Tes Microsoft Word</td>
                <td>Tes Microsoft Excel</td>
                <td>Tes Keahlian</td>
                
              </tr>
            </thead>

            <tbody>
            <?php foreach ($analisa as $row) : ?>
              <tr>
              <th> <?php echo $row->id ?></th>
              <th class="text-center"><?php echo $row->nama_lengkap ?></th>
              <th class="text-center"><?php echo $row->wawancara ?></th>
              <th class="text-center"><?php echo $row->tes_tertulis ?></th>
              <th class="text-center"><?php echo $row->tes_praktek1 ?></th>
              <th class="text-center"><?php echo $row->tes_praktek2 ?></th>
              <th class="text-center"><?php echo $row->tes_keahlian ?></th>
              </tr>
            <?php endforeach; ?>
          </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-8" style="margin-top: 2px;">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Perhitungan Nilai Gap</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
             <thead style="font-weight: bold;" >

              <tr class="bg-silver">
                <td>Calon Karyawan</td>
                <td>Wawancara</td>
                <td>Tes Tertulis</td>
                <td>Tes Microsoft Word</td>
                <td>Tes Microsoft Excel</td>
                <td>Tes Keahlian</td>
                
              </tr>
            </thead>

            <tbody>
            <?php foreach ($analisa as $row) : ?>
              <tr class="text-center">
              <th class="text-center"><?php echo $row->nama_lengkap ?></th>
              <th class="text-center">
              <?php 
              $saya = ($get->range == 30);
              $data = ($row->wawancara == 20) ;
                if ($data == $saya )
                    {
                        echo 1;

                    }elseif ($data < $saya)
                    {
                        echo "barang baru";

                    }elseif ($data > $saya) 
                    {
                      echo "buduh";  
                    }
               ?>
              </th>
            
              <th class="text-center"><?php echo $row->tes_tertulis ?></th>
              <th class="text-center"><?php echo $row->tes_praktek1 ?></th>
              <th class="text-center"><?php echo $row->tes_praktek2 ?></th>
              <th class="text-center"><?php echo $row->tes_keahlian ?></th>
              </tr>
            <?php endforeach; ?>
              
              <th class="color text-center">Nilai Profile</th>
              <?php foreach ($sub_kriteria as $row) : ?>
              <th class="color text-center"><?php echo $row->nilai; ?></th>
              <?php endforeach; ?>
              <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
              </tr>           
          </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>