<?php $this->start('hero_banner'); ?>
    <!-- Banner section -->
<!-- Banner Section -->
<div class="banner-section">

    <!-- Bootstrap Carousel -->
    <div id="homeBannerCarousel"
         class="carousel slide carousel-fade"
         data-bs-ride="carousel"
         data-bs-interval="5000">

        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button"
                    data-bs-target="#homeBannerCarousel"
                    data-bs-slide-to="0"
                    class="active"
                    aria-current="true"
                    aria-label="Slide 1"></button>

            <button type="button"
                    data-bs-target="#homeBannerCarousel"
                    data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="/assets/img/banner/slider-1.png"
                     class="d-block w-100 banner-slider-img"
                     alt="Premium Service"
                     fetchpriority="high">
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="/assets/img/banner/slider-2.png"
                     class="d-block w-100 banner-slider-img"
                     alt="Interior Design">
            </div>

        </div>

      <button class="carousel-control-prev custom-carousel-arrow"
        type="button"
        data-bs-target="#homeBannerCarousel"
        data-bs-slide="prev">

    <span class="arrow-circle">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M15 5L8 12L15 19"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.2"
                  stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </span>

    <span class="visually-hidden">Previous</span>
</button>


<button class="carousel-control-next custom-carousel-arrow"
        type="button"
        data-bs-target="#homeBannerCarousel"
        data-bs-slide="next">

    <span class="arrow-circle">
        <svg viewBox="0 0 24 24" aria-hidden="true">
            <path d="M9 5L16 12L9 19"
                  fill="none"
                  stroke="currentColor"
                  stroke-width="2.2"
                  stroke-linecap="round"
                  stroke-linejoin="round"/>
        </svg>
    </span>

    <span class="visually-hidden">Next</span>
</button>

    </div>


    <!-- Banner Content -->
    <!-- <div class="banner-overlay-content">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">

                    <div class="banner-content wow fadeInUp"
                         data-wow-duration="2s"
                         data-wow-delay="0.2s">

                        <div class="sub-title">
                            <span class="line"></span>
                            Sri Gopinath Food Product
                        </div>

                        <h1 class="title">
                            Everyday Taste,
                            <span>
                                Quality You Can Trust

                                <img src="/assets/img/banner/line-img.png"
                                     alt="img"
                                     class="img-fluid line-img">
                            </span>
                        </h1>

                        <p class="banner-text">
                            Explore our range of Rose Water, Kewra Water,
                            Tomato Sauce, Green Chilli Sauce,
                            Soya Sauce, Vinegar and Continental Sauce.
                        </p>

                        <div class="banner-btn">
                            <a href="/our-products"
                               class="primary-btn">
                                Explore Products
                                <i class="icon-chevron-right"></i>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div> -->

</div>
<!-- End Banner Section -->
    <a href="#category-section" class="move-next" data-scroll-nav="1" aria-label="scroll"></a>
<?php $this->end(); ?>

<!-- Start About Section -->
<section class="aboutus-section-two section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="aboutus-img position-relative">
                    <img src="/assets/img/about-1.png" alt="Sri Gopinath Food Product" class="img-fluid img-one wow fadeInUp" data-wow-duration="1.5s">

                    <img src="/assets/img/about-2.png" alt="Sri Gopinath Food Product" class="img-fluid img-two wow fadeInUp" data-wow-duration="1.5s">

                    <img src="/assets/img/icons/about-element-1.svg" alt="about-img" class="img-fluid element-one">

                    <div class="about-contact d-none d-xl-flex wow bounceIn" data-wow-duration="1.5s">
                        <div class="about-contact-item">
                            <i class="icon-phone-call"></i>
                        </div>

                        <div class="about-contact-list">
                            <span class="mb-2 d-block">Contact Us</span>
                            <div class="number">+91 9830934230 / 9883854486</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="aboutus-content ps-lg-4">

                    <div class="section-header wow fadeInUp" data-wow-duration="1.5s">

                        <span class="badge badge-md bg-primary">
                            <img src="/assets/img/icons/star-icon.svg" alt="star-icon">
                            About Us
                        </span>

                        <h2 class="section-title-one mb-2">
                            Quality Food Products for Every Kitchen
                        </h2>

                        <p class="mb-0">
                            Sri Gopinath Food Product offers a range of everyday food products
                            including Rose Water, Kewra Water, Tomato Sauce, Green Chilli Sauce,
                            Soya Sauce, Vinegar and Continental Sauce.
                        </p>

                    </div>

                    <div class="aboutus-content-item wow fadeInUp" data-wow-duration="1.5s">

                        <div class="aboutus-text">
                            <h3 class="custom-title d-flex align-items-center gap-2 mb-1">
                                <img src="/assets/img/icons/star-icon-1.svg" alt="star-icon" class="flex-shrink-0">
                                Wide Range of Products
                            </h3>

                            <p class="mb-0">
                                From flavourful sauces and vinegar to Rose Water and Kewra Water,
                                our product range is designed to add taste, aroma and convenience
                                to everyday food preparation.
                            </p>
                        </div>

                        <div class="aboutus-text mb-0 pb-0 border-0">
                            <h3 class="custom-title d-flex align-items-center gap-2">
                                <img src="/assets/img/icons/star-icon-1.svg" alt="star-icon" class="flex-shrink-0">
                                Value & Flexible Pricing
                            </h3>

                            <p class="mb-0">
                                We offer distributor and retail pricing across our product range.
                                Rates are negotiable, while payment is required on the same day.
                            </p>
                        </div>

                        <a href="/about-us" class="primary-btn btn mt-4">
                            More About Us <i class="icon-chevron-right"></i>
                        </a>

                    </div>

                </div>
            </div>
        </div>

        <img src="/assets/img/bg/element-img-1.png" alt="element-img" class="img-fluid element-1 wow bounceIn" data-wow-duration="1.5s">

    </div>
</section>
<!-- End About Section -->

<!-- Why Choose Us Section -->
<section class="choose-section section">
    <div class="container">

        <div class="section-header text-center wow fadeInUp" data-wow-duration="1.5s">
            <h2 class="d-flex align-items-center justify-content-center section-title-one mb-2 text-white">
                <span class="text-bar"></span> Why Choose Us <span class="text-bar"></span>
            </h2>
            <p class="text-white">
                A diverse range of food products with flexible pricing and convenient business terms.
            </p>
        </div>

        <div class="row g-4">

            <div class="col-lg-3 col-md-6 d-flex wow flipInY" data-wow-duration="2">
                <div class="choose-item flex-fill">
                    <div class="choose-content text-center">
                        <img src="/assets/img/icons/choose-01.svg" alt="Icon">
                        <h3 class="mb-2 text-white">Wide Product Range</h3>
                        <p class="text-white">
                            Sauces, flavoured waters, vinegar and more.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex wow flipInY" data-wow-duration="2">
                <div class="choose-item flex-fill">
                    <div class="choose-content text-center">
                        <img src="/assets/img/icons/choose-02.svg" alt="Icon">
                        <h3 class="mb-2 text-white">Multiple Pack Sizes</h3>
                        <p class="text-white">
                            Selected products are available in different sizes.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex wow flipInY" data-wow-duration="2">
                <div class="choose-item flex-fill">
                    <div class="choose-content text-center">
                        <img src="/assets/img/icons/choose-03.svg" alt="Icon">
                        <h3 class="mb-2 text-white">Negotiable Rates</h3>
                        <p class="text-white">
                            Rates are negotiable based on business requirements.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 d-flex wow flipInY" data-wow-duration="2">
                <div class="choose-item flex-fill">
                    <div class="choose-content text-center">
                        <img src="/assets/img/icons/choose-04.svg" alt="Icon">
                        <h3 class="mb-2 text-white">Same Day Payment</h3>
                        <p class="text-white">
                            Convenient payment terms with same-day payment.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <img src="/assets/img/choose-bg-01.png" alt="bg" class="img-fluid choose-bg-01">
    <img src="/assets/img/choose-bg-02.png" alt="bg" class="img-fluid choose-bg-02">
</section>
<!-- End Choose Us Section -->

<!-- Start Collections Section -->
<section class="collection-section section">
    <div class="container">

        <div class="section-header text-center wow fadeInUp" data-wow-duration="1.5s">
            <span class="badge badge-md bg-primary">
                <img src="/assets/img/icons/star-icon.svg" alt="star-icon">
                Our Products
            </span>

            <h2 class="section-title-one mb-0">
                Our Complete Product Range
            </h2>

            <p class="mt-2">
                Explore our products, available in different pack sizes with
                distributor price, retail price and MRP.
            </p>
        </div>

    </div>

    <div class="collection-list collection-slider swiper">
        <div class="swiper-wrapper">

            <?php
            $cardIndex = 0;
            if (!empty($dbProducts)) {
                foreach ($dbProducts as $p) {
                    $imgUrl = '/assets/img/products/rose-water.png';
                    if (!empty($p->photo)) {
                        $imgUrl = '/upload/product/' . $p->photo;
                    }
                    $productUrl = '/product/' . h($p->slug);

                    // Combine parent product and child products as all variants for this product
                    $allVariants = [];
                    if (!empty($p->offer_price) || !empty($p->actual_price) || !empty($p->filter_option) || empty($p->child_products)) {
                        $allVariants[] = $p;
                    }
                    if (!empty($p->child_products)) {
                        foreach ($p->child_products as $c) {
                            $allVariants[] = $c;
                        }
                    }

                    foreach ($allVariants as $v) {
                        $cardIndex++;
                        $duration = 1.5 + (($cardIndex % 8) * 0.5);
                        $variantImg = $imgUrl;
                        if (!empty($v->photo)) {
                            $variantImg = '/upload/product/' . $v->photo;
                        }
                        $distPrice = !empty($v->offer_price) ? number_format((float)$v->offer_price, 2) : (!empty($p->offer_price) ? number_format((float)$p->offer_price, 2) : 'N/A');
                        $retPrice = !empty($v->actual_price) ? number_format((float)$v->actual_price, 2) : (!empty($p->actual_price) ? number_format((float)$p->actual_price, 2) : 'N/A');
                        $mrpPrice = !empty($v->mrp) ? number_format((float)$v->mrp, 2) : (!empty($v->price) ? number_format((float)$v->price, 2) : (!empty($p->price) ? number_format((float)$p->price, 2) : 'N/A'));
                        
                        $fo = $v->filter_option ?? null;
                        $packSize = ($fo && !empty($fo->name)) ? $fo->name : (!empty($v->size_id) ? $v->size_id : (!empty($v->name) && $v->name !== $p->name ? $v->name : 'Standard'));
                        ?>
                        <div class="collection-card wow flipInY swiper-slide" data-wow-duration="<?= $duration ?>s">
                            <div class="collection-img">
                                <img src="<?= h($variantImg) ?>" alt="<?= h($p->name) ?>" class="img-fluid" style="max-height: 220px; object-fit: contain;">
                            </div>

                            <div class="collection-detail">
                                <h3 class="custom-title mb-2">
                                    <a href="<?= $productUrl ?>"><?= h($p->name) ?></a>
                                </h3>

                                <p class="mb-2">Pack Size: <strong><?= h($packSize) ?></strong></p>

                                <div class="price">
                                    Distributor Price: &#8377;<?= $distPrice ?><br>
                                    Retail Price: &#8377;<?= $retPrice ?><br>
                                    MRP: &#8377;<?= $mrpPrice ?>
                                </div>

                                <a href="<?= $productUrl ?>" class="primary-btn btn mt-3">
                                    View Product <i class="icon-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
            } else {
                ?>
                <div class="col-12 text-center py-4">
                    <p class="text-muted">No products available at the moment.</p>
                </div>
                <?php
            }
            ?>

        </div>
    </div>
</section>
<!-- End Collections Section -->

<!-- Start Delicious -->
<div class="delicious-info mt-5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <!-- <div class="col-lg-6">
                <div class="delicious-img wow fadeInUp">
                    <img src="/assets/img/about-1.png" class="img-fluid delicious-main-img rounded-circle" alt="Food">

                    <div class="offer-item">
                        <h2 class="mb-1 text-white">20+</h2>
                        <p class="text-white">Years of Experience</p>
                    </div>
                </div>
            </div> -->
            <div class="col-lg-12">
                <div class="section-header wow fadeInUp mb-4">
                    <h2 class="section-title-one mb-2">We serve fresh, flavorful food crafted with care,
                        passion, and quality ingredients.</h2>
                    <p>Driven by a love for good food and great service, our restaurant offers a menu designed
                        to delight every palate.</p>
                </div>
                <div class="row">
                    <div class="col-md-6 d-flex wow fadeInUp">
                        <div class="delicious-item bg-primary-light flex-fill">
                            <h3 class="mb-2">Our Mission</h3>
                            <p>To deliver delicious food and exceptional service in a warm, inviting space.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex wow fadeInUp">
                        <div class="delicious-item bg-secondary-light flex-fill">
                            <h3 class="mb-2">Our Vision</h3>
                            <p>To become a favorite dining destination known for quality and consistency.</p>
                        </div>
                    </div>
                </div>
                <div class="wow fadeInUp">
                    <a href="/about-us" class="btn-primary gap-2">Read More
                        <i class="icon-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Delicious -->

<!-- Marquee Section -->
<section class="marquee-section">
    <div class="horizontal-slide d-flex" data-direction="left" data-speed="slow">
        <div class="slide-list d-flex">
            <div class="marquee-item">
                <h2 class="marquee-title">Exceptional Quality</h2>
            </div>
            <div class="marquee-item">
                <h2 class="marquee-title">Expert Chefs & Staff</h2>
            </div>
            <div class="marquee-item">
                <h2 class="marquee-title">Trusted by Customers</h2>
            </div>
            <div class="marquee-item">
                <h2 class="marquee-title">Best Value for Money</h2>
            </div>
            <div class="marquee-item">
                <h2 class="marquee-title">Exceptional Quality</h2>
            </div>
            <div class="marquee-item">
                <h2 class="marquee-title">Expert Chefs & Staff</h2>
            </div>
        </div>
    </div>
</section>
<!-- End Marquee Section -->

<!-- Start Testimonial Section -->
<section class="testimonial-section section">
    <div class="container">
        <div class="section-header text-center wow fadeInUp">
            <h2 class="d-flex align-items-center justify-content-center section-title-one mb-2">
                <span class="text-bar"></span> Testimonials From Customers <span class="text-bar"></span>
            </h2>
            <p>Genuine feedback from our valued customers who chose us with trust.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex wow fadeInUp">
                <div class="testimonial-item flex-fill text-center">
                    <div class="quatation-icon">
                        <img src="/assets/img/quatation-icon.svg" alt="quote" class="img-fluid">
                    </div>
                    <div class="review-star justify-content-center mb-2">
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                    </div>
                    <div class="testimonial-content">
                        <p class="description">They went above and beyond to meet my expectations. I finally
                            found a company I can depend on.</p>

                        <p class="author-name"><a href="#">Peter Marshall</a></p>
                        <p class="location">France</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex wow fadeInUp">
                <div class="testimonial-item flex-fill text-center">
                    <div class="quatation-icon">
                        <img src="/assets/img/quatation-icon.svg" alt="quote" class="img-fluid">
                    </div>
                    <div class="review-star justify-content-center mb-2">
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                    </div>
                    <div class="testimonial-content">
                        <p class="description">Absolutely loved the vegan lasagna recipe! It was easy to follow,
                            packed with flavor, and my whole family.</p>

                        <p class="author-name"><a href="#">Emily Johnson</a></p>
                        <p class="location">USA</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex wow fadeInUp">
                <div class="testimonial-item flex-fill text-center">
                    <div class="quatation-icon">
                        <img src="/assets/img/quatation-icon.svg" alt="quote" class="img-fluid">
                    </div>
                    <div class="review-star justify-content-center mb-2">
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                    </div>
                    <div class="testimonial-content">
                        <p class="description">The dessert ideas here are amazing! I tried the chocolate mousse,
                            and it turned out perfect.</p>

                        <p class="author-name"><a href="#">Benjamin Taylor</a></p>
                        <p class="location">Russia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- End Testimonial Section -->

<!-- Start Partners Section -->
<!--<section class="partner-section section">-->
<!--    <div class="container">-->
<!--        <div class="section-header">-->
<!--            <h2 class="section-title-one mb-0">Our Partners</h2>-->
<!--        </div>-->
<!--        <div class="partner-slider">-->
<!--            <div class="partner-item">-->
<!--                <img src="/assets/img/logo.jpeg" alt="partner" class="img-fluid">-->
<!--            </div>-->
<!--            <div class="partner-item">-->
<!--                <img src="/assets/img/logo.jpeg" alt="partner" class="img-fluid">-->
<!--            </div>-->
<!--            <div class="partner-item">-->
<!--                <img src="/assets/img/logo.jpeg" alt="partner" class="img-fluid">-->
<!--            </div>-->
<!--            <div class="partner-item">-->
<!--                <img src="/assets/img/logo.jpeg" alt="partner" class="img-fluid">-->
<!--            </div>-->
<!--            <div class="partner-item">-->
<!--                <img src="/assets/img/logo.jpeg" alt="partner" class="img-fluid">-->
<!--            </div>-->
<!--            <div class="partner-item">-->
<!--                <img src="/assets/img/logo.jpeg" alt="partner" class="img-fluid">-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- End Partners Section -->