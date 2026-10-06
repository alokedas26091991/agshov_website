<div class="col-lg-12 grid-margin stretch-card">
    <div class="card card-modern shadow-sm border-0">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="card-title font-weight-bold text-dark mb-0">SEO Page Details: <?= h($seoPage->name) ?></h4>
                <div>
                    <?= $this->Html->link('<i class="fa fa-edit me-1"></i> Edit', ['action' => 'edit', $seoPage->id], ['escape' => false, 'class' => 'btn btn-warning btn-sm rounded-pill me-2']) ?>
                    <?= $this->Html->link('<i class="fa fa-arrow-left me-1"></i> Back to List', ['action' => 'index'], ['escape' => false, 'class' => 'btn btn-outline-secondary btn-sm rounded-pill']) ?>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th style="width: 200px;">ID</th>
                            <td><?= h($seoPage->id) ?></td>
                        </tr>
                        <tr>
                            <th>Page Name</th>
                            <td class="fw-bold text-dark"><?= h($seoPage->name) ?></td>
                        </tr>
                        <tr>
                            <th>Slug / URL Path</th>
                            <td>
                                <code><?= h($seoPage->slug) ?></code>
                                <a href="/<?= h($seoPage->slug) ?>" target="_blank" class="ms-2 btn btn-xs btn-outline-primary py-0">View Page <i class="fa fa-external-link"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th>Meta Title</th>
                            <td><?= h($seoPage->meta_title ?: '-') ?></td>
                        </tr>
                        <tr>
                            <th>Meta Keywords</th>
                            <td><?= h($seoPage->meta_keywords ?: '-') ?></td>
                        </tr>
                        <tr>
                            <th>Meta Description</th>
                            <td><?= h($seoPage->meta_desc ?: '-') ?></td>
                        </tr>
                        <tr>
                            <th>Robots</th>
                            <td><span class="badge bg-secondary"><?= h($seoPage->robots ?: 'index, follow') ?></span></td>
                        </tr>
                        <tr>
                            <th>Canonical URL</th>
                            <td><?= h($seoPage->canonical ?: '-') ?></td>
                        </tr>
                        <tr>
                            <th>Content</th>
                            <td><?= $seoPage->content ? nl2br($seoPage->content) : '<span class="text-muted">No custom content added.</span>' ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
