<div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create(null,['class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    	
       <h4>Assign Vendor Password</h4>



			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Password') ?></label>
			<div class="col-sm-9">
			
			           <?php 
			            echo $this->Form->input('password',['class'=>'form-control1','empty' => true,'label' => false,'div'=>false]);
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

