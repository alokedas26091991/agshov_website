<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Booking $booking
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $servicecategories
 * @var \Cake\Collection\CollectionInterface|string[] $servicesubcategories
 * @var \Cake\Collection\CollectionInterface|string[] $packages
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Bookings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bookings form content">
            <?= $this->Form->create($booking) ?>
            <fieldset>
                <legend><?= __('Add Booking') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('patient_name');
                    echo $this->Form->control('age');
                    echo $this->Form->control('sex');
                    echo $this->Form->control('patient_mobile');
                    echo $this->Form->control('patient_email');
                    echo $this->Form->control('category_id', ['options' => $servicecategories]);
                    echo $this->Form->control('subcategory_id', ['options' => $servicesubcategories]);
                    echo $this->Form->control('package_id', ['options' => $packages]);
                    echo $this->Form->control('no_of_bookings');
                    echo $this->Form->control('service_end_date');
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
