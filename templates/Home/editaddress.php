<body id="myaddress">
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
              <div class="usimg"><img src="/assets/images/test-one.jpg" alt="pic"></div>
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
                <a href="<?= $this->Url->build(["controller" => "ViewCarts", "action" => "wishlist1"]); ?>">
                  <div class="bqx"><img src="/assets/images/e-commerce.png" alt="icon"></div>
                  <div class="vdee">My Wishlist</div>
                </a>
              </li>
              <li>
                <a href="<?= $this->Url->build(["controller" => "Home", "action" => "addressbook"]); ?>" class="active">
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
          <div class="right-box">
            <div class="col-lg-12">
              <div class="head">
                <h3>Edit Address Information</h3>
              </div>
            </div>
            <div class="bttm-fm">
              <div class="col-lg-12">
                <?= $this->Form->create($user2, ['type' => 'file', 'class' => 'form form-horizontal']); ?>
                <div class="row g-3">
                  <div class="col-lg-4"><input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" required value="<?= $user2->name ?>"></div>
                  <div class="col-lg-4"><input type="text" class="form-control" id="mobile" name="mobile" placeholder="Phone Number" required value="<?= $user2->mobile ?>"></div>
                  <div class="col-lg-4"><input type="text" class="form-control" id="email" name="email" placeholder="Email" required value="<?= $user2->email ?>"></div>
                  <div class="col-lg-4"><input type="text" class="form-control" id="gst" name="gst" placeholder="GST" value="<?= $user2->gst ?>"></div>
                  <div class="col-lg-8"><input type="textarea" class="form-control" id="home_address" name="home_address" placeholder="Enter Your Address" required value="<?= $user2->home_address ?>"></div>
                  <div class="col-lg-4">
                    <select name="state" class="form-control" id="state" placeholder="State" required>
                      <option value="Andhra Pradesh" <?php if ($user2->state == "Andhra Pradesh") echo "selected"; ?>>Andhra Pradesh</option>
                      <option value="Andaman and Nicobar Islands" <?php if ($user2->state == "Andaman and Nicobar Islands") echo "selected"; ?>>Andaman and Nicobar Islands</option>
                      <option value="Arunachal Pradesh" <?php if ($user2->state == "Arunachal Pradesh") echo "selected"; ?>>Arunachal Pradesh</option>
                      <option value="Assam" <?php if ($user2->state == "Assam") echo "selected"; ?>>Assam</option>
                      <option value="Bihar" <?php if ($user2->state == "Bihar") echo "selected"; ?>>Bihar</option>
                      <option value="Chandigarh" <?php if ($user2->state == "Chandigarh") echo "selected"; ?>>Chandigarh</option>
                      <option value="Chhattisgarh" <?php if ($user2->state == "Chhattisgarh") echo "selected"; ?>>Chhattisgarh</option>
                      <option value="Dadar and Nagar Haveli" <?php if ($user2->state == "Dadar and Nagar Haveli") echo "selected"; ?>>Dadar and Nagar Haveli</option>
                      <option value="Daman and Diu" <?php if ($user2->state == "Daman and Diu") echo "selected"; ?>>Daman and Diu</option>
                      <option value="Delhi" <?php if ($user2->state == "Delhi") echo "selected"; ?>>Delhi</option>
                      <option value="Lakshadweep" <?php if ($user2->state == "Lakshadweep") echo "selected"; ?>>Lakshadweep</option>
                      <option value="Puducherry" <?php if ($user2->state == "Puducherry") echo "selected"; ?>>Puducherry</option>
                      <option value="Goa" <?php if ($user2->state == "Goa") echo "selected"; ?>>Goa</option>
                      <option value="Gujarat" <?php if ($user2->state == "Gujarat") echo "selected"; ?>>Gujarat</option>
                      <option value="Haryana" <?php if ($user2->state == "Haryana") echo "selected"; ?>>Haryana</option>
                      <option value="Himachal Pradesh" <?php if ($user2->state == "Himachal Pradesh") echo "selected"; ?>>Himachal Pradesh</option>
                      <option value="Jammu and Kashmir" <?php if ($user2->state == "Jammu and Kashmir") echo "selected"; ?>>Jammu and Kashmir</option>
                      <option value="Jharkhand" <?php if ($user2->state == "Jharkhand") echo "selected"; ?>>Jharkhand</option>
                      <option value="Karnataka" <?php if ($user2->state == "Karnataka") echo "selected"; ?>>Karnataka</option>
                      <option value="Kerala" <?php if ($user2->state == "Kerala") echo "selected"; ?>>Kerala</option>
                      <option value="Madhya Pradesh" <?php if ($user2->state == "Madhya Pradesh") echo "selected"; ?>>Madhya Pradesh</option>
                      <option value="Maharashtra" <?php if ($user2->state == "Maharashtra") echo "selected"; ?>>Maharashtra</option>
                      <option value="Manipur" <?php if ($user2->state == "Manipur") echo "selected"; ?>>Manipur</option>
                      <option value="Meghalaya" <?php if ($user2->state == "Meghalaya") echo "selected"; ?>>Meghalaya</option>
                      <option value="Mizoram" <?php if ($user2->state == "Mizoram") echo "selected"; ?>>Mizoram</option>
                      <option value="Nagaland" <?php if ($user2->state == "Nagaland") echo "selected"; ?>>Nagaland</option>
                      <option value="Odisha" <?php if ($user2->state == "Odisha") echo "selected"; ?>>Odisha</option>
                      <option value="Punjab" <?php if ($user2->state == "Punjab") echo "selected"; ?>>Punjab</option>
                      <option value="Rajasthan" <?php if ($user2->state == "Rajasthan") echo "selected"; ?>>Rajasthan</option>
                      <option value="Sikkim" <?php if ($user2->state == "Sikkim") echo "selected"; ?>>Sikkim</option>
                      <option value="Tamil Nadu" <?php if ($user2->state == "Tamil Nadu") echo "selected"; ?>>Tamil Nadu</option>
                      <option value="Telangana" <?php if ($user2->state == "Telangana") echo "selected"; ?>>Telangana</option>
                      <option value="Tripura" <?php if ($user2->state == "Tripura") echo "selected"; ?>>Tripura</option>
                      <option value="Uttar Pradesh" <?php if ($user2->state == "Uttar Pradesh") echo "selected"; ?>>Uttar Pradesh</option>
                      <option value="Uttarakhand" <?php if ($user2->state == "Uttarakhand") echo "selected"; ?>>Uttarakhand</option>
                      <option value="West Bengal" <?php if ($user2->state == "West Bengal") echo "selected"; ?>>West Bengal</option>
                    </select>
                  </div>
                  <div class="col-lg-4"><input type="text" class="form-control" name="city" id="city" placeholder="City" required value="<?= $user2->city ?>"></div>
                  <div class="col-lg-4"><input type="text" class="form-control" id="zip" name="pin" placeholder="Pincode" required value="<?= $user2->pin ?>"></div>
                  <!-- <div class="col-lg-6"><input type="text" class="form-control" placeholder="GST Number"></div>
                                <div class="col-lg-6"><input type="tel" class="form-control" placeholder="Phone Number"></div> -->

                </div>
                <div class="save-btn">
                  <button class="btn save-bt" type="submit"><span>Save</span></button>
                </div>
                <!-- <div class="save-btn"><button class="save-bt" type="submit"><span>Save</span></button></div> -->
                <!-- <div class="save-btn"><a class="save-bt" href="#">Save</a></div> -->
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>