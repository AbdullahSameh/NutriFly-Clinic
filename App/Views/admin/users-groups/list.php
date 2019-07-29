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
			<li class="active">Users Groups</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	  	<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger" id="users-list">
					<div class="box-header with-border">
						<h3 class="box-title">Manage Your Users Groups</h3>
						<button class="btn btn-danger pull-right open-popup" data-modal-id="#add-usersGroups-form" data-target="<?php echo url('/admin/users-groups/add') ?>">Add New Users Groups</button>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="delete-results">
							<!-- results here -->  
						</div>
						<table class="table table-bordered">
							<tr>
								<th>#</th>
								<th>Users Groups Name</th>
								<th>Action</th>
							</tr>
							<?php foreach ($usersGroups as $userGroup) { ?>
							<tr>
								<td><?php echo $userGroup->id ?></td>
								<td><?php echo $userGroup->name ?></td>
								<td>
									<button class="btn btn-info open-popup" data-modal-id="#edit-usersGroups-<?php echo $userGroup->id; ?>" data-target="<?php echo url('/admin/users-groups/edit/' . $userGroup->id) ?>">
										Edit
										<i class="fa fa-pencil-square-o"></i>
									</button>
									<?php if ($userGroup->id != 1) { ?> 
									<button class="btn btn-danger delete" data-target="<?php echo url('/admin/users-groups/delete/' . $userGroup->id) ?>">
										Delete
										<i class="fa fa-trash"></i>
									</button>
									<?php } ?>
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