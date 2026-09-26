 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($zonePincode,['type' => 'file','class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('zonePincode'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
       



			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Zone Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            
						echo $this->Form->input('zone_id', ['options' => $zones,'class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
	
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Pincode') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('pincode',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>"text"]);
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