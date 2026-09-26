<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Social Page</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $serialNumber = 1;
                        foreach ($servicecategories as $servicecategory) :
                            $status = $servicecategory->is_active ? "Active" : "Inactive";
                        ?>
                            <tr>
                                <td><?= $serialNumber++ ?></td>
                                <td><?= h($servicecategory->name) ?></td>
                                <td><?= h($status) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link('<span class="fa fa-edit"></span>', ['action' => 'edit', $servicecategory->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                    <?= $this->Form->postLink('<span class="fa fa-times"></span>', ['action' => 'delete', $servicecategory->id], ['confirm' => __('Are you sure you want to delete?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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
                </div>
            </nav>
        </div>
    </div>
</div>