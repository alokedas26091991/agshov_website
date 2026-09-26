<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <?php
    echo $this->element('site_meta');
    ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/img/logo-white.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <!-- Lucide CSS -->
    <link rel="stylesheet" href="/assets/plugins/lucide/lucide.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="/assets/plugins/swiper/swiper.css">

    <!-- WOW CSS -->
    <link rel="stylesheet" href="/assets/plugins/wow/css/animate.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="/assets/css/style.min.css">

    <!-- Quick Enquiry Modal CSS -->
    <link rel="stylesheet" href="/assets/css/quick-enquiry.css">

    <?php echo $this->fetch('cssTop') ?>
</head>

<?php
$currentPath = $this->request->getPath();
$isHome = ($currentPath == '/' || $currentPath == '' || $currentPath == '/home');
?>
<body class="<?= !$isHome ? 'about-page' : '' ?>">

    <!-- Begin Wrapper -->
    <div class="main-wrapper" role="main">
        <?= $this->Flash->render() ?>

        <?php if ($isHome): ?>
            <!-- Hero Section Start -->
            <div class="hero-section">
                <!-- Start Header-->
                <?= $this->element('site/header'); ?>
                <!-- /End Header-->

                <?= $this->fetch('hero_banner') ?>
            </div>
            <!-- Hero Section End -->

            <?= $this->fetch('content') ?>
        <?php else: ?>
            <!-- Start Header-->
            <?= $this->element('site/header'); ?>
            <!-- /End Header-->

            <?= $this->fetch('content') ?>
        <?php endif; ?>

        <!-- Start Footer -->
        <?= $this->element('site/footer'); ?>
        <!-- End Footer -->
    </div>
    <!-- End Wrapper -->

    <!-- ===== Quick Enquiry Modal ===== -->
    <div id="quickEnquiryModal" class="qe-overlay" role="dialog" aria-modal="true" aria-labelledby="qeModalTitle" aria-hidden="true">
        <div class="qe-backdrop"></div>
        <div class="qe-container">

            <!-- Close button -->
            <button class="qe-close" id="qeCloseBtn" aria-label="Close enquiry form">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L17 17M17 1L1 17" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" />
                </svg>
            </button>

            <!-- Header -->
            <div class="qe-header">
                <div class="qe-badge">Sri Gopinath Food Product</div>
                <h2 class="qe-title" id="qeModalTitle">Quick Product Enquiry</h2>
                <p class="qe-subtitle">Send us your requirements and we will contact you with distributor pricing details.</p>
            </div>

            <!-- Form -->
            <form id="quickEnquiryForm" class="qe-form" novalidate autocomplete="off" action="/home/enquiry" method="post">
                <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">

                <!-- Row 1: Name + Phone -->
                <div class="qe-row">
                    <div class="qe-field">
                        <input type="text" id="qeName" name="name" class="qe-input" placeholder=" " required maxlength="100" pattern="[A-Za-z\s]{2,100}" aria-required="true" autocomplete="off">
                        <label for="qeName" class="qe-label">
                            <i class="fa-solid fa-user" aria-hidden="true"></i> Your Name
                        </label>
                        <span class="qe-error" id="qeNameError" role="alert" aria-live="polite"></span>
                    </div>
                    <div class="qe-field">
                        <input type="tel" id="qePhone" name="phone" class="qe-input" placeholder=" " required maxlength="15" pattern="[0-9+\-\s]{7,15}" aria-required="true" autocomplete="off">
                        <label for="qePhone" class="qe-label">
                            <i class="fa-solid fa-phone" aria-hidden="true"></i> Phone Number
                        </label>
                        <span class="qe-error" id="qePhoneError" role="alert" aria-live="polite"></span>
                    </div>
                </div>

                <!-- Row 2: Email -->
                <div class="qe-field">
                    <input type="email" id="qeEmail" name="email" class="qe-input" placeholder=" " required maxlength="254" aria-required="true" autocomplete="off">
                    <label for="qeEmail" class="qe-label">
                        <i class="fa-solid fa-envelope" aria-hidden="true"></i> Email Address
                    </label>
                    <span class="qe-error" id="qeEmailError" role="alert" aria-live="polite"></span>
                </div>

                <!-- Row 3: Product Select -->
                <div class="qe-field">
                    <?php
                    $allQuickProductsList = \Cake\ORM\TableRegistry::getTableLocator()->get('Products')
                        ->find('all')
                        ->select(['id', 'name'])
                        ->where(['is_deleted' => 0, 'parent_id IS' => null])
                        ->order(['name' => 'ASC'])
                        ->all();
                    ?>
                    <select id="qeProduct" name="productname" class="qe-input qe-select" required aria-required="true">
                        <option value="" disabled selected></option>
                        <?php foreach ($allQuickProductsList as $qp): ?>
                            <option value="<?= h($qp->name) ?>"><?= h($qp->name) ?></option>
                        <?php endforeach; ?>
                        <option value="Multiple Products / General Enquiry">Multiple Products / General Enquiry</option>
                    </select>
                    <label for="qeProduct" class="qe-label qe-label-select">
                        <i class="fa-solid fa-box" aria-hidden="true"></i> Select Product
                    </label>
                    <span class="qe-error" id="qeProductError" role="alert" aria-live="polite"></span>
                </div>

                <!-- Row 3.5: Product Variant -->
                <div class="qe-field">
                    <input type="text" id="qeVariant" name="variant" class="qe-input" placeholder=" " maxlength="100" autocomplete="off">
                    <label for="qeVariant" class="qe-label">
                        <i class="fa-solid fa-tags" aria-hidden="true"></i> Pack Size / Variant (optional, e.g. 200 ml)
                    </label>
                </div>

                <!-- Row 4: Message -->
                <div class="qe-field">
                    <textarea id="qeMessage" name="message" class="qe-input qe-textarea" placeholder=" " maxlength="500" rows="3" aria-label="Requirement Details"></textarea>
                    <label for="qeMessage" class="qe-label">
                        <i class="fa-solid fa-comment-dots" aria-hidden="true"></i> Requirement Details (optional)
                    </label>
                </div>

                <!-- Submit -->
                <button type="submit" class="qe-submit" id="qeSubmitBtn">
                    <span class="qe-submit-text">Submit Enquiry</span>
                    <span class="qe-submit-icon" aria-hidden="true">
                        <i class="fa-solid fa-paper-plane"></i>
                    </span>
                </button>

            </form>

            <!-- Success State -->
            <div class="qe-success" id="qeSuccessState" aria-live="polite" hidden>
                <div class="qe-success-icon" aria-hidden="true">
                    <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="28" cy="28" r="28" fill="url(#qeSuccessGrad)" />
                        <path d="M16 28L24 36L40 20" stroke="white" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" />
                        <defs>
                            <linearGradient id="qeSuccessGrad" x1="0" y1="0" x2="56" y2="56" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#F9A826" />
                                <stop offset="1" stop-color="#E07B24" />
                            </linearGradient>
                        </defs>
                    </svg>
                </div>
                <h3 class="qe-success-title">Enquiry Sent!</h3>
                <p class="qe-success-msg">Thank you. Our sales team will get back to you with rates and details shortly.</p>
                <button class="qe-success-close" id="qeSuccessCloseBtn">Close</button>
            </div>

        </div>
    </div>
    <!-- ===== /Quick Enquiry Modal ===== -->

    <script>
        var csrf_token = '<?= $this->request->getAttribute('csrfToken') ?>';
    </script>
    <!-- Wow JS -->
    <script src="/assets/plugins/wow/js/wow.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper JS -->
    <script src="/assets/plugins/swiper/swiper.min.js"></script>

    <!-- Slider JS -->
    <script src="/assets/js/slider.min.js"></script>

    <!-- Main JS -->
    <script src="/assets/js/script.min.js"></script>

    <!-- Quick Enquiry Modal JS -->
    <script src="/assets/js/quick-enquiry.js"></script>

    <?= $this->fetch('scriptBottom') ?>
</body>

</html>