<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login || Register</title>
    <link rel="stylesheet" href="<?php echo reach('layout/css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo reach('layout/css/fontawesome-all.min.css') ?>"/>
    <link rel="stylesheet" href="<?php echo reach('layout/css/front-end.css') ?>"/>
</head>
<body>
	
        <div class="container">
        <div class="register">
            <div class="logo text-center">
                <a href="<?php echo url('/') ?>"> <img class="img-fluid" src="<?php echo reach('layout/images/logo_login.png') ?>"> </a>
            </div>
            <div class="log-card">
                <div class="log-head text-center">
                    <div data-class="login" class="selected"><?php echo lang('login'); ?></div>
                    <div data-class="signup"><?php echo lang('signup'); ?></div>
                </div>
                <div class="log-body">
                    <form class="login" action="<?php echo url('/login/submit') ?>" method="POST">
                        <h5><?php echo lang('login-account'); ?></h5>
                        <?php echo csrf_field(); ?>
                        <input class="form-control" type="text" name="email" placeholder="<?php echo lang('email'); ?>" >  <!-- required="required" -->
                        <input class="form-control" type="password" name="password" placeholder="<?php echo lang('password'); ?>" >
                        <input class="second-btn" type="submit" value="<?php echo lang('log-in'); ?>">
                    </form>

                    <form class="signup" action="<?php echo url('/login/register') ?>" method="POST">
						<h5><?php echo lang('create-account'); ?></h5>
						<?php echo csrf_field(); ?>
						<div class="row">
							<div class="col-6">
								<input class="form-control" type="text" name="first_name" placeholder="<?php echo lang('first-name'); ?>" >
							</div>
							<div class="col-6">
								<input class="form-control" type="text" name="last_name" placeholder="<?php echo lang('last-name'); ?>" >
							</div>
						</div>
						<input class="form-control" type="text" name="email" placeholder="<?php echo lang('email'); ?>" >

						<input class="form-control" type="password" name="password" placeholder="<?php echo lang('password'); ?>" >

						<input class="form-control" type="text" name="birthday" placeholder="<?php echo lang('birthday'); ?>">

						<select class="form-control" name="country">
							<option value="egypt"><?php echo lang('eg'); ?></option>
							<option value="united arab Emirates"><?php echo lang('ae'); ?></option>
							<option value="saudi arabia"><?php echo lang('sa'); ?></option>
							<option value="kuwait"><?php echo lang('kw'); ?></option>
							<option value="bahrain"><?php echo lang('bh'); ?></option>
							<option value="oman"><?php echo lang('om'); ?></option>
							<option value="qatar"><?php echo lang('qa'); ?></option>
						</select>
						<select class="form-control" name="gender">
							<option value="male"><?php echo lang('male'); ?></option>
							<option value="female"><?php echo lang('female'); ?></option>
						</select>
						<input class="second-btn" type="submit" value="<?php echo lang('create-account'); ?>">
                    </form>
                </div> <!-- .log-body -->
            </div> <!-- .log-card -->
            <?php if ($success) { ?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<?php echo $success; ?>
			</div>
            <?php } elseif ($errors) { ?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<?php 
					foreach ($errors as $error) {
						echo $error . '<br>';
					} 
				?>
			</div>
        <?php } ?>
        </div> <!-- .register -->
    </div> <!-- .container -->

    <script src="<?php echo reach('layout/js/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?php echo reach('layout/js/popper.min.js') ?>"></script>
    <script src="<?php echo reach('layout/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo reach('layout/js/user-funcntion.js') ?>"></script>
</body>
</html>