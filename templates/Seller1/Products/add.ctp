 <div class="main-content" ng-app="product" ng-controller="productCrt" >
          <div class="content-wrapper" id="panel"><!-- Wizard Starts -->

<section id="icon-tabs">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Add Product</h4>
        </div>
        <div class="card-body">
          <div class="card-block">
           
			 <?= $this->Form->create($product,['type' => 'file','id'=>'product_frm', 'class'=>'icons-tab-steps wizard-circle wizard clearfix','#f'=>"ngForm",'id'=>'myForm','name'=>'myForm']); ?>
				<div class="steps clearfix">
					<ul role="tablist">
						<li role="tab" class="first" ng-class="stepclass1">
							<a id="steps-uid-0-t-0" href="#steps-uid-0-h-0" aria-controls="steps-uid-0-p-0">
							
							
							<span class="current-info audible" ng-show="step==1">current step: </span>
							<span class="step">1</span>
							Category</a>
						</li>
						<li role="tab" ng-class="stepclass2" aria-disabled="false" aria-selected="false">
							<a id="steps-uid-0-t-1" href="#steps-uid-0-h-1" aria-controls="steps-uid-0-p-1">
							
							<span class="current-info audible" ng-show="step==2">current step: </span>
							<span class="step">2</span> Attribute</a>
						</li>
						<li role="tab" ng-class="stepclass3" aria-disabled="false" aria-selected="false">
							<a id="steps-uid-0-t-2" href="#steps-uid-0-h-2" aria-controls="steps-uid-0-p-2">
							<span class="current-info audible" ng-show="step==3">current step: </span>
							<span class="step">3</span>
							Image</a>
						</li>
						<li role="tab" class="last" ng-class="stepclass3" aria-disabled="false" aria-selected="false">
							<a id="steps-uid-0-t-2" href="#steps-uid-0-h-2" aria-controls="steps-uid-0-p-2">
							<span class="current-info audible" ng-show="step==4">current step: </span>
							<span class="step">4</span>

							Shipping</a>
						</li>
						
						
					</ul>
				</div> <!-- Step 1 -->
              <h6 ng-show="step==1">Category</h6>
              <fieldset ng-show="step==1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="firstName2"><?= __('Category ') ?></label>
                      <?php 
			
            echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','ng-model'=>'product.category_id','label' => false,'div'=>false]);


			?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="lastName2"><?= __('Sub Category ') ?></label>
                      <?php 
			
            echo $this->Form->input('sub_category_id', ['options' => $sub_category,'ng-model'=>'product.sub_category_id','class'=>'form-control','label' => false,'div'=>false]);


			?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="emailAddress3"><?= __('Type ') ?></label>
                      <?php 
			
						echo $this->Form->input('type_id', ['options' => $type,'class'=>'form-control','ng-model'=>'product.type_id','label' => false,'div'=>false]);


						?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="location2">Brands</label>
                      <?php 
			
						echo $this->Form->input('brand_id', ['options' => $brand,'ng-model'=>'product.brand_id','class'=>'form-control','label' => false,'div'=>false]);


						?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="phoneNumber2"><?= __('Name') ?></label>
                      <?php 
			            echo $this->Form->input('name',['class'=>'form-control','empty' => true,'ng-model'=>'product.name','label' => false,'div'=>false]);
			?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="Introduction"><?= __('Introduction') ?></label>
                      <?php 
			            echo $this->Form->input('introduction',['class'=>'form-control ckeditor','ng-model'=>'product.introduction','empty' => true,'label' => false,'div'=>false]);
			?>
                    </div>
                  </div>
                </div>
              </fieldset>
              <!-- Step 2 -->
              <h6 ng-show="step==2">Attribute</h6>
              <fieldset ng-show="step==2">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="proposalTitle2">Add Spelization</label>
                      <button type="button" class="btn btn-info" ng-click="uploadProductSpesalization()">Spelization</button>
                    </div>
                    
                  </div>
                 
                </div>
              </fieldset>
              <!-- Step 3 -->
              <h6 ng-show="step==3">Image</h6>
              <fieldset ng-show="step==3">
                <div class="row">
                  <div class="col-md-6">
				  
                    <div class="form-group">
                      <label for="eventName2"> Image</label>
						<?php 
			            echo $this->Form->input('photo',['class'=>'form-control','type'=>'file','empty' => true,'label' => false, "file-model" => "myFile",'div'=>false]);
						?>
						
						
                    </div>
                    <div class="form-group">
                      <button type="button" class="btn btn-info" ng-click = "uploadFile(1)">upload me</button>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Other Image</label>
                      
                    </div>
                                        <div class="form-group">
                     
                      <button  type="button" class="btn btn-info" ng-click = "uploadProductImage()">Other</button>
                    </div>
                    
                  </div>
                </div>
              </fieldset>
              <!-- Step 4 -->
              <h6 ng-show="step==4">Shepping</h6>
              <fieldset ng-show="step==4">
                <div class="row">
                  <div class="col-md-6">
                   
                    <div class="form-group">
                      <label for="meetingLocation2">Actual Price</label>
                      <?php 
			            echo $this->Form->input('actual_price',['class'=>'form-control','empty' => true,'ng-model'=>'product.actual_price','label' => false,'div'=>false]);
			?>
                    </div>
                    <div class="form-group">
                      <label for="participants2">Offer Price</label>
                      <?php 
			            echo $this->Form->input('offer_price',['class'=>'form-control','empty' => true,'ng-model'=>'product.offer_price','label' => false,'div'=>false]);
			?>
                    </div>
                  </div>
                  
                </div>
              </fieldset>
			  <div class="actions clearfix" ng-show="step==1"><ul role="menu" aria-label="Pagination"><li aria-hidden="false" aria-disabled="false"><a href="javascript:void(0)" role="menuitem" ng-click="saveProduct($event,2)">Next</a></li></ul></div>
			  
			  <div class="actions clearfix" ng-show="step==2"><ul role="menu" aria-label="Pagination"><li class="" aria-disabled="false"><a href="javascript:void(0)" role="menuitem" ng-click="changeStep(1)">Previous</a></li><li aria-hidden="false" aria-disabled="false"><a href="javascript:void(0)" role="menuitem" ng-click="changeStep(3)">Next</a></li></ul></div>
			  
			  <div class="actions clearfix" ng-show="step==3"><ul role="menu" aria-label="Pagination"><li class="" aria-disabled="false"><a href="javascript:void(0)" role="menuitem" ng-click="changeStep(2)">Previous</a></li><li aria-hidden="false" aria-disabled="false"><a href="javascript:void(0)" role="menuitem" ng-click="changeStep(4)">Next</a></li></ul></div>
			  
			  <div class="actions clearfix" ng-show="step==4"><ul role="menu" aria-label="Pagination"><li class="" aria-disabled="false"><a href="javascript:void(0)" role="menuitem" ng-click="changeStep(3)">Previous</a></li>
			  <li aria-hidden="true"><a href="javascript:void(0)" role="menuitem" ng-click="saveProduct($event,4)">Submit</a></li></ul></div>
			  
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Wizard Ends -->
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
         <button type="button" class="btn btn-info" ng-click = "uploadFile(2)">upload me</button>
		</div>
                        </div>
                       </form> 
                    <div class="table-responsive">          
                        <table class="table">

                            <tbody>
                                <tr ng-repeat="p in productImage">
                                    <th><img class="img img-thumbnail" src="{{p.image}}" style="max-width:200px;"></th>
                                    

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
					 <form id="productImage" name="productImage" >
                        
                        <div class="form-group label-floating">
                            <div>
		
								<ul >
									<li ng-repeat="f in productFilter track by $index" ng-init="filterIndex=$index" style="list-style-type:upper-roman">
									  <label for="option"> {{f.filter.name}}</label>
									  <ul>
										<li style="list-style-type:lower-roman" ng-repeat="fp in f.filter.filter_options track by $index" ng-init="filterOpIndex=$index"> <label><input type="radio" name="filter{{f.filter.id}}" ng-model="fp.checked" ng-value="true" class="subOption" ng-click="filterDataSend(filterIndex,filterOpIndex)"> {{fp.name}}</label><span style="margin-left:50px;cursor:pointer" class="text-danger" ng-click="deletedcheck(filterIndex,filterOpIndex)"><i class="fa  fa-times"></i> Delete</span></li>
										
									  </ul>
									</li>
								</ul>
								</div>
                        </div>
                       </form> 
                    

                 
                    
                </div>

            </div>
        </div>
    </div>

        </div>
		<?=$this->Html->css(['/admin_template/app-assets/vendors/css/wizard','/admin_template/css/ngProgress']);?>
		<script>var ajxUrl='<?=$this->Url->build("/seller/products");?>'
				var productId=0;
		</script>
	  <?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/product_add'],['block'=>'scriptBottom']);?>