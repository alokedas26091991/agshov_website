<div class="main-content" ng-app="product" ng-controller="productCrt">
    <div class="content-wrapper">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-3">
                            <?= $this->Form->create($brandlogo, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
                                <div class="form-body">
                                    <h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Valued Customer'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
                                    <div class="form-group row">
                                        <label for="favicon" class="col-md-3 label-control"><?= __('Banner Image') ?></label>
                                        <div class="col-sm-9">
                                            <?= $this->Form->control('logo', [
                                                'class' => 'form-control',
                                                'type' => 'file',
                                                'label' => false,
                                                'div' => false,
                                                'required' => $brandlogo->isNew() ? true : false
                                            ]); ?>
                                            <?php if (!$brandlogo->isNew() && !empty($brandlogo->logo)) : ?>
                                                <p>Current Photo: <a href="<?php echo $this->Url->image("upload/Post/$brandlogo->logo", ['pathPrefix' => '']) ?>"><img src="<?php echo $this->Url->image("upload/Post/$brandlogo->logo", ['pathPrefix' => '']) ?>" style="height:100px;width:100px;" /></a></p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Is Active') ?></label>
                                        <div class="col-sm-9">
                                            <?php
                                            echo $this->Form->checkbox('is_active', ['class' => 'onoffswitch-checkbox', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div> <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</div>