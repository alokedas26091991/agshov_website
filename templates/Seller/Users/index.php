
        <div class="main-content">
          <div class="content-wrapper"><!--Extended Table starts-->
<div class="row">
    <div class="col-12">
        <div class="content-header">Account Holder</div>
      
    </div>
</div>
<section id="extended">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                
                <div class="card-body">
                    <div class="card-block">
                        <?php if($this->request->session()->read('Auth.User.user_type')==1){?>
<?= $this->Html->link('<span class="ft-user font-medium-3 mr-2"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'info', 'title' => __('Add')]) ?>
<?php }?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                   
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $user): ?>
                                <tr>
                                 
                                    <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->email) ?></td>
                  <td><?= h($user->mobile) ?></td>
                   
               
                    <td class="actions">
					<?php if($this->request->session()->read('Auth.User.user_type')==1){?>
                     <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">
                     </span>', ['action' => 'edit', $user->id], ['escape' => false, 'class' => 'success p-0', 'title' => __('Edit')]) ?>
                    
					<?php }?>
					
					<?= $this->Html->link('<span class="ft-user font-medium-3 mr-2"></span>', ['action' => 'changepassword', $user->id], ['escape' => false, 'class' => 'info p-0', 'title' => __('Change Password')]) ?>
					
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

  