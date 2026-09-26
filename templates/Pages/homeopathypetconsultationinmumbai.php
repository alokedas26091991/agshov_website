<style>
    .section-main p,span{
        font-family: "Heebo", sans-serif !important;
    }
</style>
<div class="container-xxl py-5">
  <div class="container-fluid shadow p-4">
    <div class="row g-5 align-items-center">
      <div class="col-lg-12 wow fadeIn" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeIn;">
        <div class="row">
          <div class="col-lg-8">
            <p class="mb-0 fw-bold">Dr Yatri Thacker </p>
            <?php
            foreach ($test as $t1) {
            ?>
              <h1 class="spec-tags-1"><?= $t1->name ?></h1>
            <?php
            }
            ?>
            <div class="line"></div>
          </div>
          <div class="col-lg-4 text-end ">
            <a class="btn btn-primary px-5 shadow m-t-mob" href="/pages/bookappointment">Book an Appoinment</a>
          </div>
        </div>
        <div class="mt-4 section-main">
          <?php
          foreach ($test as $t1) {
          ?>
            <p><?= $t1->details ?></p>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>