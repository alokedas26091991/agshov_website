 <div class="main-content" ng-app="product" ng-controller="productCrt">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($listingbanner,['type' => 'file','class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> Update Status  </h4>
       


			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Status') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->textarea('status',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
				
			
			       	
   
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
 </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
</div>
</div>
<?=$this->Html->css(['/admin_template/app-assets/vendors/css/wizard','/admin_template/css/ngProgress']);?>
		<script>var ajxUrl='<?=$this->Url->build("/seller/products");?>';
		var ajxPageUrl='<?=$this->Url->build("/vendor/products");?>';
				    var category_id=<?= $listingbanner->category_id ?>;
					var sub_category_id=<?= $listingbanner->sub_category_id ?>;
						var type_id=<?= $listingbanner->type_id ?>;
					
						var product_id=<?= $listingbanner->product_id ?>;
						var categories=<?=json_encode($categories);?>;
				
				        var listingbanner=<?=json_encode($listingbanner);?>;
		</script>
		<?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/edit_listing_banner.js'],['block'=>'scriptBottom']);?>