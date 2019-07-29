<div class="profile">
		<div class="container">
			<div class="card">
				<div class="card-header">
					<h3><?php echo lang('order-details'); ?></h3>
				</div>
				<div class="card-body">
					<h4 class="box-title"><?php echo lang('total-bill'); ?></h4>
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>#</th>
								<th><?php echo lang('user-name'); ?></th>
								<th><?php echo lang('total'); ?></th>
								<th><?php echo lang('total-items'); ?></th>
								<th><?php echo lang('paid'); ?></th>
								<th><?php echo lang('created-at'); ?></th>
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
					</div>

					<h4 class="box-title"><?php echo lang('products'); ?></h4>
					<div class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<th>#</th>
								<th><?php echo lang('product-name'); ?></th>
								<th><?php echo lang('price'); ?></th>
								<th><?php echo lang('quantity'); ?></th>
								<th><?php echo lang('total'); ?></th>
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
					</div>

					<h4 class="box-title"><?php echo lang('address'); ?></h4>
					<div class="table-responsive">
						<table class="table table-bordered ">
							<tr>
								<th>#</th>
			                    <th><?php echo lang('city'); ?></th>
			                    <th><?php echo lang('area'); ?></th>
			                    <th><?php echo lang('street'); ?></th>
			                    <th><?php echo lang('building'); ?></th>
			                    <th><?php echo lang('floor'); ?></th>
			                    <th><?php echo lang('apartment'); ?></th>
			                    <th><?php echo lang('landmark'); ?></th>
			                    <th><?php echo lang('mobile'); ?></th>
			                    <th><?php echo lang('mobile2'); ?></th>
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
				</div> <!-- .card-body -->
			</div> <!-- .card -->
		</div> <!-- .container -->
	</div> <!-- .profile -->