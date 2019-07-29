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
			<li class="active">Users</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	  	<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger" id="users-list">
					<div class="box-header with-border">
						<h3 class="box-title">Manage Your Users</h3>
						<button class="btn btn-danger pull-right open-popup" data-modal-id="#add-users-form" data-target="<?php echo url('/admin/users/add') ?>">Add New User</button>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="delete-results">
							<!-- results here -->  
						</div>
						<table class="table table-bordered">
							<tr>
								<th>#</th>
								<th>User Name</th>
								<th>Groups Name</th>
								<th>Email</th>
								<th>Country</th>
								<th>Gender</th>
								<th>Join</th>
								<th>Action</th>
							</tr>
							<?php foreach ($users as $user) { ?>
							<tr>
								<td><?php echo $user->id; ?></td>
								<td>
									<img style="max-height: 40px; max-width: 40px; border-radius: 50%; margin-right: 5px;" src="<?php echo reach('upload/users/' . $user->image) ?>">
									<?php echo $user->first_name . ' ' . $user->last_name; ?>
								</td>
								<td><?php echo $user->groups; ?></td>
								<td><?php echo $user->email; ?></td>
								<td><?php echo ucfirst($user->country); ?></td>
								<td><?php echo ucfirst($user->gender); ?></td>
								<td><?php echo date('d-m-y', $user->created_at); ?></td>
								<td>
									<button class="btn btn-info open-popup" data-modal-id="#edit-users-<?php echo $user->id; ?>" data-target="<?php echo url('/admin/users/edit/' . $user->id) ?>">
										Edit
										<i class="fa fa-pencil-square-o"></i>
									</button>
									<button class="btn btn-danger delete" data-target="<?php echo url('/admin/users/delete/' . $user->id) ?>">
										Delete
										<i class="fa fa-trash"></i>
									</button>
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