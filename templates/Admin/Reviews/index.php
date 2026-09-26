<div class="row mb-4 align-items-center">
    <div class="col">
        <h3 class="font-weight-bold text-dark mb-1">Customer Reviews</h3>
        <p class="text-muted small mb-0">Browse and manage product feedback and star ratings submitted by customers.</p>
    </div>
</div>

<div class="card card-modern border-0 shadow-sm">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle table-modern mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th>Product Name</th>
                        <th>Customer</th>
                        <th>Review Date</th>
                        <th>Rating</th>
                        <th>Customer Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($reviews) && count($reviews) > 0): ?>
                        <?php $k = 1; foreach ($reviews as $review): ?>
                            <tr>
                                <td class="font-weight-bold text-muted"><?= $k++ ?></td>
                                <td>
                                    <span class="badge badge-primary bg-primary bg-opacity-10 text-primary font-weight-bold px-3 py-1">
                                        <i class="fa-solid fa-box me-1"></i> <?= h($review->product ? $review->product->name : '-') ?>
                                    </span>
                                </td>
                                <td>
                                    <strong class="text-dark d-block"><?= h($review->user ? $review->user->name : 'Anonymous') ?></strong>
                                </td>
                                <td>
                                    <span class="text-muted small"><?= $review->dt ? date("d M Y", strtotime($review->dt)) : '-' ?></span>
                                </td>
                                <td>
                                    <div class="text-warning small font-weight-bold">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <i class="<?= $i <= $review->rating ? 'fa-solid fa-star' : 'fa-regular fa-star text-muted opacity-50' ?>"></i>
                                        <?php endfor; ?>
                                        <span class="ms-1 text-dark">(<?= h($review->rating ?? 0) ?>/5)</span>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-dark small mb-0" style="max-width: 350px; white-space: normal;">
                                        <?= h($review->comment) ?>
                                    </p>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">No product reviews found.</td>
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
