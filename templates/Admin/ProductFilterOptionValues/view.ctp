<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Product Filter Option Value'), ['action' => 'edit', $productFilterOptionValue->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Filter Option Value'), ['action' => 'delete', $productFilterOptionValue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productFilterOptionValue->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Product Filter Option Values'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Filter Option Value'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Filter Options'), ['controller' => 'FilterOptions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Filter Option'), ['controller' => 'FilterOptions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="productFilterOptionValues view col-lg-10 col-md-9 columns">
    <h2><?= h($productFilterOptionValue->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Product') ?></h6>
                    <p><?= $productFilterOptionValue->has('product') ? $this->Html->link($productFilterOptionValue->product->name, ['controller' => 'Products', 'action' => 'view', $productFilterOptionValue->product->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Filter Option') ?></h6>
                    <p><?= $productFilterOptionValue->has('filter_option') ? $this->Html->link($productFilterOptionValue->filter_option->name, ['controller' => 'FilterOptions', 'action' => 'view', $productFilterOptionValue->filter_option->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Filter Value') ?></h6>
                    <p><?= h($productFilterOptionValue->filter_value) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($productFilterOptionValue->id) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns booleans end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $productFilterOptionValue->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
