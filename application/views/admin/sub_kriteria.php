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
					<h5 class="panel-title"><b>SUB KRITERIA PENILAIAN</b></h5>
					<hr style="margin:0px;">
					<div class="heading-elements">
					</div>
                   <br>
					<a href="" data-toggle="modal" data-target="#modal_tambah" class="btn btn-success"><b>TAMBAH SUB KRITERIA</b></a>
					<br> <br>
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
								<th>Nama Kriteria</th>
								<th>Nilai</th>
                                <th>Keterangan</th>
                                <th class="text-center" width="180">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($sub_kriteria as $baris) { ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $baris['nama_kriteria']; ?></td>
									<td><?php echo $baris['nilai']; ?></td>
									<td><?php echo $baris['keterangan']; ?></td>
                                    <td align="center">
										<a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_edit<?php echo $baris['id_sub']; ?>" title="Edit"><i class="icon-pen"></i> </a>
										<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_hapus<?php echo $baris['id_sub']; ?>" title="Hapus" ><i class="icon-trash"></i></a>
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
			<!-- MODAL TAMBAH DATA KRITERIA -->
			
		
			<div class="modal" id="modal_tambah" tabindex="-1" id="" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-primary">
							<h5 class="modal-title text-white">Tambah Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<form action="Ctrl_admin/tambah_subkriteria" method="POST">
                                <div class="form-group">
                                    <label for="exampleInputnoktp">Nama Kriteria</label>
                                    <select class="form-select form-select-lg mb-3" name="id_kriteria" aria-label=".form-select-lg example">
                                        <option selected>PILIH NAMA KRITERIA</option>
                                        <?php $no = 0;
		                                    foreach ($data_kriteria as $pilihan) : $no++; ?>
                                        <option value="<?php echo $pilihan['id']; ?>"><?php echo $pilihan['nama_kriteria']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
								<div class="form-group">
									<label for="exampleInputnoktp">Nilai</label>
									<input type="text" name="nilai" required class="form-control" id="exampleInputnama" aria-describedby="emailHelp" placeholder="Masukan Nilai Sub Kriteria">
								</div>
                                <div class="form-group">
									<label for="exampleInputnoktp">Keterangan</label>
									<input type="text" name="keterangan" required class="form-control" id="exampleInputnoktp" aria-describedby="emailHelp" placeholder="Masukan Keterangan Sub Kriteria">
								</div>
						</div>
						<div class="modal-footer">
							<br>
							<button type="submit" name="btnTambah" class="btn btn-primary">Save changes</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		

		<!-- -------------------------- -->

		<!-- MODAL EDIT DATA KRITERIA -->
		<?php $no = 0;
		foreach ($sub_kriteria as $baris) : $no++; ?>
			<div class="modal" id="modal_edit<?php echo $baris['id_sub']; ?>" tabindex="-1" id="" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-primary">
							<h5 class="modal-title text-white">Edit Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<form action="Ctrl_admin/edit_subkriteria/<?php echo $baris['id_sub']; ?>" method="POST">
                            <div class="form-group">
                                    <label for="exampleInputnoktp">Nama Kriteria</label>
                                    <select class="form-select form-select-lg mb-3" name="id_kriteria" aria-label=".form-select-lg example">
                                       
                                        <?php $no = 0;
		                                    foreach ($data_kriteria as $pilihan) : $no++; ?>
                                        <option value="<?php echo $pilihan['id']; ?>"><?php echo $pilihan['nama_kriteria']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
									<label for="exampleInputnoktp">Nilai</label>
									<input type="text" name="nilai" required class="form-control" id="exampleInputnama" aria-describedby="emailHelp" placeholder="Masukan Nilai Kriteria" value="<?php echo $baris['nilai']; ?>">
								</div>
                                <div class="form-group">
									<label for="exampleInputnoktp">Keterangan</label>
									<input type="text" name="keterangan" required class="form-control" id="exampleInputnoktp" aria-describedby="emailHelp" placeholder="Masukan Keterangan Kriteria" value="<?php echo $baris['keterangan']; ?>">
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

<!-- MODAL HAPUS DATA KRITERIA -->
		<?php $no = 0;
		foreach ($sub_kriteria as $baris) : $no++; ?>
			<div class="modal" id="modal_hapus<?php echo $baris['id_sub']; ?>" tabindex="-1" id="" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header bg-primary">
							<h5 class="modal-title text-white">Konfirmasi Hapus Data</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="Ctrl_admin/hapus_subkriteria" method="POST">
							<h4>Yakin akan hapus data <?php echo $baris['nama_kriteria'];?> ?</h4>
						</div>
						<div class="modal-footer">
							<br>
							<input type="text" hidden name="id" value="<?php echo $baris['id_sub']; ?>">
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
