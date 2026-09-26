<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servicesubcategory $servicesubcategory
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Servicesubcategory'), ['action' => 'edit', $servicesubcategory->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Servicesubcategory'), ['action' => 'delete', $servicesubcategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servicesubcategory->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Servicesubcategories'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Servicesubcategory'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="servicesubcategories view content">
            <h3><?= h($servicesubcategory->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Servicecategory') ?></th>
                    <td><?= $servicesubcategory->has('servicecategory') ? $this->Html->link($servicesubcategory->servicecategory->name, ['controller' => 'Servicecategories', 'action' => 'view', $servicesubcategory->servicecategory->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($servicesubcategory->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($servicesubcategory->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($servicesubcategory->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Active') ?></th>
                    <td><?= $servicesubcategory->is_active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Deleted') ?></th>
                    <td><?= $servicesubcategory->is_deleted ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Name') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($servicesubcategory->name)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
