
  <div class="row">
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Variabel dan Konversi Nilai</h3>
          <div class="box-tools pull-right">
              <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered">
            <thead style="font-weight: bold;" >
            <tr class="bg-silver prettyprint">
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


    <div class="col-md-8 pull-left" style="margin-top: 2px;">
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
        <!-- tabel nilai asli karyawan sebelum di konversikan-->
           <tbody>
             <tr class="text-center">
                <td><?php echo $this->analisa->get_analisa($id_pelamar)->nama_lengkap; ?></td>
                <?php foreach ($get_penilaian as $row) : ?>
                  <th class="text-center"><?php echo $row->range?></th>
                <?php endforeach; ?>
              </tr>
          </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-8 pull-right" style="margin-top: 2px;">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Konversi Perhitungan Gap </h3>
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

              <!-- tabel nilai asli karyawan baru setela di konversikan -->
              <tbody>
                <th class="text-center"><?php echo $this->analisa->get_analisa($id_pelamar)->nama_lengkap; ?></th>
                <?php foreach ($this->analisa->pengurangan_nilai($id_pelamar) as $row) : ?>
                <td class="text-center"><?php echo $row->nilai?></td>
                <?php endforeach; ?>
                    
              </tbody>
              
              <!-- tabel nilai profil ideal perusahaan -->
              <th class="color text-center">Nilai Profile</th>
              <?php foreach ($this->analisa->pengurangan_nilai($id_pelamar) as $row) : ?>
                <td class="color text-center"><?php echo $row->nilai_ideal ?></td>
                <?php endforeach; ?>
              
              <!-- tabel hasil pengurangan nilai konversi dan nilai profile  -->
              <tr style="font-weight: bold;">
                <td class="text-center"><?php echo $this->analisa->get_analisa($id_pelamar)->nama_lengkap; ?></td>
               <?php foreach ($this->analisa->pengurangan_nilai($id_pelamar) as $row) : ?>
                <td class=" text-center"><?php echo $row->nilai - $row->nilai_ideal ?></td>
                <?php endforeach; ?>
               
              </tr>
          </table>
        </div>
      </div>
    </div>

    <div class="col-md-8 pull-right" style="margin-top: 2px;">
      <div class="box box-primary">
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
              <!-- tabel nilai asli karyawan baru setela di konversikan -->
              <tbody>
                <th class="text-center"><?php echo $this->analisa->get_analisa($id_pelamar)->nama_lengkap; ?></th>

                 <?php 
                 $total = 0;
                 $bagi = 3;
                 $kali = 0.4;
                 $dataSecondery = array();
                 foreach ($this->analisa->pengurangan_nilai($id_pelamar) as $key =>$row) : 
                  if ($key >= 2 or $key >= 4)  {
                    $total += pembobotan($row->nilai - $row->nilai_ideal);
                    $dataSecondery[] = pembobotan($row->nilai - $row->nilai_ideal);
                    //$corefactor[] = pembobotan($row->nilai - $row->nilai_ideal);
                    $pembagian = $total / $bagi;
                    $hasil = $pembagian * $kali;
                  }
                  ?>
                <td class=" text-center"><?php echo pembobotan($row->nilai - $row->nilai_ideal)  ?></td>
                <?php endforeach; ?>
              </tbody>
          </table>
        </div>
      </div>
    </div> 


    <div class="col-md-8 pull-right" style="margin-top: 2px;">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Konversi Perhitungan Gap </h3>
        </div>
        <!-- /.box-header -->
         <div class="box-body">
          <table class="table table-bordered">
            <!--ini adalah corefaktor -->
               <thead style="font-weight: bold;" >
                <?php 
                 $total1 = 0;
                 $bagi1 = 2;
                 $kali1 = 0.6;
                 $corefactor = array();
                 foreach ($this->analisa->pengurangan_nilai($id_pelamar) as $key =>$row) : 
                  if ($key <=1 && $key < 3)  {
                    $total1 += pembobotan($row->nilai - $row->nilai_ideal);
                    $corefactor[] = pembobotan($row->nilai - $row->nilai_ideal);
                    $pembagian1 = $total1 / $bagi1;
                    $hasil1 = $pembagian1 * $kali1;
                  }
                 
                  ?>
                <?php endforeach; ?>
                <tr class="bg-silver">
                  <td>Calon Karyawan</td>
                  <td>Wawancara</td>
                  <td>Tes Tertulis</td>
                  <td>Nilai Core Factor</td>
                  <td>Nilai Core Factor dibagi 2</td>
                  <td>Pembagian (60%)</td>
                </tr>
              </thead> 
              <!-- tabel nilai asli karyawan baru setela di konversikan -->
              <tbody>
                <th class="text-center"><?php echo $this->analisa->get_analisa($id_pelamar)->nama_lengkap; ?></th>
                <td class=" text-center"><?php echo $corefactor[0] ?></td>
                <td class=" text-center"><?php echo $corefactor[1] ?></td>
                <td class="text-center"><?php echo $total1; ?></td>
                <td class="text-center"><?php echo $pembagian1 ?></td> 
                <td class="text-center"><?php echo $hasil1; ?></td>
             </tbody>
          </table>
          <!--ini adalah Tutup corefaktor -->
        </div>
        <div class="box-body">
          <table class="table table-bordered">
               <thead style="font-weight: bold;" >
                <tr class="bg-silver">
                  <td>Calon Karyawan</td>
                  <td>Tes Microsoft Word</td>
                  <td>Tes Microsoft Excel</td>
                  <td>Tes Keahlian</td>
                  <td>Total Nilai Secondery</td>
                  <td>Nilai Secondery dibagi 3</td>
                  <td>Pembagian (40%)</td>
                </tr>
              </thead><!-- <pre><?php print_r($corefactor) ?></pre> -->


              <!-- tabel nilai asli karyawan baru setela di konversikan -->
              <tbody>
                <th class="text-center"><?php echo $this->analisa->get_analisa($id_pelamar)->nama_lengkap; ?></th>
                <td class=" text-center"><?php echo $dataSecondery[0]  ?></td>
                <td class=" text-center"><?php echo $dataSecondery[1] ?></td>
                <td class=" text-center"><?php echo $dataSecondery[2] ?></td>
                <td class="text-center"><?php echo $total ?></td>
                <td class="text-center"><?php echo $pembagian ?></td> 
                <td class="text-center"><?php echo $hasil ?></td>                
             </tbody>
          </table>
        </div>

        <div class="box-body">
          <table class="table table-bordered">
               <thead style="font-weight: bold;" >
                <tr class="bg-silver">
                  <td class="text-center">Calon Karyawan</td>
                  <td class="text-center">Hasil Nilai Total</td>
                </tr>
              </thead><!-- <pre><?php print_r($dataSecondery) ?></pre> -->

              <!-- tabel nilai asli karyawan baru setela di konversikan -->
              <tbody>
                <th class="text-center"><?php echo $this->analisa->get_analisa($id_pelamar)->nama_lengkap; ?></th>
                <td class=" text-center"><?php echo $hasil + $hasil1  ?></td>                
             </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>