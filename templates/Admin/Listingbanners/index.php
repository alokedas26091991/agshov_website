<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Franchises'), ['action' => 'index']) ?></h4>
                   
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
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('company_name') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('mobile') ?></th>
                <th><?= $this->Paginator->sort('address') ?></th>
                <th><?= $this->Paginator->sort('pin') ?></th>
                <th><?= $this->Paginator->sort('city') ?></th>
                <th><?= $this->Paginator->sort('message') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($listingbanner as $advertisementItem): ?>
            <tr>
                <td><?= $this->Number->format($advertisementItem->id) ?></td>
                <td><?= $advertisementItem->dt ?></td>
                <td><?= $advertisementItem->name ?></td>
                <td><?= $advertisementItem->company_name ?></td>
                <td><?= $advertisementItem->email ?></td>
                <td><?= $advertisementItem->mobile ?></td>
                <td><?= $advertisementItem->address ?></td>
                <td><?= $advertisementItem->pin ?></td>
                <td><?= $advertisementItem->city ?></td>
                <td><?= $advertisementItem->message ?></td>
                <td><?= $advertisementItem->status ?></td>
                <td class="actions">
                   
                  <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $advertisementItem->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>

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
function exportTableToExcel(sampleTable, filename = 'Download'){
	
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