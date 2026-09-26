<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Filter'), ['action' => 'edit', $filter->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Filter'), ['action' => 'delete', $filter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filter->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Filters'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Filter'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Filter Categories'), ['controller' => 'FilterCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Filter Category'), ['controller' => 'FilterCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Filter Options'), ['controller' => 'FilterOptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Filter Option'), ['controller' => 'FilterOptions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="filters view col-lg-10 col-md-9 columns">
    <h2><?= h($filter->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($filter->name) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($filter->id) ?></p>
                    <h6 class="subheader"><?= __('Filter Type') ?></h6>
                    <p><?= $this->Number->format($filter->filter_type) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns booleans end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
                  
					
					
		<tr>
                   <th><?= __('Is Display') ?></th>
                    <td>  <p><?= $filter->is_display ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Active') ?></th>
                    <td>  <p><?= $filter->is_active ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $filter->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
    <h4 class="subheader"><?= __('Related FilterCategories') ?></h4>
    <?php if (!empty($filter->filter_categories)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Filter Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($filter->filter_categories as $filterCategories): ?>
            <tr>
                <td><?= h($filterCategories->id) ?></td>
                <td><?= h($filterCategories->filter_id) ?></td>
                <td><?= h($filterCategories->category_id) ?></td>
                <td><?= h($filterCategories->is_active) ?></td>
                <td><?= h($filterCategories->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'FilterCategories', 'action' => 'view', $filterCategories->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'FilterCategories', 'action' => 'edit', $filterCategories->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'FilterCategories', 'action' => 'delete', $filterCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filterCategories->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related FilterOptions') ?></h4>
    <?php if (!empty($filter->filter_options)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Filter Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($filter->filter_options as $filterOptions): ?>
            <tr>
                <td><?= h($filterOptions->id) ?></td>
                <td><?= h($filterOptions->filter_id) ?></td>
                <td><?= h($filterOptions->name) ?></td>
                <td><?= h($filterOptions->is_active) ?></td>
                <td><?= h($filterOptions->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'FilterOptions', 'action' => 'view', $filterOptions->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'FilterOptions', 'action' => 'edit', $filterOptions->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'FilterOptions', 'action' => 'delete', $filterOptions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filterOptions->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
