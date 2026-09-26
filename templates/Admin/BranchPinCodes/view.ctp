<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Branch Pin Code'), ['action' => 'edit', $branchPinCode->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Branch Pin Code'), ['action' => 'delete', $branchPinCode->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branchPinCode->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Branch Pin Codes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch Pin Code'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pin Codes'), ['controller' => 'PinCodes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pin Code'), ['controller' => 'PinCodes', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="branchPinCodes view col-lg-10 col-md-9 columns">
    <h2><?= h($branchPinCode->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Branch') ?></h6>
                    <p><?= $branchPinCode->has('branch') ? $this->Html->link($branchPinCode->branch->name, ['controller' => 'Branches', 'action' => 'view', $branchPinCode->branch->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Pin Code') ?></h6>
                    <p><?= $branchPinCode->has('pin_code') ? $this->Html->link($branchPinCode->pin_code->id, ['controller' => 'PinCodes', 'action' => 'view', $branchPinCode->pin_code->id]) : '' ?></p>
					
					
					
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($branchPinCode->id) ?></p>
                    <h6 class="subheader"><?= __('Is Deleted') ?></h6>
                    <p><?= $this->Number->format($branchPinCode->is_deleted) ?></p>
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
