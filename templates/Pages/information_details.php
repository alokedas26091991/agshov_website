<section class="ptb-50">
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                <div class="post-content">
                    <div class="post-text">
                        <img src="../../upload/homepageimage/<?=$v->photo?>" class="img-responsive w-100 mb-5" alt="">
                        <h2 class="theme-color2 mb-3 mt-0"><?=$v->name?></h2>
                        <div class="news-category-home">
                            <span><i class="fa fa-calendar-o mr-2 theme-color" aria-hidden="true"></i><?=date("F Y", strtotime($v->create_date)); ?></span>
                        </div>
                        <p class="text-justify"><?=$v->details?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="post-content">
                    <div id="sidebar" class="">
                        <div class="widget widget-post mb-0 pb-0 border-none">
                            <h3 class="theme-color mb-3">Other Information</h3>
                            <div class="small-border"></div>
                            <ul>  
                                  <?php foreach($info as $v){ ?>
                                <li>
                                    <a href="/pages/information_details/<?=$v->id?>" class="pl-0">
                                        <div class="row">
                                            <div class="col-lg-3 col-xs-3 pr-0">
                                                <img src="../../upload/homepageimage/<?=$v->photo?>" class="img-responsive recent-img">
                                            </div>
                                            <div class="col-lg-9 col-xs-9">
                                                <h4 class="mt-0 theme-color2 mb-2"><?=$v->name?></h4>
                                                <div class="news-category-home news-category-home2">
                                                    <span><i class="fa fa-calendar-o mr-2 theme-color" aria-hidden="true"></i><?=date("F Y", strtotime($v->create_date)); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                 <?php } ?> 
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>