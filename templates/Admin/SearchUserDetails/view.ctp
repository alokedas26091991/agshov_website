<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Search User Detail'), ['action' => 'edit', $searchUserDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Search User Detail'), ['action' => 'delete', $searchUserDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $searchUserDetail->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Search User Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Search User Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sub Categories'), ['controller' => 'SubCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sub Category'), ['controller' => 'SubCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Types'), ['controller' => 'Types', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Type'), ['controller' => 'Types', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="searchUserDetails view col-lg-10 col-md-9 columns">
    <h2><?= h($searchUserDetail->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($searchUserDetail->name) ?></p>
                    <h6 class="subheader"><?= __('Email Id') ?></h6>
                    <p><?= h($searchUserDetail->email_id) ?></p>
                    <h6 class="subheader"><?= __('Phone No') ?></h6>
                    <p><?= h($searchUserDetail->phone_no) ?></p>
                    <h6 class="subheader"><?= __('Category') ?></h6>
                    <p><?= $searchUserDetail->has('category') ? $this->Html->link($searchUserDetail->category->name, ['controller' => 'Categories', 'action' => 'view', $searchUserDetail->category->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Sub Category') ?></h6>
                    <p><?= $searchUserDetail->has('sub_category') ? $this->Html->link($searchUserDetail->sub_category->name, ['controller' => 'SubCategories', 'action' => 'view', $searchUserDetail->sub_category->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Type') ?></h6>
                    <p><?= $searchUserDetail->has('type') ? $this->Html->link($searchUserDetail->type->name, ['controller' => 'Types', 'action' => 'view', $searchUserDetail->type->id]) : '' ?></p>
					
					
					
                    <h6 class="subheader"><?= __('Search Text') ?></h6>
                    <p><?= h($searchUserDetail->search_text) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($searchUserDetail->id) ?></p>
                    <h6 class="subheader"><?= __('Pin Code') ?></h6>
                    <p><?= $this->Number->format($searchUserDetail->pin_code) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
					<tr>
                   <th><?= __('Create Date') ?></th>
                    <td>  <p><?= h($searchUserDetail->create_date) ?></p></td>
					</tr>
/table>
					</div>
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
                    <td>  <p><?= $searchUserDetail->is_active ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $searchUserDetail->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
