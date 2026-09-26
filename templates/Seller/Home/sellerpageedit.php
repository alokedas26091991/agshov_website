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
	                    	
       			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Page Name') ?></label>
			<div class="col-sm-9">
			<select name="page_name" class="form-control" required>
			    <option>Select Page</option>
			    <option value="1" <?php if($advertisement->page_name == '1') echo"selected"; ?>>About</option>
			    <option value="2" <?php if($advertisement->page_name == '2') echo"selected"; ?>>Contact Us</option>
			    <option value="3" <?php if($advertisement->page_name == '3') echo"selected"; ?>>Support</option>
			    <option value="4" <?php if($advertisement->page_name == '4') echo"selected"; ?>>Photo</option>
			    <option value="5" <?php if($advertisement->page_name == '5') echo"selected"; ?>>Video</option>
			    <option value="6" <?php if($advertisement->page_name == '6') echo"selected"; ?>>Client Feedback</option>
			    <option value="7" <?php if($advertisement->page_name == '7') echo"selected"; ?>>Marketing Materials</option>
			    <option value="8" <?php if($advertisement->page_name == '8') echo"selected"; ?>>Information</option>
			    <option value="9" <?php if($advertisement->page_name == '9') echo"selected"; ?>>Certificates</option>
			    <option value="10" <?php if($advertisement->page_name == '10') echo"selected"; ?>>CSR</option>
			</select>
	</div>
	</div>


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
			<?= __('Details') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->textarea('details',['class'=>'form-control ckeditor','empty' => true,'label' => false,'div'=>false]);
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
			<img src="/../upload/homepageimage/<?=$advertisement->photo?>" height="100" width="100"/>
	</div>

	</div>

						
			
			
				<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			Section</label>
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
			<?= __('Product') ?></label>
			<div class="col-sm-9">
			<?php
                                            			 
        	 $products_ids=explode(",",$advertisement->products);
        	 foreach($product1 as $may)
        	 {
        	 ?> 
            <label class="dropdown-option">
              <input type="checkbox" name="products[]" value="<?=$may->id?>" <?php if(in_array($may->id,$products_ids))echo "checked" ?> />
             <?=$may->name?>
            </label>
            <?php
        	 }
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