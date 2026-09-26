
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

</style>

            <div class="container-fluid">
                <div align="right"><button onclick="exportTableToExcel('sampleTable')" class="btn btn-warning">Export Confirm Orders To Excel File</button></div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body border-bottom">                                
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs tab-one" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Orders","action"=>"index"]); ?>"><span class="hidden-xs-down">New Orders </span></a>
                                    <li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?php echo $this->Url->build(["controller"=>"Orders","action"=>"confirmOrder"]); ?>"><span class="hidden-xs-down">Confirmed Orders </span></a>
                                    <li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Orders","action"=>"completedOrder"]); ?>"><span class="hidden-xs-down">Completed Orders</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Orders","action"=>"cancelledOrder"]); ?>"><span class="hidden-sm-up"><span class="hidden-xs-down"> Cancelled Orders</span></a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    
                                     <div class="tab-pane active" id="confirm" role="tabpanel" style="overflow-x:auto;">
                                           
                                            <table class="table table-one" id="sampleTable">
                                                <thead>

                                                    
                                                    <tr class="filters">
                                                        <th>Order ID</th>
                                                        <th>Image</th>
    													<th>Name</th>
    													<th>SKU</th>
    													<th>QTN</th>
                                                        <th>Amount</th>
                                                        <th>Currency</th>
                                                        <th>Com. Date</th>
                                                        <th>Carrier</th>
                                                        <th>AWB NO</th>
    													<th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
												        	<?php
                                        				
                                                            foreach($invoice1 as $confirm)
                                                        	{
                                                        	    
                                                            ?>
                                                            
                                                           
                                                    <tr>
                                                      
                                                        <td><?= $confirm->invoice->order_id ?></td>
														
                                                        <td>
                                                            
                			  							<img src="<?php echo $this->Url->image(UPLOAD_PRODUCT_IMAGE.$confirm->product->photo) ?>" style="width:100px;height:100px;">
                			  								
                                                        </td>
                                                        <td><?= $confirm->product->name ?></td>
														 <td><?= $confirm->product->supc ?></td>
														<td><?= $confirm->quantity ?></td>
                                                        
														<td><?= $confirm->item_net_amount ?></td>
														<td style = "text-transform:uppercase;"><?= $confirm->invoice->price_tag ?></td>
													
												    	<td><?= date("d-m-Y", strtotime($confirm->order_confirm_date))  ?></td>
												    	<td><?= $confirm->carrierName ?></td>
												    	<td><?= $confirm->awbNo ?></td>
                                                      <td class="actions">
														
															<?= $this->Html->link('<span class="btn btn-sm btn-default">Shipping Details</span><span class="sr-only">' . __('Shipping Details') . '</span>', ['action' => 'orderstatus', $confirm->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Shipping Details')]) ?>
														
														
														
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
                                            </div>
                                            </nav>
                                            <!--<nav class="Pager2" aria-label="pagination example">-->
                                            <!--    <ul class="pagination justify-content-center">-->
                                                    
                                            <!--        <li class="page-item disabled">-->
                                            <!--            <a class="page-link" href="#" aria-label="Previous">-->
                                            <!--                <span aria-hidden="true">&laquo;</span>-->
                                            <!--                <span class="sr-only">Previous</span>-->
                                            <!--            </a>-->
                                            <!--        </li>-->
                                            <!--        <li class="page-item disabled"><a class="page-link">First</a></li>-->
                                            <!--        <li class="page-item active">-->
                                            <!--            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>-->
                                            <!--        </li>-->
                                            <!--        <li class="page-item"><a class="page-link" href="#">2</a></li>-->
                                            <!--        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
                                            <!--        <li class="page-item"><a class="page-link" href="#">4</a></li>-->
                                            <!--        <li class="page-item"><a class="page-link" href="#">5</a></li>-->
                                            <!--        <li class="page-item"><a class="page-link">Last</a></li>-->
                                            <!--        <li class="page-item">-->
                                            <!--            <a class="page-link" href="#" aria-label="Next">-->
                                            <!--                <span aria-hidden="true">&raquo;</span>-->
                                            <!--                <span class="sr-only">Next</span>-->
                                            <!--            </a>-->
                                            <!--        </li>-->
                                                    
                                            <!--    </ul>-->
                                            <!--</nav>-->
                                        
                                         
                                    </div>
                                    
                                    
                                    
                                    
                                </div>                                    
                            </div>            
                        </div>
                    </div>
                </div>

            </div>

<script type="text/javascript">
function exportTableToExcel(sampleTable, filename = 'Confirm Order List'){
	
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