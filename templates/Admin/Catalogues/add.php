

<div class="main-content" ng-app="product" ng-controller="productCrt">
    <div class="content-wrapper">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-3">

                                <?= $this->Form->create($catalogue, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
                                <div class="form-body">
                                    <h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Catalogue List'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>

                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Title') ?></label>
                                        <div class="col-sm-9">
                                            <?php
                                            echo $this->Form->input('title', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Pdf Link') ?></label>
                                        <div class="col-sm-9">
                                           
                                            <?= $this->Form->control('pdf_link', ['type' => 'file', 'class' => 'form-control', 'label' => false]) ?>
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