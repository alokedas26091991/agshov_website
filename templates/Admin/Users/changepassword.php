<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Change Password</h4>
			<p class="card-description"></p>
			<?= $this->Form->create($user, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
			<div class="form-group">
				<label for="exampleInputName1">Create Password</label>
				<?php echo $this->Form->input('password', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Enter New Password',
					'label' => false,
					'div' => false,
					'value' => ""
				]); ?>
			</div>
			<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary me-2']) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>