<section class="tenderpakej service_area pt-3 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="hed_title pt-5 pb-5">
                        <h2>
                            <lebel style="color:#FFF;">Our</lebel><span> Customers say</span></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-theme brand testimonial-style-3">
                        <?php
                        foreach($feed as $v)
                        {
                        ?>
                        <div class="item">
                            <div class="round_img1">
                                <div class="testimonal">
                                    <div class="row justify-content-center align-items-center">
                                        <div class="col-lg-6 col-12">
                                            <iframe width="100%" height="225" src="https://www.youtube.com/embed/<?=$v->link?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="content">
                                                <p class="text-justify mb-0"><?=$v->details?></p>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <div class="clint-info mt-3">
                                                <div class="imagbox text-center"><img src="../../upload/homepageimage/<?=$v->photo?>" class="float-none" alt="testimonal image"></div>
                                                <h4 class="text-white text-center"><?=$v->name?></h4>
                                                <p class="text-white text-center">Customer</p>
                                            </div>
                                        </div>
                                    </div>
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
