		<!-- Main Footer -->
		<footer class="main-footer">
		    <!-- To the right -->
		    <div class="pull-right hidden-xs">
		      Anything you want
		    </div>
		    <!-- Default to the left -->
		    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
		    <!-- Create the tabs -->
		    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
				<li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
				<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		    </ul>
		    <!-- Tab panes -->
		    <div class="tab-content">
				<!-- Home tab content -->
				<div class="tab-pane active" id="control-sidebar-home-tab">
					<h3 class="control-sidebar-heading">Recent Activity</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="javascript:;">
								<i class="menu-icon fa fa-birthday-cake bg-red"></i>
								<div class="menu-info">
									<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
									<p>Will be 23 on April 24th</p>
								</div>
							</a>
						</li>
					</ul>
					<!-- /.control-sidebar-menu -->
		        	<h3 class="control-sidebar-heading">Tasks Progress</h3>
					<ul class="control-sidebar-menu">
						<li>
							<a href="javascript:;">
								<h4 class="control-sidebar-subheading">
									Custom Template Design
									<span class="pull-right-container">
										<span class="label label-danger pull-right">70%</span>
									</span>
								</h4>
								<div class="progress progress-xxs">
									<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
								</div>
							</a>
						</li>
					</ul>
					<!-- /.control-sidebar-menu -->
				</div>
				<!-- /.tab-pane -->
				<!-- Stats tab content -->
				<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
				<!-- /.tab-pane -->
				<!-- Settings tab content -->
				<div class="tab-pane" id="control-sidebar-settings-tab">
					<form method="post">
						<h3 class="control-sidebar-heading">General Settings</h3>
						<div class="form-group">
							<label class="control-sidebar-subheading">
								Report panel usage
								<input type="checkbox" class="pull-right" checked>
							</label>
							<p>Some information about this general settings option</p>
						</div>
						<!-- /.form-group -->
					</form>
				</div>
				<!-- /.tab-pane -->
		    </div>
		</aside>
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed
		immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
	</div>
	<!-- ./wrapper -->

	<!-- Modal -->
	<!-- <div class="modal fade" id="user-profile" role="dialog">
		<div class="modal-dialog">
			Modal content
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Update User Profile</h4>
				</div>
				<div class="modal-body">
					<form class="form-modal" action="<?php echo url('/admin/profile/update') ?>">
						<div id="form-results">
							errors results here  
						</div>
						<div class="form-group col-sm-6">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name" value="<?php echo $user->first_name ?>" placeholder="First Name">
						</div>
						<div class="form-group col-sm-6">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name" value="<?php echo $user->last_name ?>" placeholder="Last Name">
						</div>
						<div class="form-group col-sm-6">
							<label>Gender</label>
							<select class="form-control" name="gender">
								<option value="male">Male</option>
								<option value="female" <?php echo $user->gender == 'female' ? 'selected': false; ?>>Female</option>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label>Email</label>
							<input type="email" class="form-control" name="email" value="<?php echo $user->email ?>" placeholder="Email">
						</div>
						<div class="form-group col-sm-6">
							<label>Password</label>
							<input type="password" class="form-control" name="password" placeholder="Password">
						</div>
						<div class="form-group col-sm-6">
							<label>Confirm Password</label>
							<input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
						</div>
						<div class="form-group col-sm-12">
							<label>Birthday</label>
							<input type="text" class="form-control" name="birthday" placeholder="Birthday" value="<?php echo date('d-m-y', $user->birthday) ?>">
						</div>
						<div class="form-group col-sm-6">
							<label>Image</label>
							<input type="file" class="form-control" name="image" value="<?php echo $user->image ?>">
						</div>
						<?php if ($user->image) { ?>
						<div class="text-center form-group col-sm-6">
							<img style="max-height: 80px; max-width: 80px; border-radius: 50%;" src="<?php echo reach('uploads/images/' . $user->image) ?>">
						</div>
						<?php } ?>
						<div class="form-group col-sm-12">
							<button class="btn btn-info submit-btn">Submit</button>
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div> -->

	<!-- jQuery 3 -->
	<script src="<?php echo reach('adminpanel/bower_components/jquery/dist/jquery.min.js') ?>"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="<?php echo reach('adminpanel/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo reach('adminpanel/dist/js/adminlte.min.js') ?>"></script>
	<!-- CKEditor -->
	<script src="<?php echo reach('adminpanel/js/ckeditor/ckeditor.js') ?>"></script>

	<script>
		$('.open-popup').on('click', function() {
			btn = $(this);
			url = btn.data('target');
			modalId = btn.data('modal-id');
			if ($(modalId).length > 0) {
				$(modalId).modal('show');
			} else {
				$.ajax({
					url: url,
					type: 'POST',
					success: function (html) {
						$('body').append(html);
						$(modalId).modal('show');
					}
				});
			}
			return false;
		});
		$(document).on('click', '.submit-btn', function(e) {
			e.preventDefault();
			btn = $(this);
			form = btn.parents('.form-modal');
			url = form.attr('action');
			data = new FormData(form[0]);
			formResults = form.find('#form-results');
			$.ajax({
				url: url,
				data: data,
				type: 'POST',
				dataType: 'json',
				beforeSend : function () {
					formResults.removeClass().addClass('alert alert-info').html('Loading...');
				},
				success: function (results) {
					if (results.errors) {
						formResults.removeClass().addClass('alert alert-danger').html(results.errors);
					} else if (results.success) {
						formResults.removeClass().addClass('alert alert-success').html(results.success);
					}
					if (results.redirectTo) {
						window.location.href = results.redirectTo;
					}
				},
				cache: false,
				processData: false,
				contentType: false,
			});
		});

		$('.delete').on('click', function(e) {
			e.preventDefault();
			delBtn = $(this);
			okDel = confirm('Are You Sure');

			if (okDel === true) {
				$.ajax({
					url: delBtn.data('target'),
					type: 'POST',
					dataType: 'json',
					beforeSend : function () {
						$('#delete-results').removeClass().addClass('alert alert-info').html('Deleting...');
					},
					success: function (results) {
						if (results.success) {
							$('#delete-results').removeClass().addClass('alert alert-success').html(results.success);
							tableRow = delBtn.parents('tr');
							tableRow.fadeOut(function() {
								tableRow.remove();
							});
						}
					},
				})
			} else {
				return false;
			}
		});
	</script>


	<!-- <script type="text/javascript">
		
		$(function () {
			// Set active to sidebar links
			var currentUrl = window.location.href;
			var segment = currentUrl.split('/').pop();
			//console.log(currentUrl);
			//console.log(segment);
			$('#' + segment + '-link').addClass('active');
		});
	
		CKEDITOR.replaceAll('details');
		
		$('.open-popup').on('click', function() {
	
			btn = $(this);
			//e.preventDefault();
			url = btn.data('target');
			modalTarget = btn.data('modal-target');
	
			$.ajax({
				url: url,
				type: 'POST',
				success: function (html) {
					$('body').append(html);
					$(modalTarget).modal('show');
				},
			});
			/*if ($(modalTarget).length > 0) {
				$(modalTarget).modal('show');
			} else {
				$.ajax({
					url: url,
					type: 'POST',
					success: function (html) {
						$('body').append(html);
						$(modalTarget).modal('show');
					},
				});
			}*/
			return false;
		});
		$(document).on('click', '.submit-btn', function(e) {
			btn = $(this);
			e.preventDefault();
			form = btn.parents('.form-modal');
	
			if (form.find('#details').length) {
				// if there is an element in the form has an id 'details'
	            	// then add the value for it to be gotten from ckeditor
				form.find('#details').val(CKEDITOR.instances.details.getData());
			}
			
			url = form.attr('action');
			data = new FormData(form[0]);
			formResults = form.find('#form-results');
			$.ajax({
				url: url,
				data: data,
				type: 'POST',
				dataType: 'json',
				beforeSend: function () {
					formResults.removeClass().addClass('alert alert-info').html('Loading...');
				},
				success: function (results) {
					if (results.errors) {
						formResults.removeClass().addClass('alert alert-danger').html(results.errors);
					} else if (results.success) {
						formResults.removeClass().addClass('alert alert-success').html(results.success);
					}
					if (results.redirectTo) {
						window.location.href = results.redirectTo;
					}
				},
				cache: false,
				processData: false,
				contentType: false,
			});
		});
	
		$('.delete').on('click', function(e) {
			btn = $(this);
			e.preventDefault();
			var c = confirm('Are You Sure! ?');
	
			if (c === true) {
				// Deleting
				$.ajax({
					url: btn.data('target'),
					type: 'POST',
					dataType: 'json',
					beforeSend: function () {
						$('#delete-results').removeClass().addClass('alert alert-info').html('Deleting...');
					},
					success: function (results) {
						if (results.success) {
							$('#delete-results').removeClass().addClass('alert alert-success').html(results.success);
							tr = btn.parents('tr');
							tr.fadeOut(function() {
								tr.remove();
							});
						}
					},
				});
			} else {
				return false;
			}
		});
	</script> -->
</body>
</html>