<style>
  ul {
    list-style-type: none;
  }
  
  .xyz .col-lg-9 {
	flex: 0 0 auto;
	width: 100%;
}
.tagcloud {

list-style-type: none;
}
</style>
<main class="main">
        	<div class="page-header text-center" style="background-image: url('/img/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Blog Details</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                            <article class="entry single-entry">
                                <figure class="entry-media">
                                    <img src="/upload/allimages/<?= $post1->banner_photo ?>" alt="image desc">
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                               

                                    <h2 class="entry-title">
                                    <?= $post1->title ?>
                                    </h2><!-- End .entry-title -->

                              
                                    <div class="entry-content editor-content">
                                        <p><?= $post1->details ?></p>
                                    </div><!-- End .entry-content -->

                                   
                                </div><!-- End .entry-body -->

                            </article><!-- End .entry -->

                      
                		</div><!-- End .col-lg-9 -->

                		<aside class="col-lg-3">
                			<div class="sidebar">
                		

                        <div class="widget widget-cats">
               <h3 class="widget-title">Categories</h3><!-- End .widget-title -->
               <ul>
                 <?php
                  foreach ($postcategories1 as $p1) {
                  ?>
                   <li><a href="<?php echo $this->Url->build(["controller" => "Blogs", "action" => "blogcategory", $p1->slug]); ?>"><?= $p1->name ?></a></li>
                 <?php
                  }
                  ?>
               </ul>
             </div>

                    

                                <div class="widget">
                                    <h3 class="widget-title">Browse Tags</h3><!-- End .widget-title -->

                                    <div class="tagcloud">
                 <?php
                  foreach ($tags1 as $p2) {
                  ?>
                   <li style>
                     <a href="<?php echo $this->Url->build(["controller" => "Blogs", "action" => "tag", $p2->slug]); ?>"><?= $p2->name ?></a>
                   <?php
                  }
                    ?>
               </div>
                                </div><!-- End .widget -->

                        
                			</div><!-- End .sidebar sidebar-shop -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                  <div class="row mt-5">
            <div class="col-lg-9 col-12 shadow p-3">
              <h3 class="fs-5 text-center">Share the Post</h3>
              <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="display:flex; justify-content:center;">
              <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_whatsapp"></a>
                <a class="a2a_button_linkedin"></a>
                <a class="a2a_button_twitter"></a>
</div>
<script async src="https://static.addtoany.com/menu/page.js"></script>
              </div>
              <!-- AddToAny BEGIN -->
<!--<div class="a2a_kit a2a_kit_size_32 a2a_default_style text-center" >-->
<!--<a class="a2a_dd" href="https://www.addtoany.com/share"></a>-->
<!--<a class="a2a_button_facebook"></a>-->
<!--<a class="a2a_button_whatsapp"></a>-->
<!--<a class="a2a_button_linkedin"></a>-->
<!--<a class="a2a_button_twitter"></a>-->
<!--</div>-->
<!--<script async src="https://static.addtoany.com/menu/page.js"></script>-->
<!-- AddToAny END -->
            </div>
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->