
<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Type'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <?=$this->element('search');?>
                    <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables" >
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
              
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('sub_category_id') ?></th>
                <th><?= $this->Paginator->sort('meta_title') ?></th>
				<th><?= $this->Paginator->sort('meta_keywords') ?></th>
				<th><?= $this->Paginator->sort('meta_desc') ?></th>
				<th><?= $this->Paginator->sort('robots') ?></th>
				<th><?= $this->Paginator->sort('canonical') ?></th>
                <th><?= $this->Paginator->sort('is_active') ?></th>
           
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody id="myTable">
        <?php foreach ($types as $type): 
        if($type->is_active==1)
		{
			$a="Yes";
		}
		else
		{
			$a="No";
		}
        ?>
            <tr>
                <td><?= $this->Number->format($type->id) ?></td>
                <td><?= h($type->name) ?></td>
            
                <td>
                    <?= $type->has('category') ? $this->Html->link($type->category->name, ['controller' => 'Categories', 'action' => 'index', $type->category->id]) : '' ?>
                </td>
              
                <td><?= h($type->sub_category->name) ?></td>
                <td><?= h($type->meta_title) ?></td>
				<td><?= h($type->meta_keywords) ?></td>
				<td><?= h($type->meta_desc) ?></td>
				<td><?= h($type->robots) ?></td>
				<td><?= h($type->canonical) ?></td>
                <td><?= $a ?></td>
             
                    <td class="actions">
                        
                    <?= $this->Html->link('<span class="fa fa-map"></span><span class="sr-only">' . __('SEO Data') . '</span>', ['action' => 'seodata', $type->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('SEO Data')]) ?>
                    
                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $type->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Status') . '</span>', ['action' => 'delete', $type->id], ['confirm' => __('Are you sure you want to change the status ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Status')]) ?>
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