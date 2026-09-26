
        <div class="main-content">
          <div class="content-wrapper"><!--Extended Table starts-->
<div class="row">
    <div class="col-12">
        <div class="content-header">Seller Requests</div>
      
    </div>
</div>
<section id="extended">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                
                <div class="card-body">
                    </br>
                 
                    <div class="card-block" style="overflow:auto;">
  
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Company Name</th>
									<th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                   
									
								
									<th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php foreach ($vendors as $user):
								if($user->is_approved=="0")
								{
									$status="Inactive";
								}
								else
								{
									$status="Active";
								}

								?>
                                <tr>
                                 
                                    <td><?= $this->Number->format($user->id) ?></td>
                                     <td><?= $user->dt ?></td>
                                     <td><?= h($user->name) ?></td>
                <td><?= h($user->company_name) ?></td>
                <td><?= h($user->phone_no) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->address) ?></td>  
         
			
	
			   <td><?= $status ?></td>
                    <td class="actions">
					
					
					<?= $this->Html->link('<span class="ft-user font-medium-3 mr-2" ></span>', ['action' => 'shifttouser', $user->id], ['escape' => false, 'class' => 'info p-0', 'title' => __('Approve Seller')]) ?>
					
					<?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
					
					
                </td>

                                   
                                </tr>
                                
        <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>

  