<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Zone Pincode'), ['action' => 'edit', $zonePincode->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Zone Pincode'), ['action' => 'delete', $zonePincode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zonePincode->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Zone Pincodes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone Pincode'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Zones'), ['controller' => 'Zones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Zone'), ['controller' => 'Zones', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="zonePincodes view large-9 medium-8 columns content">
    <h3><?= h($zonePincode->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Zone') ?></th>
            <td><?= $zonePincode->has('zone') ? $this->Html->link($zonePincode->zone->name, ['controller' => 'Zones', 'action' => 'view', $zonePincode->zone->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($zonePincode->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Pincode') ?></th>
            <td><?= $this->Number->format($zonePincode->pincode) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Active') ?></th>
            <td><?= $zonePincode->is_active ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Is Deleted') ?></th>
            <td><?= $zonePincode->is_deleted ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
