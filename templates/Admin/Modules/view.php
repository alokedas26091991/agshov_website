<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Module'), ['action' => 'edit', $module->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Module'), ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete # {0}?', $module->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Modules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Module'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Module Permissions'), ['controller' => 'ModulePermissions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Module Permission'), ['controller' => 'ModulePermissions', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="modules view col-lg-10 col-md-9 columns">
    <h2><?= h($module->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($module->name) ?></p>
                    <h6 class="subheader"><?= __('Caption') ?></h6>
                    <p><?= h($module->caption) ?></p>
                    <h6 class="subheader"><?= __('Icon') ?></h6>
                    <p><?= h($module->icon) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($module->id) ?></p>
                    <h6 class="subheader"><?= __('Access Type') ?></h6>
                    <p><?= $this->Number->format($module->access_type) ?></p>
                    <h6 class="subheader"><?= __('Order By') ?></h6>
                    <p><?= $this->Number->format($module->order_by) ?></p>
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
                    <td>  <p><?= $module->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
    <h4 class="subheader"><?= __('Related ModulePermissions') ?></h4>
    <?php if (!empty($module->module_permissions)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Role Id') ?></th>
                <th><?= __('Module Id') ?></th>
                <th><?= __('Perm View') ?></th>
                <th><?= __('Perm Insert') ?></th>
                <th><?= __('Perm Update') ?></th>
                <th><?= __('Perm Delete') ?></th>
                <th><?= __('Perm Seo') ?></th>
                <th><?= __('Perm Approve') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($module->module_permissions as $modulePermissions): ?>
            <tr>
                <td><?= h($modulePermissions->id) ?></td>
                <td><?= h($modulePermissions->role_id) ?></td>
                <td><?= h($modulePermissions->module_id) ?></td>
                <td><?= h($modulePermissions->perm_view) ?></td>
                <td><?= h($modulePermissions->perm_insert) ?></td>
                <td><?= h($modulePermissions->perm_update) ?></td>
                <td><?= h($modulePermissions->perm_delete) ?></td>
                <td><?= h($modulePermissions->perm_seo) ?></td>
                <td><?= h($modulePermissions->perm_approve) ?></td>
                <td><?= h($modulePermissions->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'ModulePermissions', 'action' => 'view', $modulePermissions->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'ModulePermissions', 'action' => 'edit', $modulePermissions->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'ModulePermissions', 'action' => 'delete', $modulePermissions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $modulePermissions->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
