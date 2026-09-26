        <?php use Cake\ORM\TableRegistry; 
	    			$Users = TableRegistry::get('Users');
            		$user=$Users->find("all")->where(['id' => $invoice1->vendor_id])->first();
            		
            		$this->set(compact('user'));
            		$Vendors = TableRegistry::get('Vendors');
            		$vendor=$Vendors->find("all")->where(['id' => $user->vendor_id])->first();
           
            		$this->set(compact('vendor'));
            		
            		$States = TableRegistry::get('States');
                    $vendor_state=$States->find("all")->where(['id' => $vendor->state])->first();
        ?>
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
                                                       
                        	    		if($invoice1->invoice->user_delivery_detail->state==$vendor->state)
                        	    		{
                        	    		    $cgst=round($invoice1->product->gst_percentage/2,2);
                        	    		    
                        	    		    
                        	    		    $gst=($invoice1->quantity*$invoice1->product->offer_price)-($invoice1->quantity*($invoice1->product->offer_price*100/($invoice1->product->gst_percentage+100)));
                        	    		    $gst_cgst1=$gst/2;;
                        	    		    $gst_cgst=round($gst_cgst1,2);
                        	    		    
                        	    		   
                        	    		
                        	    		
                                        
                                        ?>
										<tr class="odd gradeX">
                                            <td>SGST</td>
											
                                            <td><?=$gst_cgst.'('.$cgst.'%)'?></td>
											
                                        </tr> 
										<tr class="odd gradeX">
                                            <td>CGST</td>
											
                                            <td><?=$gst_cgst.'('.$cgst.'%)'?></td>
											
                                        </tr>
                                        <?php }
                                        else
                                        {
                                            $gst=($invoice1->quantity*$invoice1->product->offer_price)-($invoice1->quantity*($invoice1->product->offer_price*100/($invoice1->product->gst_percentage+100)));
                	    		 
                	    		            $gst_igst=round($gst,2);
                	    		    
                	    		 
                                        ?>
										<tr class="odd gradeX">
                                            <td>IGST</td>
											
                                            <td><?=$gst_igst.'('.$invoice1->product->gst_percentage.'%)'?></td>
											
                                        </tr> 
                                        
                                        <?php }?>
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
                                            <td>Return Type</td>
											
                                            <td><?php if($invoice1->charge_type==1)
                                            {
                                                echo "RTO";
                                            }
                                            if($invoice1->charge_type==2)
                                            {
                                                echo "RMA";
                                            }
                                            
                                            ?></td>
                                            </tr>
                                            <tr class="odd gradeX">
                                            <td>Return Charge Amount</td>
											
                                            <td><?=$invoice1->charge_amount?></td>
											
                                        </tr>
                                        <tr class="odd gradeX">
                                            <td>Return Details</td>
											
                                            <td><?=$invoice1->charge_details?></td>
											
                                        </tr>
										<tr class="odd gradeX">
                                            <td>Return Charge Paid?</td>
											
                                            <td>
                                                <?php if($invoice1->charge_receive==1)
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
                                            <td>Return Charge Paid Date</td>
											
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
           

<script>var categories=<?=json_encode($categories);?>;
				
		</script>	
		<?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular/ngprogress.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/brand_add_seller'],['block'=>'scriptBottom']);?>