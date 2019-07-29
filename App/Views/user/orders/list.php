<div class="profile">
		<div class="container">
			<div class="card">
				<div class="card-header">
					<h3><?php echo lang('manage-orders'); ?></h3>
				</div>
				<div class="card-body">
					<?php if ($success) { ?>
						<div class="alert alert-success">
							<?php echo $success; ?>
						</div>
					<?php } ?>
					<div class="table-responsive">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th><?php echo lang('user-name'); ?></th>
									<th><?php echo lang('total'); ?></th>
									<th><?php echo lang('total-items'); ?></th>
									<th><?php echo lang('city'); ?></th>
									<th><?php echo lang('area'); ?></th>
									<th><?php echo lang('paid'); ?></th>
									<th><?php echo lang('created-at'); ?></th>
									<th><?php echo lang('action'); ?></th>
								</tr>
							</thead>
							<tbody>
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
										<a class="btn btn-info" href="<?php echo url('/orders/show/' . $order->id) ?>">
										<?php echo lang('show'); ?>
											<i class="fa fa-pencil-square-o"></i>
										</a>
										<!-- <?php if ($order->cancel == 0 && $order->paid == 0) { ?>
										<a class="btn btn-danger" href="<?php echo url('/orders/cancel/' . $order->id) ?>">
											Cancel
											<i class="fa fa-times"></i>
										</a>
										<?php } ?> -->
									</td>
								</tr>
								<?php } ?>
							</tbody>
						</table>

						<?php

						?>
					</div>
				</div> <!-- .card-body -->
			</div> <!-- .card -->
		</div> <!-- .container -->
	</div> <!-- .profile -->