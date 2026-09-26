
        <div class="main-content">
          <div class="content-wrapper"><!--Extended Table starts-->
<div class="row">
    <div class="col-4">
        <div class="content-header">Product Enquiry List</div>
      
    </div>
	    <div class="col-4">
      
      
    </div>
	    <div class="col-4">

        
      
    </div>

</div>
<section id="extended">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                
                <div class="card-body">
                  
                    <div class="card-block">
    <div align="left"><button onclick="exportTableToExcel('sampleTable')">Export Table Data To Excel File</button></div> 
                        <table class="table table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                      <th>SL NO</th>
                                      <th>Date</th>
                                      <th>Name</th>
									  <th>Product Name</th>
									  <th>Email</th>
									  <th>Phone</th>
									  <th>Enquiry</th>
									  <th>Status</th>
									  <th>Action</th>
                                </tr>
                            </thead>
        <?php 
		$c=1;
		foreach ($question as $pro1):
		
		?>
            <tr>
                <td><?= $c ?></td>
                <td><?= $pro1->dt ?></td>
                <td><?= $pro1->name?></td>
                <td><?= $pro1->product->name ?></td>
				<td><?= $pro1->email ?></td>
               <td><?= $pro1->mobile ?></td>
              
               <td><?= $pro1->enquiry ?></td>
               <td><?= $pro1->status ?></td>
			  
                    <td class="actions">
					 
                 <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $pro1->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    
                    
                </td>
            </tr>

        <?php $c++;
		endforeach; ?>
                        </table>
                    </div> 
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
</section>
</div>
</div>
<script type="text/javascript">
function exportTableToExcel(sampleTable, filename = 'REQUEST FOR INSTALLATION'){
	
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
  