<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Zone Seller'), ['action' => 'edit', $zoneSeller->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Zone Seller'), ['action' => 'delete', $zoneSeller->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zoneSeller->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Zone Sellers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone Seller'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zones'), ['controller' => 'Zones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone'), ['controller' => 'Zones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="zoneSellers view large-9 medium-8 columns content">
    <h3><?= h($zoneSeller->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Zone') ?></th>
            <td><?= $zoneSeller->has('zone') ? $this->Html->link($zoneSeller->zone->name, ['controller' => 'Zones', 'action' => 'view', $zoneSeller->zone->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($zoneSeller->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Seller Id') ?></th>
            <td><?= $this->Number->format($zoneSeller->seller_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Active') ?></th>
            <td><?= $zoneSeller->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Deleted') ?></th>
            <td><?= $zoneSeller->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
