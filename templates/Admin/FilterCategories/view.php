<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Filter Category'), ['action' => 'edit', $filterCategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Filter Category'), ['action' => 'delete', $filterCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filterCategory->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Filter Categories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Filter Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Filters'), ['controller' => 'Filters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Filter'), ['controller' => 'Filters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="filterCategories view col-lg-10 col-md-9 columns">
    <h2><?= h($filterCategory->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Filter') ?></h6>
                    <p><?= $filterCategory->has('filter') ? $this->Html->link($filterCategory->filter->name, ['controller' => 'Filters', 'action' => 'view', $filterCategory->filter->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Category') ?></h6>
                    <p><?= $filterCategory->has('category') ? $this->Html->link($filterCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $filterCategory->category->id]) : '' ?></p>
					
					
					
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($filterCategory->id) ?></p>
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
                    <td>  <p><?= $filterCategory->is_active ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $filterCategory->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
