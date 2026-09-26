<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Edit Email</h4>
			<p class="card-description"></p>
			<?= $this->Form->create($email, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
			<div class="form-group">
				<label for="exampleInputName1">Name</label>
				<?php echo $this->Form->input('name', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Name',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Subject</label>
				<?php echo $this->Form->control('subject', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'subject',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Body</label>
				<?php echo $this->Form->control('body', [
					'id' => 'exampleInputName1',
					'class' => 'form-control ckeditor',
					'placeholder' => 'Body',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Send From</label>
				<?php echo $this->Form->control('send_from', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Send From',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Type</label>
				<?php echo $this->Form->control('send_from_name', [
					'id' => 'exampleInputName1',
					'class' => 'form-control',
					'placeholder' => 'Type',
					'label' => false,
					'div' => false
				]); ?>
			</div>

			<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary me-2']) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>
<?php $this->Html->script(['/js/ckeditor/ckeditor', 'ckeditor-custom-config'], ['block' => 'scriptBottom']) ?>