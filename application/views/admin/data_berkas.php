<?php
date_default_timezone_set('Asia/Jakarta');
$cek    = $user;
$nama   = $cek->nama_lengkap;
$email  = '';

$level  = $cek->level;

$menu 	= strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
$sub_menu3 = strtolower($this->uri->segment(3));
?>
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
					<h5 class="panel-title"><b>DATA BERKAS ADMINISTRASI</b></h5>
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
								<th>Foto KTP</th>
								<th>Foto KK</th>
								<th>Foto Pernyataan</th>
								<th class="text-center" width="180">Aksi</th>
							</tr>
						</thead>
						
						<tbody>
							<?php
							$no = 1;
							foreach ($data_berkas as $baris) { $baris = (array)$baris; ?>
							
								
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $baris['id_pendaftaran']; ?></td>
										<td><?php echo $baris['no_kk']; ?></td>
										<td><?php echo $baris['no_ktp']; ?></td>
										<td><?php echo $baris['nama_lengkap']; ?></td>
										<td><a href="" data-toggle="modal" data-target="#modal_pict<?php echo $baris['id_pendaftaran']; ?>" title="Lihat Gambar"><img src="<?php echo base_url() . "files/uploads/" . $baris['foto_ktp']; ?>" alt="foto ktp" width="50px" height="40px"></a></td>
										<td><a href="" data-toggle="modal" data-target="#modal_kk<?php echo $baris['id_pendaftaran']; ?>" title="Lihat Gambar"><img src="<?php echo base_url() . "files/uploads/" . $baris['foto_kk']; ?>" alt="foto kk" width="50px" height="40px"></a></td>
										<td><a href="" data-toggle="modal" data-target="#modal_per<?php echo $baris['id_pendaftaran']; ?>" title="Lihat Gambar"><img src="<?php echo base_url() . "files/uploads/" . $baris['foto_pernyataan']; ?>" alt="foto pernyataan" width="50px" height="40px"></a></td>
										<?php if ($level == 'admin') { ?>
											<td align="center">
											<a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_edit<?php echo $baris['id_pendaftaran']; ?>" title="Edit"><i class="icon-pen"></i> </a>
											<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_hapus<?php echo $baris['id_pendaftaran']; ?>" title="Hapus"><i class="icon-trash"></i></a>
										</td>
										<?php } else { ?>
											<td align="center">
											<a href="" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_edit<?php echo $baris['id_pendaftaran']; ?>" title="Penilaian"><i class="icon-clipboard"></i> </a>
											<a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_hapus<?php echo $baris['id_pendaftaran']; ?>" title="Hapus"><i class="icon-trash"></i></a>
										</td>
										<?php } ?>
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
		<?php foreach ($data_berkas as $baris) { $baris = (array)$baris; ?>
		<!-- MODAL EDIT DATA BERKAS -->
				<div class="modal" id="modal_edit<?php echo $baris['id_pendaftaran']; ?>" tabindex="-1" id="" role="dialog">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<h5 class="modal-title text-white">Edit Data Berkas</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<form action="Ctrl_admin/edit_berkas/<?php echo $baris['id_pendaftaran']; ?>" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label for="exampleInputnoktp">No KTP</label>
										<input type="text" readonly name="no_ktp" required class="form-control" id="exampleInputnoktp" aria-describedby="emailHelp" placeholder="Masukan No KTP" value="<?php echo $baris['no_ktp']; ?>">
									</div>
									<div class="form-group">
										<label for="exampleInputnoktp">Nama Lengkap</label>
										<input type="text" readonly name="nama_lengkap" required class="form-control" id="exampleInputnama" aria-describedby="emailHelp" placeholder="Masukan Nama" value="<?php echo $baris['nama_lengkap']; ?>">
									</div>
									<div class="form-group">
										<label>KTP :</label>
										<input type="file" required name="ktp" accept="image/*">
										<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
									</div>
									<div class="form-group">
										<label>KK :</label>
										<input type="file" required name="kk" accept="image/*">
										<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
									</div>
									<div class="form-group">
										<label>Surat Pernyataan :</label>
										<input type="file" required name="pernyataan" accept="image/*">
										<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
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
<?php
								} ?>

				<?php foreach ($data_berkas as $baris) { $baris = (array)$baris; ?>
				<!-- MODAL VIEW PICTURE -->
				<div class="modal fade bs-example-modal-lg" id="modal_pict<?php echo $baris['id_pendaftaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" style="margin-top:5px;">
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<img src="<?php echo base_url() . "files/uploads/" . $baris['foto_ktp']; ?>" alt="foto ktp" width="800px" height="550px">
							</div>
						</div>
					</div>
				</div>
				<!-- MODAL VIEW PICTURE KK -->
				<div class="modal fade bs-example-modal-lg" id="modal_kk<?php echo $baris['id_pendaftaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" style="margin-top:5px;">
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<img src="<?php echo base_url() . "files/uploads/" . $baris['foto_kk']; ?>" alt="foto kk" width="800px" height="550px">
							</div>
						</div>
					</div>
				</div>
				<!-- MODAL VIEW PICTURE PERNYATAAN -->
				<div class="modal fade bs-example-modal-lg" id="modal_per<?php echo $baris['id_pendaftaran']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg" style="margin-top:5px;">
						<div class="modal-content">
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<img src="<?php echo base_url() . "files/uploads/" . $baris['foto_pernyataan']; ?>" alt="foto pernyataan" width="800px" height="800px">
							</div>
						</div>
					</div>
				</div>
				<?php
								} ?>

		<!-- -------------------------- -->

		<!-- MODAL HAPUS DATA BERKAS -->
		<?php foreach ($data_berkas as $baris) { $baris = (array)$baris; ?>
		
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
							<form action="Ctrl_admin/hapus_berkas/<?php echo $baris['id_pendaftaran']; ?>" method="POST">
								<h4>Yakin akan hapus data berkas <?php echo $baris['nama_lengkap']; ?> ?</h4>
						</div>
						<div class="modal-footer">
							<br>
							<button type="submit" name="btnHapus" class="btn btn-primary">Delete</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<?php
								} ?>
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
