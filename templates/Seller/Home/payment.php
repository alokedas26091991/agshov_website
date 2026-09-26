        <?php use Cake\ORM\TableRegistry; ?>
        <div class="page-wrapper" ng-app="product" ng-controller="productCrt">
            <!-- ============================================================== -->
              <div class="row">
    <div class="col-sm-2">
      <div class="card bg-primary text-white text-center" style="height:100px;">
        <div class="card-body">Total New Orders: <br><i class="fa fa-inr"></i><?= $abc ?></div>
      </div>
    </div>

        <div class="col-sm-2">
      <div class="card bg-warning text-white text-center" style="height:100px;">
        <div class="card-body">Total Completed: <br><i class="fa fa-inr"></i><?=$abc2?></div>
      </div>
    </div>
        <div class="col-sm-2">
      <div class="card bg-danger text-white text-center" style="height:100px;">
        <div class="card-body">Total Cancelled: <br><i class="fa fa-inr"></i><?=$abc3?></div>
      </div>
    </div>
        <div class="col-sm-2">
      <div class="card bg-secondary text-white text-center" style="height:100px;">
        <div class="card-body">Total Return: <br><i class="fa fa-inr"></i><?=$abc4?></div>
      </div>
    </div>
        <div class="col-sm-2">
      <div class="card bg-success text-white text-center" style="height:100px;">
        <div class="card-body">Received Payment: <br><i class="fa fa-inr"></i><?= $abc5 ?></div>
      </div>
    </div>
        <div class="col-sm-2">
      <div class="card bg-dark text-white text-center" style="height:100px;">
        <div class="card-body">Total Due: <br><i class="fa fa-inr"></i><?=$total_due?></div>
      </div>
    </div>
  </div>

            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
        
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
      
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
                                        <a class="nav-link active" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"payment"]); ?>"><span class="hidden-xs-down">Total Payment List </span></a>
                                    <li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"returnList"]); ?>"><span class="hidden-xs-down">Total Return List</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"paidAmount"]); ?>"><span class="hidden-sm-up"><span class="hidden-xs-down"> Paid Amount List</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"extraCharge"]); ?>"><span class="hidden-sm-up"><span class="hidden-xs-down">Extra Charges List</span></a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border" style="overflow-x:auto;">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="">
                                            <table class="table table-one">
                                                <thead>
              <!--                                      <tr class="filters">-->
              <!--                                          <th><input type="text" class="form-control" placeholder="Order ID" disabled></th>-->
														<!--<th><input type="text" class="form-control" placeholder="Date" disabled></th>-->
                                                     
														<!--<th><input type="text" class="form-control" placeholder="Com. Date" disabled></th>-->
														<!--<th><input type="text" class="form-control" placeholder="SKU" disabled></th>-->
														<!--<th><input type="text" class="form-control" placeholder="Qtn" disabled></th>-->
              <!--                                          <th><input type="text" class="form-control" placeholder="Amt" disabled></th>-->
                                                        
              <!--                                          <th><input type="text" class="form-control" placeholder="Seller Amt" disabled></th>-->
              <!--                                          <th><input type="text" class="form-control" placeholder="GST Amt" disabled></th>-->
              <!--                                         <th><input type="text" class="form-control" placeholder="Action" disabled></th>-->
                                                      
              <!--                                      </tr>-->
                                                    <tr class="filters">
                                                            <th>Order ID</th>
    														<th>Date</th>
                                                            <th>Com. Date</th>
    														<th>SKU</th>
    														<th>QTN</th>
                                                            <th>Amt</th>
                                                            <th>Seller Amt</th>
                                                            <th>GST Amt</th>
    														<th>Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
												        	<?php
                                        				
                                                            foreach($invoice1 as $invoice)
                                                        	{
                                                        	    
                                            $chargeObj = TableRegistry::getTableLocator()->get('ProductCharges');
                                        	$charge=$chargeObj->find()->where(['is_active'=>1,'type_id'=>$invoice->product->type_id]);
                                        	$total=0;
                                                foreach($charge as $c){
                                                    $cha=($c->charge_type!=1)?(($c->value*$invoice->product->offer_price/100)):$c->value;
                                                    $total= $total+$cha;
                                                    
                                                }
                                               $seller_payable= $invoice->product->offer_price-$total;               
                                                            ?>
                                                            
                                                         
                                                    <tr>
                                                      
                                                        <td class="white-space-nowrap"><?= $invoice->invoice->order_id ?></td>
														<td class="white-space-nowrap"><?= date("d-m-Y", strtotime($invoice->invoice->creation_date))  ?></td>
                                                       
                                                        <td class="white-space-nowrap"><?= date("d-m-Y", strtotime($invoice->order_completed_date))  ?></td>
														<td><?= $invoice->product->supc ?></td>
														<td><?= $invoice->quantity ?></td>
                                                        
														<td><?= $invoice->product->offer_price*$invoice->quantity ?></td>
													
												    	<td><?= $seller_payable*$invoice->quantity ?></td>
												    	<td>
												    	    <?php
												    	    $gst=(($invoice->quantity*$invoice->product->offer_price)-$invoice->quantity*(($invoice->product->offer_price)*100/($invoice->product->gst_percentage+100)));
                	    		 
                	    		                            echo $gst_igst=round($gst,2);
                	    		                            ?>
												    	</td>
                                                      
														 <td class="actions">
															<?php if($invoice->payment_status==0 || $invoice->return_status==3){?>
															<?= $this->Html->link('<span class="btn btn-sm btn-default">Details</span><span class="sr-only">' . __('Details') . '</span>', ['action' => 'paymentdetails', $invoice->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Details')]) ?>
															<?php } ?>
														
														
														</td>
														
                                                    </tr>
                                                  
                                                  <?php 
                                                        	}
                                                  ?>
                                                </tbody>
                                            </table> 
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
                            </div>            
                        </div>
                    </div>
                </div>
                 
                </div>
           
<script>


