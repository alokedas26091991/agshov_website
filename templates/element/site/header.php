<?php
$currentPath = $this->request->getPath();
$isHome = ($currentPath == '/' || $currentPath == '' || $currentPath == '/home');
$isAbout = (strpos($currentPath, 'about') !== false);
$isProducts = (strpos($currentPath, 'product') !== false);
$isContact = (strpos($currentPath, 'contact') !== false);
?>
<header class="header<?= $isHome ? ' header-one custom-header' : '' ?>">
    <div class="container">
        <nav class="navbar navbar-expand-lg header-nav" aria-label="Main navigation">
            <div class="navbar-header">
                <a href="/" class="navbar-brand logo-white">
                    <img src="/assets/img/logo-white.png" class="" alt="Logo">
                </a>
                <a href="/" class="navbar-brand logo-dark">
                    <img src="/assets/img/logo-white.png" class="" alt="Logo-white">
                </a>
                <div id="mobile_btn">
                    <i class="icon-menu"></i>
                </div>
            </div>
            <div class="menu-wrapper">
                <div class="menu-overlay"></div>
                <div class="main-menu-wrapper">
                    <div>
                        <div class="menu-header">
                            <a href="/" class="menu-logo">
                                <img src="/assets/img/logo-white.png" class="img-fluid logo" alt="Logo-white">
                            </a>
                        </div>
                        <ul class="main-nav">
                            <li class="<?= $isHome ? 'active' : '' ?>">
                                <a href="/">Home</a>
                            </li>
                            <li class="<?= $isAbout ? 'active' : '' ?>">
                                <a href="/about-us">About Us</a>
                            </li>
                            <li class="<?= $isProducts ? 'active' : '' ?>">
                                <a href="/our-products">Our Products</a>
                            </li>
                            <li class="<?= $isContact ? 'active' : '' ?>">
                                <a href="/contact-us">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="nav header-items">
                <a href="#" class="primary-btn" id="quickEnquiryBtn" aria-haspopup="dialog" aria-controls="quickEnquiryModal">Quick Enquiry <i class="icon-chevron-right"></i></a>
            </div>
        </nav>
    </div>
</header>