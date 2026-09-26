        <div class="page-wrapper" ng-app="product" ng-controller="productCrt">
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
                <!-- Earnings -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <h6 class="product-heading m-b-0">Report <span>(Find the report)</span></h6>
                            </div>
                            <div class="card-body">
							
                                <div class="add_brand_section mb-4">
								
										
										
                                    <div class="row">
                                        <div class="col-md-3" id="brandid">
                                            <div class="form-group">
                                                       <?php 
                                                       	$report_type = [
															'1' => 'Orders',
															'2' => 'Catalogs',
															'3' => 'Payments',
															'4' => 'Returns',
														];
														echo $this->Form->select('report_type', $report_type,['class'=>'form-control','empty' => true,'label' => false,'div'=>false, 'id'=>'report','onclick'=>'get_nextstep();']);
														?>
                                                <small id="name" class="form-text text-muted"> Select Report type</small>
                                            </div>
                                        </div>
										 
                                    </div>
									<div class="form-actions" id="button">
							<div class="submit-btn-area">
						
								
							</div>
						</div>
                                </div>
                                
								<div class="upload-section"  id="catalog" style="display:none;">
                                        <p>Catalog Report</p></br>
                                        <div class="">
                                            <div class="upload-box">
                                                <?= $this->Form->create(null,['type' => 'file','class'=>'form form-horizontal','url' => ['controller'=>'home','action' => 'catalogreport']]); ?>
                                                
                                                <div class="form-actions" id="button4" style="display:none;">
            										<div class="submit-btn-area">
            											<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Search</button>
            										</div>
            									</div>
            									<?= $this->Form->end() ?>
                                            </div>
											</div>
											</div>
                                   

                                    <div class="upload-section"  id="orders" style="display:none;">
                                        <p>Order Report</p></br>
                                        <div class="">
                                            <div class="upload-box">
                                                <?= $this->Form->create(null,['type' => 'file','class'=>'form form-horizontal','url' => ['controller'=>'home','action' => 'orderreport']]); ?>
                                                <div class="row">
                                                   
                                                   
                                                 
                                                    <div class="col-md-3 mb-4">
                                                        <div class="form-group">
                                                            <input type="date" name="from_date" class="form-control">
                                                            <small id="name" class="form-text text-muted">From Date</small>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <div class="form-group">
                                                            <input type="date" name="to_date" class="form-control">
                                                            <small id="name" class="form-text text-muted">To Date</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <div class="form-group">
                                                            <?php 
                                                       	$order_status = [
															'4' => 'Confirmed',
															'2' => 'Completed',
															'3' => 'Cancelled',
															
														];
														echo $this->Form->select('order_status',$order_status,['class'=>'form-control','empty' => true,'label' => false,'div'=>false, 'id'=>'order_status']);
														?>
                                                            <small id="name" class="form-text text-muted">Order Status</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-actions" id="button1" style="display:none;">
            										<div class="submit-btn-area">
            											<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Search</button>
            										</div>
            									</div>
            									<?= $this->Form->end() ?>
                                            </div>
											</div>
											</div>
											<div class="upload-section"  id="payments" style="display:none;">
                                        <p>Payment Report</p></br>
                                        <div class="">
                                            <div class="upload-box">
                                                 <?= $this->Form->create(null,['type' => 'file','class'=>'form form-horizontal','url' => ['controller'=>'home','action' => 'paymentreport']]); ?>
                                                <div class="row">
                                                   
                                                  
                                                 
                                                     <div class="col-md-3 mb-4">
                                                        <div class="form-group">
                                                            <input type="date" name="from_date" class="form-control">
                                                            <small id="name" class="form-text text-muted">From Date</small>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <div class="form-group">
                                                            <input type="date" name="to_date" class="form-control">
                                                            <small id="name" class="form-text text-muted">To Date</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <div class="form-group">
                                                            <?php 
                                                       	$payment_status = [
															'0' => 'Not Paid',
															'1' => 'Paid',
														
															
														];
														echo $this->Form->select('payment_status',$payment_status,['class'=>'form-control','empty' => true,'label' => false,'div'=>false, 'id'=>'payment_status']);
														?>
                                                            <small id="name" class="form-text text-muted">Payment Status</small>
                                                        </div>
                                                    </div>
                                                   
                                                   
                                                </div>
                                                 <div class="form-actions" id="button2" style="display:none;">
                										<div class="submit-btn-area">
                											<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Search</button>
                										</div>
                									</div>
                									<?= $this->Form->end() ?>
                                            </div>
											</div>
											</div>
											
											<div class="upload-section"  id="returns" style="display:none;">
                                        <p>Return Report</p></br>
                                        <div class="">
                                            <div class="upload-box">
                                              <?= $this->Form->create(null,['type' => 'file','class'=>'form form-horizontal','url' => ['controller'=>'home','action' => 'returnreport']]); ?>
                                                <div class="row">
                                                   
                                                   
                                                 
                                                     <div class="col-md-3 mb-4">
                                                        <div class="form-group">
                                                            <input type="date" name="from_date" class="form-control">
                                                            <small id="name" class="form-text text-muted">From Date</small>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <div class="form-group">
                                                            <input type="date" name="to_date" class="form-control">
                                                            <small id="name" class="form-text text-muted">To Date</small>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mb-4">
                                                        <div class="form-group">
                                                            <?php 
                                                       	$return_status = [
															'1' => 'Request for Return',
															'2' => 'Return Approved',
															'3' => 'Return Completed',
														
														];
														echo $this->Form->select('return_status',$return_status,['class'=>'form-control','empty' => true,'label' => false,'div'=>false, 'id'=>'return_status']);
														?>
                                                            <small id="name" class="form-text text-muted">Return Status</small>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-actions" id="button3" style="display:none;">
                										<div class="submit-btn-area">
                											<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Search</button>
                										</div>
                									</div>
                									<?= $this->Form->end() ?>
                                            </div>
											</div>
											</div>
											
										
                                         
                                     
										
                                    </div>





                                </div>                                  
                            </div>            
                        </div>
                    </div>
                </div>
           
<script>


function get_nextstep() {
  var checkBox = document.getElementById("report").value;
  
  if (checkBox == 1){
    
    orders.style.display = "block";
	button1.style.display = "block";
	button2.style.display = "none";
	button3.style.display = "none";
	button4.style.display = "none";
	payments.style.display = "none";
	returns.style.display = "none";
	catalog.style.display = "none";
  } 
  else if(checkBox == 2) {
      
    orders.style.display = "none";
	button1.style.display = "none";
	button2.style.display = "none";
	button3.style.display = "none";
	button4.style.display = "block";
	payments.style.display = "none";
	returns.style.display = "none";
	catalog.style.display = "block";
	 
  }
  else if(checkBox == 3)
  {
    orders.style.display = "none";
	button1.style.display = "none";
	button2.style.display = "block";
	button3.style.display = "none";
	button4.style.display = "none";
	payments.style.display = "block";
	returns.style.display = "none";
	catalog.style.display = "none";
  }
  else
  {
    orders.style.display = "none";
	button1.style.display = "none";
	button2.style.display = "none";
	button3.style.display = "block";
	button4.style.display = "none";
	payments.style.display = "none";
	returns.style.display = "block";
	catalog.style.display = "none";
  }
}
</script>	
