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
			<li class="active">Products</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
	  	<!-- Small boxes (Stat box) -->
		<div class="row">
			<div class="col-sm-12">
				<div class="box box-danger" id="products-list">
					<div class="box-header with-border">
						<h3 class="box-title">Manage Your Products</h3>
						<a class="btn btn-danger pull-right" href="<?php echo url('/admin/products/add') ?>">Add New Product</a>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
						<?php if ($success) { ?>
							<div class="alert alert-success">
								<?php echo $success; ?>
							</div>
						<?php } ?>
						<!-- <div id="delete-results">
							results here  
						</div> -->
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr>
									<th>#</th>
									<th>Product Name</th>
									<th>Category</th>
									<th>Description</th>
									<th>Price</th>
									<th>Weight</th>
									<th>Feature</th>
									<th>Warning</th>
									<th>How to use</th>
									<th>Ingredient</th>
									<th>Stock</th>
									<th>Created at</th>
									<th>Action</th>
								</tr>
								<?php foreach ($products as $product) { ?>
								<tr>
									<td><?php echo $product->id; ?></td>
									<td><?php echo $product->name; ?></td>
									<td><?php echo $product->category; ?></td>
									<td><?php echo $product->description; ?></td>
									<td><?php echo $product->price; ?></td>
									<td><?php echo $product->weight; ?></td>
									<td><?php echo $product->feature; ?></td>
									<td><?php echo $product->warning; ?></td>
									<td><?php echo $product->how_to_use; ?></td>
									<td><?php echo $product->ingredient; ?></td>
									<td><?php echo $product->stock; ?></td>
									<td><?php echo $product->created_at; ?></td>
									<td>
										<a style="margin-bottom: 10px;" class="btn btn-info" href="<?php echo url('/admin/products/edit/' . $product->id) ?>">
											Edit
											<i class="fa fa-pencil-square-o"></i>
										</a>
										<a class="btn btn-danger" href="<?php echo url('/admin/products/delete/' . $product->id) ?>">
											Delete
											<i class="fa fa-trash"></i>
										</a>
									</td>
								</tr>
								<?php } ?>
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