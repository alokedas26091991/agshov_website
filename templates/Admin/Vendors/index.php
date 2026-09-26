<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script>

        function ExportToExcel(type, fn, dl) {
            var elt = document.getElementById('tbl_exporttable_to_xls');
            var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
            return dl ?
                XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }) :
                XLSX.writeFile(wb, fn || ('SellerList.' + (type || 'xlsx')));
        }

    </script>
        <div class="main-content">
          <div class="content-wrapper"><!--Extended Table starts-->
<div class="row">
    <div class="col-4">
        <div class="content-header">Seller List</div>
      
    </div>
	    <div class="col-4">
      
      
    </div>
	    <div class="col-4">
		
       		<a target="_blank" href="<?php echo $this->Url->build(["controller"=>"Vendors","action"=>"requestlist"]); ?>" class="btn btn-success"><i class="fa fa-check"></i>Seller Request List</a>
      
    </div>

</div>
<section id="extended">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                
                <div class="card-body">
                    </br>
                     <?=$this->element('search');?>
                    <div class="card-block" style="overflow:auto;">
<button onclick="ExportToExcel('xlsx')">Export Table Data To Excel File</button>
                        <table class="table table-bordered" id="tbl_exporttable_to_xls">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                   <th>Status</th>
                                    <th>address</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php foreach ($users as $user):
                                if($user->is_active==1)
                                {
                                    $status="Active";
                                    
                                }
                                else
                                {
                                    $status="Inactive";
                                }
                                ?>
                                <tr>
                                 
                                    <td><?= $this->Number->format($user->id) ?></td>
                                    <td><?= $user->date_of_registration ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->email) ?></td>
                  <td><?= h($user->mobile) ?></td>
                    <td><?=$status ?></td>
               
                    <td >
					<?=$user->address1?>
                </td>

                                   
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

  