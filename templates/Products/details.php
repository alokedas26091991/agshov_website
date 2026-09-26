<div class="page-wrapper">

    <!-- Start Breadscrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="breadcrumb-item">
                <h1 class="breadcrumb-title"><?= h($product->name) ?></h1>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-items"><a href="/"><i class="icon-house me-2"></i>Home</a></li>
                        <li class="breadcrumb-items"><span><i class="icon-chevron-right"></i></span></li>
                        <li class="breadcrumb-items"><a href="/our-products">Our Products</a></li>
                        <li class="breadcrumb-items"><span><i class="icon-chevron-right"></i></span></li>
                        <li class="breadcrumb-items active" aria-current="page"><?= h($product->name) ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Breadscrumb -->

    <!-- ========================
         Product Details Section
    ========================= -->
    <section class="product-details-section" aria-label="Product Details">
        <div class="container">
            <div class="row g-5">

                <!-- ── Left: Image Carousel ── -->
                <div class="col-lg-5 col-md-12">
                    <div class="pd-carousel-wrap wow fadeInLeft" data-wow-delay="0.1s">

                        <!-- Main image -->
                        <div class="pd-main-img" id="pdMainImgWrap">
                            <img src="<?= $this->Url->image(UPLOAD_PRODUCT_IMAGE . $product->photo) ?>" alt="<?= h($product->name) ?>" id="pdMainImg" loading="eager">
                        </div>

                        <!-- Thumbnail strip -->
                        <?php 
                        $allImages = [];
                        if (!empty($product->photo)) {
                            $allImages[] = $product->photo;
                        }
                        if (!empty($product->product_images)) {
                            foreach ($product->product_images as $img) {
                                if ($img->is_active == 1 && !empty($img->image)) {
                                    $allImages[] = $img->image;
                                }
                            }
                        }
                        ?>
                        <div class="pd-thumbs" id="pdThumbStrip">
                            <?php foreach ($allImages as $idx => $imgFileName): ?>
                                <div class="pd-thumb <?= $idx === 0 ? 'is-active' : '' ?>" data-idx="<?= $idx ?>" tabindex="0" role="button" aria-label="View image <?= $idx + 1 ?>">
                                    <img src="<?= $this->Url->image(UPLOAD_PRODUCT_IMAGE . h($imgFileName)) ?>" alt="<?= h($product->name) ?> thumbnail <?= $idx + 1 ?>">
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Prev / Next navigation -->
                        <?php if (count($allImages) > 1): ?>
                        <div class="pd-carousel-nav" role="group" aria-label="Image navigation">
                            <button class="pd-nav-btn" id="pdPrevBtn" aria-label="Previous image">
                                <i class="fa-solid fa-chevron-left" aria-hidden="true"></i>
                            </button>
                            <div class="pd-nav-dots" id="pdDots" aria-hidden="true">
                                <?php foreach ($allImages as $idx => $imgFileName): ?>
                                    <span class="pd-nav-dot <?= $idx === 0 ? 'is-active' : '' ?>" data-dot="<?= $idx ?>"></span>
                                <?php endforeach; ?>
                            </div>
                            <button class="pd-nav-btn" id="pdNextBtn" aria-label="Next image">
                                <i class="fa-solid fa-chevron-right" aria-hidden="true"></i>
                            </button>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
                <!-- ── End Left ── -->

                <!-- ── Right: Product Info ── -->
                <div class="col-lg-7 col-md-12">
                    <div class="pd-info wow fadeInRight" data-wow-delay="0.15s">

                        <!-- Brand tag -->
                        <div class="pd-brand-tag">
                            <i class="fa-solid fa-star" aria-hidden="true"></i>
                            Sri Gopinath Food Product
                        </div>

                        <!-- Product name -->
                        <h1 class="pd-title"><?= h($product->name) ?></h1>

                        <!-- Short description -->
                        <?php if (!empty($product->short_description)): ?>
                        <p class="pd-desc">
                            <?= h(strip_tags($product->short_description)) ?>
                        </p>
                        <?php elseif (!empty($product->description)): ?>
                        <p class="pd-desc">
                            <?= h(strip_tags($product->description)) ?>
                        </p>
                        <?php endif; ?>

                        <!-- Pack size / variant selector -->
                        <?php if (!empty($variants) && count($variants) > 1): ?>
                        <div class="pd-pack-label mb-2 fw-semibold text-dark">Select Pack Size / Variant</div>
                        <div class="pd-pack-tabs mb-4" id="pdPackTabs" role="group" aria-label="Pack sizes">
                            <?php foreach ($variants as $idx => $v): 
                                $up = !empty($v->user_products) ? $v->user_products[0] : null;
                                $optName = !empty($v->filter_option) ? $v->filter_option->name : (!empty($v->name) ? $v->name : 'Option ' . ($idx + 1));
                                $retail = $up && !empty($up->actual_price) ? $up->actual_price : $v->actual_price;
                                $dist = $up && !empty($up->offer_price) ? $up->offer_price : $v->offer_price;
                                $mrp = $up && !empty($up->mrp) ? $up->mrp : $v->mrp;
                                $photo = !empty($v->photo) ? UPLOAD_PRODUCT_IMAGE . $v->photo : ($product->photo ? UPLOAD_PRODUCT_IMAGE . $product->photo : '');
                                $isCurrent = ($v->id == $product->id);
                            ?>
                                <button class="pd-pack-tab <?= $isCurrent ? 'is-active' : '' ?>" 
                                        data-pack="<?= $idx ?>" 
                                        data-dist="<?= !empty($dist) ? '&#8377;&nbsp;' . number_format((float)$dist, 2) : 'On Request' ?>"
                                        data-retail="<?= !empty($retail) ? '&#8377;&nbsp;' . number_format((float)$retail, 2) : 'On Request' ?>"
                                        data-mrp="<?= !empty($mrp) ? '&#8377;&nbsp;' . number_format((float)$mrp, 2) : 'On Request' ?>"
                                        data-label="<?= h($optName) ?>"
                                        data-img="<?= !empty($photo) ? $this->Url->image($photo) : '' ?>"
                                        aria-pressed="<?= $isCurrent ? 'true' : 'false' ?>">
                                    <?= h($optName) ?>
                                </button>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>

                        <hr class="pd-divider">

                        <!-- Price grid -->
                        <?php 
                        $curUp = !empty($product->user_products) ? $product->user_products[0] : null;
                        $curDist = $curUp && !empty($curUp->offer_price) ? $curUp->offer_price : $product->offer_price;
                        $curRetail = $curUp && !empty($curUp->actual_price) ? $curUp->actual_price : $product->actual_price;
                        $curMrp = $curUp && !empty($curUp->mrp) ? $curUp->mrp : $product->mrp;
                        ?>
                        <div class="pd-price-grid" id="pdPriceGrid" aria-live="polite" aria-label="Pricing">

                            <!--<div class="pd-price-card">-->
                            <!--    <span class="pd-price-label">Distributor Price</span>-->
                            <!--    <span class="pd-price-value" id="pdDistPrice">&#8377;&nbsp;<?= number_format((float)($curDist ?? 0), 2) ?></span>-->
                            <!--</div>-->

                            <!--<div class="pd-price-card">-->
                            <!--    <span class="pd-price-label">Retail Price</span>-->
                            <!--    <span class="pd-price-value" id="pdRetailPrice">&#8377;&nbsp;<?= number_format((float)($curRetail ?? 0), 2) ?></span>-->
                            <!--</div>-->

                            <div class="pd-price-card is-mrp">
                                <span class="pd-price-label">MRP</span>
                                <span class="pd-price-value" id="pdMrpPrice">&#8377;&nbsp;<?= number_format((float)($curMrp ?? (($curRetail ?? 0) * 1.15)), 2) ?></span>
                            </div>

                        </div>

                        <hr class="pd-divider">

                        <!-- Key features -->
                        <div class="pd-features" aria-label="Product features">
                            <div class="pd-feature-item">
                                <span class="pd-feature-icon" aria-hidden="true">
                                    <i class="fa-solid fa-leaf"></i>
                                </span>
                                <span>100% Quality Food Ingredients &amp; Authentic Taste</span>
                            </div>
                            <div class="pd-feature-item">
                                <span class="pd-feature-icon" aria-hidden="true">
                                    <i class="fa-solid fa-certificate"></i>
                                </span>
                                <span>FSSAI Certified &amp; quality tested at every batch</span>
                            </div>
                            <div class="pd-feature-item">
                                <span class="pd-feature-icon" aria-hidden="true">
                                    <i class="fa-solid fa-truck-fast"></i>
                                </span>
                                <span>Pan-India distribution — Bulk orders welcome</span>
                            </div>
                            <div class="pd-feature-item">
                                <span class="pd-feature-icon" aria-hidden="true">
                                    <i class="fa-solid fa-box-open"></i>
                                </span>
                                <span>Available for private labelling &amp; custom packaging</span>
                            </div>
                        </div>

                        <!-- CTA buttons -->
                        <div class="pd-cta">
                            <a href="#" class="pd-btn-primary quickEnquiryBtn" id="quickEnquiryBtn" data-product-name="<?= h($product->name) ?>" aria-haspopup="dialog" aria-controls="quickEnquiryModal">
                                Quick Enquiry <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
                            </a>

                            <a href="/our-products" class="pd-btn-outline">
                                <i class="fa-solid fa-grid-2" aria-hidden="true"></i>
                                View All Products
                            </a>
                        </div>

                        <?php if (!empty($product->description)): ?>
                        <div class="pd-description mt-5">
                            <h3 class="fs-4 fw-bold mb-3">Product Description</h3>
                            <div class="text-muted leading-relaxed">
                                <?= $product->description ?>
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>
                </div>
                <!-- ── End Right ── -->

            </div>
        </div>
    </section>
    <!-- ========================
         End Product Details Section
    ========================= -->

</div>

<?= $this->Html->script(['/assets/js/product-details.js'], ['block' => 'scriptBottom']); ?>