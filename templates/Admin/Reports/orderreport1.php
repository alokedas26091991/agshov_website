<?php use Cake\ORM\TableRegistry; ?>
<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Order Report'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div align="right"><button onclick="exportTableToExcel('sampleTable')">Export Table Data To Excel File</button></div>
    <div class="tables" style="overflow: scroll;">
        <table class="table table-bordered" id="sampleTable">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Seller Name') ?></th>
                <th><?= $this->Paginator->sort('Order Date') ?></th>
                <th><?= $this->Paginator->sort('Order Completed Date') ?></th>
                <th><?= $this->Paginator->sort('Invoice No') ?></th>
                <th><?= $this->Paginator->sort('Order ID') ?></th>
                <th><?= $this->Paginator->sort('Shipment ID') ?></th>
                <th><?= $this->Paginator->sort('Carrier Name') ?></th>
                <th><?= $this->Paginator->sort('Manifest ID') ?></th>
                <th><?= $this->Paginator->sort('AWB NO') ?></th>
                <th><?= $this->Paginator->sort('Order Status') ?></th>
                <th><?= $this->Paginator->sort('Return Status') ?></th>
              
                <th><?= $this->Paginator->sort('Customer Name') ?></th>
                <th><?= $this->Paginator->sort('Delivery Address') ?></th>
                <th><?= $this->Paginator->sort('State') ?></th>
                <th><?= $this->Paginator->sort('City') ?></th>
                <th><?= $this->Paginator->sort('Pin') ?></th>
                <th><?= $this->Paginator->sort('Product Name') ?></th>
                <th><?= $this->Paginator->sort('HSN Code') ?></th>
                <th><?= $this->Paginator->sort('SKU') ?></th>
                <th><?= $this->Paginator->sort('Quantity') ?></th>
                <th><?= $this->Paginator->sort('Single Product Price') ?></th>
                <th><?= $this->Paginator->sort('Delivery Charge') ?></th>
                <th><?= $this->Paginator->sort('Price Tag') ?></th>
                <th><?= $this->Paginator->sort('Product amount by Customer') ?></th>
                <th><?= $this->Paginator->sort('GST') ?></th>
                <th><?= $this->Paginator->sort('Total Gross Amount') ?></th>
                <th><?= $this->Paginator->sort('Total Seller Payable') ?></th>
                <th><?= $this->Paginator->sort('Charge Type') ?></th>
                <th><?= $this->Paginator->sort('Charge Amount') ?></th>
                <th><?= $this->Paginator->sort('Charge Details') ?></th>
                <th><?= $this->Paginator->sort('Charge Receive?') ?></th>
                <th><?= $this->Paginator->sort('Charge Apply Date') ?></th>
                <th><?= $this->Paginator->sort('Charge Received Date') ?></th>
             
                
                
                
            </tr>
        </thead>
        <tbody>
        <?php foreach ($order_list as $order): 
            
                    $Users = TableRegistry::get('Users');
            		$user=$Users->find("all")->where(['id' => $order->vendor_id])->first();
            		
            		$this->set(compact('user'));
            		$Vendors = TableRegistry::get('Vendors');
            		$vendor=$Vendors->find("all")->where(['id' => $user->vendor_id])->first();
           
            		$this->set(compact('vendor'));
            		
            		
            
         
            $chargeObj = TableRegistry::get('ProductCharges');
        	$charge=$chargeObj->find()->where(['is_active'=>1,'type_id'=>$order->product->type_id]);
        	$total=0;
                foreach($charge as $c){
                    $cha=($c->charge_type!=1)?(($c->value*$order->product->offer_price/100)):$c->value;
                    $total= $total+$cha;
                    
                }
               $seller_payable= $order->product->offer_price-$total;
        if($order->order_status==0)
		{
			$a="Processing";
		}
		else if($order->order_status==1)
		{
			$a="Onhold";
		}
		else if($order->order_status==2)
		{
			$a="Completed";
		}
		else if($order->order_status==3)
		{
			$a="Cancelled";
		}
		else
		{
			$a="Confirmed";
		}
		
        ?>
            <tr>
                <td><?= $order->user->first_name ?></td>
                <td><?= $order->invoice->creation_date ?></td>
                <td><?= $order->order_completed_date ?></td>
                <td><?= $order->invoice->invoice_no ?></td>
                <td><?= $order->invoice->order_id ?></td>
                <td><?= $order->shipment ?></td>
                <td><?= $order->carrierName ?></td>
                <td><?= $order->manifestID ?></td>
                <td><?= $order->awbNo ?></td>
                <td><?= $a ?></td>
                <td>
                    <?php
                    if($order->return_status==0)
                    {
                        echo "NA";
                    }
                    else if($order->return_status==1)
                    {
                        echo "Request for Return";
                    }
                    else if($order->return_status==2)
                    {
                        echo "Approve Return Request";
                    }
                    else
                    {
                        echo "Return Completed";
                    }
                    
                    ?>
                </td>
             
                <td><?= $order->invoice->user_delivery_detail->name ?></td>
                <td><?= $order->invoice->user_delivery_detail->home_address ?></td>
                <td><?= $order->invoice->user_delivery_detail->state ?></td>
                <td><?= $order->invoice->user_delivery_detail->city ?></td>
                <td><?= $order->invoice->user_delivery_detail->pin ?></td>
                <td><?= $order->product->name ?></td>
                <td><?= $order->product->hsn_code ?></td>
                <td><?= $order->product->supc ?></td>
                <td><?= $order->quantity ?></td>
                <td><?= $order->product->offer_price ?></td>
                <td><?= $order->delivery_charge ?></td>
	    		<td><?= $order->invoice->price_tag ?></td>
	    		<td><?= $order->item_net_amount ?></td>	
	    		
	    			
	    			<td>
	    			    <?php
        	    		
        	    		           $gst=($order->quantity*$order->product->offer_price)-($order->quantity*($order->product->offer_price*100/($order->product->gst_percentage+100)));
                	    		 
                	    		    $gst_igst=round($gst,2);
                	    		    
                	    		  echo $gst_igst . '('.$order->product->gst_percentage.'%)';
        	    		
        	    		?>
	    			    </td>
	    			    <td><?= ($order->product->offer_price*$order->quantity) ?></td>
               
                <td><?=$seller_payable*$order->quantity ?></td>
                
               <td><?php 
                    
                    if($order->charge_type==1)
                    {
                        echo "RTO";
                    }
                    if($order->charge_type==2)
                    {
                        echo "RMA";
                    }
               
               
               ?></td>
               <td><?= $order->charge_amount ?></td>
               <td><?= $order->charge_details ?></td>
               <td><?php 
               
               if($order->charge_receive==1)
               {
                   echo "No";
               }
                if($order->charge_receive==2)
               {
                   echo "YES";
               }
               
               ?>
               </td>
               <td><?= $order->charge_apply_date ?></td>
               <td><?= $order->charge_receive_date ?></td>

               
             
                   
            </tr>

        <?php endforeach; ?>
        </tbody>
        </table>
    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>								   

</div>
</div>
<script type="text/javascript">
function exportTableToExcel(sampleTable, filename = 'Order Report'){
	
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(sampleTable);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>