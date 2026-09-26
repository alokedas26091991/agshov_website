
            <div class="container-fluid">
                <div align="right"><button onclick="exportTableToExcel('sampleTable')" class="btn btn-warning">Export Accept Return Orders To Excel File</button></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body border-bottom">                                
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                               <ul class="nav nav-tabs tab-one" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Orders","action"=>"returnorder"]); ?>"><span class="hidden-xs-down">New Returns </span></a>
                                    <li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?php echo $this->Url->build(["controller"=>"Orders","action"=>"acceptReturn"]); ?>"><span class="hidden-xs-down">Accepted Returns</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Orders","action"=>"completedReturn"]); ?>"><span class="hidden-sm-up"><span class="hidden-xs-down"> Completed Returns</span></a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border" style="overflow-x:auto;">
                                   
                                    <div class="tab-pane active" id="profile" role="tabpanel">
                                           <div class="">
                                            <table class="table table-one" id="sampleTable">
                                                <thead>

                                                    <tr class="filters">
                                                            <th>Order ID</th>
    														<th>SKU</th>
    														<th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Date</th>
                                                            <th>Carrier</th>
                                                            <th>AWB NO</th>
    														<th>Action</th>
    														<th>&nbsp;</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
												        	<?php
                                        				
                                                            foreach($invoice1 as $invoice_com)
                                                        	{
                                                        	    
                                                            ?>
                                                            
                                                           
                                                    <tr>
                                                      
                                                        <td class="white-space-nowrap"><?= $invoice_com->invoice->order_id ?></td>
                                                        
                                                        
                                                        <td><?= $invoice_com->product->supc ?></td>
                                                        <td><?= $invoice_com->quantity ?></td>
                                                        
														<td><?= $invoice_com->item_net_amount+($invoice_com->quantity*$invoice_com->delivery_charge) ?></td>
													
													
											<td class="white-space-nowrap"><?= $invoice_com->return_approve_date ?></td>
											<td>
											    <?php
											    if(isset($invoice_com->shyplite_details[1]->carrierName))
                                            	{
                                            	    echo $invoice_com->shyplite_details[1]->carrierName;
                                            	}
                                            	else
                                            	{
                                            	    echo "Not Assigned Yet";
                                            	}
											    ?>
											    </td>
                                            <td>
                                                <?php
                                                if(isset($invoice_com->shyplite_details[1]->awbNo))
                                            	{
                                            	    echo $invoice_com->shyplite_details[1]->awbNo;
                                            	}
                                            	else
                                            	{
                                            	    echo "Not Generated";
                                            	}
											    ?>
                                               </td>    
														 <td class="actions">
										
															<?= $this->Html->link('<span class="btn btn-sm btn-default">Generate AWB NO</span><span class="sr-only">' . __('Details') . '</span>', ['action' => 'get_return_awbno', $invoice_com->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Generate AWB NO')]) ?>
														
														
														
														</td>
														<td>
														    <?= $this->Html->link('<span class="btn btn-sm btn-default">Return Details</span><span class="sr-only">' . __('Return Details') . '</span>', ['action' => 'returndetails', $invoice_com->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Return Details')]) ?>
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

<script type="text/javascript">
function exportTableToExcel(sampleTable, filename = 'Accept Return Order List'){
	
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