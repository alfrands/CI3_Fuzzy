   #tbl_input2 {
   width: 100px;
   text-align: center;
   }

   #th_center>th {
   text-align: center;
   }
   </style>

   <?php
	error_reporting(0);
	$user = $user; ?>
   <!-- Main content -->
   <div class="content-wrapper">

   	<!-- Content area -->
   	<div class="content">

   		<!-- Dashboard content -->
   		<div class="row">
   			<div class="col-md-9">
   				<div class="panel panel-flat">
   					<div class="panel-body">
   						<fieldset class="content-group">
   							<legend class="text-bold"><i class="icon-user"></i> Upload Berkas</legend>
   							<h2 style="text-align: center;">Upload Berkas Administrasi</h2>
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
   							<form action='Ctrl_pelamar/upload_berkas' method="post" enctype="multipart/form-data">
   								<div class="form-group">
   									<label>Nama :</label>
   									<input type="text" class="form-control" placeholder="Masukkan Nama" name="nama_lengkap" required="required" readonly value="<?php echo $user->nama_lengkap; ?>">
   								</div>
								   
   								<div class="form-group">
   									<label>KTP :</label>
   									<input type="file" name="ktp" accept="image/*">
   									<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
   								</div>
   								<div class="form-group">
   									<label>KK :</label>
   									<input type="file" name="kk" accept="image/*">
   									<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
   								</div>
   								<div class="form-group">
   									<label>Surat Pernyataan :</label>
   									<input type="file" name="pernyataan" accept="image/*">
   									<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif</p>
   								</div>
   								<input type="text" hidden name="id_berkas" value="<?php echo $user->id_pendaftaran; ?>">
   								<input type="submit" name="btnUpload" value="Simpan" class="btn btn-primary">
   							</form>

   						</fieldset>
   					</div>
   				</div>
   			</div>
   			<div class="col-md-3">
   				<div class="panel panel-flat">
   					<div class="panel-body">
   						<center>
   							<img src="img/jayaraya.png" alt="<?php echo $user->nama_lengkap; ?>" class="" width="176">
   						</center>
   						<br>
   						<fieldset class="content-group">
   							<hr style="margin-top:0px;">
   							<b>Tanggal Daftar</b> : <br>
   							<?php echo $this->lib_data->tgl_id(date('d-m-Y H:i:s', strtotime($user->tgl_pendaftaran))); ?>
   							<hr>
   							<b>Kode Pendaftaran : </b><?php echo $user->id_pendaftaran; ?>
   						</fieldset>
   						</form>
   					</div>
   				</div>
   			</div>
   		</div>
   		<!-- /dashboard content -->
