 <div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
	                <div class="px-3">

    <?= $this->Form->create($sellerbrand,['type' => 'file','class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		<h4 class="form-section"><i class="fa fa-plus"></i> <?= $this->Html->link(__('Seller Brand'), ['action' => 'index']) ?> <?= __('Add') ?> </h4>
       


			
			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Category Id') ?></label>
			<div class="col-sm-9">
			<?php 
			
            echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','label' => false,'div'=>false]);


			?>
			
	</div>
	</div>
	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Sub Category Id') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('sub_category_id',['options' => $SubCategories,'class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Type Id') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('type_id',['options' => $Types,'class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
				<div class="form-group row" >		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Brand Id') ?></label>
			<div class="col-sm-9" id="brandid">
			<?php 
			            echo $this->Form->input('brand_id',['options' => $Brands,'class'=>'form-control','empty' => true,'label' => false,'div'=>false, 'onchange'=>'myFunction1()', 'id'=>'Brands']);
			?>
	</div>
	</div>

			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is New Brand') ?></label>
			<div class="col-sm-9">
		
			<?php 
			 echo $this->Form->input('is_new_brand',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false, 'id'=>'is_new_brand', 'onclick'=>'myFunction()']);
			?>										
															
	</div>
	</div>
	
	<div id="biswa" style="display:none">
	<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Name') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'id'=>'name']);
			?>
	</div>
	</div>
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Brand Logo') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('brand_logo',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Brand Description') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('brand_description',['class'=>'form-control ckeditor','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
					<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Upload Document') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->input('upload_doc',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Document Type') ?></label>
			<div class="col-sm-9">
			<?php 
			$doc_type = [
				'Trademark Certificate' => 'Trademark Certificate',
				'Brand Authorization Letter' => 'Brand Authorization Letter',
				
			];
			            echo $this->Form->input('document_type',['options' => $doc_type,'class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
			?>
	</div>
	</div>
	
	</div>
	
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Is Active') ?></label>
			<div class="col-sm-9">
		
			<?php 
			 echo $this->Form->input('is_active',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false]);
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