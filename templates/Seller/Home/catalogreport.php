<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Catalog Report'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div align="right"><button onclick="exportTableToExcel('sampleTable')">Export Table Data To Excel File</button></div>
    <div class="tables" style="overflow: scroll;">
        <table class="table table-bordered" id="sampleTable">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Product ID') ?></th>
                <th><?= $this->Paginator->sort('Product Name') ?></th>
               
                <th><?= $this->Paginator->sort('SKU') ?></th>
                <th><?= $this->Paginator->sort('Category') ?></th>
                <th><?= $this->Paginator->sort('SubCategory') ?></th>
                <th><?= $this->Paginator->sort('Type') ?></th>
                <th><?= $this->Paginator->sort('Brand') ?></th>
                <th><?= $this->Paginator->sort('Actual Price') ?></th>
                <th><?= $this->Paginator->sort('Offer Price') ?></th>
                <th><?= $this->Paginator->sort('Delivery Charge') ?></th>
                <th><?= $this->Paginator->sort('Total Quantity') ?></th>
                <th><?= $this->Paginator->sort('Total Quantity Sale') ?></th>
                <th><?= $this->Paginator->sort('Remaining Quantity') ?></th>
                <th><?= $this->Paginator->sort('Is Featured') ?></th>
                <th><?= $this->Paginator->sort('GST Percentage') ?></th>
                <th><?= $this->Paginator->sort('HSN Code') ?></th>
                
                
            </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product): 
        if($product->product->is_featured==1)
		{
			$a="Yes";
		}
		else
		{
			$a="No";
		}
		
        ?>
            <tr>
                <td><?= $product->product->id ?></td>
                <td><?= $product->product->name ?></td>
                <td><?= $product->product->supc ?></td>
                <td><?= $product->product->category->name ?></td>
                <td><?= $product->product->sub_category->name ?></td>
                <td><?= $product->product->type->name ?></td>
                <td><?= $product->product->brand->name ?></td>
                <td><?= $product->actual_price ?></td>
                <td><?= $product->offer_price ?></td>
                <td><?= $product->delivery_charge ?></td>
                <td><?= $product->total_quantity ?></td>
                <td><?= $product->total_quantity_sale ?></td>
                <td><?= $product->total_quantity-$product->total_quantity_sale ?></td>
                <td><?= $a ?></td>
                <td><?= $product->product->gst_percentage ?></td>
                <td><?= $product->product->hsn_code ?></td>
                
               
             
                   
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
function exportTableToExcel(sampleTable, filename = 'Catelog Report'){
	
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