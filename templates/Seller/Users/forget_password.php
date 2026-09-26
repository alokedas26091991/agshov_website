<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Welcome to Febino</title>
  <link rel="icon" type="image/x-icon" href="/vendor/img/logo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Ropa+Sans&display=swap" rel="stylesheet">

  
   <?=$this->Html->css(['/vendor/css/bootstrap.min.css','/vendor/css/mdb.min.css','/vendor/css/style.min.css']);?>
  
  <style type="text/css">
    html,
    .carousel {
      height: 70vh;
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      .navbar:not(.top-nav-collapse) {
        background: #929FBA !important;
      }
    }

  </style>
</head>

<body>

  <header>
    <div class="top-header-section">
      <div class="container">
        <div class="top-header-inner">
          <div class="row">
            <div class="col-md-7 col-6">
              <div class="logo-left">
                <a href="/">
                 <img src="<?php echo $this->Url->image("img/logo.png", ['pathPrefix' => 'vendor/']) ?>" class="img-fluid" alt="" style="height:90px;">
                </a>
              </div><!--//logo-left-->
            </div>
            <div class="col-md-5 col-6">
            
            </div>
          </div>
        </div><!--//top-header-inner-->
      </div><!--//container-->
    </div><!--//top-header-section-->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <!-- Brand -->
       <!--  <a class="navbar-brand" href="#!" target="_blank">
          <img src="img/logo.png">
        </a> -->
        <!-- Collapse -->
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left -->
          

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons right-nav-item d-block d-lg-none">
            <li class="nav-item">
              <a href="#!" class="nav-link">
                Login
              </a>
            </li>            
            <li class="nav-item">
              <a href="#!" class="nav-link">
                START SELLING
              </a>
            </li>
          </ul>
        </div>

      </div>
    </nav>
    <!-- Navbar -->
  </header>

  <div class="banner-section-area">
    <!--Carousel Wrapper-->
    <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">

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

    <div class="banner-formDivOuter formPadding gst-form">
      <h2 class="register-now-label">Forgot Password </h2>
      <h5 class="register-now-label gst-label">Did You Forget Your Password?</br>
											   Please enter Email ID :--</h5>

      <!-- Default form login -->
      
	  <?= $this->Form->create(null, [
						'type' => 'file','url' => ['controller' => 'Users', 'action' => 'forget_password'],'id'=>'registerForm','class'=>'text-center p-3'
	  ]); ?>
        <!-- GST No -->
        <label class="sd-input">Enter Email ID</label>
        <input type="email" id="email" name="email" required class="form-control mb-3">
        <!-- Sign in button -->
        <button class="btn btn-info btn-block reg-btn" type="submit">Submit</button>
      </form>
      <!-- Default form login -->
     
    </div>
  </div>


  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer wow fadeIn">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="queries">Seller Helpline</div>
          <span class="contact-info-label"></span>Mobile:  <a href="tel:">0000000000</a>    
        </div>
<!--        <div class="col-md-2 offset-md-2">
          <div class="siteMap">
            <p>Site Map</p>
            <ul>
              <li><a href="">Home</a></li>             
              <li><a href="">Resources</a></li>
              <li><a href="">Seller Diaries</a></li>              
            </ul>
          </div>
        </div>-->
        <div class="col-md-4">
          <div class="siteMap">
            <p>Social</p>
            <a class="social" href="#!" target="_blank">
              <img src="<?php echo $this->Url->image("img/lin.png", ['pathPrefix' => 'vendor/']) ?>">
            </a>
            <a class="social" href="#!" target="_blank">
              <img src="<?php echo $this->Url->image("img/fb.png", ['pathPrefix' => 'vendor/']) ?>">
            </a>
            <a class="social" href="#!" target="_blank">
              <img src="<?php echo $this->Url->image("img/twit.png", ['pathPrefix' => 'vendor/']) ?>">
            </a>
            <a class="social" href="#!" target="_blank">
              <img src="<?php echo $this->Url->image("img/googlePlus.png", ['pathPrefix' => 'vendor/']) ?>">
            </a> 
            <a class="social" href="#!" target="_blank">
              <img src="<?php echo $this->Url->image("img/youtube.png", ['pathPrefix' => 'vendor/']) ?>">
            </a>
          </div>
        </div>
      </div>
    </div>  

    <!--Copyright-->
    <div class="footer-copyright py-3 mt-4">
      <div class="container">
        © 2020 pickallure. All rights reserved.
      </div>      
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <?=$this->Html->script(['/vendor/js/jquery-3.4.1.min.js','/vendor/js/popper.min.js','/vendor/js/bootstrap.min.js','/vendor/js/mdb.min.js']);?>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>
</body>

</html>
