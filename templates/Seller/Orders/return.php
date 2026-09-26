
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!--================================================================-->
                <!-- Search Bar -->

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
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-one" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-xs-down">New Returns </span></a>
                                    <li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-xs-down">Accepted Returns</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><span class="hidden-xs-down"> Disputed Returns</span></a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="">
                                            <table class="table table-one">
                                                <thead>
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control" placeholder="Order ID" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Product Image" disabled></th>
														<th><input type="text" class="form-control" placeholder="Name" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Product Amount" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Order Status" disabled></th>
                                                        
														<th><input type="text" class="form-control" placeholder="Action" disabled></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												        	<?php
                                        				
                                                            foreach($invoice1 as $invoice)
                                                        	{
                                                        	    //pr($invoice);
                                                            ?>
                                                            
                                                           
                                                    <tr>
                                                      
                                                        <td><?= $invoice->invoice->order_id ?></td>
                                                        <td>
                                                            
                			  							<img src="<?php echo $this->Url->image(UPLOAD_PRODUCT_IMAGE.$invoice->product->photo) ?>" style="width:100px;height:100px;">
                			  								
                                                        </td>
                                                        <td><?= $invoice->product->name ?></td>
                                                        
														<td><?= $invoice->item_net_amount ?></td>
													
												    	<td><?= "Processing" ?></td>
                                                      
														 <td class="actions">
															<?php if($invoice->order_status==0){?>
															<?= $this->Html->link('<span class="btn btn-sm btn-default">Order Status</span><span class="sr-only">' . __('Details') . '</span>', ['action' => 'orderstatus', $invoice->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Order Status')]) ?>
															<?php } ?>
														
														
														</td>
                                                    </tr>
                                                  
                                                  <?php } ?>
                                                </tbody>
                                            </table> 
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="profile" role="tabpanel">
                                           <div class="">
                                            <table class="table table-one">
                                                <thead>
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control" placeholder="Order ID" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Product Image" disabled></th>
														<th><input type="text" class="form-control" placeholder="Name" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Product Amount" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Order Status" disabled></th>
                                                        
														<th><input type="text" class="form-control" placeholder="Action" disabled></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												        	<?php
                                        				
                                                            foreach($invoice_completed as $invoice_com)
                                                        	{
                                                        	    //pr($invoice);
                                                            ?>
                                                            
                                                           
                                                    <tr>
                                                      
                                                        <td><?= $invoice_com->invoice->order_id ?></td>
                                                        <td>
                                                            
                			  							<img src="<?php echo $this->Url->image(UPLOAD_PRODUCT_IMAGE.$invoice_com->product->photo) ?>" style="width:100px;height:100px;">
                			  								
                                                        </td>
                                                        <td><?= $invoice_com->product->name ?></td>
                                                        
														<td><?= $invoice_com->item_net_amount ?></td>
													
												    	<td><?= "Completed" ?></td>
                                                      
														 <td class="actions">
															<?php if($invoice_com->order_status==2){?>
															<?= $this->Html->link('<span class="btn btn-sm btn-default">Order Status</span><span class="sr-only">' . __('Details') . '</span>', ['action' => 'orderstatus', $invoice_com->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Order Status')]) ?>
															<?php } ?>
														
														
														</td>
                                                    </tr>
                                                  
                                                  <?php } ?>
                                                </tbody>
                                            </table> 
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="messages" roll="tabpanel">
                                          <div class="">
                                            <table class="table table-one">
                                                <thead>
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control" placeholder="Order ID" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Product Image" disabled></th>
														<th><input type="text" class="form-control" placeholder="Name" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Product Amount" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Order Status" disabled></th>
                                                        
														<th><input type="text" class="form-control" placeholder="Action" disabled></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												        	<?php
                                        				
                                                            foreach($invoice_cancell as $invoice_can)
                                                        	{
                                                        	    //pr($invoice);
                                                            ?>
                                                            
                                                           
                                                    <tr>
                                                      
                                                        <td><?= $invoice_can->invoice->order_id ?></td>
                                                        <td>
                                                            
                			  							<img src="<?php echo $this->Url->image(UPLOAD_PRODUCT_IMAGE.$invoice_can->product->photo) ?>" style="width:100px;height:100px;">
                			  								
                                                        </td>
                                                        <td><?= $invoice_can->product->name ?></td>
                                                        
														<td><?= $invoice_can->item_net_amount ?></td>
													
												    	<td><?= "Completed" ?></td>
                                                      
														 <td class="actions">
															<?php if($invoice_can->order_status==3){?>
														<?= $this->Html->link('<span class="btn btn-sm btn-default">Order Status</span><span class="sr-only">' . __('Details') . '</span>', ['action' => 'orderstatus', $invoice_can->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Order Status')]) ?>
															<?php } ?>
														
														
														</td>
                                                    </tr>
                                                  
                                                  <?php } ?>
                                                </tbody>
                                            </table> 
                                        </div>
                                       
                                    </div>
                                </div>                                    
                            </div>            
                        </div>
                    </div>
                </div>

            </div>
        </div>
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


