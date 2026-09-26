
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
              <?= $this->Form->create($question,['type' => 'file','class'=>'form form-horizontal']); ?>
   
      <div class="form-body">
	                    	
       

			
			<div class="form-group row">		
 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
			<?= __('Answer') ?></label>
			<div class="col-sm-9">
			<?php 
			            echo $this->Form->textarea('ans',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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
			            echo $this->Form->number('ord',['type'=>'number','class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
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

