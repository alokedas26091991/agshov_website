<?php
$currentPath = $this->request->getPath();
$isHome = ($currentPath == '/' || $currentPath == '' || $currentPath == '/home');
$isAbout = (strpos($currentPath, 'about') !== false);
$isProducts = (strpos($currentPath, 'product') !== false);
$isCareer = (strpos($currentPath, 'career') !== false || strpos($currentPath, 'job') !== false);
$isContact = (strpos($currentPath, 'contact') !== false);
?>
<!-- HEADER AREA START (header-5) -->
<header class="ltn__header-area ltn__header-5 ltn__header-logo-and-mobile-menu-in-mobile--- ltn__header-logo-and-mobile-menu--- ltn__header-transparent gradient-color-4---">
    <!-- ltn__header-top-area start -->
    <div class="ltn__header-top-area border-bottom top-area-color-white---">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="ltn__top-bar-menu">
                        <ul>
                            <li>
                                <a href="mailto:enquiry@agshovpharma.com">
                                    <i class="fa fa-envelope"></i> enquiry@agshovpharma.com
                                </a> (Business Enquiry)
                            </li>
                            <li>
                                <a href="mailto:info@agshovpharma.com">
                                    <i class="fa fa-envelope"></i> sales@agshovpharma.com
                                </a> (Sales)
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="top-bar-right text-end">
                        <div class="ltn__top-bar-menu">
                            <ul>
                                <li>
                                    <div class="ltn__social-media">
                                        <ul>
                                            <li><a href="https://www.facebook.com/profile.php?id=61577693850143" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-top-area end -->

    <!-- ltn__header-middle-area start -->
    <div class="ltn__header-middle-area ltn__logo-right-menu-option ltn__header-row-bg-white ltn__header-padding ltn__header-sticky ltn__sticky-bg-white">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="site-logo-wrap">
                        <div class="site-logo">
                            <a href="/"><img src="/img/logo.png" alt="Agshov Logo"></a>
                        </div>
                    </div>
                </div>
                <div class="col header-menu-column menu-color-white---">
                    <div class="header-menu d-none d-xl-block">
                        <nav>
                            <div class="ltn__main-menu">
                                <ul>
                                    <li><a href="/" class="<?= $isHome ? 'active' : '' ?>">Home</a></li>
                                    <li><a href="/about-us" class="<?= $isAbout ? 'active' : '' ?>">About Us</a></li>
                                    <li class="menu-icon">
                                        <a href="/our-products" class="<?= $isProducts ? 'active' : '' ?>">Products</a>
                                        <ul>
                                            <li><a href="/our-products">Product List</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-icon">
                                        <a href="/career" class="<?= $isCareer ? 'active' : '' ?>">Careers</a>
                                        <ul>
                                            <li><a href="/career">Why Join Us</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/contact-us" class="<?= $isContact ? 'active' : '' ?>">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col ltn__header-options ltn__header-options-2 mb-sm-20">
                    <div class="ltn__header-options-item d-none d-md-block">
                        <a href="#" class="theme-btn-1 btn btn-effect-1 enquiry-btn">Enquiry Now</a>
                    </div>
                    <!-- Mobile Menu Button -->
                    <div class="mobile-menu-toggle d-xl-none">
                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                            <svg viewBox="0 0 800 600">
                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                <path d="M300,320 L540,320" id="middle"></path>
                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ltn__header-middle-area end -->
</header>
<!-- HEADER AREA END -->

<!-- Utilize Mobile Menu Start -->
<div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
        <div class="ltn__utilize-menu-head">
            <div class="site-logo">
                <a href="/"><img src="/img/logo.png" alt="Logo"></a>
            </div>
            <button class="ltn__utilize-close"><i class="fa-solid fa-xmark"></i></button>
        </div>

        <div class="ltn__utilize-menu">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about-us">About Us</a></li>
                <li><a href="/our-products">Products</a>
                    <ul class="sub-menu">
                        <li><a href="/our-products">Product List</a></li>
                    </ul>
                </li>
                <li><a href="/career">Careers</a>
                    <ul class="sub-menu">
                        <li><a href="/career">Why Join Us</a></li>
                    </ul>
                </li>
                <li><a href="/contact-us">Contact</a></li>
            </ul>
        </div>
        <div class="ltn__utilize-buttons-enquiry mb-30">
            <a href="#" class="theme-btn-1 btn btn-effect-1 enquiry-btn w-100">Enquiry Now</a>
        </div>
        <div class="ltn__utilize-contact-card">
            <h5 class="ltn__utilize-contact-title">Get In Touch</h5>
            <ul>
                <li>
                    <span class="icon-wrap"><i class="fa fa-envelope"></i></span>
                    <div class="contact-text">
                        <small>Business Enquiry</small>
                        <a href="mailto:enquiry@agshovpharma.com">enquiry@agshovpharma.com</a>
                    </div>
                </li>
                <li>
                    <span class="icon-wrap"><i class="fa fa-envelope"></i></span>
                    <div class="contact-text">
                        <small>Feedback / Suggestion</small>
                        <a href="mailto:info@agshovpharma.com">info@agshovpharma.com</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="ltn__social-media-2">
            <ul>
                <li><a href="https://www.facebook.com/profile.php?id=61577693850143" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" title="Instagram"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Utilize Mobile Menu End -->
<div class="ltn__utilize-overlay"></div>