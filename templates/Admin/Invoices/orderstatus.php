<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Order Status</h4>
			<p class="card-description"></p>
			<?= $this->Form->create($Invoice1, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
			<div class="form-group">
				<label for="exampleInputName1">Order Status</label>
				
					<?php
					$order_status = [
						'0' => 'Processing',
						'1' => 'Confirmed',
						'4' => 'In Transit',
						'2' => 'Delivered',
						'3' => 'Cancelled',
					];
					echo $this->Form->select('order_status', $order_status, ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
					?>
				
			</div>


			<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary me-2']) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>
<?php $this->Html->script(['/js/ckeditor/ckeditor', 'ckeditor-custom-config'], ['block' => 'scriptBottom']) ?>