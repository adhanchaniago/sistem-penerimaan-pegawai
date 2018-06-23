<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<div class="row">
  <div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
    <div class="col-md-12">
  
      <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Pengumuman</h3>
        </div>      
        <div class="box-body">
            <div class="pull-right">
              <a href="<?php echo site_url("pengumuman/print_out?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print"><i class="fa fa-print"></i> Cetak Pengumuman</a>
            </div>
        </div>
        <div class="box-body" style="margin-top: 20px;">
            <table id="example1" class="table table-bordered table-striped">
                <thead style="margin-top: 20px;">
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Pelamar</th>
                    <th class="text-center">No KTP</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Tempat dan Tanggal Lahiir</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Alamat</th>
                    <th class="text-center">Pendidikan</th>
                    <th class="text-center">Nilai</th>
                    <th class="text-center">Keterangan</th>
                
                  </tr>
                </thead>

                <tbody>
                  <?php 
                    $no = 1;
                    foreach ($this->hasil->get_pelamar() as $key => $value): ?>
                      <?php 
                          $total1 = 0;
                          $bagi1 = 3;
                          $kali1 = 0.6;
                          $total = 0;
                          $bagi = 2;
                          $kali = 0.4;
                          $corefactor = array();
                          foreach ($this->hasil->ngambil($value->kd_pelamar) as $key => $value):
                          if ($key <=1 && $key < 3)  {
                              $total1 += pembobotan($value->nilai - $value->nilai_ideal);
                              $corefactor[] = pembobotan($value->nilai - $value->nilai_ideal);
                              $pembagian1 = $total1 / $bagi1;
                              $hasil1 = $pembagian1 * $kali1;
                            }if ($key >= 2 or $key >= 4)  {
                              $total += pembobotan($value->nilai - $value->nilai_ideal);
                              $dataSecondery[] = pembobotan($value->nilai - $value->nilai_ideal);
                              $pembagian = $total / $bagi;
                              $hasil = $pembagian * $kali;
                            } 
                          ?>
                          <?php endforeach ?>
                          <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td class="text-center"><?php echo $value->kd_pelamar ?></td>
                            <td class="text-left"><?php echo $value->no_ktp ?></td>
                            <td class="text-center"><?php echo ucwords($value->nama_lengkap) ?></td>
                            <td class="text-left"><?php echo ucwords($value->tmp_lahir.'-'.$value->tgl_lahir) ?></td>
                            <td class="text-center"><?php echo ucwords($value->jenis_kelamin) ?></td>
                            <td class="text-center"><?php echo ucwords($value->alamat) ?></td>
                            <td class="text-center"><?php echo $value->pend_terakhir ?></td>
                            <td class="text-center"><?php echo $hasil+$hasil1 ?></td>
                            <td class="text-center"><?php if ($hasil+$hasil1 <= '2.4') : ?><span class="label label-danger">TIDAK LULUS<span><?php endif ?> <?php if ($hasil+$hasil1 > '2.4') :?><span class="label label-success">LULUS<span><?php endif ?></td>
                          
                          </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-12 text-center">
      <?php echo $this->pagination->create_links(); ?>
    </div>
  </div>
</div>
<?php
/* End of file main-anggota.php */
/* Location: ./application/views/pages/anggota/main-anggota.php */