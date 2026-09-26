<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Edit Social Profile</h4>
			<p class="card-description"></p>
			<?= $this->Form->create($social, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>

			<div class="form-group">
				<label for="exampleInputName1">Footer Title</label>
				<?php echo $this->Form->input('title', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Name',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Address</label>
				<?php echo $this->Form->control('address', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Name',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Phone Number</label>
				<?php echo $this->Form->input('phone_1', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Name',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Alternative Phone Number</label>
				<?php echo $this->Form->input('phone_2', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Name',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Email</label>
				<?php echo $this->Form->input('email_1', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Name',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Facebook Link</label>
				<?php echo $this->Form->input('fb', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Name',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Instagram Link</label>
				<?php echo $this->Form->input('youtube', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Name',
					'label' => false,
					'div' => false
				]); ?>
			</div>

			<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary me-2']) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>