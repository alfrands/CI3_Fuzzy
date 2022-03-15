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
  <br>
  <h4 align="center" style="margin:0px;font-size:19px;"><u><b>S U R A T P E N G U M U M A N</b></u></h4>
  <center>
    No : <?php echo $id['no_surat']; ?>
  </center>

  <br>
  <table width="100%" border="0">
    <tr>
      <td colspan="3">Kepala <?php echo $id['nama_lengkap']; ?> dengan ini menyatakan bahwa :</td>
    </tr>
    <tr>
      <td width="200">KODE PENDAFTARAN</td>
      <td width="1">:</td>
      <td><?php echo $user->id_pendaftaran; ?></td>
    </tr>
    <tr>
      <td>NO. KK</td>
      <td>:</td>
      <td><?php echo $user->no_kk; ?></td>
    </tr>
    <tr>
      <td>NO. KTP</td>
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
      <td><?php echo $this->lib_data->tgl_id($user->ttl); ?></td>
    </tr>
  </table>
  <br>

  <center>
    <div style="border:1px solid black; color:green;width:30%;padding:10px;">
      <b style="font-size:20px;">L U L U S</b>
    </div>
  </center>
  <br>

  VERIFIKASI dan SELEKSI Sebagai PELAMAR <?php echo $id['nama_lengkap']; ?> Tahun : <?php echo $thn_ppdb; ?>/<?php echo $thn_ppdb + 1; ?>.<br>
  Demikian pengumuman ini disampaikan untuk dapat digunakan sebagai mestinya.
  <br><br>

  <div style="float:right;">
    <?php echo $id['kabupaten']; ?>, <?php echo $this->lib_data->tgl_id(date('d-m-Y')); ?> <br>
    Kepala Panitia, <br>
    <br>
    <img src="img/ttd_kepala.png" alt="" width="100"><br>
    <b><u><?php echo $id['ketua_panitia']; ?></u></b><br>
    NIP. <?php echo $id['nip_ketua']; ?>
  </div>
  <br><br><br><br><br><br><br><br><br><br>

  <?php echo $v_ket->ket_pengumuman; ?>

</body>

</html>
