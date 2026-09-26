
        <div class="main-content">
          <div class="content-wrapper"><!--Extended Table starts-->
<div class="row">
    <div class="col-4">
        <div class="content-header">Review List</div>
      
    </div>
	    <div class="col-4">
      
      
    </div>
	    <div class="col-4">
		<a href="<?php echo $this->Url->build(["controller"=>"Vendors","action"=>"index"]); ?>" class="btn btn-success"><i class="fa fa-check"></i> Vendor List</a>
       
      
    </div>

</div>
<section id="extended">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-block" style="overflow:auto;">

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                      <th>SL NO</th>
                     
									  <th>Product Name</th>
									  <th>Rating</th>
									  <th>Comment</th>
									 <th>Status</th>
									  <th>Action</th>
                                </tr>
                            </thead>
        <?php 
		$c=1;
		foreach ($pro as $pro1):
		if($pro1->is_active==1)
		{
			$a="Active";
		}
		else
		{
			$a="Inctive";
		}
		?>
            <tr>
                <td><?= $c ?></td>
                <td><?= $pro1->product->name ?></td>
				<td><?= $pro1->rating ?></td>
               <td><?= $pro1->comment ?></td>
			   <td><?= $a ?></td>
                    <td class="actions">
					 
                
                    
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete Review') . '</span>', ['controller'=>'Vendors','action' => 'reviewchangestatus', $pro1->id], ['confirm' => __('Are you sure you want to Inactive this Review ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Inactive Review')]) ?>
                </td>
            </tr>

        <?php $c++;
		endforeach; ?>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>

  