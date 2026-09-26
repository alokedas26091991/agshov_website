
<div class="main-content">
    <div class="content-wrapper">
        <section id="simple-table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?= $this->Html->link(__('Services'), ['action' => 'index']) ?></h4>

                        </div>
                        <div class="card-body">

                            <div class="card-block">

                                <div class="tables" style="overflow:auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><?= $this->Paginator->sort('#') ?></th>
                                                <th><?= $this->Paginator->sort('name') ?></th>
                                                <th><?= $this->Paginator->sort('title') ?></th>
                                                <th><?= $this->Paginator->sort('details_1') ?></th>
                                                <th><?= $this->Paginator->sort('details_2') ?></th>
                                                <th><?= $this->Paginator->sort('fees') ?></th>
                                                <th><?= $this->Paginator->sort('image') ?></th>
                                                <th><?= $this->Paginator->sort('Status') ?></th>
                                                <th class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php $i=0;
                                            foreach ($services as $service):
                                                $i++;
                                            
                                                if ($service->is_active == 1) {
                                                    $a = "Active";
                                                } else {
                                                    $a = "Inactive";
                                                }

                                            ?>
                                                <tr><td><?= h($i) ?></td>
                                                    <td><?= h($service->name) ?></td>
                                                    <td><?= h($service->title) ?></td>
                                                    <td><?= strip_tags($service->details_1) ?></td>
                                                    <td><?= strip_tags($service->details_2) ?></td>
                                                    <td><?= h($service->fees) ?></td>
                                                    <td>
                                                        <a href="<?php echo $this->Url->image("upload/allimages/$service->image", ['pathPrefix' => '']) ?>"><img src="<?php echo $this->Url->image("upload/allimages/$service->image", ['pathPrefix' => '']) ?>" style="height:100px;width:100px;" /></a>
                                                    </td>
                                                    <td><?= h($a) ?></td>
                                                    <td class="actions">
                                                        <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $service->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
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