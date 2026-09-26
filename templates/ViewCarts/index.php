<style>
  .nvx {
    display: flex;
    justify-content: center;
}
</style>
<body id="my-cart">
  <div ng-app="cart" ng-controller="cartCrt" id="app5">
  <div class="bridcrum bmhhh">
    <div class="container">
      <span class="hgrl"><a href="/">Home</a></span> | <span class="hjul">My Cart</span>
    </div>
  </div>
  <div class="mac-sec" ng-cloak>
    <div class="container" ng-show="cartitems.length > 0">
      <div class="row g-3">
        <div class="col-lg-9">
          <div class="fmglz">
            <div class="row g-3" ng-show="cartitems.length > 0">


              <div class="cart-box" ng-repeat="cartitem in cartitems">
                <div class="col-lg-5 col-md-5">
                  <div class="cart-lft">
                    <div class="col-lg-3">
                      <div class="cart-pic">
                        <img src="<?= UPLOAD_PRODUCT_IMAGE ?>{{cartitem.Products.photo}}" alt="pic">
                      </div>
                    </div>
                    <div class="col-lg-9">
                      <div class="prdtls">
                        <div class="catpro-nm">{{cartitem.Products.name}}</div>
                        <div class="price">Rs:<span class="sqr">₹ {{cartitem.Products.offer_price}}</span></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-2 col-12 col-md-2">
                  <div class="myqan">
                    <div class="qty-container">
                      <button class="qty-btn-minus btn-light" type="button" ng-click="updateQuentity($event, $index, 1)">
                        <i class="fa fa-minus"></i>
                      </button>

                      <input type="text" name="qty" class="input-qty" ng-model="cartitem.CartItems.quantity" />

                      <button class="qty-btn-plus btn-light" type="button" ng-click="updateQuentity($event, $index, 2)">
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>

                  </div>
                </div>
                <div class="col-lg-2 col-md-2">
                  <div class="tolprc">Total Rs:{{cartitem.CartItems.item_gross_amount | currency:''}}</div>
                </div>
                <div class="col-lg-2 col-12 col-md-2">
                <div class="vvvv">
                <button type="button" class="prodlt" ng-click="deleteItem($event, $index)">
                 
                  Delete</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="left-bx">
            <div class="col-lg-12">
              <div class="topcpbtn" ng-if="!coupon.coupon_id || coupon.coupon_id == 0">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Apply Coupon Code" ng-model="coupon.code">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2" ng-click="applyCoupon()">Apply</button>
                </div>
              </div>

              <ul class="chk">
                <li>
                  <span class="rnc">Sub Total:</span>
                  <span class="rolu">Rs:{{ getSubtotal() | currency:''}}</span>
                </li>
                <li>
                  <span class="rnc">Delivery Charge:</span>
                  <span class="rolu">Rs:{{ getDelivery() | currency:''}}</span>
                </li>
                <li>
                  <span class="rnc">Discount:</span>
                  <span class="rolu" ng-show=getDiscount()>Rs:{{ getDiscount() | currency:''}}</span>
                  <span class="rolu" ng-show=!getDiscount()>Rs: 0.00</span>
                </li>
                <li class="grndtl">
                  <span class="rnc">Total:</span>
                  <span class="rolu">Rs:{{ getTotal() | currency:''}}</span>
                </li>
              </ul>






            </div>
            <div class="check-btn">
              <?php if ($this->request->getSession()->read('Auth.User.id')) { ?>
                <a href="<?= $this->Url->build(["controller" => "ViewCarts", "action" => "checkout"]); ?>">Proceed To Checkout</a>
              <?php } else { ?>
                <a href="javascript:void(0);" onclick="alert('Please login first to access checkout page!')" data-bs-toggle="modal" data-bs-target="#exampleModal">Proceed To Checkout</a>
              <?php } ?>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="row" ng-show="!loadcartdata1 && cartitems.length===0" ng-cloak>
    <div data-ng-show="showError" ng-class="{fade:doFade}" class="alert alert-danger"><strong>Error:</strong> {{errorMsg}}</div>
    <div data-ng-show="showSuccess" ng-class="{fade:doFade}" class="alert alert-success"><strong>Success:</strong> {{successMsg}}</div>
    <div class="col-lg-12">
      <div class="clr height20"></div>
      <div class="nvx">
      <div class="empty-card">
        <img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid">
        <h3><strong>Your Cart is Empty</strong></h3>
        <h4>Add something to make me happy :)</h4>
        <a href="<?php echo $this->Url->build('/products') ?>" class="btn btn-style m-3"><span>Continue Shopping</span></a>
      </div>
      </div>
    </div>
  </div>
  </div>
  
  </div>
</body>


<script>
  var ajxUrl = '<?php echo $this->Url->build('/ViewCarts') ?>';
  var productLink = '<?php echo $this->Url->build('/products') ?>';
  var prefix = "<?= $prefix ?>";
  var cartsurl = '<?= $this->Url->build("/view_carts"); ?>';
</script>
<?php echo $this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js', '/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min', '/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal',  '/admin_template/js/angular-1.5.8/angular-sanitize.min', '/admin_template/js/angular/cart_site.js?v=6'], ['block' => 'scriptBottom']) ?>