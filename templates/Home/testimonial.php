<link href="/assets/css/styletestimonial.css" rel="stylesheet">
<div class="container-fluid bg-white p-0">


    <div class="container-fluid bg-white p-0 top-header">



        <!-- Header Start -->
        <div class="container-fluid header bg-custom-12 p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                <div class="col-md-12 p-5">
                    <h1 class="display-6 animated fadeIn mb-4 text-center">Testimonials</h1>
                    <nav aria-label="breadcrumb animated fadeIn ">
                        <ol class="breadcrumb text-uppercase text-center d-flex justify-content-center">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>

                            <li class="breadcrumb-item text-body active" aria-current="page">Testimonials</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
        <!-- Header End -->




        <!-- testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container-fluid shadow p-4">
                <div class="row g-5 align-items-center">

                    <div class="col-lg-12 wow fadeIn " data-wow-delay="0.5s">
                        <div class="row">
                            <div class="col-lg-12 text-center d-flex justify-content-center align-items-center flex-column">
                                <p class="mb-0 fw-bold">Take a Look </p>
                                <h1 class="spec-tags-1">Our Testimonials</h1>
                                <div class="line"></div>
                            </div>

                        </div>
                        <div class="mt-4">
                            <div class="">

                                <?php
                                foreach ($testimonial1 as $t1) {
                                ?>
                                    <div class="slideshow">
                                        <div class="test">
                                            <div class="testimonials-name mb-3">
                                                <p><?= $t1->details ?></p>
                                                <?php
                                                if($t1->rating)
                                                {
                                                ?>
                                                <strong>Click here for More details
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $t1->id ?>">
                                                        Play Video
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal<?= $t1->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <video controls class="video-test">
                                                                        <source src="/upload/allimages/<?= $t1->rating ?>">

                                                                    </video>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </strong>
                                                <?php
                                                }
                                                ?>
                                            </div>
                                            <h2><?= $t1->name ?></h3>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>



                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



</div>