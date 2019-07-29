<div class="profile">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="user-img">
						<?php if (empty($user->image)) { ?>
							<img src="<?php echo reach('upload/users/user.jpg') ?>">
						<?php } else { ?>
							<img src="<?php echo reach('upload/users/' . $user->image) ?>">
						<?php } ?>
						<h3 class="user-name"><?php echo $user->first_name . ' ' . $user->last_name; ?></h3>
						<p class="user-country">Egypt</p>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="card">
						<div class="card-header">
							<h3><?php echo lang('edit-profile'); ?></h3>
						</div>
						<div class="card-body">
							<?php if ($errors) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<?php echo implode('<br>' , $errors); ?>
							</div>
							<?php } ?>
							<form action="<?php echo url('/profile/update/' . $user->id) ?>" method="POST" enctype="multipart/form-data">
								<h5 class="head-card"><?php echo lang('personal-info'); ?></h5>
								<div class="row form-group">
									<div class="col-sm-6">
										<label><?php echo lang('first-name'); ?></label>
										<input class="form-control" type="text" name="first_name" value="<?php echo $user->first_name; ?>">
									</div>
									<div class="col-sm-6">
										<label><?php echo lang('last-name'); ?></label>
										<input class="form-control" type="text" name="last_name"  value="<?php echo $user->last_name; ?>">
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
										<label><?php echo lang('birthday'); ?></label>
										<input class="form-control" type="text" name="birthday"  value="<?php echo date('d-m-y', $user->birthday); ?>">
									</div>
								</div>
								<div class="form-group">
									<label><?php echo lang('country'); ?></label>
									<select class="form-control" name="country">
										<option <?php if ($user->country == 'Egypt') {echo 'selected';} ?>><?php echo lang('eg'); ?></option>
										<option <?php if ($user->country == 'United Arab Emirates') {echo 'selected';} ?>><?php echo lang('ae'); ?></option>
										<option <?php if ($user->country == 'Saudi Arabia') {echo 'selected';} ?>><?php echo lang('sa'); ?></option>
										<option <?php if ($user->country == 'Kuwait') {echo 'selected';} ?>><?php echo lang('kw'); ?></option>
										<option <?php if ($user->country == 'Bahrain') {echo 'selected';} ?>><?php echo lang('bh'); ?></option>
										<option <?php if ($user->country == 'Oman') {echo 'selected';} ?>><?php echo lang('om'); ?></option>
										<option <?php if ($user->country == 'Qatar') {echo 'selected';} ?>><?php echo lang('qa'); ?></option>
									</select>
								</div>
								<h5 class="head-card"><?php echo lang('account-info'); ?></h5>
								<div class="form-group" style="position: relative;">
									<label><?php echo lang('password'); ?></label>
									<input class="form-control" type="password" name="password" placeholder="Enter new password if you want to change old password">
									<button type="button" class="show-pass"><i class="fas fa-eye"></i></button>
								</div>
								<div class="form-group" style="position: relative;">
									<label><?php echo lang('confirm-password'); ?></label>
									<input class="form-control" type="password" name="confirm_password" placeholder="Enter Confirm Password if you want to change old password">
									<button type="button" class="show-pass"><i class="fas fa-eye"></i></button>
								</div>
								<div class="form-group">
									<label><?php echo lang('profile-img'); ?></label>
									<input class="form-control" type="file" name="image">
								</div>
								<input class="second-btn" type="submit" value="<?php echo lang('update-profile'); ?>">
							</form>
						</div> <!-- .card-body -->
					</div> <!-- .card -->
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- .profile -->