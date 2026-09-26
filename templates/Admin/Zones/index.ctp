
<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Zone'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                 <?=$this->element('search');?>
                    <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
				<th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('country_id') ?></th>
                <th><?= $this->Paginator->sort('state_id') ?></th>
                <th><?= $this->Paginator->sort('as_active') ?></th>
               
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody id="myTable">
            <?php foreach ($zones as $zone): 
				if($zone->is_active==1)
				{
					$a="Active";
				}
				else
				{
					$a="Inctive";
				}
			?>
            <tr>
                <td><?= $this->Number->format($zone->id) ?></td>
				<td><?= $zone->name ?></td>
                <td><?= $zone->has('country') ? $this->Html->link($zone->country->name, ['controller' => 'Countries', 'action' => 'view', $zone->country->id]) : '' ?></td>
                <td><?= $zone->has('state') ? $this->Html->link($zone->state->name, ['controller' => 'States', 'action' => 'view', $zone->state->id]) : '' ?></td>
                <td><?= $a ?></td>
				   <td class="actions">
                  
                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $zone->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $zone->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
                </td>
                
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
        </table>
    </div>
	 <nav aria-label="Page navigation mb-3">
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div></nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>								   

</div>
</div>