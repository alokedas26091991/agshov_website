<div class="container-fluid header bg-custom-12 p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-12 p-5">
            <h1 class="display-6 animated fadeIn mb-4 text-center">Service Details</h1>
            <nav aria-label="breadcrumb animated fadeIn ">
                <ol class="breadcrumb text-uppercase text-center d-flex justify-content-center">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>

                    <li class="breadcrumb-item text-body active" aria-current="page">Service Details</li>
                </ol>
            </nav>
        </div>

    </div>
</div>
<div class="container-xxl py-5">
    <div class="container-fluid shadow p-4">
        <div class="row g-5">
            <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0 ">
                    <img class="img-fluid w-100" src="../../upload/allimages/<?= $servicesdetails->image ?>" />
                </div>
            </div>
            <div class="col-lg-8 wow fadeIn " data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="spec-tags-1"><?= $servicesdetails->title ?></h2>
                        <div class="line"></div>
                    </div>
                    <div class="col-lg-4 ">
                        <a class="btn btn-primary px-5 shadow m-t-mob" href="/pages/bookappointment">Book an Appoinment</a>
                    </div>
                </div>
                <div class="mt-4">
                    <?= $servicesdetails->details_1 ?>
                </div>
                <div class="mt-4">
                    <?= $servicesdetails->details_2 ?>
                </div>
                <div class="mt-4">
                    Fees: <?= $servicesdetails->fees ?>
                </div>
            </div>
        </div>
    </div>
</div>
