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
					<a href="Ctrl_admin/history_penilaian" class="btn btn-success"><b>HISTORY PENILAIAN</b></a>
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
                                <th>No. KK</th>
								<th>Nama Lengkap</th>
								<th>Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($hasil_penilaian as $baris) { ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $baris['id_pendaftaran']; ?></td>
									<td><?php echo $baris['no_ktp']; ?></td>
									<td><?php echo $baris['no_kk']; ?></td>
									<td><?php echo $baris['nama_lengkap']; ?></td>
									<td><?php echo $baris['status_pendaftaran']; ?></td>
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
		<script type="text/javascript">
			function thn() {
				var thn = $('[name="thn"]').val();
				window.location = "panel_admin/verifikasi/thn/" + thn;
			}

			$('[name="thn"]').select2({
				placeholder: "- Tahun -"
			});
		</script>
