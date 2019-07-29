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
							<label>Users Groups name</label>
							<input type="text" class="form-control" name="name"  placeholder="Users Groups Name" value="<?php echo $name ?>">
						</div>
						<div class="form-group col-sm-12">
							<label>Permission</label>
							<select class="form-control" name="pages[]" multiple="multiple">
								<?php foreach ($pages as $page) { ?>
								<option value="<?php echo $page; ?>" <?php echo in_array($page, $users_groups_pages) ? 'selected' : false ?>>
								<?php echo $page; ?>										
								</option>
								<?php } ?>
							</select>
						</div>
						<button class="btn btn-info submit-btn">Submit</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>