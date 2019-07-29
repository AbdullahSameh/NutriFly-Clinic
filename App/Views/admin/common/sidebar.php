		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo reach('adminpanel/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p><?php echo $user->first_name . ' ' . $user->last_name; ?></p>
						<!-- Status -->
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- search form (Optional) -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button type="submit" name="search" id="search-btn" class="btn btn-flat">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>
				</form>
				<!-- /.search form -->
				<!-- Sidebar Menu -->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header">HEADER</li>
					<!-- Optionally, you can add icons to the links -->

					<li id="admin-link" class="sidebar-link">
						<a href="<?php echo url('/admin') ?>"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a>
					</li>
					<li id="users-link" class="sidebar-link">
						<a href="<?php echo url('/admin/users') ?>"><i class="fa fa-user"></i> <span>Users</span></a>
					</li>
					<li id="users-groups-link" class="sidebar-link">
						<a href="<?php echo url('/admin/users-groups') ?>"><i class="fa fa-users"></i> <span>Users Groups</span></a>
					</li>
					<li id="categories-link" class="sidebar-link">
						<a href="<?php echo url('/admin/categories') ?>"><i class="fa fa-book"></i> <span>Categories</span></a>
					</li>
					<li id="posts-link" class="sidebar-link">
						<a href="<?php echo url('/admin/products') ?>"><i class="fa fa-shopping-cart"></i> <span>Products</span></a>
					</li>
					<li id="ads-link" class="sidebar-link">
						<a href="<?php echo url('/admin/orders') ?>"><i class="fa fa-motorcycle"></i> <span>Orders</span></a>
					</li>
					<li id="ads-link" class="sidebar-link">
						<a href="<?php echo url('/admin/stories') ?>"><i class="fa fa-pencil-square-o"></i> <span>Success Stories</span></a>
					</li>
					<li id="ads-link" class="sidebar-link">
						<a href="<?php echo url('/admin/plans') ?>"><i class="fa fa-leaf"></i> <span>Nutrtion Plans</span></a>
					</li>
					<li id="settings-link" class="sidebar-link">
						<a href="<?php echo url('/admin/settings') ?>"><i class="fa fa-cog"></i> <span>Settings</span></a>
					</li>
				</ul>
				<!-- /.sidebar-menu -->
			</section>
			<!-- /.sidebar -->
		</aside>