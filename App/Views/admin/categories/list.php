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
			<li class="active">Categories</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	  	<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger" id="users-list">
					<div class="box-header with-border">
						<h3 class="box-title">Manage Your Categories</h3>
						<button class="btn btn-danger pull-right open-popup" data-modal-id="#add-category-form" data-target="<?php echo url('/admin/categories/add') ?>">Add New Category</button>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="delete-results">
							<!-- results here -->  
						</div>
						<table class="table table-bordered">
							<tr>
								<th>#</th>
								<th>Category Image</th>
								<th>English Name</th>
								<th>Arabic Name</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
							<?php foreach ($categories as $category) { ?>
							<tr>
								<td><?php echo $category->id ?></td>
								<td>
									<img style="max-height: 40px; max-width: 40px; border-radius: 50%; margin-right: 5px;" src="<?php echo reach('upload/categories/' . $category->image) ?>">
								</td>
								<td><?php echo $category->name ?></td>
								<td><?php echo $category->name_ar ?></td>
								<td><?php echo ucfirst($category->status) ?></td>
								<td>
									<button class="btn btn-info open-popup" data-modal-id="#edit-category-<?php echo $category->id; ?>" data-target="<?php echo url('/admin/categories/edit/' . $category->id) ?>">
										Edit
										<i class="fa fa-pencil-square-o"></i>
									</button>
									<button class="btn btn-danger delete" data-target="<?php echo url('/admin/categories/delete/' . $category->id) ?>">
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