
	<div class="container">
		<?php if (! empty($addToCart)) { ?>
		<div class="shop-cart">
			<div class="row">
				<div class="col-lg-8">
					<div class="cart-box">
						<h2 class="heading-section">
						<?php echo lang('shopping-cart'); ?> 
							<span>
								(<?php 
								if (! empty($addToCart)) {
									echo count($addToCart); 
								} else {
									echo '0';
								}
								?>)
							</span>
						</h2>
						<?php
						$total = 0;
						foreach ($addToCart as $key => $shopCart) { ?>
							<div class="cart-item">
								<div class="row">
									<div class="col-3 text-center"> 
										<img class="item-img" src="<?php echo reach('upload/products/' . $shopCart['cart_image']); ?>">
									</div>
									<div class="col-9">
										<h4 class="item-name"><?php echo $shopCart['cart_name'] ?></h4>
										<div class="cart-price">
											<span><?php echo number_format($shopCart['cart_price'], 2) ?> <small><?php echo lang('egp'); ?></small></span>
											<form action="<?php echo url('/shopping-cart/update/' . $shopCart['cart_id']); ?>" class="form-inline" method="POST">
												<label><?php echo lang('quantity'); ?></label>
												<select class="form-control" name="qty">
													<?php
														for ($q = 1; $q <= 10; $q++) {
															echo '<option value="'. $q .'"';
															if ($q == $shopCart['cart_quantity']) { echo 'selected'; }
															echo '>'. $q .'</option>';
														}
													?>
												</select>
												<input type="hidden" name="qtyid" value="<?php echo $shopCart['cart_id'] ?>">
												<button type="submit" name="update" value="update" class="second-btn">
												<?php echo lang('update-qty'); ?>
												</button>
												<!-- <input class="second-btn" type="submit" name="update" value="update"> -->
											</form>
										</div>
										<p class="item-descripe"><?php echo $shopCart['cart_descripe'] ?></p>
									</div>
								</div>
								<div class="cart-action">
									<!-- <a href="cart.php?action=delete&id=<?php echo $shopCart['cart_id']; ?>"> -->
									<a href="<?php echo url('/shopping-cart/delete/' . $shopCart['cart_id']); ?>">
										<i class="far fa-trash-alt fa-fw"></i>
										<?php echo lang('delete'); ?>
									</a>
								</div>
							</div>
						<?php
							$total = $total + ($shopCart['cart_price'] * $shopCart['cart_quantity']);
						}
						?>
					</div> <!-- .cart-box -->
				</div>
				<div class="col-lg-4">
					<div class="amount">
						<!-- <?php //echo $total; ?> EGP -->
						<h2 class="heading-section"><?php echo lang('total-amount'); ?></h2>						
						<div class="total">
							<?php echo number_format($total, 2) ?>
						</div>
						<span class="currency"><?php echo lang('egp'); ?></span>

							<!-- <button class="main-btn" name="checkout">Proceed to checkout</button> -->
							<a class="main-btn" href="<?php echo url('/checkout'); ?>" name="checkout"><?php echo lang('proceed-to-checkout'); ?></a>

						<!-- <form action="<?php echo url('/checkout'); ?>" method="POST">
						</form> -->
					</div>
				</div>
			</div> <!-- .row -->
		</div> <!-- .shop-cart -->
		<?php } else { ?>
		<div class="empty-shop-cart">
			<i class="fas fa-exclamation fa-fw"></i>
			<p><?php echo lang('cart-is-empty'); ?></p>
		</div>
		<?php } ?>
	</div> <!-- .container -->