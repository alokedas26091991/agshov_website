<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Static Page'), ['action' => 'edit', $staticPage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Static Page'), ['action' => 'delete', $staticPage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $staticPage->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Static Pages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Static Page'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="staticPages view col-lg-10 col-md-9 columns">
    <h2><?= h($staticPage->id) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Page Name') ?></h6>
                    <p><?= h($staticPage->page_name) ?></p>
                    <h6 class="subheader"><?= __('Slug') ?></h6>
                    <p><?= h($staticPage->slug) ?></p>
                    <h6 class="subheader"><?= __('Meta Title') ?></h6>
                    <p><?= h($staticPage->meta_title) ?></p>
                    <h6 class="subheader"><?= __('Robots') ?></h6>
                    <p><?= h($staticPage->robots) ?></p>
                    <h6 class="subheader"><?= __('Canonical') ?></h6>
                    <p><?= h($staticPage->canonical) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($staticPage->id) ?></p>
                    <h6 class="subheader"><?= __('Created By') ?></h6>
                    <p><?= $this->Number->format($staticPage->created_by) ?></p>
                    <h6 class="subheader"><?= __('Last Updated By') ?></h6>
                    <p><?= $this->Number->format($staticPage->last_updated_by) ?></p>
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
                    <td>  <p><?= h($staticPage->create_date) ?></p></td>
					</tr>
                   
					<tr>
                   <th><?= __('Last Update Date') ?></th>
                    <td>  <p><?= h($staticPage->last_update_date) ?></p></td>
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
                    <td>  <p><?= $staticPage->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
                   <th><?= __('Description') ?></th>
                    <td><?= $this->Text->autoParagraph(h($staticPage->description)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Meta Keywords') ?></th>
                    <td><?= $this->Text->autoParagraph(h($staticPage->meta_keywords)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Meta Desc') ?></th>
                    <td><?= $this->Text->autoParagraph(h($staticPage->meta_desc)); ?></td>
					</tr>
					</table>
                </div>
            </div>
        </div>
    </div>

</div>
