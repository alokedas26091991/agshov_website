<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="/img/banner/main-banner.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Contact Us</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Contact Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- CONTACT INFO AREA START -->
<div class="agshov-contact-info-area pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Address -->
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="agshov-contact-info-card">
                    <div class="contact-info-icon">
                        <i class="fa-solid fa-location-dot mt-1"></i>
                    </div>
                    <h3>Office Address</h3>
                    <p>AGSHOV PHARMACEUTICALS PVT LTD,<br> BHAWANI ALLEN ENCLAVE, BLOCK -A,<br> KRISHNAPUR, MONDAL PARA<br> KOLKATA -700102</p>
                </div>
            </div>
            <!-- Phone -->
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="agshov-contact-info-card">
                    <div class="contact-info-icon">
                        <i class="fa-solid fa-phone-volume mt-1"></i>
                    </div>
                    <h3>Connect With Us</h3>
                    <p><strong>Sales Enquiry:</strong> <a href="tel:9875633787">9875633787</a></p>
                </div>
            </div>
            <!-- Email -->
            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                <div class="agshov-contact-info-card">
                    <div class="contact-info-icon">
                        <i class="fa-solid fa-envelope-open-text mt-1"></i>
                    </div>
                    <h3>Mail Us</h3>
                    <p>
                        <strong>Connect With Us:</strong> <a href="mailto:enquiry@agshovpharma.com">enquiry@agshovpharma.com</a><br>
                        <strong>Business Enquiry:</strong> <a href="mailto:sales@agshovpharma.com">sales@agshovpharma.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTACT INFO AREA END -->

<!-- CONTACT MESSAGE & MAP AREA START -->
<div class="agshov-contact-message-area pb-5">
    <div class="container">
        <div class="row agshov-contact-wrapper g-0 align-items-stretch">
            <!-- Contact Form -->
            <div class="col-lg-6">
                <div class="agshov-contact-form-box">
                    <div class="section-title-area">
                        <h6 class="section-subtitle ltn__secondary-color">// Drop a Message</h6>
                        <h2 class="section-title">Get In Touch For Any<br>Enquiry or Partnership</h2>
                    </div>
                    <form id="contact-form" action="/home/enquiry" method="post" class="agshov-form">
                        <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-item with-icon">
                                    <span class="input-icon"><i class="fa-solid fa-user mt-1"></i></span>
                                    <input type="text" name="name" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-item with-icon">
                                    <span class="input-icon"><i class="fa-solid fa-envelope mt-1"></i></span>
                                    <input type="email" name="email" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-item with-icon">
                                    <span class="input-icon"><i class="fa-solid fa-phone mt-1"></i></span>
                                    <input type="text" name="phone" placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-item with-icon">
                                    <span class="input-icon"><i class="fa-solid fa-layer-group mt-1"></i></span>
                                    <input type="text" name="subject" placeholder="Subject">
                                </div>
                            </div>
                        </div>
                        <div class="input-item textarea-item with-icon">
                            <span class="input-icon textarea-icon"><i class="fa-solid fa-pen mt-1"></i></span>
                            <textarea name="message" placeholder="Your Message" required></textarea>
                        </div>
                        <div class="btn-wrapper mt-0">
                            <button class="theme-btn-1 btn btn-effect-1 text-uppercase w-100" type="submit">Submit Request <i class="fa-solid fa-arrow-right"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Google Map -->
            <div class="col-lg-6">
                <div class="agshov-contact-map-box h-100">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14736.331291113038!2d88.42398405000001!3d22.600645600000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0275c6bf2bd8ef%3A0xeab50d99042b4b44!2sBhawani%20Allen%20Enclave!5e0!3m2!1sen!2sin!4v1713702123456!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CONTACT MESSAGE & MAP AREA END -->