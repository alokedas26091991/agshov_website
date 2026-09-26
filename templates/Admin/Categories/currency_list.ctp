
<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Currency List'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                      
                    <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'currency_rate'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables" style="overflow:auto;">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('Currency') ?></th>
				<th><?= $this->Paginator->sort('rate') ?></th>
				<th><?= $this->Paginator->sort('Delivery Charge') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody id="myTable">
        <?php foreach ($currency as $category): 
		if($category->currency==1)
		{
			$a="1 Dollar";
		}
		else if($category->currency==2)
		{
			$a="1 Euro";
		}
        else if($category->currency==3)
        {
            $a="1 Pound";
        }
        else
        {
            $a="1 INR";
        }
		
		?>
            <tr>
                <td><?= $this->Number->format($category->id) ?></td>
                <td><?= $a ?></td>
				
				<td><?= h($category->rate) ?></td>
				<td><?= h($category->delivery_charge) ?></td>
               
                    <td class="actions">

                  
                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit_currency', $category->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Status') . '</span>', ['action' => 'delete_currency', $category->id], ['confirm' => __('Are you sure you want to In Active this Category ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Status')]) ?>
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