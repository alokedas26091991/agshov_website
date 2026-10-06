<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php echo $this->element('site_meta'); ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">

    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- plugins css -->
    <link rel="stylesheet" href="/css/plugins.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="/css/responsive.css">

    <?php echo $this->fetch('cssTop') ?>
</head>

<body>
    <!-- Body main wrapper start -->
    <div class="body-wrapper">

        <?= $this->Flash->render() ?>

        <!-- HEADER AREA START -->
        <?= $this->element('site/header'); ?>
        <!-- HEADER AREA END -->

        <!-- MAIN CONTENT START -->
        <?= $this->fetch('content') ?>
        <!-- MAIN CONTENT END -->

        <!-- FOOTER AREA START -->
        <?= $this->element('site/footer'); ?>
        <!-- FOOTER AREA END -->

    </div>
    <!-- Body main wrapper end -->

    <!-- Enquiry Modal Start -->
    <?php
    $enquiryProductsList = \Cake\ORM\TableRegistry::getTableLocator()->get('Products')
        ->find('all')
        ->where(['is_active' => 1, 'is_deleted' => 0, 'parent_id IS' => NULL])
        ->order(['name' => 'ASC'])
        ->extract('name')
        ->toArray();
    ?>
    <div class="ltn__enquiry-modal-area" id="enquiry-modal">
        <div class="modal-content">
            <button class="modal-close"><i class="fa-solid fa-xmark"></i></button>
            <div class="modal-header-visual">
                <div class="header-text">
                    <h3>Get a Quote</h3>
                    <p>We'll get back to you within 24 hours.</p>
                </div>
            </div>
            <div class="modal-body-form">
                <div id="enquiry-status-message" class="mb-3 d-none"></div>
                <form action="/home/enquiry" method="post" class="enquiry-form" id="site-enquiry-form">
                    <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                    <div class="input-item with-icon">
                        <span class="input-icon"><i class="fa-solid fa-capsules"></i></span>
                        <select name="productname" id="enquiry_product_select" class="form-select text-dark" style="height: 50px; padding-left: 45px; border: 1px solid #e4ecf2; border-radius: 8px; width: 100%; background-color: #f8f9fa; font-size: 14px;" required>
                            <option value="General Enquiry">Select Product / General Enquiry</option>
                            <?php if (!empty($enquiryProductsList)): ?>
                                <?php foreach ($enquiryProductsList as $pName): ?>
                                    <option value="<?= h($pName) ?>"><?= h($pName) ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="input-item with-icon">
                        <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="input-item with-icon">
                        <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="input-item with-icon">
                        <span class="input-icon"><i class="fa-solid fa-phone"></i></span>
                        <input type="text" name="phone" placeholder="Phone Number" required>
                    </div>
                    <div class="input-item with-icon">
                        <span class="input-icon textarea-icon"><i class="fa-solid fa-comment-dots"></i></span>
                        <textarea name="message" placeholder="How can we help you?"></textarea>
                    </div>
                    <div class="btn-wrapper mt-10">
                        <button type="submit" id="enquiry-submit-btn" class="theme-btn-1 btn btn-block w-100 btn-pulse">Send Enquiry</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Enquiry Modal End -->

    <!-- All JS Plugins -->
    <script src="/js/plugins.js"></script>
    <!-- Main JS -->
    <script src="/js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const modal = document.getElementById('enquiry-modal');
            const openBtns = document.querySelectorAll('.enquiry-btn, .quickEnquiryBtn');
            const closeBtn = modal ? modal.querySelector('.modal-close') : null;
            const enquiryForm = document.getElementById('site-enquiry-form');
            const statusMsg = document.getElementById('enquiry-status-message');
            const submitBtn = document.getElementById('enquiry-submit-btn');

            if (modal) {
                function openModal() {
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }

                function closeModal() {
                    modal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                    if (statusMsg) {
                        statusMsg.classList.add('d-none');
                        statusMsg.innerHTML = '';
                    }
                }

                openBtns.forEach(btn => {
                    btn.addEventListener('click', function (e) {
                        e.preventDefault();
                        const prodName = this.getAttribute('data-product-name') || this.dataset.productName;
                        const prodSelect = document.getElementById('enquiry_product_select');

                        if (prodSelect) {
                            if (prodName) {
                                let found = false;
                                for (let i = 0; i < prodSelect.options.length; i++) {
                                    if (prodSelect.options[i].value === prodName) {
                                        prodSelect.selectedIndex = i;
                                        found = true;
                                        break;
                                    }
                                }
                                if (!found) {
                                    const opt = new Option(prodName, prodName, true, true);
                                    prodSelect.add(opt);
                                }
                            } else {
                                prodSelect.value = 'General Enquiry';
                            }
                        }
                        openModal();
                    });
                });

                if (closeBtn) closeBtn.addEventListener('click', closeModal);

                modal.addEventListener('click', function (e) {
                    if (e.target === modal) {
                        closeModal();
                    }
                });

                if (enquiryForm) {
                    enquiryForm.addEventListener('submit', function (e) {
                        e.preventDefault();
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i> Sending...';

                        const formData = new FormData(enquiryForm);
                        fetch('/home/enquiry', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(res => res.json())
                        .then(data => {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = 'Send Enquiry';
                            if (statusMsg) {
                                statusMsg.classList.remove('d-none');
                                if (data.success) {
                                    statusMsg.className = 'alert alert-success p-2 small mb-3 text-center';
                                    statusMsg.textContent = data.message || 'We have received your enquiry. Thank you!';
                                    enquiryForm.reset();
                                    setTimeout(() => {
                                        closeModal();
                                    }, 2500);
                                } else {
                                    statusMsg.className = 'alert alert-danger p-2 small mb-3 text-center';
                                    statusMsg.textContent = data.message || 'An error occurred. Please try again.';
                                }
                            }
                        })
                        .catch(err => {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = 'Send Enquiry';
                            if (statusMsg) {
                                statusMsg.classList.remove('d-none');
                                statusMsg.className = 'alert alert-danger p-2 small mb-3 text-center';
                                statusMsg.textContent = 'An error occurred while sending your enquiry. Please try again.';
                            }
                        });
                    });
                }
            }
        });
    </script>

    <?= $this->fetch('scriptBottom') ?>
</body>

</html>