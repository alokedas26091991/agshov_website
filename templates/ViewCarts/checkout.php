<body id="chekout" ng-app="cart" ng-controller="cartCrt" id="app6">
  <div class="bridcrum bmhhh">
    <div class="container">
      <span class="hgrl"><a href="/">Home</a></span> | <span class="hgrl"><a href="/view_carts">Cart</a></span> | <span class="hjul">Chekout</span>
    </div>
  </div>
  <div class="row" ng-cloak>
    <div class="mac-sec confirm-oder">
      <div class="container">
        <div class="row g-3">
          <div class="col-lg-9">
            <div class="fmglz">
              <div class="head">
                <h1>Select Address</h1>
              </div>
              <div class="row g-3">
                <div class="col-lg-6" ng-repeat="d in delivary">
                  <div class="adbox" onclick="selectAdbox(event)" ng-click="setDelivaryadd(d.id, d.pin)">
                    <div class="edit-adrs" data-bs-toggle="modal" data-bs-target="#exampleModaledit" ng-click="editAddress(d.id,$index)">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                    <ul class="vcz">
                      <li>
                        <div class="bx"><i class="fa-solid fa-user"></i></div>
                        <div class="drw">{{ d.name }}</div>
                      </li>
                      <li>
                        <div class="bx"><i class="fa-solid fa-phone"></i></div>
                        <div class="drw">{{ d.mobile }}</div>
                      </li>
                      <li>
                        <div class="bx"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="drw">{{ d.home_address }}, Pin-{{ d.pin }}</div>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="adbtn">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" ng-click="editAddress(0,-1)">Add Address</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="left-bx">
              <div class="col-lg-12">
                <div class="topcpbtn">
                  <div class="order-head">Order Details</div>
                </div>
                <ul class="chk">
                  <li ng-repeat="cartitem in cartitems">
                    <span class="rncc">{{cartitem.Products.name}}</span>
                    <span class="rolu">Qty-{{cartitem.CartItems.quantity}}</span>
                    <span class="rolu">Rs. {{cartitem.CartItems.item_gross_amount}}</span>
                  </li>

                  <!-- <li>
                    <span class="rnc">Sub Total:</span>
                    <span class="rolu">Rs:400.00</span>
                  </li> -->
                  <li ng-show="getDelivery() > 0">
                    <span class="rnc">Delivery Charge:</span>
                    <span class="rolu">Rs: {{ getDelivery() | currency:''}}</span>
                  </li>
                  <li ng-show=!getDelivery()>
                    <span class="rnc">Delivery Charge:</span>
                    <span class="rolu">Rs: 0.00</span>
                  </li>
                  <li>
                    <span class="rnc">Discount:</span>
                    <span class="rolu">Rs: {{ getDiscount() | currency:''}}</span>
                  </li>
                  <li class="grndtl">
                    <span class="rnc">Total:</span>
                    <span class="rolu">Rs: {{ getTotal() | currency:''}}</span>
                  </li>
                </ul>
              </div>

              <div class="delivery-btn">
                <a href="#"
                  ng-class="{'tqr': true, 'on': paymentMethod == 1}"
                  ng-click="paymentMethod = 1; setDelivaryMode(1)" onclick="selectButton(event)">
                  Online
                </a>
                <a href="#"
                  ng-class="{'tqr cash': true, 'on': paymentMethod == 2}"
                  ng-click="paymentMethod = 2; setDelivaryMode(2)" onclick="selectButton(event)">
                  Cash On Delivery
                </a>
              </div>
              <div class="check-btn" ng-show="setAdd && step==1">
                <span ng-show="paymentMethod == 1">
                  <?= $this->Html->link('Place Order', ['controller' => 'Products', 'action' => 'hdfcPayment'], ['class' => 'btn btn-primary w-100', 'escape' => false]); ?>
                </span>

                <span ng-show="paymentMethod == 2">
                  <?= $this->Html->link('Place Order', ['controller' => 'Products', 'action' => 'freePayment'], ['class' => 'btn btn-primary w-100', 'escape' => false]); ?>
                </span>
              </div>
              <div class="check-btn" ng-show="!setAdd">
                <button type="button" class="btn btn-primary w-100" ng-click="setaddress()"> Place Order</button>
              </div>





              <!-- <div class="delivery-btn">
                <a href="#" class="tqr on" onclick="selectButton(event)">Online</a>
                <a href="#" class="tqr cash" onclick="selectButton(event)">Cash On Delivery</a>
              </div>
              <div class="check-btn"><a href="thank-you.html">Place Order</a></div> -->
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- my-modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Address</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form class="needs-validation checkout-section" ng-submit="addDelivaryAddress($event)" ng-show="step==2">
              <div class="col-lg-12">
                <div class="right-box">
                  <div class="col-lg-12">
                    <div class="head">
                      <h3>Add New Address</h3>
                    </div>
                  </div>
                  <div class="bttm-fm">
                    <div class="col-lg-12">
                      <div class="row g-3">
                        <div class="col-lg-6"><input type="text" class="form-control" placeholder="Enter Your Name" ng-model="postData.name" id="firstName" required></div>
                        <div class="col-lg-6"><input type="tel" class="form-control" placeholder="Enter Phone Number" ng-model="postData.mobile" id="mobile" required></div>
                        <div class="col-lg-6"><input type="email" class="form-control" placeholder="Enter Email ID" ng-model="postData.email" id="email" ></div>
                        <div class="col-lg-6"><input type="text" class="form-control" placeholder="Enter GST(Not Mandatory)" ng-model="postData.gst" id="gst" ></div>
                        <div class="col-lg-12"><input type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Your Address" ng-model="postData.home_address" id="address" required></div>
                        <div class="col-lg-4">
                          <!-- <input type="text" class="form-control" placeholder="State" required> -->
                          <select name="state" class="form-select" aria-label="Default select example" ng-model="postData.state" id="state" placeholder="Select State" required>
                            <option value="" disabled selected>Select State</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                          </select>
                        </div>
                        <div class="col-lg-4"><input type="text" class="form-control" ng-model="postData.city" id="city" placeholder="City" required></div>
                        <div class="col-lg-4"><input type="text" minlength="6" maxlength="6" class="form-control" id="zip" ng-model="postData.pin" placeholder="Pin Code" required></div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" type="submit"><span>Save</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


    <!-- edit-modal -->
    <div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Address</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <form class="needs-validation checkout-section" ng-submit="addDelivaryAddress($event)" ng-show="step==2">
              <div class="col-lg-12">
                <div class="right-box">
                  <div class="col-lg-12">
                    <div class="head">
                      <h3>Add New Address</h3>
                    </div>
                  </div>
                  <div class="bttm-fm">
                    <div class="col-lg-12">
                      <div class="row g-3">
                        <div class="col-lg-6"><input type="text" class="form-control" placeholder="Enter Your Name" ng-model="postData.name" id="firstName" required></div>
                        <div class="col-lg-6"><input type="tel" class="form-control" placeholder="Enter Phone Number" ng-model="postData.mobile" id="mobile" required></div>
                        <div class="col-lg-6"><input type="email" class="form-control" placeholder="Enter Email ID" ng-model="postData.email" id="email"></div>
                        <div class="col-lg-6"><input type="text" class="form-control" placeholder="Enter GST(Not Mandatory)" ng-model="postData.gst" id="gst"></div>
                        <div class="col-lg-12"><input type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Your Address" ng-model="postData.home_address" id="address" required></div>
                        <div class="col-lg-4">
                          <!-- <input type="text" class="form-control" placeholder="State" required> -->
                          <select name="state" class="form-select" aria-label="Default select example" ng-model="postData.state" id="state" placeholder="Select State" required>
                            <option value="" disabled selected>Select State</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                          </select>
                        </div>
                        <div class="col-lg-4"><input type="text" class="form-control" ng-model="postData.city" id="city" placeholder="City" required></div>
                        <div class="col-lg-4"><input type="text" minlength="6" maxlength="6" class="form-control" id="zip" ng-model="postData.pin" placeholder="Pin Code" required></div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" type="submit"><span>Submit</span></button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        
        </div>
      </div>
    </div>
  </div>

  <script>
    function selectButton(event) {
      document.querySelectorAll('.tqr').forEach(btn => btn.classList.remove('selected'));
      event.target.classList.add('selected');
    }
  </script>
  <script>
    function selectAdbox(event) {
      document.querySelectorAll('.adbox').forEach(box => box.classList.remove('selected'));
      event.currentTarget.classList.add('selected');
    }
  </script>

  <script>
    var ajxUrl = '<?php echo $this->Url->build('/ViewCarts') ?>';
    var productLink = '<?php echo $this->Url->build('/products') ?>';
    var cartUrl = productLink + "/razorpay";
  </script>
  <?php echo $this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js', '/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min', '/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal',  '/admin_template/js/angular-1.5.8/angular-sanitize.min', '/admin_template/js/angular/cart_site_checkout.js?v=5'], ['block' => 'scriptBottom']) ?>
</body>