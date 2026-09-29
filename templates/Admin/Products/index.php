<?= $this->Html->css(['/admin_template/css/grab.css'], ['pathPrefix' => '']); ?>

<div class="row mb-4 align-items-center">
    <div class="col">
        <h3 class="font-weight-bold text-dark mb-1">Product Inventory</h3>
        <p class="text-muted small mb-0">Browse, search, and manage all product listings, prices, and stock.</p>
    </div>
    <div class="col-auto">
        <a href="<?= $this->Url->build('/admin/products/add') ?>" class="btn btn-primary rounded-pill px-4">
            <i class="fa-solid fa-plus me-1"></i> Add Product
        </a>
    </div>
</div>

<div class="card card-modern border-0 shadow-sm mb-4" ng-app="product" ng-controller="productCrt">
    <div class="card-body p-4">
        <div class="mb-4">
            <?= $this->element('search'); ?>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle table-modern mb-0">
                <thead>
                    <tr>
                        <th style="width: 50px;">#</th>
                        <th style="width: 70px;">Image</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Subcategory</th>
                        <th>Stock</th>
                        <th>MRP</th>
                        <th>Sale Price</th>
                        <th>GST</th>
                        <th>SKU</th>
                        <th>Status</th>
                        <th class="text-end" style="width: 240px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($products) && count($products) > 0): ?>
                        <?php $k = 1; foreach ($products as $product): ?>
                            <tr>
                                <td class="font-weight-bold text-muted"><?= $k++ ?></td>
                                <td>
                                    <?php if (!empty($product->product->photo)): ?>
                                        <a href="<?= UPLOAD_PRODUCT_IMAGE ?><?= h($product->product->photo) ?>" target="_blank">
                                            <img src="<?= UPLOAD_PRODUCT_IMAGE ?><?= h($product->product->photo) ?>" class="rounded-3 shadow-sm" style="width: 45px; height: 45px; object-fit: cover;" />
                                        </a>
                                    <?php else: ?>
                                        <span class="badge bg-light text-muted p-2 rounded-3"><i class="fa-solid fa-image"></i></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <strong class="text-dark d-block"><?= h($product->product ? $product->product->name : '-') ?></strong>
                                </td>
                                <td>
                                    <span class="badge badge-primary bg-primary bg-opacity-10 text-primary font-weight-bold px-2 py-1">
                                        <?= h($product->product && $product->product->category ? $product->product->category->name : '-') ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge badge-info bg-info bg-opacity-10 text-info font-weight-bold px-2 py-1">
                                        <?= h($product->product && $product->product->sub_category ? $product->product->sub_category->name : '-') ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="font-weight-bold text-dark"><?= h($product->total_quantity ?? 0) ?></span>
                                </td>
                                <td>₹<?= number_format((float)($product->mrp ?? $product->product->mrp ?? 0), 2) ?></td>
                                <td>₹<?= number_format((float)($product->offer_price ?? $product->actual_price ?? 0), 2) ?></td>
                                <td><?= h($product->product ? $product->product->gst_percentage : '0') ?>%</td>
                                <td><code class="text-dark"><?= h($product->product ? $product->product->supc : '-') ?></code></td>
                                <td>
                                    <?php if ($product->is_active == 1): ?>
                                        <span class="badge badge-success bg-success text-white px-3 py-1 rounded-pill">Active</span>
                                    <?php else: ?>
                                        <span class="badge badge-danger bg-danger text-white px-3 py-1 rounded-pill">Inactive</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <?= $this->Html->link('<i class="fa-solid fa-pen-to-square me-1"></i> Edit', ['action' => 'edit', $product->product_id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-primary rounded-pill px-2 me-1', 'title' => __('Edit Product')]) ?>
                                    <?php if ($product->product && $product->product->variant == 1): ?>
                                        <?= $this->Html->link('<i class="fa-solid fa-layer-group me-1"></i> Variants', ['action' => 'varientproduct', $product->product_id], ['escape' => false, 'class' => 'btn btn-sm btn-outline-info rounded-pill px-2 me-1', 'title' => __('Manage Variants')]) ?>
                                    <?php endif; ?>
                                    <?= $this->Form->postLink('<i class="fa-solid fa-trash me-1"></i> Delete', ['action' => 'delete', $product->id], ['confirm' => __('Are you sure you want to delete this product?'), 'escape' => false, 'class' => 'btn btn-sm btn-outline-danger rounded-pill px-2', 'title' => __('Delete Product')]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="12" class="text-center py-4 text-muted">No products found.</td>
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

<script>
	var ajxUrl = '<?= $this->Url->build("/admin/products"); ?>'
</script>
<?= $this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js', '/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min', '/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js', '/admin_template/js/angular/product', '/admin_template/js/grab.js'], ['block' => 'scriptBottom']); ?>