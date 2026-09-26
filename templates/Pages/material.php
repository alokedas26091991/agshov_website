<section class="ptb-50 sd-pdf">
      <div class="container">
          <div class="hed_title pt-3 mb-5 polkqw">
              <h2>Marketing <span>Materials</span></h2>
          </div>
          <div class="row">
             <?php
            foreach($mat as $v)
            {
            ?>
              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <aside class="widget widget-download with-title">
                      <div class="d-flex align-items-center download_block">
                          <div class="download_img_icon">
                              <img class="img-fluid auto_size" width="46" height="53" src="../assets/images/pdf.png" alt="download-pdf-img">
                          </div>
                          <div class="padding_left20">
                              <a data-fancybox="" data-type="iframe" data-src="../../upload/homepageimage/<?=$v->photo?>" href="javascript:;">
                                  <h2 class="fs-18 ttm-textcolor-skincolor mb-0 mt-0"><?=$v->name?></h2>
                              </a>
                          </div>
                      </div>
                  </aside>
              </div>
              <?php
            }
            ?>
              
          </div>
      </div>
  </section>