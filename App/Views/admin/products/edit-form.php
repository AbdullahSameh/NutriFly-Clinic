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
			<li><a href="<?php echo url('/admin/products') ?>"><i class="fa fa-shopping-cart"></i>Products</a></li>
			<li class="active">Edit Product</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	  	<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger" id="products-list">
					<div class="box-header with-border">
						<h3 class="box-title">Edit <?php echo $product->name; ?></h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<form action="<?php echo url('/admin/products/save/' . $product->id); ?>" method="POST" enctype="multipart/form-data">
							<?php if ($errors) { ?>
								<div class="alert alert-danger">
									<?php echo implode('<br>' , $errors); ?>
								</div>
							<?php } ?>
							<div class="row">
								<div class="col-sm-6">
								<img class="img-responsive" src="<?php echo reach('upload/products/' . $product->image) ?>">
								</div>
								<div class="col-sm-6">
									<div class="form-group col-sm-12">
										<label>Product name</label>
										<input type="text" class="form-control" name="name" value="<?php echo $product->name; ?>" placeholder="Product name">
									</div>
									<div class="form-group col-sm-12">
										<label for="status">Category</label>
										<select class="form-control" name="category">
											<?php foreach ($categories as $category) { ?>
											<option value="<?php echo $category->id; ?>" <?php echo $product->category_id ==  $category->id ? 'selected' : false; ?>><?php echo $category->name; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group col-sm-12">
										<label>Product price</label>
										<input type="text" class="form-control" name="price" value="<?php echo $product->price; ?>" placeholder="Product price">
									</div>
									<div class="form-group col-sm-12">
										<label>Product weight</label>
										<input type="text" class="form-control" name="weight" value="<?php echo $product->weight; ?>" placeholder="Product weight">
									</div>
								</div>
							</div> <!-- .row -->
							<div class="form-group col-sm-12" style="margin-top: 15px;">
								<label>Product description</label>
								<input type="text" class="form-control" name="description" value="<?php echo $product->description; ?>" placeholder="Product description">
							</div>
							<div class="form-group col-sm-12">
								<label>Product feature</label>
								<textarea class="form-control" rows="5" name="feature" placeholder="Product feature">
									<?php echo ltrim($product->feature); ?>
								</textarea>
							</div>
							<div class="form-group col-sm-12">
								<label>Product warning</label>
								<textarea class="form-control" rows="3" name="warning" placeholder="Product warning">
									<?php echo ltrim($product->warning); ?>
								</textarea>
							</div>
							<div class="form-group col-sm-12">
								<label>How to use product</label>
								<textarea class="form-control" rows="3" name="how_to_use" placeholder="How to use product">
									<?php echo ltrim($product->how_to_use); ?>
								</textarea>
							</div>
							<div class="form-group col-sm-12">
								<label>Product ingredient</label>
								<input type="text" class="form-control" name="ingredient" value="<?php echo $product->ingredient; ?>" placeholder="Product ingredient">
							</div>
							<div class="form-group col-sm-6">
								<label>Product stock</label>
								<input type="text" class="form-control" name="stock" value="<?php echo $product->stock; ?>" placeholder="Product stock">
							</div>
							<div class="form-group col-sm-6">
								<label>Product image</label>
								<input type="file" class="form-control" name="image" value="<?php echo $product->image ?>">
							</div>
							<div class="form-group col-sm-12">
								<button class="btn btn-info btn-lg pull-right">Submit</button>
							</div>
						</form>
					</div>
					<!-- /.box-body -->
					<div class="box-footer clearfix"></div>
				</div>
			</div>
		</div>
	</section>
<!-- /.content -->
</div>