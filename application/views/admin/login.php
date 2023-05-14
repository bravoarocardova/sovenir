<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Sistem Penjualan Sovenir Fiqi</title>
	<!-- BOOTSTRAP STYLES-->
	<link href="<?= base_url() ?>assets/css/bs3/bootstrap.css" rel="stylesheet" />
	<!-- FONTAWESOME STYLES-->
	<link href="<?= base_url() ?>assets/fontawesome/css/fontawesome.min.css" rel="stylesheet" />
	<!-- CUSTOM STYLES-->
	<link href="<?= base_url() ?>assets/css/bs3/custom.css" rel="stylesheet" />
	<!-- GOOGLE FONTS-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>

<body>
	<div class="container">
		<div class="row text-center ">
			<div class="col-md-12">
				<br /><br />
				<h2> Sovenir Fiqi Login</h2>

				<h5>( Masuk untuk mendapatkan akses )</h5>
				<br />
			</div>
		</div>
		<div class="row ">

			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Enter Details To Login </strong>
					</div>
					<div class="panel-body">
						<form role="form" method="post" action="<?= base_url('admin/auth/proses') ?>">
							<br />
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fas fa-plus"></i></span>
								<input type="text" class="form-control" placeholder="User" name="user" />
							</div>
							<div class="form-group input-group">
								<span class="input-group-addon"><i class="fa fa-lock"></i></span>
								<input type="password" class="form-control" placeholder="Password" name="pass" />
							</div>
							<div class="form-group">
								<label class="checkbox-inline">
									<input type="checkbox" /> Remember me
								</label>
								<span class="pull-right">
									<a href="#">Forget password ? </a>
								</span>
							</div>

							<button class="btn btn-primary" name="login">Login</button>
							<hr />
							<!-- Not register ? <a href="registeration.html">click here </a> -->
						</form>

					</div>

				</div>
			</div>


		</div>
	</div>


	<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<!-- JQUERY SCRIPTS -->
	<script src="<?= base_url() ?>assets/js/js3/jquery-1.10.2.js"></script>
	<!-- BOOTSTRAP SCRIPTS -->
	<script src="<?= base_url() ?>assets/js/js3/bootstrap.min.js"></script>
	<!-- METISMENU SCRIPTS -->
	<script src="<?= base_url() ?>assets/js/js3/jquery.metisMenu.js"></script>
	<!-- CUSTOM SCRIPTS -->
	<script src="<?= base_url() ?>assets/js/js3/custom.js"></script>

</body>

</html>