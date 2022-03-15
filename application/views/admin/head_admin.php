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
<div class="category-content no-padding">
	<ul class="navigation navigation-main navigation-accordion">

		<!-- Main -->
		<li class="navigation-header"><span>Utama</span> <i class="icon-menu" title="Main pages"></i></li>
		<li class="<?php if ($menu == 'Ctrl_admin' and $sub_menu == '') {
						echo 'active';
					} ?>"><a href="Ctrl_admin"><i class="icon-home4"></i> <span><b>HOME</b></span></a></li>
		<!-- <li class="<?php if ($sub_menu == 'profile') {
							echo 'active';
						} ?>"><a href="panel_admin/ubah_siswa"><i class="icon-user"></i><span><b>DATA SISWA</b></span></a></li> -->

		<li class="<?php if ($menu == 'Ctrl_admin' and $sub_menu == 'data_pelamar' or $sub_menu == 'edit_materi') {
						echo 'active';
					} ?>"><a href="Ctrl_admin/data_pelamar"><i class="icon-file-check"></i> <span><b>MANAJEMEN PELAMAR</b></span></a></li>

		<li class="<?php if ($menu == 'Ctrl_admin' and $sub_menu == 'data_tim') {
						echo 'active';
					} ?>"><a href="Ctrl_admin/data_tim"><i class="icon-display4"></i> <span><b>MANAJEMEN TIM</b></span></a></li>
		<li class="<?php if ($menu == 'Ctrl_admin' and $sub_menu == 'data_tim') {
						echo 'active';
					} ?>"><a href="Ctrl_admin/data_berkas"><i class="icon-file-excel"></i> <span><b>DATA BERKAS ADMINISTRASI</b></span></a></li>

		<li class="<?php if ($menu == 'Ctrl_admin' and $sub_menu == 'data_kriteria') {
						echo 'active';
					} ?>"><a href="Ctrl_admin/data_kriteria"><i class="icon-clipboard"></i> <span><b>DATA KRITERIA</b></span></a></li>

		<li class="<?php if ($menu == 'Ctrl_admin' and $sub_menu == 'sub_kriteria') {
						echo 'active';
					} ?>"><a href="Ctrl_admin/sub_kriteria"><i class="icon-clipboard"></i> <span><b>SUB KRITERIA</b></span></a></li>

		<li class="<?php if ($menu == 'Ctrl_admin' and $sub_menu == 'data_tim') {
						echo 'active';
					} ?>"><a href="Ctrl_admin/data_seleksi"><i class="icon-clipboard"></i> <span><b>HASIL SELEKSI ADMINISTRASI</b></span></a></li>


		<!-- /Main -->
		<!-- Data Lainnya -->
		<li class="navigation-header"><span>Lainnya</span> <i class="icon-menu" title="Data visualization"></i></li>
		<li>
			<a href="#"><i class="icon-cog3"></i> <span><b>PENGATURAN</b></span></a>
			<ul>
			<li class="<?php if ($sub_menu == 'profiletim') {
														echo 'active';
													} ?>"><a href="Ctrl_admin/profiletim"><i class="icon-user"></i><b>PROFIL</b></a></li>
				<li class="<?php if ($sub_menu == 'ubah_password') {
								echo 'active';
							} ?>"><a href="Ctrl_admin/ubah_password"><i class="icon-lock"></i><b>UBAH PASSWORD</b></a></li>
			</ul>
		</li>
		<li><a href="Ctrl_admin/logout"><i class="icon-switch2"></i> <span><b>KELUAR</b></span></a></li>
		<!-- /Data Lainnya -->

	</ul>
</div>
