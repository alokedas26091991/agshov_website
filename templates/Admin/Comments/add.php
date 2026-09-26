 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($category,['type' => 'file','class'=>'form form-horizontal'],array('enctype'=>'multipart/form-data')); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Category'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Header Image') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('header_image1',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
	

				
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Active') ?></label>
			<div class="col-sm-9">
		
			<?php 
			 echo $this->Form->input('is_active',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false,'type'=>'checkbox']);
			?>										
															
	</div>
	</div>	
				<div class="form-group row" style="display:none;">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Menu') ?></label>
			<div class="col-sm-9">
		
			<?php 
			 echo $this->Form->input('is_menu',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false,'type'=>'checkbox']);
			?>										
															
	</div>
	</div>
	
					<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Menu Order') ?></label>
			<div class="col-sm-9">
		
			<?php 
			 echo $this->Form->input('menu_order',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'number']);
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