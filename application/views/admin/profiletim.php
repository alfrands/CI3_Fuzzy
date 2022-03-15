<?php
$user = $user;
$level = $user->level; ?>
<!-- Main content -->
<div class="content-wrapper">

	<!-- Content area -->
	<div class="content">

		<!-- Dashboard content -->
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-12">
				<div class="panel panel-flat">
					<div class="panel-body">
						<fieldset class="content-group">
							<legend class="text-bold"><i class="icon-user"></i> Ubah Profile</legend>
							<?php
							echo $this->session->flashdata('msg');
							?>
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
							<form class="form-horizontal" action="Ctrl_admin/ubah_profil" method="POST">
								<div class="form-group">
									<label class="control-label col-lg-3">Username</label>
									<div class="col-lg-9">
										<input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" placeholder="Username">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-3">Mengurusi Bagian</label>
									<div class="col-lg-9">
										<input type="text" name="nama_lengkap" class="form-control" value="<?php echo $user->nama_lengkap; ?>" placeholder="Mengurusi Bagian" maxlength="100" required>
									</div>
								</div>					
									<div class="form-group">
										<label class="control-label col-lg-3">Alamat</label>
										<div class="col-lg-9">
											<input type="text" name="alamat" class="form-control" value="<?php echo $user->alamat; ?>" placeholder="Alamat" maxlength="" required>
										</div>
									</div>
										<div class="form-group">
											<label class="control-label col-lg-3">Nomor Telp</label>
											<div class="col-lg-9">
												<input type="text" name="telp" class="form-control" value="<?php echo $user->telp; ?>" placeholder="Nomor Telp" maxlength="100" required>
											</div>
										</div>
										<div class="form-group">
											<label class="control-label col-lg-3">Email</label>
											<div class="col-lg-9">
												<input type="email" name="email" class="form-control" value="<?php echo $user->email; ?>" placeholder="Email" maxlength="100" required>
											</div>
										</div>
										<div class="form-group">
												<label class="control-label col-lg-3">Website</label>
												<div class="col-lg-9">
													<input type="text" name="website" class="form-control" value="<?php echo $user->website; ?>" placeholder="Website" maxlength="100" required>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-lg-3">Kabupaten</label>
												<div class="col-lg-9">
													<input type="text" name="kabupaten" class="form-control" value="<?php echo $user->kabupaten; ?>" placeholder="Kabupaten" maxlength="100" required>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-lg-3">Ketua Panitia</label>
												<div class="col-lg-9">
													<input type="text" name="ketua_panitia" class="form-control" value="<?php echo $user->ketua_panitia; ?>" placeholder="Ketua Panitia" maxlength="100" required>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-lg-3">NIP. Ketua Panitia</label>
												<div class="col-lg-9">
													<input type="text" name="nip_ketua" class="form-control" value="<?php echo $user->nip_ketua; ?>" placeholder="NIP. Ketua Panitia" maxlength="100" required>
												</div>
											</div>
											<input type="text" name="id_user" hidden value="<?php echo $user->id_user; ?>">
												<div class="form-group">
													<label class="control-label col-lg-3">Tahun</label>
													<div class="col-lg-9">
														<input type="text" name="tahun" class="form-control" value="<?php echo $user->tahun; ?>" placeholder="Tahun" maxlength="100" required>
													</div>
												</div>
						</fieldset>
						<div class="col-md-12">
							<hr style="margin-top:-10px;">
							<button type="submit" name="btnupdate" class="btn btn-success" style="float:right;">SIMPAN</button>
						</div>
						</form>
					</div>
				</div>
			</div>


		</div>
		<!-- /dashboard content -->
