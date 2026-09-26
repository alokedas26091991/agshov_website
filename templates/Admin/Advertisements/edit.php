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
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Advertisement'), ['action' => 'index']) ?> <?= __('Edit') ?> </h4>
       


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
			<?= __('Description') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->textarea('description',['class'=>'form-control ckeditor','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Photo') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('photo',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
			?>
			<img src="/upload/homepageimage/<?=$advertisement->photo?>" height="100" width="100"/>
	</div>

	</div>

			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Start Date') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->date('start_date',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('End Date') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->date('end_date',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			
			
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			Section(1 for Products)</label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('section',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Link') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('link',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Active') ?></label>
			<div class="col-sm-9">
		
			<?php 
			 echo $this->Form->checkbox('is_active',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false]);
			?>										
															
	</div>
	</div>			
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Order') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('ord',['type'=>'number','class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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
<?php $this->Html->script(['/js/ckeditor/ckeditor','ckeditor-custom-config'], ['block' => 'scriptBottom']) ?>