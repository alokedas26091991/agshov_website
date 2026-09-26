<div class="main-content">
    <div class="content-wrapper">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-3">
                                <?= $this->Form->create($package, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
                                <div class="form-body">
                                    <h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Packages'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
                                    <div class="form-group row">
                                        <label for="title" class="col-md-3 label-control"><?= __('Package Name') ?></label>
                                        <div class="col-sm-9">
                                            <?php echo $this->Form->input('name', ['class' => 'form-control', 'required', 'label' => false, 'div' => false]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="title" class="col-md-3 label-control"><?= __('Price') ?></label>
                                        <div class="col-sm-9">
                                            <?php echo $this->Form->control('price', ['class' => 'form-control', 'required', 'label' => false, 'div' => false]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="status" class="col-md-3 label-control"><?= __('Status') ?></label>
                                        <div class="col-sm-9">
                                            <?php echo $this->Form->input('is_active', ['type' => 'checkbox', 'checked' => $package->is_active == 1, 'class' => 'onoffswitch-checkbox']); ?>
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