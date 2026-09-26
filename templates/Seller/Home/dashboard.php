     <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title"></h4>
                        <p> <b>Seller HelpLine : 98-7438-7438</b></p>
                        <a href="https://drive.google.com/drive/folders/1nuC7RLF-cOdzfxhPwOZCXx3PD_Mx9u7Z" target="_blank" class="btn btn-outline-danger" style="position:relative; padding-left:30px;border-radius: 5px;font-size: 13px;"> <i class="fab fa-google-drive" style="font-size: 20px;position: absolute;top: 6px;left: 5px;"></i> Febino Drive</a>
                       <a href="https://www.youtube.com/channel/UCqtP1ocHO-jTkw4XmGWnc7A" target="_blank" class="btn btn-outline-danger" style="position:relative; padding-left:30px;border-radius: 5px;font-size: 13px;"> <i class="mdi mdi-youtube-play" style="font-size: 20px;position: absolute;top: 2px;left: 5px;"></i> Youtube Link</a>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10 mob-right">
                                <a href="https://www.febino.com/home/store/<?=$seller_id?>" class="btn btn-success" target="_blank">Open Seller Site</a>
								
								<div class="social-block">
                                <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.febino.com/home/store/<?=$seller_id?>" target="_blank" class="facebook"><i class="mdi mdi-facebook"></i></a>
                                <a href="https://twitter.com/intent/tweet?url=https://www.febino.com/home/store/<?=$seller_id?>&text=" target="_blank" class="twitter"><i class="mdi mdi-twitter"></i></a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url=https://www.febino.com/home/store/<?=$seller_id?>" target="_blank" class="linkedin"><i class="mdi mdi-linkedin"></i></a>
							    </div>
                            </div>
                          
                        </div>

                    </div>
                </div>
    </div>


 <div class="container-fluid">
	 
<div class="card">
	<div class="card-body">
  <h4 class="card-title">Performance Index</h4>
<div class="clr height10"></div>
<div class="table-responsive">
  <table class="table table-bordered table-bg">
    <thead>
      <tr class="text-center">
        <th>Page View</th>
        <th>New Order</th>
        <th>Out of Stock</th>
        <th>Customer</th>
        <th>Active Products</th>
        <th>Product Sold</th>
        <th>Earning</th>
        <th>Return</th>
        <th>RTD failure</th>
        <th>Avg. Rating</th>
       
      </tr>
    </thead>
    <tbody>
      <tr class="text-center">
        <td><?=$total_view_count?></td>
        <td><?=$total_new_order?></td>
        <td><?=$total_outofstock?></td>
        <td><?=$total_users?></td>
        <td><?=$total_products?></td>
        <td><?=$total_products_sale1?></td>
        <td><?=$abc?></td>
        <td><?=$total_return_count?></td>
        <td><?=$total_rtd_count?></td>
        <td><?=$total_review?></td>
      </tr>
     
    </tbody>
  </table>
</div>        
</div>
</div>	
<div class="clr"></div> 
	 
	 
                <!-- ============================================================== -->
                <!-- Earnings -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-sm-12 col-lg-4">
                        <div class="card" style="min-height: 185px; overflow: hidden;">
                            <div class="card-body">
                                <h4 class="card-title">Total Earnings: &nbsp; <i class="fa fa-inr"></i> <?=$abc?></h4>
                                <h5 class="card-subtitle"></h5>
                                <h2 class="font-medium"></h2>
                            </div>
                            <div class="earningsbox m-t-5" style="height:78px; width:100%;"></div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-sm-12 col-lg-8">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <h4 class="card-title">Overview</h4>
                                <h5 class="card-subtitle">Total Products and Customers Overview</h5>
                            </div>
                            <div class="card-body">
                                <div class="row m-t-10">
                                    <!-- col -->
                                    <div class="col-md-6 col-sm-12 col-lg-4">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-orange display-5"><i class="mdi mdi-wallet"></i></span></div>
                                            <div><span class="text-muted">Total Active Products</span>
                                                <h3 class="font-medium m-b-0"><?=$total_products?></h3></div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <!-- col -->
                                    <div class="col-md-6 col-sm-12 col-lg-4">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-primary display-5"><i class="mdi mdi-basket"></i></span></div>
                                            <div><span class="text-muted">Product sold</span>
                                                <h3 class="font-medium m-b-0"><?=$total_products_sale1?></h3></div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                    <!-- col -->
                                    <div class="col-md-6 col-sm-12 col-lg-4">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="display-5"><i class="mdi mdi-account-box"></i></span></div>
                                            <div><span class="text-muted">Total Customers</span>
                                                <h3 class="font-medium m-b-0"><?=$total_users?></h3></div>
                                        </div>
                                    </div>
                                    <!-- col -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Product Sales -->
                <!-- ============================================================== -->
            
                <!-- ============================================================== -->
                <!-- Orders -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <!-- title -->
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">New Orders</h4>
                                        <h5 class="card-subtitle"></h5>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <div class="dl">
                                           
                                        </div>
                                    </div>
                                </div>
                                <!-- title -->
                                <div class="table-responsive scrollable m-t-10" style="height:400px;">
                                    <table class="table v-middle">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Order ID</th>
                                                <th class="border-top-0">Date</th>
                                                <th class="border-top-0">Products</th>
                                                
                                                <th class="border-top-0 text-center">Quantity</th>
                                                <th class="border-top-0 text-right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                        				
                                            foreach($invoice_confirm1 as $confirm)
                                        	{
                                        	    //pr($confirm);
                                            ?>
                                            <tr>
                                                <td><?= $confirm->invoice->order_id ?></td>
                                                <td><?= date("d-m-Y", strtotime($confirm->invoice->creation_date))  ?></td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="m-r-10"><img src="<?php echo $this->Url->image(UPLOAD_PRODUCT_IMAGE.$confirm->product->photo) ?>" style="width:100px;height:100px;"></div>
                                                        <div class="">
                                                           </div>
                                                    </div>
                                                </td>
                                                
                                      
                                                <td class="text-center"><?= $confirm->quantity ?></td>
                                                        
												<td class="text-right"><?= $confirm->item_net_amount ?></td>
                                            </tr>
                                         <?php } ?>
                                        </tbody>
                                    </table>
                                    <nav aria-label="Page navigation mb-3">
                                <div class="paginator">
                                    <ul class="pagination c-pagination">
                                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                        <?= $this->Paginator->numbers() ?>
                                        <?= $this->Paginator->next(__('next') . ' >') ?>
                                    </ul>
                                    <p><?= $this->Paginator->counter() ?></p>
                                </div></nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">
                        <div class="card">
                            <div class="card-body border-bottom">
                                <h4 class="card-title">Order Stats</h4>
                                <h5 class="card-subtitle">Overview of orders</h5>
                                <div class="status m-t-30" style="height:280px; width:100%"></div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa fa-circle text-primary"></i>
                                        <h3 class="m-b-0 font-medium"><?=$order_completed?></h3>
                                        <span>Completed</span>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-circle text-info"></i>
                                        <h3 class="m-b-0 font-medium"><?=$order_confirmed?></h3>
                                        <span>Confirmed</span>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-circle text-orange"></i>
                                        <h3 class="m-b-0 font-medium"><?=$order_cancelled?></h3>
                                        <span>Cancelled</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Review -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-sm-12 col-lg-4">
                                    <div class="card-body">
                                        <h4 class="card-title">Reviews</h4>
                                        <h5 class="card-subtitle">Overview of Review</h5>
                                        <h2 class="font-medium m-t-40 m-b-0"><?=$total_review?></h2>
                                        <span class="text-muted">Total Review of Your Products</span>
                                        <div class="image-box m-t-30 m-b-30">

                                        </div>
                                        <a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"performance"]); ?>" class="btn btn-lg btn-info waves-effect waves-light">Check Your Review Dashboard</a>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-8 border-left">
                                    <div class="card-body">
                                        <ul class="list-style-none">
                                            <li class="m-t-30">
                                                <div class="d-flex align-items-center">
                                                    <i class="mdi mdi-emoticon-happy display-5 text-muted"></i>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Positive Reviews</h5>
                                                        <span class="text-muted"><?=$total_positive_review?> Reviews</span></div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?=$total_positive_review?>%" aria-valuenow="47" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                            <li class="m-t-40">
                                                <div class="d-flex align-items-center">
                                                    <i class="mdi mdi-emoticon-sad display-5 text-muted"></i>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Negative Reviews</h5>
                                                        <span class="text-muted"><?=$total_negative_review?> Reviews</span></div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-orange" role="progressbar" style="width: <?=$total_negative_review?>%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                            <li class="m-t-40 m-b-40">
                                                <div class="d-flex align-items-center">
                                                    <i class="mdi mdi-emoticon-neutral display-5 text-muted"></i>
                                                    <div class="m-l-10">
                                                        <h5 class="m-b-0">Neutral Reviews</h5>
                                                        <span class="text-muted"><?=$total_neutral_review?> Reviews</span></div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?=$total_neutral_review?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
            

                       

           