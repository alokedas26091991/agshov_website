<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Product Not Selling Zone List'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
               <th><?= $this->Paginator->sort('state_id') ?></th>
                <th><?= $this->Paginator->sort('zone_id') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
                
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($zoneSellers as $zoneSeller): 
        if($zoneSeller->is_active==1)
		{
			$a="Yes";
		}
		else
		{
			$a="No";
		}
		
        ?>
            <tr>
                <td><?= $this->Number->format($zoneSeller->id) ?></td>
                <td><?= $zoneSeller->state->name ?></td>
                
                <td><?= $zoneSeller->has('zone') ? $this->Html->link($zoneSeller->zone->name, ['controller' => 'Zones', 'action' => 'view', $zoneSeller->zone->id]) : '' ?></td>
                <td><?= $a ?></td>
             
                   <td class="actions">
                   
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $zoneSeller->id]) ?>&nbsp;&nbsp;&nbsp;&nbsp;
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $zoneSeller->id], ['confirm' => __('Are you sure you want to delete # {0}?', $zoneSeller->id)]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
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