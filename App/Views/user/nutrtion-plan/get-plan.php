<div class="profile">
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h3><?php echo lang('get-nutrtion-plan'); ?></h3>
			</div>
			<div class="card-body">
				<?php if ($success) { ?>
				<div class="alert alert-success alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php echo $success; ?>
				</div>
				<?php } ?>
				<?php if ($errors) { ?>
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<?php 
						foreach ($errors as $error) {
							echo '* ' . $error . '<br>';
						} 
					?>
				</div>
				<?php } ?>
				<h4 class=""><?php echo lang('nutrtion-plan-data'); ?></h4>
				<form action="<?php echo url('/nutrtion-plan/send-plan'); ?>" method="POST">
					<div class="row form-group">
						<div class="col-sm-6">
							<label><?php echo lang('first-name'); ?></label>
							<input class="form-control" type="text" placeholder="<?php echo lang('first-name'); ?>" name="first_name" value="<?php echo $user->first_name; ?>">
						</div>
						<div class="col-sm-6">
							<label><?php echo lang('last-name'); ?></label>
							<input class="form-control" type="text" placeholder="<?php echo lang('last-name'); ?>" name="last_name"  value="<?php echo $user->last_name; ?>">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-sm-6">
							<label><?php echo lang('gender'); ?></label>
							<select class="form-control" name="gender">
								<option value="male" <?php if ($user->gender == 'male') {echo 'selected';} ?>><?php echo lang('male'); ?></option>
								<option value="female" <?php if ($user->gender == 'female') {echo 'selected';} ?>><?php echo lang('female'); ?></option>
							</select>
						</div>
						<div class="col-sm-6">
							<label><?php echo lang('email'); ?></label>
							<input class="form-control" type="email" placeholder="<?php echo lang('email'); ?>" name="email"  value="<?php echo $user->email; ?>">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-6">
							<label><?php echo lang('age'); ?></label>
							<input type="text" class="form-control" name="age" placeholder="<?php echo lang('age'); ?>">
						</div>
						<div class="col-md-6">
							<label><?php echo lang('height'); ?></label>
							<input type="text" class="form-control" name="height" placeholder="<?php echo lang('height-desc'); ?>">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-6">
							<label><?php echo lang('carrent-weight'); ?></label>
							<input type="text" class="form-control" name="carrent_weight" placeholder="<?php echo lang('carrent-weight-desc'); ?>">
						</div>
						<div class="col-md-6">
							<label><?php echo lang('desired-weight'); ?></label>
							<input type="text" class="form-control" name="desired_weight" placeholder="<?php echo lang('desired-weight-desc'); ?>">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-6">
							<label><?php echo lang('mobile'); ?></label>
							<input type="text" class="form-control" name="mobile" placeholder="<?php echo lang('mobile'); ?>">
						</div>
						<div class="col-md-6">
							<label><?php echo lang('mobile2'); ?></label>
							<input type="text" class="form-control" name="mobile2" placeholder="<?php echo lang('mobile2'); ?>">
						</div>
					</div>
					<div class="form-group">
						<label><?php echo lang('health-status'); ?></label>
						<textarea class="form-control" name="health_status" placeholder="<?php echo lang('health-status-desc'); ?>"></textarea>
					</div>
					<button class="second-btn" type="submit"><?php echo lang('send-nutrtion-data'); ?></button>
				</form>
			</div> <!-- .card-body -->
		</div> <!-- .card -->
	</div> <!-- .container -->
</div> <!-- .profile -->