<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">User Role</h4>
			<p class="card-description"></p>
			<?= $this->Form->create($userRole, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
			<div class="form-group">
				<label for="exampleInputName1">Select Role</label>

				<select name="role_id" class="form-control">
					<?php
					foreach ($roles as $r) {
					?>
						<option value="<?= $r->id ?>" <?= $userroles->role_id == $r->id ? ' selected="selected"' : ''; ?>><?= $r->role_name ?></option>
					<?php
					}
					?>
				</select>
			</div>
			<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary me-2']) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>