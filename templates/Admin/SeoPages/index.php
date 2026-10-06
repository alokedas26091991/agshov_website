<div class="col-lg-12 grid-margin stretch-card">
    <div class="card card-modern shadow-sm border-0">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="card-title font-weight-bold text-dark mb-1">SEO Pages Management</h4>
                    <p class="text-muted small mb-0">Manage SEO pages, meta titles, descriptions, and custom page content.</p>
                </div>
                <div>
                    <?= $this->Html->link('<i class="fa fa-plus me-1"></i> Add SEO Page', ['action' => 'add'], ['escape' => false, 'class' => 'btn btn-primary btn-sm rounded-pill px-3']) ?>
                </div>
            </div>

            <!-- Search Form -->
            <form method="get" action="" class="mb-4">
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control form-control-sm" placeholder="Search by Page Name, Slug, or Meta Title..." value="<?= h($search ?? '') ?>">
                            <button class="btn btn-sm btn-outline-secondary" type="submit"><i class="fa fa-search"></i> Search</button>
                            <?php if (!empty($search)) : ?>
                                <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-times"></i> Clear</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 50px;">#</th>
                            <th>Page Name</th>
                            <th>Slug / URL Path</th>
                            <th>Meta Title</th>
                            <th>Robots</th>
                            <th class="text-center" style="width: 160px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($seoPages) && count($seoPages) > 0) : ?>
                            <?php
                            $serialNumber = $this->Paginator->counter('{{start}}');
                            foreach ($seoPages as $item) : ?>
                                <tr>
                                    <td><?= $serialNumber++ ?></td>
                                    <td class="fw-semibold text-dark"><?= h($item->name) ?></td>
                                    <td>
                                        <a href="/<?= h($item->slug) ?>" target="_blank" class="text-primary text-decoration-none small">
                                            /<span class="fw-bold"><?= h($item->slug) ?></span> <i class="fa fa-external-link text-muted ms-1" style="font-size:10px;"></i>
                                        </a>
                                    </td>
                                    <td class="small text-muted" style="max-width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= h($item->meta_title ?: '-') ?></td>
                                    <td><span class="badge bg-secondary small"><?= h($item->robots ?: 'index, follow') ?></span></td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $item->id], ['escape' => false, 'class' => 'btn btn-outline-info', 'title' => __('View Details')]) ?>
                                            <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $item->id], ['escape' => false, 'class' => 'btn btn-outline-warning', 'title' => __('Edit Page')]) ?>
                                            <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete this SEO page?'), 'escape' => false, 'class' => 'btn btn-outline-danger', 'title' => __('Delete')]) ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No SEO pages found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <nav aria-label="Page navigation" class="mt-4">
                <div class="paginator d-flex flex-column align-items-center">
                    <ul class="pagination pagination-sm mb-2">
                        <?= $this->Paginator->first('<< ' . __('First')) ?>
                        <?= $this->Paginator->prev('< ' . __('Previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('Next') . ' >') ?>
                        <?= $this->Paginator->last(__('Last') . ' >>') ?>
                    </ul>
                    <p class="small text-muted mb-0"><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
                </div>
            </nav>
        </div>
    </div>
</div>
