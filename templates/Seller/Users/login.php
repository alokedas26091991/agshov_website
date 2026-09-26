<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Welcome to ARGSA</title>
  <link rel="icon" type="image/x-icon" href="/assets/images/favicon.jpg">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <?=$this->Html->css(['/vendor/css/bootstrap.min.css','/vendor/css/mdb.min.css','/vendor/css/style.min.css']);?>
  <link rel="shortcut icon" href="/vendor/img/logo.png" type="image/x-icon" />
  <style type="text/css">

    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #929FBA !important;
      }
    }

  </style>

</head>

<body ng-app="gst" ng-controller="gstApp">
  <?= $this->Flash->render() ?>
  <header>
    <div class="top-header-section">
      <div class="container">
        <div class="top-header-inner">
          <div class="row">
            <div class="col-md-7 col-4">
              <div class="logo-left">
                <a href="/">
                 <img src="<?php echo $this->Url->image("/assets/images/logo.png", ['pathPrefix' => 'vendor/']) ?>" alt="" >
                </a>
              </div><!--//logo-left-->
            </div>
            <div class="col-md-5 col-8">
               
              <div class="login-area">
			 
                <!-- Default form register -->
                <?= $this->Form->create([],['validate']) ?>
                  <div class="form-row top-login-frm">
                    <div class="col-md-4 col-sm-12 col-12">
                      <label>Email ID</label>
                      <!-- First name -->
                      <input type="text" id="email" name="email" required class="form-control">
                    </div>
                    <div class="col-md-4 col-sm-12 col-12 password-group">
						<span class="password-visibility tgap"><i class="fa fa-eye-slash"></i></span>
                      <label>Password</label>
                       Password 
                      <input type="password" id="password" name="password" class="form-control password-box">
                    </div>
<!--                            <div class="col-md-4 col-sm-12 col-12">-->
<!--<span class="pass-show pass-hide" id="eyeclick"  onclick="passFunction()"><i class="icon-eye-block"></i><i class="icon-eye"></i></span>-->
<!--<label for="myInput" class="visually-hidden">Password</label> -->
<!--<input type="password" class="form-control" placeholder="Password" id="myInput"  required name="password">-->
<!--</div>-->
                    <div class="col-md-4 col-sm-12 col-12">
                      <!-- Sign up button -->
                      <div class="pswrd">
                        <a href="<?php echo $this->Url->build(["controller"=>"Users","action"=>"forget_password", 'prefix' => 'Seller', 'plugin' => NULL, '_ext' => NULL]); ?>">Unable to Login?</a>
                      </div>
                      
                      <button class="btn login-btn" type="submit">Login</button>
                    </div>
                  </div>
                </form>
                <!-- Default form register -->
                <button class="navbar-toggler float-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <!-- <span class="navbar-toggler-icon"></span> -->
                </button>
              </div>
            </div>
          </div>
        </div><!--//top-header-inner-->
      </div><!--//container-->
    </div><!--//top-header-section-->

  </header>

  <div class="banner-section-area">
    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade c-carousel" data-ride="carousel">

      <!--Indicators-->
      <ol class="carousel-indicators">
        <?php
        $i=0;
        foreach($slideralls as $slider)
        {
            if($i==0)
            {
        ?> 
        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
        
        <?php
       
        }
        else
        {
        ?>
        <li data-target="#carousel-example-1z" data-slide-to="<?=$i?>"></li>
        <?php
        }
         $i++;
        }
        ?>
       
      </ol>
      <!--/.Indicators-->

      <!--Slides-->
      <div class="carousel-inner" role="listbox">

        <?php
        $i=0;
        foreach($slideralls as $slider)
        {
            if($i==0)
            {
        ?>
        <div class="carousel-item active">
             <div class="view" style="background-image: url('/upload/slider/<?=$slider->image_link?>'); background-repeat: no-repeat; background-size: cover;">
        
          </div>
        </div>
        <?php
        $i++;
        }
        else
        {
        ?>
        <div class="carousel-item">
             <div class="view" style="background-image: url('/upload/slider/<?=$slider->image_link?>'); background-repeat: no-repeat; background-size: cover;">
        
          </div>
        </div>
        <?php
        }
        }
        ?>
        
        
       
      </div>
      <!--/.Slides-->
    </div>
    <!--/.Carousel Wrapper-->

   
  </div>

  <!--Main layout-->
  <main>
    <div class="banner_bottom_section">
      <div class="container">
        <div class="row">
          <div class="col-md-4 category mb-20">
            <span class="cate-cont text-capi">Sell 24x7 across </span>
            <span class="cate-cont">3000 cities and towns</span>
          </div>
          <div class="col-md-4 category mb-20">
            <span class="cate-cont text-capi">Millions of users and </span>
            <span class="cate-cont">3,00,000 sellers across India</span>
          </div>
          <div class="col-md-4 category mb-20">
            <span class="cate-cont text-capi">Quick payments and <br>transparent processes </span>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <hr>
    </div>

    <div class="how-to-sell">
      <div class="container">
        <h1 class="sellingOnSnapdeal wow fadeInUp">How it is simple to sell on ARGSA</h1>
        <div class="row pos-rel">
          <div class="verti-line d-none d-md-block"></div>
          <div class="col-md-5 noDisplayInMob textAlineRight">
            <img class="center wow fadeInLeft" src="<?php echo $this->Url->image("img/Register_yourself_and_List_your_products.png", ['pathPrefix' => 'vendor/']) ?>">
          </div>
          <div class="col-md-2 middleImageSteps">
            <img src="<?php echo $this->Url->image("img/list-step-1.png", ['pathPrefix' => 'vendor/']) ?>" class="wow fadeInUp">
          </div>
          <div class="col-md-5 sellingText wow fadeInRight">
            <span>Step 1: Register yourself and List your products</span>
            <ul class="cus-pd">
              <li class="mb-10">
                <span>Register your business for free and create a product catalogue</span>
              </li>
              <li class="mb-10">
                <span>Sell under your own private label or sell an existing brand</span>
              </li>
              <li class="mb-10">
                <span>Get self-serve training</span>
              </li>
              <li>
                <span>Order Packaging material from our website to start selling</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="row pos-rel">
          <div class="verti-line d-none d-md-block"></div>
          <div class="col-md-5 order-md-3 noDisplayInMob textAlineLeft bottomDiv float-right ">
            <img class="center wow fadeInRight" src="<?php echo $this->Url->image("img/service_provider.png", ['pathPrefix' => 'vendor/']) ?>">
          </div>
          <div class="col-md-2 order-md-2 order-sm-1 middleImageSteps upperDiv float-right">
            <img src="<?php echo $this->Url->image("img/list-step-2.png", ['pathPrefix' => 'vendor/']) ?>" class="wow fadeInUp">
          </div>
          <div class="col-md-5 order-md-1 order-sm-2 sellingText text-left bottomDiv float-right wow fadeInLeft">
            <span>Step 2: Get support from professional service provider</span>
            <ul class="cus-pd">
              <li class="mb-10">
                <span>Get your documentation &amp; cataloging done with ease from our Professional Services network across India</span>
              </li>
              <li>
                <span>Increase your product visibility with high-quality product photo-shoot by our Partnered Photographers</span>
              </li>
            </ul>
          </div>   
        </div>
        <div class="row pos-rel">
          <div class="verti-line d-none d-md-block"></div>
          <div class="col-md-5 noDisplayInMob textAlineRight">
            <img src="<?php echo $this->Url->image("img/Receive_orders_Schedule_a_pickup.png", ['pathPrefix' => 'vendor/']) ?>" class="wow fadeInLeft">
          </div>
          <div class="col-md-2 middleImageSteps">
            <img src="<?php echo $this->Url->image("img/list-step-3.png", ['pathPrefix' => 'vendor/']) ?>" class="wow fadeInUp">
          </div>
          <div class="col-md-5 sellingText wow fadeInRight">
            <span>Step 3: Receive orders &amp; Schedule a pickup</span>
            <ul class="cus-pd">
              <li class="mb-10">
                <span>Once listed, your products will be available to millions of users across India </span>
              </li>
              <li>
                <span>Get orders and manage your online business via our Seller Panel and Seller Zone Mobile App</span>
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 order-md-3 noDisplayInMob textAlineLeft float-right">
            <img class="center wow fadeInRight" src="<?php echo $this->Url->image("img/grow_your_business.png", ['pathPrefix' => 'vendor/']) ?>">
          </div>
          <div class="col-md-2 order-md-2 order-sm-1 middleImageSteps upperDiv2 float-right">
            <img src="<?php echo $this->Url->image("img/list-step-4.png", ['pathPrefix' => 'vendor/']) ?>" class="wow fadeInUp">
          </div>
          <div class="col-md-5 order-md-1 order-sm-2 sellingText text-left bottomDiv2 float-right wow fadeInRight" >
            <span>Step 4: Receive quick payment &amp; grow your business</span>
            <ul class="ptl">
              <li class="mb-10">
                <span>Receive quick and hassle-free payments in your account once your orders are fulfilled</span>
              </li>
              <li>
                <span>Expand your business with low interest &amp; collateral-free loans</span>
              </li>
            </ul>
          </div>
        </div>
      </div>      
    </div>



    <div class="bottom-text-sextion wow fadeInUp">
      <div class="container">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
      </div>
    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
        <div class="footer-logo"> <a href="/"><img src="<?php echo $this->Url->image("assets/images/logo.png", ['pathPrefix' => '']) ?>" alt="" class="img-fluid" > </a></div>
      </div>
      
      <div class="divider clr"></div>
    </div>
    <div class="clr height10"></div>
    <div class="row">
      <div class="col-lg-5 text-white">
        <h3 class="heading">About Us</h3>
        <p>Born in 2020 in India, ARGSA is India's leading Online & Offline Shopping & Service platform and also an Online Business platform. ARGSA online shopping network is one of India's largest online shopping portals with 120 million users and 2 million merchants. ARGSA is also registered with different Market Leader Brands for B2B services.</p>
        <div class="clr "></div>
        <h3 class="heading">Follow us on</h3>
        <div class="social-block">
         <a href="" target="_blank" title="Facebook" class="facebook"><i class="fa fa-facebook-f"></i></a>
         <a href="" target="_blank" title="Instragram" class="instagram"><i class="fa fa-instagram"></i></a>
         <a href="" target="_blank" title="Youtube" class="youtube"><i class="fa fa-youtube"></i></a>
         <a href="" target="_blank" title="Linkdn" class="linkedin"><i class="fa fa-linkedin-in"></i></a>
         <a href="" target="_blank" title="Facebook Group" class="facebook"><i class="fa fa-users"></i></a>
         </div>
        <div class="clr height10"></div>
      </div>
      <div class="col-lg-3">
        <h3 class="heading">Information</h3>
        <ul class="list">
			<li><a href="/">Home</a></li>
            <li><a href="/pages/about">About Us</a></li>
            <li><a href="/pages/information">Information</a></li>
            <li><a href="/pages/support">Support</a></li>
            <li><a href="/pages/csr">Csr</a></li>
            <li><a href="/pages/contact">Contact Us</a></li>
            <li><a href="/pages/certificate">Certificates</a></li>	
        </ul>
      </div>

      <div class="col-lg-4">
        <h3 class="heading">Get in touch</h3>
        <?= $this->Form->create(null, [
						'url' => ['controller' => 'pages', 'action' => 'contact']
					]); ?>	
		  <div class="row gettouch">
		<div class="col-md-6 pad5">
		<div class="mb-3">
		<input type="text" id="FirstName" name="name" class="form-control" placeholder="Name" required>
		</div>	
			
		<div class="mb-3">
	    <input type="email" id="" class="form-control" name="email" placeholder="Email" required>
		</div>
			
		<div class="mb-3">
	    <input type="tel" id="" class="form-control"  name="mobile" placeholder="Phone" required>
		</div>	
		</div>	
			
		<div class="col-md-6 pad5">	
		<div class="mb-3">
		<textarea rows="1" class="form-control" id="Message" name="message"  placeholder="Message" style="height: 84px;"></textarea>	
		</div>
			<div class="d-grid">
		<button class="btn btn-style"  type="submit" name="sub" style="width: 100%;"><span>SEND</span></button>
		<!--<a href="#" class="btn btn-style"><span>Send</span></a>-->
			</div>
		</div>	
         </div>
		</form>	
		
      </div>
    </div>
  </div>
  <div class="clr height20"></div>
  <div class="copyright">
    <div class="container">© 2023 Copyrights ARGSA, Ail Righis Reserved </div>
  </div>
</footer>

  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script>var ajxUrl='<?=$this->Url->build("/vendor/users");?>';</script>
  <?=$this->Html->script(['/vendor/js/jquery-3.4.1.min.js','/vendor/js/popper.min.js','/vendor/js/bootstrap.min.js','/vendor/js/mdb.min.js','/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular/gst']);?>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>

</html>