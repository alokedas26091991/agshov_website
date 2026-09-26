<style>
.overlay {
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    position: fixed;
    background: #222;
}

.overlay__inner {
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    position: absolute;
}

.overlay__content {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
}

.spinner {
    width: 75px;
    height: 75px;
    display: inline-block;
    border-width: 2px;
    border-color: rgba(255, 255, 255, 0.05);
    border-top-color: #fff;
    animation: spin 1s infinite linear;
    border-radius: 100%;
    border-style: solid;
}

@keyframes spin {
  100% {
    transform: rotate(360deg);
  }
}

</style>
<div class="main-content" ng-app="product" ng-controller="productCrt">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Product'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
               
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th>SQCODE</th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('sub_category_id') ?></th>
				<th><?= $this->Paginator->sort('type_id') ?></th>
				
				<th><?= $this->Paginator->sort('is_featured') ?></th>
				<th><?= $this->Paginator->sort('not_for_sale') ?></th>
				<th><?= $this->Paginator->sort('is_live') ?></th>
				<th><?= $this->Paginator->sort('is_active') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): 
		if($product->is_active==1)
		{
			$a="Active";
		}
		else
		{
			$a="Inctive";
		}
		if($product->is_featured==1)
		{
			$f="Feature";
		}
		else
		{
			$f="Not Feature";
		}
		if($product->not_for_sale==1)
		{
			$n="Not for Sale";
		}
		else
		{
			$n="No";
		}
		if($product->is_live==1)
		{
			$l="Yes";
		}
		else
		{
			$l="No";
		}
		
		?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                   
                
				<td><?= h($product->user->first_name) ?></td>
                <td><?= h($product->name) ?></td>
                <td><?= h($product->supc) ?></td>
                <td><?= h($product->category->name) ?></td>
               <td><?= h($product->sub_category->name) ?></td>
			   <td><?= h($product->type->name) ?></td>
			  
			   <td><?= $f ?></td>
			   <td><?= $n ?></td>
			   <td><?= $l ?></td>
			   <td><?= $a ?></td>
               
                    <td class="actions">
                    
					<a href="javascript:void(0);" ng-click="uploadProductSpesalization(<?=$product->id?>)"><i class="fa fa-gavel"></i></a>
                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $product->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
					<a href="javascript:void(0);" ng-click="uploadProductImage(<?=$product->id?>)"><i class="fa fa-upload"></i></a>
					
					<?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'approve', $product->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
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
<div modal="showModalFilter" class="modal modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		
        <div class="modal-dialog modal-lg animated zoomIn animated-3x">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Product Specialization</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="cancelFilter()"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>


                </div>
                <div class="modal-body">
                    <div class="alert alert-success alert-light alert-dismissible" role="alert" ng-show="offineSuccessMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-check"></i> Success!</strong> {{offineMessage}}
                    </div>
                    <div class="alert alert-info alert-light alert-dismissible" role="alert" ng-show="offineErrorMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-alert-triangle"></i> Warning!</strong> {{offineMessage}}
                    </div>
						<div class="overlay" ng-show="loadingStatus">
						<div class="overlay__inner">
						<div class="overlay__content"><span class="spinner"></span></div>
						</div>
						</div>
					 <form id="productImage" name="productImage" >
                        
                        <div class="form-group label-floating">
                            <div>
		
								<ul >
									<li ng-repeat="f in productFilter track by $index" ng-init="filterIndex=$index" style="list-style-type:upper-roman">
									  <label for="option"> {{f.filter.name}}</label>
									  <ul>
										<li style="list-style-type:lower-roman" ng-repeat="fp in f.filter.filter_options track by $index" ng-init="filterOpIndex=$index"> <label><input type="radio" name="filter{{f.filter.id}}" ng-model="fp.checked" ng-value="true" class="subOption" ng-click="filterDataSend(filterIndex,filterOpIndex)"> {{fp.name}}</label><span style="margin-left:50px;cursor:pointer" class="text-danger" ng-click="deletedcheck(filterIndex,filterOpIndex)"><i class="fa  fa-times"></i> Delete</span></li>
										
									  </ul>
									</li>
								</ul>
								</div>
                        </div>
                       </form> 
                    

                 
                    
                </div>

            </div>
        </div>
    </div>

<div modal="showModal" class="modal modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg animated zoomIn animated-3x">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Product Image</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="cancel()"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>


                </div>
                <div class="modal-body">
                    <div class="alert alert-success alert-light alert-dismissible" role="alert" ng-show="offineSuccessMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-check"></i> Success!</strong> {{offineMessage}}
                    </div>
                    <div class="alert alert-info alert-light alert-dismissible" role="alert" ng-show="offineErrorMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-alert-triangle"></i> Warning!</strong> {{offineMessage}}
                    </div>
					 <form id="productImage" name="productImage" >
                        
                        <div class="form-group label-floating">
                            <div>
		
		<input type = "file" file-model = "myFile"/>
         <button ng-click = "uploadFile()">upload me</button>
		</div>
                        </div>
                       </form> 
                    <div class="table-responsive">          
                        <table class="table">

                            <tbody>
                                <tr ng-repeat="p in productImage">
                                    <th><img class="img img-thumbnail" src="{{p.image}}" style="max-width:200px;"></th>
                                    

                                </tr>
                                
                            </tbody>
                        </table>
                    </div>

                 
                    
                </div>

            </div>
        </div>
    </div>
</div>
<script>var ajxUrl='<?=$this->Url->build("/admin/products");?>'</script>
	  <?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/product'],['block'=>'scriptBottom']);?>