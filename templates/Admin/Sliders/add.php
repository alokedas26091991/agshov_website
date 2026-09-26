<div class="main-content">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h3 class="font-weight-bold text-dark mb-1">Add Homepage Banner / Slider</h3>
            <p class="text-muted small mb-0">Upload new promotional banners for website sliders and displays.</p>
        </div>
        <div class="col-auto">
            <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
    </div>

    <div class="card card-modern border-0 shadow-sm">
        <div class="card-body p-4">
            <?= $this->Form->create($slider, ['type' => 'file', 'class' => 'form-horizontal', 'id' => 'myForm'], ['enctype' => 'multipart/form-data']); ?>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Image Type</label>
                <div class="col-md-9">
                    <?php 
                    $image_type = [
                        '1' => 'Website Slider',
                        '2' => 'Vendor Slider',
                        '3' => 'Image Store'
                    ];
                    echo $this->Form->select('image_type', $image_type, ['class' => 'form-control form-select rounded-3', 'empty' => 'Select Image Type', 'label' => false]);
                    ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Banner Name</label>
                <div class="col-md-9">
                    <?= $this->Form->control('name', ['class' => 'form-control rounded-3', 'placeholder' => 'Enter slider/banner title', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Upload Image</label>
                <div class="col-md-9">
                    <?= $this->Form->control('image_link1', ['type' => 'file', 'class' => 'form-control rounded-3', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Target Link URL</label>
                <div class="col-md-9">
                    <?= $this->Form->control('cta_link', ['type' => 'text', 'class' => 'form-control rounded-3', 'placeholder' => 'https://example.com/product/link', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Caption</label>
                <div class="col-md-9">
                    <?= $this->Form->control('caption', ['class' => 'form-control rounded-3', 'placeholder' => 'Enter slide text caption', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Sort Order</label>
                <div class="col-md-9">
                    <?= $this->Form->control('sort_order', ['class' => 'form-control rounded-3', 'placeholder' => 'e.g. 1, 2, 3', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Valid From</label>
                <div class="col-md-9">
                    <?= $this->Form->date('valid_from', ['class' => 'form-control rounded-3', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Valid To</label>
                <div class="col-md-9">
                    <?= $this->Form->date('valid_to', ['class' => 'form-control rounded-3', 'label' => false]); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 offset-md-3">
                    <?= $this->Form->button('<i class="fa-solid fa-check me-1"></i> Save Slider Banner', ['class' => 'btn btn-primary rounded-pill px-4', 'escapeTitle' => false]) ?>
                    <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-light rounded-pill px-4 ms-2">Cancel</a>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>