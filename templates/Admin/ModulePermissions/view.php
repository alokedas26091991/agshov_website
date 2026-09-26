<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Module Permission'), ['action' => 'edit', $modulePermission->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Module Permission'), ['action' => 'delete', $modulePermission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modulePermission->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Module Permissions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Module Permission'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Modules'), ['controller' => 'Modules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Module'), ['controller' => 'Modules', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="modulePermissions view col-lg-10 col-md-9 columns">
    <h2><?= h($modulePermission->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Role') ?></h6>
                    <p><?= $modulePermission->has('role') ? $this->Html->link($modulePermission->role->id, ['controller' => 'Roles', 'action' => 'view', $modulePermission->role->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Module') ?></h6>
                    <p><?= $modulePermission->has('module') ? $this->Html->link($modulePermission->module->name, ['controller' => 'Modules', 'action' => 'view', $modulePermission->module->id]) : '' ?></p>
					
					
					
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($modulePermission->id) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns booleans end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
                  
					
					
		<tr>
                   <th><?= __('Perm View') ?></th>
                    <td>  <p><?= $modulePermission->perm_view ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Perm Insert') ?></th>
                    <td>  <p><?= $modulePermission->perm_insert ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Perm Update') ?></th>
                    <td>  <p><?= $modulePermission->perm_update ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Perm Delete') ?></th>
                    <td>  <p><?= $modulePermission->perm_delete ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Perm Seo') ?></th>
                    <td>  <p><?= $modulePermission->perm_seo ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Perm Approve') ?></th>
                    <td>  <p><?= $modulePermission->perm_approve ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $modulePermission->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
