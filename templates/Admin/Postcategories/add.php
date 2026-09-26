<div class="main-content" ng-app="product" ng-controller="productCrt">
    <div class="content-wrapper">
        <section id="horizontal-form-layouts">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="px-3">

                                <?= $this->Form->create($postcategory, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>

                                <div class="form-body">
                                    <h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Post Category'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>



                                    <div class="form-group row">
                                        <label for="title" class="col-md-3 label-control"><?= __('Post Name') ?></label>
                                        <div class="col-sm-9">
                                            <?php echo $this->Form->input('name', ['class' => 'form-control', 'label' => false, 'div' => false]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-md-3 label-control"><?= __('Details') ?></label>
                                        <div class="col-sm-9">
                                            <?php echo $this->Form->control('details', ['class' => 'form-control ckeditor', 'label' => false, 'div' => false]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="meta_title" class="col-md-3 label-control"><?= __('Meta Title') ?></label>
                                        <div class="col-sm-9">
                                            <?= $this->Form->input('meta_title', ['class' => 'form-control', 'label' => false, 'div' => false]); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="meta_keywords" class="col-md-3 label-control"><?= __('Meta Keywords') ?></label>
                                        <div class="col-sm-9">
                                            <?= $this->Form->input('meta_keywords', ['class' => 'form-control', 'label' => false, 'div' => false]); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="robots" class="col-md-3 label-control"><?= __('Robots') ?></label>
                                        <div class="col-sm-9">
                                            <?= $this->Form->input('robots', ['class' => 'form-control', 'label' => false, 'div' => false]); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="canonical" class="col-md-3 label-control"><?= __('Canonical') ?></label>
                                        <div class="col-sm-9">
                                            <?= $this->Form->input('canonical', ['class' => 'form-control', 'label' => false, 'div' => false]); ?>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="meta_description" class="col-md-3 label-control"><?= __('Meta Description') ?></label>
                                        <div class="col-sm-9">
                                            <?= $this->Form->input('meta_description', ['class' => 'form-control', 'label' => false, 'div' => false]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="logo" class="col-md-3 label-control"><?= __('Banner Photo') ?></label>
                                        <div class="col-sm-9">
                                            <?php echo $this->Form->input('banner_photo', ['type' => 'file', 'empty' => true, 'label' => false, 'div' => false]); ?>
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