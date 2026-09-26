<style>
    .main {
        padding: 20px 30px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .30);
    }

    .tab {
        margin-top: 100px;
    }
    .top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 50px;
}
.right {
    text-align: center;
    padding: 10px 20px;
    background-color: #ff0000;
    border-radius: 5px;
    transition: .45s;
}
.right:hover{
    background-color: #0cacee;
}
.left h2 {
    margin-bottom: 0px;
}
.right a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
}

</style>



<div class="container-fluid header bg-custom-12 p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-12 p-5">
            <h1 class="display-6 animated fadeIn mb-4 text-center">A To Z Diseases</h1>
            <nav aria-label="breadcrumb animated fadeIn ">
                <ol class="breadcrumb text-uppercase text-center d-flex justify-content-center">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">A To Z Diseases</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- Header End -->

<div class="tab">
    <div class="container">
        <div class="main">
            <!-- Tabs navigation -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <?php foreach ($diseases as $key => $disease): ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?= $key == 0 ? 'active' : ''; ?>"
                            id="pills-<?= h($disease->id); ?>-tab"
                            data-bs-toggle="pill"
                            data-bs-target="#pills-<?= h($disease->id); ?>"
                            type="button"
                            role="tab"
                            aria-controls="pills-<?= h($disease->id); ?>"
                            aria-selected="<?= $key == 0 ? 'true' : 'false'; ?>">
                            <?= h($disease->name); ?>
                        </button>
                    </li>
                <?php endforeach; ?>
            </ul>

            <!-- Tabs content -->
           <!-- Tabs content -->
<div class="tab-content" id="pills-tabContent">
    <?php foreach ($diseases as $key => $disease): ?>
        <div class="tab-pane fade <?= $key == 0 ? 'show active' : ''; ?>"
             id="pills-<?= h($disease->id); ?>"
             role="tabpanel"
             aria-labelledby="pills-<?= h($disease->id); ?>-tab"
             tabindex="0">

            <div class="top col-lg-12">
                <div class="left col-lg-9">
                    <h2><?= $disease->title ?></h2>
                </div>
                <div class="right col-lg-3">
                    <a href="/pages/bookappointment">Book An Appointment</a>
                </div>
            </div>
            
            <div class="text col-lg-12">
                <p><?= $disease->details ?></p>
            </div>

            <!-- Testimonials Section -->
            <div class="container-fluid mt-5">
                <div class="container p-4 shadow details-product">
                    <div class="row g-0 gx-5 align-items-end">
                        <div class="col-lg-12 text-start text-lg-end">
                            <ul class="nav nav-pills d-inline-flex justify-content-between mb-5">
                                <li class="nav-item">
                                    <a class="active" data-bs-toggle="pill" href="#tab-2-<?= h($disease->id); ?>">Reviews</a>
                                </li>
                                <li class="nav-item">
                                    <a data-bs-toggle="pill" href="#tab-1-<?= h($disease->id); ?>">Treatment Results</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content">
                        <!-- Reviews Tab -->
                        <div id="tab-2-<?= h($disease->id); ?>" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <?php if (!empty($testimonialsByDisease[$disease->id])): ?>
                                    <?php foreach ($testimonialsByDisease[$disease->id] as $t1): ?>
                                        <div class="testimonials-name mb-3">
                                            <h3 class="fs-6"><?= h($t1->name); ?></h3>
                                            <p><?= $t1->details; ?></p>
                                            <?php if ($t1->rating): ?>
                                                <strong>Click here for More details
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal<?= h($t1->id); ?>">
                                                        Play Video
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModal<?= h($t1->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <video controls class="video-test">
                                                                        <source src="/upload/allimages/<?=h($t1->rating); ?>">
                                                                    </video>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </strong>
                                            <?php endif; ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No testimonials available for this disease.</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Treatment Results Tab -->
                        <div id="tab-1-<?= h($disease->id); ?>" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                <div class="col-lg-3 col-md-6">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid" src="/img/product-details/1.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid" src="/img/product-details/2.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid" src="/img/product-details/3.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="property-item rounded overflow-hidden">
                                        <div class="position-relative overflow-hidden">
                                            <a href=""><img class="img-fluid" src="/img/product-details/4.jpg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end tab-content -->
                </div> <!-- end container -->
            </div> <!-- end reviews section -->
        </div> <!-- end tab-pane for each disease -->
    <?php endforeach; ?>
</div>

        </div>
    </div>
</div>


