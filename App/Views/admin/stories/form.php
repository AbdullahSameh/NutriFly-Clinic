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
                        <div class="form-group col-sm-12">
							<label>Story Title</label>
							<input type="text" class="form-control" name="story_title"  placeholder="Story Title" value="<?php echo $story_title ?>">
						</div>
						<div class="form-group col-sm-6">
							<label>Story Name</label>
							<input type="text" class="form-control" name="story_name"  placeholder="Story Name" value="<?php echo $story_name ?>">
						</div>
						<div class="form-group col-sm-6">
							<label for="status">Status</label>
							<select class="form-control" id="status" name="status">
								<option value="enabled">Enabled</option>
								<option value="disabled" <?php echo $status == 'disabled' ? 'selected': false; ?>>Disabled</option>
							</select>
                        </div>
                        <div class="form-group col-sm-12">
							<label>Details</label>
							<textarea id="details" class="form-control" name="details" rows="5" cols="30">
								<?php echo $details ?>
							</textarea>
                        </div>
                        <div class="form-group col-sm-6">
							<label>Image</label>
							<input type="file" class="form-control" name="image" value="<?php echo $image ?>">
						</div>
						<?php if ($image) { ?>
						<div class="text-center form-group col-sm-6">
							<img style="margin-top: 10px; max-height: 110px; max-width: 110px; border-radius: 4px;" src="<?php echo $image ?>">
						</div>
						<?php } ?>
						<div class="form-group col-sm-12">
							<button class="btn btn-info submit-btn">Submit</button>
						</div>
						<div class="box-footer clearfix"></div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>