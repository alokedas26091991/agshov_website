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
			
                <th>Date</th>
             
				<th><?= $this->Paginator->sort('brand_id') ?></th>
                <th><?= $this->Paginator->sort('details') ?></th>
				<th><?= $this->Paginator->sort('is_approved') ?></th>
           
           
               
            </tr>
        </thead>
        <tbody>
        <?php foreach ($sellerbrands as $brand): 
        
	
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
                 <td><?= $brand->request_date ?></td>
				<td><?= $brand->brand_name ?></td>
            <td><?= $brand->details ?></td>
           
                
			
                <td><?= $p ?></td>
		
                    
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