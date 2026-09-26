<style>
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  /*padding: 12px 30px;*/
  cursor: pointer;
  font-size: 12px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: Orange;
}
</style>
<div class="main-content" ng-app="product" ng-controller="productCrt">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card1">
                <div class="card-header1">
                    <h4 class="card-title"><?= $this->Html->link(__('Product Gallery Images'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                       
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                
            
				<th><?= $this->Paginator->sort('image') ?></th>
				<th><?= $this->Paginator->sort('status') ?></th>
				<th><?= $this->Paginator->sort('Action') ?></th>

            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): 

		
		?>
            <tr>
                
                  
               
			   <td><a href="<?=UPLOAD_PRODUCT_IMAGE?><?= h($product->image) ?>" target="_blank"><img src="<?=UPLOAD_PRODUCT_IMAGE?><?= h($product->image) ?>" class="img img-responsive"  style="width: 70px;"/></a></td>
			   <td>
			       <?=$product->is_active==1?'Active':'Inactive'?>
			   </td>
			   <td>
			       <a href="<?=UPLOAD_PRODUCT_IMAGE?><?= h($product->image) ?>" download><button class="btn"><i class="fa fa-download"></i> Download</button></a>
			       
			       <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"productgalleryedit",$product->id]); ?>"><button type="button" class="btn"><i class="fa fa-edit"></i> Edit</button></a>
			       
			      
			   </td>

               

            </tr>

        <?php endforeach; ?>
        </tbody>
        </table>
    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>								   

</div>



</div>
<script>var ajxUrl='<?=$this->Url->build("/admin/products");?>'</script>
	  <?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/product'],['block'=>'scriptBottom']);?>