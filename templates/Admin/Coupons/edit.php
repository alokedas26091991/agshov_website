 <div class="main-content" ng-app="product" ng-controller="productCrt">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($coupon,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Coupon'), ['action' => 'index']) ?> <?= __('Edit') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Coupon Code') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('coupon_code',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Coupon Type') ?></label>
			<div class="col-sm-9">
		
			
			
			<select name="coupon_type" id="coupon_type" class="form-control">
			  <option>select Coupon type</option>  
              <option value="1" <?php if ($coupon->coupon_type=="1" ) echo 'selected = "selected"'; ?>>Category</option>
              <option value="2" <?php if ($coupon->coupon_type=="2" ) echo 'selected = "selected"'; ?>>SubCategory</option>
              
            </select>
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
	<!--<div class="form-group row">		-->
 <!--<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">-->
	<!--		<?= __('Type') ?></label>-->
	<!--		<div class="col-sm-9">-->
	<!--		 <select name="type_id" class="form-control" ng-change="productlist()" ng-model="type_id" convert-to-number >-->
	<!--		     <option ng-repeat="c in type" value="{{c.id}}" ng-selected="c.id==type_id">{{c.name}}</option>-->
	<!--										</select> -->
	<!--</div>-->
	<!--</div>-->

	<!--<div class="form-group row">		-->
 <!--<label for="focusedinput" class="col-md-3 label-control" for="projectinput1">-->
	<!--		<?= __('Product') ?></label>-->
	<!--		<div class="col-sm-9">-->
			  
	<!--		 <select name="product_id" class="form-control" ng-model="product_id" convert-to-number >-->
	<!--		     <option ng-repeat="c1 in product" value="{{c1.id}}" ng-selected="c1.id==product_id">{{c1.name}}</option>-->
	<!--										</select> -->
	<!--</div>-->
	<!--</div>-->


	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Description') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->textarea('description',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Discount Type') ?></label>
			<div class="col-sm-9">
			
			<select name="discount_type" id="discount_type" class="form-control">
			  <option>select Coupon type</option>  
              <option value="1" <?php if ($coupon->discount_type=="p" ) echo 'selected = "selected"'; ?>>Percentage</option>
              <option value="2" <?php if ($coupon->discount_type=="f" ) echo 'selected = "selected"'; ?>>Fixed</option>
            </select>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Discount Value') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('discount_value',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Start Date') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('start_date',['type'=>'date','class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Expiry Date') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('expiry_date',['type'=>'date','class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
					
				
				
			
			<!--div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Deleted') ?></label>
			<div class="col-sm-9">
			<?php 
																	?>	<div class="switch-main">
															    <div class="onoffswitch">
																<input id="is_deleted" class="onoffswitch-checkbox" type="checkbox" empty="0" value="1" name="is_deleted">
																
			<label class="onoffswitch-label" for="is_deleted">
																		<span class="onoffswitch-inner"></span>
																		<span class="onoffswitch-switch"></span>
																	</label>
																	</div>
																</div>
															
	</div>
	</div-->			
			
			       	
   
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
 </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
</div>
<?php
if(empty($coupon->product_coupons[0]->category_id))
{
    $category=0;
}
else
{
    $category=$coupon->product_coupons[0]->category_id;
}

if(empty($coupon->product_coupons[0]->sub_category_id))
{
    $sub_category=0;
}
else
{
    $sub_category=$coupon->product_coupons[0]->sub_category_id;
}

if(empty($coupon->product_coupons[0]->type_id))
{
    $type=0;
}
else
{
    $type=$coupon->product_coupons[0]->type_id;
}

if(empty($coupon->product_coupons[0]->product_id))
{
    $product=0;
}
else
{
    $product=$coupon->product_coupons[0]->product_id;
}


?>
</div>
<?=$this->Html->css(['/admin_template/app-assets/vendors/css/wizard','/admin_template/css/ngProgress']);?>
		<script>var ajxUrl='<?=$this->Url->build("/seller/products");?>';
		var ajxPageUrl='<?=$this->Url->build("/vendor/products");?>';
						var category_id=<?= $category  ?>;
					    var sub_category_id=<?= $sub_category ?>;
						var type_id=<?= $type ?>;
					
						var product_id=<?= $product ?>;
						var categories=<?=json_encode($categories);?>;
				
				        var listingbanner=<?=json_encode($coupon);?>;
		</script>
		<?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/edit_coupon.js'],['block'=>'scriptBottom']);?>
		