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
			<li><a href="<?php echo url('/admin/orders') ?>"><i class="fa fa-motorcycle"></i> Orders</a></li>
			<li class="active">Order Details</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	  	<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger" id="users-list">
					<div class="box-header with-border">
						<h3 class="box-title">Order Details</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<div id="delete-results">
							<!-- results here -->  
						</div>
						<h4 class="box-title">Total bill</h4>
						<table class="table table-bordered">
							<tr>
								<th>#</th>
								<th>User Name</th>
								<th>Total</th>
								<th>Total Item</th>
								<th>Paid</th>
								<th>Created at</th>
							</tr>
							<tr>
								<td><?php echo $order->id; ?></td>
								<td>
									<?php echo $order->user->first_name . ' ' . $order->user->last_name; ?>	
								</td>
								<td><?php echo $order->total . ' <small>EGP</small>'; ?></td>
								<td><?php echo count($order->products); ?></td>
								<td>
									<?php if ($order->paid == 1) { ?>
										<i style="color: green;" class="fa fa-check fa-fw"></i>
									<?php } else { ?>
										<i style="color: red;" class="fa fa-times fa-fw"></i>
									<?php } ?>
								</td>
								<td><?php echo $order->created_at; ?></td>
							</tr>
						</table>
						<h4 class="box-title">Products</h4>

						<table class="table table-bordered">
							<tr>
								<th>#</th>
								<th>Product Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Total</th>
							</tr>
							<?php foreach ($order->products as $product) { ?>
							<tr>
								<td><?php echo $product->id; ?></td>
								<td><?php echo $product->name; ?></td>
								<td><?php echo $product->price . ' <small>EGP</small>'; ?></td>
								<td><?php echo $product->quantity; ?></td>
								<td><?php echo ($product->price * $product->quantity); ?></td>
							</tr>
							<?php } ?>
						</table>
						<h4 class="box-title">Address</h4>
						<div class="table-responsive">
							<table class="table table-bordered ">
								<tr>
									<th>#</th>
				                    <th>City</th>
				                    <th>Area</th>
				                    <th>Street</th>
				                    <th>Building</th>
				                    <th>Floor</th>
				                    <th>Apartment</th>
				                    <th>Landmark</th>
				                    <th>Mobile</th>
				                    <th>Mobile2</th>
								</tr>
								<tr>
									<td><?php echo $order->address->id; ?></td>
									<td><?php echo $order->address->city; ?></td>
				                    <td><?php echo $order->address->area; ?></td>
				                    <td><?php echo $order->address->street; ?></td>
				                    <td><?php echo $order->address->building; ?></td>
				                    <td><?php echo $order->address->floor; ?></td>
				                    <td><?php echo $order->address->apartment; ?></td>
				                    <td><?php echo $order->address->landmark; ?></td>
				                    <td><?php echo $order->address->mobile; ?></td>
				                    <td><?php echo $order->address->mobile2; ?></td>
								</tr>
							</table>
						</div>
					</div>
					<!-- /.box-body -->
					<div class="box-footer clearfix"></div>
				</div>
			</div>
		</div>
	</section>
<!-- /.content -->
</div>