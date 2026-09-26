 <div class="main-content" ng-app="product" ng-controller="productCrt">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($productCharge,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Product Charge'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
       
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Charge Type') ?></label>
			<div class="col-sm-9">
			<?php 
				$charge_type = [
								'0' => 'Percentage',
								'1' => 'Flate',
								
							];
			            echo $this->Form->select('charge_type',$charge_type,['class'=>'form-control','label' => false,'div'=>false]);
			?>
	</div>
	</div>

			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>	
<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Category') ?></label>
			<div class="col-sm-9">
			<select name="category_id" class="form-control" ng-model="category_id" ng-change="categorieslist()"><option  ng-repeat="c in categories" ng-value="c.id">{{c.name}}</option>
											</select>
	</div>
	</div><div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Sub Category') ?></label>
			<div class="col-sm-9">
			 <select name="sub_category_id" class="form-control" ng-model="sub_category_id"  ng-change="typelist()"><option ng-repeat="c in subcategories" ng-value="c.id">{{c.name}}</option>
											</select>
	</div>
	</div><div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Type') ?></label>
			<div class="col-sm-9">
			 <select name="type_id" class="form-control" ng-model="type_id" ><option ng-repeat="c in type" ng-value="c.id">{{c.name}}</option>
											</select> 
	</div>
	</div>	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Value') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('value',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
					
			
			       	
   
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
   
 </div>
  <?= $this->Form->end() ?>
	            </div>
	        </div>
	    </div>
	</div>
	</div>
</section>
</div>
</div>
<script>var categories=<?=json_encode($categories);?>;
				
		</script>	
		<?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/brand_add_seller1'],['block'=>'scriptBottom']);?>