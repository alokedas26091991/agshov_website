<?= $this->Html->css(['/admin_template/css/grab.css'], ['pathPrefix' => '']); ?>
<style>
    .form-horizontal {
        margin-left: 12px;
    }

    .card-block {
        margin-top: -50px;
    }
</style>
<div class="main-content">
    <div class="content-wrapper">
        <section id="simple-table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?= $this->Html->link(__('Booking Details'), ['action' => 'index']) ?></h4>
                        </div>
                        <div class="card-body">
                            <?= $this->element('search'); ?>
                            <div class="card-block">
                                <div align="right"><?= $this->Html->link('<span class="fa fa-plus"></span><span class="sr-only">' . __('Add') . '</span>', ['action' => 'add'], ['escape' => false, 'class' => 'btn  btn-default', 'title' => __('Add')]) ?></div>
                                <div class="tables" style="overflow:auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><?= $this->Paginator->sort('#') ?></th>
                                                <th><?= $this->Paginator->sort('booking_id') ?></th>
                                                <th><?= $this->Paginator->sort('expected_appointment_date & time') ?></th>
                                                
                                                <th><?= $this->Paginator->sort('booking_type') ?></th>
                                                <th><?= $this->Paginator->sort('appointment_type') ?></th>
                                                <th><?= $this->Paginator->sort('package_amount') ?></th>
                                                <th><?= $this->Paginator->sort('appointment_date & time') ?></th>
                                                
                                                <th><?= $this->Paginator->sort('status') ?></th>
                                                <th class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                            $k = 0;
                                            foreach ($bookingDetails as $bookingDetail):
                                                if ($bookingDetail->status == 0) {
                                                    $a = "Pending";
                                                } elseif($bookingDetail->status == 2) {
                                                    $a = "Confirmed";
                                                }elseif($bookingDetail->status == 3) {
                                                    $a = "Cancelled";
                                                }
                                                elseif($bookingDetail->status == 4) {
                                                    $a = "Completed";
                                                }

                                                if ($bookingDetail->booking_type == 0) {
                                                    $b = "New Customer";
                                                } elseif ($bookingDetail->booking_type == 1) {
                                                    $b = "Old Customer";
                                                }

                                                if ($bookingDetail->appointment_type == 0) {
                                                    $c = "Video Consult";
                                                } elseif ($bookingDetail->appointment_type == 1) {
                                                    $c = "At Clinit";
                                                }

                                                $k++;
                                            ?>
                                                <tr>
                                                    <td><?= $k ?></td>
                                                    <td><?= h($bookingDetail->booking->id) ?></td>
                                                    <td>
                                                        <?php
                                                        if ($bookingDetail->expected_appointment_date) {
                                                            echo date("d-m-Y", strtotime($bookingDetail->expected_appointment_date)) . " | " . date("h:i A", strtotime($bookingDetail->expected_appointment_time));
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= h($b) ?></td>
                                                    <td><?= h($c) ?></td>
                                                    <td><?= h($bookingDetail->package_amount) ?></td>
                                                    <td>
                                                        <?php
                                                        if ($bookingDetail->appointment_date) {
                                                            echo date("d-m-Y", strtotime($bookingDetail->appointment_date)) . " | " . date("h:i A", strtotime($bookingDetail->appointment_time));
                                                        }
                                                        ?>
                                                    </td>
                                                    <td><?= h($a) ?></td>
                                                    <td class="actions">
                                                     <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'edit', $bookingDetail->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                                     <!-- <?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Status') . '</span>', ['action' => 'delete', $bookingDetail->id], ['confirm' => __('Are you sure you want to In Active this Category ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Status')]) ?> -->
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