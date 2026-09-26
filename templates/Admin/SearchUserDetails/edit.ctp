 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($searchUserDetail,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Search User Detail'), ['action' => 'index']) ?> <?= __('Edit') ?> </h4>
       


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
			<?= __('Email Id') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('email_id',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Phone No') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('phone_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Pin Code') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('pin_code',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Category Id') ?></label>
			<div class="col-sm-9">
			<?php 
						
			
		
            echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control' 'empty' => true,'label' => false,'div'=>false
		]);
			?>

	</div>
	</div>
				
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Sub Category Id') ?></label>
			<div class="col-sm-9">
			<?php 
						
			
		
            echo $this->Form->input('sub_category_id', ['options' => $subCategories,'class'=>'form-control' 'empty' => true,'label' => false,'div'=>false
		]);
			?>

	</div>
	</div>
				
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Type Id') ?></label>
			<div class="col-sm-9">
			<?php 
						
			
		
            echo $this->Form->input('type_id', ['options' => $types,'class'=>'form-control' 'empty' => true,'label' => false,'div'=>false
		]);
			?>

	</div>
	</div>
				
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Search Text') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('search_text',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Create Date') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('create_date',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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