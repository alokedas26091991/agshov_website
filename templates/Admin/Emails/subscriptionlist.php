<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Subscription List'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                        
                        <div class="left">
                            <?=
                            $this->Form->postLink(
                            "Subscription List", // first
                            ['action' => 'subscriptionlist'],  // second
                            ['escape' => false, 'title' => 'Subscription List', 'class' => 'btn btn-success', 'value'=>'Subscription List'] // third
                        );
                        ?>
                        &nbsp;&nbsp;
                        <?=
                            $this->Form->postLink(
                            "Subscription Entry", // first
                            ['action' => 'subscriptionentry'],  // second
                            ['escape' => false, 'title' => 'Subscription Entry', 'class' => 'btn btn-warning', 'value'=>'Subscription Entry'] // third
                        );
                        ?>
                        </div>
                        
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('Date') ?></th>
                <th><?= $this->Paginator->sort('Email') ?></th>
                <th><?= $this->Paginator->sort('Gender') ?></th>
             

                
            </tr>
        </thead>
        <tbody>
        <?php foreach ($subscription as $subscription): ?>
            <tr>
                <td><?= $this->Number->format($subscription->id) ?></td>
                <td><?= h($subscription->dt) ?></td>
                <td><?= h($subscription->email) ?></td>
                 <td><?= h($subscription->gender) ?></td>
            
                 
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