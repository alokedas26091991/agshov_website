    <!-- Photo Gallery Section Start -->
    <section class="ptb-50" id="gallery">
      <div class="container">
        <div class="hed_title pt-3 mb-5 polkqw">
                <h2>Marketing <span>Photos</span></h2>
            </div>
        <div id="image-gallery">
          <div class="row">
              <?php
                foreach($csr as $v)
                {
                ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
              <div class="img-wrapper">
                <a href="../../upload/homepageimage/<?=$v->photo?>"><img src="../../upload/homepageimage/<?=$v->photo?>" class="img-responsive"></a>
                <div class="img-overlay">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
              </div>
            </div>
            <?php
                }
            ?>
           
          </div><!-- End row -->
        </div><!-- End image gallery -->
      </div><!-- End container --> 
    </section>
    <!-- Photo Gallery Section End -->