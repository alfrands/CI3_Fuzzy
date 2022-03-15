<style>
  #tbl_input {
    width: 50px;
    text-align: center;
  }

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
              <legend class="text-bold"><i class="icon-user"></i> Biodata Anda</legend>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <tr>
                    <th width="20%">Kode Pendaftaran</th>
                    <th width="1%">:</th>
                    <td><?php echo $user->id_pendaftaran; ?></td>
                  </tr>
                  <tr>
                    <th>No. KK</th>
                    <th>:</th>
                    <td><?php echo $user->no_kk; ?></td>
                  </tr>
                  <tr>
                    <th>No. KTP</th>
                    <th>:</th>
                    <td><?php echo $user->no_ktp; ?></td>
                  </tr>
                  <tr>
                    <th>Nama Lengkap</th>
                    <th>:</th>
                    <td><?php echo ucwords($user->nama_lengkap); ?></td>
                  </tr>
                  <tr>
                    <th>Jenis Kelamin</th>
                    <th>:</th>
                    <td><?php echo $user->jenis_kelamin; ?></td>
                  </tr>
                  <tr>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>:</th>
                    <td><?php echo $user->ttl; ?></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <th>:</th>
                    <td><?php echo $user->alamat_rumah; ?>  <?php echo $user->desa; ?> <?php echo $user->kec; ?> <?php echo $user->kab; ?> <?php echo $user->kode_pos; ?></td>
                  </tr>
                </table>
              </div>
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
              <?php echo $user->tgl_pendaftaran; ?>
              <hr>
              <b>Kode Pendaftaran : </b><?php echo $user->id_pendaftaran; ?>
            </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /dashboard content -->
