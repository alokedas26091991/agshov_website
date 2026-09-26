<div class="page-wrapper">

    <!-- Start Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="breadcrumb-item">
                <h1 class="breadcrumb-title"><?= isset($page->page_name) ? h($page->page_name) : 'About Us' ?></h1>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-items"><a href="/"><i class="icon-house me-2"></i>Home</a></li>
                        <li class="breadcrumb-items"><span><i class="icon-chevron-right"></i></span></li>
                        <li class="breadcrumb-items active" aria-current="page"><?= isset($page->page_name) ? h($page->page_name) : 'About Us' ?></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Start About Us -->
    <section class="aboutus-section-two section">
        <div class="container">
            <div class="row about-hero-row">

                <div class="col-lg-6">
                    <div class="aboutus-img-two d-none d-lg-block">
                        <img src="/assets/img/about-2.png" alt="Sri Gopinath Food Product" class="img-fluid">
                    </div>
                </div>

                <div class="col-lg-6">

                    <div class="section-header">
                        <h2 class="section-title-one mb-2">
                            Quality Food Products for Every Need
                        </h2>

                        <p>
                            Sri Gopinath Food Product offers a diverse range of food
                            products including Rose Water, Kewra Water, Tomato Sauce,
                            Green Chilli Sauce, Soya Sauce, Vinegar and Continental Sauce.
                        </p>
                    </div>

                    <div class="aboutus-content">

                        <div class="about-item border-0 p-0">
                            <h3 class="custom-title mb-2">
                                <i class="icon-circle-check-big text-primary fs-20"></i>
                                Wide Product Range
                            </h3>

                            <p>
                                Our product range includes flavoured waters, sauces and
                                vinegar, with selected products available in multiple
                                pack sizes such as 100ml, 200ml and 650ml.
                            </p>
                        </div>

                        <div class="about-item border-0 p-0">
                            <h3 class="custom-title mb-2">
                                <i class="icon-circle-check-big text-primary fs-20"></i>
                                Flexible Pricing
                            </h3>

                            <p>
                                Our rate chart includes distributor prices, retail prices
                                and MRP for the available product variants. Rates are
                                negotiable depending on requirements and market conditions.
                            </p>
                        </div>

                        <div class="about-item border-0 p-0">
                            <h3 class="custom-title mb-2">
                                <i class="icon-circle-check-big text-primary fs-20"></i>
                                Convenient Business Terms
                            </h3>

                            <p>
                                We provide clear pricing across our product range, with
                                same-day payment as the stated payment condition.
                            </p>
                        </div>

                    </div>

                    <a href="/our-products" class="primary-btn about-cta-btn">
                        <i class="icon-hand-platter"></i>
                        Explore Our Products
                    </a>

                </div>

            </div>
        </div>
    </section>
    <!-- End About Us -->

    <!-- Work Section -->
    <section class="work-section section">
        <div class="container">

            <div class="section-header about-center-header">
                <span class="badge badge-md bg-primary mb-1">Our Process</span>

                <h2 class="section-title-one mb-0">
                    Simple & Convenient
                </h2>
            </div>

            <div class="row g-4">

                <!-- Step 1 -->
                <div class="col-md-4">
                    <div class="work-item wow bounceIn" data-wow-duration="1.0s">

                        <div class="work-icon">
                            <span>
                                <i class="fa-solid fa-basket-shopping"></i>
                            </span>
                        </div>

                        <h3 class="custom-title mb-2">
                            Choose Your Products
                        </h3>

                        <p class="mb-0">
                            Explore our range of Rose Water, Kewra Water, Tomato Sauce,
                            Green Chilli Sauce, Soya Sauce, Vinegar and Continental Sauce.
                        </p>

                    </div>
                </div>

                <!-- Step 2 -->
                <div class="col-md-4">
                    <div class="work-item work-02 wow bounceIn" data-wow-duration="2.0s">

                        <div class="work-icon">
                            <span>
                                <i class="fa-solid fa-tags"></i>
                            </span>
                        </div>

                        <h3 class="custom-title mb-2">
                            Check Product Pricing
                        </h3>

                        <p class="mb-0">
                            Check the available pack sizes along with distributor price,
                            retail price and MRP for each product variant.
                        </p>

                    </div>
                </div>

                <!-- Step 3 -->
                <div class="col-md-4">
                    <div class="work-item work-03 wow bounceIn" data-wow-duration="3.0s">

                        <div class="work-icon">
                            <span>
                                <i class="fa-solid fa-handshake"></i>
                            </span>
                        </div>

                        <h3 class="custom-title mb-2">
                            Confirm & Pay
                        </h3>

                        <p class="mb-0">
                            Discuss your requirements, benefit from negotiable rates
                            and complete payment according to the same-day payment condition.
                        </p>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Work Section -->

    <!-- Start Quality Commitment Section -->
    <section class="quality-commitment-section section">
        <div class="container">
            <div class="section-header about-center-header">
                <span class="badge badge-md bg-primary mb-1">Our Standards</span>
                <h2 class="section-title-one mb-2">Committed to Quality &amp; Purity</h2>
                <p class="section-desc">At Sri Gopinath Food Product, we maintain the highest standards of
                    production to ensure every drop and spoonful adds perfect flavor to your kitchen.</p>
            </div>

            <div class="row g-4 justify-content-center mt-2">
                <!-- Value 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="quality-card">
                        <div class="quality-icon-wrapper">
                            <i class="fa-solid fa-leaf"></i>
                        </div>
                        <h3 class="quality-card-title">100% Pure &amp; Natural</h3>
                        <p class="quality-card-text">Our Rose Water and Kewra Water are distilled using
                            traditional methods to preserve their authentic, natural aroma without harsh
                            additives.</p>
                    </div>
                </div>

                <!-- Value 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="quality-card">
                        <div class="quality-icon-wrapper">
                            <i class="fa-solid fa-flask"></i>
                        </div>
                        <h3 class="quality-card-title">Hygienically Processed</h3>
                        <p class="quality-card-text">Produced at our dedicated Sabji Bagan, Kamarhati factory
                            with strict sanitary oversight, ensuring safe and premium quality products.</p>
                    </div>
                </div>

                <!-- Value 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="quality-card">
                        <div class="quality-icon-wrapper">
                            <i class="fa-solid fa-award"></i>
                        </div>
                        <h3 class="quality-card-title">Trusted by Kitchens</h3>
                        <p class="quality-card-text">From local eateries to home cooks, our sauces and vinegars
                            are relied upon daily for consistent flavor, texture, and value.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Quality Commitment Section -->

    <!-- Start FAQ Section -->
    <section class="faq-section-two section">

        <div class="container">

            <div class="section-header about-center-header">
                <span class="badge badge-md bg-primary mb-1">FAQ</span>

                <h2 class="section-title-one mb-0">
                    General Questions
                </h2>
            </div>

            <div class="row about-faq-row">

                <div class="col-lg-9">

                    <div class="accordion faq-accordion" id="accordionFaq">

                        <!-- FAQ 1 -->
                        <div class="accordion-item show mb-3">
                            <div class="accordion-header">

                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-collapseOne" aria-expanded="true"
                                    aria-controls="faq-collapseOne">

                                    What products does Sri Gopinath Food Product offer?

                                </button>

                            </div>

                            <div id="faq-collapseOne" class="accordion-collapse collapse show"
                                data-bs-parent="#accordionFaq">

                                <div class="accordion-body">
                                    <p class="mb-0">
                                        Our product range includes Rose Water, Kewra Water,
                                        Tomato Sauce, Green Chilli Sauce, Soya Sauce,
                                        Vinegar and Continental Sauce.
                                    </p>
                                </div>

                            </div>
                        </div>


                        <!-- FAQ 2 -->
                        <div class="accordion-item mb-3">

                            <div class="accordion-header">

                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq-collapsetwo"
                                    aria-expanded="false" aria-controls="faq-collapsetwo">

                                    What pack sizes are available?

                                </button>

                            </div>

                            <div id="faq-collapsetwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFaq">

                                <div class="accordion-body">
                                    <p class="mb-0">
                                        Rose Water and Kewra Water are available in
                                        100ml and 200ml. Tomato Sauce, Green Chilli Sauce
                                        and Soya Sauce are available in 100ml, 200ml
                                        and 650ml. Vinegar is available in 100ml and
                                        650ml, while Continental Sauce is available in 650ml.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <!-- FAQ 3 -->
                        <div class="accordion-item mb-3">

                            <div class="accordion-header">

                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq-collapsthree"
                                    aria-expanded="false" aria-controls="faq-collapsthree">

                                    Do you offer distributor and retail pricing?

                                </button>

                            </div>

                            <div id="faq-collapsthree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFaq">

                                <div class="accordion-body">
                                    <p class="mb-0">
                                        Yes. Our rate chart provides separate Distributor
                                        Price, Retail Price and MRP for the available
                                        product variants.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <!-- FAQ 4 -->
                        <div class="accordion-item mb-3">

                            <div class="accordion-header">

                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq-collapsefour"
                                    aria-expanded="false" aria-controls="faq-collapsefour">

                                    Are your product rates negotiable?

                                </button>

                            </div>

                            <div id="faq-collapsefour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFaq">

                                <div class="accordion-body">
                                    <p class="mb-0">
                                        Yes. According to our rate chart, rates are
                                        negotiable. Prices may also vary depending
                                        upon market conditions.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <!-- FAQ 5 -->
                        <div class="accordion-item mb-3">

                            <div class="accordion-header">

                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq-collapsefive"
                                    aria-expanded="false" aria-controls="faq-collapsefive">

                                    What is the payment condition?

                                </button>

                            </div>

                            <div id="faq-collapsefive" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFaq">

                                <div class="accordion-body">
                                    <p class="mb-0">
                                        The payment condition mentioned in the rate
                                        chart is same-day payment.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <!-- FAQ 6 -->
                        <div class="accordion-item mb-3">

                            <div class="accordion-header">

                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq-collapsesix"
                                    aria-expanded="false" aria-controls="faq-collapsesix">

                                    Where is Sri Gopinath Food Product located?

                                </button>

                            </div>

                            <div id="faq-collapsesix" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFaq">

                                <div class="accordion-body">
                                    <p class="mb-0">
                                        Our office is located at D-10, Jagannath Ghat Road,
                                        Kolkata - 700007. Our factory address is Sabji Bagan,
                                        Kamarhati, Kolkata - 700109.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <!-- FAQ 7 -->
                        <div class="accordion-item mb-3">

                            <div class="accordion-header">

                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#faq-collapseseven"
                                    aria-expanded="false" aria-controls="faq-collapseseven">

                                    How can I contact Sri Gopinath Food Product?

                                </button>

                            </div>

                            <div id="faq-collapseseven" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFaq">

                                <div class="accordion-body">
                                    <p class="mb-0">
                                        You can contact us at
                                        <a href="tel:+919830934230">
                                            9830934230
                                        </a>
                                        /
                                        <a href="tel:+919883854486">
                                            9883854486
                                        </a>
                                        for product and business enquiries.
                                    </p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- End FAQ Section -->

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
                            <p class="description">Absolutely loved the products! Packed with flavor and perfect quality for our family meals.</p>

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
                            <p class="description">The sauces and rose water are amazing! Consistent quality and prompt delivery every time.</p>

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
    <section class="partner-section section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title-one mb-0">Our Partners</h2>
            </div>
            <div class="partner-slider">
                <div class="partner-item">
                    <img src="/assets/img/logo.jpeg" alt="partner" class="img-fluid">
                </div>
                <div class="partner-item">
                    <img src="/assets/img/logo.jpeg" alt="partner" class="img-fluid">
                </div>
                <div class="partner-item">
                    <img src="/assets/img/logo.jpeg" alt="partner" class="img-fluid">
                </div>
                <div class="partner-item">
                    <img src="/assets/img/logo.jpeg" alt="partner" class="img-fluid">
                </div>
                <div class="partner-item">
                    <img src="/assets/img/logo.jpeg" alt="partner" class="img-fluid">
                </div>
                <div class="partner-item">
                    <img src="/assets/img/logo.jpeg" alt="partner" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- End Partners Section -->

    <?php if (isset($page->description) && !empty(trim(strip_tags($page->description)))): ?>
    <section class="section py-4">
        <div class="container">
            <div><?= $page->description ?></div>
        </div>
    </section>
    <?php endif; ?>
</div>