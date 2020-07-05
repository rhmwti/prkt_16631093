<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Aplikasi Penjualan - Praktikum</title>

	<!-- Bootstrap Core CSS -->
	<link href="<?= base_url('assets/'); ?>css/bootstrap.min.css" rel="stylesheet">

	<!-- MetisMenu CSS -->
	<link href="<?= base_url('assets/'); ?>css/metisMenu.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?= base_url('assets/'); ?>css/startmin.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="<?= base_url('assets/'); ?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-panel panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Silakan Login</h3>
					</div>
					<div class="panel-body">
						<?php if (isset($error)) {
							echo $error;
						}; ?>
						<form role="form" method="POST" action="<?php echo base_url() ?>login">
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus>
								<?php echo form_error('username'); ?>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
								<?php echo form_error('password'); ?>
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<button class="btn btn-lg btn-success btn-block" name="btn-login" id="btn-login" type="submit">Masuk</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery -->
	<script src="<?= base_url('assets/'); ?>js/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="<?= base_url('assets/'); ?>js/metisMenu.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="<?= base_url('assets/'); ?>js/startmin.js"></script>

</body>

</html>