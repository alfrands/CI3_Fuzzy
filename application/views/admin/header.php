<?php
date_default_timezone_set('Asia/Jakarta');
$cek    = $user;
$nama   = $cek->nama_lengkap;
$email  = '';
if($nama == ''){
	redirect('Ctrl_admin/logout');
}

$level  = $cek->level;

$menu 	= strtolower($this->uri->segment(1));
$sub_menu = strtolower($this->uri->segment(2));
$sub_menu3 = strtolower($this->uri->segment(3));
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="<?php echo base_url(); ?>" />

	<title><?php echo $judul_web; ?> - Rekrutmen Online PPSU</title>
	<link rel="icon" type="image/png" href="img/jayaraya.png">

	<!-- Global stylesheets -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> -->
	<link href="assets/panel/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/panel/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/panel/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/panel/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/panel/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/panel/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/panel/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/panel/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/panel/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->
	<?php
	if ($sub_menu == "" or $sub_menu == "data_kriteria" or $sub_menu == "sub_kriteria" or $sub_menu == "data_tim" or $sub_menu == "data_pelamar" or $sub_menu == "data_berkas" or $sub_menu == "data_penilaian" or $sub_menu == "belum_penilaian" or $sub_menu == "data_seleksi" or $sub_menu == "hasil_penilaian" or $sub_menu == "profiletim" or $sub_menu == "ubah_password" or $menu == "laporan" or $sub_menu == "statistik") { ?>
		<!-- Theme JS files -->
		<script type="text/javascript" src="assets/panel/js/plugins/visualization/d3/d3.min.js"></script>
		<script type="text/javascript" src="assets/panel/js/plugins/visualization/d3/d3_tooltip.js"></script>
		<script type="text/javascript" src="assets/panel/js/plugins/forms/styling/switchery.min.js"></script>
		<script type="text/javascript" src="assets/panel/js/plugins/forms/styling/uniform.min.js"></script>
		<script type="text/javascript" src="assets/panel/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
		<script type="text/javascript" src="assets/panel/js/plugins/ui/moment/moment.min.js"></script>
		<script type="text/javascript" src="assets/panel/js/plugins/pickers/daterangepicker.js"></script>

		<script type="text/javascript" src="assets/panel/js/core/app.js"></script>
		<!-- <script type="text/javascript" src="assets/panel/js/pages/dashboard.js"></script> -->
		<!-- /theme JS files -->
	<?php
	} ?>

	<?php
	if ($sub_menu == "verifikasi" or $sub_menu == "set_pengumuman") { ?>
		<!-- Theme JS files -->
		<script type="text/javascript" src="assets/panel/js/plugins/tables/datatables/datatables.min.js"></script>
		<!-- <script type="text/javascript" src="assets/panel/js/plugins/forms/selects/select2.min.js"></script> -->

		<script type="text/javascript" src="assets/panel/js/core/app.js"></script>
		<script type="text/javascript" src="assets/panel/js/pages/datatables_basic.js"></script>
		<!-- /theme JS files -->

	<?php
	} ?>

	<script src="assets/panel/js/select2.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/panel/css/sweetalert.css">
	<script type="text/javascript" src="assets/panel/js/sweetalert.min.js"></script>
</head>

<body class="navbar-bottom">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="Ctrl_admin/"><label class="label label-primary">Rekrutmen Online PPSU</label></a>
			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="img/jayaraya.png" alt="foto">
						<span><?php echo ucwords($nama); ?></span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
					<li><a href="Ctrl_admin/profiletim"><i class="icon-user-plus"></i> Profile</a></li>
						<li><a href="Ctrl_admin/ubah_password"><i class="icon-key"></i> Ubah Password</a></li>
						<li class="divider"></li>
						<li><a href="Ctrl_admin/logout"><i class="icon-switch2"></i> Keluar</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">
					<div class="panel panel-success" style="margin-bottom: 0;">
						<div class="panel-heading">
							<h3 class="panel-title">
								<i class="glyphicon glyphicon-list"></i>
							</h3>
						</div>
					</div>
					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-title h6">
							<span><b>MENU DASHBOARD</b></span>
							<ul class="icons-list">
								<li><a href="Ctrl_admin" data-action="collapse"></a></li>
							</ul>
						</div>
						<div class="category-content sidebar-user">
							<div class="media">
								<a href="Ctrl_admin" class="media-left"><img src="img/jayaraya.png" class="img-flat img-sm" alt="foto"></a>
								<div class="media-body">
									<div class="text-size-mini text-muted">
										<i class="icon-pin text-size-small"></i> &nbsp;<?php echo $level; ?>
									</div>
									<span class="media-heading text-semibold"><?php echo ucwords($nama); ?></span>
								</div>
							</div>
						</div>
						<?php if ($level == 'admin') {
							$this->load->view('admin/head_admin');
						} elseif ($level == 'tim') {
							$this->load->view('admin/head_tim');
						} else {
							$this->load->view('admin/head_admin');
						}
						?>

					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->
