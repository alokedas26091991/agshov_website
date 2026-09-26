<?= $this->Html->css(['/admin_template/css/grab.css'], ['pathPrefix' => '']); ?>
<style>
    .form-horizontal {
        margin-left: 23px;
    }

    .btn.btn-warning {
        background-color: #7043a4;
        border: none;
        margin-right: 23px;
        transition: .45s;
    }

    .btn.btn-warning:hover {
        background-color: green;
    }

    .overlay {
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        position: fixed;
        background: #222;
    }

    .overlay__inner {
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        position: absolute;
    }

    .overlay__content {
        left: 50%;
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    .spinner {
        width: 75px;
        height: 75px;
        display: inline-block;
        border-width: 2px;
        border-color: rgba(255, 255, 255, 0.05);
        border-top-color: #fff;
        animation: spin 1s infinite linear;
        border-radius: 100%;
        border-style: solid;
    }

    @keyframes spin {
        100% {
            transform: rotate(360deg);
        }
    }

    .tables {
        position: relative;
        overflow-x: auto;
    }

    .tables::after {
        content: "👉 Scroll to see more";
        position: absolute;
        right: 10px;
        bottom: 10px;
        font-size: 16px;
        color: #666;
        background-color: #fff;
        padding: 5px;
        border-radius: 3px;
        z-index: 10;
    }

    .tables::-webkit-scrollbar {
        height: 8px;
    }

    .tables::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 10px;
    }

    .tables::-webkit-scrollbar-thumb:hover {
        background: #555;
    }

    .search-form {
        display: flex;
        justify-content: space-evenly;
        align-items: center;
    }
</style>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Order List</h4>
            <div class="search-form">
                <?= $this->Form->create(null, ['type' => 'get', 'class' => 'form-inline']) ?>
                <div class="form-group">
                    <?= $this->Form->control('search', [
                        'label' => false,
                        'value' => $search ?? '',
                        'class' => 'form-control',
                        'placeholder' => 'Search by name or mobile',
                    ]) ?>
                </div>
                <button type="submit" class="btn btn-primary ml-2 mt-2"><?= __('Search') ?></button>
                <?= $this->Html->link(__('Clear'), ['action' => 'index'], ['class' => 'btn btn-secondary ml-2 mt-2']) ?>
                <?= $this->Form->end() ?>
                <div align="right"><button onclick="exportTableToExcel('sampleTable')" class="btn btn-warning">Export Orders To Excel File</button></div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="sampleTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order Date</th>
                            <!-- <th>Customer Type</th> -->
                            <th>Customer Name</th>
                            <th>Mobile No</th>
                            <th>Address</th>
                            <th>State</th>
                            <th>City</th>
                            <th>Pin</th>
                            <th>Invoice No</th>
                            <th>Payment Mode</th>
                            <th>Order ID</th>
                            <th>Total Invoice Amount</th>
                            <th>Order Status</th>
                            <th class="actions">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $k = 0;
                        foreach ($invoice1 as $inv):

                            $k++;
                        ?>
                            <tr>
                                <td><?= $k; ?></td>
                                <td><?php
                                    if ($inv->creation_date) {
                                    ?>
                                        <?= date("d-m-Y", strtotime($inv->creation_date)) ?>
                                    <?php
                                    }
                                    ?></td>
                                <td><?= h($inv->user->name) ?></td>
                                <td>
                                    <a href="https://wa.me/91<?= h($inv->user_delivery_detail->mobile) ?>?text=<?= urlencode('Thank you for purchasing our product!') ?>" target="_blank">
                                        <?= h($inv->user_delivery_detail->mobile) ?>
                                    </a>
                                </td>
                                <td><?= $inv->user_delivery_detail->home_address ?></td>
                                <td><?= $inv->user_delivery_detail->state ?></td>
                                <td><?= h($inv->user_delivery_detail->city) ?></td>
                                <td><?= h($inv->user_delivery_detail->pin) ?></td>
                                <td><?= h($inv->invoice_no) ?></td>
                                <td>
                                    <?php
                                    if ($inv->pay_mode == 2) {
                                        echo "Cash On Delivery";
                                    } else {
                                        echo "Online Payment";
                                    }
                                    ?>
                                </td>
                                <td><?= h($inv->order_id) ?></td>

                                <td><?= h($inv->net_amt + $inv->total_delivery_charge) ?></td>
                                <td>
                                    <?php
                                    if ($inv->order_status == 0) {
                                        echo "Processing";
                                    } else if ($inv->order_status == 1) {
                                        echo "Confirmed";
                                    } else if ($inv->order_status == 2) {
                                        echo "Completed";
                                    } else if ($inv->order_status == 4) {
                                        echo "In Transit";
                                    } else {
                                        echo "Cancelled";
                                    }
                                    ?>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link('<span class="fa fa-gavel"></span><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'orderstatus', $inv->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Edit')]) ?>
                                    <?= $this->Html->link('<span class="fa fa-edit"></span><span class="sr-only">' . __('Invoice Details') . '</span>', ['action' => 'invoicedetails', $inv->id], ['escape' => false, 'class' => 'btn-default', 'title' => __('Invoice Details')]) ?>
                                    <a href="<?= $this->Url->build(['controller' => 'Invoices', 'action' => 'invoicedownload', $inv->id]) ?>">Invoice Download</a>
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
<script type="text/javascript">
    function exportTableToExcel(sampleTable, filename = 'New Order List') {
        var table = document.getElementById(sampleTable);
        var rows = table.querySelectorAll('tr');
        var csvContent = '';

        // Iterate through table rows
        rows.forEach(row => {
            let cols = row.querySelectorAll('th, td');
            let rowData = [];

            // Exclude the last column (Actions column)
            cols.forEach((col, index) => {
                if (index < cols.length - 1) { // Skip the last column
                    let cellData = col.innerText.trim();
                    // Escape double quotes
                    cellData = `"${cellData.replace(/"/g, '""')}"`;
                    rowData.push(cellData);
                }
            });

            // Join row data with commas and add a newline
            csvContent += rowData.join(',') + '\n';
        });

        // Create a Blob with the CSV content
        var blob = new Blob([csvContent], {
            type: 'text/csv;charset=utf-8;'
        });
        var downloadLink = document.createElement('a');
        var url = URL.createObjectURL(blob);

        // Set download attributes
        downloadLink.href = url;
        downloadLink.download = filename + '.csv';
        downloadLink.style.display = 'none';

        // Append link, trigger download, and remove link
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
    }
</script>

<?= $this->Html->script(['/admin_template/js/grab.js'], ['block' => 'scriptBottom']); ?>