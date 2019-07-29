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
			<li class="active">Stories</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	  	<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger" id="users-list">
					<div class="box-header with-border">
						<h3 class="box-title">Manage Your Stories</h3>
						<button class="btn btn-danger pull-right open-popup" data-modal-id="#add-story-form" data-target="<?php echo url('/admin/stories/add') ?>">Add New Story</button>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<!-- <?php if ($success) { ?>
							<div class="alert alert-success">
								<?php echo $success; ?>
							</div>
						<?php } ?> -->
						<div id="delete-results">
							<!-- results here -->  
						</div>
						<table class="table table-bordered">
							<tr>
								<th>#</th>
								<th>Story Title</th>
								<th>Story Name</th>
								<th>Status</th>
								<th>Created at</th>
								<th>Action</th>
							</tr>
							<?php foreach ($stories as $story) { ?>
							<tr>
								<td><?php echo $story->id ?></td>
								<td>
									<img style="max-height: 50px; max-width: 50px; border-radius: 4px; margin-right: 5px;" src="<?php echo reach('upload/stories/' . $story->image) ?>">
									<?php echo $story->story_title ?>
								</td>
								<td><?php echo $story->story_name ?></td>
								<td><?php echo ucfirst($story->status) ?></td>
								<td><?php echo $story->created_at ?></td>
								<td>
									<button class="btn btn-info open-popup" data-modal-id="#edit-story-<?php echo $story->id; ?>" data-target="<?php echo url('/admin/stories/edit/' . $story->id) ?>">
										Edit
										<i class="fa fa-pencil-square-o"></i>
									</button>
									<button class="btn btn-danger delete" data-target="<?php echo url('/admin/stories/delete/' . $story->id) ?>">
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