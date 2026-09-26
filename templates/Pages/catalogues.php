<section class="tenderpakej pt-2 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="hed_title pt-5 pb-5">
                    <h2>Our<span> Catalogues</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-theme brand5">

                <?php
                        foreach($catalogues as $v)
                        {
                        ?> 
                    <div class="item new-catalogue-item">
                        <div class="download-main-con">
                        
                            <div class="under-dow-hol">
                                <h3><?=$v->title?></h3>
                                
                                <!-- <a href="path/to/your-file.pdf" download="your-file.pdf" class="buynow">Download</a> -->

                                <a href="<?php echo $this->Url->image("upload/$v->pdf_link", ['pathPrefix' => '']) ?>" download><button class="buynow">Download</button></a>
                                


                            </div>
                           
                        </div>
                    </div>
                    <?php
                        }
                        ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>