<style>
.pd-action-group {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-top: 18px;
}
.btn-view-details-red {
    flex: 1;
    background: #e50914;
    color: #ffffff !important;
    font-size: 14px;
    font-weight: 700;
    padding: 12px 16px;
    border-radius: 12px;
    text-decoration: none !important;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    line-height: 1.2;
    border: none;
    transition: all 0.25s ease;
    box-shadow: 0 4px 12px rgba(229, 9, 20, 0.2);
}
.btn-view-details-red:hover {
    background: #c7000b;
    color: #ffffff !important;
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(229, 9, 20, 0.35);
}
.btn-quick-enquiry-circle {
    width: 58px;
    height: 58px;
    min-width: 58px;
    border-radius: 50%;
    border: 1.5px solid #1a73e8;
    background: #ffffff;
    color: #1a73e8;
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    font-size: 11px;
    font-weight: 600;
    line-height: 1.15;
    padding: 0;
    cursor: pointer;
    transition: all 0.25s ease;
    text-decoration: none;
    outline: none;
}
.btn-quick-enquiry-circle:hover {
    background: #1a73e8;
    color: #ffffff !important;
    border-color: #1a73e8;
    transform: scale(1.06);
    box-shadow: 0 4px 12px rgba(26, 115, 232, 0.3);
}
.product-card {
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    background: #fff;
    border: 1px solid rgba(0, 0, 0, 0.06);
}
.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
}
</style>

<div class="page-wrapper">

    <!-- Start Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="breadcrumb-item">
                <h1 class="breadcrumb-title">Our Products</h1>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-items"><a href="/"><i class="icon-house me-2"></i>Home</a></li>
                        <li class="breadcrumb-items"><span><i class="icon-chevron-right"></i></span></li>
                        <li class="breadcrumb-items active" aria-current="page">Our Products</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Product Collection Section -->
    <section class="collection-section section" id="products">

        <div class="container">

            <!-- Section Header -->
            <div class="section-header text-center wow fadeInUp" data-wow-duration="1.5s">

                <span class="badge badge-md bg-primary">
                    <i class="fa-solid fa-star me-1" aria-hidden="true"></i>
                    Our Products
                </span>

                <h2 class="section-title-one mb-0 mt-2">
                    Our Complete Product Range
                </h2>

                <p class="collection-intro mt-2">
                    Explore our range of quality products available
                    with distributor price, retail price and MRP.
                </p>

            </div>

            <!-- Search Bar -->
            <div class="row mb-5 justify-content-end">
                <div class="col-lg-4 col-md-6">
                    <form action="/our-products" method="get" class="d-flex gap-2">
                        <input type="text" name="search" class="form-control rounded-pill px-3" placeholder="Search products..." value="<?= h($search) ?>">
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="row g-4">

                <?php if (!empty($products) && count($products) > 0): ?>
                    <?php foreach ($products as $index => $product): ?>
                        <?php
                        // Determine product image
                        $imgUrl = '/assets/img/products/rose-water.png';
                        if (!empty($product->photo)) {
                            $imgUrl = '/upload/product/' . $product->photo;
                        } elseif (!empty($product->product_images) && isset($product->product_images[0]->image)) {
                            $imgUrl = '/upload/product/' . $product->product_images[0]->image;
                        }
                        
                        $delay = 0.8 + (($index % 6) * 0.1);
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="product-card h-100 d-flex flex-column wow fadeInUp" data-wow-duration="<?= $delay ?>s">
                                <div class="product-image text-center p-3">
                                    <a href="/product/<?= h($product->slug) ?>">
                                        <img src="<?= h($imgUrl) ?>" alt="<?= h($product->name) ?>" class="img-fluid rounded" style="max-height: 220px; object-fit: contain;">
                                    </a>
                                </div>
                                <div class="product-content flex-grow-1 d-flex flex-column justify-content-between p-3">
                                    <div>
                                        <h3 class="mb-2">
                                            <a href="/product/<?= h($product->slug) ?>" class="text-decoration-none text-dark fw-bold">
                                                <?= h($product->name) ?>
                                            </a>
                                        </h3>

                                        <div class="price-list mt-3">
                                            <?php if (!empty($product->offer_price)): ?>
                                                <!--<div class="price-item">-->
                                                <!--    <span>Distributor Price</span>-->
                                                <!--    <strong>&#8377;<?= number_format((float)$product->offer_price, 2) ?></strong>-->
                                                <!--</div>-->
                                            <?php endif; ?>

                                            <?php if (!empty($product->actual_price)): ?>
                                                <!--<div class="price-item">-->
                                                <!--    <span>Retail Price</span>-->
                                                <!--    <strong>&#8377;<?= number_format((float)$product->actual_price, 2) ?></strong>-->
                                                <!--</div>-->
                                            <?php if (!empty($product->mrp) && $product->mrp > 0): ?>
                                                <div class="price-item mrp">
                                                    <span>MRP</span>
                                                    <strong>&#8377;<?= number_format((float)$product->mrp, 2) ?></strong>
                                                </div>
                                            <?php elseif (!empty($product->actual_price)): ?>
                                                <div class="price-item mrp">
                                                    <span>MRP</span>
                                                    <strong>&#8377;<?= number_format((float)($product->actual_price * 1.15), 2) ?></strong>
                                                </div>
                                            <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="pd-action-group">
                                        <a href="/product/<?= h($product->slug) ?>" class="btn-view-details-red">
                                            View Details <i class="fa-solid fa-chevron-right ms-1"></i>
                                        </a>
                                        <button type="button" class="btn-quick-enquiry-circle quickEnquiryBtn" data-product-name="<?= h($product->name) ?>" aria-haspopup="dialog" aria-controls="quickEnquiryModal" title="Quick Enquiry">
                                            <span>Quick</span>
                                            <span>Enquiry</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12 text-center py-5">
                        <div class="p-5 border rounded bg-light">
                            <i class="fa-solid fa-box-open fs-1 text-muted mb-3 d-block"></i>
                            <h3 class="fs-4 fw-bold">No Products Found</h3>
                            <p class="text-muted">There are currently no products matching your selected criteria.</p>
                            <a href="/our-products" class="btn btn-primary rounded-pill px-4 mt-2">Reset Filters</a>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

            <!-- Pagination -->
            <?php if ($this->Paginator->hasPage(2)): ?>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        <nav aria-label="Products pagination">
                            <ul class="pagination">
                                <?= $this->Paginator->prev('« Previous', ['class' => 'page-item', 'linkClass' => 'page-link']) ?>
                                <?= $this->Paginator->numbers(['class' => 'page-item', 'linkClass' => 'page-link']) ?>
                                <?= $this->Paginator->next('Next »', ['class' => 'page-item', 'linkClass' => 'page-link']) ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </section>
    <!-- End Product Collection Section -->
</div>