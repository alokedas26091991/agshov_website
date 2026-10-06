<div class="main-content">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h3 class="font-weight-bold text-dark mb-1"><i class="fa-solid fa-pen-to-square text-warning me-2"></i>Edit SEO Page</h3>
            <p class="text-muted small mb-0">Update SEO page meta titles, descriptions, and custom content.</p>
        </div>
        <div class="col-auto">
            <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
    </div>

    <div class="card card-modern border-0 shadow-sm">
        <div class="card-body p-4 p-md-5">
            <?= $this->Form->create($seoPage, ['class' => 'form-horizontal']); ?>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-secondary text-uppercase small">Page Name <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <?= $this->Form->control('name', ['class' => 'form-control rounded-3 py-2', 'label' => false, 'required' => true, 'placeholder' => 'Page Name']); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-start">
                <label class="col-md-3 col-form-label font-weight-bold text-secondary text-uppercase small pt-2">Slug / URL Path</label>
                <div class="col-md-9">
                    <?= $this->Form->control('slug', ['class' => 'form-control rounded-3 py-2', 'label' => false, 'placeholder' => 'slug-path']); ?>
                    <div class="form-text text-muted mt-1 small">
                        <i class="fa-solid fa-link me-1"></i> Page URL: <code class="text-primary"><?= $this->Url->build('/', ['fullBase' => true]) ?><?= h(ltrim($seoPage->slug, '/')) ?></code>
                    </div>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-secondary text-uppercase small">Meta Title</label>
                <div class="col-md-9">
                    <?= $this->Form->control('meta_title', ['class' => 'form-control rounded-3 py-2', 'label' => false, 'placeholder' => 'Enter SEO Title...']); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-start">
                <label class="col-md-3 col-form-label font-weight-bold text-secondary text-uppercase small pt-2">Meta Keywords</label>
                <div class="col-md-9">
                    <?= $this->Form->control('meta_keywords', ['type' => 'textarea', 'rows' => 3, 'class' => 'form-control rounded-3', 'label' => false, 'placeholder' => 'Comma separated keywords...']); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-start">
                <label class="col-md-3 col-form-label font-weight-bold text-secondary text-uppercase small pt-2">Meta Description</label>
                <div class="col-md-9">
                    <?= $this->Form->control('meta_desc', ['type' => 'textarea', 'rows' => 3, 'class' => 'form-control rounded-3', 'label' => false, 'placeholder' => 'Brief SEO description...']); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-start">
                <label class="col-md-3 col-form-label font-weight-bold text-secondary text-uppercase small pt-2">Page Content / Details</label>
                <div class="col-md-9">
                    <?= $this->Form->control('content', ['type' => 'textarea', 'rows' => 6, 'class' => 'form-control rounded-3 ckeditor', 'label' => false, 'placeholder' => 'Custom page HTML content...']); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-secondary text-uppercase small">Robots Tag</label>
                <div class="col-md-9">
                    <?= $this->Form->control('robots', ['class' => 'form-control rounded-3 py-2', 'label' => false, 'placeholder' => 'index, follow']); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-secondary text-uppercase small">Canonical URL</label>
                <div class="col-md-9">
                    <?= $this->Form->control('canonical', ['class' => 'form-control rounded-3 py-2', 'label' => false, 'placeholder' => 'https://example.com/your-slug']); ?>
                </div>
            </div>

            <div class="row mt-5 pt-3 border-top">
                <div class="col-md-9 offset-md-3">
                    <?= $this->Form->button('<i class="fa-solid fa-floppy-disk me-2"></i> Update SEO Page', ['class' => 'btn btn-primary rounded-pill px-4 py-2 font-weight-bold', 'escapeTitle' => false]) ?>
                    <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-light rounded-pill px-4 py-2 ms-2">Cancel</a>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<?php $this->Html->script(['/admin_template/ckeditor/ckeditor'], ['block' => 'scriptBottom']) ?>
