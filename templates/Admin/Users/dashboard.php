<?php
/**
 * Admin Dashboard View
 */
?>

<!-- Admin Welcome Banner -->
<div class="admin-hero-banner d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
    <div>
        <div class="d-inline-flex align-items-center gap-2 px-3 py-1 bg-white bg-opacity-20 rounded-pill mb-2 small text-white font-weight-bold">
            <i class="fa-solid fa-certificate"></i> Sri Gopinath Food Product Admin
        </div>
        <h2 class="font-weight-bold mb-1 text-white">Welcome back, <?= h($this->request->getSession()->read('Auth.User.name') ?: 'Administrator') ?>!</h2>
        <p class="mb-0 text-white-50">Overview of products, customer enquiries, sales performance, and site status.</p>
    </div>
    <div class="d-flex gap-2 flex-wrap">
        <a href="/admin/products/add" class="btn btn-light text-primary font-weight-bold rounded-pill px-4">
            <i class="fa-solid fa-plus me-1"></i> Add New Product
        </a>
        <a href="/admin/enquiries" class="btn btn-outline-light rounded-pill px-4">
            <i class="fa-solid fa-envelope me-1"></i> View Enquiries
        </a>
    </div>
</div>

<!-- Primary Key Metrics Grid -->
<div class="row g-4 mb-4">
    <!-- Active Products -->
    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
        <div class="stat-card-pro d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted small font-weight-bold text-uppercase d-block mb-1">Total Products</span>
                <h3 class="font-weight-bold text-dark mb-0"><?= number_format((float)($total_products ?? 0)) ?></h3>
                <a href="/admin/products" class="small text-primary font-weight-bold mt-2 d-inline-block">Manage Products <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>
            <div class="stat-icon-wrapper bg-icon-primary">
                <i class="fa-solid fa-box"></i>
            </div>
        </div>
    </div>

    <!-- Customer Enquiries -->
    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
        <div class="stat-card-pro d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted small font-weight-bold text-uppercase d-block mb-1">Customer Enquiries</span>
                <h3 class="font-weight-bold text-dark mb-0"><?= number_format((float)($total_enquiries ?? 0)) ?></h3>
                <a href="/admin/enquiries" class="small text-warning font-weight-bold mt-2 d-inline-block">View Enquiries <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>
            <div class="stat-icon-wrapper bg-icon-warning">
                <i class="fa-solid fa-envelope-open-text"></i>
            </div>
        </div>
    </div>

    <!-- Total Customers -->
    <div class="col-xl-3 col-lg-6 col-md-6 mb-3">
        <div class="stat-card-pro d-flex align-items-center justify-content-between">
            <div>
                <span class="text-muted small font-weight-bold text-uppercase d-block mb-1">Registered Users</span>
                <h3 class="font-weight-bold text-dark mb-0"><?= number_format((float)($total_users ?? 0)) ?></h3>
                <a href="/admin/users" class="small text-success font-weight-bold mt-2 d-inline-block">Manage Users <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>
            <div class="stat-icon-wrapper bg-icon-success">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>
    </div>

    <!-- Total New Orders -->
    <!--<div class="col-xl-3 col-lg-6 col-md-6 mb-3">-->
    <!--    <div class="stat-card-pro d-flex align-items-center justify-content-between">-->
    <!--        <div>-->
    <!--            <span class="text-muted small font-weight-bold text-uppercase d-block mb-1">New Orders</span>-->
    <!--            <h3 class="font-weight-bold text-dark mb-0"><?= number_format((float)($total_new_order ?? 0)) ?></h3>-->
    <!--            <a href="/admin/invoices" class="small text-info font-weight-bold mt-2 d-inline-block">View Orders <i class="fa-solid fa-arrow-right ms-1"></i></a>-->
    <!--        </div>-->
    <!--        <div class="stat-icon-wrapper bg-icon-purple">-->
    <!--            <i class="fa-solid fa-cart-shopping"></i>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
</div>

<!-- Secondary Stats Row -->
<div class="row g-4 mb-4">
    <div class="col-md-4 mb-3">
        <div class="card-modern p-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <div class="p-2 rounded bg-success bg-opacity-10 text-success me-2">
                    <i class="fa-solid fa-circle-check fs-4"></i>
                </div>
                <div>
                    <h6 class="mb-0 text-muted small">Completed Orders</h6>
                    <strong class="fs-5 text-dark"><?= number_format((float)($order_completed ?? 0)) ?></strong>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card-modern p-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <div class="p-2 rounded bg-warning bg-opacity-10 text-warning me-2">
                    <i class="fa-solid fa-star fs-4"></i>
                </div>
                <div>
                    <h6 class="mb-0 text-muted small">Active Customer Reviews</h6>
                    <strong class="fs-5 text-dark"><?= number_format((float)($total_review ?? 0)) ?></strong>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card-modern p-3 d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <div class="p-2 rounded bg-danger bg-opacity-10 text-danger me-2">
                    <i class="fa-solid fa-triangle-exclamation fs-4"></i>
                </div>
                <div>
                    <h6 class="mb-0 text-muted small">Out of Stock Items</h6>
                    <strong class="fs-5 text-dark"><?= number_format((float)($total_outofstock ?? 0)) ?></strong>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Section: Recent Enquiries & Recent Products -->
<div class="row g-4">
    <!-- Recent Enquiries -->
    <div class="col-xl-7 col-lg-12 mb-4">
        <div class="card-modern p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="font-weight-bold text-dark mb-0 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-paper-plane text-primary me-2"></i>
                    Recent Product Enquiries
                </h5>
                <a href="/admin/enquiries" class="btn btn-sm btn-light rounded-pill px-3">View All</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle table-modern mb-0">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Contact</th>
                            <th>Requested Product</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($recent_enquiries) && count($recent_enquiries) > 0): ?>
                            <?php foreach ($recent_enquiries as $enq): ?>
                                <tr>
                                    <td>
                                        <strong class="text-dark d-block"><?= h($enq->name) ?></strong>
                                    </td>
                                    <td>
                                        <span class="small d-block text-dark"><?= h($enq->phone) ?></span>
                                        <span class="small text-muted"><?= h($enq->email) ?></span>
                                    </td>
                                    <td>
                                        <span class="badge badge-primary bg-primary bg-opacity-10 text-primary font-weight-bold px-2 py-1">
                                            <?= h($enq->productname ?: 'General') ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="small text-muted"><?= $enq->created_at ? h($enq->created_at->format('M d, Y')) : '-' ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No recent enquiries found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Products -->
    <div class="col-xl-5 col-lg-12 mb-4">
        <div class="card-modern p-4 h-100">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="font-weight-bold text-dark mb-0 d-flex align-items-center gap-2">
                    <i class="fa-solid fa-boxes-stacked text-success me-2"></i>
                    Latest Products
                </h5>
                <a href="/admin/products" class="btn btn-sm btn-light rounded-pill px-3">Manage</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle table-modern mb-0">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Distributor</th>
                            <th>Retail / MRP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($recent_products) && count($recent_products) > 0): ?>
                            <?php foreach ($recent_products as $p): ?>
                                <tr>
                                    <td>
                                        <a href="/admin/products/edit/<?= $p->id ?>" class="font-weight-bold text-dark text-decoration-none">
                                            <?= h($p->name) ?>
                                        </a>
                                    </td>
                                    <td>
                                        <strong class="text-primary">&#8377;<?= number_format((float)($p->offer_price ?? 0), 2) ?></strong>
                                    </td>
                                    <td>
                                        <span class="small text-dark">&#8377;<?= number_format((float)($p->actual_price ?? 0), 2) ?></span>
                                        <?php if (!empty($p->mrp)): ?>
                                            <span class="small text-danger ms-1">&#8377;<?= number_format((float)$p->mrp, 2) ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center py-4 text-muted">No products available.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>