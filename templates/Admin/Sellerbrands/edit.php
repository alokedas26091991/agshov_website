 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($question,['type' => 'file','class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Status'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
       
	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Status') ?></label>
			<div class="col-sm-9">
		
			<?php 
			 echo $this->Form->input('status',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'textarea']);
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
<script>
function myFunction() {
  var checkBox = document.getElementById("is_new_brand");
  if (checkBox.checked == true){
    biswa.style.display = "block";
	brandid.style.display = "none";
  } else {
     biswa.style.display = "none";
	 brandid.style.display = "block";
	 
  }
}
function myFunction1() {
	document.getElementById("name").value=document.getElementById("Brands").value;
}
</script>