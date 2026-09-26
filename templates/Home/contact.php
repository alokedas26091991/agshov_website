<div class="page-wrapper">

    <!-- Start Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="breadcrumb-item">
                <h1 class="breadcrumb-title">Contact Us</h1>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-items"><a href="/"><i class="icon-house me-2"></i>Home</a></li>
                        <li class="breadcrumb-items"><span><i class="icon-chevron-right"></i></span></li>
                        <li class="breadcrumb-items active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb -->

    <!-- Contact Us Section -->
    <section class="contact-section section">
        <div class="container">

            <!-- Start Row -->
            <div class="row g-4 align-items-center">

                <!-- Contact Information -->
                <div class="col-lg-6 col-md-12">

                    <div class="section-heeader mb-4 pb-4 border-bottom">
                        <h2 class="mb-2 fs-32 fw-bold">
                            We'd love to hear from you!
                        </h2>

                        <p class="mb-0">
                            Have an enquiry about our products, pricing or pack sizes?
                            Get in touch with Sri Gopinath Food Product and our team
                            will be happy to assist you.
                        </p>
                    </div>

                    <div class="contact-details">

                        <!-- Office Address -->
                        <div class="contact-item box-shadow">

                            <div class="bg-dark avatar avatar-lg rounded-pill fs-20">
                                <i class="icon-map-pinned"></i>
                            </div>

                            <div>
                                <h3>Office Address</h3>

                                <p>
                                    D-10, Jagannath Ghat Road,
                                    Kolkata - 700007
                                </p>
                            </div>

                        </div>


                        <!-- Contact Information -->
                        <div class="contact-item box-shadow">

                            <div class="bg-dark avatar avatar-lg rounded-pill fs-20">
                                <i class="icon-headset"></i>
                            </div>

                            <div>
                                <h3>Contact Information</h3>

                                <p>
                                    Phone :
                                    <a href="tel:+919830934230">
                                        +91 9830934230
                                    </a>
                                </p>

                          
                            </div>

                        </div>
                        <!-- Contact Information -->
                        <div class="contact-item box-shadow">

                            <div class="bg-dark avatar avatar-lg rounded-pill fs-20">
                                <i class="icon-headset"></i>
                            </div>

                            <div>
                                <h3>Email Us</h3>

                                <p>
                                    Mail us :
                                    <a href="mailto:
                                       daujii@srigopinathfoodproduct.com
                                    ">
                                       daujii@srigopinathfoodproduct.com
                                    </a>
                                </p>

                          
                            </div>

                        </div>


                        <!-- Factory Address -->
                        <div class="contact-item box-shadow">

                            <div class="bg-dark avatar avatar-lg rounded-pill fs-20">
                                <i class="icon-briefcase-business"></i>
                            </div>

                            <div>
                                <h3>Factory Address</h3>

                                <p>
                                    Sabji Bagan, Kamarhati,
                                    Kolkata - 700109
                                </p>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- End Contact Information -->


                <!-- Contact Form -->
                <div class="col-lg-6 col-md-12">

                    <div class="contact-form custom-form card bg-light">

                        <div class="card-header bg-light mb-3">

                            <h3 class="mb-2 fs-32">
                                Send Us Message
                            </h3>

                            <p class="mb-0">
                                Have a product enquiry or want to know more about
                                our products and pricing? Send us a message.
                            </p>

                        </div>

                        <div class="card-body p-0">

                            <form action="/contact-us" method="post">
                                <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">

                                <!-- Start Row -->
                                <div class="row g-4 mb-4">

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="name" class="visually-hidden">Your Name</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required autocomplete="name">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="mobile" class="visually-hidden">Phone / Mobile</label>
                                            <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter your phone number" required autocomplete="tel">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="email" class="visually-hidden">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required autocomplete="email">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <label for="message" class="visually-hidden">Message</label>
                                            <textarea class="form-control" rows="4" id="message" name="message" placeholder="Enter your message" required></textarea>
                                        </div>
                                    </div>

                                </div>
                                <!-- End Row -->

                                <div class="d-flex align-items-center justify-content-end">
                                    <button type="submit" name="sub" class="primary-btn btn w-100">
                                        Send Message <i class="icon-chevron-right"></i>
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
                <!-- End Contact Form -->

            </div>
            <!-- End Row -->

            <!-- Location Map -->
            <div class="row mt-4">

                <div class="col-lg-12">

                    <div class="location-map">

                        <iframe title="Sri Gopinath Food Product Office Location"
                            src="https://www.google.com/maps?q=D-10,+Jagannath+Ghat+Road,+Kolkata+700007&output=embed"
                            height="350" style="border:0; width:100%;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>

                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- End Contact Us Section -->
</div>