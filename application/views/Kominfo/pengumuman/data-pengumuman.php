<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?> 
<div class="row">
<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<?php echo form_open(current_url(), array('method' => 'GET')); ?>
			<div class="box-header">
				<div class="col-md-12">
					<div class="col-md-4">
						<input type="text" class="form-control" name="query" placeholder="Pencarian...." value="<?php echo $this->input->get('query') ?>">
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-warning hvr-shadow btn-flat btn-sm" id="search"><i class="fa fa-search"></i> Cari Data</button>
						<a href="" class="btn btn-warning hvr-shadow btn-flat btn-sm" id="reset-form"><i class="fa fa-times"></i> Reset</a>
					</div>
					<div class="col-md-3 pull-right">
						<a href="#" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print" id="reset-form"><i class="fa fa-print"></i> Cetak</a>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
			<br>
			<br>
			<div class="box-body no-padding">
				<table class="table table-bordered table-stripped ">
					<thead class="bg-silver">
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
	              			<td class="text-center"><?php echo ++$key; ?></td>
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
		</div>
		<div class="col-md-12 text-center">
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>
<?php
/* End of file main-anggota.php */
/* Location: ./application/views/pages/anggota/main-anggota.php */