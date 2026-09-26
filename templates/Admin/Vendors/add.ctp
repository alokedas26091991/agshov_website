<div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">
    <?= $this->Form->create($user,['class'=>'form-horizontal','type'=>'file']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Vendors'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
       

	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Name') ?></label>
			<div class="col-sm-3">
			<?php 
			            echo $this->Form->input('first_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	<div class="col-sm-3">
			<?php 
			            echo $this->Form->input('last_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Email') ?></label>
			<div class="col-sm-3">
			<?php 
			            echo $this->Form->input('email',['type'=>'emaill','class'=>'form-control','empty' => false,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
 <?= __('Phone') ?></label>
			<div class="col-sm-3">
			<?php 
			            echo $this->Form->input('mobile',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Password') ?></label>
			<div class="col-sm-3">
			<?php 
			            echo $this->Form->input('password',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	
	</div>


	
			

		
						
				
					
			
			       	
   
   <div class="form-group row">	       	
			<div class="col-sm-8 col-sm-offset-2">
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
				</div>
	</div>  
	</div>
	<?= $this->Form->end() ?>
 
	            </div>
	        </div>
	    </div>
	</div>
</section>
</div>
</div>