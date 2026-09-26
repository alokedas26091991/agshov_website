<ul id="srchpro-list" class="typeahead addcart">

<li ng-repeat="x in productSearch">
    <div class="auto-list-section d-flex align-items-center">
        <div class="pro-img-se">
            <img src="<?=UPLOAD_PRODUCT_IMAGE?>{{x.photo}}" alt="" width="50px" />
        </div>
        <div class="pro-title-sec">
        <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details","{{x.slug}}"]); ?>" ><p>{{x.name}}</p></a>
            
        </div>
        <div class="pro-btn-sec">
            <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details","{{x.slug}}"]); ?>" class="btn-filled" style="height:20px">View</a>
        </div>
    </div>
</li>

</ul>
