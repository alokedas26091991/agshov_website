
    <div id="main-wrapper">

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Add Brand</h4>                        
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10">
                                
                            </div>
                            <div class="profile-status-block">
                                <p>Profile Status: <span>Active</span></p>
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
               <?= $this->Form->create($sellerbrand,['type' => 'file','class'=>'form form-horizontal']); ?>
                    <!-- ============================================================== -->
                    <!-- Basic Details -->
                    <!-- ============================================================== -->
                    <div class="row">
					<div class="col-lg-2">
					</div>
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">Enter Details</h4>
                               
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-8">
                                             <div class="form-group row">		
											 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
														<?= __('Category Id') ?></label>
														<div class="col-sm-9">
														<?php 
														
														echo $this->Form->input('category_id', ['options' => $categories,'class'=>'form-control','label' => false,'div'=>false]);


														?>
														
												</div>
												</div>
                                               <div class="form-group row">		
											 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
														<?= __('Sub Category Id') ?></label>
														<div class="col-sm-9">
														<?php 
																	echo $this->Form->input('sub_category_id',['options' => $SubCategories,'class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
														?>
												</div>
												</div>
														<div class="form-group row">		
											 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
														<?= __('Type Id') ?></label>
														<div class="col-sm-9">
														<?php 
																	echo $this->Form->input('type_id',['options' => $Types,'class'=>'form-control','empty' => true,'label' => false,'div'=>false]);
														?>
												</div>
												</div>
															<div class="form-group row" >		
											 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
														<?= __('Brand Id') ?></label>
														<div class="col-sm-9" id="brandid">
														<?php 
																	echo $this->Form->input('brand_id',['options' => $Brands,'class'=>'form-control','empty' => true,'label' => false,'div'=>false, 'onchange'=>'myFunction1()', 'id'=>'Brands']);
														?>
												</div>
												</div>

														<div class="form-group row">		
											 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
														<?= __('Is New Brand') ?></label>
														<div class="col-sm-9">
													
														<?php 
														 echo $this->Form->input('is_new_brand',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false, 'id'=>'is_new_brand', 'onclick'=>'myFunction()']);
														?>										
																										
												</div>
												</div>
												
												<div id="biswa" style="display:none">
												<div class="form-group row">		
											 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
														<?= __('Name') ?></label>
														<div class="col-sm-9">
														<?php 
																	echo $this->Form->input('name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'id'=>'name']);
														?>
												</div>
												</div>
															<div class="form-group row">		
											 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
														<?= __('Brand Logo') ?></label>
														<div class="col-sm-9">
														<?php 
																	echo $this->Form->input('brand_logo',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
														?>
												</div>
												</div>
															<div class="form-group row">		
											 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
														<?= __('Brand Description') ?></label>
														<div class="col-sm-9">
														<?php 
																	echo $this->Form->input('brand_description',['class'=>'form-control ckeditor','empty' => true,'label' => false,'div'=>false]);
														?>
												</div>
												</div>
																<div class="form-group row">		
											 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
														<?= __('Upload Document') ?></label>
														<div class="col-sm-9">
														<?php 
																	echo $this->Form->input('upload_doc',['class'=>'form-control','type'=>'file','empty' => true,'label' => false,'div'=>false]);
														?>
												</div>
												</div>
															<div class="form-group row">		
											 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
														<?= __('Document Type') ?></label>
														<div class="col-sm-9">
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
												
												</div>
												
														<div class="form-group row">		
											 <label for="focusedinput" class="col-md-3 label-control" for="projectinput1">
														<?= __('Is Active') ?></label>
														<div class="col-sm-9">
													
														<?php 
														 echo $this->Form->input('is_active',['class'=>'onoffswitch-checkbox','empty' => true,'label' => false,'div'=>false]);
														?>										
																										
												</div>
												</div>				
                                            </div>
                                        </div>
                                  
                                </div>
				
                            </div>
							<div class="form-actions">
							<div class="submit-btn-area">
								<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Add Brand</button>
							</div>
						</div>
                        </div>
                    </div>
                    <!-- ============================================================== -->


               

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
function myFunction1() {
	document.getElementById("name").value=document.getElementById("Brands").value;
}
</script>

