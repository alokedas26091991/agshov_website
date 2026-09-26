<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Add Testimonials</h4>
            <p class="card-description"></p>
            <?= $this->Form->create($testimonial, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
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
                <?php echo $this->Form->control('details', [
                    'id' => 'exampleInputName1',
                    'class' => 'form-control ckeditor',
                    'placeholder' => 'Details',
                    'label' => false,
                    'div' => false
                ]); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Order</label>
                <?php echo $this->Form->input('ord', [
                    'id' => 'exampleInputName1',
                    'class' => 'form-control',
                    'placeholder' => 'Order',
                    'label' => false,
                    'div' => false
                ]); ?>
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Image</label>
                <?php echo $this->Form->input('image', [
                    'id' => 'exampleInputName1',
                    'class' => 'form-control',
                    'placeholder' => 'Image',
                    'label' => false,
                    'div' => false,
                    'type' => 'file'
                ]); ?>
            </div>

            <div class="form-check form-check-flat form-check-primary">
                <label class="form-check-label">
                    <?php echo $this->Form->checkbox('status', [
                        'class' => 'form-check-input'
                    ]); ?>
                    <?= __('Status') ?>
                </label>
            </div>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary me-2']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?php $this->Html->script(['/admin_template/ckeditor/ckeditor'], ['block' => 'scriptBottom']) ?>