
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
               <?= $this->Form->create($Invoice1,['class'=>'form form-horizontal','type' => 'file']); ?>
                    <!-- ============================================================== -->
                    <!-- Basic Details -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">Add Details</h4>
                               
                                </div>
                                <div class="card-body">
                                     
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Select Details Type</label>
                                                    <div class="col-sm-9">
                                                        <?php 
														$details_type = [
															'1' => 'IMEI No',
															'2' => 'Serial No',
															'3' => 'Not',
														];
																	echo $this->Form->select('details_type',$details_type,['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
														?>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                             <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Add IMEI/Serial No</label>
                                                    <div class="col-sm-9">
                                                        <?php
																	echo $this->Form->input('details_number',['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
														?>
                                                    </div>
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

