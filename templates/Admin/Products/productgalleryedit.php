

        
 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($advertisement,['type' => 'file','class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Product'), ['action' => 'index']) ?> <?= __('Status') ?> </h4>
       


	
			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Active') ?></label>
			<div class="col-sm-9">
			    <?php 
			 echo $this->Form->input('is_active',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false,'type'=>'checkbox']);
			?>
			
		
	</div>
	</div>	
	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Image') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('image',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
			?>
			<img src="<?=UPLOAD_PRODUCT_IMAGE?><?= h($advertisement->image) ?>" height=100 width=80>
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