      
<style>
.modal-dialog,
.modal-content {
    /* 80% of window height */
    height: 90%;
}

.modal-body {
    /* 100% = dialog height, 120px = header + footer */
    max-height: calc(100% - 20px);
    overflow-y: scroll;
}


     
      .openBtn {
        display: flex;
        justify-content: left;
      }
      .openButton {
        border: none;
        border-radius: 5px;
        background-color: #1c87c9;
        color: white;
        padding: 6px 16px;
        cursor: pointer;
        /*position: fixed;*/
      }
      .loginPopup {
        position: relative;
        text-align: center;
        width: 100%;
      }
      .formPopup {
        display: none;
        position: fixed;
        left: 45%;
        top: 5%;
        transform: translate(-50%, 5%);
        border: 3px solid #999999;
        z-index: 9;
      }
      .formContainer {
        max-width: 300px;
        padding: 20px;
        background-color: #fff;
      }
      .formContainer input[type=text],
      .formContainer input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 20px 0;
        border: none;
        background: #eee;
      }
      .formContainer input[type=text]:focus,
      .formContainer input[type=password]:focus {
        background-color: #ddd;
        outline: none;
      }
      .formContainer .btn {
        padding: 12px 20px;
        border: none;
        background-color: #8ebf42;
        color: #fff;
        cursor: pointer;
        width: 100%;
        margin-bottom: 15px;
        opacity: 0.8;
      }
      .formContainer .cancel {
        background-color: #cc0000;
      }
      .formContainer .btn:hover,
      .openButton:hover {
        opacity: 1;
      }
  
</style>
	  <div  ng-app="product" ng-controller="productCrt">
   
   <div class="page-breadcrumb" id="panel">
                <div class="row">
                    <div class="align-self-center">
                        <h4 class="page-title">Create Single Listing</h4>
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
<div class="alert alert-success alert-light alert-dismissible" role="alert" ng-show="offineSuccessMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-check"></i> Success!</strong> {{offineMessage}}
                    </div>
                    <div class="alert alert-info alert-light alert-dismissible" role="alert" ng-show="offineErrorMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-alert-triangle"></i> Warning!</strong> {{offineMessage}}
                    </div>
                                <!-- Nav tabs -->                        
                                <ul class="nav nav-tabs tab-one" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link"  ng-class="step==1?'active':''" href="javascript:void(0);" ng-click="productId>0 && changeStepnew($event,1)"><span class="hidden-xs-down">Category</span></a>
                                    <li>
                                    <li class="nav-item">
                                        <a class="nav-link" ng-class="step==2?'active':''" href="javascript:void(0);" ng-click="productId>0 && changeStepnew($event,2)"> Key Details</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" ng-class="step==3?'active':''" href="javascript:void(0);" ng-click="productId>0 && changeStepnew($event,3)"><span class="hidden-xs-down"> Images</span></a>
                                    </li>                    
                                    <li class="nav-item">
                                        <a class="nav-link" ng-class="step==4?'active':''" href="javascript:void(0);" ng-click="productId>0 && changeStepnew($event,4)"><span class="hidden-xs-down"> Attributes</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" ng-class="step==5?'active':''" href="javascript:void(0);" ng-click="productId>0 && changeStepnew($event,5)"><span class="hidden-sm-up"><span class="hidden-xs-down"> Shipping & Pricing</span></a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane" ng-class="step==1?'active':''" id="category" role="tabpanel">
                                        <div class="p-20">
                                            <div class="prodect_panel">
                                                <div class="sell-existing-panel">
                                                    
													<div class="porduct-content">
                                                        <form class="form-inline">
                                                            <input class="form-control mr-sm-2" type="search" ng-model="search" placeholder="Search Category Name" aria-label="Search">
                                                            <button class="btn ser-btn my-2 my-sm-0" type="submit">Search</button>
                                                            <a href="#!" class="lern-mor">Learn More</a>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="create-new-panel for-single-listing">
                                                    <div class="porduct-content">
                                                        <form class="m-t-20">
                                                            <button class="openButton" onclick="openForm()"><strong>Request New Brand</strong></button></br></br>
														<h6 class="product-heading">1. Select Brand</h6>
                                                            <div class="form-group">
                                                            <select class="form-control" required="" name="brand_id" id="brand_id" ng-model='product.brand_id' convert-to-number>
                                                            <?php 
                                                            foreach($brand as $brand)
                                                            {
                                                            ?>
                                                            <option value="<?=$brand->brand_id?>" <?=$brand->brand_id == $product->brand_id ? ' selected="selected"' : '';?>><?=$brand->brand_name?></option>
                                                            <?php
                                                            }
                                                            ?>
				                                            </select>
                                                            </div>
															
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="p-20 border-top">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6 class="product-heading">1. Select Category</h6>
                                                    <div class="list-group add-product-list-group">
                                                        <a ng-repeat="c in categories | filter:search" href="javascript:void(0)" ng-click="categorieslist(c.id)" ng-class="product.category_id==c.id?'active':''" class="list-group-item list-group-item-action">{{c.name}}</a>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <h6 class="product-heading">2. Select Sub-Category</h6>
                                                    <div class="list-group add-product-list-group">
                                                       <a ng-repeat="c in subcategories" href="javascript:void(0)" ng-click="typelist(c.id)" ng-class="product.sub_category_id==c.id?'active':''" class="list-group-item list-group-item-action">{{c.name}}</a>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <h6 class="product-heading">3. Select Product Type</h6>
                                                    <div class="list-group radio-list-group">
                                                        
                                                        <div class="list-group-item" ng-repeat="c in type">
                                                            <label>
                                                                <span class="list-group-item-text">{{c.name}}</span> 
                                                                <input type="radio" name="ra" ng-click="selecttype(c.id)" value="{{c.id}}"  ng-checked="c.id==product.type_id">
                                                                <span class="radio"></span>
                                                            </label>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-12 tab-actions-block">
                                                    <button type="button" ng-click="!startLoader && saveProduct($event,2)" class="btn waves-effect waves-light btn-one float-right"><span ng-show="!startLoader">Next</span><span ng-show="startLoader"><i class="fa fa-circle-o-notch fa-spin"></i> Saving..</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" ng-class="step==2?'active':''" id="key_details" role="tabpanel">
                                        <div class="p-20">
                                            <h4 class="tab-label">Enter Product Details </h4>
                                            <form class="mt-4">
                                                <div class="row">
												<div class="col-md-6">
                                                        <label style="visibility: hidden;">Input Type Text</label>
                                                        <div class="for-inline-radio">
                                                            <div class="radio-type-name">
                                                                <p>Do you have variants ?</p>
                                                            </div>
                                                            <div class="for-radio-input">
                                                                <div class="form-check-inline">
                                                                  <label class="form-check-label">
                                                                    <input type="radio" ng-model="product.variant" value="1" class="form-check-input" name="optradio" ng-change="filterOptionListVarient()" ng-checked="product.variant==1">Yes
                                                                    <span class="radio"></span>
                                                                  </label>
                                                                </div>
                                                                <div class="form-check-inline">
                                                                  <label class="form-check-label">
                                                                    <input type="radio" ng-model="product.variant" value="0" class="form-check-input" name="optradio" ng-checked="product.variant==0">No
                                                                    <span class="radio"></span>
                                                                  </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" ng-show="product.variant==0">
                                                        <div class="form-group">
                                                            <label>SKU</label>
                                                            <input type="text" required class="form-control" ng-model="product.supc" placeholder="SKU">
                                                        </div>  
                                                    </div>
													 <div class="col-md-6" ng-show="product.variant==1">
                                                        <div class="form-group">
														 <label>Multiple SKU</label>
                                                      <button type="button" class="btn btn-sm waves-effect waves-light btn-one mt-3 mr-2" ng-click="multipleSKU(product)">Add</button>
                                                             
                                                        </div>
                                                    </div>
													
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Description</label>    
                                                            <textarea class="form-control" ck-editor required ng-model="product.introduction" placeholder="Description" rows="8" cols="50"></textarea>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Short Description</label>    
                                                            <textarea class="form-control" ck-editor required ng-model="product.short_description" placeholder="Short Description" rows="8" cols="50"></textarea>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>GST Percentage</label>
                                                            <input type="text" required  ng-model="product.gst_percentage"  class="form-control" placeholder="GST Percentage">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>HSN Code</label>
                                                            <input type="text" required  ng-model="product.hsn_code"  class="form-control" placeholder="HSN Code">
                                                        </div>
                                                    </div>
                                                    <!--<div class="col-md-6">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label>UPC</label>-->
                                                    <!--        <input type="text"  ng-model="product.upc"  class="form-control" placeholder="UPC">-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Country Origin</label>
                                                            <input type="text" required  ng-model="product.country" class="form-control" placeholder="Country Origin">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" ng-show="product.variant==0">
                                                        <div class="form-group">
                                                            <label>Product Name</label>
                                                            <input type="text" required  ng-model="product.name" class="form-control" placeholder="Title">
                                                        </div>
                                                    </div>
                                                   
                                                    
                                                </div>

                                                <button type="button" class="btn waves-effect waves-light btn-one mt-3 mr-2" ng-click="changeStep($event,3)">Next</button>

                                                <!--button type="button" class="btn waves-effect waves-light btn-two mt-3">Save as Draft</button-->
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" ng-class="step==3?'active':''" id="images" roll="tabpanel">
									
									<div class="p-20" ng-repeat="img in productImageData">
                                            <h4 class="tab-label mb-4">Upload  Images <span> for SKU {{img.supc}}({{img.filter_option.name}})</span></h4>
                                            <div class="row">
                                                <div class="col-md-2" ng-click="uploadProductImage(img.id,1)">
                                                    <div class="add-more-image singlelist-file-uploader">
                                                       
                                                        <div class="add-image-label">Add Image</div>
                                                    </div>
                                                    <div class="error-msg text-center">Please upload the mandatory image(s)</div>
                                                </div>
												<div class="col-md-2" ng-show="img.photo">
                                                    <div class="singlelist-file-uploader">
                                                        <img src="<?=UPLOAD_PRODUCT_IMAGE?>{{img.photo}}" style="max-height:180px!important;margin: 0 0 1em;"/>
                                                        {{img.photo}}
                                                    </div>
                                                    <div class="error-msg text-center">List data image</div>
                                                </div>
												</div>
												<div class="row">
												<div class="col-md-2" ng-click="uploadProductImage(img.id,2)">
                                                    <div class="add-more-image singlelist-file-uploader">
                                                        
                                                        <div class="add-image-label">Add Image</div>
                                                    </div>
                                                    <div class="error-msg text-center">Other Image</div>
                                                </div>
												<div class="col-md-2" ng-repeat="oimg in img.product_images">
                                                    <div class="singlelist-file-uploader">
                                                         <img src="<?=UPLOAD_PRODUCT_IMAGE?>{{oimg.image}}" style="max-width:180px!important;max-height:180px!important;"/>
                                                    </div>
                                                    <div class="error-msg text-center"><a href="javascript:void(0)" ng-click="deleteImage(oimg.id)"><i class="fa fa-trash"></i></a></div>
                                                </div>
                                            </div>
                                        </div>
										
                                        <div class="row">
                                                
								<div class="col-md-6">
								<button type="button" class="btn waves-effect waves-light btn-one mt-3 mr-2" ng-click="openAattribute($event,4)">Next</button>
											</div>
                                            </div>
                                    </div>
                                    <div class="tab-pane" ng-class="step==4?'active':''" id="attributes" roll="tabpanel">
                                        <div class="p-20">
                                            <!--<h4 class="tab-label mb-4">Product Specialization</h4>-->
                                            <div class="table-responsive table-scroll">  
											<!--<button class="btn btn-sm btn-primary"ng-click="openAttribute()"><i class="fa fa-plus"></i> Add</button>-->
												
												<table class="table">

													<tbody>
														<tr>
															<th>Sku Code</th><th>Add</th>
															

														</tr>
														<tr ng-repeat="list in skuListData">
															<th>{{list.supc}}</th><th><button class="btn btn-sm btn-primary"ng-click="openAttribute(list.id)"><i class="fa fa-plus"></i> Add</button></th>
															

														</tr>
														
													</tbody>
												</table>
											</div>

										   </div>
                                    </div>
                                    <div class="tab-pane" ng-class="step==5?'active':''" id="shipping_pricing" roll="tabpanel">
                                        <div class="p-20">  
										<div class="alert alert-success alert-light alert-dismissible" role="alert" ng-show="offineSuccessMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-check"></i> Success!</strong> {{offineMessage}}
                    </div>
                    <div class="alert alert-info alert-light alert-dismissible" role="alert" ng-show="offineErrorMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-alert-triangle"></i> Warning!</strong> {{offineMessage}}
                    </div>
                                            <form class="mt-4">
											<div ng-repeat="list in skuListData">
											<h4 class="tab-label mb-4">Update Shipping & Price <span> for SKU {{list.supc}}({{list.filter_option.name}})</span></h4>
											
                                                <div class="row">
												
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>MRP Price(INR)</label>
                                                            <input type="text" required class="form-control" ng-model="list.user_products[0].actual_price" placeholder="MRP Price">
                                                        </div>  
                                                    </div>
													
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Selling Price(INR)</label>
                                                            <input type="text" required class="form-control" ng-model="list.user_products[0].offer_price" placeholder="Selling Price">
                                                        </div>  
                                                    </div>
                                                    <!-- <div class="col-md-2">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label>MRP Price(Dollar)</label>-->
                                                    <!--        <input type="text" class="form-control" ng-model="list.user_products[0].dollar_actual_price" placeholder="MRP Price in Dollar">-->
                                                    <!--    </div>  -->
                                                    <!--</div>-->
													
                                                    <!--<div class="col-md-2">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label>Selling Price(Dollar)</label>-->
                                                    <!--        <input type="text" class="form-control" ng-model="list.user_products[0].dollar_offer_price" placeholder="Selling Price in Dollar">-->
                                                    <!--    </div>  -->
                                                    <!--</div>-->
                                                    <!-- <div class="col-md-2">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label>MRP Price(Euro)</label>-->
                                                    <!--        <input type="text" class="form-control" ng-model="list.user_products[0].euro_actual_price" placeholder="MRP Price in Euro">-->
                                                    <!--    </div>  -->
                                                    <!--</div>-->
													
                                                    <!--<div class="col-md-2">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label>Selling Price(Euro)</label>-->
                                                    <!--        <input type="text" class="form-control" ng-model="list.user_products[0].euro_offer_price" placeholder="Selling Price in Euro">-->
                                                    <!--    </div>  -->
                                                    <!--</div>-->
                                                    <!--<div class="col-md-2">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label>MRP Price(Pound)</label>-->
                                                    <!--        <input type="text" class="form-control" ng-model="list.user_products[0].pound_actual_price" placeholder="MRP Price in Pound">-->
                                                    <!--    </div>  -->
                                                    <!--</div>-->
													
                                                    <!--<div class="col-md-2">-->
                                                    <!--    <div class="form-group">-->
                                                    <!--        <label>Selling Price(Pound)</label>-->
                                                    <!--        <input type="text" class="form-control" ng-model="list.user_products[0].pound_offer_price" placeholder="Selling Price in Pound">-->
                                                    <!--    </div>  -->
                                                    <!--</div>-->
													<div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input type="text" required  ng-model="list.user_products[0].total_quantity" class="form-control" placeholder="Quantity">
                                                        </div>  
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Delivery Charge</label>
                                                            <input type="text" required  ng-model="list.user_products[0].delivery_charge" class="form-control" placeholder="Delivery Charge">
                                                        </div>  
                                                    </div>
                                                   <!--<div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Delivery Charge</label>
                                                            <select  class="form-control" ng-model="list.user_products[0].delivery_charge" convert-to-number>
															<option value="0">Free</option>
															<option value="50"> 50</option>
															<option value="100"> 100</option>
															<option value="150"> 150</option>
															<option value="200"> 200</option>
															
															</select>
                                                        </div>  
                                                    </div>
													<div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>No Of days</label>
                                                             <select  class="form-control" ng-model="list.user_products[0].day_of_delivary" convert-to-number>
															<option value="1">1</option>
															<option value="2"> 2</option>
															<option value="3"> 3</option>
															
															</select>
                                                            
                                                            
                                                          
                                                        </div>  
                                                    </div>-->
                                                    
                                                     <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Height</label>
                                                            <input type="text"  ng-model="list.user_products[0].height" class="form-control" placeholder="Height">
                                                        </div>  
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Width</label>
                                                            <input type="text"  ng-model="list.user_products[0].width" class="form-control" placeholder="Width">
                                                        </div>  
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Length</label>
                                                            <input type="text"  ng-model="list.user_products[0].length" class="form-control" placeholder="Length">
                                                        </div>  
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Weight</label>
                                                            <input type="text"  ng-model="list.user_products[0].weight" class="form-control" placeholder="Weight">
                                                        </div>  
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Minimum Order Quantity</label>
                                                            <input type="number" required  ng-model="list.user_products[0].minimum_order" required class="form-control" placeholder="Minimum Order Quantity">
                                                        </div>  
                                                    </div>
													
												</div>
												</div>
                                                <button type="button"  ng-click="updatePrice($event)" class="btn waves-effect waves-light btn-one mt-3 mr-2">Save</button>
												<button type="button" ng-if="product.status==1" ng-click="requestForAdmin($event)" class="btn waves-effect waves-light btn-one mt-3 mr-2">Request for Admin Approval</button>

                                                 
                                            </form>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>            
                        </div>
                    </div>
                </div>

            </div>
			<div modal="showSKU" class="modal modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		
        <div class="modal-dialog modal-lg animated zoomIn animated-3x">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Product SKU</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="cancelSKU()"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>


                </div>
                <div class="modal-body">
                   <div class="alert alert-success alert-light alert-dismissible" role="alert" ng-show="offineSuccessMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-check"></i> Success!</strong> {{offineMessage}}
                    </div>
                    <div class="alert alert-info alert-light alert-dismissible" role="alert" ng-show="offineErrorMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-alert-triangle"></i> Warning!</strong> {{offineMessage}}
                    </div>
					 <form id="productImage22" name="productImage22" ng-submit="!startskuadd && addSku($event)">
                        
                        <div class="form-group label-floating">
                            <div class="row" ng-if="addSkuShow">
                                <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" class="form-control" ng-model="newProduct.name" placeholder="Title" required >
                                                        </div>  
                                                    </div>
                                
                                
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>SKU</label>
                                                            <input type="text" class="form-control" ng-model="newProduct.supc" placeholder="SKU Details" required >
                                                        </div>  
                                                    </div>
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Varient</label>
                                                            <select type="text" class="form-control" ng-model="newProduct.filter_id" placeholder="Varient" ng-change="getfilteroption()" required convert-to-number>
															<option ng-repeat="f in productvarientFilter" ng-value="f.id">{{f.name}}</option></select>
                                                        </div>  
                                                    </div>
												
                                                    	<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Varient Name</label>
                                                            <select type="text" class="form-control" ng-model="newProduct.filter_option_id" required convert-to-number>
															<option ng-repeat="f in filteroption" ng-value="f.id" >{{f.name}}</option></select>
                                                        </div>  
                                                    </div>
                                                     <!--<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Size</label>
                                                            <input type="text" class="form-control" ng-model="newProduct.size" placeholder="Size Details"  >
                                                        </div>  
                                                    </div>-->
                                                    	<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Varient1</label>
                                                            <select type="text" class="form-control" ng-model="newProduct.filter_id1" placeholder="Varient" ng-change="getfilteroption1()" required convert-to-number>
															<option ng-repeat="f in productvarientFilter" ng-value="f.id">{{f.name}}</option></select>
                                                        </div>  
                                                    </div>
												
                                                    	<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Varient Name1</label>
                                                            <select type="text" class="form-control" ng-model="newProduct.filter_option_id1" required convert-to-number>
															<option ng-repeat="f in filteroption1" ng-value="f.id" >{{f.name}}</option></select>
                                                        </div>  
                                                    </div>
                                                   <div class="col-md-6">
                                                        <div class="form-group">
                                                            <button class="btn btn-default" type="submit"><span ng-show="!startskuadd">Add</span><span ng-show="startskuadd"><i class=""><i class="fa fa-circle-o-notch fa-spin"></i></span></button>
                                                        </div> 
                                                    </div>
                                                    
                                                </div>
												<div class="row" ng-if="!addSkuShow">
												     <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input type="text" class="form-control" ng-model="updateProduct.name" placeholder="Title" required >
                                                        </div>  
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>SKU</label>
                                                            <input type="text" class="form-control" ng-model="updateProduct.supc" placeholder="SKU Details" required>
                                                        </div>  
                                                    </div>
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Varient</label>
                                                            <select type="text" class="form-control" ng-model="updateProduct.filter_id" required convert-to-number  ng-change="getfilteroption()">
															<option ng-repeat="f in productvarientFilter" value="{{f.id}}">{{f.name}}</option></select>
                                                        </div>  
                                                    </div>
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Varient Name</label>
                                                            <select type="text" class="form-control" ng-model="updateProduct.filter_option_id" required convert-to-number>
															<option ng-repeat="f in filteroption" value="{{f.id}}" >{{f.name}}</option></select>
                                                        </div>  
                                                    </div>
                                                     <!--<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Size</label>
                                                            <input type="text" class="form-control" ng-model="updateProduct.size" placeholder="Size Details">
                                                        </div>  
                                                    </div>-->
                                                    		<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Varient1</label>
                                                            <select type="text" class="form-control" ng-model="updateProduct.filter_id1" required convert-to-number  ng-change="getfilteroption1()">
															<option ng-repeat="f in productvarientFilter" value="{{f.id}}">{{f.name}}</option></select>
                                                        </div>  
                                                    </div>
													<div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Varient Name1</label>
                                                            <select type="text" class="form-control" ng-model="updateProduct.filter_option_id1" required convert-to-number>
															<option ng-repeat="f in filteroption1" value="{{f.id}}" >{{f.name}}</option></select>
                                                        </div>  
                                                    </div>
                                                   <div class="col-md-6">
                                                        <div class="form-group">
                                                            <button class="btn btn-default" type="submit"><span ng-show="!startskuadd">Update</span><span ng-show="startskuadd"><i class=""><i class="fa fa-circle-o-notch fa-spin"></i></span></button>
															 <button class="btn btn-default" type="button" ng-click="cancelAdd()"><span >Cancel</span></button>
                                                        </div> 
                                                    </div>
                                                    
                                                </div>
											

                        </div>
                       
					     
												
												<div class="row">
                                            <table class="table table-one">
                                                <thead>
                                                    <tr class="filters">
                                                        <th>Tittle</th>
                                                        <th>SKU</th>
                                                        <th>Varient</th>
														 <th>Varient Name</th>
														 	<th>Varient1</th>
														 <th>Varient Name1</th>
														
														 <th>#</th>
                                                       
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <tr ng-repeat="list in skuListData">
                                                         <td>{{list.name}}</td>
                                                        <td>{{list.supc}}</td>
														<td>{{list.filter.name}}</td>
															<td>{{list.filter_option.name}}</td>
															<td>{{list.filter_news.name}}</td>
															<td>{{list.filter_option_news.name}}</td>
											
															<td><a href="javascript:void(0)" ng-click="updateSku(list)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a></td>
                                                        
                                                        
                                                    </tr>
                                                </tbody>
                                            </table> 
                                        </div> 

                        </div>
                     
					   </form> 
                    

                 
                    
                </div>

            </div>
        </div>
    

     <div modal="showModal" class="modal modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg animated zoomIn animated-3x">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Product Image</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="cancel()"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>


                </div>
                <div class="modal-body">
                    <div class="alert alert-success alert-light alert-dismissible" role="alert" ng-show="offineSuccessMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-check"></i> Success!</strong> {{offineMessage}}
                    </div>
                    <div class="alert alert-info alert-light alert-dismissible" role="alert" ng-show="offineErrorMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-alert-triangle"></i> Warning!</strong> {{offineMessage}}
                    </div>
					 <form id="productImage" name="productImage" >
                        
                        <div class="form-group label-floating">
                            <div>
		
		<input  class="form-control" type = "file" file-model = "myFile"/>
         <button ng-show="startUpload" type="button" class="btn waves-effect waves-light btn-one mt-3 mr-2"><i class="fa fa-circle-o-notch fa-spin"></i> Uploading...</button>
													<button ng-show="!startUpload" type="button" class="btn waves-effect waves-light btn-one mt-3 mr-2" ng-click="uploadFile()">upload</button>
		</div>
                        </div>
                       </form> 
                   
                </div>

            </div>
        </div>
    </div>
<div modal="ModalCharge" class="modal modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg animated zoomIn animated-3x">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Charges </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="closeCharge()"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>


                </div>
                <div class="modal-body">
                    
					 
                    <div class="table-responsive table-scroll">          
                        <table class="table">

                            <tbody>
                                <tr>
                                    <th>Charge</th><th>Value</th>
                                    

                                </tr>
                                <tr ng-repeat="c in charges">
                                    <th>{{c.name}}</th><th>({{c.value}}%) {{(product.offer_price*c.value)/100}}</th>
                                    

                                </tr>
								
                            </tbody>
                        </table>
                    </div>

                 
                    
                </div>

            </div>
        </div>
    </div>
<div modal="showModalFilter" class="modal modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		
        <div class="modal-dialog modal-lg animated zoomIn animated-3x">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Product Specialization</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="cancelFilter()"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>


                </div>
                <div class="modal-body">
				
                    <div class="alert alert-success alert-light alert-dismissible" role="alert" ng-show="offineSuccessMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-check"></i> Success!</strong> {{offineMessage}}
                    </div>
                    <div class="alert alert-info alert-light alert-dismissible" role="alert" ng-show="offineErrorMessageDisplay">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="zmdi zmdi-close"></i>
                        </button>
                        <strong>
                            <i class="zmdi zmdi-alert-triangle"></i> Warning!</strong> {{offineMessage}}
                    </div>
						<div class="overlay" ng-show="loadingStatus">
						<div class="overlay__inner">
						<div class="overlay__content"><span class="spinner"></span></div>
						</div>
						</div>
					 
                        <form id="productImage1" name="productImage1" >
                        
                        <div class="form-group label-floating">
                            <div class="row">
                                                    <div class="col-md-6" ng-repeat="f in productFilter track by $index" ng-init="filterIndex=$index" style="">
                                                        <div class="form-group">
                                                            <label>{{f.filter.name}}</label>
                                                            <select class="form-control custom-select " ng-model="f.select" ng-change="filterDataSend($event,filterIndex,f.select)" convert-to-number><option value="-1" >None</option><option ng-repeat="fp in f.filter.filter_options track by $index" ng-init="filterOpIndex=$index" value="{{filterOpIndex}}" ng-selected="fp.checked">{{fp.name}}</option></select>
                                                        </div>  
                                                    </div>
													</div></div></form>
                       
                    <div class="alert alert-success alert-light alert-dismissible" role="alert" ng-show="showat">Data Saved!</div>
                <div class="col-md-6">
					<button type="button" class="btn waves-effect waves-light btn-one mt-3 mr-2" ng-click="saveattribute()">Save</button>
				</div>
                 
                    
                </div>

            </div>
        </div>
    </div>
    
    			<!-- modal for brand-->
			
			    <div class="loginPopup">
      <div class="formPopup" id="popupForm">
        <!--<form action="/action_page.php" class="formContainer">-->
                        <?= $this->Form->create(null, [
                                        'url' => [
                                            'controller' => 'Sellerbrands',
                                            'action' => 'add'
                                        ],'type' => 'file','class'=>'formContainer'
                                    ]); ?>
          <h2>Write Your Own Brand</h2>
          <label for="email">
            
          </label>
          <input type="text" id="brand" placeholder="Write Brand Name" name="brand" required>

          <button type="submit" class="btn">Submit</button>
          <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>


			</div>
			        <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
    </script>
  </div>  
	
			<?=$this->Html->css(['/admin_template/app-assets/vendors/css/wizard','/admin_template/css/ngProgress']);?>
		<script>var ajxUrl='<?=$this->Url->build("/vendor/products");?>';
		var ajxPageUrl='<?=$this->Url->build("/seller/products");?>';
				
				var productId=<?=$product->id?>;
				var categories=<?=json_encode($categories);?>;
				var product=<?=json_encode($product);?>;
				var charge=<?=json_encode($charge);?>;
				var is_first=<?=(!empty($product->supc))?'false':'true'?>;
		</script>
		
	  <?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/product_add_seller.js?v=11'],['block'=>'scriptBottom']);?>
