	<div class="item">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="item-photo">
						<img class="img-fluid" src="<?php echo reach('upload/products/' . $product->image); ?>">
					</div>
				</div>
				<div class="offset-md-1 col-md-7">
					<div class="item-detail">
						<h3 class="name-item"><?php echo $product->name; ?></h3>
						<div class="item-price"><?php echo number_format($product->price, 2); ?> <small><?php echo lang('egp'); ?></small></div>
						<div class="item-weight">
							<p><?php echo lang('product-weight'); ?>:</p>
							<span><?php echo $product->weight; ?> <?php echo lang('gm'); ?></span>
						</div>
						<div class="item-description">
							<p><?php echo lang('description'); ?>:</p>
							<p class="desc"><?php echo $product->description; ?></p>
						</div>
						<form action="<?php echo url('/products/add-to-cart/' . $product->id); ?>" method="POST">
							<input type="hidden" name="item_id" value="<?php echo $product->id; ?>">
							<input type="hidden" name="name" value="<?php echo $product->name; ?>">
							<input type="hidden" name="price" value="<?php echo $product->price; ?>">
							<input type="hidden" name="descripe" value="<?php echo $product->description; ?>">
							<input type="hidden" name="image" value="<?php echo $product->image; ?>">
							<input type="hidden" name="quantity" value="1">
							<button type="submit" name="addToCart" value="addToCart" class="main-btn">
								<i class="fas fa-shopping-basket fa-fw"></i>
								<?php echo lang('add-to-cart'); ?>
							</button>
						</form>
					</div> <!-- .item-detail -->
				</div> <!-- .col -->
				<div class="col-12">
					<div class="directory">
						<ul>
							<li data-class="features" class="active"><?php echo lang('features'); ?></li>
							<li data-class="warning"><?php echo lang('warning'); ?></li>
							<li data-class="how-to-use"><?php echo lang('gm'); ?></li>
							<li data-class="ingredients"><?php echo lang('ingredients'); ?></li>
						</ul>
						<div class="direct-content">
							<div class="features">
								<?php echo $product->feature; ?>
							</div>
							<div class="warning">
								<?php echo $product->warning; ?>
							</div>
							<div class="use">
								<?php echo $product->how_to_use; ?>
							</div>
							<div class="ingredients">
								<?php echo $product->ingredient; ?>
							</div>
						</div>
					</div>
				</div> <!-- .col -->
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- .item -->