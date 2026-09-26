<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Product Charge'), ['action' => 'edit', $productCharge->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product Charge'), ['action' => 'delete', $productCharge->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productCharge->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Product Charges'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product Charge'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="productCharges view col-lg-10 col-md-9 columns">
    <h2><?= h($productCharge->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($productCharge->name) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($productCharge->id) ?></p>
                    <h6 class="subheader"><?= __('Value') ?></h6>
                    <p><?= $this->Number->format($productCharge->value) ?></p>
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
                    <td>  <p><?= $productCharge->is_active ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $productCharge->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
