<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingDetail $bookingDetail
 * @var \Cake\Collection\CollectionInterface|string[] $bookings
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Booking Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookingDetails form content">
            <?= $this->Form->create($bookingDetail) ?>
            <fieldset>
                <legend><?= __('Add Booking Detail') ?></legend>
                <?php
                    echo $this->Form->control('booking_id', ['options' => $bookings]);
                    echo $this->Form->control('expected_appointment_date');
                    echo $this->Form->control('expected_appointment_time');
                    echo $this->Form->control('booking_type');
                    echo $this->Form->control('appointment_details');
                    echo $this->Form->control('appointment_type');
                    echo $this->Form->control('package_amount');
                    echo $this->Form->control('appointment_date');
                    echo $this->Form->control('appointment_time');
                    echo $this->Form->control('video_link');
                    echo $this->Form->control('status');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
