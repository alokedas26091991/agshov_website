<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Shipping Charge and serviceability Details'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                       
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Mode') ?></th>
               <th><?= $this->Paginator->sort('Price') ?></th>

                
               
            </tr>
        </thead>
        <tbody>
        <?php foreach ($price as $key => $value): 
        
		
        ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
        </table>
            <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Mode') ?></th>
               <th><?= $this->Paginator->sort('is Available') ?></th>

                
               
            </tr>
        </thead>
        <tbody>
        <?php foreach ($service as $key => $value): 
        
        if($value)
        {
            $av="Yes";
        }
        else
        {
            $av="No";
        }
		
        ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $av ?></td>
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