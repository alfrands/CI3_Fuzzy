<style>
    .obox {
        min-width: 20%;
        min-height: 50%;
    }
</style>
<header>
        <?php
        if (strtolower($this->uri->segment(1)) == 'log_in') {
            $this->load->view('front-end/loginadmin');
        }?>
<div class="layer"></div>
<div class="obox">
    <div class="row">
        <div class="col-lg-12">
            <div class="intro-text">
                <div class="col-md-12 bg-success hbox">
                    <span class="boxtext"><i class="fa fa-user"></i></span>
                    <span class="pull-right" style="margin-top:10px;font-size:16px">
                        <a href=""><i class="fa fa-times" style="color:#fff"></i></a></span>
                </div>
                <h4 class="text-danger"><br><br><br>
                    <img src="img/jayaraya.png" width="60">
                    Login Pelamar Petugas PPSU
                </h4>
                <div class="col-md-12">
                    <span class="text-warning">Masukkan nama lengkap dan nomor Kartu Tanda Penduduk (KTP) Anda</span>
                </div>
                <div class="col-md-12" style="margin-top:20px">
                    <?php
                    echo $this->session->flashdata('msg');
                    ?>
                    <span class="text-danger"><b>MASUKKAN</b></span>
                    <form action="login_pelamar" method="post">
                        <div class="form-group" style="padding-left:15px;padding-right:15px">
                            <input type="text" name="nama_lengkap" class="inp" placeholder="NAMA LENGKAP" required="true" autofocus />
                        </div>
                        <div class="form-group has-feedback" style="margin-top:-20px;padding-left:15px;padding-right:15px">
                            <input type="text" maxlength="16" name="no_ktp" class="inp" placeholder="NO. KTP" required="true" />
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="" style="color:#fff;float:left;" class="btn btn-warning"><i class="fa fa-remove margin-r-5"></i> Cancel</a>
                                <a class="btn btn-success" href="Ctrl_admin/log_in" style="color:#fff;float:center;"><i class="fa fa-user-plus"></i> Login Admin & Tim</a>
                                <button type="submit" name="btnlogin" style="color:#fff;float:right;" class="btn btn-danger"><i class="fa fa-sign-in margin-r-5"></i> Go</button>
                            </div><!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    </header>
