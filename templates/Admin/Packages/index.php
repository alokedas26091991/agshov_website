<div class="main-content">
    <div class="content-wrapper">
        <section id="simple-table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?= $this->Html->link(__('Package List'), ['action' => 'index']) ?></h4>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <div class="tables" style="overflow:auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><?= __('#') ?></th>
                                                <th><?= $this->Paginator->sort('Package Name') ?></th>
                                                <th><?= $this->Paginator->sort('Price') ?></th>
                                                <th><?= $this->Paginator->sort('is_active') ?></th>
                                                <th class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                            $serialNumber = 1;
                                            foreach ($packages as $package) :
                                                if ($package->is_active == 1) {
                                                    $a = "Active";
                                                } else {
                                                    $a = "Inactive";
                                                }
                                            ?>
                                                <tr>
                                                    <td><?= $serialNumber++ ?></td>
                                                    <td><?= h($package->name) ?></td>
                                                    <td><?= h($package->price) ?></td>
                                                    <td><?= h($a) ?></td>
                                                    <td class="actions">
                                                        <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $package->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                                        <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $package->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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
                </div>
            </div>
        </section>
    </div>
</div>