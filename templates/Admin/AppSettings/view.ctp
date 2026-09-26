<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit App Setting'), ['action' => 'edit', $appSetting->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App Setting'), ['action' => 'delete', $appSetting->id], ['confirm' => __('Are you sure you want to delete # {0}?', $appSetting->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List App Settings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App Setting'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="appSettings view col-lg-10 col-md-9 columns">
    <h2><?= h($appSetting->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($appSetting->name) ?></p>
                    <h6 class="subheader"><?= __('Field Name') ?></h6>
                    <p><?= h($appSetting->field_name) ?></p>
                    <h6 class="subheader"><?= __('Value') ?></h6>
                    <p><?= h($appSetting->value) ?></p>
                    <h6 class="subheader"><?= __('Unit') ?></h6>
                    <p><?= h($appSetting->unit) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($appSetting->id) ?></p>
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
                    <td>  <p><?= $appSetting->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
