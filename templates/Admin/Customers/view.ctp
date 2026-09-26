<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="customers view col-lg-10 col-md-9 columns">
    <h2><?= h($customer->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('School Name') ?></h6>
                    <p><?= h($customer->school_name) ?></p>
                    <h6 class="subheader"><?= __('Phone No') ?></h6>
                    <p><?= h($customer->phone_no) ?></p>
                    <h6 class="subheader"><?= __('Email') ?></h6>
                    <p><?= h($customer->email) ?></p>
                    <h6 class="subheader"><?= __('Contact Person') ?></h6>
                    <p><?= h($customer->contact_person) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($customer->id) ?></p>
                    <h6 class="subheader"><?= __('English Version') ?></h6>
                    <p><?= $this->Number->format($customer->english_version) ?></p>
                    <h6 class="subheader"><?= __('Bengali Version') ?></h6>
                    <p><?= $this->Number->format($customer->bengali_version) ?></p>
                    <h6 class="subheader"><?= __('Small School') ?></h6>
                    <p><?= $this->Number->format($customer->small_school) ?></p>
                    <h6 class="subheader"><?= __('Large School') ?></h6>
                    <p><?= $this->Number->format($customer->large_school) ?></p>
                    <h6 class="subheader"><?= __('Created By') ?></h6>
                    <p><?= $this->Number->format($customer->created_by) ?></p>
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
                    <td>  <p><?= h($customer->create_date) ?></p></td>
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
                   <th><?= __('Is Deteted') ?></th>
                    <td>  <p><?= $customer->is_deteted ? __('Yes') : __('No'); ?></p></td>
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
                    <td><?= $this->Text->autoParagraph(h($customer->address)); ?></td>
					</tr>
					</table>
                </div>
            </div>
        </div>
    </div>

</div>
