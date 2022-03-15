<?php
$cek    = $user;
$id_user = $cek->id_pendaftaran;
$nama    = $cek->nama_lengkap;
$status = $cek->status_pendaftaran;
$data = $hasil;

$tgl = date('m-Y');
?>

<?php
defined('BASEPATH') or exit('No direct script access allowed');
$user = $this->db->get('tbl_pendaftaran')->row_array();

?>

<!-- Main content -->
<div class="content-wrapper">
	<!-- Content area -->
	<div class="content">

		<!-- Dashboard content -->
		<div class="row">
			<!-- Basic datatable -->
			<?php if ($cek->status_pendaftaran == 'lulus') { ?>
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title">
							<i class="glyphicon glyphicon-send"></i> INFO REKRUTMEN
						</h3>
					</div>
					<div class="panel-body">
						<h3>
							<center>
								Selamat <b><?php echo $nama; ?></b> <span class="label label-success" style="font-size:20px;">Lulus</span> Seleksi Sebagai PELAMAR PETUGAS PPSU , Silahkan Cetak Surat Pengumuman Sebagai Bukti Lulus Seleksi.
								<hr>
								<a href="Ctrl_pelamar/cetak_lulus" class="btn btn-success btn-lg" target="_blank"><i class="icon-printer4"></i> Cetak Bukti Lulus</a>
							</center>
						</h3>
							<!-- tabel -->
							<div class="table-responsive">
							<table class="table datatable-basic table-sm table-striped" width="100%">
								<thead>
									<tr>
										<th>Kode Pendaftaran</th>
										<th>No. KTP</th>
										<th>Nama Lengkap</th>
										<th>Total Nilai</th>
										<th>Keterangan</th>
										<th>Area Kerja</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $data->id_penilaian; ?></td>
										<td><?php echo $data->no_ktp; ?></td>
										<td><?php echo $data->nama_lengkap; ?></td>
										<td><?php echo $data->total_nilai; ?></td>
										<td><?php echo $data->keterangan; ?></td>
										<td><?php echo $data->area_kerja; ?></td>
									</tr>
								</tbody>
							</table>
						</div>
						<!-- tutup tablee -->
					</div>
				</div>
			<?php } elseif ($cek->status_pendaftaran == 'tidak lulus') { ?>
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h3 class="panel-title">
							<i class="glyphicon glyphicon-send"></i> INFO REKRUTMEN
						</h3>
					</div>
					<div class="panel-body" style="color:red">
						<h3>
							<center>
								Mohon Maaf <b><?php echo $nama; ?></b>
								<span class="label label-danger" style="font-size:20px;">Tidak Lulus</span> <br>
								Sebagai Petugas PPSU Pondok Kopi <b></b>.
							</center>
							<br>
						</h3>
						<!-- tabel -->
						<div class="table-responsive">
							<table class="table datatable-basic table-sm table-striped" width="100%">
								<thead>
									<tr>
										<th>Kode Pendaftaran</th>
										
										<th>No. KTP</th>
										<th>Nama Lengkap</th>
										<th>Total Nilai</th>
										<th>Keterangan</th>
										<th>Area Kerja</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $data->id_penilaian; ?></td>
										
										<td><?php echo $data->no_ktp; ?></td>
										<td><?php echo $data->nama_lengkap; ?></td>
										<td><?php echo $data->total_nilai; ?></td>
										<td><?php echo $data->keterangan; ?></td>
										<td><?php echo $data->area_kerja; ?></td>

									</tr>
								</tbody>
							</table>
						</div>
						<!-- tutup tablee -->
					</div>
				</div>
			<?php } else { ?>
				<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"><b>
								<i class="glyphicon glyphicon-send"></i> INFO REKRUTMEN</b>
						</h3>
					</div>
					<div class="panel-body">
						<h3>
							<left> Anda masih dalam tahap screening dokumen persyaratan .Proses seleksi <b> <?php echo $nama; ?></b> masih <?php echo $status; ?> , silakan tunggu untuk proses "HASIL SELEKSI ADMINISTRASI"</left> <br>
							<h1></h1>
						</h3>
					</div>
				</div>
			<?php } ?>
			<!-- /basic datatable -->
		</div>
		<!-- /dashboard content -->
