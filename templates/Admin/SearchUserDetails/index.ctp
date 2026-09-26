<div class="main-content">
          <div class="content-wrapper">

									   
									   
	<section id="simple-table">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $this->Html->link(__('Search User Detail'), ['action' => 'index']) ?></h4>
                   
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
    <div class="tables">
        <table class="table table-bordered">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('email_id') ?></th>
                <th><?= $this->Paginator->sort('phone_no') ?></th>
                <th><?= $this->Paginator->sort('pin_code') ?></th>
                <th><?= $this->Paginator->sort('category_id') ?></th>
                <th><?= $this->Paginator->sort('sub_category_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($searchUserDetails as $searchUserDetail): ?>
            <tr>
                <td><?= $this->Number->format($searchUserDetail->id) ?></td>
                <td><?= h($searchUserDetail->name) ?></td>
                <td><?= h($searchUserDetail->email_id) ?></td>
                <td><?= h($searchUserDetail->phone_no) ?></td>
                    <td><?= $this->Number->format($searchUserDetail->pin_code) ?></td>
                <td>
                    <?= $searchUserDetail->has('category') ? $this->Html->link($searchUserDetail->category->name, ['controller' => 'Categories', 'action' => 'view', $searchUserDetail->category->id]) : '' ?>
                </td>
            <td>
                    <?= $searchUserDetail->has('sub_category') ? $this->Html->link($searchUserDetail->sub_category->name, ['controller' => 'SubCategories', 'action' => 'view', $searchUserDetail->sub_category->id]) : '' ?>
                </td>
                <td class="actions">
                    <?= $this->Html->link('<span class="fa fa-search"></span><span class="sr-only">' . __('View') . '</span>', ['action' => 'view', $searchUserDetail->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('View')]) ?>
                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $searchUserDetail->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $searchUserDetail->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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