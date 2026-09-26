<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Filter Option'), ['action' => 'edit', $filterOption->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Filter Option'), ['action' => 'delete', $filterOption->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filterOption->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Filter Options'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Filter Option'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Filters'), ['controller' => 'Filters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Filter'), ['controller' => 'Filters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Product Filter Option Values'), ['controller' => 'ProductFilterOptionValues', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Filter Option Value'), ['controller' => 'ProductFilterOptionValues', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="filterOptions view col-lg-10 col-md-9 columns">
    <h2><?= h($filterOption->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Filter') ?></h6>
                    <p><?= $filterOption->has('filter') ? $this->Html->link($filterOption->filter->name, ['controller' => 'Filters', 'action' => 'view', $filterOption->filter->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($filterOption->name) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($filterOption->id) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns booleans end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
                  
					
					
		<tr>
                   <th><?= __('Is Active') ?></th>
                    <td>  <p><?= $filterOption->is_active ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $filterOption->is_deleted ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
</table>
					</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row texts">
        <div class="columns col-lg-9">
            <div class="panel panel-default">
                <div class="panel-body">
				 <div class="table-responsive">
        <table class="table">
           
				</table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related ProductFilterOptionValues') ?></h4>
    <?php if (!empty($filterOption->product_filter_option_values)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Filter Option Id') ?></th>
                <th><?= __('Filter Value') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($filterOption->product_filter_option_values as $productFilterOptionValues): ?>
            <tr>
                <td><?= h($productFilterOptionValues->id) ?></td>
                <td><?= h($productFilterOptionValues->product_id) ?></td>
                <td><?= h($productFilterOptionValues->filter_option_id) ?></td>
                <td><?= h($productFilterOptionValues->filter_value) ?></td>
                <td><?= h($productFilterOptionValues->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'ProductFilterOptionValues', 'action' => 'view', $productFilterOptionValues->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'ProductFilterOptionValues', 'action' => 'edit', $productFilterOptionValues->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'ProductFilterOptionValues', 'action' => 'delete', $productFilterOptionValues->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productFilterOptionValues->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
