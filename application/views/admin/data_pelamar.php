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
					<h5 class="panel-title"><b>MANAJEMEN PELAMAR</b></h5>
					<hr style="margin:0px;">
					<div class="heading-elements">
					</div>
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
							   <br>
				</div>
				<div class="table-responsive">
					<table class="table datatable-basic table-sm table-striped" width="100%">
						<thead>
							<tr>
								<th width="30px;">No.</th>
								<th>Kode Pendaftaran</th>
								<th>No. KK</th>
								<th>No. KTP</th>
								<th>Nama Lengkap</th>
								<th>Tempat Tanggal Lahir</th>
								<th>Alamat</th>
								<th>Status Seleksi</th>
								<th class="text-center" width="180">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($data_pelamar as $baris) { ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $baris['id_pendaftaran']; ?></td>
									<td><?php echo $baris['no_kk']; ?></td>
									<td><?php echo $baris['no_ktp']; ?></td>
									<td><?php echo $baris['nama_lengkap']; ?></td>
									<td><?php echo $baris['ttl']; ?></td>
									<td><?php echo $baris['alamat_rumah']; ?></td>
									<td><?php echo $baris['status_pendaftaran']; ?></td>
									<td align="center">
										<a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_edit<?php echo $baris['id_pendaftaran']; ?>" title="Edit"><i class="icon-pen"></i> </a>
										<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_hapus<?php echo $baris['id_pendaftaran']; ?>" title="Hapus" ><i class="icon-trash"></i></a>
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
		foreach ($data_pelamar as $baris) : $no++; ?>
			<div class="modal" id="modal_edit<?php echo $baris['id_pendaftaran']; ?>" tabindex="-1" id="" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-primary">
							<h5 class="modal-title text-white">Edit Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<form action="Ctrl_admin/edit_pelamar/<?php echo $baris['id_pendaftaran']; ?>" method="POST">
								<div class="form-group">
									<label for="exampleInputnoktp">No KTP</label>
									<input type="text" name="no_ktp" required class="form-control" id="exampleInputnoktp" aria-describedby="emailHelp" placeholder="Masukan No KTP" value="<?php echo $baris['no_ktp']; ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputnoktp">No KK</label>
									<input type="text" name="no_kk" required class="form-control" id="exampleInputnoktp" aria-describedby="emailHelp" placeholder="Masukan No KK" value="<?php echo $baris['no_kk']; ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputnoktp">Nama Lengkap</label>
									<input type="text" name="nama_lengkap" required class="form-control" id="exampleInputnama" aria-describedby="emailHelp" placeholder="Masukan Nama" value="<?php echo $baris['nama_lengkap']; ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputtempat">Tempat Tanggal Lahir</label>
									<input type="text" name="ttl" required class="form-control" id="exampleInputtempat" placeholder="Masukan Tempat Lahir" value="<?php echo $baris['ttl']; ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputtempat">Alamat</label>
									<textarea class="form-control" name="alamat" required id="exampleFormControlTextarea1" rows="3"> <?php echo $baris['alamat_rumah']; ?> </textarea>
								</div>
						</div>
						<div class="modal-footer">
							<br>
							<button type="submit" name="btnEdit" class="btn btn-primary">Save changes</button>
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
		foreach ($data_pelamar as $baris) : $no++; ?>
			<div class="modal" id="modal_hapus<?php echo $baris['id_pendaftaran']; ?>" tabindex="-1" id="" role="dialog">
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
							<h4>Yakin akan hapus data <?php echo $baris['nama_lengkap'];?> ?</h4>
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
