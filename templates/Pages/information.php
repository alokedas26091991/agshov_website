<section class="ptb-50 information-list">
        <div class="container">
            <div class="hed_title pt-3 mb-5 polkqw">
                <h2>Our <span>Informations</span></h2>
            </div>
            <div class="row">
                <?php
            foreach($info as $v)
            {
            ?>
                <div class="col-md-4">
                    <div class="post-content position-relative">
                        <div class="post-text">
                            <img src="../../upload/homepageimage/<?=$v->photo?>" class="img-responsive w-100 mb-4" alt="">
                            <h2 class="theme-color2 mb-3 mt-0"><?=$v->name?></h2>
                            <div class="news-category-home">
                                <span><i class="fa fa-calendar-o mr-2 theme-color" aria-hidden="true"></i><?=date("F Y", strtotime($v->create_date)); ?></span>
                            </div>
                            <!--<p class="text-justify">-->
                                <?=$v->details?>
                            <!--</p>-->
                            <a href="/pages/information_details/<?=$v->id?>">Read More<i class="fa fa-long-arrow-right ml-2" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
               
            </div>
        </div>
    </section>
