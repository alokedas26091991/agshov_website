<div class="row mb-4 align-items-center">
    <div class="col">
        <h3 class="font-weight-bold text-dark mb-1">Product Categories</h3>
        <p class="text-muted small mb-0">Manage main product categories, menu positions, and display order.</p>
    </div>
    <div class="col-auto">
        <a href="<?= $this->Url->build(['action' => 'add']) ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-1"></i> Add Category
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
                        <th>Category Name</th>
                        <th>Display Order</th>
                        <th>In Menu</th>
                        <th>Status</th>
                        <th class="text-end" style="width: 220px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($categories) && count($categories) > 0): ?>
                        <?php $k = 1; foreach ($categories as $category): ?>
                            <tr>
                                <td class="font-weight-bold text-muted"><?= $k++ ?></td>
                                <td>
                                    <strong class="text-dark d-block"><?= h($category->name) ?></strong>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark font-weight-bold border px-3 py-1"><?= h($category->menu_order ?? 0) ?></span>
                                </td>
                                <td>
                                    <?php if ($category->is_menu == 1): ?>
                                        <span class="badge badge-info bg-info bg-opacity-10 text-info font-weight-bold px-3 py-1 rounded-pill"><i class="fa-solid fa-check me-1"></i> Yes</span>
                                    <?php else: ?>
                                        <span class="badge badge-secondary bg-secondary bg-opacity-10 text-secondary font-weight-bold px-3 py-1 rounded-pill">No</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($category->is_active == 1): ?>
                                        <span class="badge badge-success bg-success text-white px-3 py-1 rounded-pill">Active</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger bg-danger text-white px-3 py-1 rounded-pill">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <?= $this->Html->link('<i class="fa-solid fa-globe me-1"></i> SEO', ['action' => 'seodata', $category->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-info rounded-pill px-2 me-1', 'title' => __('SEO Data')]) ?>
                                    <?= $this->Html->link('<i class="fa-solid fa-pen-to-square me-1"></i> Edit', ['action' => 'edit', $category->id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-primary rounded-pill px-2 me-1']) ?>
                                    <?= $this->Form->postLink('<i class="fa-solid fa-power-off me-1"></i> Toggle', ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to change status of this category?'), 'escape' => false, 'class' => 'btn btn-sm btn-outline-secondary rounded-pill px-2']) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No categories found.</td>
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