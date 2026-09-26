<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Edit Role</h4>
			<p class="card-description"></p>
			<?= $this->Form->create($role, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
			<div class="form-group">
				<label for="exampleInputName1">Role Name</label>
				<?php echo $this->Form->input('role_name', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Enter Name',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary me-2']) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>