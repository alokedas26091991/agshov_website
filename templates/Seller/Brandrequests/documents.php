
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
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    
                                    <tbody>
									    <tr class="odd gradeX">
                                            <td>Brand Name</td>
                                            <td><?=$brands->name?></td>
											
										</tr>
										<tr class="odd gradeX">
                                            <td>Request Date</td>
                                            <td><?=$brands->request_date?></td>
											
										</tr>
										<tr class="odd gradeX">
                                            <td>Approve date</td>
                                            <td><?=$brands->approval_date?></td>
											
										</tr>
                                        <tr class="odd gradeX">
                                            <td>Brand Logo</td>
                                            <td><img src="<?php echo $this->Url->image("upload/brandlogo/$brands->brand_logo", ['pathPrefix' => '']) ?>" alt="product" height="200" width="200"></td>
											<td><a href="<?php echo $this->Url->image("upload/brandlogo/$brands->brand_logo", ['pathPrefix' => '']) ?>" download><button class="btn"><i class="fa fa-download"></i> Download</button></a></td>
											
										</tr>
										<tr class="odd gradeX">
                                            <td>Brand Description</td>
                                            <td><?=$brands->brand_description?></td>
											
										</tr>
										
										  <tr class="odd gradeX">
                                            <td>Uploded Documents</td>
                                            <td><img src="<?php echo $this->Url->image("upload/uploaddoc/$brands->upload_doc", ['pathPrefix' => '']) ?>" alt="product" height="200" width="200"></td>
											<td><a href="<?php echo $this->Url->image("upload/uploaddoc/$brands->upload_doc", ['pathPrefix' => '']) ?>" download><button class="btn"><i class="fa fa-download"></i> Download</button></a></td>
                                        </tr>
										 <tr class="odd gradeX">
                                            <td>Document Type</td>
                                            <td><?=$brands->document_type?></td>
											
										</tr>
									
										
										
                                    </tbody>
                                </table>
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->



