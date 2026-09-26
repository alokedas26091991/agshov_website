<style>
.overlay {
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    position: fixed;
    background: #222;
}

.overlay__inner {
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    position: absolute;
}

.overlay__content {
    left: 50%;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
}

.spinner {
    width: 75px;
    height: 75px;
    display: inline-block;
    border-width: 2px;
    border-color: rgba(255, 255, 255, 0.05);
    border-top-color: #fff;
    animation: spin 1s infinite linear;
    border-radius: 100%;
    border-style: solid;
}

@keyframes spin {
  100% {
    transform: rotate(360deg);
  }
}

</style>
<div class="main-content" ng-app="product" ng-controller="productCrt">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card1">
                <div class="card-header1">
                    <h4 class="card-title"><?= $this->Html->link(__('Product List'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                   
                    <div class="card-block">
                     <div align="left"><button onclick="exportTableToExcel('sampleTable')">Export Table Data To Excel File</button></div>  
    <div class="tables">
        <table class="table table-bordered" id="sampleTable">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
               
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('SKU') ?></th>
               <th><?= $this->Paginator->sort('Category') ?></th>
               <th><?= $this->Paginator->sort('Subcategory') ?></th>
               <th><?= $this->Paginator->sort('Type') ?></th>
				<th><?= $this->Paginator->sort('brand_id') ?></th>
				
				<th><?= $this->Paginator->sort('total_quantity') ?></th>
				<th><?= $this->Paginator->sort('total_quantity_sale') ?></th>
				<th><?= $this->Paginator->sort('actual_price') ?></th>
				<th><?= $this->Paginator->sort('offer_price') ?></th>
				<th><?= $this->Paginator->sort('delivery_charge') ?></th>
				<th><?= $this->Paginator->sort('gst_percentage') ?></th>
				<th><?= $this->Paginator->sort('hsn_code') ?></th>
				<th><?= $this->Paginator->sort('is_featured') ?></th>
				<th><?= $this->Paginator->sort('Varient') ?></th>
				<th><?= $this->Paginator->sort('is_live') ?></th>
				<th><?= $this->Paginator->sort('is_active') ?></th>
				<th><?= $this->Paginator->sort('is_deleted') ?></th>
				<th><?= $this->Paginator->sort('show_in_site') ?></th>

        
            </tr>
        </thead>
        <tbody>
        <?php foreach ($product_list as $product): 
        if($product->product->is_featured==0)
		{
			$a="No";
		}
		else
		{
			$a="Yes";
		}
		if($product->product->variant==0)
		{
			$v="No";
		}
		else
		{
			$v="Yes";
		}
		if($product->is_live==0)
		{
			$l="No";
		}
		else
		{
			$l="Yes";
		}
		if($product->is_active==0)
		{
			$ac="No";
		}
		else
		{
			$ac="Yes";
		}
		if($product->show_in_site==0)
		{
			$show="No";
		}
		else
		{
			$show="Yes";
		}
		if($product->product->is_deleted==0)
		{
			$del="No";
		}
		else
		{
			$del="Yes";
		}
		
		?>
            <tr>
                <td><?= $this->Number->format($product->id) ?></td>
                   
                
				<td><?= h($product->user->first_name) ?></td>
                <td><?= h($product->product->name) ?></td>
                <td><?= h($product->product->supc) ?></td>
                <td><?= h($product->product->category->name) ?></td>
                <td><?= h($product->product->sub_category->name) ?></td>
                <td><?= h($product->product->type->name) ?></td>
                <td><?= h($product->product->brand->name) ?></td>
               
		
			   <td><?= h($product->total_quantity) ?></td>
			   <td><?= h($product->total_quantity_sale) ?></td>
			   <td><?= h($product->actual_price) ?></td>
			   <td><?= h($product->offer_price) ?></td>
			   <td><?= h($product->delivery_charge) ?></td>
			   <td><?= h($product->product->gst_percentage) ?></td>
			   <td><?= h($product->product->hsn_code) ?></td>
			   <td><?= $a ?></td>
                <td><?= $v ?></td>
                <td><?= $l ?></td>
                <td><?= $ac ?></td>
                <td><?= $show ?></td>
                <td><?= $del ?></td>
               
               
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
function exportTableToExcel(sampleTable, filename = 'Product Report'){
	
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
<script>var ajxUrl='<?=$this->Url->build("/admin/products");?>'</script>
	  <?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular/product'],['block'=>'scriptBottom']);?>