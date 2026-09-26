
<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Product Charge'), ['action' => 'index']) ?></h4>
                   
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
                <th><?= $this->Paginator->sort('charge_type') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('sub_category_id') ?></th>
                <th><?= $this->Paginator->sort('type_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th><th><?= $this->Paginator->sort('value') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody id="myTable">
        <?php foreach ($productCharges as $productCharge): 
        if($productCharge->charge_type==0)
        {
            $a="Percentage";
        }
        else
        {
            $a="Flate";
        }
        ?>
            <tr>
                <td><?= $this->Number->format($productCharge->id) ?></td>
                <td><?= $a ?></td>
                <td><?= h($productCharge->category->name) ?></td>
                <td><?= h($productCharge->sub_category->name) ?></td>
                <td><?= h($productCharge->type->name) ?></td>
               <td><?= h($productCharge->name) ?></td>
               <td><?= h($productCharge->value) ?></td>
                
                    <td class="actions">
                    
                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $productCharge->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $productCharge->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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