<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap Core CSS -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/faa.css" rel="stylesheet">
    <!-- Theme CSS -->
    <link href="assets/css/freelancer.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<style>
    .obox {
        min-width: 20%;
        min-height: 50%;
    }
</style>
<body id="page-top" class="loginadmintim">
    
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
                    Login Admin & Tim Rekrutmen Petugas PPSU
                </h4>
                <div class="col-md-12">
                    <span class="text-warning">Masukkan username dan password Anda</span>
                </div>
				<?php
                    echo $this->session->flashdata('msg');
                    ?>
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
                <div class="col-md-12" style="margin-top:20px">
                    <span class="text-danger"><b>MASUKKAN</b></span>
                    <form action="Ctrl_admin/log_in" method="post">
                        <div class="form-group" style="padding-left:15px;padding-right:15px">
                            <input type="username" name="username" class="inp" placeholder="USERNAME" required="true" autofocus />
                        </div>
                        <div class="form-group has-feedback" style="margin-top:-20px;padding-left:15px;padding-right:15px">
                            <input type="password" name="password" class="inp" placeholder="PASSWORD" required="true" />
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <a href="" style="color:#fff;float:left;" class="btn btn-warning"><i class="fa fa-remove margin-r-5"></i> Cancel</a>
                                <button type="submit" name="btnlogin" style="color:#fff;float:right;" class="btn btn-danger"><i class="fa fa-sign-in margin-r-5"></i> Go</button>
                            </div><!-- /.col -->
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>
<?php

?>
