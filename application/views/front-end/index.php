<?php $ceks = $this->session->userdata('no_pendaftaran'); ?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
$user = $this->db->get('tbl_user')->row_array();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Rekrutmen PPSU Kelurahan Pondok Kopi| <?php echo $user['nama_lengkap']; ?></title>
    <base href="<?php echo base_url(); ?>" />
    <link rel="shortcut icon" href="assets/images/jr.png" type="image/png">
    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/faa.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="assets/css/freelancer.css" rel="stylesheet">
    <link href="assets/css/kita.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<style>
    table {
        font-family: Arial, Helvetica, sans-serif;
        color: #666;
        text-shadow: 1px 1px 0px #fff;
        background: #eaebec;
        border: #ccc 1px solid;
    }

    table th {
        padding: 15px 35px;
        border-left: 1px solid #e0e0e0;
        border-bottom: 1px solid #e0e0e0;
        background: #ededed;
    }

    table th:first-child {
        border-left: none;
    }

    table tr {
        text-align: center;
        padding-left: 20px;
    }

    table td:first-child {
        text-align: left;
        padding-left: 20px;
        border-left: 0;
    }

    table td {
        padding: 15px 35px;
        border-top: 1px solid #ffffff;
        border-bottom: 1px solid #e0e0e0;
        border-left: 1px solid #e0e0e0;
        background: #fafafa;
        background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
        background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
    }

    table tr:last-child td {
        border-bottom: 0;
    }

    table tr:last-child td:first-child {
        -moz-border-radius-bottomleft: 3px;
        -webkit-border-bottom-left-radius: 3px;
        border-bottom-left-radius: 3px;
    }

    table tr:last-child td:last-child {
        -moz-border-radius-bottomright: 3px;
        -webkit-border-bottom-right-radius: 3px;
        border-bottom-right-radius: 3px;
    }

    table tr:hover td {
        background: #f2f2f2;
        background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
        background: -moz-linear-gradient(top, #f2f2f2, #f0f0f0);
    }


    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px;
        height: 0;
        overflow: hidden;
    }

    .video-container iframe,
    .video-container object,
    .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>

<body id="page-top" class="index">
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-primary navbar-fixed-top navbar-custom bxshad">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">
                    <img src="img/jayaraya.png" alt="Logo" width="48" style="position:absolute;margin-top:-10px;">
                    <span style="margin-left:45px;">&nbsp;Rekrutmen PPSU Kelurahan Pondok Kopi</span>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="#home"><i class="fa fa-home"></i> Home</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about"><i class="fa fa-bookmark"></i> About Us</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#contact"><i class="fa fa-phone-square"></i> Contact Us</a>
                    </li>
                    <li class="page-scroll">
                        <a href="login_pelamar"><i class="fa fa-user"></i> Login</a>
                    </li>
                    <li class="page-scroll">
                        <a href="pendaftaran"><i class="fa fa-plus"></i> Daftar</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <header>
        <?php
        if (strtolower($this->uri->segment(1)) == 'login_pelamar') {
            $this->load->view('front-end/login');
        } ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive" src="img/jayaraya.png" style="margin-top:-15%;margin-bottom:-10px;" width="100">
                    <br><br>
                    <div class="intro-text">
                        <span class="name shad" style="font-size:35px; line-height: 35px;">
                            SELAMAT DATANG DI REKRUTMEN ONLINE <br> <?php echo $user['nama_lengkap']; ?>
                        </span>
                        <br>
                        <?php if ($web_ppsu->status_rekrutmen == 'buka') { ?>
                        <?php } else { ?>
                            <span class="skills">
                            </span>
                            <br>

                            <span>
                                <a href="javascript:void(0);" class="btn btn-danger btn-lg" style="margin:5px;"><i class="fa fa-file faa-pulse animated"></i> &nbsp;<b>PENDAFTARAN PPDB Online DITUTUP</b></a>
                                <br>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <style>
        table {
            margin: auto;
            font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
            font-size: 12px;

        }

        .demo-table {
            border-collapse: collapse;
            font-size: 13px;
        }

        .demo-table th,
        .demo-table td {
            border-bottom: 1px solid #e1edff;
            border-left: 1px solid #e1edff;
            padding: 7px 17px;
        }

        .demo-table th,
        .demo-table td:last-child {
            border-right: 1px solid #e1edff;
        }

        .demo-table td:first-child {
            border-top: 1px solid #e1edff;
        }

        .demo-table td:last-child {
            border-bottom: 0;
        }

        caption {
            caption-side: top;
            margin-bottom: 10px;
        }

        /* Table Header */
        .demo-table thead th {
            background-color: #508abb;
            color: #FFFFFF;
            border-color: #6ea1cc !important;
            text-transform: uppercase;
        }

        /* Table Body */
        .demo-table tbody td {
            color: #353535;
        }

        .demo-table tbody tr:nth-child(odd) td {
            background-color: #f4fbff;
        }

        .demo-table tbody tr:hover th,
        .demo-table tbody tr:hover td {
            background-color: #ffffa2;
            border-color: #ffff0f;
            transition: all .2s;
        }
    </style>

    <!-- About Section -->
    <section class="success" id="about" style="padding: 30px; border-top: 2px solid #fff;">
        <div class="container">
            <div class=" row">
                <div class="col-lg-12 text-center">
                    <h2>Rekrutmen Online PPSU</h2>
                    <hr style="width: 150px;">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2" style="text-align:justify; line-height: 22px;">
                    <p> Pihak Kelurahan Pondok Kopi dan PemProv DKI Jakarta menyediakan rekrutmen PPSU secara <i>online</i>. Diharapkan proses rekrutmen PPSU dapat berjalan cepat
                        dan bisa dilakukan dimanapun dan kapanpun selama sesi rekrutmen <i>online</i> PPSU dibuka. </p>
                </div>
                <div class="col-lg-4" style="text-align:justify; line-height: 22px;">
                    <p>Para pelamar petugas PPSU bisa mengakses website rekrutmen <i>online</i> <?php echo $user['nama_lengkap']; ?> untuk mengikuti rekrutmen. Dalam pelaksanaan rekrutmen PPSU <i>online</i>, mohon diperhatikan data yang dibutuhkan yang nantinya akan dipakai dalam proses rekrutmen.</p>
                </div>
                <div class="col-lg-8 col-lg-offset-2 text-center page-scroll">
                    <a href="#page-top" class="btn btn-warning" style="border-radius: 5px;">
                        <i class="fa fa-home "></i> REKRUTMEN ONLINE PPSU
                    </a> &nbsp;&nbsp;

                </div>
            </div>
        </div>
    </section>


    <section id="syarat" style="background: url(img/bg.png) repeat; padding: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Syarat Administrasi</h2>
                    <hr style="width: 150px;">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top:-10px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <img class="img-responsive" src="img/syarat.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="success" id="contact" style="padding: 30px; border-top: solid 2px #fff;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Kontak Kami</h2>
                    <hr style="width: 150px;">
                </div>
                <div class="col-lg-12" style="margin-top:-10px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <h4 align="center">Rekrutmen Online &copy; <?php echo $user['nama_lengkap']; ?><br><?php echo $user['alamat']; ?></h4>
                        <p align="center" style="font-size: 14px;">
                            <span><b><i class="fa fa-phone-square">&nbsp;</i> <?php echo $user['telp']; ?></b></span><br>
                            <span><b><i class="fa fa-envelope">&nbsp;</i> <?php echo $user['email']; ?></b></span><br>
                            <span><b><i class="fa fa-globe">&nbsp;</i> <?php echo $user['website']; ?></b></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Rekrutmen Online &copy; <?php echo $user['nama_lengkap']; ?> - <?php echo date('Y'); ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-default" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- jQuery -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="assets/js/jqBootstrapValidation.js"></script>
    <script src="assets/js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="assets/js/freelancer.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
</body>

</html>