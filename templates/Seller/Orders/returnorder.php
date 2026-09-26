
    
            <div class="container-fluid">
                <div align="right"><button onclick="exportTableToExcel('sampleTable')" class="btn btn-warning">Export Return Order To Excel File</button></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body border-bottom">                                
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-one" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?php echo $this->Url->build(["controller"=>"Orders","action"=>"returnorder"]); ?>"><span class="hidden-xs-down">New Returns </span></a>
                                    <li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Orders","action"=>"acceptReturn"]); ?>"><span class="hidden-xs-down">Accepted Returns</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Orders","action"=>"completedReturn"]); ?>"><span class="hidden-sm-up"><span class="hidden-xs-down"> Completed Returns</span></a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border" style="overflow-x:auto;">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        
                                            <table class="table table-one" id="sampleTable">
                                                <thead>

                                                    <tr class="filters">
                                                            <th>Order ID</th>
    														<th>SKU</th>
    														<th>Quantity</th>
                                                            <th>Amount</th>
                                                            <th>Date</th>
    														<th>Action</th>
    														<th>&nbsp;</th>
                                                        </tr>
                                                </thead>
                                                <tbody>
												        	<?php
                                        				
                                                            foreach($invoice1 as $invoice)
                                                        	{
                                                        	    
                                                            ?>
                                                            
                                                           
                                                    <tr>
                                                      
                                                        <td class="white-space-nowrap"><?= $invoice->invoice->order_id ?></td>
                                                        
                                                       
                                                        <td><?= $invoice->product->supc ?></td>
                                                        <td><?= $invoice->quantity ?></td>
                                                        
														<td><?= $invoice->item_net_amount+($invoice->quantity*$invoice->delivery_charge) ?></td>
														
											            <td class="white-space-nowrap"><?= $invoice->return_order_date ?></td>	
											
											
                                                      
														 <td class="actions">
															
															<?= $this->Html->link('<span class="btn btn-sm btn-default">Return Status</span><span class="sr-only">' . __('Details') . '</span>', ['action' => 'returnstatus', $invoice->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Return Status')]) ?>
															
															
														
														
														</td>
														<td>
														    <?= $this->Html->link('<span class="btn btn-sm btn-default">Return Details</span><span class="sr-only">' . __('Return Details') . '</span>', ['action' => 'returndetails', $invoice->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Return Details')]) ?>
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
<script type="text/javascript">
function exportTableToExcel(sampleTable, filename = 'Return Order List'){
	
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
