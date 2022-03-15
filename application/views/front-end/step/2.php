<div class="panel">
  <div class="panel-heading" style="background: #fd9a05; color: honeydew;">
    <h2 align="center" style="margin-top: 10px;">FORM ISIAN<br><b>IDENTITAS DIRI PELAMAR PETUGAS PPSU</b> </h2>
    <!-- <hr> -->
  </div>
  <div class="panel-body">

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nomor Pendaftaran <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="id_pendaftaran" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="30" placeholder="Nomor Pendaftaran" data-parsley-group="block1" data-parsley-errors-container='div[id="error-nis"]' value="<?= $id_pendaftaran; ?>" readonly required>
        <i class="fa fa-users" style="margin-left:15px;"></i>
        <div id="error-nis" style=" background:#FFBABA; color: #D8000C; width:auto; padding-left:10px; font-size: 10px;"></div>
        <div id="pesan_komentar">*Jangan mengganti isian ini.</div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Nama Lengkap <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="nama_lengkap" class="form-control bg-blue" placeholder="Nama Lengkap" maxlength="100" data-parsley-group="block1" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-nama_lengkap"]' required>
        <i class="fa fa-user" style="margin-left:15px;"></i>
        <div id="error-nama_lengkap" style=" background:#FFBABA; color: #D8000C; width:auto; padding-left:10px; font-size: 10px;"></div>
        <div id="pesan_komentar">*Sesuai dengan akte kelahiran/ijazah</div>
      </div>
    </div>

    
    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">No. KK <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="no_kk" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="16" placeholder="Nomor Kartu Keluarga" data-parsley-group="block1" data-parsley-errors-container='div[id="error-nisn"]'>
        <i class="fa fa-users" style="margin-left:15px;"></i>
        <div id="error-nisn" style=" background:#FFBABA; color: #D8000C; width:auto; padding-left:10px; font-size: 10px;"></div>
        <div id="pesan_komentar">*Sesuai dengan nomor Kartu Keluarga (KK) yang terdaftar </div>
      </div>
    </div>

    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">No. KTP <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon" style="margin-top:1px;">
        <input type="text" name="no_ktp" class="form-control bg-blue class" onkeypress="return hanyaAngka(this);" maxlength="16" placeholder="Nomor Kartu Tanda Penduduk" data-parsley-group="block1" data-parsley-errors-container='div[id="error-nisn"]'>
        <i class="fa fa-users" style="margin-left:15px;"></i>
        <div id="error-nisn" style=" background:#FFBABA; color: #D8000C; width:auto; padding-left:10px; font-size: 10px;"></div>
        <div id="pesan_komentar">*Sesuai dengan Kartu Tanda Penduduk (KTP)/Nomor Induk Kependudukan (NIK) di Kartu Keluarga (KK)</div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:-3px">Jenis Kelamin <span class="text-danger">*</span></label>
      <div class="col-sm-9">
        <div class="radio" style="margin-top:3px;margin-left:-20px;">
          <label>
            <input type="radio" value="Laki-Laki" name="jk" data-parsley-group="block1" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error"]' required> <i class="fa fa-male"></i> &nbsp;Laki-laki
          </label>
        </div>
        <div class="radio" style="margin-left:-20px;">
          <label>
            <input type="radio" value="Perempuan" name="jk" data-parsley-group="block1" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="condition-error"]' required> <i class="fa fa-female"></i> &nbsp;Perempuan
          </label>
        </div>
        <div id="condition-error" style=" background:#FFBABA; color: #D8000C; width:auto; padding-left:10px; font-size: 10px;"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Tempat Kelahiran <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="tempat_lahir" class="form-control bg-blue class" placeholder="Tempat Kelahiran Calon Siswa" data-parsley-group="block1" data-parsley-errors-container='div[id="error-tempat_lahir"]' required>
        <i class="fa fa-building" style="margin-left:15px;"></i>
        <div id="error-tempat_lahir" style=" background:#FFBABA; color: #D8000C; width:auto; padding-left:10px; font-size: 10px;"></div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Kelahiran <span class="text-danger">*</span></label>
      <div class="col-sm-9" style="margin-top:3px;">
        <div class="col-sm-4" style="padding:0px">
          <select class="form-control bg-blue class" name="tgl_lahir" data-parsley-group="block1" data-parsley-errors-container='div[id="error-tgl_lahir"]' required>
            <option value="" selected>Pilih Tanggal</option>
            <?php for ($i = 1; $i <= 31; $i++) {
              if ($i < 10) {
                $i = "0" . $i;
              } ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
          </select>
          <div id="error-tgl_lahir" style=" background:#FFBABA; color: #D8000C; width:auto; padding-left:10px; font-size: 10px;"></div>
        </div>

        <div class="col-sm-4" style="padding-left:3px;">
          <select class="form-control bg-blue class" data-placeholder="Pilih Bulan" name="bln_lahir" data-parsley-group="block1" data-parsley-errors-container='div[id="error-bln_lahir"]' required>
            <option value="" selected>Pilih Bulan</option>
            <option value="01">Januari</option>
            <option value="02">Februari</option>
            <option value="03">Maret</option>
            <option value="04">April</option>
            <option value="05">Mei</option>
            <option value="06">Juni</option>
            <option value="07">Juli</option>
            <option value="08">Agustus</option>
            <option value="09">September</option>
            <option value="10">Oktober</option>
            <option value="11">November</option>
            <option value="12">Desember</option>
          </select>
          <div id="error-bln_lahir" style=" background:#FFBABA; color: #D8000C; width:auto; padding-left:10px; font-size: 10px;"></div>
        </div>

        <div class="col-sm-4" style="margin-left:-27px;">
          <select class="form-control bg-blue class" data-placeholder="Pilih Tahun Lahir" name="thn_lahir" data-parsley-group="block1" data-parsley-errors-container='div[id="error-thn_lahir"]' required>
            <option value="" selected>Pilih Tahun Lahir</option>
            <?php
            $thn_max = date('Y') - 2;
            for ($i = 1990; $i <= $thn_max; $i++) { ?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
          </select>
          <div id="error-thn_lahir" style=" background:#FFBABA; color: #D8000C; width:auto; padding-left:10px; font-size: 10px;"></div>
        </div>
      </div>
    </div>
    
    <div class="form-group" style="padding-bottom:30px;">
      <label class="col-sm-3 control-label" style="text-align:right; margin-top:6px">Alamat <span class="text-danger">*</span></label>
      <div class="col-sm-9 prepend-icon">
        <input type="text" name="alamat_rumah" class="form-control bg-blue" placeholder="Alamat rumah" maxlength="100" data-parsley-group="block2" data-radio="iradio_square-blue" data-parsley-errors-container='div[id="error-alamat_pelamar"]' required>
        <i class="fa fa-home" style="margin-left:15px;"></i>
        <div id="error-alamat_pelamar" style=" background:#FFBABA;color: #D8000C; width:auto;border-radius:5px;padding-left:10px;"></div>
        <div id="pesan_komentar">*Alamat diisi sesuai dengan KTP</div>
      </div>
    </div>
  </div>
</div>
