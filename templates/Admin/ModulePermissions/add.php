<div class="col-12 grid-margin stretch-card">
 	<div class="card">
 		<div class="card-body">
 			<h4 class="card-title">Add Module Permission</h4>
 			<p class="card-description"></p>
 			<?= $this->Form->create($modulePermission, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
 			<div class="form-group">
 				<label for="exampleInputName1">Select Role</label>
 				<?php echo $this->Form->select('role_id', $roles, [
						'id' => 'exampleInputName1',
						'class' => 'form-control',
						'placeholder' => 'Select Role Name',
						'label' => false,
						'div' => false
					]); ?>
 			</div>
 			<div class="form-group">
 				<label for="exampleInputName1">Select Module</label>
 				<?php echo $this->Form->select('module_id', $modules, [
						'id' => 'exampleInputName1',
						'class' => 'form-control',
						'placeholder' => 'Select Module Name',
						'label' => false,
						'div' => false
					]); ?>
 			</div>
 			<div class="form-check form-check-flat form-check-primary">
 				<label class="form-check-label">
 					<?php echo $this->Form->checkbox('perm_view', [
							'class' => 'form-check-input'
						]); ?>
 					<?= __('View Permission') ?>
 				</label>
 			</div>
 			<div class="form-check form-check-flat form-check-primary">
 				<label class="form-check-label">
 					<?php echo $this->Form->checkbox('perm_insert', [
							'class' => 'form-check-input'
						]); ?>
 					<?= __('Insert Permission') ?>
 				</label>
 			</div>
 			<div class="form-check form-check-flat form-check-primary">
 				<label class="form-check-label">
 					<?php echo $this->Form->checkbox('perm_update', [
							'class' => 'form-check-input'
						]); ?>
 					<?= __('Update Permission') ?>
 				</label>
 			</div>
 			<div class="form-check form-check-flat form-check-primary">
 				<label class="form-check-label">
 					<?php echo $this->Form->checkbox('perm_delete', [
							'class' => 'form-check-input'
						]); ?>
 					<?= __('Delete Permission') ?>
 				</label>
 			</div>

 			<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary me-2']) ?>
 			<?= $this->Form->end() ?>
 		</div>
 	</div>
 </div>