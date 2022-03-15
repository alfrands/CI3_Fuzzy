<?php
defined('BASEPATH') or exit('No direct script access allowed');
$id = $this->db->get('tbl_user')->row_array();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title><?php echo $judul_web; ?></title>
  <base href="<?php echo base_url(); ?>" />
  <link rel="icon" type="image/png" href="img/jayaraya.png" />
  <style>
    table {
      border-collapse: collapse;
    }

    thead>tr {
      background-color: #0070C0;
      color: #f1f1f1;
    }

    thead>tr>th {
      background-color: #0070C0;
      color: #fff;
      padding: 10px;
      border-color: #fff;
    }

    th,
    td {
      padding: 2px;
    }

    th {
      color: #222;
    }

    body {
      font-family: Calibri;
    }
  </style>
</head>

<body onload="window.print();">
  <?php $this->load->view('kop_lap'); ?>
  <h4 align="center" style="margin-top:0px;"><u>BUKTI PENDAFTARAN</u></h4>
  <b>
    <center>
      TIM PENYELENGGARA REKRUTMEN <br>
      <?php echo $id['nama_lengkap']; ?> 2021</center>
  </b>
  <br>

  <table width="100%" border="0">
    <tr>
      <td width="200">KODE PENDAFTARAN</td>
      <td width="1">:</td>
      <td><?php echo $user->id_pendaftaran; ?></td>
    </tr>
    <tr>
      <td>TANGGAL PENDAFTARAN </td>
      <td>:</td>
      <td><?php echo $user->tgl_pendaftaran; ?></td>
    </tr>
    <tr>
      <td>TANGGAL CETAK </td>
      <td>:</td>
      <td><?php echo $this->lib_data->tgl_id(date('d-m-Y')); ?></td>
    </tr>
    <tr>
      <td>No. KK</td>
      <td>:</td>
      <td><?php echo $user->no_kk; ?></td>
    </tr>
    <tr>
      <td>No. KTP</td>
      <td>:</td>
      <td><?php echo $user->no_ktp; ?></td>
    </tr>
    <tr>
      <td>NAMA LENGKAP</td>
      <td>:</td>
      <td><?php echo ucwords($user->nama_lengkap); ?></td>
    </tr>
    <tr>
      <td>JENIS KELAMIN</td>
      <td>:</td>
      <td><?php echo $user->jenis_kelamin; ?></td>
    </tr>
    <tr>
      <td>TEMPAT, TANGGAL LAHIR</td>
      <td>:</td>
      <td><?php echo $user->ttl; ?></td>
    </tr>
		<tr>
      <td>ALAMAT</td>
      <td>:</td>
      <td><?php echo $user->alamat_rumah; ?></td>
    </tr>
  </table>
  <br>

  <div style="float:right;">
    <?php echo $id['kabupaten']; ?>, <?php echo $this->lib_data->tgl_id(date('d-m-Y')); ?> <br>
    Ketua Tim Penyelenggara Rekrutmen PPSU <br>
    <img src="img/ttd.png" alt="" width="100"><br>
    <b><u><?php echo $id['ketua_panitia']; ?></u></b><br>
    NIP. <?php echo $id['nip_ketua']; ?>
  </div>
  <br><br><br><br><br><br><br><br><br>

  <b><u>Siapkan berkas berikut ketika Anda melakukan PENGIRIMAN BERKAS ADMINISTRASI :</u></b>
  <br>
  <table width="100%" border="0" style="margin-left:5px;">
    <tr>
      <td width="1">1.</td>
      <td>Foto Kartu Tanda Penduduk (KTP)</td>
      <td width="1">:</td>
      <td>1 buah</td>
    </tr>
    <tr>
      <td>2.</td>
      <td>Foto Kartu Keluarga (KK)</td>
      <td>:</td>
      <td>1 buah</td>
    </tr>
    <tr>
      <td>3.</td>
      <td>Surat pernyataan tidak sedang menjabat sebagai pengurus RT, RW, LMK, dan FKDM </td>
      <td>:</td>
      <td>1 lembar</td>
    </tr>
  </table>

</body>

</html>
