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
					<h5 class="panel-title"><b>MANAJEMEN TIM</b></h5>
					<hr style="margin:0px;">
					<div class="heading-elements">
					</div>
					<br>
					<a href="" data-toggle="modal" data-target="#modal_tambah" class="btn btn-success"><b>TAMBAH DATA</b></a>
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
								<th>Username</th>
								<th>Password</th>
								<th>Level</th>
								<th class="text-center" width="180">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($data_tim as $baris) { ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $baris['username']; ?></td>
									<td><?php echo $baris['password']; ?></td>
									<td><?php echo $baris['level']; ?></td>
									<td align="center">
										<a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_edit<?php echo $baris['id_user']; ?>" title="Edit"><i class="icon-pen"></i> </a>
										<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_hapus<?php echo $baris['id_user']; ?>" title="Hapus"><i class="icon-trash"></i></a>
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

		<!-- MODAL TAMBAH TIM -->
		<div class="modal" id="modal_tambah" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white">Tambah Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">

						<form action="Ctrl_admin/tambah_tim" method="POST">
							<div class="form-group">
								<label for="exampleInputnoktp">Username</label>
								<input type="text" name="username" class="form-control" id="exampleInputnoktp" aria-describedby="emailHelp" placeholder="Masukan Username" value="">
							</div>
							<div class="form-group">
								<label for="exampleInputnoktp">Password</label>
								<input type="password" name="password" class="form-control" id="exampleInputnama" aria-describedby="emailHelp" placeholder="Masukan Password" value="">
							</div>
							<div class="form-group">
								<label for="exampleInputtempat">Level</label>
								<input type="text" name="level" class="form-control" id="exampleInputtempat" readonly placeholder="Masukan Tempat Lahir" value="<?php echo $baris['level']; ?>">
							</div>
					</div>
					<div class="modal-footer">
						<br>
						<button type="submit" name="btnTambah" class="btn btn-primary">Save Data</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- ------------------------- -->

		<!-- MODAL EDIT TIM -->
		<?php $no = 0;
		foreach ($data_tim as $baris) : $no++; ?>
			<div class="modal" id="modal_edit<?php echo $baris['id_user']; ?>" tabindex="-1" id="" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-primary">
							<h5 class="modal-title text-white">Edit Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<form action="Ctrl_admin/edit_tim" method="POST">
								<div class="form-group">
									<label for="exampleInputnoktp">Username</label>
									<input type="text" name="username" class="form-control" id="exampleInputnoktp" aria-describedby="emailHelp" placeholder="Masukan No KTP" value="<?php echo $baris['username']; ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputnoktp">Password</label>
									<input type="text" name="password" class="form-control" id="exampleInputnama" aria-describedby="emailHelp" placeholder="Masukan Nama" value="<?php echo $baris['password']; ?>">
								</div>
								<input type="text" hidden name="id_user" value="<?php echo $baris['id_user']; ?>">
								<div class="form-group">
									<label for="exampleInputtempat">Level</label>
									<input type="text" name="level" class="form-control" id="exampleInputtempat" readonly placeholder="Masukan Tempat Lahir" value="<?php echo $baris['level']; ?>">
								</div>
						</div>
						<div class="modal-footer">
							<br>
							<button type="submit" name="btnedit" class="btn btn-primary">Save changes</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		<!-- -------------------------------- -->

		<!-- MODAL HAPUS TIM -->
		<div class="modal" id="modal_hapus<?php echo $baris['id_user']; ?>" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<h5 class="modal-title text-white">Konfirmasi Hapus Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="Ctrl_admin/hapus_tim" method="POST">
						<h4>Yakin akan hapus data <?php echo $baris['username'];?> ?</h4>
					</div>
					<div class="modal-footer">
						<br>
						<input type="text" hidden name="id_user" value="<?php echo $baris['id_user']; ?>">
						<button type="submit" name="btnHapus" class="btn btn-primary">Delete</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<!-- ------------------------- -->

		<script type="text/javascript">
			function thn() {
				var thn = $('[name="thn"]').val();
				window.location = "panel_admin/verifikasi/thn/" + thn;
			}

			$('[name="thn"]').select2({
				placeholder: "- Tahun -"
			});
		</script>
