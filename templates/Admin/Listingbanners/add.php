
 <div class="main-content"  ng-app="product" ng-controller="productCrt">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($listingbanner,['type' => 'file','class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> Listing Banners </h4>
       
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Title') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->text('title',['type'=>'test','class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Details') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->textarea('details',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Photo') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('image1',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>

				
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Category Id') ?></label>
			<div class="col-sm-9">
			<?php 
			
            //echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			<select name="category_id" ng-model="category_id" ng-change="categorieslist()" class='form-control' convert-to-number><option ng-repeat="c in categories" ng-value="c.id" ng-selected="c.id==category_id">{{c.name}}</option> </select>
			
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Sub Category') ?></label>
			<div class="col-sm-9">
			<?php 
			
            //echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			<select name="sub_category_id" ng-change="typelist()" ng-model="sub_category_id" class='form-control' convert-to-number><option ng-repeat="c in subcategories" ng-value="c.id"  ng-selected="c.id==sub_category_id">{{c.name}}</option> </select>
			
	</div>
	</div>
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Type') ?></label>
			<div class="col-sm-9">
			 <select name="type_id" class="form-control" ng-change="productlist()" ng-model="type_id" convert-to-number ><option ng-repeat="c in type" ng-value="c.id" ng-selected="c.id==type_id">{{c.name}}</option>
											</select> 
	</div>
	</div>

	
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Brand') ?></label>
			<div class="col-sm-9">
			 <select name="brand_id" class="form-control" >
			     <option value="">Select Brand</option>
			     <?php
			     foreach($brands as $b1)
			     {
			         
			     ?>
			     <option value="<?=$b1->id?>"><?=$b1->name?></option>
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
			 <select name="product_id" class="form-control" ng-model="product_id" convert-to-number ><option ng-repeat="c in product" ng-value="c.id" ng-selected="c.id==product_id">{{c.name}}</option>
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
			<?= __('Start Date') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->date('start_date',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('End Date') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->date('end_date',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Active') ?></label>
			<div class="col-sm-9">
			<?php 
																	?>	<div class="switch-main">
															    <div class="onoffswitch">
																<input id="is_active" class="onoffswitch-checkbox" type="checkbox" empty="0" value="1" name="is_active">
																
			<label class="onoffswitch-label" for="is_active">
																		<span class="onoffswitch-inner"></span>
																		<span class="onoffswitch-switch"></span>
																	</label>
																	</div>
																</div>
															
	</div>
	</div>	
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Order') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('ord',['type'=>'number','class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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
</div>
<?=$this->Html->css(['/admin_template/app-assets/vendors/css/wizard','/admin_template/css/ngProgress']);?>
		<script>var ajxUrl='<?=$this->Url->build("/seller/products");?>';
		var ajxPageUrl='<?=$this->Url->build("/vendor/products");?>';
				var category_id=0;
					var sub_category_id=0;
						var type_id=0;
						var brand_id=0;
						var product_id=0;
				var categories=<?=json_encode($categories);?>;
		</script>
		<?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/option_product'],['block'=>'scriptBottom']);?>
		