    <section class="ptb-50" ng-app="product" ng-controller="productController" id="App2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-3 pr-0">
                            <div class="lablename">Sort By:</div>
                        </div>
                        <div class="col-lg-9 col-9 pl-0">
                            <div class="select-custom">
                                <select name="orderby" ng-model="porder" ng-change="dataSort(porder)" class="form-select form-select-sm form-control" aria-label="Default select example" style="">
                                    <option value="">--Please Select--</option>
                                    <option value="prop">Sort by Popular Product</option>
                                    <option value="last">Sort by Newness</option>
                                    <option value="desc">Sort by price: high to low</option>
                                    <option value="asc">Sort by price: low to high</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php
		if($show_left_panel)
		{?>
		<?=$this->element('site/product_left_panel');?>
		<?php } ?>
                </div>
                <div class="col-lg-9">
                <div id="top">
                    <?php $productLink=$this->Url->build("/");?>
                <div  infinite-scroll='nextPage()' infinite-scroll-disabled='busy' infinite-scroll-distance='1'>
                    <ul ng-show="show==0" style="list-style:none;">
                        <li>
                            <div class="data-not-found"><i class="icon-warning"></i> No Product Found</div>
                        </li>
                    </ul>
                    <div class="row" ng-show="show==1">
                        
                        <div class="col-lg-3" ng-repeat="p in product" ng-cloak>
                            <div class="problock">
                                
                                <div class="imgblock">
                                    <a href="<?=$productLink?>products/details/{{p.slug}}">
                                        <span class="quickview">Quick View</span>
                                        <img src="<?=$productLink?>upload/product/{{p.photo}}" alt="" class="img-size">
                                    </a>
                                </div>
                                <div class="clr"></div>
                                <div class="contentblock">
                                    <h3 class="title-name">
                                        <a href="<?=$productLink?>products/details/{{p.slug}}">{{p.name}} </a>
                                    </h3>
                                    
                                    <div class="price" #actual ng-show="p.user_products[0].in_stock==0 || p.user_products[0].total_quantity==0">

                                    <span class="soldout">SOLD OUT</span>
                                    </div>
                                    <div class="price" #actual ng-show="!p.user_products[0].actual_price">
                                    
                                    &#8377 {{p.user_products[0].offer_price | number:2 }}
                                    </div><!-- End .price-box -->
                                    
                                    <div class="price" ng-show="p.user_products[0].offer_price <= p.user_products[0].actual_price">
                                    &#8377 {{p.user_products[0].offer_price | number:2 }}
                                    <del>&#8377 {{p.user_products[0].actual_price | number:2 }}</del>
                                    
                                    <div class="product-label new">{{(100-((100 * p.user_products[0].offer_price)/p.user_products[0].actual_price)) | number : 2 }}% OFF</div>
                                    
                                    
                                    
                                    
                                    </div><!-- End .price-box --> 
                                    
                                    
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                       
                        
                        
                    </div>
                     <div ng-show='busy'><span class="data-not-found" ><span class="page-loading"></span> Loading.... </span></div>
                </div>
                
                </div>
                </div>
                
                    <?php
                    if(empty($brand_id->id))
                    {
                        $brand_id=0;
                    }
                    else
                    {
                        $brand_id=$brand_id->id;
                    }
                    ?>
                
            </div>
        </div>
    </section>
    <script>var ajxUrl='<?=$this->Url->build("/products");?>';
		var headingName='Product List';
		var sub_category_id=<?=$sub_category_id?>;
		var type_id=<?=$type_id?>;
		var category_id=<?=$category_id?>;
		var brand_id=<?=$brand_id?>;
		var searchval="<?=!empty($search)?$search:''?>";
		</script>
	  <?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js','/admin_template/js/angular-1.5.8/angular-animate.min','/admin_template/js/angular-1.5.8/ng-infinite-scroll.min','/admin_template/js/angular/rzslider.min','/admin_template/js/angular/product_site.js?v=7'],['block'=>'scriptBottom']);?>