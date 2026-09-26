
<style>
.modal-dialog,
.modal-content {
    /* 80% of window height */
    height: 90%;
}

.modal-body {
    /* 100% = dialog height, 120px = header + footer */
    max-height: calc(100%-20px);
    overflow-y: scroll;
}
.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.ng-scope.active {
  background-color: #4CAF50;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

</style>      
	 <div ng-app="product" ng-controller="productCatelog"> 
	  <div class="page-breadcrumb catelog_page-breadcrumb" id="panel">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <ul class="page_breadcrumb_menu">
                            <li ng-class="listType!=2?'active':''"><a href="javascript:void(0);" ng-click="liveProduct=true;callList(1)">Live <span>({{live}})</span></a></li>
                            <li ng-class="listType==2?'active':''"><a href="javascript::void(0)" ng-click="liveProduct=false;callList(2)">Not Live <span>({{notlive}})</span></a></li>
                        </ul>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10">
                                
                            </div>
                            <div class="m-r-10">
							
							
                                <div class=""><?php echo $this->Html->link('<i class="mdi mdi-plus"></i> Add Product',
                            ['controller' => 'Products', 'action' => 'add'],['escape'=>false,'class'=>'btn btn-lg btn-upload waves-effect waves-light']);?></div>
                            </div> 
                            <div class="m-r-10">
                                
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!--================================================================-->
                <!-- Search Bar -->
            <!--================================================================-->
            <!--div class="search-bar">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <div class="custom-control custom-checkbox mr-sm-2 filter-bar-ckeck">
                                    <input type="checkbox" class="custom-control-input" id="checkbox0" value="check">
                                    <label class="custom-control-label" for="checkbox0">All</label>
                                </div>

                                <div class="btn-group" role="group">
                                    <a class="btn src-btn-grpu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-format-vertical-align-center"></i> Top Selling First</a>
                                        <div class="dropdown-menu animated flipInX">
                                            <a class="dropdown-item" href="#!">Action</a>
                                            <a class="dropdown-item" href="#!">Another action</a>
                                            <a class="dropdown-item" href="#!">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#!">Separated link</a>
                                        </div>
                                </div>

                                <div class="btn-group" role="group">
                                    <a class="btn src-btn-grpu">
                                        <i class="mdi mdi-filter"></i>Filter Products                    
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="btn-group search-bar-btn-right" role="group" aria-label="Button group with nested dropdown">
                                <div class="btn-group" role="group">
                                    <a class="btn src-btn-grpu">
                                        <i class="mdi mdi-filter"></i>Advertise Products                   
                                    </a>
                                </div>

                                <div class="btn-group" role="group">
                                    <a class="btn src-btn-grpu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-format-vertical-align-center"></i> Download Catalog</a>
                                        <div class="dropdown-menu animated flipInX">
                                            <a class="dropdown-item" href="#!">Action</a>
                                            <a class="dropdown-item" href="#!">Another action</a>
                                            <a class="dropdown-item" href="#!">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#!">Separated link</a>
                                        </div>
                                </div>

                                <div class="btn-group" role="group">
                                    <a class="btn src-btn-grpu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="mdi mdi-format-vertical-align-center"></i>Update Catalog</a>
                                        <div class="dropdown-menu animated flipInX">
                                            <a class="dropdown-item" href="#!">Action</a>
                                            <a class="dropdown-item" href="#!">Another action</a>
                                            <a class="dropdown-item" href="#!">Something else here</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#!">Separated link</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div--->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" ng-show="liveProduct">
                <!-- ============================================================== -->
                <!-- Earnings -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row"><div class="col-lg-4 col-9"><input type="text" name="search" ng-model="search" class="form-control"/></div>
								<div class="col-lg-4 col-3"><button type="button" class="btn btn-default" ng-click="pageChanged(1)">Search</button></div></div>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-one" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" ng-class="listType==3?'active':''" data-toggle="tab" href="javascript:void(0)" ng-class="listType==4?'active':''"  ng-click="callList(3)" role="tab"><span class="hidden-xs-down">In Stock ({{stock}}) </span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="javascript:void(0)" ng-click="callList(4)" role="tab"><span class="hidden-xs-down">Out of Stock ({{outstock}})</span></a>
                                    </li>
                                    
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border sd-table" style="overflow-x:auto;">
                                    <div class="tab-pane" ng-class="listType==3 || listType==1?'active':''" id="home" role="tabpanel">
                                         <div class="row">
                                              <table class="table table-one">
                                                <thead>

                                                    <tr class="filters">
                                                        <th>SL No</th>
                                                        <th>Image</th>
                                                        <th>Name</th>
    													<th>Quantity</th>
    													<th>MRP</th>
    													<th class="white-space-nowrap">Selling Price</th>
                                                        <th class="white-space-nowrap">Seller Payable</th>
                                                        
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   
                                                     <tr dir-paginate="list in ListData | itemsPerPage: recPerPage" total-items="totalItems">
                                                       
                                                         
                                                         <td>{{$index+1}}</td>
													 
														<td><img src="<?=UPLOAD_PRODUCT_IMAGE?>{{list.product.photo}}" class="img img-responsive"  style="width: 70px;"/></td>
                                                        <td>{{list.product.name}}</td>
													
                                                     <td>{{list.product.total_quantity}}</td>
                                                        
                                                        <td>{{list.actual_price}}</td>
                                                    <td>{{list.offer_price}}</td> 
                                                               <td>{{list.seller_price}}</td> 
															  
                                                        
                                                        <td class="white-space-nowrap"><a href="javascript:void(0);" title="Show price details" ng-click="showCharge(list.product,list.seller_price,list.offer_price)" class="btn btn-sm btn-default"><i class="fa fa-inr"></i></a>
														<a  href="edit/{{list.product.id}}" class="btn btn-sm btn-success" title="Edit"><i class="mdi mdi-border-color" data-name="mdi-border-color"></i></a>
														
														<a href="javascript:void(0)" ng-click="openchargeUpdateModal(list.product_id)" class="btn btn-sm btn-primary" title="Price Edit"><i class="mdi mdi-border-color" data-name="mdi-border-color"></i></a>
														<a  href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"youmaylike/{{list.product_id}}"]); ?>" class="btn btn-sm btn-warning" title="You May Like" ><i class="mdi mdi-exit-to-app" data-name="mdi-border-color"></i></a>
														
														</td>
                                                    </tr>
													<tr><td colspan="7" data-ng-show="!totalItems">No Records Found</td></tr>
                                                </tbody>
                                            </table>
											<div class="col-md-8 col-md-offset-4" >
                        <dir-pagination-controls boundary-links="true" on-page-change="pageChanged(newPageNumber)"></dir-pagination-controls>
                    </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" ng-class="listType==4?'active':''" id="profile" role="tabpanel">
                                        <div class="">
                                            <table class="table table-one">
                                                <thead>
             <!--                                       <tr class="filters">-->
													<!--<th><input type="text" class="form-control" placeholder="Image" disabled></th>-->
													<!--<th><input type="text" class="form-control" placeholder="Name" disabled></th>-->
													
             <!--                                           <th><input type="text" class="form-control" placeholder="Brand" disabled></th>-->
                                                       
             <!--                                           <th><input type="text" class="form-control" placeholder="SKU" disabled></th>-->
                                                        
                                                       
             <!--                                           <th><input type="text" class="form-control" placeholder="MRP" disabled></th>-->
             <!--                                    <th><input type="text" class="form-control" placeholder="Selling Price" disabled></th> -->
             <!--                                    <th><input type="text" class="form-control" placeholder="Seller payble" disabled></th>-->
                                                        
             <!--                                           <th><input type="text" class="form-control" placeholder="Status" disabled></th>-->
             <!--                                       </tr>-->
                                                    <tr class="filters">
                                                        <th>Image</th>
                                                        <th>Name</th>
    													<th>Quantity</th>
    													<th>MRP</th>
    													<th class="white-space-nowrap">Selling Price</th>
                                                        <th class="white-space-nowrap">Seller Payable</th>
                                                        <th class="white-space-nowrap">is Live</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <tr dir-paginate="list in ListData | itemsPerPage: recPerPage" total-items="totalItems">
													 
														<td><img src="<?=UPLOAD_PRODUCT_IMAGE?>{{list.product.photo}}" class="img img-responsive"  style="width: 70px;"/></td>
                                                        <td>{{list.product.name}}</td>
														<td>{{list.product.brand.name}}</td>
                                                         <td>{{list.product.supc}}</td>
                                                        
                                                        <td>{{list.actual_price}}</td>
                                                    <td>{{list.offer_price}}</td>  
                                                               <td>{{list.seller_price}}</td> 
                                                        
                                                        <td>
                                                            <a href="javascript::void(0);" ng-click="showCharge(list.product,list.seller_price,list.offer_price)" class="btn btn-sm btn-default"><i class="fa fa-inr"></i></a>&nbsp;&nbsp;<a ng-show="list.allow_edit" href="edit/{{list.product.id}}" class="btn btn-sm btn-default">Edit</a>
                                                            
														
														&nbsp;&nbsp;<a ng-show="!list.allow_edit" href="javascript::void(0)" ng-click="openchargeUpdateModal(list.product.id,list.seller_price)" class="btn btn-sm btn-default">Edit</a>
														</td>
                                                    </tr>
													<td colspan="7" data-ng-show="!totalItems">No Records Found</td>
                                                </tbody>
                                            </table> 
											<div class="col-md-8 col-md-offset-4" >
                        <dir-pagination-controls boundary-links="true" on-page-change="pageChanged(newPageNumber)"></dir-pagination-controls>
                    </div>
                                        </div>
                                    </div>
                                </div>                                    
                            </div>            
                        </div>
                    </div>
                </div>

            </div>
      
   
     <div class="container-fluid"  ng-show="!liveProduct">
                <!-- ============================================================== -->
                <!-- Earnings -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-one" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-xs-down">Not Live </span></a>
                                    </li>
                                   
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                       <div class="">
                                            <table class="table table-one">
                                                <thead>
                                                    <tr class="filters">
													<th><input type="text" class="form-control" placeholder="Image" disabled></th>
													<th><input type="text" class="form-control" placeholder="Name" disabled></th>
													
                                                        <th><input type="text" class="form-control" placeholder="Brand" disabled></th>
                                                       
                                                        <th><input type="text" class="form-control" placeholder="SKU" disabled></th>
                                                        
                                                      
                                                        <th><input type="text" class="form-control" placeholder="MRP" disabled></th>
                                                 <th><input type="text" class="form-control" placeholder="Selling Price" disabled></th> 
                                                  <th><input type="text" class="form-control" placeholder="Seller payable" disabled></th> 
                                                        
                                                        <th><input type="text" class="form-control" placeholder="Status" disabled></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                     <tr dir-paginate="list in ListData | itemsPerPage: recPerPage" total-items="totalItems">
													 
														<td><img src="<?=UPLOAD_PRODUCT_IMAGE?>{{list.product.photo}}" class="img img-responsive"  style="width: 70px;"/></td>
                                                        <td>{{list.product.name}}</td>
														<td>{{list.product.brand.name}}</td>
                                                         <td>{{list.product.supc}}</td>
                                                        
                                                        <td>{{list.actual_price}}</td>
                                                    <td>{{list.offer_price}}</td>    <td>{{list.seller_price}}</td>  
                                                     
                                                        <td><a href="javascript::void(0);" ng-click="showCharge(list.product,list.seller_price,list.offer_price)" class="btn btn-sm btn-default"><i class="fa fa-inr"></i></a>
                                                        <a ng-show="list.allow_edit" href="edit/{{list.product.id}}" class="btn btn-sm btn-default">Edit</a>
														<a ng-show="!list.allow_edit" href="javascript::void(0);" ng-click="openchargeUpdateModal(list.product.id,list.seller_price)" class="btn btn-sm btn-default">Edit</a>
														<a href="javascript:void(0)" ng-click="openchargeUpdateModal(list.product_id)" class="btn btn-sm btn-primary" title="Price Edit"><i class="mdi mdi-border-color" data-name="mdi-border-color"></i></a>
														<a  href="product_delete/{{list.product.id}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger" title="delete" >Delete</a>
														</td>
                                                    </tr>
													<tr>
                                <td colspan="7" data-ng-show="!totalItems">No Records Found</td>
                            </tr>
                                                </tbody>
                                            </table> 
											<div class="col-md-8 col-md-offset-4" >
                        <dir-pagination-controls boundary-links="true" on-page-change="pageChanged(newPageNumber)"></dir-pagination-controls>
                    </div>
                                        </div>   
										</div>
                                 </div>                                    
                            </div>            
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
								<tr>
                                    <th>MRP</th><th>{{currentProduct.actual_price}}</th>
                                    

                                </tr>
								<tr >
                                    <th>Selling Price</th><th>{{currentProduct.offer_price}}</th>
                                    

                                </tr>
                                <tr ng-repeat="c in ListDataPrice">
                                    <th>{{c.name}}</th><th>{{(c.charge_type!=1)?'('+ c.value +'%' +')':''}} {{(c.charge_type!=1)?((currentProductoffer_price*c.value)/100):c.value}}</th>
                                    

                                </tr>
                                 <tr >
                                    <th>Seller Payable</th><th>{{currentProductseller_price}}</th>
                                    

                                </tr>
								
                            </tbody>
                        </table>
                    </div>

                 
                    
                </div>

            </div>
        </div>
    </div>

      <div modal="ModalUpdateCharge" class="modal modal-primary" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg animated zoomIn animated-3x">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel">Product Details </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="closeChargeM()"><span aria-hidden="true"><i class="fa fa-close"></i></span></button>


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
                    <div class="p-20">                                            
                                            <form class="mt-4">
											<div ng-repeat="list in skuListData">
											<h4 class="tab-label mb-4">Update Shipping & Price <span> for SKU {{list.supc}}({{list.filter_option.name}})</span></h4>
											
                                                <div class="row">
												
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>MRP Price</label>
                                                            <input type="text" class="form-control" ng-model="list.user_products[0].actual_price" placeholder="Input Type Text">
                                                        </div>  
                                                    </div>
													
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Selling Price</label>
                                                            <input type="text" class="form-control" ng-model="list.user_products[0].offer_price" placeholder="Input Type Text">
                                                        </div>  
                                                    </div>
													<div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Quantity</label>
                                                            <input type="text"  ng-model="list.user_products[0].total_quantity" class="form-control" placeholder="">
                                                        </div>  
                                                    </div>
                                                    	<div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Delivery ch.</label>
                                                            <input type="text"  ng-model="list.user_products[0].delivery_charge" class="form-control" placeholder="">
                                                        </div>  
                                                    </div>
                                                    	<div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Minimum ord.</label>
                                                            <input type="text"  ng-model="list.user_products[0].minimum_order" class="form-control" placeholder="">
                                                        </div>  
                                                    </div>
                                                   <!--<div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Delivery Ch.</label>
                                                            <select  class="form-control" ng-model="list.user_products[0].delivery_charge" convert-to-number>
															<option value="0" ng-selected="list.user_products[0].delivery_charge==0">Free</option>
															<option value="50" ng-selected="list.user_products[0].delivery_charge==50"> 50</option>
															<option value="100" ng-selected="list.user_products[0].delivery_charge==100"> 100</option>
															<option value="150" ng-selected="list.user_products[0].delivery_charge==150"> 150</option>
															<option value="200" ng-selected="list.user_products[0].delivery_charge==200"> 200</option>
															
															</select>
                                                        </div>  
                                                    </div>
													<div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>No Of days</label>
                                                             <select  class="form-control" ng-model="list.user_products[0].day_of_delivary">
															<option value="1">1</option>
															<option value="2"> 2</option>
															<option value="3"> 3</option>
															
															</select>
                                                            
                                                            
                                                           
                                                        </div>  
                                                    </div>-->
													<div class="col-md-2">
                                                        <div class="form-group">
                                                            <label>Is Live</label>
                                                             <select  class="form-control" ng-model="list.user_products[0].is_live" convert-to-number>
															<option value="1" ng-selected="list.user_products[0].is_live">Yes</option>
															<option value="0" ng-selected="!list.user_products[0].is_live"> No</option>
															
															
															</select>
                                                            
                                                       
                                                        </div>  
                                                    </div>
                                                  
													
												</div>
												</div>
                                                <button type="button"  ng-click="updatePrice($event)" class="btn waves-effect waves-light btn-one mt-3 mr-2">Save</button>

                                                
                                            </form>
                                        </div>
                                  
                </div>

            </div>
        </div>
    </div>

    
	  
	  </div>
    <?=$this->Html->css(['/admin_template/app-assets/vendors/css/wizard','/admin_template/css/ngProgress']);?>
		<script>var ajxUrl='<?=$this->Url->build("/vendor/products");?>';
		var ajxSellerUrl='<?=$this->Url->build("/seller/products");?>';
				var productId=0;
		</script>
	  <?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','dirPagination','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/product_catelog.js?v=3'],['block'=>'scriptBottom']);?>