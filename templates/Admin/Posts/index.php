<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Blog List</h4><br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Banner Image</th>
                            <th>User Name</th>
                            <th>Post Type</th>
                            <th>Post Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $serialNumber = 1;
                        foreach ($posts as $post) :

                            if ($post->status == 1) {
                                $a = "Active";
                            } else {
                                $a = "Inactive";
                            }
                            // if ($post->is_popular == 1) {
                            //     $b = "Yes";
                            // } else {
                            //     $b = "No";
                            // }
                            if ($post->post_type == 1) {
                                $c = "Published";
                            } else {
                                $c = "Unpublished";
                            }
                        ?>
                            <tr>
                                <td><?= $serialNumber++ ?></td>
                                <td><?= h($post->title) ?></td>
                                <td>
                                    <a href="<?php echo $this->Url->image("upload/allimages/$post->banner_photo", ['pathPrefix' => '']) ?>"><img src="<?php echo $this->Url->image("upload/allimages/$post->banner_photo", ['pathPrefix' => '']) ?>" style="height:100px;width:100px;" /></a>
                                </td>
                                <td><?= h($post->user->name) ?></td>
                                <td><?= h($c) ?></td>
                                <!-- <td><?= h($b) ?></td> -->
                                <td><?= date("d-m-Y", strtotime($post->post_date)) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $post->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                    <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'delete', $post->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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