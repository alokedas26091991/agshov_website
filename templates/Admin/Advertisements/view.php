<div class="actions columns col-lg-2 col-md-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="nav nav-stacked nav-pills">
        <li><?= $this->Html->link(__('Edit Advertisement'), ['action' => 'edit', $advertisement->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Advertisement'), ['action' => 'delete', $advertisement->id], ['confirm' => __('Are you sure you want to delete # {0}?', $advertisement->id), 'class' => 'btn-danger']) ?> </li>
        <li><?= $this->Html->link(__('List Advertisements'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Advertisement'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Advertisement Items'), ['controller' => 'AdvertisementItems', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Advertisement Item'), ['controller' => 'AdvertisementItems', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="advertisements view col-lg-10 col-md-9 columns">
    <h2><?= h($advertisement->name) ?></h2>
    <div class="row">
        <div class="col-lg-5 columns strings">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Photo') ?></h6>
                    <p><?= h($advertisement->photo) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns numbers end">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h6 class="subheader"><?= __('Id') ?></h6>
                    <p><?= $this->Number->format($advertisement->id) ?></p>
                    <h6 class="subheader"><?= __('Created By') ?></h6>
                    <p><?= $this->Number->format($advertisement->created_by) ?></p>
                    <h6 class="subheader"><?= __('Adv Type') ?></h6>
                    <p><?= $this->Number->format($advertisement->adv_type) ?></p>
                </div>
            </div>
        </div>
        <div class="col-lg-2 columns dates end">
            <div class="panel panel-default">
                <div class="panel-body">
				<div class="table-responsive">
        <table class="table">
                   
					<tr>
                   <th><?= __('Start Date') ?></th>
                    <td>  <p><?= h($advertisement->start_date) ?></p></td>
					</tr>
                   
					<tr>
                   <th><?= __('End Date') ?></th>
                    <td>  <p><?= h($advertisement->end_date) ?></p></td>
					</tr>
                   
					<tr>
                   <th><?= __('Create Date') ?></th>
                    <td>  <p><?= h($advertisement->create_date) ?></p></td>
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
                    <td>  <p><?= $advertisement->is_active ? __('Yes') : __('No'); ?></p></td>
					</tr>
					
					
					
					
					
                   
                  
					
					
		<tr>
                   <th><?= __('Is Deleted') ?></th>
                    <td>  <p><?= $advertisement->is_deleted ? __('Yes') : __('No'); ?></p></td>
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
                   <th><?= __('Name') ?></th>
                    <td><?= $this->Text->autoParagraph(h($advertisement->name)); ?></td>
					</tr>
										 <tr>
                   <th><?= __('Description') ?></th>
                    <td><?= $this->Text->autoParagraph(h($advertisement->description)); ?></td>
					</tr>
					</table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="related row">
    <div class="column col-lg-12">
    <h4 class="subheader"><?= __('Related AdvertisementItems') ?></h4>
    <?php if (!empty($advertisement->advertisement_items)): ?>
    <div class="table-responsive">
        <table class="table">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Advertisement Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Sub Category Id') ?></th>
                <th><?= __('Type Id') ?></th>
                <th><?= __('Brand Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Is Active') ?></th>
                <th><?= __('Is Deleted') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($advertisement->advertisement_items as $advertisementItems): ?>
            <tr>
                <td><?= h($advertisementItems->id) ?></td>
                <td><?= h($advertisementItems->advertisement_id) ?></td>
                <td><?= h($advertisementItems->category_id) ?></td>
                <td><?= h($advertisementItems->sub_category_id) ?></td>
                <td><?= h($advertisementItems->type_id) ?></td>
                <td><?= h($advertisementItems->brand_id) ?></td>
                <td><?= h($advertisementItems->product_id) ?></td>
                <td><?= h($advertisementItems->is_active) ?></td>
                <td><?= h($advertisementItems->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<span class="glyphicon glyphicon-zoom-in"></span><span class="sr-only">' . __('View') . '</span>', ['controller' => 'AdvertisementItems', 'action' => 'view', $advertisementItems->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="glyphicon glyphicon-pencil"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'AdvertisementItems', 'action' => 'edit', $advertisementItems->id], ['escape' => false, 'class' => 'btn btn-xs btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="glyphicon glyphicon-trash"></span><span class="sr-only">' . __('Delete') . '</span>', ['controller' => 'AdvertisementItems', 'action' => 'delete', $advertisementItems->id], ['confirm' => __('Are you sure you want to delete # {0}?', $advertisementItems->id), 'escape' => false, 'class' => 'btn btn-xs btn-danger', 'title' => __('Delete')]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <?php endif; ?>
    </div>
</div>
