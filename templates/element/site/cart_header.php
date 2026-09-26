<div id="back-top" class="wow fadeInRight" ><i class="icon-up-arrow-1"></i></div>
<header id="myHeader" ng-app="pro11" ng-controller="proCtrl11">
  <div class="header-bg">
    <div class="container full-mw">
      <div class="row">
        <div class="col-1 col-m w1">
          <div class="mob-menu" style="display:none;"><a><i class="icon-menu1"></i></a></div>
          <div class="logo"><a href="/"><img src="<?php echo $this->Url->image("assets/images/febino-logo.png", ['pathPrefix' => '']) ?>" alt="" ></a></div>
        </div>
        
        
        

        <div class="col col-m" >
          <div class="rightcartblock">
            <ul>
              
              <?php 
              if(!$this->request->getSession()->read('Auth.User.id'))
              {
             ?>
              <li class="signbtn2" > <a href="javascript:void(0)" class="icon-box">
                <div class="iconbox-icon"> <i class="icon-user-n"></i> </div>
                <div class="icon-box-content d-sm-show">
                  <h4 class="iconbox-title">Sign in / Register</h4>
                  <p>User Login</p>
                </div>
                </a> 
              </li>
              <?php
              }
              else
              {
              ?>
              <li> <a href="javascript:void(0)" class="icon-box" role="button" id="dropdownuser" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="iconbox-icon"> <i class="icon-user-n"></i> </div>
                <div class="icon-box-content d-sm-show">
                  <h4 class="iconbox-title">Account & Lists</h4>
                  <p class="addwidth"><?=$this->request->getSession()->read('Auth.User.first_name')?></p>
                </div>
                </a>
                <ul class="dropdown-menu d-menu" aria-labelledby="dropdownuser">
                  <li><a href="<?php echo $this->Url->build(["controller"=>"home","action"=>"myaccount"]); ?>"><i class="icon-user-n"></i> My Account</a></li>
                  <li><a href="<?php echo $this->Url->build(["controller"=>"home","action"=>"myorders"]); ?>"><i class="icon-cart-bag"></i> My Orders</a></li>
                  <li><a href="<?php echo $this->Url->build(["controller"=>"view_carts","action"=>"wishlist1"]); ?>"><i class="icon-heart1"></i> Wishlist</a></li>
                  <li><a href="<?php echo $this->Url->build(["controller"=>"login","action"=>"logout"]); ?>"><i class="icon-lock"></i> Log Out</a></li>
                </ul>
              </li>
              <?php
              }
              ?>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="clr"></div>
  
  <!--Login-section-->
  <div class="login-section">
    <div class="close-login"><i class="icon-cross"></i></div>
    <!--LOGIN-->
    <div class="loginblock" id="login" ng-show="logstep==1">
      <h3>Login</h3>
      <p>Welcome Febino ! Login</p>
      <div class="clr height5"></div>
      <p class="fontsize15">Dont't have an account? &nbsp; <a href="javascript:void(0)" ng-click="signupFunction(2)"><strong>Sign Up</strong></a></p>
      <div class="clr height5"></div>
      <p class="fontsize15">Continue with social</p>
      <ul class="social-list">
        <li>
            <?php
                        echo $this->Form->postLink(
                                $this->Html->image('/assets/images/google.png', []) . 'Google', [
                            'prefix' => FALSE,
                            'plugin' => 'ADmad/SocialAuth',
                            'controller' => 'Auth',
                            'action' => 'login',
                            'provider' => 'google',
                            '?' => ['redirect' => $this->Url->build([])]
                                ], ['escape' => FALSE, 'class' => '']
                        );
                        ?> 
            
            
           </li>
        <li>
<?php
                        echo $this->Form->postLink(
                                 $this->Html->image('/assets/images/facebook.png', []) . 'Facebook', [
                            'prefix' => FALSE,
                            'plugin' => 'ADmad/SocialAuth',
                            'controller' => 'Auth',
                            'action' => 'login',
                            'provider' => 'facebook',
                            '?' => ['redirect' => $this->Url->build([])]
                                ], ['escape' => FALSE, 'class' => 'facebook']
                        );
                        ?>
        </li> 
      </ul>
      <div class="clr height20"></div>
      <p class="text-center"><strong>Or</strong></p>
      <div class="clr height10"></div>
      <p ng-show="showmsg" class="text-warning">{{msg}}</p>
      <form name="loginForm" id="loginForm" data-ng-submit="loginForm.$valid && submitLogin1($event)">
        <div class="mb-3">
          <label for="inputEmail" class="visually-hidden">Email/Mobile</label>
          <input type="text" id="inputEmail" class="form-control" placeholder="Email/Mobile" required autofocus ng-model="email" name="email">
        </div>
        <div class="mb-3">
          <label for="inputPassword" class="visually-hidden">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" required ng-model="password" required name="password">
        </div>
        <p class="text-center">Forgot password? <a href="javascript:void(0)" ng-click="forgetsendOtp()"><strong>Recover Password</strong></a></p>
        <div class="clr height20"></div>
        <div class="d-grid gap-2">
        <button class="btn btn-dark" type="submit" ng-show="!loadinglogin">LOGIN</button>
        <button class="btn btn-dark" type="button" ng-show="loadinglogin">Please Wait..</button>
        
        <button class="btn btn-dark" ng-click="sendOtp()" type="button" ng-show="!submitLogin">LOGIN WITH OTP</button>
        <button class="btn btn-dark" type="button" ng-show="submitLogin"><i class="fa fa-circle-o-notch fa-spin"></i> Please wait..</button>
         
        </div>
      </form>
      <div class="clr height10"></div>
    </div>

      <!--verification-->
      <div class="loginblock" id="login" ng-show="logstep==3">
      <h3>Verification</h3> 
      <p>Welcome Febino! Verification</p> 
      <div class="clr height5"></div>
        
      <div class="clr height5"></div>

      <p ng-show="showmsg" class="text-warning">{{msg}}</p>
      <?=$this->Form->create(null, ['url' => ['controller' => 'Login', 'action' => 'index']]);?>
        <div class="mb-5 blockotp">
        <label for="otp" class="visually-hidden">OTP</label>  
        <input type="number" id="otp" ng-model="otp" class="form-control"  required autofocus name="Otp" maxlength="6">
      
        </div>
        
        
        <div class="clr height5"></div>
        <button class="float-end btn-login" type="button" ng-click="verifyotp()">Verify</button> &nbsp; 
        <button class="float-end btn-login" type="button" ng-show="submitOtp"><i class="fa fa-circle-o-notch fa-spin"></i> Please wait..</button>
        <button class="float-end btn-login" ng-click="sendOtp()" type="button" ng-show="!submitLogin">Resend</button>
          <button class="float-end btn-login" type="button" ng-show="submitLogin"><i class="fa fa-circle-o-notch fa-spin"></i> Please wait..</button>
      </form> 
      <div class="clr height10"></div>  
        
      </div>

            <!--SIGNUP-->
            <div class="loginblock"   ng-show="logstep==2">
          <h3>Create an Account</h3>  
          <p>Let's set up your account, while we find Matches for you!</p>  
          <div class="clr height5"></div>

          <div class="clr height5"></div>
          <p ng-show="showmsg" class="text-warning">{{msg}}</p>
          <form name="regFrm" ng-submit="registration($event)"/>


            <div class="mb-4">
            <label for="Last-Name" class="visually-hidden">Name</label> 
            <input type="text" id="Last-Name" class="form-control" placeholder="Name" ng-model="nameReg" required name="first_name">
            </div>

            
            <div class="mb-4">
            <label for="input-Email" class="visually-hidden">Email address</label>  
            <input type="email" id="input-Email" class="form-control" placeholder="Email" ng-model="emailReg" required name="email">
            </div>
            
            <div class="mb-4">
            
            <label for="Phone-Number" class="visually-hidden">Mobile</label>  
            <input type="number" id="Phone-Number" onKeyPress="if(this.value.length==10) return false;" class="form-control" placeholder="Mobile No" ng-model="mobileReg" required name="mobile"> 
            </div>
            
            <div class="mb-4 relative-block">
            <span class="pass-show pass-hide" id="eyeclick"  onclick="passFunction()"><i class="icon-eye-block"></i><i class="icon-eye"></i></span>
            <label for="myInput" class="visually-hidden">Password</label> 
            <input type="password" class="form-control" placeholder="Password" id="myInput" ng-model="passwordReg" required name="password">
            </div>
            
          <p class="fontsize15">Already have an account? &nbsp;  <a href="javascript:void(0)" ng-click="signupFunction(1)"><strong>Sign In</strong></a></p> 
            
            <p class="text-center">BY clicking on create Account you hereby accept the  <a href="http://pickallure.com/terms-and-conditions"><strong>T&C</strong></a></p>
            <div class="clr height5"></div>
            <div class="d-grid gap-2">
            <button class="btn btn-dark" type="submit" ng-show="!submitReg">CREATE ACCOUNT</button>
            <button class="btn btn-dark" type="button" ng-show="submitReg"><i class="fa fa-circle-o-notch fa-spin"></i> Please wait..</button>
            </div>
          </form> 
          <div class="clr height10"></div>  
            
          </div>
    
    <!--Reset-Password-->
    <div class="loginblock" id="forgot" ng-show="logstep==4">
      <h3>Reset Password</h3>
      <p>Welcome Febino ! Login</p>
      <div class="clr height5"></div>
      <p class="fontsize15">Dont't have an account? &nbsp; <a href="javascript:void(0)" ng-click="signupFunction(2)"><strong>Sign Up</strong></a></p>
      <div class="clr height30"></div>
      <p ng-show="showmsg" class="text-warning">{{msg}}</p> 
      <form>
        <div class="mb-4">
          <label for="rinputEmail" class="visually-hidden">Enter OTP</label>
          <input type="text" id="rinputEmail" class="form-control" placeholder="Enter OTP" required autofocus name="otp" ng-model="otp">
        </div>
        <div class="mb-4">
          <label for="rinputEmail" class="visually-hidden">Set Password</label>
          <input type="text" id="rinputEmail" class="form-control" placeholder="Set Password" required autofocus name="password" ng-model="password">
        </div>
        <div class="clr height5"></div>
        <div class="d-grid">
          <button class="btn btn-dark" type="submit" ng-click="forgetverifyotp()">Submit</button>
        </div>
      </form>
      <div class="clr height10"></div>
    </div>

  <!-- verification -->
  <div class="loginblock " id="vari" ng-show="logstep==5">
          <h3>Verification</h3> 
          <p>Please Verify Your Account using the sent OTP in Your Mobile No.</p> 
          <div class="clr height5"></div>
            
          <div class="clr height5"></div>

          <p ng-show="showmsg" class="text-warning">{{msg}}</p>
          <?=$this->Form->create(null, ['url' => ['controller' => 'Login', 'action' => 'index']]);?>
            <div class="mb-5 blockotp">
            <label for="otp" class="visually-hidden">OTP</label>  
            <input type="number" id="verification_code" ng-model="verification_code" class="form-control" required autofocus name="Otp" maxlength="6" >
            </div>
            
            
            <div class="clr height5"></div>
            <button class="btn btn-dark btn-login" type="button" ng-click="verifyotpregistration()" ng-show="!varificationCodeSubmit">Verify</button> &nbsp; 
            <button class="btn btn-dark btn-login" type="button" ng-show="varificationCodeSubmit"><i class="fa fa-circle-o-notch fa-spin"></i> Please wait..</button>
            <button class="btn btn-dark btn-login" ng-click="sendOtpreg()" type="button" ng-show="!submitreg">Resend</button>
              <button class="btn btn-dark btn-login" type="button" ng-show="submitreg"><i class="fa fa-circle-o-notch fa-spin"></i> Please wait..</button>
          </form> 
          <div class="clr height10"></div>  
            
          </div>
  </div>



          <!-- change mobile modal -->
       
    <div id="change_mobile_modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body loginbody">
<button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="row">
<div class="col-sm-5 d-none d-sm-block"><div class="loginimgblock hightblock" id="forgotheight"><img src="/assets/images/loginbg.png" alt="" ></div></div>
<div class="col-sm-7" ng-cloak>







<!--Change Mobile-->
<div class="loginblock" id="login"  ng-show="mob">
<h3>Change Your Mobile No</h3>  
<p>Welcome Febino!</p>  
<div class="clr height5"></div>
  
<div class="clr height30"></div>

<p ng-show="showmsg" class="text-warning">{{msg}}</p> 
  <div class="mb-5">
  <label for="rinputEmail" class="visually-hidden">New Mobile No</label>  
  <input type="number" onKeyPress="if(this.value.length==10) return false;" id="rinputEmail" class="form-control" placeholder="Enter New Mobile No" required autofocus name="mobile" ng-model="mobile">
  </div>
  <div class="clr height5"></div>
  <button class="float-end btn-login" type="submit" ng-click="changemobilesendOtp()">Submit</button>

<div class="clr height10"></div>  
  
</div>


<div class="loginblock"  ng-show="logstep==7">
<h3>Change Mobile No</h3> 
<p>Welcome Febino!</p>  
<div class="clr height5"></div>
  
<div class="clr height30"></div>

<p ng-show="showmsg" class="text-warning">{{msg}}</p> 
  <div class="mb-5">
  <label for="rinputEmail" class="visually-hidden">Enter OTP</label>  
  <input type="text" id="rinputEmail" class="form-control" placeholder="Enter OTP" required autofocus name="otp" ng-model="otp">
  </div>
  

  <div class="clr height5"></div>
  <button class="float-end btn-login" type="submit" ng-click="changemobileverifyotp()">Save</button>

<div class="clr height10"></div>  
  
</div>  

<!--end change mobile-->



</div>
</div>  
<div class="clr"></div>
</div>


</div>
</div>
</div>
<!-- /change mobile modal -->
  
  <!--wishlist-section-->
  <div class="wishlist-section">
    <div class="wish-cart-block">
      <div class="wc-heading">
        <h4 class="wc-title">Wishlist - <span><?=$wishlist_count?></span></h4>
        <a href="#" class="btn w-btnclose">Close <i class="icon-arrow-pointing-right"></i></a> </div>
        <?php
        if($wishlist_count>0)
        {
        ?>
      <ul class="wc-product">
        <?php
          foreach($wishlist as $wishlist)
          {
        ?>
        <li>
          <a href="<?php echo $this->Url->build(["controller"=>"ViewCarts","action"=>"wishlistdelete",$wishlist->id]); ?>" class="product-close"><i class="icon-cross"></i></a>
          <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details",$wishlist->product->slug]); ?>" class="product-media"> <img src="<?=UPLOAD_PRODUCT_IMAGE?><?=$wishlist->product->photo?>" alt=""> </a>
          <div class="product-content"> <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details",$wishlist->product->slug]); ?>" class="proname" title="Girl's Dark Bag"> <?=$wishlist->product->name?> </a>
            <div class="price-box"> Rs. <?=$wishlist->product->offer_price?> </div>
          </div>
        </li>
        <?php
          }
        ?>
        
      </ul>
      <div class="d-grid"> <a href="<?php echo $this->Url->build(["controller"=>"ViewCarts","action"=>"wishlist1"]); ?>" class="btn btn-dark l-btn" >Go To Wishlist</a> </div>
      <?php
        }
        else{
        ?>
      <div class="no-product"> <i class="icon-wishlist"></i>
        <p>No Products in the Wishlist</p>
      </div>
      <?php
        }
        ?>
    </div>
  </div>
  
  <!--cart-section-->
  <div class="cart-section">
    <div class="wish-cart-block">
      <div class="wc-heading">
        <h4 class="wc-title">Cart item - <span><?=count($ProductObjData)?></span></h4>
        <a href="#" class="btn c-btnclose">Close <i class="icon-arrow-pointing-right"></i></a> </div>
        <?php
        if(count($ProductObjData)>0)
        {
        ?>
      <ul class="wc-product">
      <?php
          
          foreach($ProductObjData as $cartdata)
          {
      ?>
        <li>
          <!-- <button class="product-close"><i class="icon-cross"></i></button> -->
          <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details",$cartdata->slug]); ?>" class="product-media"> <img src="<?=UPLOAD_PRODUCT_IMAGE?><?=$cartdata->photo?>" alt=""></a>
          <div class="product-content"> <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details",$cartdata->slug]); ?>" class="proname" title="Girl's Dark Bag"> <?=$cartdata->name?> </a>
            <div class="price-box"> Rs. <?=$cartdata->offer_price?> </div>
          </div>
        </li>
        <?php
          }
        ?>
        
      </ul>
      <div class="d-grid"> <a href="<?php echo $this->Url->build(["controller"=>"ViewCarts","action"=>"index"]); ?>" class="btn btn-dark l-btn" >Go To Cart</a> </div>
      <?php
        }
        else
        {
      ?>
      <div class="no-product"> <i class="icon-cart-bag"></i>
        <p>No Products in the Shopping Cart</p>
      </div>
      <?php
        }
      ?>
    </div>
  </div>
  
  <!-- Overlay-section -->
  <div class="menu-overlay"></div>
  <div class="login-overlay"></div>
  <div class="wish-overlay"></div>
  <div class="cart-overlay"></div>
</header>
	
<script>
    var ajxUrl = '<?php echo $this->Url->build('/products') ?>';
     var ajxUrllogin = '<?php echo $this->Url->build('/login') ?>';
    var seller_id=0;

</script>
<?php echo $this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min', '/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal',  '/admin_template/js/angular-1.5.8/angular-sanitize.min', '/admin_template/js/angular/product_search_auto.js?v=4'], ['block' => 'scriptBottom']) ?>