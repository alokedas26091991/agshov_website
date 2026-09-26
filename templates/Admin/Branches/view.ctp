<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Branch'), ['action' => 'edit', $branch->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Branch'), ['action' => 'delete', $branch->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branch->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Branches'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Branch Pin Codes'), ['controller' => 'BranchPinCodes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Branch Pin Code'), ['controller' => 'BranchPinCodes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Branches'), ['controller' => 'UserBranches', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Branch'), ['controller' => 'UserBranches', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="branches view col-lg-10 col-md-9 columns">
    <h2><?= h($branch->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($branch->name) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($branch->id) ?></p>
                    <h6 class="subheader"><?= __('Pincode') ?></h6>
                    <p><?= $this->Number->format($branch->pincode) ?></p>
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
                    <td>  <p><?= $branch->is_active ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $branch->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
           
									 <tr>
                   <th><?= __('Address') ?></th>
                    <td><?= $this->Text->autoParagraph(h($branch->address)); ?></td>
					</tr>
					</table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related BranchPinCodes') ?></h4>
    <?php if (!empty($branch->branch_pin_codes)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Branch Id') ?></th>
                <th><?= __('Pin Code Id') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($branch->branch_pin_codes as $branchPinCodes): ?>
            <tr>
                <td><?= h($branchPinCodes->id) ?></td>
                <td><?= h($branchPinCodes->branch_id) ?></td>
                <td><?= h($branchPinCodes->pin_code_id) ?></td>
                <td><?= h($branchPinCodes->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'BranchPinCodes', 'action' => 'view', $branchPinCodes->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'BranchPinCodes', 'action' => 'edit', $branchPinCodes->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'BranchPinCodes', 'action' => 'delete', $branchPinCodes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $branchPinCodes->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
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
    <h4 class="subheader"><?= __('Related UserBranches') ?></h4>
    <?php if (!empty($branch->user_branches)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Branch Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($branch->user_branches as $userBranches): ?>
            <tr>
                <td><?= h($userBranches->id) ?></td>
                <td><?= h($userBranches->branch_id) ?></td>
                <td><?= h($userBranches->user_id) ?></td>
                <td><?= h($userBranches->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'UserBranches', 'action' => 'view', $userBranches->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'UserBranches', 'action' => 'edit', $userBranches->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'UserBranches', 'action' => 'delete', $userBranches->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userBranches->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
