


<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">partner List</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th><?= __('#') ?></th>
                          
                            <th>Image</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $serialNumber = 1;
                        foreach ($partners as $partner) :
                            if ($partner->is_active == 1) {
                                $a = "Active";
                            } else {
                                $a = "Inactive";
                            }
                        ?>
                            <tr>
                                <td><?= $serialNumber++ ?></td>
                              
                                <td><a href="<?php echo $this->Url->image("upload/allimages/$partner->image", ['pathPrefix' => '']) ?>"><img src="<?php echo $this->Url->image("upload/allimages/$partner->image", ['pathPrefix' => '']) ?>" style="height:100px;width:100px;" /></a></td>
                                <td><?= h($partner->ord) ?></td>
                                <td><?= $a ?></td>
                                <td class="actions">
                                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $partner->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $partner->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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