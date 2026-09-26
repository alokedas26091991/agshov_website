 <div class="main-content" ng-app="product" ng-controller="productCrt">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($advertisementItem,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Advertisement Item'), ['action' => 'index']) ?> <?= __('Edit') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Advertisement Id') ?></label>
			<div class="col-sm-9">
			<?php 
						
			
		
            echo $this->Form->select('advertisement_id',$advertisements,['class'=>'form-control' ,'empty' => true,'label' => false,'div'=>false]);
			?>

	</div>
	</div>
				
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Category') ?></label>
			<div class="col-sm-9">
			<?php 
			
            


			?>
		<select name="category_id" ng-model="category_id" ng-change="categorieslist()" class='form-control' convert-to-number>
		    <option ng-repeat="c in categories" value="{{c.id}}" ng-selected="c.id==category_id">{{c.name}}</option> </select>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Sub Category') ?></label>
			<div class="col-sm-9">
			<?php 
			
            //echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			<select name="sub_category_id" ng-change="typelist()" ng-model="sub_category_id" class='form-control' convert-to-number><option ng-repeat="c in subcategories" value="{{c.id}}"  ng-selected="c.id==sub_category_id">{{c.name}}</option> </select>
			
	</div>
	</div>
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Type') ?></label>
			<div class="col-sm-9">
			 <select name="type_id" class="form-control" ng-change="productlist()" ng-model="type_id" convert-to-number >
			     <option ng-repeat="c in type" value="{{c.id}}" ng-selected="c.id==type_id">{{c.name}}</option>
											</select> 
	</div>
	</div>
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			Brand</label>
			<div class="col-sm-9">
		
			 <select name="brand_id" class="form-control" >
			     <option value="">Select Brand</option>
			     <?php
			     
			     foreach($brands as $b1)
			     {
			         
			     ?>
			     <option value="<?=$b1->id?>" <?php if ($b1->id==$advertisementItem->brand_id ) echo 'selected = "selected"'; ?>><?=$b1->name?></option>
			     <?php
			     }
			   
			     ?>
			</select> 
	</div>
	</div>
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Product') ?></label>
			<div class="col-sm-9">
			  
			 <select name="product_id" class="form-control" ng-model="product_id" convert-to-number >
			     <option ng-repeat="c1 in product" value="{{c1.id}}" ng-selected="c1.id==product_id">{{c1.name}}</option>
											</select> 
	</div>
	</div>
								<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Link') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('link',['type'=>'text','class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
				
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Active') ?></label>
			<div class="col-sm-9">
		
			<?php 
			 echo $this->Form->checkbox('is_active',['type'=>'checkbox','class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false]);
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
<script>
		var ajxPageUrl='<?=$this->Url->build("/vendor/products");?>';
				    var category_id=<?= $advertisementItem->category_id ?>;
					var sub_category_id=<?= $advertisementItem->sub_category_id ?>;
						var type_id=<?= $advertisementItem->type_id ?>;
					
						var product_id=<?= $advertisementItem->product_id ?>;
						var categories=<?=json_encode($categories);?>;
				
				        var listingbanner=<?=json_encode($advertisementItem);?>;
		</script>
		<?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/edit_listing_banner.js'],['block'=>'scriptBottom']);?>