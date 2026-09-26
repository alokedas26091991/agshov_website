 <section class="ptb-50">
        <div class="container">
            <div class="hed_title pt-3 mb-5 polkqw">
                <h2>Marketing <span>Videos</span></h2>
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
