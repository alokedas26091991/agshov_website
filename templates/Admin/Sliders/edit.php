<div class="main-content">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h3 class="font-weight-bold text-dark mb-1">Edit Slider Status</h3>
            <p class="text-muted small mb-0">Update status details for this banner or slider.</p>
        </div>
        <div class="col-auto">
            <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
    </div>

    <div class="card card-modern border-0 shadow-sm">
        <div class="card-body p-4">
            <?= $this->Form->create($slider, ['type' => 'file', 'class' => 'form-horizontal']); ?>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Status Note</label>
                <div class="col-md-9">
                    <?= $this->Form->control('status', ['type' => 'textarea', 'rows' => 3, 'class' => 'form-control rounded-3', 'placeholder' => 'Enter status remarks or note', 'label' => false]); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 offset-md-3">
                    <?= $this->Form->button('<i class="fa-solid fa-check me-1"></i> Update Status', ['class' => 'btn btn-primary rounded-pill px-4', 'escapeTitle' => false]) ?>
                    <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-light rounded-pill px-4 ms-2">Cancel</a>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>