        <?php use Cake\ORM\TableRegistry; ?>
        <div class="page-wrapper" ng-app="product" ng-controller="productCrt">
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
                <!-- ============================================================== -->
                <!-- Earnings -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body">
                                   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    
                                    <tbody>
									    
                                        <tr class="odd gradeX">
                                            <td>Product Name</td>
                                            <td><?=$invoice1->product->name ?></td>
                                       
											
										</tr>
										
										  <tr class="odd gradeX">
                                            <td>Price</td>
                                            <td><?=$invoice1->product->offer_price ?></td>
                                        </tr>
										 <tr class="odd gradeX">
                                            <td>Quantity</td>
                                            <td><?=$invoice1->quantity ?></td>
                                        </tr>
										 
										 <tr class="odd gradeX">
                                            <td>Total Amount</td>
											
                                            <td><?=$invoice1->item_net_amount ?></td>
											
                                        </tr> 
										 <tr class="odd gradeX">
                                            <td>Discount Amount</td>
											
                                            <td><?=$invoice1->discount_amount ?></td>
											
                                        </tr>
										<tr class="odd gradeX">
                                            <td>Delivery Charge</td>
											
                                            <td><?=$invoice1->delivery_charge*$invoice1->quantity ?></td>
											
                                        </tr> 
										<tr class="odd gradeX">
                                            <td>Grand Total Amount</td>
											
                                            <td><?=$invoice1->item_net_amount+($invoice1->quantity*$invoice1->delivery_charge) ?></td>
											
                                        </tr>
										<tr class="odd gradeX">
                                            <td>Seller Payable</td>
											
                                            <td>
                                                <?php
                                                $chargeObj = TableRegistry::get('ProductCharges');
                                        	$charge=$chargeObj->find()->where(['is_active'=>1,'type_id'=>$invoice1->product->type_id]);
                                        	$total=0;
                                                foreach($charge as $c){
                                                    $cha=($c->charge_type!=1)?(($c->value*$invoice1->product->offer_price/100)):$c->value;
                                                    $total= $total+$cha;
                                                    
                                                }
                                               $seller_payable= $invoice1->product->offer_price-$total; 
                                               ?>
                                               <?= $seller_payable*$invoice1->quantity+$invoice1->delivery_charge*$invoice1->quantity ?>
                                            </td>
											
                                        </tr>
                                        
										
                                        <?php 
                                        
                                            $gst=(($invoice1->quantity*$invoice1->product->offer_price+$invoice1->quantity*$invoice1->delivery_charge)-$invoice1->quantity*(($invoice1->product->offer_price+$invoice1->delivery_charge)*100/($invoice1->product->gst_percentage+100)));
                	    		 
                	    		            $gst_igst=round($gst,2);
                	    		    
                	    		 
                                        ?>
										<tr class="odd gradeX">
                                            <td>GST</td>
											
                                            <td><?=$gst_igst.'('.$invoice1->product->gst_percentage.'%)'?></td>
											
                                        </tr> 
                                        
                                       
                                        <tr class="odd gradeX">
                                            <td>Pament Mode</td>
											
                                            <td>
                                                <?php
                                                if($invoice1->invoice->pay_mode==2)
                                                {
                                                    echo "Cash On Delivery";
                                                    
                                                }
                                                else
                                                {
                                                    echo "Online Paid";
                                                }
                                                
                                                ?>
                                                
                                             
                                            </td>
											
                                        </tr>
										<tr class="odd gradeX">
                                            <td>Order Completed Date</td>
											
                                            <td><?=$invoice1->order_completed_date?></td>
											
                                        </tr> 
										<tr class="odd gradeX">
                                            <td>Return Status</td>
											
                                            <td>
                                                <?php
                                                if($invoice1->return_status==0)
                                                {
                                                    echo "NA";
                                                }
                                                else if($invoice1->return_status==1)
                                                {
                                                    echo "Request for Return";
                                                }
                                                else if($invoice1->return_status==2)
                                                {
                                                    echo "Return Request Approved";
                                                }
                                                else
                                                {
                                                    echo "Product Return Successfully";
                                                }
                                                ?>
                                            </td>
											
                                        </tr> 
										<tr class="odd gradeX">
                                            <td>Return Reason</td>
											
                                            <td><?=$invoice1->return_reson?></td>
											
                                        </tr> 
										<tr class="odd gradeX">
                                            <td>Return Request Date</td>
											
                                            <td><?=$invoice1->return_order_date?></td>
											
                                        </tr>
										<tr class="odd gradeX">
                                            <td>Return Approve Date</td>
											
                                            <td><?=$invoice1->return_approve_date?></td>
											
                                        </tr>
										
										<tr class="odd gradeX">
                                            <td>Return Completed Date</td>
											
                                            <td><?=$invoice1->return_complete_date?></td>
											
                                        </tr>
										 <tr class="odd gradeX">
                                            <td>Payment Status</td>
											
                                            <td>
                                                <?php
                                                if($invoice1->payment_status==0)
                                                {
                                                    echo "Not Paid";
                                                }
                                                else
                                                {
                                                    echo "Paid";
                                                }
                                                
                                                ?>
                                            </td>
											
                                        </tr>
										<tr class="odd gradeX">
                                            <td>Payment Date</td>
											
                                            <td><?=$invoice1->payment_date?></td>
											
                                        </tr>
                                         <tr class="odd gradeX">
                                            <td>Return Charge Type</td>
											
                                            <td>
                                                <?php
                                                if($invoice1->charge_type==1)
                                                {
                                                    echo "RTO";
                                                }
                                                if($invoice1->charge_type==2)
                                                {
                                                    echo "RMO";
                                                }
                                                
                                                ?>
                                            </td>
											
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>Return Charge Amount</td>
											
                                            <td><?=$invoice1->charge_amount?></td>
											
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>Return Charge Details</td>
											
                                            <td><?=$invoice1->charge_details?></td>
											
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>Charge Paid?</td>
											
                                            <td>
                                                <?php
                                                if($invoice1->charge_receive==1)
                                                {
                                                    echo "No";
                                                }
                                                if($invoice1->charge_receive==2)
                                                {
                                                    echo "Yes";
                                                }
                                                
                                                ?>
                                            </td>
											
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>Return Charge Apply Date</td>
											
                                            <td><?=$invoice1->charge_apply_date?></td>
											
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>Return Charge Receive Date</td>
											
                                            <td><?=$invoice1->charge_receive_date?></td>
											
                                        </tr>
										
                                    </tbody>
                                </table>
                                         
                        </div>
                    </div>
                </div>
                    </div>
                </div>
                </div>
           