<style>[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
  display: none !important;
}
.btn-login {
	margin: 0 2px;
}
</style>
 <button onclick="topFunction()" id="myBtn" title="Go to top" ><i class="icon-up-arrow-1"></i></button> 
 <div ng-app="pro11" ng-controller="proCtrl11">
     
 
<header id="myHeader">
	
<div class="header-bg">
<div class="container">
<div class="row">
<div class="col-1 col-m">
<!--<div class="m-menu" id="leftmenu" onclick="leftFunction()"><i class="icon-menu1"></i></div>-->
<div class="logo"><a href="https://www.pickallure.com/"><img src="/assets/images/logo.png" alt="" ></a></div>
</div>
	
<div class="col-5 col-m">

</div>
	
<div class="col-6 col-m">
<ul class="toplist">
		<li><a href="/vendor"><i class="icon-sell-on" aria-hidden="true"></i> Sell On Pickallure</a></li>
		<li><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"myorders"]); ?>"><i class="icon-track-order2"></i> Track your order</a></li>
		<li><a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"index"]); ?>"><i class="icon-shopping-bag"></i> Shop</a></li>
		<?php if($this->request->session()->read('Auth.User.id'))
        {?>
		<li><a href="<?php echo $this->Url->build("/Home/myaccount");?>"><i class="icon-user5"></i>  <?=$this->request->session()->read('Auth.User.first_name')?></a></li>
		<?php
        }
        else
        {
            
        ?>
        
        <li><a href="" data-bs-toggle="modal" data-bs-target="#login_modal"><i class="icon-user5"></i> Login/Registration</a></li>
        
        <?php
        }
        ?>
</ul>
		
<div class="rightcartblock">
	<div class="needhelp"><a href="https://api.whatsapp.com/send?phone=+91 9330905500" target="_blank"><i class="icon-whatsapp"></i> <span>Need Helps ? Call us Now: +91 933-090-5500</span></a></div>	
<ul>
<li>
    <div class="rupee">
    <select class="form-control formcontrol mb-0 pr-5 cursor-pointer" name="price_tag" id="price_tag" onchange="window.location.href = '?price_tag='+this.value" >
      <option value="rupee" <?php if($price_tag=='rupee'){echo 'selected';}?>>&#8377; Rupee</option>
      <option value="dollar" <?php if($price_tag=='dollar'){echo 'selected';}?>>&#36; Dollar</option>
      <option value="euro" <?php if($price_tag=='euro'){echo 'selected';}?>>&#8364; Euro</option>
      <option value="pound" <?php if($price_tag=='pound'){echo 'selected';}?>>&#163; Pound</option>
      <!--<option>&#2547; Taka</option>-->
    </select>
  </div>
</li>

</ul>	
</div>
</div>

</div>
</div>
</div>	

 <div class="container-fluid">

</div>
    
<div class="left-menu " id="leftmenu">
	    <div class="left-closemenu" onclick="leftFunction()"><i class="icon-multiply"></i></div>
        <div class="left-logo"><img src="assets/images/logo.png" alt="" class="img-fluid" ></div>
        <ul class="left-menublock">
            <li><a href=""><i class="icon-user5"></i> My Account
	        <div class="username">Kamalesh Mandal</div>
	        </a></li>	
            <li><a href=""><i class="icon-shopping-cart-4"></i> My Orders</a></li>	
            <li><a href=""><i class="icon-recently-view"></i> Recently Viewed</a></li>	
            <li><a href=""><i class="icon-heart1"></i> Lists</a></li>	
            <li><a href=""><i class="icon-image"></i> Room Ideas</a></li>	
            <li><a href=""><i class="icon-credit-card"></i> Joss & Main Credit Card</a></li>	
            <li><a href=""><i class="icon-group"></i> Joss & Main Financing</a></li>	
            <li><a href=""><i class="icon-gift-box"></i> Gift Card</a></li>	
            <li><a href=""><i class="icon-notification"></i> Help Center</a></li>	
        </ul>

</header>
	
<!-- Login modal -->
       
    <div id="login_modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-body loginbody">
<button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
<div class="row">
<div class="col-sm-5 d-none d-sm-block"><div class="loginimgblock hightblock" id="forgotheight"><img src="/assets/images/loginbg.png" alt="" ></div></div>
<div class="col-sm-7" ng-cloak>
<!--LOGIN-->
<div class="loginblock" id="login" ng-show="logstep==1">
<h3>Login</h3>	
<p>Welcome Pickallure! Login</p>	
<div class="clr height5"></div>
	
<div class="clr height5"></div>

<p ng-show="showmsg" class="text-warning">{{msg}}</p>
<form  name="loginForm" id="loginForm" data-ng-submit="loginForm.$valid && submitLogin1($event)">
	<div class="mb-5">
	<label for="inputEmail" class="visually-hidden">Email address</label>	
	<input type="text" id="inputEmail" class="form-control" placeholder="Email/Mobile No" ng-model="email" required autofocus name="email">
	</div>
	<div class="mb-5">
	<label for="inputPassword" class="visually-hidden">Password</label>	
	<input type="password" id="inputPassword" class="form-control" placeholder="Password" ng-model="password" required name="password">
	</div>
	<p class="fontsize15">Dont't have an account? &nbsp;  <a href="javascript:void(0)" ng-click="signupFunction(2)"><strong>Sign Up</strong></a></p>
	<p class="text-center">Forgot password? <a href="javascript:void(0)" ng-click="forgetsendOtp()"><strong>Recover Password</strong></a></p>
	
	<div class="clr height5"></div>
	<button class="float-end btn-login" type="submit" ng-show="!loadinglogin">LOGIN</button>
	<button class="float-end btn-login" type="button" ng-show="loadinglogin">Please Wait..</button>
	<div class="clr height5"></div>
	<button class="float-end btn-login" ng-click="sendOtp()" type="button" ng-show="!submitLogin">LOGIN WITH OTP</button>
	<button class="float-end btn-login" type="button" ng-show="submitLogin"><i class="fa fa-circle-o-notch fa-spin"></i> Please wait..</button>
</form>	
<div class="clr height10"></div>	
	
</div>
<!--verification-->
<div class="loginblock" id="login" ng-show="logstep==3">
<h3>Verification</h3>	
<p>Welcome Pickallure! Verification</p>	
<div class="clr height5"></div>
	
<div class="clr height5"></div>

<p ng-show="showmsg" class="text-warning">{{msg}}</p>
<?=$this->Form->create(null, ['url' => ['controller' => 'Login', 'action' => 'index']]);?>
	<div class="mb-5 blockotp">
	<label for="otp" class="visually-hidden">OTP</label>	
	<input type="number" id="otp" ng-model="otp" class="partitioned"  required autofocus name="Otp" maxlength="6">
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
	<button class="float-end btn-login" type="submit" ng-show="!submitReg">CREATE ACCOUNT</button>
	<button class="float-end btn-login" type="button" ng-show="submitReg"><i class="fa fa-circle-o-notch fa-spin"></i> Please wait..</button>
</form>	
<div class="clr height10"></div>	
	
</div>

<!--Reset-Password-->
<div class="loginblock"  ng-show="logstep==4">
<h3>Reset Password</h3>	
<p>Welcome Pickallure!</p>	
<div class="clr height5"></div>
<p class="fontsize15">Dont't have an account? &nbsp;  <a href="javascript:void(0)" ng-click="signupFunction(2)"><strong>Sign Up</strong></a></p>	
<div class="clr height30"></div>

<p ng-show="showmsg" class="text-warning">{{msg}}</p>	
	<div class="mb-5">
	<label for="rinputEmail" class="visually-hidden">Enter OTP</label>	
	<input type="text" id="rinputEmail" class="form-control" placeholder="Enter OTP" required autofocus name="otp" ng-model="otp">
	</div>
	<div class="mb-5">
	<label for="rinputEmail" class="visually-hidden">Set Password</label>	
	<input type="text" id="rinputEmail" class="form-control" placeholder="Set Password" required autofocus name="password" ng-model="password">
	</div>

	<div class="clr height5"></div>
	<button class="float-end btn-login" type="submit" ng-click="forgetverifyotp()">Login</button>

<div class="clr height10"></div>	
	
</div>	


<div class="loginblock " id="vari" ng-show="logstep==5">
<h3>Verification</h3>	
<p>Welcome Pickallure! Verification</p>	
<div class="clr height5"></div>
	
<div class="clr height5"></div>

<p ng-show="showmsg" class="text-warning">{{msg}}</p>
<?=$this->Form->create(null, ['url' => ['controller' => 'Login', 'action' => 'index']]);?>
	<div class="mb-5 blockotp">
	<label for="otp" class="visually-hidden">OTP</label>	
	<input type="number" id="verification_code" ng-model="verification_code" class="partitioned" required autofocus name="Otp" maxlength="6">
	</div>
	
	
	<div class="clr height5"></div>
	<button class="float-end btn-login" type="button" ng-click="verifyotpregistration()" ng-show="!varificationCodeSubmit">Verify</button> &nbsp; 
	<button class="float-end btn-login" type="button" ng-show="varificationCodeSubmit"><i class="fa fa-circle-o-notch fa-spin"></i> Please wait..</button>
	<button class="float-end btn-login" ng-click="sendOtpreg()" type="button" ng-show="!submitreg">Resend</button>
		<button class="float-end btn-login" type="button" ng-show="submitreg"><i class="fa fa-circle-o-notch fa-spin"></i> Please wait..</button>
</form>	
<div class="clr height10"></div>	
	
</div>



</div>
</div>	
<div class="clr"></div>
</div>


</div>
</div>
</div>
<!-- /Login modal -->

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
<p>Welcome Pickallure!</p>	
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
<p>Welcome Pickallure!</p>	
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


</div>
<script>
    var ajxUrl = '<?php echo $this->Url->build('/products') ?>';
     var ajxUrllogin = '<?php echo $this->Url->build('/login') ?>';


</script>


<?php echo $this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min', '/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal',  '/admin_template/js/angular-1.5.8/angular-sanitize.min', '/admin_template/js/angular/product_search_auto.js?v=4'], ['block' => 'scriptBottom']) ?>