<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="<?php echo url('/') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section>
	
	<!-- Main content -->
	<section class="content">
		
	</section>
<!-- /.content -->
</div>


<!-- <script type="text/javascript">
	$('form').on('submit', function (e) {
		e.preventDefault();
		var form = $(this);
		var sendData = new FormData(form[0]);

		$.ajax({
			url: form.attr('action'),
			type: 'post',
			data: sendData,
			dataType: 'json',
			success: function (r) {
				$('body').append(r);
			},
			cache: false,
			processData: false,
			contentType: false,
		});
	});
</script> -->