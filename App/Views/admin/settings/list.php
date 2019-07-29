<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo url('/admin') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li class="active">Settings</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger" id="products-list">
					<div class="box-header with-border">
						<h3 class="box-title">Manage Site Settings</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form action="<?php echo url('/admin/settings/save'); ?>" method="POST">
							<?php if ($success) { ?>
								<div class="alert alert-success">
									<?php echo $success; ?>
								</div>
							<?php } elseif ($errors) { ?>
								<div class="alert alert-danger">
									<?php echo implode('<br>', $errors); ?>
								</div>
							<?php } ?>
							<div class="form-group col-sm-6">
								<label>Site name</label>
								<input type="text" class="form-control" name="site_name" value="<?php echo $settings['site_name']; ?>" placeholder="Site name">
							</div>
							<div class="form-group col-sm-6">
								<label>Site email</label>
								<input type="email" class="form-control" name="site_email" value="<?php echo $settings['site_email']; ?>" placeholder="Site email">
							</div>
							<div class="form-group col-sm-6">
								<label>Site mobile</label>
								<input type="text" class="form-control" name="site_mobile" value="<?php echo $settings['site_mobile']; ?>" placeholder="Site mobile">
							</div>
							<div class="form-group col-sm-6">
								<label>Site mobile2</label>
								<input type="text" class="form-control" name="site_mobile2" value="<?php echo $settings['site_mobile2']; ?>" placeholder="Site mobile">
							</div>
							<div class="form-group col-sm-12">
								<label>Site description</label>
								<textarea class="form-control" rows="3" name="site_description" placeholder="Site description">
									<?php echo ltrim($settings['site_description']); ?>
								</textarea>
							</div>
							<!-- <div class="form-group col-sm-12">
								<label>Slider Images</label>
								<input type="file" class="form-control" name="slider_image1" value="<?php $settings['slider_image1'] ?>">
								<input type="file" class="form-control" name="slider_image2" value="<?php $settings['slider_image2'] ?>">
								<input type="file" class="form-control" name="slider_image3" value="<?php $settings['slider_image3'] ?>">
							</div> -->
							<div class="form-group col-sm-6">
								<label for="status">Maintenance</label>
								<select class="form-control" id="status" name="maintenance">
									<option value="enabled">Enabled</option>
									<option value="disabled" <?php echo $settings['maintenance'] == 'disabled' ? 'selected' : false; ?>>Disabled</option>
								</select>
							</div>
							<div class="form-group col-sm-6">
								<label>Maintenance message</label>
								<textarea class="form-control" rows="3" name="maintenance_message" placeholder="Maintenance message">
									<?php echo ltrim($settings['maintenance_message']); ?>
								</textarea>
							</div>
							<div class="form-group col-sm-12">
								<button class="btn btn-info pull-right">Save</button>
							</div>
						</form>
					</div>
					<!-- /.box-body -->
					<div class="box-footer clearfix"></div>
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
</div>