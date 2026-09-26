<div class="col-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Edit Page</h4>
			<p class="card-description"></p>
			<?= $this->Form->create($advertisement, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
			<div class="form-group">
				<label for="exampleInputName1">Select Page</label>
				<select name="page_name" class="form-control" required>
					<option>Select Page</option>
					<option value="11" <?php if ($advertisement->page_name == '11') echo "selected"; ?>>Home</option>
					<option value="1" <?php if ($advertisement->page_name == '1') echo "selected"; ?>>About</option>
					<option value="2" <?php if ($advertisement->page_name == '2') echo "selected"; ?>>Contact Us</option>
					<option value="5" <?php if ($advertisement->page_name == '5') echo "selected"; ?>>Our Trending Products</option>
					<option value="6" <?php if ($advertisement->page_name == '6') echo "selected"; ?>>Top Selling Products</option>
					
					<option value="12" <?php if ($advertisement->page_name == '12') echo "selected"; ?>>Terms and Conditions</option>
					<option value="13" <?php if ($advertisement->page_name == '13') echo "selected"; ?>>Privacy Policy</option>
					<option value="14" <?php if ($advertisement->page_name == '14') echo "selected"; ?>>Return Policy</option>
					<option value="15" <?php if ($advertisement->page_name == '15') echo "selected"; ?>>Shipping and Delivery</option>
				</select>
			</div>
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
				<label for="exampleInputName1">Details</label>
				<?php echo $this->Form->textarea('details', [
					'id' => 'exampleInputName1',
					'class' => 'form-control ckeditor',
					'placeholder' => 'Name',
					'label' => false,
					'div' => false
				]); ?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Photo</label>
				<?php
				echo $this->Form->input('photo', ['id' => 'exampleInputName1', 'class' => 'form-control', 'type' => 'file', 'empty' => true, 'label' => false, 'div' => false]);
				?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Section</label>
				<?php
				echo $this->Form->input('section', ['id' => 'exampleInputName1', 'class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
				?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Order</label>
				<?php
				echo $this->Form->input('ord', ['id' => 'exampleInputName1', 'class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
				?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Link</label>
				<?php
				echo $this->Form->input('link', ['id' => 'exampleInputName1', 'class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
				?>
			</div>
			<div class="form-group">
				<label for="exampleInputName1">Products</label><br>
				<?php
				$products_ids = explode(",", $advertisement->products);
				foreach ($product1 as $may) {
				?>
					<label class="dropdown-option">
						<input type="checkbox" name="products[]" value="<?= $may->id ?>" <?php if (in_array($may->id, $products_ids)) echo "checked" ?> />
						<?= $may->name ?>
					</label>
				<?php
				}
				?>
			</div>
			<div class="form-check form-check-flat form-check-primary">
				<label class="form-check-label">
					<?= __('Status') ?>
					<?php echo $this->Form->checkbox('is_active', [
						'class' => 'form-check-input'
					]); ?>
				</label>
			</div>
			<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary me-2']) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>
<?php $this->Html->script(['/js/ckeditor/ckeditor', 'ckeditor-custom-config'], ['block' => 'scriptBottom']) ?>