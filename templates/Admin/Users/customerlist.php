
        <div class="main-content">
          <div class="content-wrapper"><!--Extended Table starts-->
<div class="row">
    <div class="col-4">
        <div class="content-header">Customer List</div>
      
    </div>
	    <div class="col-4">
      
      
    </div>
	    <div class="col-4">
		<a href="<?php echo $this->Url->build(["controller"=>"Users","action"=>"index"]); ?>" class="btn btn-success"><i class="fa fa-check"></i> User List</a>
       
      
    </div>

</div>
<section id="extended">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                
                <div class="card-body">
                    
                    </br>
                  <?=$this->element('search');?>
                    <div class="card-block">
                        <?php if($this->request->getSession()->read('Auth.User.user_type')==1){?>
<?= $this->Html->link('<span class="ft-user font-medium-3 mr-2"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'info', 'title' => __('Add')]) ?>
<?php }?>
<div align="right"><button onclick="exportTableToExcel('sampleTable')">Export Table Data To Excel File</button></div>
                        <table class="table table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Address</th>
                                    <th>Pin</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                 
                                    <td><?= $user->date_of_registration ?></td>
									<td><?= h($user->first_name) ?></td>
									<td><?= h($user->email) ?></td>
									<td><?= h($user->mobile) ?></td>
									<td><?= h($user->address1) ?></td>
                                    <td><?= h($user->pin) ?></td>
               
                   

                                   
                                </tr>
                                
        <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div> <nav aria-label="Page navigation mb-3">
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
function exportTableToExcel(sampleTable, filename = 'Customer List'){
	
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
  