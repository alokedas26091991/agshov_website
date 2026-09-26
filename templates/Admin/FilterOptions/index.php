<div class="row mb-4 align-items-center">
    <div class="col">
        <h3 class="font-weight-bold text-dark mb-1">Variant Options</h3>
        <p class="text-muted small mb-0">Manage variant option choices across product filter categories.</p>
    </div>
    <div class="col-auto">
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-1"></i> Add Variant Option
        </a>
    </div>
</div>

<div class="card card-modern border-0 shadow-sm">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle table-modern mb-0">
                <thead>
                    <tr>
                        <th style="width: 60px;">#</th>
                        <th>Variant Name</th>
                        <th>Caption</th>
                        <th>Option Name</th>
                        <th>Status</th>
                        <th class="text-end" style="width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($filterOptions) && count($filterOptions) > 0): ?>
                        <?php $i = 1; foreach ($filterOptions as $filterOption): ?>
                            <tr>
                                <td class="font-weight-bold text-muted"><?= $i++ ?></td>
                                <td>
                                    <strong class="text-dark d-block"><?= h($filterOption->filter ? $filterOption->filter->name : '-') ?></strong>
                                </td>
                                <td>
                                    <span class="text-muted small"><?= h($filterOption->filter ? $filterOption->filter->caption : '-') ?></span>
                                </td>
                                <td>
                                    <span class="font-weight-bold text-dark"><?= h($filterOption->name) ?></span>
                                </td>
                                <td>
                                    <?php if ($filterOption->is_active == 1): ?>
                                        <span class="badge badge-success bg-success text-white px-3 py-1 rounded-pill">Active</span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary bg-secondary text-white px-3 py-1 rounded-pill">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <?= $this->Html->link('<i class="fa-solid fa-pen-to-square me-1"></i> Edit', ['action' => 'edit', $filterOption->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-primary rounded-pill px-3 me-1']) ?>
                                    <?= $this->Form->postLink('<i class="fa-solid fa-trash me-1"></i> Delete', ['action' => 'delete', $filterOption->id], ['confirm' => __('Are you sure you want to delete this variant option?'), 'escape' => false, 'class' => 'btn btn-sm btn-outline-danger rounded-pill px-3']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No variant options found.</td>
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