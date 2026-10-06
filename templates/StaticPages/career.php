<!-- BREADCRUMB AREA START -->
<div class="ltn__breadcrumb-area text-left bg-overlay-white-30 bg-image" data-bs-bg="/img/banner/main-banner.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="ltn__breadcrumb-inner">
                    <h1 class="page-title">Make Career With Us</h1>
                    <div class="ltn__breadcrumb-list">
                        <ul>
                            <li><a href="/"><span class="ltn__secondary-color"><i class="fas fa-home"></i></span> Home</a></li>
                            <li>Make Career With Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BREADCRUMB AREA END -->

<!-- CAREER BENEFITS AREA START -->
<div class="agshov-career-benefit-area pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="section-title-area text-center">
                    <h6 class="section-subtitle ltn__secondary-color">// Why Join Agshov</h6>
                    <h2 class="section-title">Grow Your Career With India's <span class="ltn__secondary-color">Fastest Growing Pharma Company</span></h2>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="agshov-career-benefit-card">
                    <div class="benefit-icon"><i class="fa-solid fa-seedling"></i></div>
                    <h4>Professional Growth</h4>
                    <p>We focus on people development and groom our employees in soft skills to help them reach top positions.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="agshov-career-benefit-card">
                    <div class="benefit-icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
                    <h4>Ethics & Care</h4>
                    <p>Work with a company that values integrity and trust, producing world-class medicines for global outreach.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="agshov-career-benefit-card">
                    <div class="benefit-icon"><i class="fa-solid fa-rocket"></i></div>
                    <h4>Limitless Opportunity</h4>
                    <p>For the right candidate, only sky is the limit! We offer lucrative opportunities across administrative and sales segments.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CAREER BENEFITS AREA END -->

<!-- REWARDING CAREER AREA START -->
<section class="agshov-rewarding-career-section">
    <div class="container">
        <div class="career-split-wrap">
            <div class="row g-0">
                <div class="col-lg-6">
                    <div class="career-img-box">
                        <img src="/img/career.jpg" alt="Agshov Team">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="career-content-box">
                        <h6 class="section-subtitle ltn__secondary-color"># Career Opportunity</h6>
                        <h2 class="section-title">Have a Rewarding Career with <span>Pharmaceutical Companies Jobs</span></h2>
                        <p>AGSHOV pharmaceuticals have a rich portfolio of medicines that is known for its impeccable quality standards and competitive pricing. By representing AGSHOV Pharmaceuticals, you will be responsible for expanding the market for products with significant value.</p>
                        <p>We offer lucrative career opportunities to qualified individuals who would work for one of the most dynamic and modern pharmaceutical companies producing quality medicines in the niches of ophthalmology, antibiotics, and others.</p>
                        <p>With performance as the key to succeed, the candidates joining us in various capacities (administration, sales & marketing etc) can aspire to reach the top positions. And yes, for the right candidate, only sky is the limit!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- REWARDING CAREER AREA END -->

<!-- CAREER FORM AREA START -->
<div class="agshov-career-form-area pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="career-form-wrap p-5 bg-light rounded">
                    <div class="section-title-area text-center mb-4">
                        <h2 class="section-title">Apply For A Position</h2>
                        <p>Send us your details and resume, and our HR team will get back to you soon.</p>
                    </div>
                    <div id="career-status-message" class="mb-3 d-none"></div>
                    <form action="/home/enquiry" method="post" enctype="multipart/form-data" class="career-form">
                        <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                        <input type="hidden" name="type" value="career">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control py-3" placeholder="Full Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" class="form-control py-3" placeholder="Email Address" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" class="form-control py-3" placeholder="Phone Number" required>
                            </div>
                            <div class="col-md-6">
                                <select name="subject" class="form-select py-3">
                                    <option value="">Select Position</option>
                                    <option value="Career: Sales & Marketing">Sales & Marketing</option>
                                    <option value="Career: Administration">Administration</option>
                                    <option value="Career: HR & Management">HR & Management</option>
                                    <option value="Career: Others">Others</option>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <textarea name="message" class="form-control" rows="4" placeholder="A brief about yourself..."></textarea>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <button class="theme-btn-1 btn btn-effect-1 text-uppercase px-5 py-3" type="submit">Submit Application</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CAREER FORM AREA END -->

<script>
document.addEventListener('DOMContentLoaded', function () {
    const careerForm = document.querySelector('.career-form');
    const statusMsg = document.getElementById('career-status-message');
    if (careerForm) {
        careerForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const submitBtn = careerForm.querySelector('button[type="submit"]');
            const origText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin me-2"></i> Submitting...';

            const formData = new FormData(careerForm);
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
                submitBtn.innerHTML = origText;
                if (statusMsg) {
                    statusMsg.classList.remove('d-none');
                    if (data.success) {
                        statusMsg.className = 'alert alert-success p-3 text-center mb-4';
                        statusMsg.textContent = data.message || 'We have received your application. Our HR team will get back to you soon!';
                        careerForm.reset();
                    } else {
                        statusMsg.className = 'alert alert-danger p-3 text-center mb-4';
                        statusMsg.textContent = data.message || 'An error occurred. Please try again.';
                    }
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = origText;
                if (statusMsg) {
                    statusMsg.classList.remove('d-none');
                    statusMsg.className = 'alert alert-danger p-3 text-center mb-4';
                    statusMsg.textContent = 'An error occurred while submitting your application. Please try again.';
                }
            });
        });
    }
});
</script>
