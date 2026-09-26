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
                                <h6 class="product-heading m-b-0">Add a Brand <span>(Provide the brand name and select the product category in which you want to sell.)</span></h6>
                            </div>
                            <div class="card-body">
							<?= $this->Form->create($sellerbrand,['type' => 'file','class'=>'form form-horizontal']); ?>
                                <div class="add_brand_section mb-4">
								
										<div class="form-group row">		
											 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
														<?= __('Is New Brand') ?></label>
														<div class="col-sm-9">
													
														<?php 
														 echo $this->Form->input('is_new_brand',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false, 'id'=>'is_new_brand', 'onclick'=>'myFunction()']);
														?>										
																										
												</div>
												</div>
										
                                    <div class="row">
                                        <div class="col-md-3" id="brandid">
                                            <div class="form-group">
                                                       <?php 
														echo $this->Form->input('brand_id',['options' => $Brands,'class'=>'form-control','empty' => true,'label' => false,'div'=>false, 'id'=>'Brands']);
														?>
                                                <small id="name" class="form-text text-muted"> the name of the brand that you want to sell (e.g., Apple or Lenovo). If it is a private label, type your brand’s name.</small>
                                            </div>
                                        </div>
										 <div class="col-md-3" id="biswa" style="display:none">
                                            <div class="form-group">
                                                       <?php 
															echo $this->Form->input('name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'id'=>'name']);
														?>
                                                <small id="name" class="form-text text-muted"> the name of the brand that you want to sell (e.g., Apple or Lenovo). If it is a private label, type your brand’s name.</small>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
											<select name="category_id" class="form-control" ng-model="category_id" ng-change="categorieslist()"><option  ng-repeat="c in categories" ng-value="c.id">{{c.name}}</option>
											</select>
                                                       
                                                <small id="name" class="form-text text-muted">Select the product category in which you want to sell.</small>
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                       <select name="sub_category_id" class="form-control" ng-model="sub_category_id"  ng-change="typelist()"><option ng-repeat="c in subcategories" ng-value="c.id">{{c.name}}</option>
											</select>
                                                <small id="name" class="form-text text-muted">Select the product Sub category in which you want to sell.</small>
                                            </div>
                                        </div>
										<div class="col-md-3">
                                            <div class="form-group">
                                                        <select name="type_id" class="form-control" ng-model="type_id" ><option ng-repeat="c in type" ng-value="c.id">{{c.name}}</option>
											</select> 
                                                <small id="name" class="form-text text-muted">Select the product Type in which you want to sell.</small>
                                            </div>
                                        </div>
                                    </div>
									<div class="form-actions" id="button">
							<div class="submit-btn-area">
							<a class="btn btn-success" style="color: #fff;background-color: #36bea6;border-color: #36bea6;" onclick="get_nextstep();"><i class="fa fa-check"></i> Continue</a>
								
							</div>
						</div>
                                </div>
                                <div class="next_step" id="nextstep" style="display:none">
                                    <h6 class="product-heading mb-3">Next Steps for You</span></h6>
									<div id="newbrand">
                                    <div class="alert alert-primary mb-4" role="alert">
                                      This brand is not present in our catalog. We urge you to register your brand by selecting the auto-generated logo or uploading your existing logo.
                                    </div>

                                    <div class="upload-section">
                                        <div class="">
                                            <div class="upload-box">
                                                <div class="row">
                                                   
                                                    <div class="col-md-2 mb-4">
                                                        <p>Attach brand logo</p>
                                                        <div class="border-dashed-black text-center">
                                                            <div>
                                                                <img src="<?php echo $this->Url->image("vendor/img/upload-cloud.png", ['pathPrefix' => '']) ?>" class="upload-img">
                                                                <div>
                                                                    <strong class="drag-drop-label">Drag and Drop Files</strong>
                                                                </div>
                                                                <div class="help-text-container pad-bottom-ten">
                                                                    <p>- OR -</p>
                                                                </div>
                                                              
                                                               <?php 
																	echo $this->Form->input('brand_logo',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
																?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-4">
                                                        <div class="accepted-documents">
                                                            <strong>Logo guidelines</strong>
                                                            <ul class="help-text-container">
                                                                <li>Maximum file size up to 5KB</li>
                                                                <li>Accepted formats JPG or JPEG</li>
                                                                <li>Required logo dimensions: height 110 pixels, width 66 pixels</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-9 mb-4">
                                                        <div class="form-group">
                                                            <?php 
																	echo $this->Form->input('brand_description',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'placeholder'=>"Brand Description(Optional)"]);
															?>
                                                            <small id="name" class="form-text text-muted">Enter details about your brand. For example, you can write about your brand and its history, what products you sell, your brand’s philosophy and how it is different from other brands</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											</div>
											</div>
											</div>
                                            <div class="Optional-option">
                                                <h6 class="product-heading">Optional Actions</h6>
                                                <p>Please attach any supported documents if you wanted to upload.Select the box to proceed.</p>

                                               
                                                <div class="row">
                                                    <div class="col-md-2 mb-4">
                                                        <div class="border-dashed-black text-center mt-4">
                                                            <div>
                                                                <img src="<?php echo $this->Url->image("vendor/img/upload-cloud.png", ['pathPrefix' => '']) ?>" class="upload-img">
                                                                <div>
                                                                    <strong class="drag-drop-label">Drag and Drop Files</strong>
                                                                </div>
                                                                <div class="help-text-container pad-bottom-ten">
                                                                    <p>- OR -</p>
                                                                </div>
                                                               <?php 
																	echo $this->Form->input('upload_doc',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
														        ?> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="form-group">
                                                            <?php 
														$doc_type = [
															'Trademark Certificate' => 'Trademark Certificate',
															'Brand Authorization Letter' => 'Brand Authorization Letter',
															'Product Tax Invoice' => 'Product Tax Invoice',
														];
																	echo $this->Form->input('document_type',['options' => $doc_type,'class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
														?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mb-4">
                                                        <div class="accepted-documents mt-0">
                                                            <strong>Logo guidelines</strong>
                                                            <ul class="help-text-container">
                                                                <li>Maximum file size up to 5KB</li>
                                                                <li>Accepted formats JPG or JPEG</li>
                                                                <li>Required logo dimensions: height 110 pixels, width 66 pixels</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
										<div class="form-actions" id="button1" style="display:none;">
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
           
<script>

function myFunction() {
  var checkBox = document.getElementById("is_new_brand");
  if (checkBox.checked == true){
    biswa.style.display = "block";
	brandid.style.display = "none";
  } else {
     biswa.style.display = "none";
	 brandid.style.display = "block";
	 
  }
}
function get_nextstep() {
  var checkBox = document.getElementById("is_new_brand");
  if (checkBox.checked == true){
    nextstep.style.display = "block";
	button.style.display = "none";
	button1.style.display = "block";
  } else {
	  nextstep.style.display = "block";
     newbrand.style.display = "none";
	button1.style.display = "block";
	 button.style.display = "none";
	 
  }
}
</script>	
<script>var categories=<?=json_encode($categories);?>;
				
		</script>	
		<?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/new_brand_seller'],['block'=>'scriptBottom']);?>