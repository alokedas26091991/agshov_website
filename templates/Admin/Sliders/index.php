<div class="row mb-4 align-items-center">
    <div class="col">
        <h3 class="font-weight-bold text-dark mb-1">Website Sliders & Banners</h3>
        <p class="text-muted small mb-0">Manage homepage hero slides, promotional banners, and image links.</p>
    </div>
    <div class="col-auto d-flex gap-2">
        <button onclick="exportTableToExcel('sampleTable')" class="btn btn-outline-success rounded-pill px-3 me-2">
            <i class="fa-solid fa-file-excel me-1"></i> Export to Excel
        </button>
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-1"></i> Add Slider Banner
        </a>
    </div>
</div>

<div class="card card-modern border-0 shadow-sm">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle table-modern mb-0" id="sampleTable">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Date</th>
                        <th>Banner Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>City / Pin</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th class="text-end" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($sliders) && count($sliders) > 0): ?>
                        <?php foreach ($sliders as $slider): ?>
                            <tr>
                                <td class="font-weight-bold text-muted"><?= $this->Number->format($slider->id) ?></td>
                                <td><span class="text-muted small"><?= h($slider->dt ?? '-') ?></span></td>
                                <td><strong class="text-dark d-block"><?= h($slider->name ?? '-') ?></strong></td>
                                <td><span class="text-dark"><?= h($slider->email ?? '-') ?></span></td>
                                <td><span class="text-muted small"><?= h($slider->phone ?? '-') ?></span></td>
                                <td><span class="text-muted small"><?= h($slider->address ?? '-') ?></span></td>
                                <td><span class="text-muted small"><?= h($slider->city ?? '-') ?> (<?= h($slider->pin ?? '-') ?>)</span></td>
                                <td><span class="badge badge-info bg-info bg-opacity-10 text-info px-2 py-1"><?= h($slider->service ?? '-') ?></span></td>
                                <td>
                                    <?php if ($slider->status == 'Active' || $slider->status == '1'): ?>
                                        <span class="badge badge-success bg-success text-white px-3 py-1 rounded-pill">Active</span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary bg-secondary text-white px-3 py-1 rounded-pill"><?= h($slider->status ?? 'Inactive') ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <?= $this->Html->link('<i class="fa-solid fa-pen-to-square"></i>', ['action' => 'edit', $slider->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-primary rounded-circle', 'title' => __('Edit')]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10" class="text-center py-4 text-muted">No sliders found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4 d-flex justify-content-between align-items-center flex-wrap">
            <div class="small text-muted mb-2 mb-md-0">
                <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
            </div>
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm mb-0">
                    <?= $this->Paginator->prev('« Previous', ['class' => 'page-item', 'linkClass' => 'page-link']) ?>
                    <?= $this->Paginator->numbers(['class' => 'page-item', 'linkClass' => 'page-link']) ?>
                    <?= $this->Paginator->next('Next »', ['class' => 'page-item', 'linkClass' => 'page-link']) ?>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script type="text/javascript">
function exportTableToExcel(sampleTable, filename = 'Sliders_Export'){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(sampleTable);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    filename = filename ? filename + '.xls' : 'excel_data.xls';
    downloadLink = document.createElement("a");
    document.body.appendChild(downloadLink);
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], { type: dataType });
        navigator.msSaveOrOpenBlob(blob, filename);
    } else {
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
        downloadLink.download = filename;
        downloadLink.click();
    }
}
</script>