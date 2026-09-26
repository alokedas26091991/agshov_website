<div class="row mb-4 align-items-center">
    <div class="col">
        <h3 class="font-weight-bold text-dark mb-1">Product Subcategories</h3>
        <p class="text-muted small mb-0">Manage subcategories under parent categories.</p>
    </div>
    <div class="col-auto">
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-1"></i> Add Subcategory
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
                        <th>Parent Category</th>
                        <th>Subcategory Name</th>
                        <th>Status</th>
                        <th class="text-end" style="width: 220px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($subCategories) && count($subCategories) > 0): ?>
                        <?php $k = 1; foreach ($subCategories as $subCategory): ?>
                            <tr>
                                <td class="font-weight-bold text-muted"><?= $k++ ?></td>
                                <td>
                                    <span class="badge badge-primary bg-primary bg-opacity-10 text-primary font-weight-bold px-3 py-1">
                                        <?= h($subCategory->category ? $subCategory->category->name : '-') ?>
                                    </span>
                                </td>
                                <td>
                                    <strong class="text-dark d-block"><?= h($subCategory->name) ?></strong>
                                </td>
                                <td>
                                    <?php if ($subCategory->is_active == 1): ?>
                                        <span class="badge badge-success bg-success text-white px-3 py-1 rounded-pill">Active</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger bg-danger text-white px-3 py-1 rounded-pill">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <?= $this->Html->link('<i class="fa-solid fa-globe me-1"></i> SEO', ['action' => 'seodata', $subCategory->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-info rounded-pill px-2 me-1', 'title' => __('SEO Data')]) ?>
                                    <?= $this->Html->link('<i class="fa-solid fa-pen-to-square me-1"></i> Edit', ['action' => 'edit', $subCategory->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-primary rounded-pill px-2 me-1']) ?>
                                    <?= $this->Form->postLink('<i class="fa-solid fa-power-off me-1"></i> Toggle', ['action' => 'delete', $subCategory->id], ['confirm' => __('Are you sure you want to change status of this subcategory?'), 'escape' => false, 'class' => 'btn btn-sm btn-outline-secondary rounded-pill px-2']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No subcategories found.</td>
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