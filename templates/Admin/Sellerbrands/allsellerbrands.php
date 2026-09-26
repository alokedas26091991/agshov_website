
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
             
    <div class="tables" style="overflow:auto;">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
			<th>Date</th>
              <th><?= $this->Paginator->sort('user_id') ?></th>
              
                <th><?= $this->Paginator->sort('name') ?></th>
                 <th><?= $this->Paginator->sort('details') ?></th>
                <th><?= $this->Paginator->sort('is_approved') ?></th>
           
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody id="myTable">
        <?php foreach ($brand1 as $brand): 

        if($brand->is_approve==1)
		{
			$p="Approved";
		}
		else
		{
			$p="Not Approved";
		}

        ?>
            <tr>
                <td><?= $this->Number->format($brand->id) ?></td>
                <td><?=$brand->request_date?></td>
				
            <td><?= h($brand->user->first_name) ?></td>
            

              
                <td><?= h($brand->brand_name) ?></td>
                <td><?= h($brand->details) ?></td>
                <td><?=$p?></td>

                    <td class="actions">

                    <?= $this->Form->postLink('<span class="fa fa-plus"></span><span class="sr-only">' . __('Approve') . '</span>', ['action' => 'approvesellerbrand', $brand->id], ['confirm' => __('Are you sure you want to change the Approve Status ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Approve')]) ?>
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