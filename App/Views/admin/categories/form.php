	<!-- Modal -->
	<div class="modal fade" id="<?php echo $target; ?>" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" id="myModalLabel"><?php echo $heading; ?></h4>
				</div>
				<div class="modal-body">
					<form class="form-modal" action="<?php echo $action ?>">
						<div id="form-results">
							<!-- errors results here -->  
						</div>
						<div class="form-group col-sm-6">
							<label>Category: English name</label>
							<input type="text" class="form-control" name="name"  placeholder="English name" value="<?php echo $name ?>">
						</div>
						<div class="form-group col-sm-6">
							<label>Category: Arabic name</label>
							<input type="text" class="form-control" name="name_ar"  placeholder="Arabic name" value="<?php echo $name_ar ?>">
						</div>
						<div class="form-group col-sm-12">
							<label for="status">Status</label>   <!-- <?php echo $status == 'disabled' ? 'selected': false; ?> -->
							<select class="form-control" id="status" name="status" <?php echo $status == 'disabled' ? 'selected': false; ?>>
								<option value="enabled">Enabled</option>
								<option value="disabled" >Disabled</option>
							</select>
						</div>
						<div class="form-group col-sm-6">
							<label>Image</label>
							<input type="file" class="form-control" name="image" value="<?php echo $image; ?>">
						</div>
						<?php if ($image) { ?>
						<div class="text-center form-group col-sm-6">
							<img style="max-height: 80px; max-width: 80px; border-radius: 50%;" src="<?php echo $image; ?>">
						</div>
						<?php } ?>
						<div class="form-group col-sm-12">
						<button class="btn btn-info submit-btn">Submit</button>
						</div>
						<div class="clearfix"></div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>