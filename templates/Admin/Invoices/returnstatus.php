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
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Return Status'), ['action' => 'index']) ?> <?= __('Change') ?> </h4>
       


			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Return Status') ?></label>
			<div class="col-sm-9">
            <?php 
				$return_status = [
			
					
					'2' => 'Approve Return Request',
					
					'3' => 'Return Complete',
				];
							echo $this->Form->select('return_status',$return_status,['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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