<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\HappyCustomer $happyCustomer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Happy Customer'), ['action' => 'edit', $happyCustomer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Happy Customer'), ['action' => 'delete', $happyCustomer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $happyCustomer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Happy Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Happy Customer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="happyCustomers view content">
            <h3><?= h($happyCustomer->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($happyCustomer->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($happyCustomer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $happyCustomer->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Video Link') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($happyCustomer->video_link)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
