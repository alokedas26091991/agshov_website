<div class="row mb-4 align-items-center">
    <div class="col">
        <h3 class="font-weight-bold text-dark mb-1">Customer Enquiries & Career Applications</h3>
        <p class="text-muted small mb-0">View product inquiry submissions and career job applications.</p>
    </div>
</div>

<!-- Navigation Tabs -->
<ul class="nav nav-tabs nav-tabs-modern mb-3 border-bottom-0">
    <li class="nav-item">
        <a href="<?= $this->Url->build(['action' => 'index', '?' => ['tab' => 'product']]) ?>" class="nav-link px-4 py-2 font-weight-bold <?= $tab === 'product' ? 'active bg-white border-bottom-0 shadow-sm text-primary' : 'text-secondary' ?>" style="border-radius: 10px 10px 0 0;">
            <i class="fa-solid fa-boxes-stacked me-2"></i> Product Enquiries
            <span class="badge <?= $tab === 'product' ? 'bg-primary text-white' : 'bg-secondary text-white' ?> rounded-pill ms-2"><?= number_format($productCount) ?></span>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= $this->Url->build(['action' => 'index', '?' => ['tab' => 'career']]) ?>" class="nav-link px-4 py-2 font-weight-bold <?= $tab === 'career' ? 'active bg-white border-bottom-0 shadow-sm text-success' : 'text-secondary' ?>" style="border-radius: 10px 10px 0 0;">
            <i class="fa-solid fa-user-graduate me-2"></i> Career Applications
            <span class="badge <?= $tab === 'career' ? 'bg-success text-white' : 'bg-secondary text-white' ?> rounded-pill ms-2"><?= number_format($careerCount) ?></span>
        </a>
    </li>
</ul>

<div class="card card-modern border-0 shadow-sm" style="border-top-left-radius: 0;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle table-modern mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th><?= $tab === 'career' ? 'Application Date' : 'Enquiry Date' ?></th>
                        <th><?= $tab === 'career' ? 'Position Applied' : 'Product' ?></th>
                        <th><?= $tab === 'career' ? 'Applicant Name' : 'Customer Name' ?></th>
                        <th>Contact Info</th>
                        <th><?= $tab === 'career' ? 'Brief / Details' : 'Message' ?></th>
                        <th class="text-end" style="width: 100px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($enquiries) && count($enquiries) > 0): ?>
                        <?php $serialNumber = $this->Paginator->counter('{{start}}'); foreach ($enquiries as $enquiry): ?>
                            <tr>
                                <td class="font-weight-bold text-muted"><?= $serialNumber++ ?></td>
                                <td>
                                    <span class="text-muted small">
                                        <?= $enquiry->created_at ? date("d M Y", strtotime((string)$enquiry->created_at)) : '-' ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if (!empty($enquiry->productname)): ?>
                                        <span class="badge <?= $tab === 'career' ? 'bg-success bg-opacity-10 text-success' : 'bg-primary bg-opacity-10 text-primary' ?> font-weight-bold px-3 py-1 mb-1 d-inline-block">
                                            <i class="fa-solid <?= $tab === 'career' ? 'fa-briefcase' : 'fa-box' ?> me-1"></i> <?= h(str_replace('Career: ', '', $enquiry->productname)) ?>
                                        </span>
                                        <?php if (!empty($enquiry->variant)): ?>
                                            <div class="mt-1">
                                                <span class="badge bg-info bg-opacity-10 text-info font-weight-bold px-2 py-1 small">
                                                    <i class="fa-solid fa-tag me-1"></i> <?= h($enquiry->variant) ?>
                                                </span>
                                            </div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary px-3 py-1"><?= $tab === 'career' ? 'General Career' : 'General Enquiry' ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <strong class="text-dark d-block"><?= h($enquiry->name) ?></strong>
                                </td>
                                <td>
                                    <div class="small">
                                        <div class="text-dark"><i class="fa-regular fa-envelope me-1 text-muted"></i> <?= h($enquiry->email) ?></div>
                                        <?php if (!empty($enquiry->phone)): ?>
                                            <div class="text-muted"><i class="fa-solid fa-phone me-1"></i> <?= h($enquiry->phone) ?></div>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-dark small mb-0" style="max-width: 320px; white-space: normal;">
                                        <?= h($enquiry->message) ?>
                                    </p>
                                </td>
                                <td class="text-end">
                                    <?= $this->Form->postLink('<i class="fa-solid fa-trash"></i>', ['action' => 'delete', $enquiry->id], ['confirm' => __('Are you sure you want to delete this ' . ($tab === 'career' ? 'career application' : 'enquiry') . '?'), 'escape' => false, 'class' => 'btn btn-sm btn-outline-danger rounded-circle', 'title' => __('Delete')]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fa-solid <?= $tab === 'career' ? 'fa-user-graduate' : 'fa-inbox' ?> fa-2x mb-3 d-block opacity-50"></i>
                                No <?= $tab === 'career' ? 'career applications' : 'product enquiries' ?> found.
                            </td>
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