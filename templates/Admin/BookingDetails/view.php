<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\BookingDetail $bookingDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Booking Detail'), ['action' => 'edit', $bookingDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Booking Detail'), ['action' => 'delete', $bookingDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookingDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Booking Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Booking Detail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookingDetails view content">
            <h3><?= h($bookingDetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Booking') ?></th>
                    <td><?= $bookingDetail->has('booking') ? $this->Html->link($bookingDetail->booking->id, ['controller' => 'Bookings', 'action' => 'view', $bookingDetail->booking->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bookingDetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Package Amount') ?></th>
                    <td><?= $this->Number->format($bookingDetail->package_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($bookingDetail->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Expected Appointment Date') ?></th>
                    <td><?= h($bookingDetail->expected_appointment_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Expected Appointment Time') ?></th>
                    <td><?= h($bookingDetail->expected_appointment_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Appointment Date') ?></th>
                    <td><?= h($bookingDetail->appointment_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Appointment Time') ?></th>
                    <td><?= h($bookingDetail->appointment_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($bookingDetail->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($bookingDetail->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Booking Type') ?></th>
                    <td><?= $bookingDetail->booking_type ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Appointment Type') ?></th>
                    <td><?= $bookingDetail->appointment_type ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Appointment Details') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($bookingDetail->appointment_details)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Video Link') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($bookingDetail->video_link)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
