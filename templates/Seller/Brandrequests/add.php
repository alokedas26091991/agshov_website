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
                                <h6 class="product-heading m-b-0">Add a Brand <span></span></h6>
                            </div>
                            <div class="card-body">
							<?= $this->Form->create($sellerbrand,['type' => 'file','class'=>'form form-horizontal']); ?>
                                <div class="add_brand_section mb-4">
								
										
										
                                    <div class="row">
                                        <div class="col-md-3" id="brandid">
                                            <div class="form-group">
                                                       <?php 
														echo $this->Form->select('brand_id', $brand,['class'=>'form-control','label' => false,'div'=>false, 'id'=>'brand_id','required'=>'required']);
														?>
                                                <small id="name" class="form-text text-muted"> the name of the brand that you want to sell (e.g., Apple or Lenovo).</small>
                                            </div>
                                        </div>
                                      
										<div class="col-md-9 mb-4">
                                                        <div class="form-group">
                                                            <?php 
																	echo $this->Form->input('details',['type'=>'textarea','class'=>'form-control','empty' => true,'label' => false,'div'=>false,'placeholder'=>"Details"]);
															?>
                                                            <small id="name" class="form-text text-muted">Enter details about your brand. For example, you can write about your brand and its history, what products you sell, your brand’s philosophy and how it is different from other brands</small>
                                                        </div>
                                                    </div>
                                       
									
									
                                    </div>
								
                                </div>
                                
										<div class="form-actions" id="button1">
										<div class="submit-btn-area">
											<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
										</div>
									</div>
									<?= $this->Form->end() ?>
                                    </div>





                                </div>                                  
                            </div>            
                        </div>
                    </div>
                </div>
           
	
