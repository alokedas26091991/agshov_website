<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Bookings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Booking'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookings view content">
            <h3><?= h($booking->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $booking->has('user') ? $this->Html->link($booking->user->id, ['controller' => 'Users', 'action' => 'view', $booking->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Patient Name') ?></th>
                    <td><?= h($booking->patient_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sex') ?></th>
                    <td><?= h($booking->sex) ?></td>
                </tr>
                <tr>
                    <th><?= __('Patient Mobile') ?></th>
                    <td><?= h($booking->patient_mobile) ?></td>
                </tr>
                <tr>
                    <th><?= __('Patient Email') ?></th>
                    <td><?= h($booking->patient_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Servicecategory') ?></th>
                    <td><?= $booking->has('servicecategory') ? $this->Html->link($booking->servicecategory->name, ['controller' => 'Servicecategories', 'action' => 'view', $booking->servicecategory->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Servicesubcategory') ?></th>
                    <td><?= $booking->has('servicesubcategory') ? $this->Html->link($booking->servicesubcategory->name, ['controller' => 'Servicesubcategories', 'action' => 'view', $booking->servicesubcategory->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Package') ?></th>
                    <td><?= $booking->has('package') ? $this->Html->link($booking->package->name, ['controller' => 'Packages', 'action' => 'view', $booking->package->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($booking->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Age') ?></th>
                    <td><?= $this->Number->format($booking->age) ?></td>
                </tr>
                <tr>
                    <th><?= __('No Of Bookings') ?></th>
                    <td><?= $this->Number->format($booking->no_of_bookings) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($booking->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Service End Date') ?></th>
                    <td><?= h($booking->service_end_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($booking->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($booking->updated_at) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Booking Details') ?></h4>
                <?php if (!empty($booking->booking_details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Booking Id') ?></th>
                            <th><?= __('Expected Appointment Date') ?></th>
                            <th><?= __('Expected Appointment Time') ?></th>
                            <th><?= __('Booking Type') ?></th>
                            <th><?= __('Appointment Details') ?></th>
                            <th><?= __('Appointment Type') ?></th>
                            <th><?= __('Package Amount') ?></th>
                            <th><?= __('Appointment Date') ?></th>
                            <th><?= __('Appointment Time') ?></th>
                            <th><?= __('Video Link') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($booking->booking_details as $bookingDetails) : ?>
                        <tr>
                            <td><?= h($bookingDetails->id) ?></td>
                            <td><?= h($bookingDetails->booking_id) ?></td>
                            <td><?= h($bookingDetails->expected_appointment_date) ?></td>
                            <td><?= h($bookingDetails->expected_appointment_time) ?></td>
                            <td><?= h($bookingDetails->booking_type) ?></td>
                            <td><?= h($bookingDetails->appointment_details) ?></td>
                            <td><?= h($bookingDetails->appointment_type) ?></td>
                            <td><?= h($bookingDetails->package_amount) ?></td>
                            <td><?= h($bookingDetails->appointment_date) ?></td>
                            <td><?= h($bookingDetails->appointment_time) ?></td>
                            <td><?= h($bookingDetails->video_link) ?></td>
                            <td><?= h($bookingDetails->status) ?></td>
                            <td><?= h($bookingDetails->created_at) ?></td>
                            <td><?= h($bookingDetails->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'BookingDetails', 'action' => 'view', $bookingDetails->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'BookingDetails', 'action' => 'edit', $bookingDetails->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'BookingDetails', 'action' => 'delete', $bookingDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookingDetails->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
