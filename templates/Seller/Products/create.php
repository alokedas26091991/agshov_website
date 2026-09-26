<div ng-app="product" ng-controller="saleProduct">   
	<div class="page-breadcrumb" id="panel">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Add a Product</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10">
                                <div class="">
                                    <?php echo $this->Html->link(' Track Listings',
                            ['controller' => 'Products', 'action' => 'catelog', '_full' => true,'prefix'=>'vendor'],['escape'=>false,'class'=>'btn btn-lg btn-upload waves-effect waves-light']);?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <div class="card-body">
                                <div class="prodect_panel">
                                    <div class="sell-existing-panel">
                                        <div class="porduct-content">
                                            <h6 class="product-heading">Sell an Existing Product</h6>
                                            <form class="form-inline">
                                                <input class="form-control mr-sm-2" type="search" ng-model="searchData" placeholder="Search by Product name or SUPC" aria-label="Search">
                                                <button class="btn ser-btn my-2 my-sm-0" type="button" ng-click="searchProduct($event)">Find</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="create-new-panel">
                                        <div class="porduct-content">
                                            <h6 class="product-heading">Sell a New Product</h6>
                                           <?php echo $this->Html->link(' Create a Single Listing',
                            ['controller' => 'Products', 'action' => 'add', '_full' => true,'prefix'=>'vendor'],['escape'=>false,'class'=>'btn btn-outline btn-upload']);?>
                                        </div>
                                    </div>
                                </div>                                  
                            </div>            
                        </div>
                    </div>

                    <!--div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="prodect_panel">
                                    <div class="sell-existing-panel">
                                        <div class="porduct-content">
                                            <h6 class="product-heading">Bulk Listing</h6>
                                            <div class="manage-brands-desc">Want to list in bulk? Please download from below options to get started.</div>
                                        </div>
                                    </div>
                                    <div class="create-new-panel">
                                        <div class="porduct-content">
                                            <div>                                                
                                                <button type="button" class="btn btn-outline btn-upload">Download Lite Sheet (Faster)</button>
                                            </div>
                                            <div class="text-center my-2">
                                                <p class="custom-need-help">Need help? <a href="#!">Watch Instruction Video</a></p>
                                                <p>or</p>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-outline btn-upload">Download Bulk Content Sheet</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                  
                            </div>
                            <div class="card-body border-top">
                                <div class="prodect_panel">
                                    <div class="sell-existing-panel">
                                        <div class="porduct-content">
                                            <div class="manage-brands-desc">Once you have created the export sheet using one of the above options, upload it using this button.</div>
                                        </div>
                                    </div>
                                    <div class="create-new-panel">
                                        <div class="porduct-content">
                                            <button type="button" class="btn btn-outline btn-upload">Upload Content Sheet</button>
                                        </div>
                                    </div>
                                </div>   
                            </div>            
                        </div>
                    </div--->

                    <!--div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="customsheet-new-tag">New</div>
                                <div class="prodect_panel">
                                    <div class="sell-existing-panel">
                                        <div class="porduct-content">
                                            <div class="manage-brands-desc">Once you have created the export sheet using one of the above options, upload it using this button.</div>
                                        </div>
                                    </div>
                                    <div class="create-new-panel">
                                        <div class="porduct-content">
                                            <button type="button" class="btn btn-outline btn-upload">Import Tour Listings</button>
                                            <div class="text-center my-2">
                                                <p class="custom-need-help">Need help? <a href="#!">Download Instruction Manual</a></p>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>                                  
                            </div>            
                        </div>
                    </div-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="prodect_panel">
                                    <div class="sell-existing-panel">
                                        <div class="porduct-content">
                                            <div class="manage-brands-desc">
											<table class="table table-one">
                                                <thead>
                                                    <tr class="filters">
													 <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Brand" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Category" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Type" disabled></th>
                                                        
                                                      
                                                       <!-- <th><input type="text" class="form-control" placeholder="Status" disabled></th>-->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <tr ng-repeat="list in searchdata">
                                                        <td>{{list.name}}</td>
														<td>{{list.brand.name}}</td>
                                                        <td>{{list.category.name}}</td>
                                                        <td>{{list.type.name}}</td>
                                                        
                                                        <!--<td><small class="text-green"><button class="btn btn-sm btn-success">Sale Now</button></small></td>-->
                                                    </tr>
                                                </tbody>
                                            </table>
											
											</div>
                                        </div>
                                    </div>
                                    <div class="create-new-panel">
                                        <div class="porduct-content">
                                            <?php echo $this->Html->link(' Add Brand',
                            ['controller' => 'Sellerbrands', 'action' => 'add', '_full' => true,'prefix'=>'vendor'],['escape'=>false,'class'=>'btn btn-outline btn-upload']);?>
                                        </div>                                        
                                    </div>
                                </div>                                  
                            </div>            
                        </div>
                    </div>
                </div>
            </div>
       </div>
	   <?=$this->Html->css(['/admin_template/app-assets/vendors/css/wizard','/admin_template/css/ngProgress']);?>
		<script>var ajxUrl='<?=$this->Url->build("/vendor/products");?>';
				var productId=0;
		</script>
	  <?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/product_sale'],['block'=>'scriptBottom']);?>