<div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($user,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Account Holder'), ['action' => 'index']) ?> <?= __('KYC') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Bank Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('bank_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('A/c No') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('account_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>			
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('IFSC code') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('ifsc_code',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>					
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Bank Address') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('bank_address',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
			
	</div>
	</div>	
<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Market Address') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('market_address',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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

