
    <div id="main-wrapper" ng-app="zone" ng-controller="option_zone">

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
               <?= $this->Form->create(null,['type' => 'file','class'=>'form form-horizontal','url' => ['controller'=>'ZoneSellers','action' => 'shippingdetails']]); ?>
                    <!-- ============================================================== -->
                    <!-- Basic Details -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">Check Your Approx. Product Shipping Charge</h4>
                               
                                </div>
                                <div class="card-body">
                                     
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Source Pin Code</label>
                                                    <div class="col-sm-9">
                                                       
                                                     <input type="text" required name="source_pin" class='form-control'>
                                                    </div>
                                                </div>
                                              
                                               
                                               
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Destination Pin Code</label>
                                                    <div class="col-sm-9">
                                                       
                                                     <input type="text" required name="des_pin" class='form-control'>
                                                    </div>
                                                </div>
                                              
                                               
                                               
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Order Type</label>
                                                    <div class="col-sm-9">
                                                      <select name="order_type" required id="order_type" class='form-control'>
                                                      <option value="1">Prepaid </option>
                                                      <option value="2">COD</option>
                                                      <option value="3">Reverse</option>
                                                   
                                                    </select> 
                                                     
                                                    </div>
                                                </div>
                                              
                                               
                                               
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Length(cm)</label>
                                                    <div class="col-sm-9">
                                                       
                                                     <input type="text" required name="length" class='form-control'>
                                                    </div>
                                                </div>
                                              
                                               
                                               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Width(cm)</label>
                                                    <div class="col-sm-9">
                                                       
                                                     <input type="text" required name="width" class='form-control'>
                                                    </div>
                                                </div>
                                              
                                               
                                               
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Height(cm)</label>
                                                    <div class="col-sm-9">
                                                       
                                                     <input type="text" required name="height" class='form-control'>
                                                    </div>
                                                </div>
                                              
                                               
                                               
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Weight(kg)</label>
                                                    <div class="col-sm-9">
                                                       
                                                     <input type="text" required name="weight" class='form-control'>
                                                    </div>
                                                </div>
                                              
                                               
                                               
                                            </div>
                                            <div class="col-md-6">
                                              <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Product Amount</label>
                                                    <div class="col-sm-9">
                                                       
                                                     <input type="text" required name="amount" class='form-control'>
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
					<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Check</button>
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
	<?=$this->Html->css(['/admin_template/app-assets/vendors/css/wizard','/admin_template/css/ngProgress']);?>
		<script>var ajxUrl='<?=$this->Url->build("/seller/products");?>';
		var ajxPageUrl='<?=$this->Url->build("/vendor/products");?>';
			
				var states=<?=json_encode($states);?>;
			
		</script>
	  <?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/option_zone'],['block'=>'scriptBottom']);?>
