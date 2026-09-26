
<div class="main-content">
          <div class="content-wrapper">
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Happy Customers'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                     <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
            <th><?= __('#') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('video_link') ?></th>
                    <th><?= $this->Paginator->sort('is_active') ?></th>
           
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody id="myTable">
        <?php 
        $serialNumber = 1;
        foreach ($happyCustomers as $happyCustomer): 
        if($happyCustomer->is_active==1)
		{
			$a="Yes";
		}
		else
		{
			$a="No";
		}
		
        ?>
            <tr>
            <td><?= $serialNumber++ ?></td>
            <td><?= h($happyCustomer->title) ?></td>
            <td><?= h($happyCustomer->video_link) ?></td>
            <td><?= $a ?></td>
            <td class="actions">
            <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $happyCustomer->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
            <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $happyCustomer->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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