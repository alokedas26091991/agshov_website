 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($customer,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Customer'), ['action' => 'index']) ?> <?= __('Edit') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('School Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('school_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Address') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('address',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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
			<?= __('Email') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('email',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Contact Person') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('contact_person',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('English Version') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('english_version',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Bengali Version') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('bengali_version',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Small School') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('small_school',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Large School') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('large_school',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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