<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Social Page</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Footer Title</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Alternative Number</th>
                            <th>Email</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php $i=1; foreach ($socials as $brand):
                        ?>
                            <tr>
                            <td><?= h($i++) ?></td>
                                <td><?= h($brand->title) ?></td>
                                <td><?= h($brand->address) ?></td>
                                <td><?= h($brand->phone_1) ?></td>
                                <td><?= h($brand->phone_2) ?></td>
                                <td><?= h($brand->email_1) ?></td>
                                <td><?= substr($brand->fb, 0, 30); ?>...</td>
                                <td><?= substr($brand->youtube, 0, 30); ?>...</td>
                       
                                <td class="actions">
                                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $brand->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
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