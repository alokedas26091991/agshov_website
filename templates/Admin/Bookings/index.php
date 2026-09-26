<?= $this->Html->css(['/admin_template/css/grab.css'], ['pathPrefix' => '']); ?>
<style>
    .form-horizontal {
        margin-left: 12px;
    }

    .card-block {
        margin-top: 10px;
    }
</style>
<div class="main-content">
    <div class="content-wrapper">
        <section id="simple-table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?= $this->Html->link(__('Customer Booking List'), ['action' => 'index']) ?></h4>
                        </div>
                        <div class="card-body">
                              <div class="card-block">
                                <div align="right"></div>
                                <div class="tables" style="overflow:auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><?= $this->Paginator->sort('#') ?></th>
												<th><?= $this->Paginator->sort('Date') ?></th>
												<!--<th><?= $this->Paginator->sort('User') ?></th>-->
                                                <th><?= $this->Paginator->sort('patient_name') ?></th>
                                                <th><?= $this->Paginator->sort('age') ?></th>
                                                <th><?= $this->Paginator->sort('sex') ?></th>
                                                <th><?= $this->Paginator->sort('patient_mobile') ?></th>
                                                <th><?= $this->Paginator->sort('patient_email') ?></th>
                                                <!--<th><?= $this->Paginator->sort('category_id') ?></th>-->
                                                <!--<th><?= $this->Paginator->sort('subcategory_id') ?></th>-->
                                                <!--<th><?= $this->Paginator->sort('package_id') ?></th>-->
                                                <!--<th><?= $this->Paginator->sort('no_of_bookings') ?></th>-->
                                                <!--<th><?= $this->Paginator->sort('service_end_date') ?></th>-->
                                                <th><?= $this->Paginator->sort('payment_status') ?></th>
                                                <!--<th><?= $this->Paginator->sort('status') ?></th>-->
                                                <th class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                            $k = 0;
                                            foreach ($bookings as $booking):
                                                if ($booking->status == 1) {
                                                    $a = "Open";
                                                } elseif ($booking->status == 2) {
                                                    $a = "Closed";
                                                }
                                                $k++;
                                            ?>
                                                <tr>
                                                    <td><?= $k ?></td>
													<td>
													 <?= date("d-m-Y", strtotime($booking->created_at)) ?>
													 </td>
													<!--<td><?= h($booking->user->name) ?></td>-->
                                                    <td><?= h($booking->patient_name) ?></td>
                                                    <td><?= h($booking->age) ?></td>
                                                    <td><?= h($booking->sex) ?></td>
                                                    <td><?= h($booking->patient_mobile) ?></td>
                                                    <td><?= h($booking->patient_email) ?></td>
                                                    <!--<td><?= h($booking->servicecategory->name) ?></td>-->
                                                    <!--<td><?= h($booking->servicesubcategory->name) ?></td>-->
                                                    <!--<td><?= h($booking->package->name) ?></td>-->
                                                    <!--<td><?= h($booking->no_of_bookings) ?></td>-->
                                                   
                                                    <!-- <td><?= h($booking->service_end_date) ?></td> -->
                                                    <!--<td><?= $a ?></td>-->
                                                    <td><?= $booking->razorpay_payment_id?"Payment Done":"Payment Not Done" ?></td>
                                                    <td class="actions">
                                                        <?= $this->Html->link(
                                                            '<span class="fa fa-eye"></span><span class="sr-only">' . __('Booking Status') . '</span>',
                                                            ['controller' => 'Bookings', 'action' => 'booking_details', $booking->id],
                                                            ['escape' => false, 'class' => 'btn-default', 'title' => __('Booking Status')]
                                                        ) ?>
                                                        <!-- <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Status') . '</span>', ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to In Active this Category ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Status')]) ?> -->
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
<script>
    var ajxUrl = '<?= $this->Url->build("/admin/products"); ?>'
</script>
<?= $this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js', '/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min', '/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js', '/admin_template/js/angular/product', '/admin_template/js/grab.js'], ['block' => 'scriptBottom']); ?>