<div class="main-content" ng-app="product" ng-controller="productCrt">
    <div class="row mb-4 align-items-center">
        <div class="col">
            <h3 class="font-weight-bold text-dark mb-1">Edit Variant Category</h3>
            <p class="text-muted small mb-0">Update category mapping for this variant.</p>
        </div>
        <div class="col-auto">
            <a href="/admin/filter-categories" class="btn btn-outline-secondary rounded-pill px-4">
                <i class="fa-solid fa-arrow-left me-1"></i> Back to List
            </a>
        </div>
    </div>

    <div class="card card-modern border-0 shadow-sm">
        <div class="card-body p-4">
            <?= $this->Form->create($filterCategory, ['class' => 'form-horizontal']); ?>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Variant Name</label>
                <div class="col-md-9">
                    <?= $this->Form->select('filter_id', $filters, ['class' => 'form-control form-select rounded-3', 'label' => false]); ?>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Category</label>
                <div class="col-md-9">
                    <select name="category_id" ng-model="category_id" ng-change="categorieslist()" class="form-control form-select rounded-3" convert-to-number>
                        <option ng-repeat="c in categories" value="{{c.id}}" ng-selected="c.id==category_id">{{c.name}}</option>
                    </select>
                </div>
            </div>

            <div class="row mb-4 align-items-center">
                <label class="col-md-3 col-form-label font-weight-bold text-dark">Sub Category</label>
                <div class="col-md-9">
                    <select name="sub_category_id" ng-change="typelist()" ng-model="sub_category_id" class="form-control form-select rounded-3" convert-to-number>
                        <option ng-repeat="c in subcategories" value="{{c.id}}" ng-selected="c.id==sub_category_id">{{c.name}}</option>
                    </select>
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
                    <?= $this->Form->button('<i class="fa-solid fa-check me-1"></i> Update Variant Category', ['class' => 'btn btn-primary rounded-pill px-4', 'escapeTitle' => false]) ?>
                    <a href="/admin/filter-categories" class="btn btn-light rounded-pill px-4 ms-2">Cancel</a>
                </div>
            </div>

            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?= $this->Html->css(['/admin_template/app-assets/vendors/css/wizard', '/admin_template/css/ngProgress']); ?>
<script>
    var ajxUrl = '<?= $this->Url->build("/seller/products"); ?>';
    var ajxPageUrl = '<?= $this->Url->build("/vendor/products"); ?>';
    var category_id = <?= (int)($filterCategory->category_id ?? 0) ?>;
    var sub_category_id = <?= (int)($filterCategory->sub_category_id ?? 0) ?>;
    var type_id = <?= (int)($filterCategory->type_id ?? 0) ?>;
    var categories = <?= json_encode($categories); ?>;
    var filter_categories = <?= json_encode($filterCategory); ?>;
</script>
<?= $this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js', '/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min', '/admin_template/js/angular/ngprogress.min', '/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js', '/admin_template/js/angular/option_category.js?v=3'], ['block' => 'scriptBottom']); ?>