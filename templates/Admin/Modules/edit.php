<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Edit Module</h4>
			<p class="card-description"></p>
			<?= $this->Form->create($module, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
			<div class="form-group">
				<label for="exampleInputName1">Name</label>
				<?php echo $this->Form->input('name', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Enter Name',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Caption</label>
				<?php echo $this->Form->input('caption', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Enter Caption',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Icon</label>
				<?php echo $this->Form->input('icon', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Enter Icon',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Order</label>
				<?php echo $this->Form->input('order_by', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Enter Order',
					'label' => false,
					'div' => false
				]); ?>
			</div>

			<div class="form-group">
				<label for="exampleInputName1">Access Type</label>
				<?php echo $this->Form->control('access_type', [
					'options' => $access_type,
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Select User Type',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary me-2']) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>