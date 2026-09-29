<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="/img/banner/main-banner.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Our Products</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Our Products</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- PRODUCT AREA START -->
<div class="ltn__product-area ltn__product-gutter pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area ltn__section-title-2 text-center">
                    <h1 class="section-title">Our Products</h1>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="row mb-4 justify-content-end">
            <div class="col-lg-4 col-md-6">
                <form action="/our-products" method="get" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control rounded-pill px-3" placeholder="Search products..." value="<?= h($search ?? '') ?>">
                    <button type="submit" class="theme-btn-1 btn btn-effect-1 rounded-pill px-4">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>

        <div class="row g-4 ltn__tab-product-slider-one-active--- slick-arrow-1">
            <?php if (!empty($products) && count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <?php
                    $imgUrl = '/img/products/MOFAG Eye Drops.png';
                    if (!empty($product->photo)) {
                        $imgUrl = '/upload/product/' . $product->photo;
                    } elseif (!empty($product->product_images) && isset($product->product_images[0]->image)) {
                        $imgUrl = '/upload/product/' . $product->product_images[0]->image;
                    }
                    ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6">
                        <div class="ltn__product-item ltn__product-item-3 ltn__product-item-2 text-left h-100 d-flex flex-column justify-content-between">
                            <div class="product-img">
                                <a href="/product/<?= h($product->slug) ?>">
                                    <img src="<?= h($imgUrl) ?>" alt="<?= h($product->name) ?>">
                                </a>
                                <?php if (!empty($product->tagline)): ?>
                                    <div class="product-badge">
                                        <ul>
                                            <li class="sale-badge ingredients-badge"><?= h($product->tagline) ?></li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="product-info flex-grow-1 d-flex flex-column justify-content-between">
                                <h2 class="product-title">
                                    <a href="/product/<?= h($product->slug) ?>"><?= h($product->name) ?></a>
                                </h2>
                                <div class="product-description">
                                    <p><?= h($product->short_description ?: $product->name) ?></p>
                                </div>
                                <div class="product-action-btn mt-20">
                                    <a href="/product/<?= h($product->slug) ?>" class="theme-btn-1 btn btn-effect-1 text-uppercase w-100">Details</a>
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
                        <p class="text-muted">There are currently no products matching your search criteria.</p>
                        <a href="/our-products" class="theme-btn-1 btn btn-effect-1 px-4 mt-2">Reset Search</a>
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
</div>
<!-- PRODUCT AREA END -->