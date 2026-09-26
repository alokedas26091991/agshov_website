<div class="main-content">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h3 class="font-weight-bold text-dark mb-1">Edit Product Subcategory</h3>
            <p class="text-muted small mb-0">Update subcategory details and parent category association.</p>
        </div>
        <div class="col-auto">
            <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
    </div>

    <div class="card card-modern border-0 shadow-sm">
        <div class="card-body p-4">
            <?= $this->Form->create($subCategory, ['type' => 'file', 'class' => 'form-horizontal'], ['enctype' => 'multipart/form-data']); ?>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Parent Category</label>
                <div class="col-md-9">
                    <?= $this->Form->select('category_id', $categories, ['class' => 'form-control form-select rounded-3', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Subcategory Name</label>
                <div class="col-md-9">
                    <?= $this->Form->control('name', ['class' => 'form-control rounded-3', 'placeholder' => 'Enter subcategory name', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Status</label>
                <div class="col-md-9 d-flex align-items-center">
                    <div class="form-check form-switch mb-0">
                        <?= $this->Form->checkbox('is_active', ['type' => 'checkbox', 'class' => 'form-check-input', 'id' => 'isActiveCheck']); ?>
                        <label class="form-check-label ms-2 font-weight-bold text-dark" for="isActiveCheck">Active</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 offset-md-3">
                    <?= $this->Form->button('<i class="fa-solid fa-check me-1"></i> Update Subcategory', ['class' => 'btn btn-primary rounded-pill px-4', 'escapeTitle' => false]) ?>
                    <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-light rounded-pill px-4 ms-2">Cancel</a>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>