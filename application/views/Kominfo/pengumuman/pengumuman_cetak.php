<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* Header Print (KOP)
	*
	* @author Teitra Mega office@teitraega.co.id
	**/
	$this->load->view('Kominfo/print/header');
	?>
	<div class="content " style="margin-bottom: 7px;">
		<h5 class="upper text-center"><?php echo $title; ?></h5>
		<table id="example1" class="table table-bordered table-striped">
                <thead style="margin-top: 20px;">
                  <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kode Pelamar</th>
                    <th class="text-center">Nik</th>
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
                            <td class="text-center"><?php if ($hasil+$hasil1 <= '3.0') : ?><span class="label label-danger">TIDAK LULUS<span><?php endif ?> <?php if ($hasil+$hasil1 >= '3.0') :?><span class="label label-success">LULUS<span><?php endif ?></td>
                          
                          </tr>
                <?php endforeach ?>
                </tbody>
            </table>
		</div>
		<?php
		$this->load->view('Kominfo/print/footer');