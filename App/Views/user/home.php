		<!-- Start Slide Show -->
	<div>
		<div id="mySlide" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="<?php echo reach('layout/images/01.jpg'); ?>" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="<?php echo reach('layout/images/02.jpg'); ?>" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="<?php echo reach('layout/images/03.jpg'); ?>" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#mySlide" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#mySlide" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
		<!-- End Slide Show -->

		<!-- Start The Latest products -->
	<div class="latest-product">
		<div class="container">
			<h2 class="heading-section"><?php echo lang('latest-products'); ?></h2>
			<div class="row">
				<?php foreach ($products as $product) { ?>
				<div class="col-md-6 col-lg-3">
					<div class="item-box">
						<div class="item-img text-center">
							<a href="<?php echo url('/products/' . $product->id); ?>">
								<img class="img-fluid" src="<?php echo reach('upload/products/' . $product->image); ?>">
							</a>
						</div>
						<div class="item-info">
							<div class="item-btn">
								<form action="<?php echo url('/products/add-to-cart/' . $product->id); ?>" method="POST">
									<input type="hidden" name="item_id" value="<?php echo $product->id; ?>">
									<input type="hidden" name="name" value="<?php echo $product->name; ?>">
									<input type="hidden" name="price" value="<?php echo $product->price; ?>">
									<input type="hidden" name="descripe" value="<?php echo $product->description; ?>">
									<input type="hidden" name="quantity" value="1">
									<button type="submit" name="addToCart" value="addToCart" class="add-to-cart">
										<i class="fas fa-shopping-basket fa-fw"></i>
									</button>
								</form>
							</div>
							<div class="p-price">
								<span><?php echo number_format($product->price, 2) ?></span> <small>EGP</small>
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
			</div> <!-- .row -->
		</div> <!-- .container -->
	</div> <!-- .latest-product -->
		<!-- End The Latest products -->

		<!-- Start Categories Section -->
	<div class="category">
		<div class="container">
			<h2 class="heading-section"><?php echo lang('main-categories'); ?></h2>
			<div class="cat-group">
				<div class="row">
					<?php foreach ($categories as $category) { ?>
					<div class="col-md-4 col-lg-2">
						<div class="cat-box">
							<div class="img-box">
								<img class="cat-img" src="<?php echo reach('upload/categories/' . $category->image); ?>">
							</div>
							<h3 class="cat-name">
								<a href="<?php echo url('/category/' . strTrim($category->name) . '/' . $category->id); ?>">
									<?php
									if (isset($_SESSION['lang']) && $_SESSION['lang'] === 'en') {
										echo $category->name;
									} else {
										echo $category->name_ar;
									}
									?>
								</a>
							</h3>
						</div>
					</div>
					<?php } ?>
					<div class="col-md-4 col-lg-2">
						<div class="cat-box">
							<div class="img-box">
								<img class="cat-img" src="<?php echo reach('layout/images/all.jpg'); ?>">
							</div>
							<h3 class="cat-name">
								<a href="<?php echo url('/products'); ?>"><?php echo lang('all-products'); ?></a>
							</h3>
						</div>
					</div>
				</div> <!-- .row -->
			</div> <!-- .cat-group -->
		</div> <!-- .container -->
	</div> <!-- .category -->
		<!-- End Categories Section -->

		<!-- Start About Section -->
	<div id="about" class="about" style="background: url(<?php echo reach('layout/images/about.jpg'); ?>) no-repeat center center fixed; background-size: cover;">
		<div class="overlay">
			<div class="container">
				<h1 class="about-title"><span><?php echo lang('about-us-title1'); ?></span> <br> <?php echo lang('about-us-title2'); ?></h1>
				<p class="about-message"><?php echo lang('about-us-message'); ?></p>
				<a href="" id="scroll-link" class="scroll-link main-btn" data-link="<?php echo url('/') ?>" data-scroll="contact"><?php echo lang('contact-us'); ?></a>
			</div>
		</div>
	</div> <!-- .about -->
		<!-- End About Section -->
		<!-- Start Contact Us Section-->
	<div id="contact" class="contact">
		<div class="container">
			<h2 class="heading-section"><?php echo lang('contact-us'); ?></h2>
			<form class="con-form" action="<?php echo url('/contact-us'); ?>" method="POST">
				<div class="row">
					<div class="col-lg-6 info">
						<div class="form-group">
							<input class="form-control m-name" type="text" name="name" placeholder="<?php echo lang('con-us-name'); ?>" required="required">
							<span class="err-sms"><?php echo lang('con-us-error-name'); ?></span>
							<i class="fas fa-user fa-fw"></i>
						</div>
						<div class="form-group">
							<input class="form-control m-email" type="email" name="email" placeholder="<?php echo lang('con-us-email'); ?>" required="required">
							<span class="err-sms"><?php echo lang('con-us-error-email'); ?></span>
							<i class="fas fa-envelope fa-fw"></i>
						</div>
						<div class="form-group">
							<input class="form-control m-subject" type="text" name="subject" placeholder="<?php echo lang('con-us-subject'); ?>" required="required">
							<span class="err-sms"><?php echo lang('con-us-error-subject'); ?></span>
							<i class="fas fa-sticky-note fa-fw"></i>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<textarea class="form-control m-message" placeholder="<?php echo lang('con-us-message'); ?>" name="message" required="required"></textarea>
							<span class="err-sms"><?php echo lang('con-us-error-message'); ?></span>
						</div>
					</div>
					
					<button class="main-btn" name="sendMessage"><i class="fas fa-paper-plane fa-fw"></i> <?php echo lang('con-us-send'); ?></button>
				</div>
			</form>
		</div> <!-- .container- -->
	</div> <!-- .contact- -->
		<!-- End Contact Us Section-->