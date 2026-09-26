
    <div id="main-wrapper">

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
    <?= $this->Form->create($advertisement,['type' => 'file','class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    		
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Page Name') ?></label>
			<div class="col-sm-9">
			<select name="page_name" class="form-control" required>
			    <option>Select Page</option>
			    <option value="1">About</option>
			    <option value="2">Contact Us</option>
			    <option value="3">Support</option>
			    <option value="4">Photo</option>
			    <option value="5">Video</option>
			    <option value="6">Client Feedback</option>
			    <option value="7">Marketing Materials</option>
			    <option value="8">Information</option>
			    <option value="9">Certificates</option>
			    <option value="10">CSR</option>
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
			<?= __('Video Link') ?></label>
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
																	?>	<div class="switch-main">
															    <div class="onoffswitch">
																<input id="is_active" class="onoffswitch-checkbox" type="checkbox" empty="0" value="1" name="is_active">
																
			<label class="onoffswitch-label" for="is_active">
																		<span class="onoffswitch-inner"></span>
																		<span class="onoffswitch-switch"></span>
																	</label>
																	</div>
																</div>
															
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
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================
    Modal
    =========================================-->


    <!-- ============================================================== -->
    <!-- All Jquery -->

