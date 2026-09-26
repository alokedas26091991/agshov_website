 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($product,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Product'), ['action' => 'index']) ?> <?= __('Edit') ?> </h4>
       


		
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('User Id') ?></label>
			<div class="col-sm-9">
			<?php 
			
            echo $this->Form->input('user_id', ['options' => $users,'class'=>'form-control','label' => false,'div'=>false]);


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
			<?= __('Category Id') ?></label>
			<div class="col-sm-9">
			<?php 
			
            echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			
	</div>
	</div>
	
			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Introduction') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('introduction',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Objective') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('objective',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Benefits') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('benefits',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Content Topic Summary') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('content_topic_summary',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Summary') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('summary',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Open Date') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('open_date',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Photo') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('photo',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Actual Price') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('actual_price',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Offer Price') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('offer_price',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Featured') ?></label>
			<div class="col-sm-9">
			    <?php 
			 echo $this->Form->input('is_featured',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false]);
			?>
		
	</div>
	</div>			
	
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Live') ?></label>
			<div class="col-sm-9">
			    <?php 
			 echo $this->Form->input('is_live',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false]);
			?>
		
	</div>
	</div>		
			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Active') ?></label>
			<div class="col-sm-9">
			    <?php 
			 echo $this->Form->input('is_active',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false]);
			?>
		
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Not For Sale') ?></label>
			<div class="col-sm-9">
				    <?php 
			 echo $this->Form->input('not_for_sale',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false]);
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