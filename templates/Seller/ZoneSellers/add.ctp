
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
               <?= $this->Form->create($zoneSeller,['class'=>'form form-horizontal','type' => 'file']); ?>
                    <!-- ============================================================== -->
                    <!-- Basic Details -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">Assign Your Zone Where You Do Not Want to Sell Products.</h4>
                               
                                </div>
                                <div class="card-body">
                                     
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">State</label>
                                                    <div class="col-sm-9">
                                                        <select name="state_id" ng-model="state_id" ng-change="zonelist()" class='form-control' convert-to-number><option ng-repeat="c in states" ng-value="c.id" ng-selected="c.id==category_id">{{c.name}}</option> </select>
                                                     
                                                    </div>
                                                </div>
                                              
                                               
                                               
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Zone Name</label>
                                                    <div class="col-sm-9">
                                                        <select name="zone_id" ng-model="zone_id" class='form-control' convert-to-number><option ng-repeat="c in zones" ng-value="c.id" ng-selected="c.id==zone_id">{{c.name}}</option> </select>
                                                    
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
					<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Assign Zone</button>
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
