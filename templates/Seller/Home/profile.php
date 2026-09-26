
    <div id="main-wrapper">

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
                <div style="text-align: right"><button class="btn btn-lg btn-info waves-effect waves-light"  data-toggle="modal" data-target="#myModal">Upload Signature</button></div>
               <?= $this->Form->create($vendor1,['class'=>'form form-horizontal','type' => 'file',
       'enctype'=>'multipart/form-data']); ?>
                    <!-- ============================================================== -->
                    <!-- Basic Details -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">Basics Details</h4>
                                    
                               
                                </div>
                                <div class="card-body">
                                     
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Company Legal Name</label>
                                                    <div class="col-sm-9">
                                                     <?php 
			                                         echo $this->Form->input('company_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													  ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 control-label col-form-label">Company Name to display</label>
                                                    <div class="col-sm-9">
                                                        <?php 
			                                         echo $this->Form->input('company_display_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													  ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 control-label col-form-label">Contact Person Name</label>
                                                    <div class="col-sm-9">
                                                        <?php 
			                                         echo $this->Form->input('contact_person_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													  ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 control-label col-form-label">Contact Phone No</label>
                                                    <div class="col-sm-9">
                                                        <?php 
			                                         echo $this->Form->input('phone_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'number']);
													  ?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email1" class="col-sm-3 control-label col-form-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <?php 
			                                         echo $this->Form->input('email',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'email','readonly'=>true]);
													  ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Address Details -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">General Form</h4>
                       
                                </div>
                                <div class="card-body">                                
                                   
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Registration Address</label>
                                                   <?php 
			                                         echo $this->Form->input('shipping_address',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'textarea']);
													?>
                                                </div>  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pickup Address</label>
                                                     <?php 
			                                         echo $this->Form->input('shipping_landmark',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'textarea']);
													?>
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Pincode</label>
                                                     <?php 
			                                         echo $this->Form->input('pincode',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'number']);
													?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                     <?php 
			                                         echo $this->Form->input('city',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                     <?php 
			                                         echo $this->Form->input('state',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													?>
                                                </div>
                                            </div>
                                           
                                        </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Orders -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">Business Details</h4>
                                 
                                </div>
                                <div class="card-body">                                
                                    
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>GSTIN</label>
                                                     <?php 
			                                         echo $this->Form->input('gst_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													?>
                                                </div>  
                                            </div>
											<div class="col-md-3">
                                                <div class="form-group">
                                                    <label>GST Documents(Scan Copy)</label>
                                                     	<?= $this->Form->input('gst_doc', [
														'placeholder'=>"GST Doc Proof","class" =>"form-control","type" =>"file",'label'=>false,'id'=>'gst_doc'
														]);?>
                                                </div>  
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Company PAN#</label>
                                                    <?php 
			                                         echo $this->Form->input('pan_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													?>
                                                </div> 
                                            </div>
											<div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Pan Card(Scan Copy)</label>
                                                     	<?= $this->Form->input('pan_card_scan_copy', [
														'placeholder'=>"Pan Card(Scan Copy)","class" =>"form-control","type" =>"file",'label'=>false,'id'=>'pan_card_scan_copy'
														]);?>
                                                </div>  
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>VAT/TIN</label>
                                                    <?php 
			                                         echo $this->Form->input('vat',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>MoU</label>
                                                   <?php 
			                                         echo $this->Form->input('mou',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>TAN</label>
                                                        <?php 
			                                         echo $this->Form->input('tan',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													?>
                                                    </select>
                                                </div>
                                            </div>
                                            	<div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Aadhar Card(Scan Copy)</label>
                                                     	<?= $this->Form->input('address_proof', [
														'placeholder'=>"Address Proof","class" =>"form-control","type" =>"file",'label'=>false,'id'=>'address_proof'
														]);?>
                                                </div>  
                                            </div>
                                        </div>
                                       
                              
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Bank Details -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">Bank Details</h4>
                               
                                </div>
                                <div class="card-body">
                       
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group row">
                                                    <label for="fname" class="col-sm-3 control-label col-form-label">Beneficiary Name</label>
                                                    <div class="col-sm-9">
                                                        <?php 
			                                         echo $this->Form->input('benificiary_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 control-label col-form-label">Current Account Number</label>
                                                    <div class="col-sm-9">
                                                           <?php 
			                                         echo $this->Form->input('current_account_no',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'number']);
													?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 control-label col-form-label">IFSC Code</label>
                                                    <div class="col-sm-9">
                                                           <?php 
			                                         echo $this->Form->input('ifsc_code',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 control-label col-form-label">Bank Name</label>
                                                    <div class="col-sm-9">
                                                           <?php 
			                                         echo $this->Form->input('bank_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													?>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="lname" class="col-sm-3 control-label col-form-label">Branch Name</label>
                                                    <div class="col-sm-9">
                                                          <?php 
			                                         echo $this->Form->input('branch_name',['class'=>'form-control','empty' => true,'label' => false,'div'=>false,'type'=>'text']);
													?>
                                                    </div>
                                                </div>
												<div class="form-group row">
                                                    <label for="lname" class="col-sm-3 control-label col-form-label">Cancel Cheque(Scan Copy)</label>
                                                    <div class="col-sm-9">
                                                     <?= $this->Form->input('cancel_cheque_scan_copy', [
														'placeholder'=>"Cancel Cheque(Scan Copy)","class" =>"form-control","type" =>"file",'label'=>false,'id'=>'cancel_cheque_scan_copy'
														]);?>
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
					<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Update</button>
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
    <!-- ============================================================== -->
    <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Upload Your Signature in Seller panel</h4>
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="Login">
                                    
                                    <?= $this->Form->create($vendor1, [
						'type' => 'file','url' => ['controller' => 'Home', 'action' => 'uploadsignature'],'id'=>'registerForm'
					]); ?>
                                    
                                    <!--<div class="row">-->
                                    <!--    <div class="col-md-12">-->
                                            <!--<p>What is it and Why is it required?-->
                                            <!-- You are required to submit a valid digital signature on the seller panel for uninterrupted business under GST regime. The signature should be of the authorized person of your company.Your signature will be captured on all customer tax invoices, as mandated by the GST law.-->
                                            <!-- Are there any specific guidelines to follow while uploading signature?</p>-->
                                            <!--<p>Upload scanned copy of your signature preferably with a white paper background. Ensure image uploaded is legible to be printed on invoices.-->
                                            <!--To learn how to upload your signature on the panel, click here</p>-->
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                        <!--</div>-->
                                        <!--<div class="col-md-12">-->
                                            <div class="text-center sign-with">
                                                <div class="col-md-12">
                    							<iframe width="100%" height="200" src="//www.youtube.com/embed/ac7KhViaVqc" allowfullscreen=""></iframe>
                                                </div>
                                            </div>
                                    <!--    </div>-->
                                    <!--</div>-->
    								
    								<div class="form-group" style="border: 1px solid #C2C2C2;padding: 10px 0;">
									<img src="<?php echo $this->Url->image("upload/vendor/$vendor1->upload_signature", ['pathPrefix' => '']) ?>" alt="Signature" style="height:50px;width:200px;"></br>
                                        <label for="email" class="col-sm-10 control-label">
                                            Upload New Signature</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="upload_signature"/>
                                        </div>
                                    </div>
									 <div class="form-actions">
										<div class="submit-btn-area">
											<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Upload</button>
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
    <!-- ============================================
    Modal
    =========================================-->


    <!-- ============================================================== -->
    <!-- All Jquery -->

