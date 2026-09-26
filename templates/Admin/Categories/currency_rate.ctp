 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($currency,['type' => 'file','class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('currency'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Currency') ?></label>
			<div class="col-sm-9">
			<select name="currency" id="cars"class="form-control">
			    <option>Select Currency</option>
              <option value="1">1 Dollar</option>
              <option value="2">1 Euro</option>
              <option value="3">1 Pound</option>
              <option value="4">1 INR</option>
            
            </select>
	</div>
	</div>

			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Rate') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('rate',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>	
	
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Delivery Charge') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('delivery_charge',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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