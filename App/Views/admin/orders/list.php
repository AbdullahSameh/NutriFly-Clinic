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
			<li class="active">Orders</li>
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
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<?php if ($success) { ?>
							<div class="alert alert-success">
								<?php echo $success; ?>
							</div>
						<?php } ?>
						<table class="table table-bordered">
							<tr>
								<th>#</th>
								<th>User Name</th>
								<th>Total</th>
								<th>Total Item</th>
								<th>City</th>
								<th>Area</th>
								<th>Paid</th>
								<th>Created at</th>
								<th>Action</th>
							</tr>
							<?php foreach ($orders as $order) { ?>
							<tr>
								<td><?php echo $order->id; ?></td>
								<td><?php echo $order->first_name . ' ' . $order->last_name; ?></td>
								<td><?php echo $order->total . ' <small>EGP</small>'; ?></td>
								<td><?php echo $order->total_item; ?></td>
								<td><?php echo $order->city; ?></td>
								<td><?php echo $order->area; ?></td>
								<td>
									<?php if ($order->paid == 1) { ?>
										<i style="color: green;" class="fa fa-check fa-fw"></i>
									<?php } else { ?>
										<i style="color: red;" class="fa fa-times fa-fw"></i>
									<?php } ?>
								</td>
								<td><?php echo $order->created_at; ?></td>
								<td>
									<a class="btn btn-info" href="<?php echo url('/admin/orders/show/' . $order->id) ?>">
										Show
										<i class="fa fa-pencil-square-o"></i>
									</a>
									<a class="btn btn-danger" href="<?php echo url('/admin/orders/delete/' . $order->id) ?>">
										Delete
										<i class="fa fa-trash"></i>
									</a>
									<?php if ($order->paid == 0) { ?>
									<a class="btn btn-success" href="<?php echo url('/admin/orders/paid/' . $order->id) ?>">
										Paid
										<i class="fa fa-check"></i>
									</a>
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