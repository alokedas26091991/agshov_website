<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Module Permission List</h4><br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Role Name</th>
                            <th>Module Name</th>
                            <th>Permission View</th>
                            <th>Permission Insert</th>
                            <th>Permission Update</th>
                            <th>Permission Delete</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $k = 1;
                        foreach ($modulePermissions as $modulePermission): 
                            if ($modulePermission->perm_view == 1) {
                                $a = "Yes";
                            } else {
                                $a = "No";
                            }
                            if ($modulePermission->perm_insert == 1) {
                                $b = "Yes";
                            } else {
                                $b = "No";
                            }
                            if ($modulePermission->perm_update == 1) {
                                $c = "Yes";
                            } else {
                                $c = "No";
                            }
                            if ($modulePermission->perm_delete == 1) {
                                $d = "Yes";
                            } else {
                                $d = "No";
                            }
                        ?>
                            <tr>
                                <td><?= $k++ ?></td>
                                <td>
                                    <?= h($modulePermission->role->role_name) ?>
                                </td>
                                <td>
                                    <?= h($modulePermission->module->name) ?>
                                </td>
                                <td><?= h($a) ?></td>
                                <td><?= h($b) ?></td>
                                <td><?= h($c) ?></td>
                                <td><?= h($d) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $modulePermission->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $modulePermission->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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