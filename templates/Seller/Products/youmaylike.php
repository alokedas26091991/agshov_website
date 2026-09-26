
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
               <?= $this->Form->create($product2,['class'=>'form form-horizontal','type' => 'file']); ?>
                    <!-- ============================================================== -->
                    <!-- Basic Details -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">Add You May Like Products Category</h4>
                               
                                </div>
                                <div class="card-body">
                                     
                                        <div class="row">
                                            <div class="form-group row">
                                            <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                			<?= __('You May Like') ?></label>
                                			<div class="col-sm-9">
                                                <?php
                                            			 
                                            	 $cat_ids=explode(",",$product2->you_may_like);
                                            	 foreach($you_may as $may)
                                            	 {
                                            	 ?> 
                                                <label class="dropdown-option">
                                                  <input type="checkbox" name="you_may_like[]" value="<?=$may->id?>" <?php if(in_array($may->id,$cat_ids))echo "checked" ?> />
                                                 <?=$may->name?>
                                                </label>
                                                <?php
                                            	 }
                                            	 ?>
                                                
                                                
                                             
                                         
                                            		
                                            	</div>
                                            </div>	
                                            <div class="form-group row">		
                                        <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
                                        			<?= __('is Deal') ?></label>
                                        			<div class="col-sm-9">
                                        			<?php 
                                        			            echo $this->Form->checkbox('is_deal',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
                                        			?>
                                        	</div>
                                        	</div>
                                                                                        
                                        </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->


               <div class="form-actions">
				<div class="submit-btn-area">
					<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update Details</button>
				</div>
			</div>

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

