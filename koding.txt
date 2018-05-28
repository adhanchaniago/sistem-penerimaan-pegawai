<!-- <pre>
  <?php print_r($sub_kriteria) ?>
</pre> -->
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
          <tr class="text-center">
            <td><?php echo $analisa->nama_lengkap; ?></td>
            <td><?php echo $this->analisa->get_konversi($analisa->wawancara)->range ?> </td>
            <td><?php echo $this->analisa->get_konversi($analisa->tes_tertulis)->range ?></td>
            <td><?php echo $this->analisa->get_konversi($analisa->tes_praktek1)->range  ?></td>
            <td><?php echo $this->analisa->get_konversi($analisa->tes_praktek2)->range ?></td>
            <td><?php echo $this->analisa->get_konversi($analisa->tes_keahlian)->range ?></td>
          </tr>
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
             <tr class="text-center">
              <td><?php echo $analisa->nama_lengkap; ?></td>
              <td><?php echo $this->analisa->get_konversi($analisa->wawancara)->nilai ?></td>
              <td><?php echo $this->analisa->get_konversi($analisa->tes_tertulis)->nilai  ?></td>
              <td><?php echo $this->analisa->get_konversi($analisa->tes_praktek1)->nilai  ?></td>
              <td><?php echo $this->analisa->get_konversi($analisa->tes_praktek2)->nilai  ?></td>
              <td><?php echo $this->analisa->get_konversi($analisa->tes_keahlian)->nilai ?></td>
            </tr>
              
              <th class="color text-center">Nilai Profile</th>
              <!-- <?php foreach ($sub_kriteria as $row) : ?>
              <th class="color text-center"><?php echo $row->nilai; ?></th>
              <?php endforeach; ?> -->
              <th class="color text-center"></th>
              <th class="color text-center"></th>
              <th class="color text-center"></th>
              <th class="color text-center"></th>
              <th class="color text-center"></th>

              <tr >
                <th class="text-center"><?php echo $analisa->nama_lengkap; ?></th>
                <th class="text-center"><?php echo $this->analisa->get_konversi($analisa->wawancara)->nilai   ?></th>
                <th class="text-center"><?php echo $this->analisa->get_konversi($analisa->tes_tertulis)->nilai ?></th>
                <th class="text-center"><?php echo $this->analisa->get_konversi($analisa->tes_praktek1)->nilai ?></th>
                <th class="text-center"><?php echo $this->analisa->get_konversi($analisa->tes_praktek2)->nilai ?></th>
                <th class="text-center"><?php echo $this->analisa->get_konversi($analisa->tes_keahlian)->nilai ?></th>
              </tr>           
          </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>