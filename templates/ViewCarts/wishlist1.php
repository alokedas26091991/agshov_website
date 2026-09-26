<body id="wish-page">
    <div class="bridcrum bmhhh">
        <div class="container">
            <span class="hgrl"><a href="<?= $this->Url->build('/'); ?>">Home</a></span> | <span class="hjul">Dashboard</span>
        </div>
    </div>
    <div class="acount-info">
        <div class="container">
            <div class="row g-3">
                <div class="col-lg-3">
                    <div class="aclft">
                        <div class="ltop">
                            <div class="usimg"><img src="/assets/images/circle-user.png" alt="pic"></div>
                            <div class="rnm">
                                <div class="klyy">Hello</div>
                                <div class="usr-nm"><?= h($user1->name) ?></div>
                            </div>
                        </div>
                        <ul class="rpuui">
                            <li>
                                <a href="<?= $this->Url->build(["controller" => "Home", "action" => "myaccount"]); ?>">
                                    <div class="bqx"><img src="/assets/images/edit.png" alt="icon"></div>
                                    <div class="vdee">Account Information</div>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(["controller" => "Home", "action" => "changepassword"]); ?>">
                                    <div class="bqx"><img src="/assets/images/padlock.png" alt="icon"></div>
                                    <div class="vdee">Change Password</div>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(["controller" => "Home", "action" => "myorders"]); ?>">
                                    <div class="bqx"><img src="/assets/images/checkout.png" alt="icon"></div>
                                    <div class="vdee">My Order</div>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(["controller" => "ViewCarts", "action" => "wishlist1"]); ?>" class="active">
                                    <div class="bqx"><img src="/assets/images/e-commerce.png" alt="icon"></div>
                                    <div class="vdee">My Wishlist</div>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(["controller" => "Home", "action" => "addressbook"]); ?>">
                                    <div class="bqx"><img src="/assets/images/e-commerce.png" alt="icon"></div>
                                    <div class="vdee">My Address</div>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $this->Url->build(["controller" => "Login", "action" => "logout"]); ?>" onclick="return confirm('Are you sure you want to Logout?');">
                                    <div class="bqx"><img src="/assets/images/logout.png" alt="icon"></div>
                                    <div class="vdee">Logout</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                 <div class="col-lg-9">
                    <div class="acrt-box wishlist">
                        <div class="head">
                            <h1>My Wishlist</h1>
                        </div>
                        <div class="hyt">
                            <div class="row g-3">
                                <?php
                                if ($pro->count() > 0) {
                                    foreach ($pro as $key => $pro1) {
                                ?>
                                        <div class="wibox">
                                            <div class="col-lg-6">
                                                <div class="wileft">
                                                    <div class="col-lg-3">
                                                        <div class="propc"><img src="<?php echo $this->Url->image(UPLOAD_PRODUCT_IMAGE . $pro1->product->photo) ?>" alt="" class="product-img"></div>
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <div class="prd-box">
                                                            <div class="wipnm"><?= $pro1->product->name ?></div>
                                                            <div class="price">
                                                                <?php
                                                                if ($pro1->product->offer_price == $pro1->product->actual_price) {
                                                                ?>
                                                                    <span class="dfx">Rs:<?= $pro1->product->actual_price ?></span>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <span class="dfx">Rs:<?= $pro1->product->offer_price ?></span><span class="frm">Rs:<?= $pro1->product->actual_price ?></span>
                                                                <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="pdebtn"><a href="<?php echo $this->Url->build(["controller" => "Products", "action" => "details", $pro1->product->slug]); ?>">Product Details</a></div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="delbtn"><a href="<?= $this->Url->build(["controller" => "ViewCarts", "action" => "wishlistdelete", $pro1->id]) ?>">Delete</a></div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                <?php
                                } else {
                                ?>
                                    <div class="data-not-found"><i class="icon-warning"></i> No Data Found</div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>