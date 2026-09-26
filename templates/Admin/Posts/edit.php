

<div class="main-content" ng-app="product" ng-controller="productCrt">
    <div class="content-wrapper">
        <section id="horizontal-form-layouts">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="px-3">
                            <?= $this->Form->create($post, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>

                                <div class="form-body">
                                    <h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Post'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>


                                    <div class="form-group row">
                            <label for="title" class="col-md-3 label-control"><?= __('Title') ?></label>
                            <div class="col-sm-9">
                                <?= $this->Form->input('title', ['class' => 'form-control', 'label' => false, 'div' => false]); ?>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="title" class="col-md-3 label-control"><?= __('Post Type') ?></label>
                            <div class="col-sm-9">

                                <?= $this->Form->input('post_type', [
                                    'type' => 'select',

                                    'options' => [
                                        1 => 'Published',
                                        0 => 'Unpublished'
                                    ],
                                    'default' => $post->post_type,
                                    'class' => 'form-control',
                                    'div' => false
                                ]); ?>

                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 label-control"><?= __('Categories') ?></label>
                            <div class="col-sm-9" style="border: 1px solid black; padding: 12px;">
                                <?php
                                foreach ($postcategories as $p) {
                                ?>
                                    <label for="category"> <?= $p->name ?></label>
                                    <input type="checkbox" name="category[]" value="<?= $p->id ?>" <?= in_array($p->id, $savedCategories) ? 'checked' : '' ?> />
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 label-control"><?= __('Tags') ?></label>
                            <div class="col-sm-9" style="border: 1px solid black; padding: 12px;">
                                <?php
                                foreach ($tags as $p1) {
                                ?>
                                    <label for="tag"> <?= $p1->name ?></label>
                                    <input type="checkbox" name="tag[]" value="<?= $p1->id ?>" <?= in_array($p1->id, $savedTags) ? 'checked' : '' ?> />
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                        



                        <div class="form-group row">
                            <label for="details" class="col-md-3 label-control"><?= __('Details') ?></label>
                            <div class="col-sm-9">
                                <?= $this->Form->control('details', ['class' => 'form-control ckeditor', 'label' => false, 'div' => false]); ?>
                            </div>
                        </div>


                        <div class="form-group row" style="display:none;">
                            <label for="status" class="col-md-3 label-control"><?= __('Status') ?></label>
                            <div class="col-sm-9">

                                <?php echo $this->Form->input('status', ['type' => 'checkbox', 'checked' => $post->status == 1, 'class' => 'onoffswitch-checkbox']); ?>
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
                            <label for="banner_photo" class="col-md-3 label-control"><?= __('Banner Photo') ?></label>
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