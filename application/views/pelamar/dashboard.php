<?php
$cek    = $user;

$nama    = $cek->nama_lengkap;
$status_pen = $cek->status_pendaftaran;
$tgl = date('m-Y');
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
$user = $this->db->get('tbl_pendaftaran')->row_array();
?>
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">
    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <!-- /basic datatable -->
      <div class="row">
        <div class="col-lg-12">
          <?php if ($cek->status_pendaftaran == 'lulus') { ?>
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <i class="glyphicon glyphicon-send"></i> INFO REKRUTMEN
                </h3>
              </div>
              <div class="panel-body">
                <h3>
                  <center>
									Selamat <b><?php echo $nama; ?></b> <span class="label label-success" style="font-size:20px;">Lulus</span> Seleksi Sebagai PELAMAR PETUGAS PPSU , Silahkan Cetak Surat Pengumuman Sebagai Bukti Lulus Seleksi.
                    <hr>
                    <a href="Ctrl_pelamar/cetak_lulus" class="btn btn-success btn-lg" target="_blank"><i class="icon-printer4"></i> Cetak Bukti Lulus</a>
                  </center>
                </h3>
              </div>
            </div>
          <?php } elseif ($cek->status_pendaftaran == 'tidak lulus') { ?>
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <i class="glyphicon glyphicon-send"></i> INFO REKRUTMEN
                </h3>
              </div>
              <div class="panel-body" style="color:red">
                <h3>
                  <center>
                    Mohon Maaf <b><?php echo $nama; ?></b>
                    <span class="label label-danger" style="font-size:20px;">Tidak Lulus</span> <br>
                    Sebagai Pelamar Petugas PPSU <b><?php echo $user['nama_lengkap']; ?></b>.
                  </center>
                  <br>
                </h3>
              </div>
            </div>
          <?php } else { ?>
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title"><b>
                    <i class="glyphicon glyphicon-send"></i> INFO REKRUTMEN</b>
                </h3>
              </div>
              <div class="panel-body">
                <h3>
                  <left>Proses pendaftaran telah selesai, silakan mengirim berkas administrasi dengan klik tanda "KIRIM BERKAS ADMINISTRASI" di bawah ini</left>
                </h3>
              </div>
            </div>
          <?php } ?>
          <!-- Quick stats boxes -->
          <div class="row">
            <div class="col-lg-4">
              <!-- Current server load -->
              <center>
                <a href="Ctrl_pelamar/biodata">
                  <div class="panel bg-green">
                    <div class="panel-body">
                      <div class="heading-elements">
                        <span class="heading-text"></span>
                      </div>
                      <h1 class="no-margin">
                        <i class="icon-file-check2" style="font-size:100px;"></i>
                      </h1>
                      <br><b>BIODATA</b>
                    </div>
                  </div>
                </a>
              </center>
              <!-- /current server load -->
            </div>

            <div class="col-lg-4">
              <!-- Current server load -->
              <center>
                <a href="Ctrl_pelamar/cetak" target="_blank">
                  <div class="panel bg-teal-400">
                    <div class="panel-body">
                      <div class="heading-elements">
                        <span class="heading-text"></span>
                      </div>
                      <h1 class="no-margin">
                        <i class="icon-printer2" style="font-size:100px;"></i>
                      </h1>
                      <br><b>DOWNLOAD SYARAT BERKAS ADMINISTRASI</b>
                    </div>
                  </div>
                </a>
              </center>
              <!-- /current server load -->
            </div>

            <?php if ($cek->status_pendaftaran == 'tidak lulus') { ?>
            <div class="col-lg-4">
              <center>
                <a href="Ctrl_pelamar/form_upload">
                  <div class="panel bg-orange-400">
                    <div class="panel-body">
                      <div class="heading-elements">
                        <span class="heading-text"></span>
                      </div>
                      <h1 class="no-margin">
                        <i class="icon-file-download2" style="font-size:100px;"></i>
                      </h1>
                      <br><b>KIRIM BERKAS ADMINISTRASI</b>
                    </div>
                  </div>
                </a>
              </center>
            </div>
          </div>
          <!-- /quick stats boxes -->
          <?php } else { ?>

            <?php } ?>
            
        </div>
      </div>
    </div>
    <!-- /dashboard content -->
