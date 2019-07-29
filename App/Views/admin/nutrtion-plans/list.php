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
			<li class="active">Nutrtion Plans</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	  	<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger" id="users-list">
					<div class="box-header with-border">
						<h3 class="box-title">Manage Nutrtion Plans</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive">
						<?php if ($success) { ?>
							<div class="alert alert-success">
								<?php echo $success; ?>
							</div>
						<?php } ?>
						<table class="table table-bordered">
							<tr>
								<th>#</th>
								<th>User Name</th>
								<th>Email</th>
								<th>Gender</th>
								<th>Height</th>
								<th>Carrent Weight</th>
								<th>Desired Weight</th>
								<th>Health Status</th>
								<th>Mobile</th>
								<th>Mobile2</th>
								<th>Created at</th>
								<th>Action</th>
							</tr>
							<?php foreach ($plans as $plan) { ?>
							<tr>
								<td><?php echo $plan->id; ?></td>
								<td><?php echo $plan->first_name . ' ' . $plan->last_name; ?></td>
								<td><?php echo $plan->email; ?></td>
								<td><?php echo $plan->gender; ?></td>
								<td><?php echo $plan->age; ?></td>
								<td><?php echo $plan->height; ?></td>
								<td><?php echo $plan->carrent_weight; ?></td>
								<td><?php echo $plan->desired_weight; ?></td>
								<td><?php echo $plan->health_status; ?></td>
								<td><?php echo $plan->mobile; ?></td>
								<td><?php echo $plan->mobile2; ?></td>
								<td><?php echo $plan->created_at; ?></td>
								<td>
									<a class="btn btn-danger" href="<?php echo url('/admin/plans/delete/' . $plan->id) ?>">
										Delete
										<i class="fa fa-trash"></i>
									</a>
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<!-- /.box-body -->
					<div class="box-footer clearfix"></div>
				</div>
			</div>
		</div>
	</section>
<!-- /.content -->
</div>