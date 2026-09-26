<div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
		<li><?= $this->Html->link(__('User'), ['action' => 'index']) ?></li>
		<li class="active"><?= __('Change Password') ?></li>
		</ol>
		</div>
<div class="forms-main">
		<div class="graph-form">
		<div class="form-body">	
    <?= $this->Form->create($user,['class'=>'form-horizontal','type'=>'file']); ?>
   
      
       


			<div class="form-group">		
 <label for="focusedinput" class="col-sm-2 control-label">
			<?= __('New Password') ?></label>
			<div class="col-sm-3">
			<?php 
			            echo $this->Form->input('password',['class'=>'form-control1','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>			
						
			    	
   
   <div class="form-group">	       	
			<div class="col-sm-8 col-sm-offset-2">
    <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
				</div>
	</div>
</div>
</div>
</div>
</section>
</div>
</div>