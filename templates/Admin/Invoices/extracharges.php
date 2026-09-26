 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($Invoice1,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Extra'), ['action' => 'index']) ?> <?= __('Charges') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Charge Type') ?></label>
			<div class="col-sm-9">
            <?php 
				$charge_type = [
			
					
					'1' => 'RTO',
					
					'2' => 'RMA',
				];
							echo $this->Form->select('charge_type',$charge_type,['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
				?>
	</div>
	</div>
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Charge Amount') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('charge_amount',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
		<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Charge Details') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->textarea('charge_details',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Charge Receive?') ?></label>
			<div class="col-sm-9">
            <?php 
				$charge_type = [
			
					
					'1' => 'No',
					
					'2' => 'Yes',
				];
							echo $this->Form->select('charge_receive',$charge_type,['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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