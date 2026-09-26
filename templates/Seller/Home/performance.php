

  
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
               <?= $this->Form->create($pro,['class'=>'form form-horizontal']); ?>
                    <!-- ============================================================== -->
                    <!-- Basic Details -->
                    <!-- ============================================================== -->
                    <div class="row">
				
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body border-bottom">
                                    <h4 class="card-title">Rating & Reviews</h4>
                               
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                      <th>SL NO</th>
                                      <th>Customer</th>
									  <th>Product Name</th>
									  <th>Rating</th>
									  <th>Comment</th>
									 <th>Status</th>
									 
                                </tr>
                            </thead>
        <?php 
		$c=1;
		
		foreach ($pro as $pro1):
		if($pro1->is_active==1)
		{
			$a="Active";
		}
		else
		{
			$a="Inctive";
		}
		?>
            <tr>
                <td><?= $c ?></td>
                <td><?= $pro1->user->first_name ?></td>
                <td><?= $pro1->product->name ?></td>
				<td><?= $pro1->rating ?></td>
               <td><?= $pro1->comment ?></td>
			   <td><?= $a ?></td>
                  
            </tr>

        <?php $c++;
		endforeach; ?>
                        </table>
                        </div>
                                       
                                  		 
                                </div>
                                	 <nav aria-label="Page navigation mb-3">
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div></nav>
                            </div>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Upload Your Signature in Seller panel</h4>
    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="Login">
                                    <?= $this->Form->create($vendor1,['class'=>'form form-horizontal','type' => 'file']); ?>
                                    
                                    
                                    <div class="row">
                                        <div class="col-sm-10">
                                            <p>What is it and Why is it required?
                                             You are required to submit a valid digital signature on the seller panel for uninterrupted business under GST regime. The signature should be of the authorized person of your company.Your signature will be captured on all customer tax invoices, as mandated by the GST law.
                                             Are there any specific guidelines to follow while uploading signature?</p>
                                            <p>Upload scanned copy of your signature preferably with a white paper background. Ensure image uploaded is legible to be printed on invoices.
                                            To learn how to upload your signature on the panel, click here</p>
                                        </div>
                                    </div>
    								
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
                        <div class="col-md-4">
                            <div class="row text-center sign-with">
                                <div class="col-md-12">
    							<iframe width="100%" height="200" src="//www.youtube.com/embed/ac7KhViaVqc" allowfullscreen=""></iframe>
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

