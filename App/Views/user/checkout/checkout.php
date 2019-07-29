	<div class="container">
		<div class="checkout">
			<form action="<?php echo url('/checkout/order'); ?>" method="POST">
				<div class="row">
					<div class="col-lg-8">
						<div class="card">
							<div class="card-header">
								<h3><?php echo lang('address'); ?></h3>
							</div>
							<?php if ($errors) { ?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<?php 
									foreach ($errors as $error) {
										echo '* ' . $error . '<br>';
									} 
								?>
							</div>
					 		<?php } ?>
							<div class="card-body">
								<!-- <Address Form> -->
								<div class="form-row">
									<div class="form-group col-md-6">
										<label><?php echo lang('city'); ?></label>
										<input type="text" class="form-control" name="city">
									</div>
									<div class="form-group col-md-6">
										<label><?php echo lang('area'); ?></label>
										<input type="text" class="form-control" name="area">
									</div>
								</div>
								<div class="form-group">
									<label><?php echo lang('street'); ?></label>
									<input type="text" class="form-control" name="street">
								</div>
								<div class="form-group">
									<label><?php echo lang('building'); ?></label>
									<input type="text" class="form-control" name="building">
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label><?php echo lang('floor'); ?></label>
										<input type="text" class="form-control" name="floor">
									</div>
									<div class="form-group col-md-6">
										<label><?php echo lang('apartment'); ?></label>
										<input type="text" class="form-control" name="apartment">
									</div>
								</div>
								<div class="form-group">
									<label><?php echo lang('landmark'); ?></label>
									<input type="text" class="form-control" name="landmark">
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label><?php echo lang('mobile'); ?></label>
										<input type="text" class="form-control" name="mobile">
									</div>
									<div class="form-group col-md-6">
										<label><?php echo lang('mobile2'); ?></label>
										<input type="text" class="form-control" name="mobile2">
									</div>
								</div>
								<!-- </Address Form> -->
							</div> <!-- .card-body -->
						</div> <!-- .card -->
					</div> <!-- .col -->
					<div class="col-lg-4">
						<div class="card">
							<div class="card-header">
								<h3><?php echo lang('your-order'); ?></h3>
							</div>
							<div class="card-body">
								<div class="order-items">
									<table class="table">
										<tr class="t-head">
											<th><?php echo lang('product-name'); ?></th>
											<th><?php echo lang('quantity'); ?></th>
										</tr>
										<?php
											$subTotal = 0;
											$shipping = 0;
											foreach ($_SESSION['addToCart'] as $key => $shopCart) { ?>
												<tr>
													<td><?php echo $shopCart['cart_name']; ?></td>
													<td><?php echo $shopCart['cart_quantity']; ?></td>
												</tr>
										<?php
											$subTotal = $subTotal + ($shopCart['cart_price'] * $shopCart['cart_quantity']);
											$total = $shipping +$subTotal;
											}
										?>
									</table>
									<div class="bill-total">
										<div class="shipping">
											<p><?php echo lang('shipping'); ?></p>
										</div>
										<h2 class="grand-total">
										<?php echo lang('total-amount'); ?>:
											<span><?php echo number_format($total, 2) ?> </span><?php echo lang('egp'); ?>
										</h2>
									</div>
								</div>
							</div> <!-- .card-body -->
						</div> <!-- .card -->
						<button class="second-btn" type="submit"><?php echo lang('please-order'); ?></button>
						<?php if ($success) { ?>
						<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<?php echo $success; ?>
						</div>
				 		<?php } ?>
						<!-- <input class="second-btn" type="submit" value="Please Order"> -->
					</div> <!-- .col -->
				</div> <!-- .row -->
			</form> <!-- /form -->
		</div> <!-- .shop-cart -->
	</div> <!-- .container -->