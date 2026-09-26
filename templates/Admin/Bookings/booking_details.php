<?= $this->Html->css(['/admin_template/css/grab.css'], ['pathPrefix' => '']); ?>
<style>
    .card .card-header {
    padding: 1.5rem;
    border-bottom: none;
    background-color: transparent;
    display: flex;
}
</style>
<div class="main-content">
    <div class="content-wrapper">
        <section id="simple-table">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-lg-6">
                            <h4 class="card-title"><?= $this->Html->link(__('Booking Details'), ['action' => 'index']) ?></h4>
                            </div>
                            <div class="col-lg-6">
                            <div align="right">
                                    <?= $this->Html->link('<span class="fa fa-arrow-left"></span><span class="sr-only">' . __('Back') . '</span>',
                                    ['controller' => 'Bookings', 'action' => 'index'],['escape' => false, 'class' => 'btn-default', 'title' => __('Back')]) ?>
                                </div>
                                </div>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                
                                <div class="tables" style="overflow:auto;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th><?= $this->Paginator->sort('#') ?></th>
                                                <!-- <th><?= $this->Paginator->sort('booking_id') ?></th> -->
                                                <th><?= $this->Paginator->sort('expected_appointment_date & time') ?></th>

                                                <!--<th><?= $this->Paginator->sort('booking_type') ?></th>-->
                                                <th><?= $this->Paginator->sort('booking_details') ?></th>
                                                <th><?= $this->Paginator->sort('appointment_type') ?></th>
                                                <th><?= $this->Paginator->sort('payment_mode') ?></th>
                                                <th><?= $this->Paginator->sort('Payment Amount') ?></th>
                                                <!--<th><?= $this->Paginator->sort('given_appointment_date & time') ?></th>-->

                                                <th><?= $this->Paginator->sort('status') ?></th>
                                                <th class="actions"><?= __('Actions') ?></th>
                                            </tr>
                                        </thead>
                                        <tbody id="myTable">
                                            <?php
                                            $k = 0;
                                            foreach ($book as $bookingDetail):
                                                if ($bookingDetail->status == 0) {
                                                    $a = "Pending";
                                                } elseif ($bookingDetail->status == 2) {
                                                    $a = "Confirmed";
                                                } elseif ($bookingDetail->status == 3) {
                                                    $a = "Cancelled";
                                                } elseif ($bookingDetail->status == 4) {
                                                    $a = "Completed";
                                                }

                                                if ($bookingDetail->booking_type == 0) {
                                                    $b = "New";
                                                } elseif ($bookingDetail->booking_type == 1) {
                                                    $b = "Old";
                                                }

                                                if ($bookingDetail->appointment_type == 0) {
                                                    $c = "Video Consult";
                                                } elseif ($bookingDetail->appointment_type == 1) {
                                                    $c = "At Clinit";
                                                }
                                                
                                                 if ($bookingDetail->payment_mode == 0) {
                                                    $d = "OFFLINE";
                                                } elseif ($bookingDetail->payment_mode == 1) {
                                                    $d = "ONLINE";
                                                }

                                                $k++;
                                            ?>
                                                <tr>
                                                    <td><?= $k ?></td>
                                                    <!-- <td><?= h($bookingDetail->booking->id) ?></td> -->
                                                    <td>
                                                        <?php
                                                        if ($bookingDetail->expected_appointment_date) {
                                                            echo date("d-m-Y", strtotime($bookingDetail->expected_appointment_date)) . " | " . date("H:i:s A", strtotime($bookingDetail->expected_appointment_time));
                                                        }
                                                        ?>
                                                    </td>
                                                    <!--<td><?= h($b) ?></td>-->
                                                    <td><?= h($bookingDetail->appointment_details) ?></td>
                                                    <td><?= h($c) ?></td>
                                                    <td>ONLINE</td>
                                                    <td>2100</td>
                                                   
                                                    <td><?= h($a) ?></td>
                                                    <td class="actions">
                                                        <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Edit') . '</span>', ['controller' => 'Bookings', 'action' => 'editbooking',$book_id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>

                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>

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