<div class="main-content" ng-app="product" ng-controller="productCrt">
    <div class="content-wrapper">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-3">
                                <?= $this->Form->create($disease, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
                                <div class="form-body">
                                    <h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Disease'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
                                    <div class="form-group row">
                                        <label for="fb" class="col-md-3 label-control"><?= __('Name') ?></label>
                                        <div class="col-sm-9">
                                            <?php echo $this->Form->input('name', ['class' => 'form-control', 'label' => false, 'div' => false]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fb" class="col-md-3 label-control"><?= __('Title') ?></label>
                                        <div class="col-sm-9">
                                            <?php echo $this->Form->input('title', ['class' => 'form-control', 'label' => false, 'div' => false]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="twtr" class="col-md-3 label-control"><?= __('Details') ?></label>
                                        <div class="col-sm-9">
                                            <?php echo $this->Form->control('details', ['class' => 'form-control ckeditor', 'label' => false, 'div' => false]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-md-3 label-control"><?= __('Status') ?></label>
                                        <div class="col-sm-9">
                                            <?php echo $this->Form->input('is_active', ['type' => 'checkbox', 'checked' => $disease->is_active == 1, 'class' => 'onoffswitch-checkbox']); ?>
                                        </div>
                                    </div>
                                    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>
<?php $this->Html->script(['/admin_template/ckeditor/ckeditor'], ['block' => 'scriptBottom']) ?>