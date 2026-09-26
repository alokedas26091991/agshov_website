<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit User Branch'), ['action' => 'edit', $userBranch->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Branch'), ['action' => 'delete', $userBranch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userBranch->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List User Branches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Branch'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Branches'), ['controller' => 'Branches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['controller' => 'Branches', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="userBranches view col-lg-10 col-md-9 columns">
    <h2><?= h($userBranch->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Branch') ?></h6>
                    <p><?= $userBranch->has('branch') ? $this->Html->link($userBranch->branch->name, ['controller' => 'Branches', 'action' => 'view', $userBranch->branch->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('User') ?></h6>
                    <p><?= $userBranch->has('user') ? $this->Html->link($userBranch->user->id, ['controller' => 'Users', 'action' => 'view', $userBranch->user->id]) : '' ?></p>
					
					
					
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($userBranch->id) ?></p>
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
                    <td>  <p><?= $userBranch->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
