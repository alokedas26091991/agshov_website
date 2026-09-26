<div class="main-content">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h3 class="font-weight-bold text-dark mb-1">Edit Product Category</h3>
            <p class="text-muted small mb-0">Update category details and menu visibility settings.</p>
        </div>
        <div class="col-auto">
            <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
    </div>

    <div class="card card-modern border-0 shadow-sm">
        <div class="card-body p-4">
            <?= $this->Form->create($category, ['type' => 'file', 'class' => 'form-horizontal'], ['enctype' => 'multipart/form-data']); ?>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Category Name</label>
                <div class="col-md-9">
                    <?= $this->Form->control('name', ['class' => 'form-control rounded-3', 'placeholder' => 'Enter category name', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Display Order</label>
                <div class="col-md-9">
                    <?= $this->Form->control('menu_order', ['class' => 'form-control rounded-3', 'placeholder' => 'e.g. 1, 2, 3', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Show in Top Menu</label>
                <div class="col-md-9 d-flex align-items-center">
                    <div class="form-check form-switch mb-0">
                        <?= $this->Form->checkbox('is_menu', ['type' => 'checkbox', 'class' => 'form-check-input', 'id' => 'isMenuCheck']); ?>
                        <label class="form-check-label ms-2 font-weight-bold text-dark" for="isMenuCheck">Show in Navigation Menu</label>
                    </div>
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
                    <?= $this->Form->button('<i class="fa-solid fa-check me-1"></i> Update Category', ['class' => 'btn btn-primary rounded-pill px-4', 'escapeTitle' => false]) ?>
                    <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-light rounded-pill px-4 ms-2">Cancel</a>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>