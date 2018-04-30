<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<meta name="description" content="Sistem Informasi Penerimaan Karyawan Kemkominfo Provinsi Bangka Belitung">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/public/image/kominfo.png') ?>"/>
	<link rel="stylesheet" href="<?php echo base_url("assets/public/bootstrap/css/bootstrap.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/Kominfo/css/main.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/public/font-awesome/css/font-awesome.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("assets/public/dist/css/AdminLTE.min.css"); ?>">
	<link async href="http://fonts.googleapis.com/css?family=Passero%20One" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>

	  <script src="<?php echo base_url("assets/public/plugins/jQuery/jquery-2.2.3.min.js"); ?>"></script>
	  <script src="<?php echo base_url("assets/public/bootstrap/js/bootstrap.min.js"); ?>"></script>
	  <script type="text/javascript"> 
	      var current_url = '<?php echo current_url(); ?>';
	  </script>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Archivo+Black|Nunito');


		.blue-bg {
			background: #2B6BAF;
		}
		.white {
			color: white;
			font-size: 1.2em;
			text-shadow: 1px 0px 1px black;
		}
		

		.enjoy-css {
		  -webkit-box-sizing: content-box;
		  -moz-box-sizing: content-box;
		  box-sizing: content-box;
		  cursor: pointer;
		  border: none;
		  font: normal 2em/normal "arial", Helvetica, sans-serif;
		  color: rgba(255,255,255,1);
		  text-align: center;
		  -o-text-overflow: clip;
		  text-overflow: clip;
		  text-shadow: 0 1px 0 rgb(204,204,204) , 0 2px 0 rgb(201,201,201) , 0 3px 0 rgb(187,187,187) , 0 4px 0 rgb(185,185,185) , 0 5px 0 rgb(170,170,170) , 0 6px 1px rgba(0,0,0,0.0980392) , 0 0 5px rgba(0,0,0,0.0980392) , 0 1px 3px rgba(0,0,0,0.298039) , 0 3px 5px rgba(0,0,0,0.2) , 0 5px 10px rgba(0,0,0,0.247059) , 0 10px 10px rgba(0,0,0,0.2) , 0 20px 20px rgba(0,0,0,0.14902) ;
		  -webkit-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
		  -moz-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
		  -o-transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
		  transition: all 300ms cubic-bezier(0.42, 0, 0.58, 1);
		}

		.enjoy-css:hover {
		  color: #EEB715;
		  text-shadow: 0 1px 0 rgba(255,255,255,1) , 0 2px 0 rgba(255,255,255,1) , 0 3px 0 rgba(255,255,255,1) , 0 4px 0 rgba(255,255,255,1) , 0 5px 0 rgba(255,255,255,1) , 0 6px 1px rgba(0,0,0,0.0980392) , 0 0 5px rgba(0,0,0,0.0980392) , 0 1px 3px rgba(0,0,0,0.298039) , 0 3px 5px rgba(0,0,0,0.2) , 0 -5px 10px rgba(0,0,0,0.247059) , 0 -7px 10px rgba(0,0,0,0.2) , 0 -15px 20px rgba(0,0,0,0.14902) ;
		  -webkit-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1) 10ms;
		  -moz-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1) 10ms;
		  -o-transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1) 10ms;
		  transition: all 200ms cubic-bezier(0.42, 0, 0.58, 1) 10ms;
		}

		.shadow {
    		box-shadow: 2px 1px 10px black;
    		margin-top: -15px;
		}

		.text-shadow {
    		text-shadow: 2px 1px 2px  black;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
                <img src="<?php echo base_url("assets/public/image/info.png"); ?>" class="logo-head" alt="Logo" width="440">
			</div>
			<div class="col-md-1 pull-right" style="margin-top: 15px;">
				<a href="<?php echo base_url('login') ?>"><h3 class="profile-username text-center font-arial enjoy-css">Login</h3></a>
			</div>
			<div class="col-md-2 pull-right" style="margin-top: 15px; margin-left: 50px;">
				<a href="<?php echo base_url('daftar') ?>"><h3 class="profile-username text-center font-arial enjoy-css">Daftar</h3></a>
			</div>
			<div class="col-md-1 pull-right" style="margin-top: 15px; ">
				<a href="<?php echo base_url('main') ?>"><h3 class="profile-username text-center font-arial enjoy-css">Beranda</h3></a>
			</div>
		</div>
	
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-4 pull-right" >
				<div class="box box-primary shadow">
					<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
					<div class="box-body">
						<form  action="<?php echo current_url('daftar/create') ?>" method="POST" role="form">
							<div class="form-group">
								<label>Nama lengkap</label>
								<div class="input-group ">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									<input type="text" name="nama" value="<?php echo set_value('nama'); ?>" class="form-control pull-right" >
								</div>
								<p class="help-block"><?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?></p>
							</div>

							<div class="form-group">
								<label>Username</label>
								<div class="input-group ">
									<div class="input-group-addon">
										<i class="fa fa-user"></i>
									</div>
									<input type="text" name="username" value="<?php echo set_value('username'); ?>" class="form-control pull-right" >
								</div>
								<p class="help-block"><?php echo form_error('username', '<small class="text-danger">', '</small>'); ?></p>
							</div>

							<div class="form-group">
								<label>Email</label>
								<div class="input-group ">
									<div class="input-group-addon">
										<i class="fa fa-envelope"></i>
									</div>
									<input type="text" value="<?php echo set_value('email'); ?>" name="email" class="form-control pull-right">
								</div>
								<p class="help-block"><?php echo form_error('email', '<small class="text-danger">', '</small>'); ?></p>

							</div>

							<div class="form-group">
							<label>Password</label>
								<div class="input-group ">
									<div class="input-group-addon">
										<i class="fa fa-lock"></i>
									</div>
									<input type="password"  value="<?php echo set_value('password'); ?>" name="password" class="form-control pull-right">
								</div>
								<p class="help-block"><?php echo form_error('password', '<small class="text-danger">', '</small>'); ?></p>
							</div>

							<div class="form-group">
									<label>Konfirmasi Password</label>
									<div class="input-group ">
										<div class="input-group-addon"><i class="fa fa-lock"></i></div>
										<input type="password" value="<?php echo set_value('repeat_pass'); ?>" name="repeat_pass" class="form-control pull-right">
										
									</div>
									<p class="help-block"><?php echo form_error('repeat_pass', '<small class="text-danger">', '</small>'); ?></p>
							</div>

							<div class="form-group">
								<label>Ponsel</label>
								<div class="input-group ">
									<div class="input-group-addon">
										<i class="fa fa-phone"></i>
									</div>
									<input type="number" value="no_telp" name="no_telp" class="form-control pull-right">
								</div>
								<p class="help-block"><?php echo form_error('no_telp', '<small class="text-danger">', '</small>'); ?></p>
							</div>

							<div class="form-group">                
								<!-- <input type="submit" id="validateBtn" value="Daftar" name="signup" class="form-control btn btn-primary"> -->
								<button type="submit" class="btn btn-warning btn-block">Daftar</button>
							</div>
						</form>
					</div>

		            <div class="box-footer radius">
					    <div class="pull-left">
					   <!-- <a href="" class="text-orange">Pelajari</a> mengapa kami meminta informasi ini. -->
					    </div>
					</div><!-- /.box-footer-->
		       
			</div>
        </div> <!-- row animated -->
	</div>

<div class="navbar navbar-inverse navbar-fixed-bottom">
   <div class="container">
      <small class="navbar-text pull-left">&copy; Kementerian Komunikasi dan Informatikan Provinsi Kepuluan Bangka Belitung</small>
      <small class="navbar-text pull-right">Develop By 1422500233 - Yuranda</small>
   </div>
</div>	




<div class="modal animated fadeIn " id="modal-kontak" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title"><i class="fa fa-info-circle"></i> Kontak Kami!</h3>
                <span> </span>    
            </div>
            <div class="modal-body">
				<p>
					<b>Untuk info lebih lanjut dapat menghubungi Kami di :</b>
				</p>
				<p>
					Telepon : (0718) 7362017
				</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>

            </div>
        </div>
    </div>
</div>

</body>
</html>