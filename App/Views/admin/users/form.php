	<!-- Modal -->
	<div class="modal fade" id="<?php echo $target; ?>" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><?php echo $heading; ?></h4>
				</div>
				<div class="modal-body">
					<form class="form-modal" action="<?php echo $action ?>">
						<div id="form-results">
							<!-- errors results here -->  
						</div>
						<div class="form-group col-sm-6">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name"  placeholder="First Name" value="<?php echo $first_name ?>">
						</div>
						<div class="form-group col-sm-6">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name"  placeholder="Last Name" value="<?php echo $last_name ?>">
						</div>
						<div class="form-group col-sm-6">
							<label>Gender</label>
							<select class="form-control" name="country">
								<option value="egypt" <?php if ($country == 'egypt') {echo 'selected';} ?>>Egypt</option>
								<option value="united arab emirates" <?php if ($country == 'united arab emirates') {echo 'selected';} ?>>United Arab Emirates</option>
								<option value="saudi arabia" <?php if ($country == 'saudi arabia') {echo 'selected';} ?>>Saudi Arabia</option>
								<option value="kuwait" <?php if ($country == 'kuwait') {echo 'selected';} ?>>Kuwait</option>
								<option value="bahrain" <?php if ($country == 'bahrain') {echo 'selected';} ?>>Bahrain</option>
								<option value="oman" <?php if ($country == 'oman') {echo 'selected';} ?>>Oman</option>
								<option value="qatar" <?php if ($country == 'qatar') {echo 'selected';} ?>>Qatar</option>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label>Email</label>
							<input type="email" class="form-control" name="email"  placeholder="Your Email" value="<?php echo $email ?>">
						</div>
						<div class="form-group col-sm-12">
							<label>Group</label>
							<select class="form-control" name="users_group_id">
								<?php foreach ($usersGroups as $userGroup) { ?>
								<option value="<?php echo $userGroup->id ?>" <?php echo $users_group_id == $userGroup->id ? 'selected' : false; ?>>
									<?php echo $userGroup->name ?>
								</option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label>Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						<div class="form-group col-sm-6">
							<label>Confirm Password</label>
							<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
						</div>
						<div class="form-group col-sm-6">
							<label>Gender</label>
							<select class="form-control" name="gender">
								<option value="male">Male</option>
								<option value="female" <?php echo $gender == 'female' ? 'selected' : false; ?>>Female</option>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label>Birthday</label>
							<input type="text" class="form-control" name="birthday" placeholder="Birthday" value="<?php echo $birthday ?>">
						</div>
						<div class="form-group col-sm-6">
							<label>Image</label>
							<input type="file" class="form-control" name="image" value="<?php echo $image ?>">
						</div>
						<?php if ($image) { ?>
						<div class="text-center form-group col-sm-6">
							<img style="max-height: 80px; max-width: 80px; border-radius: 50%;" src="<?php echo $image ?>">
						</div>
						<?php } ?>
						<div class="form-group col-sm-12">
							<button class="btn btn-info submit-btn">Submit</button>
						</div>
						<div class="box-footer clearfix"></div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>