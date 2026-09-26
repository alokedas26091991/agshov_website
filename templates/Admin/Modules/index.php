<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Module List</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Caption</th>
                            <th>Access Type</th>
                            <th>Order By</th>
                            <th>Icon Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php 
                        $k=1;
                        foreach ($modules as $module):
                            if ($this->Number->format($module->access_type) == "0") {
                                $this->val = "General";
                            } else if ($this->Number->format($module->access_type) == "1") {
                                $this->val = "Vendor";
                            } else if ($this->Number->format($module->access_type) == "2") {
                                $this->val = "Admin";
                            } else {
                                $this->val = "API";
                            }
                        ?>
                            <tr>
                                <td><?= $k++; ?></td>
                                <td><?= h($module->name) ?></td>
                                <td><?= h($module->caption) ?></td>
                                <td><?= $this->val ?></td>
                                <td><?= $this->Number->format($module->order_by) ?></td>
                                <td><?= h($module->icon) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $module->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $module->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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