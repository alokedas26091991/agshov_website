 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($pinCode,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Pin Code'), ['action' => 'index']) ?> <?= __('Edit') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Code') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('code',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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