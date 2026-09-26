 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($currency1,['type' => 'file','class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Currency'), ['action' => 'currency_list']) ?> <?= __('Edit') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Currency') ?></label>
			<div class="col-sm-9">
			<select name="currency" id="cars"class="form-control">
			    <option>Select Currency</option>
              <option value="1" <?php if ($currency1->currency=="1" ) echo 'selected = "selected"'; ?>>1 Dollar</option>
              <option value="2" <?php if ($currency1->currency=="2" ) echo 'selected = "selected"'; ?>>1 Euro</option>
              <option value="3" <?php if ($currency1->currency=="3" ) echo 'selected = "selected"'; ?>>1 Pound</option>
              <option value="4" <?php if ($currency1->currency=="4" ) echo 'selected = "selected"'; ?>>1 INR</option>
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
    <?= $this->Form->end() ?>
 </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
</div>
</div>