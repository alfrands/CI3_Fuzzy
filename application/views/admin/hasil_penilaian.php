<!-- Main content -->
<div class="content-wrapper">
	<!-- Content area -->
	<div class="content">
		<?php
		echo $this->session->flashdata('msg');
		?>
		<!-- Dashboard content -->
		<div class="row">
			<!-- Basic datatable -->
			<div class="panel panel-flat">
				<div class="panel-heading">
					<h5 class="panel-title"><b>HASIL PENILAIAN</b></h5>
					<hr style="margin:0px;">
					<div class="heading-elements">
					</div>
					<br>
					<a href="Ctrl_admin/hasil_penilaian" class="btn btn-info"><b><== KEMBALI</b></a>
					<br><br>
					<?php if ($this->session->flashdata('success')) : ?>
   								<div class="alert-success">
   									<?php echo $this->session->flashdata('success'); ?>
   								</div>
   							<?php endif; ?>
   							<?php if ($this->session->flashdata('error')) : ?>
   								<div class="alert-danger">
   									<?php echo $this->session->flashdata('error'); ?>
   								</div>
   							<?php endif; ?>
				</div>
				<div class="table-responsive">
					<table class="table datatable-basic table-sm table-striped" width="100%">
						<thead>
							<tr>
								<th width="30px;">No.</th>
								<th>Kode Pendaftaran</th>
								<th>No. KTP</th>
								<th>Nama Lengkap</th>
								<th>Kriteria Penduduk</th>
								<th>Kriteria Keluarga</th>
								<th>Kriteria Pernyataan</th>
								<th>Total Nilai</th>
								<th>Keterangan</th>
								<th>Area Kerja</th>
								<th class="text-center" width="180">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($hasil_penilaian as $baris) { ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $baris['id_penilaian']; ?></td>
									<td><?php echo $baris['no_ktp']; ?></td>
									<td><?php echo $baris['nama_lengkap']; ?></td>
									<td><?php echo $baris['kriteria_penduduk']; ?></td>
									<td><?php echo $baris['kriteria_keluarga']; ?></td>
									<td><?php echo $baris['kriteria_pernyataan']; ?></td>
									<td><?php echo $baris['total_nilai']; ?></td>
									<td><?php echo $baris['keterangan']; ?></td>
									<td><?php echo $baris['area_kerja']; ?></td>
									<td class="text-center">
										<a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_edit<?php echo $baris['id_penilaian']; ?>" title="Penempatan Area Kerja"><i class="icon-map"></i> <br> Area Kerja</a>
									</td>
								</tr>
							<?php
							} ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /basic datatable -->
		</div>
		<!-- /dashboard content -->

		<!-- MODAL EDIT DATA PELAMAR -->
		<?php $no = 0;
		foreach ($hasil_penilaian as $baris) : $no++; ?>
			<div class="modal" id="modal_edit<?php echo $baris['id_penilaian']; ?>" tabindex="-1" id="" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-primary">
							<h5 class="modal-title text-white">Penempatan Area Kerja</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="Ctrl_admin/edit_area/<?php echo $baris['id_penilaian']; ?>" method="POST">
								<div class="form-group">
									<label for="exampleInputnoktp">No KTP</label>
									<input type="text" readonly name="no_ktp" required class="form-control" id="exampleInputnoktp" aria-describedby="emailHelp" placeholder="Masukan No KTP" value="<?php echo $baris['no_ktp']; ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputnoktp">Nama Lengkap</label>
									<input type="text" readonly name="nama_lengkap" required class="form-control" id="exampleInputnama" aria-describedby="emailHelp" placeholder="Masukan Nama" value="<?php echo $baris['nama_lengkap']; ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputnoktp">Keterangan</label>
									<input type="text" readonly name="keterangan" required class="form-control" id="exampleInputnama" aria-describedby="emailHelp" placeholder="Masukan Keterangan" value="<?php echo $baris['keterangan']; ?>">
								</div>
								<div class="form-group">
									<label for="exampleFormControlSelect1">Pilih Area Kerja</label>
									<select class="form-control" required name="area_kerja" id="exampleFormControlSelect1">
										<option>-</option>
										<option>RT.001</option>
										<option>RT.002</option>
										<option>RT.003</option>
										<option>RT.004</option>
										<option>RT.005</option>
									</select>
								</div>
						</div>
						<div class="modal-footer">
							<br>
							<button type="submit" name="btnSend" class="btn btn-primary">Send</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

		<!-- -------------------------- -->

		<!-- MODAL HAPUS DATA PELAMAR -->
		<?php $no = 0;
		foreach ($hasil_penilaian as $baris) : $no++; ?>
			<div class="modal" id="modal_hapus<?php echo $baris['id_penilaian']; ?>" tabindex="-1" id="" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-primary">
							<h5 class="modal-title text-white">Konfirmasi Hapus Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="Ctrl_admin/hapus_pelamar" method="POST">
								<h4>Yakin akan hapus data <?php echo $baris['nama_lengkap']; ?> ?</h4>
						</div>
						<div class="modal-footer">
							<br>
							<input type="text" hidden name="id_pendaftaran" value="<?php echo $baris['id_pendaftaran']; ?>">
							<button type="submit" name="btnHapus" class="btn btn-primary">Delete</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<!-- -------------------------- -->
		<script type="text/javascript">
			function thn() {
				var thn = $('[name="thn"]').val();
				window.location = "panel_admin/verifikasi/thn/" + thn;
			}

			$('[name="thn"]').select2({
				placeholder: "- Tahun -"
			});
		</script>
