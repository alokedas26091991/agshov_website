 <div class="main-content" ng-app="product" ng-controller="productCrt">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($type,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Type'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
       


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
			<?= __('Category Id') ?></label>
			<div class="col-sm-9">
			<?php 
			
           // echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			<select name="category_id" ng-model="category_id" ng-change="categorieslist()" class='form-control' convert-to-number><option ng-repeat="c in categories" ng-value="c.id">{{c.name}}</option> </select>
			
	</div>
	</div>
	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Sub Category Id') ?></label>
			<div class="col-sm-9">
			<?php 
			            //echo $this->Form->input('sub_category_id',['options' => $SubCategories,'class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
				<select name="sub_category_id" ng-model="sub_category_id" class='form-control' convert-to-number><option ng-repeat="c in subcategories" ng-value="c.id">{{c.name}}</option> </select>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Active') ?></label>
			<div class="col-sm-9">
		
			<?php 
			 echo $this->Form->checkbox('is_active',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false]);
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
		
				var category_id=0;
					var sub_category_id=0;
					var type_id=0;
				var categories=<?=json_encode($categories);?>;
				
		</script>
		<?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/option_category'],['block'=>'scriptBottom']);?>