    <section class="ptb-50">
        <div class="container">
            <div class="hed_title pt-3 mb-5 polkqw">
                <h2><?=$support->name?></h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <?=$support->details?>
                </div>
                <div class="col-md-2">
                    <img src="../../upload/homepageimage/<?=$support->photo?>" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="insseclation fixed_img pt-5 pb-5" style="background-image: url('../../upload/homepageimage/<?=$ins->photo?>');">
        <div class="container block-paralax">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-white mb-5"><?=$ins->details?></h2>
                    <a href="#" data-toggle="modal" data-target="#exampleModalCenter-personal-installation" class="btn btn__primary tpobtn">Request for Personal installation</a>
                </div>
            </div>
            <div class="clr"></div>
        </div>
    </section>
    <section class="ptb-50">
        <div class="container">
            <div class="hed_title pt-3 mb-5 polkqw">
                <h2>Product Installation <span>Videos</span></h2>
            </div>
            <div class="row">
                <?php
                foreach($video as $v)
                {
                ?>
                <div class="col-md-4">
                    <div class="video-box">
                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?=$v->link?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <h4 class="video-title mb-0"><?=$v->name?></h4>
                    </div>                    
                </div>
                <?php
                }
                ?>
                
             </div>
        </div>
    </section>