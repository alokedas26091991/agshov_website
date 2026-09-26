<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Type'), ['action' => 'edit', $type->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Type'), ['action' => 'delete', $type->id], ['confirm' => __('Are you sure you want to delete # {0}?', $type->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="types view col-lg-10 col-md-9 columns">
    <h2><?= h($type->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($type->name) ?></p>
                    <h6 class="subheader"><?= __('Slug') ?></h6>
                    <p><?= h($type->slug) ?></p>
                    <h6 class="subheader"><?= __('Category') ?></h6>
                    <p><?= $type->has('category') ? $this->Html->link($type->category->name, ['controller' => 'Categories', 'action' => 'view', $type->category->id]) : '' ?></p>
					
					
					
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($type->id) ?></p>
                    <h6 class="subheader"><?= __('Sub Category Id') ?></h6>
                    <p><?= $this->Number->format($type->sub_category_id) ?></p>
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
                    <td>  <p><?= $type->is_active ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $type->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
    <h4 class="subheader"><?= __('Related Users') ?></h4>
    <?php if (!empty($type->users)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Email') ?></th>
                <th><?= __('Password') ?></th>
                <th><?= __('Mobile') ?></th>
                <th><?= __('Date Of Registration') ?></th>
                <th><?= __('Email Verification Code') ?></th>
                <th><?= __('Is Email Verified') ?></th>
                <th><?= __('Mobile Verification Code') ?></th>
                <th><?= __('Is Mobile Verified') ?></th>
                <th><?= __('Mobile Verified Date') ?></th>
                <th><?= __('Address1') ?></th>
                <th><?= __('Address2') ?></th>
                <th><?= __('Country') ?></th>
                <th><?= __('State') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('Pin') ?></th>
                <th><?= __('Alternate Phone') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Last Login Date') ?></th>
                <th><?= __('Is Vendor') ?></th>
                <th><?= __('Is Customer') ?></th>
                <th><?= __('Is Admin') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Ipaddress') ?></th>
                <th><?= __('Create Date') ?></th>
                <th><?= __('Last Update Date') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($type->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->mobile) ?></td>
                <td><?= h($users->date_of_registration) ?></td>
                <td><?= h($users->email_verification_code) ?></td>
                <td><?= h($users->is_email_verified) ?></td>
                <td><?= h($users->mobile_verification_code) ?></td>
                <td><?= h($users->is_mobile_verified) ?></td>
                <td><?= h($users->mobile_verified_date) ?></td>
                <td><?= h($users->address1) ?></td>
                <td><?= h($users->address2) ?></td>
                <td><?= h($users->country) ?></td>
                <td><?= h($users->state) ?></td>
                <td><?= h($users->city) ?></td>
                <td><?= h($users->pin) ?></td>
                <td><?= h($users->alternate_phone) ?></td>
                <td><?= h($users->photo) ?></td>
                <td><?= h($users->last_login_date) ?></td>
                <td><?= h($users->is_vendor) ?></td>
                <td><?= h($users->is_customer) ?></td>
                <td><?= h($users->is_admin) ?></td>
                <td><?= h($users->is_active) ?></td>
                <td><?= h($users->ipaddress) ?></td>
                <td><?= h($users->create_date) ?></td>
                <td><?= h($users->last_update_date) ?></td>
                <td><?= h($users->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'Users', 'action' => 'view', $users->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Users', 'action' => 'edit', $users->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
