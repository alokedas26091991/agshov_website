
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
               <?= $this->Form->create($zoneSeller,['class'=>'form form-horizontal','type' => 'file']); ?>
                    <!-- ============================================================== -->
                    <!-- Basic Details -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">Update Your Selling Location</h4>
                               
                                </div>
                                <div class="card-body">
                                     
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">State</label>
                                                    <div class="col-sm-9">
                                                     <?php 
                                        			          
                                    echo $this->Form->input('state_id', ['options' => $states,'class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
                                        			?>
                                                    </div>
                                                </div>
                                              
                                               
                                               
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Zone Name</label>
                                                    <div class="col-sm-9">
                                                     <?php 
			                                         echo $this->Form->input('zone_id',['options' => $zones,'class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
													  ?>
                                                    </div>
                                                </div>
                                              
                                               
                                               
                                            </div>
                                        </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>

                 
                   

               <div class="form-actions">
				<div class="submit-btn-area">
					<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update Zone</button>
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

    <!-- ============================================
    Modal
    =========================================-->


    <!-- ============================================================== -->
    <!-- All Jquery -->

