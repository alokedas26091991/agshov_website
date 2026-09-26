<div class="main-content">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h3 class="font-weight-bold text-dark mb-1">Add System User</h3>
            <p class="text-muted small mb-0">Create a new administrator or staff account.</p>
        </div>
        <div class="col-auto">
            <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
    </div>

    <div class="card card-modern border-0 shadow-sm">
        <div class="card-body p-4">
            <?= $this->Form->create($user, ['type' => 'file', 'class' => 'form-horizontal'], ['enctype' => 'multipart/form-data']); ?>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Full Name</label>
                <div class="col-md-9">
                    <?= $this->Form->control('name', ['class' => 'form-control rounded-3', 'placeholder' => 'Enter full name', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Email Address</label>
                <div class="col-md-9">
                    <?= $this->Form->control('email', ['class' => 'form-control rounded-3', 'placeholder' => 'Enter email address', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Phone Number</label>
                <div class="col-md-9">
                    <?= $this->Form->control('phone_no', ['class' => 'form-control rounded-3', 'placeholder' => 'Enter mobile number', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Password</label>
                <div class="col-md-9">
                    <?= $this->Form->control('password', ['type' => 'password', 'class' => 'form-control rounded-3', 'placeholder' => 'Enter account password', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">User Type</label>
                <div class="col-md-9">
                    <?= $this->Form->control('user_type', [
                        'options' => [1 => 'Admin', 2 => 'Staff'],
                        'class' => 'form-control form-select rounded-3',
                        'label' => false
                    ]); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 offset-md-3">
                    <?= $this->Form->button('<i class="fa-solid fa-check me-1"></i> Save User', ['class' => 'btn btn-primary rounded-pill px-4', 'escapeTitle' => false]) ?>
                    <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn btn-light rounded-pill px-4 ms-2">Cancel</a>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>