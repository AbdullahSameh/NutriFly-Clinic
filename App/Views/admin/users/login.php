<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin Panel | Login</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo reach('adminpanel/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo reach('adminpanel/bower_components/font-awesome/css/font-awesome.min.css') ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo reach('adminpanel/bower_components/Ionicons/css/ionicons.min.css') ?>">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo reach('adminpanel/dist/css/AdminLTE.min.css') ?>">
	<!-- iCheck -->
	<link rel="stylesheet" href="<?php echo reach('adminpanel/plugins/iCheck/square/blue.css') ?>">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<a href="<?php echo url('/admin/login'); ?>"><b>NutriFly Clinic</b></a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>

			<form id="login-form" action="<?php echo url('/admin/login/submit'); ?>" method="post">
				<?php if ($errors) { ?>
					<div class="alert alert-danger"><?php echo implode('<br>', $errors) ?></div>
				<?php } ?>
				<div id="login-result"></div>
				<div class="form-group has-feedback">
					<input type="email" class="form-control" placeholder="Email" name="email" >
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password" name="password" >
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<!-- <div class="col-xs-8">
						<div class="checkbox icheck">
							<label>
							<input type="checkbox" name="remember"> Remember Me
							</label>
						</div>
					</div> -->
					<!-- /.col -->
					<div class="col-xs-4 pull-right">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<script src="<?php echo reach('adminpanel/bower_components/jquery/dist/jquery.min.js') ?>"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo reach('adminpanel/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
	<!-- iCheck -->
	<script src="<?php echo reach('adminpanel/plugins/iCheck/icheck.min.js') ?>"></script>
	<script>
		$(function () {
			var flag = false;
			$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' /* optional */
			});

			/*loginResults = $('#login-result');

			$('#login-form').on('submit', function(e) {
				e.preventDefault();

				if (flag === true) {
		            return false;
		        }
				form = $(this);
				requestUrl = form.attr('action');
				requestMethod = form.attr('method');
				requestData = form.serialize();
				$.ajax({
					url: requestUrl,
					type: requestMethod,
					data: requestData,
					dataType: 'json',
					beforeSend: function () {
						flag = true;
						$('button').attr('disabled', true);
						loginResults.removeClass().addClass('alert alert-info').html('Logging...');
					},
					success: function (results) {
						if (results.errors) {
							loginResults.removeClass().addClass('alert alert-danger').html(results.errors);
							$('button').removeAttr('disabled');
							flag = false;
						} else if (results.success) {
							loginResults.removeClass().addClass('alert alert-success').html(results.success);
							if (results.redirect) {
								window.location.href = results.redirect;
							}
						}
					}
				});
			});*/
		});
	</script>
</body>
</html>
