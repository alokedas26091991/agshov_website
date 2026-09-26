 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create(null,['type' => 'file','class'=>'form form-horizontal','url' => ['controller'=>'Reports','action' => 'returnreport1']]); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Return'), ['action' => 'returnreport']) ?> <?= __('Report') ?> </h4>
       

			
			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Seller') ?></label>
			<div class="col-sm-9">
			<?php 
			
            echo $this->Form->select('seller_id', $User1,['class'=>'form-control','label' => false,'div'=>false,'empty' => true]);


			?>
			
	</div>
	</div>

	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('From Date') ?></label>
			<div class="col-sm-9">
			<input type="date" name="from_date" class="form-control" >
	</div>
	</div>
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('To Date') ?></label>
			<div class="col-sm-9">
			<input type="date" name="to_date" class="form-control" >
	</div>
	</div>
		
				
			
			
			       	
   
    <?= $this->Form->button(__('Search'), ['class' => 'btn btn-success']) ?>
    <?= $this->Form->end() ?>
 </div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
</div>
</div>