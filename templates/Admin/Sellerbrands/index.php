
<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Request for Installation'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                     
                     

                    <div class="card-block">
                      <div align="left"><button onclick="exportTableToExcel('sampleTable')">Export Table Data To Excel File</button></div> 
    <div class="tables" style="overflow:auto;">
        <table class="table table-bordered" id="sampleTable">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('date') ?></th>
              <th><?= $this->Paginator->sort('service') ?></th>
              
                <th><?= $this->Paginator->sort('wheeler') ?></th>
                <th><?= $this->Paginator->sort('budget') ?></th>
                <th><?= $this->Paginator->sort('camera') ?></th>
                <th><?= $this->Paginator->sort('reason') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('phone') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('pin') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
           
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody id="myTable">
        <?php foreach ($sellerbrands as $brand): 



        ?>
            <tr>
                <td><?= $this->Number->format($brand->id) ?></td>
				
            <td><?= $brand->dt ?></td>
            
            <td><?= $brand->service ?></td>
            <td><?= $brand->wheeler ?></td>
            <td><?= $brand->budget ?></td>
            <td><?= $brand->camera ?></td>
            <td><?= $brand->reason ?></td>
            <td><?= $brand->name ?></td>
            <td><?= $brand->phone ?></td>
            <td><?= $brand->address ?></td>
            <td><?= $brand->pin ?></td>

              <td><?= $brand->city ?></td>
               <td><?= $brand->status ?></td> 

                    <td class="actions">

                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $brand->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                </td>
            </tr>

        <?php endforeach; ?>
        </tbody>
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