        <?php use Cake\ORM\TableRegistry; ?>
        <div class="page-wrapper" ng-app="product" ng-controller="productCrt">
            <!-- ============================================================== -->
              <div class="row">
    <div class="col-sm-2">
      <div class="card bg-primary text-white" style="height:100px;">
        <div class="card-body">Total New Orders:<i class="fa fa-inr"></i><?= $abc ?></div>
      </div>
    </div>

        <div class="col-sm-2">
      <div class="card bg-warning text-white" style="height:100px;">
        <div class="card-body">Total Completed:<i class="fa fa-inr"></i><?=$abc2?></div>
      </div>
    </div>
        <div class="col-sm-2">
      <div class="card bg-danger text-white" style="height:100px;">
        <div class="card-body">Total Cancelled:<i class="fa fa-inr"></i><?=$abc3?></div>
      </div>
    </div>
        <div class="col-sm-2">
      <div class="card bg-secondary text-white" style="height:100px;">
        <div class="card-body">Total Return:<i class="fa fa-inr"></i><?=$abc4?></div>
      </div>
    </div>
        <div class="col-sm-2">
      <div class="card bg-success text-white" style="height:100px;">
        <div class="card-body">Received Payment:<i class="fa fa-inr"></i><?= $abc5 ?></div>
      </div>
    </div>
        <div class="col-sm-2">
      <div class="card bg-dark text-white" style="height:100px;">
        <div class="card-body">Total Due:<i class="fa fa-inr"></i><?=$total_due?></div>
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
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"payment"]); ?>"><span class="hidden-xs-down">Total Payment List </span></a>
                                    <li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"returnList"]); ?>"><span class="hidden-xs-down">Total Return List</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"paidAmount"]); ?>"><span class="hidden-sm-up"><span class="hidden-xs-down"> Paid Amount List</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"extraCharge"]); ?>"><span class="hidden-sm-up"><span class="hidden-xs-down">Extra Charges List</span></a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                   
                                    
                                    <div class="tab-pane active" id="messages" roll="tabpanel">
                                         
                                            <table class="table table-one">
                                                <thead>
                                                    <tr class="filters">
                                                        <th><input type="text" class="form-control" placeholder="Order ID" disabled></th>
														<th><input type="text" class="form-control" placeholder="Date" disabled></th>
                                                      
													
														<th><input type="text" class="form-control" placeholder="SKU" disabled></th>
														<th><input type="text" class="form-control" placeholder="Qtn" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Amnt" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="GST Amnt" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Seller Amnt" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="P. Date" disabled></th>
                                                        <th><input type="text" class="form-control" placeholder="Action" disabled></th>
                                                        
														
                                                    </tr>
                                                </thead>
                                                <tbody>
												        	<?php
                                        				
                                                            foreach($invoice1 as $invoice_can)
                                                        	{
                                                        	    
                                                        	    $chargeObj = TableRegistry::getTableLocator()->get('ProductCharges');
                                        	$charge=$chargeObj->find()->where(['is_active'=>1,'type_id'=>$invoice_can->product->type_id]);
                                        	$total=0;
                                                foreach($charge as $c){
                                                    $cha=($c->charge_type!=1)?(($c->value*$invoice_can->product->offer_price/100)):$c->value;
                                                    $total= $total+$cha;
                                                    
                                                }
                                               $seller_payable2= $invoice_can->product->offer_price-$total; 
                                                            ?>
                                                            
                                                           
                                                    <tr>
                                                      
                                                        <td><?= $invoice_can->invoice->order_id ?></td>
														<td><?= date("d-m-Y", strtotime($invoice->invoice->creation_date))  ?></td>
                                                       
                                            
														<td><?= $invoice_can->product->supc ?></td>
														<td><?= $invoice_can->quantity ?></td>
                                                        
														<td><?= $invoice_can->item_net_amount*$invoice_can->quantity ?></td>
													
												    	<td><?= $seller_payable2*$invoice_can->quantity-($invoice_can->quantity*$invoice_can->delivery_charge) ?></td>
												    	<td>
												    	    <?php
												    	    $gst2=(($invoice_can->quantity*$invoice_can->product->offer_price+$invoice_can->quantity*$invoice_can->delivery_charge)-$invoice_can->quantity*(($invoice_can->product->offer_price+$invoice_can->delivery_charge)*100/($invoice_can->product->gst_percentage+100)));
                	    		 
                	    		                            echo $gst_igst2=round($gst2,2);
                	    		                            ?>
												    	</td>
                                                      
													<td><?= date("d-m-Y", strtotime($invoice_can->payment_date))  ?></td>
													<td class="actions">
															<?php if($invoice_can->payment_status==1){?>
															<?= $this->Html->link('<span class="btn btn-sm btn-default">Details</span><span class="sr-only">' . __('Details') . '</span>', ['action' => 'paymentdetails', $invoice_can->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Return Details')]) ?>
															<?php } ?>
														
														
														</td>
														
                                                    </tr>
                                                  
                                                  <?php 
                                                        	    
                                                  } ?>
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
           
<script>
