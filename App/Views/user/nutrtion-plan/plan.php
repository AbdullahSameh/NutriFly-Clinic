<div class="profile">
		<div class="container">
			<div class="card">
				<div class="card-header">
					<h3><?php echo lang('nutrtion-plan'); ?></h3>
				</div>
				<div class="card-body">
					<h3 class="heading-section"><?php echo lang('nutrtion-plan-head'); ?></h3>
					<div class="row">
						<div class="col-lg-7 mr-auto">
							<div class="plan-info">
								<p><?php echo lang('nutrtion-plan-message'); ?></p>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="plan-img">
								<img class="img-fluid" src="<?php echo reach('layout/images/all.jpg'); ?>">
							</div>
						</div>
					</div> <!-- .row -->
					<a style="margin: 1.625rem 0 0.75rem;" href="<?php echo url('/nutrtion-plan/get-plan') ?>" class="second-btn btn-lg"><?php echo lang('get-nutrtion-plan'); ?></a>
				</div> <!-- .card-body -->
			</div> <!-- .card -->
		</div> <!-- .container -->
	</div> <!-- .profile -->