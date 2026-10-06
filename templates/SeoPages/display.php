<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="/img/banner/main-banner.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title"><?= h($page->name) ?></h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li><?= h($page->name) ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- SEO PAGE MAIN CONTENT AREA START -->
<div class="agshov-seo-page-area pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="bg-white p-4 p-md-5 rounded shadow-sm border mb-4">
                    <h2 class="mb-3 text-dark fw-bold"><?= h($page->name) ?></h2>
                    
                    <?php if (!empty($page->meta_desc)): ?>
                        <div class="alert alert-light border-start border-4 border-primary p-3 mb-4">
                            <p class="mb-0 text-secondary leading-relaxed font-italic"><?= h($page->meta_desc) ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($page->content)): ?>
                        <div class="seo-page-content text-dark style-content">
                            <?= $page->content ?>
                        </div>
                    <?php else: ?>
                        <div class="seo-page-content text-dark">
                            <p>Agshov Pharmaceuticals is dedicated to delivering highest-quality healthcare products and medicines across India. For detailed enquiries, product availability, or bulk distributions regarding <strong><?= h($page->name) ?></strong>, please get in touch with our team.</p>
                        </div>
                    <?php endif; ?>

                    <!-- CTA Box -->
                    <div class="bg-light p-4 rounded mt-5 text-center border">
                        <h4 class="fw-bold mb-2">Have questions about <?= h($page->name) ?>?</h4>
                        <p class="text-muted mb-3">Get in touch with our sales & medical enquiry department for more details.</p>
                        <a href="#" class="theme-btn-1 btn btn-effect-1 text-uppercase px-4 py-3 quickEnquiryBtn" data-product-name="<?= h($page->name) ?>">
                            <i class="fa-solid fa-paper-plane me-2"></i> Enquiry Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- SEO PAGE MAIN CONTENT AREA END -->
