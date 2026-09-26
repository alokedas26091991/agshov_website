<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Email'), ['action' => 'edit', $email->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Email'), ['action' => 'delete', $email->id], ['confirm' => __('Are you sure you want to delete # {0}?', $email->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Emails'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Email'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="emails view col-lg-10 col-md-9 columns">
    <h2><?= h($email->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Name') ?></h6>
                    <p><?= h($email->name) ?></p>
                    <h6 class="subheader"><?= __('Subject') ?></h6>
                    <p><?= h($email->subject) ?></p>
                    <h6 class="subheader"><?= __('Send From') ?></h6>
                    <p><?= h($email->send_from) ?></p>
                    <h6 class="subheader"><?= __('Send From Name') ?></h6>
                    <p><?= h($email->send_from_name) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($email->id) ?></p>
                    <h6 class="subheader"><?= __('Type') ?></h6>
                    <p><?= $this->Number->format($email->type) ?></p>
                    <h6 class="subheader"><?= __('Created By') ?></h6>
                    <p><?= $this->Number->format($email->created_by) ?></p>
                    <h6 class="subheader"><?= __('Last Updated By') ?></h6>
                    <p><?= $this->Number->format($email->last_updated_by) ?></p>
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
                    <td>  <p><?= h($email->create_date) ?></p></td>
					</tr>
                   
					<tr>
                   <th><?= __('Last Update Date') ?></th>
                    <td>  <p><?= h($email->last_update_date) ?></p></td>
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
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $email->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
                   <th><?= __('Body') ?></th>
                    <td><?= $this->Text->autoParagraph(h($email->body)); ?></td>
					</tr>
					</table>
                </div>
            </div>
        </div>
    </div>

</div>
