<main class="main">


    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb mt-0">
                <li class="breadcrumb-item"><a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"index"]); ?>"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#!"><?=$Pro1->name?></a></li>
              
                <li class="breadcrumb-item active" aria-current="page"><a href="#!"><?=$Pro2->name ?></a></li>
               
            </ol>
        </div><!-- End .container -->
    </nav>

	<div class="container">
        <div class="row">
            <div class="col-lg-9">
               

                <div class="row row-sm">
                    <?php
                    foreach($Products1 as $key=>$book)
                	{
                    ?>
                    <div class="col-6 col-md-4">
                        <div class="product">
                            <figure class="product-image-container">
                                <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details/$book->slug"]); ?>" class="product-image">
                                    <img src="<?php echo $this->Url->image("upload/product/$book->photo", ['pathPrefix' => '']) ?>" alt="product">
                                </a>
                              
                               
                            </figure>
                            <div class="product-details">
                                <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span><!-- End .ratings -->
                                    </div><!-- End .product-ratings -->
                                </div><!-- End .product-container -->
                                <h2 class="product-title">
                                    <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details/$book->slug"]); ?>"><?=$book->name?></a>
                                </h2>
                                 <?php
                                if($book->offer_price==$book->actual_price)
                                {
                                ?>
                                 <div class="price-box">
                                
                                   <span class="product-price">
                                       <i class="fa fa-inr"></i><?=$book->actual_price?></span> 
                                 </div><!-- End .price-box -->
                                 <?php
                                }
                                else
                                {
                                    
                                    
                                ?>
                                
                                 <div class="price-box">
                                 <span class="old-price"><i class="fa fa-inr"></i><?=$book->actual_price?></span>
                                    <span class="product-price"><i class="fa fa-inr"></i><?=$book->offer_price?></span>
                                 </div><!-- End .price-box -->
                                  <span class="product-label label-sale">
                                    
                                     
                                     <?=number_format((100-((100 * $book->offer_price)/$book->actual_price)) , 3); ?>%</span>
                                 <?php
                                }
                                ?>
                                
                                <div class="product-action">
                                     <a href="<?php echo $this->Url->build(["controller"=>"Carts","action"=>"wishlist/$book->slug"]); ?>" class="paction add-wishlist" title="Add to Wishlist">
                                        <span>Add to Wishlist</span>
                                    </a>

                                   

                                    <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"compare/$book->slug"]); ?>" class="paction add-compare" title="Add to Compare">
                                        <span>Add to Compare</span>
                                    </a>
                                </div><!-- End .product-action -->
                            </div><!-- End .product-details -->
                        </div><!-- End .product -->
                    </div><!-- End .col-md-4 -->
                    <?php
                	}
                	?> 


                </div><!-- End .row -->

               
            </div><!-- End .col-lg-9 -->

            <aside class="sidebar-shop col-lg-3 order-lg-first">
                <div class="sidebar-wrapper">
                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-1" role="button" aria-expanded="true" aria-controls="widget-body-1"><?=$Pro5->name?></a>
                        </h3>

                        <div class="collapse show" id="widget-body-1">
                            <div class="widget-body">
                                <ul class="cat-list">
                                    <?php
                                    foreach($Pro3 as $key=>$subcategory)
                                	{
                                    ?>
                                    <li><a href="#"><?=$subcategory->name?></a></li>
                                   
                                    <?php
                                	}
                                	?>
                                </ul>
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->



                   

                    <div class="widget">
                        <h3 class="widget-title">
                            <a data-toggle="collapse" href="#widget-body-4" role="button" aria-expanded="true" aria-controls="widget-body-4"><?=$Pro1->name?></a>
                        </h3>

                        <div class="collapse show" id="widget-body-4">
                            <div class="widget-body">
                                <ul class="cat-list">
                                    <?php
                                    foreach($Pro6 as $key=>$type)
                                	{
                                    ?>
                                    <li><a href="#"><?=$type->name?> </a></li>
                                    
                                  <?php
                                	}
                                	?>
                                </ul>
                            </div><!-- End .widget-body -->
                        </div><!-- End .collapse -->
                    </div><!-- End .widget -->

                    

                   

                   
                </div><!-- End .sidebar-wrapper -->
            </aside><!-- End .col-lg-3 -->
        </div><!-- End .row -->
    </div><!-- End .container -->

    <div class="mb-5"></div><!-- margin -->
</main>