<style>
.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 12px 30px;
  cursor: pointer;
  font-size: 20px;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}
</style>
<div class="main-content">
          <div class="content-wrapper">
	<section id="horizontal-form-layouts">
	
<div class="row">
	    <div class="col-md-12">
	        <div class="card">
	            
	            <div class="card-body">
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
	    </div>
	</div>
</section>
</div>
</div>

