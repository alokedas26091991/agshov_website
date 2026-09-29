<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="/img/banner/main-banner.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title"><?= h($product->name) ?></h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li><a href="/our-products">Our Products</a></li>
                            <li><?= h($product->name) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- SHOP DETAILS AREA START -->
<div class="ltn__shop-details-area pb-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="ltn__shop-details-inner ltn__page-details-inner">
                    <div class="row">
                        <!-- Product Gallery -->
                        <div class="col-md-6">
                            <div class="ltn__shop-details-img-gallery">
                                <?php
                                $galleryImages = [];
                                if (!empty($product->photo)) {
                                    $galleryImages[] = '/upload/product/' . $product->photo;
                                }
                                if (!empty($product->product_images)) {
                                    foreach ($product->product_images as $gImg) {
                                        if (!empty($gImg->image)) {
                                            $url = '/upload/product/' . $gImg->image;
                                            if (!in_array($url, $galleryImages)) {
                                                $galleryImages[] = $url;
                                            }
                                        }
                                    }
                                }
                                if (empty($galleryImages)) {
                                    $galleryImages[] = '/img/products/MOFAG Eye Drops.png';
                                }
                                ?>
                                <div class="ltn__shop-details-large-img">
                                    <?php foreach ($galleryImages as $imgSrc): ?>
                                        <div class="single-large-img">
                                            <a href="<?= h($imgSrc) ?>" data-rel="lightcase:myCollection">
                                                <img src="<?= h($imgSrc) ?>" alt="<?= h($product->name) ?>" class="img-fluid" style="max-height: 400px; object-fit: contain; width: 100%;">
                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <?php if (count($galleryImages) > 1): ?>
                                    <div class="ltn__shop-details-small-img ltn__menu-indicator mt-3">
                                        <?php foreach ($galleryImages as $imgSrc): ?>
                                            <div class="single-small-img">
                                                <img src="<?= h($imgSrc) ?>" alt="<?= h($product->name) ?>" style="height: 80px; width: 100%; object-fit: contain; background: #fff; padding: 4px; border: 1px solid #eee; border-radius: 6px; cursor: pointer;">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="col-md-6">
                            <div class="modal-product-info shop-details-info">
                                <h3><?= h($product->name) ?></h3>


                                <?php if (!empty($product->tagline)): ?>
                                    <div class="modal-product-meta ltn__product-details-menu-1 mb-3">
                                        <ul>
                                            <li>
                                                <strong>Composition / Tagline:</strong>
                                                <span><?= h($product->tagline) ?></span>
                                            </li>
                                        </ul>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($product->short_description)): ?>
                                    <div class="product-description mb-4">
                                        <p><?= h(strip_tags($product->short_description)) ?></p>
                                    </div>
                                <?php endif; ?>

                                <div class="ltn__product-details-menu-2">
                                    <div class="main-buttons d-flex gap-3">
                                        <a href="#" class="theme-btn-1 btn btn-effect-1 quickEnquiryBtn" data-product-name="<?= h($product->name) ?>">
                                            <i class="fas fa-envelope me-2"></i> Enquiry Now
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                <?php
                                $currentUrl = $this->Url->build(['controller' => 'Products', 'action' => 'details', $product->slug], ['fullBase' => true]);
                                $shareTitle = 'Check out ' . $product->name . ' on Agshov Pharmaceuticals';
                                ?>
                                <div class="ltn__social-media">
                                    <ul>
                                        <li><strong>Share:</strong></li>
                                        <li>
                                            <a href="https://api.whatsapp.com/send?text=<?= urlencode($shareTitle . ': ' . $currentUrl) ?>" target="_blank" rel="noopener noreferrer" title="Share on WhatsApp" style="color: #25D366;">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($currentUrl) ?>" target="_blank" rel="noopener noreferrer" title="Share on Facebook" style="color: #1877F2;">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?text=<?= urlencode($shareTitle) ?>&url=<?= urlencode($currentUrl) ?>" target="_blank" rel="noopener noreferrer" title="Share on Twitter" style="color: #1DA1F2;">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($currentUrl) ?>" target="_blank" rel="noopener noreferrer" title="Share on LinkedIn" style="color: #0A66C2;">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="mailto:?subject=<?= urlencode($product->name . ' - Agshov Pharmaceuticals') ?>&body=<?= urlencode('Check out ' . $product->name . ' at: ' . $currentUrl) ?>" title="Share via Email" style="color: #ea4335;">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <button type="button" id="copyShareLinkBtn" data-url="<?= h($currentUrl) ?>" class="btn btn-sm btn-outline-secondary rounded-circle ms-1 p-0 d-inline-flex align-items-center justify-content-center" title="Copy Product Link" style="width: 30px; height: 30px;">
                                                <i class="fa-solid fa-link" style="font-size: 13px;"></i>
                                            </button>
                                        </li>
                                    </ul>
                                    <span id="copySuccessMsg" class="badge bg-success small ms-2 d-none">Link Copied!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SHOP DETAILS AREA END -->

<!-- PRODUCT TAB AREA START -->
<div class="ltn__product-tab-area pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__product-tab-inner ltn__product-tab-inner-2">
                    <div class="ltn__tab-menu ltn__tab-menu-2 text-uppercase">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab">
                                <a class="nav-item nav-link active show" id="nav-tab-1" data-bs-toggle="tab" href="#ltn_tab_details_1">Description</a>
                            </div>
                        </nav>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="ltn_tab_details_1">
                            <div class="ltn__shop-details-tab-content-inner p-4 bg-light rounded">
                                <h4 class="title-2"><?= h($product->name) ?> Information</h4>
                                <div>
                                    <?= !empty($product->description) ? $product->description : h($product->short_description ?: $product->name) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PRODUCT TAB AREA END -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    const copyBtn = document.getElementById('copyShareLinkBtn');
    const copyMsg = document.getElementById('copySuccessMsg');
    if (copyBtn) {
        copyBtn.addEventListener('click', function () {
            const url = this.getAttribute('data-url') || window.location.href;
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(url).then(function () {
                    if (copyMsg) {
                        copyMsg.classList.remove('d-none');
                        setTimeout(() => { copyMsg.classList.add('d-none'); }, 2000);
                    }
                });
            } else {
                const tempInput = document.createElement('input');
                tempInput.value = url;
                document.body.appendChild(tempInput);
                tempInput.select();
                document.execCommand('copy');
                document.body.removeChild(tempInput);
                if (copyMsg) {
                    copyMsg.classList.remove('d-none');
                    setTimeout(() => { copyMsg.classList.add('d-none'); }, 2000);
                }
            }
        });
    }
});
</script>