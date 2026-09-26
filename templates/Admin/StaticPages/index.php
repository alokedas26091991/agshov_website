<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Page List</h4><br>
            <?php $placeholder1 = isset($placeholder) ? implode(',', $placeholder) : ''; ?>
            <div align="left"><?= $this->Form->create([], ['class' => 'form-horizontal', 'type' => 'get']); ?>

                <div class="col-sm-6" style="margin:12px;padding-left:0px!important;">
                    <select name="search" class="form-control" required>
                        <option>Select Page</option>
                        <option value="11" <?= $search == '11' ? ' selected="selected"' : ''; ?>>Home Slider</option>
                        <option value="5" <?= $search == '5' ? ' selected="selected"' : ''; ?>>Our Trending Products</option>
                        <option value="6" <?= $search == '6' ? ' selected="selected"' : ''; ?>>Top Selling products</option>
                        <option value="1" <?= $search == '1' ? ' selected="selected"' : ''; ?>>About</option>
                        <option value="2" <?= $search == '2' ? ' selected="selected"' : ''; ?>>Contact Us</option>
                        <option value="12" <?= $search == '12' ? ' selected="selected"' : ''; ?>>Terms and Conditions</option>
                        <option value="13" <?= $search == '13' ? ' selected="selected"' : ''; ?>>Privacy Policy</option>
                        <option value="14" <?= $search == '14' ? ' selected="selected"' : ''; ?>>Return Policy</option>
                        <option value="15" <?= $search == '15' ? ' selected="selected"' : ''; ?>>Shipping and Delivery</option>
                    </select>
                </div>
                <div class="col-sm-2"> <?= $this->Form->button(__('Search'), ['class' => 'btn btn-success']) ?>
                </div>
                <?= $this->Form->end() ?>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Page Name</th>
                                <th>Name</th>
                                <th>Section</th>
                                <th>Order</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            <?php

                            $k = 0;
                            foreach ($advertisements as $advertisement):

                                $k++;
                            ?>
                                <tr>
                                    <td><?= $k ?></td>

                                    <td>
                                        <?php
                                        if ($advertisement->page_name == 1) {
                                            echo "About";
                                        } else if ($advertisement->page_name == 2) {
                                            echo "Contact Us";
                                        } else if ($advertisement->page_name == 5) {
                                            echo "Our Trending Products";
                                        } else if ($advertisement->page_name == 6) {
                                            echo "Top Selling products";
                                        } else if ($advertisement->page_name == 11) {
                                            echo "Home Slider";
                                        } else if ($advertisement->page_name == 12) {
                                            echo "Terms and Conditions";
                                        } else if ($advertisement->page_name == 13) {
                                            echo "privacy Policy";
                                        } else if ($advertisement->page_name == 14) {
                                            echo "Return Policy";
                                        } else if ($advertisement->page_name == 15) {
                                            echo "Shipping and Delivery";
                                        }

                                        ?>
                                    </td>
                                    <td><?= h($advertisement->name) ?></td>
                                    <!--<td><?= html_entity_decode($advertisement->details) ?></td>-->



                                    <td><?= $advertisement->section ?></td>
                                    <!-- <td><?= $advertisement->link ?></td> -->
                                    <td><?= $advertisement->ord ?></td>
                                    <td><?= $advertisement->is_active ? 'Active' : 'Inactive' ?></td>
                                    <td class="actions grab">
                                        <?= $this->Html->link('<span class="fa fa-edit"></span>', ['action' => 'edit', $advertisement->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                        <?= $this->Form->postLink('<span class="fa fa-times"></span>', ['action' => 'delete', $advertisement->id], ['confirm' => __('Are you sure you want to delete?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
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