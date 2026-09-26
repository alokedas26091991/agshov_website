

<div class="main-content">
    <div class="content-wrapper">
        <section id="horizontal-form-layouts">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="px-3">
                                <?= $this->Form->create($booking, ['type' => 'file', 'class' => 'form form-horizontal'], array('enctype' => 'multipart/form-data')); ?>
                                <div class="form-body">
                                    <h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Booking Details'), ['action' => 'index']) ?> <?= __('Edit') ?> </h4>
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Status') ?></label>
                                        <div class="col-sm-4">
                                            <?php
                                            echo $this->Form->select('status', [
                                                0 => 'Pending',
                                                2 => 'Confirmed',
                                                3 => 'Cancelled',
                                                4 => 'Completed',
                                            ], [
                                                'class' => 'form-control',
                                                'empty' => '-- Select Status --'
                                            ]);
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