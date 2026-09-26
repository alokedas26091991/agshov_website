

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
                                            <?= __('Give Appointment Date') ?></label>
                                        <div class="col-sm-4">
                                            <?php
                                            echo $this->Form->date('appointment_date', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Give Appointment Time') ?></label>
                                        <div class="col-sm-4">
                                            <?php
                                            echo $this->Form->time('appointment_time', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Appointment Type') ?></label>
                                        <div class="col-sm-4">
                                            <?php
                                            echo $this->Form->select('appointment_type', [
                                                0 => 'Video Consult',
                                                1 => 'At Clinit',
                                                
                                            ], [
                                                'class' => 'form-control',
                                                'empty' => '-- Select Status --'
                                            ]);
                                            ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Video Link[Online Consultant]') ?></label>
                                        <div class="col-sm-4">
                                            <?php
                                            echo $this->Form->control('video_link', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Package Amount') ?></label>
                                        <div class="col-sm-4">
                                            <?php
                                            echo $this->Form->input('package_amount', ['class' => 'form-control', 'empty' => true, 'label' => false, 'div' => false]);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                            <?= __('Payment Mode') ?></label>
                                        <div class="col-sm-4">
                                            <?php
                                            echo $this->Form->select('payment_mode', [
                                                0 => 'Offline',
                                                1 => 'Online',
                                               
                                            ], [
                                                'class' => 'form-control',
                                                'empty' => '-- Select Payment Mode --'
                                            ]);
                                            ?>
                                        </div>
                                    </div>
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