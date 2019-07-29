	<div class="product">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="category-list">
						<h3 class="cat-head"><?php echo lang('category'); ?></h3>
						<ul class="cat-list">
							<?php
								foreach ($categories as $category) { ?>
									<li class="cat-list-item">
										<a href="<?php echo url('/category/' . strTrim($category->name) . '/' . $category->id); ?>">
											<?php
											if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'en') {
												echo $category->name;
											} else {
												echo $category->name_ar;
											}
											?>
										</a>
									</li>

							<?php } ?>
							<li class="cat-list-item">
								<a href="<?php echo url('/products'); ?>"><?php echo lang('all-products'); ?></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-9">
					<?php
						foreach ($cat->products as $product) { ?>

							<div class="col-md-6 col-lg-4 item-float">
								<div class="item-box">
									<div class="item-img text-center">
										<img class="img-fluid" src="<?php echo reach('upload/products/' . $product->image); ?>">
									</div>
									<div class="item-info">
										<div class="item-btn">
											<form action="<?php echo url('/products/add-to-cart/' . $product->id); ?>" method="POST">
												<input type="hidden" name="item_id" value="<?php echo $product->id; ?>">
												<input type="hidden" name="name" value="<?php echo $product->name; ?>">
												<input type="hidden" name="price" value="<?php echo $product->price; ?>">
												<input type="hidden" name="descripe" value="<?php echo $product->description; ?>">
												<input type="hidden" name="image" value="<?php echo $product->image; ?>">
												<input type="hidden" name="quantity" value="1">
												<button type="submit" name="addToCart" value="addToCart" class="add-to-cart">
													<i class="fas fa-shopping-basket fa-fw"></i>
												</button>
											</form>
										</div>
										<div class="p-price">
											<span><?php echo number_format($product->price, 2) ?></span> <small><?php echo lang('egp'); ?></small>
										</div>
										<h5 class="item-title">
											<a href="<?php echo url('/products/' . $product->id); ?>">
												<?php echo $product->name; ?>
											</a>
										</h5>
										<p class="sub-title"><?php echo $product->description ?></p>
									</div> <!-- .item-info -->
								</div> <!-- .item-box -->
							</div>
					<?php } ?>
				</div>
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- .product -->