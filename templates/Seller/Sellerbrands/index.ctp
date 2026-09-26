<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Seller Brand'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
			
             
              
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('sub_category_id') ?></th>
				<th><?= $this->Paginator->sort('type_id') ?></th>
				<th><?= $this->Paginator->sort('brand_id') ?></th>
				<th><?= $this->Paginator->sort('is_new_brand') ?></th>
				<th><?= $this->Paginator->sort('is_approved') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
           
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($sellerbrands as $brand): 
        if($brand->is_active==1)
		{
			$a="Yes";
		}
		else
		{
			$a="No";
		}
		if($brand->is_new_brand==1)
		{
			$n="Yes";
		}
		else
		{
			$n="No";
		}
		if($brand->is_approved==1)
		{
			$p="Yes";
		}
		else
		{
			$p="No";
		}
		if($brand->brand_id==0)
		{
			$b="New Brand Created";
		}
		else
		{
			$b=$brand->brand->name;
		}
        ?>
            <tr>
                <td><?= $this->Number->format($brand->id) ?></td>
				
            
            
                <td>
                    <?= $brand->has('category') ? $this->Html->link($brand->category->name, ['controller' => 'Categories', 'action' => 'index', $brand->category->id]) : '' ?>
                </td>
              
                <td><?= h($brand->sub_category->name) ?></td>
				<td><?= h($brand->type->name) ?></td>
				<td><?= $b ?></td>
                <td><?= $n ?></td>
                <td><?= $p ?></td>
				<td><?= $a ?></td>
                    <td class="actions">
					<?php if($brand->is_new_brand==1){?>
                    <?= $this->Html->link('<span class="fa fa-search"></span><span class="sr-only">' . __('Details') . '</span>', ['action' => 'documents', $brand->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Details')]) ?>
					<?php } ?>
				
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $brand->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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