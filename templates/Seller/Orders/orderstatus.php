
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

                    <!-- ============================================================== -->
                    <!-- Basic Details -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">Order Status</h4>
                               
                                </div>
                                <div class="card-body">
                                    
                                        <div class="row">
                                        
                                            <div class="col-md-6">
                                                 <?= $this->Form->create($Invoice1,['class'=>'form form-horizontal','type' => 'file']); ?>
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Order Status</label>
                                                    <div class="col-sm-9">
                                                        <?php 
														$order_status = [
													
															'4' => 'Confirmed',
															
															
															'3' => 'Cancelled',
														];
																	echo $this->Form->select('order_status',$order_status,['class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
														?>
                                                    </div>
                                                </div>
                                                
                            
                                                <div class="form-actions">
            				<div class="submit-btn-area">
            				<?php
            				if($Invoice1->order_status==0)
                            {?>
            					<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update Order Status</button>
            					<?php }
            					if($Invoice1->order_status==4)
            					{
            					?>
            					<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Cancell Order </button>
            					<?php
            					}
            					?>
            				</div>
            				
            			</div>
                        <?= $this->Form->end() ?>
                                               
                                            </div>
                            <?php
                            if($Invoice1->order_status==4 || $Invoice1->order_status==2)
                            {?>
                            
                           <div class="col-md-2">
                            <?= $this->Html->link('<span class="btn btn-sm btn-default">Download Invoice</span><span class="sr-only">' . __('Details') . '</span>', ['action' => 'getShipmentSlip',$Invoice1->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Invoice')]) ?>
                               
                         </div>
                         <?php } ?>
                         <?php
                            if($Invoice1->awbNo!=NULL)
                            {?>
                          <div class="col-md-2">
                            <?= $this->Html->link('<span class="btn btn-sm btn-default">Generate Manifest</span><span class="sr-only">' . __('Manifest') . '</span>', ['action' => 'get_manifest',$Invoice1->shyplite_details[0]->manifestID], ['escape' => false, 'class' => 'btn-default','target'=>'_blank', 'title' => __('Manifest')]) ?>
                               
                         </div>
                         
                           <div class="col-md-2">
                            <?= $this->Html->link('<span class="btn btn-sm btn-default">Generate Packaging Slip</span><span class="sr-only">' . __('Packaging') . '</span>', ['action' => 'getShipmentSlip1',$Invoice1->shyplite_details[0]->id], ['escape' => false,'target'=>'_blank', 'class' => 'btn-default', 'title' => __('Packaging')]) ?>
                               
                         </div>
                         <?php } ?>
                         
                         
                           
                                        </div>
                                         
                        

                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->



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

