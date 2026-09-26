<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>kk cart</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Ropa+Sans&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
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
  
  <!--Modal: Register Form-->
  <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
      <!--Content-->
      <div class="modal-content modal-register">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100">WANT TO SELL ON KK CART?</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!--Body-->
        <div class="modal-body mb-1">
          <h5>List your products in less than 10 minutes!</h5>
          <div class="md-form form-sm">
            <i class="fas fa-book prefix"></i>
            <input type="text" id="gstno" class="form-control form-control-sm validate">
            <label data-error="wrong" data-success="right" for="gstno">Enter your GST</label>
          </div>
          <div class="text-center">
            <button class="btn modal-register-btn">Register Now</button>
          </div>
        </div>
        <!--Footer-->
        <div class="modal-footer">
          <div class="options text-center w-100">
            <p>Need help in getting GST?<br>
            <a href="#!" class="blue-text">Click Here</a> to download the list of professional service providers</p>
          </div>
        </div>
        
      </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: Register Form-->

  <!--Modal: Login Form-->
  <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
      <div class="modal-content modal-login">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100">Seller Login</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
           <div class="modal-body mb-1">
		<?= $this->Flash->render('auth') ?>
		<?= $this->Form->create('',['url' => ["controller"=>"Users","action"=>"login"]]) ?>
          <div class="md-form">
            <i class="fas fa-envelope prefix grey-text"></i>
            <input type="email" id="email" name="email" class="form-control validate">
            <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
          </div>

          <div class="md-form">
            <i class="fas fa-lock prefix grey-text"></i>
            <input type="password" id="password" name="password" class="form-control validate">
            <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
          </div>

          <div class="text-center">
            <button class="btn modal-register-btn">Login</button>
          </div>
          </form>
        </div>
        <div class="modal-footer d-flex justify-content-center">        
          <p>Forgot <a href="#" class="blue-text">Password?</a></p>
        </div>
      </div>
    </div>
  </div>
  <!--Modal: Login Form-->

  <!--============header Start ============-->
  <header class="wow fadeIn">
    <div class="top-header-section">
      <div class="container">
        <div class="top-header-inner">
          <div class="row">
            <div class="col-md-7 col-6">
              <div class="logo-left">
                <a href="#">
                 <img src="<?php echo $this->Url->image("vendor/assets/images/logo.png", ['pathPrefix' => '']) ?>" class="img-fluid" alt="">
                </a>
              </div><!--//logo-left-->
            </div>
            <div class="col-md-5 col-6">
              <div class="login-register-button padd-header-two clerfix">
                <button class="btn login-btn" data-toggle="modal" data-target="#modalLRForm">START SELLING</button>
                <button class="btn login-btn mr-3" data-toggle="modal" data-target="#modalLoginForm">Login</button>
              </div>
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
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Users","action"=>"login"]); ?>">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"resources"]); ?>">Resources</a>
			  
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"seller_diaries"]); ?>">Seller Diaries</a>
            </li>
          </ul>

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
  <!--============End header Start ============-->
  <!--Main layout-->
  <main>
    <div class="hero-banner-wrapper single-services-wrapper"> 
      <div class="container">
        <div class="white-bx-bg mb-5">
          <!-- <div class="white-bx-title">
            <h2 class="heading24">Articles</h2>
          </div> -->
          <div class="resources-content-area">         
            <div class="resources-blog">
              <div class="row">
                <div class="col-lg-8">
                  <div class="white-bx-title mb-3 wow fadeIn">
                    <h3>Recent</h3>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="story-block wow fadeIn">
                        <div class="story-block-inner">
                          <div class="story-details">
                            <div class="portrait octogon">
                              <img alt="" class="img-fluid" src="<?php echo $this->Url->image("vendor/img/6166205_orig.jpg", ['pathPrefix' => '']) ?>">
                            </div>
                            <div class="quote">
                              <blockquote>
                                <p>Meditation shabby chic master cleanse banh mi Godard. Asymmetrical Wes Anderson Intelligentsia you probably haven't heard of them.</p>
                                <cite>
                                  <p>Kristi McSweeney</p>
                                  <span>Thundercats twee</span>
                                </cite>
                              </blockquote>
                            </div>
                          </div>
                          <div class="story-description">
                            <p>Vishal, Continuing with our series highlighting the success of our sellers, we present here the story of Vishal Moradiya from Surat, whose business ...</p>
                            <a href="blog-details.html" class="btn read-btn waves-effect waves-light">Read More..</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="story-block wow fadeIn">
                        <div class="story-block-inner">
                          <div class="story-details">
                            <div class="portrait octogon">
                              <img alt="" class="img-fluid" src="<?php echo $this->Url->image("vendor/img/6166205_orig.jpg", ['pathPrefix' => '']) ?>">
                            </div>
                            <div class="quote">
                              <blockquote>
                                <p>Meditation shabby chic master cleanse banh mi Godard. Asymmetrical Wes Anderson Intelligentsia you probably haven't heard of them.</p>
                                <cite>
                                  <p>Kristi McSweeney</p>
                                  <span>Thundercats twee</span>
                                </cite>
                              </blockquote>
                            </div>
                          </div>
                          <div class="story-description">
                            <p>Vishal, Continuing with our series highlighting the success of our sellers, we present here the story of Vishal Moradiya from Surat, whose business ...</p>
                            <a href="blog-details.html" class="btn read-btn waves-effect waves-light">Read More..</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="story-block wow fadeIn">
                        <div class="story-block-inner">
                          <div class="story-details">
                            <div class="portrait octogon">
                              <img alt="" class="img-fluid" src="<?php echo $this->Url->image("vendor/img/6166205_orig.jpg", ['pathPrefix' => '']) ?>">
                            </div>
                            <div class="quote">
                              <blockquote>
                                <p>Meditation shabby chic master cleanse banh mi Godard. Asymmetrical Wes Anderson Intelligentsia you probably haven't heard of them.</p>
                                <cite>
                                  <p>Kristi McSweeney</p>
                                  <span>Thundercats twee</span>
                                </cite>
                              </blockquote>
                            </div>
                          </div>
                          <div class="story-description">
                            <p>Vishal, Continuing with our series highlighting the success of our sellers, we present here the story of Vishal Moradiya from Surat, whose business ...</p>
                            <a href="blog-details.html" class="btn read-btn waves-effect waves-light">Read More..</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="story-block wow fadeIn">
                        <div class="story-block-inner">
                          <div class="story-details">
                            <div class="portrait octogon">
                              <img alt="" class="img-fluid" src="<?php echo $this->Url->image("vendor/img/6166205_orig.jpg", ['pathPrefix' => '']) ?>">
                            </div>
                            <div class="quote">
                              <blockquote>
                                <p>Meditation shabby chic master cleanse banh mi Godard. Asymmetrical Wes Anderson Intelligentsia you probably haven't heard of them.</p>
                                <cite>
                                  <p>Kristi McSweeney</p>
                                  <span>Thundercats twee</span>
                                </cite>
                              </blockquote>
                            </div>
                          </div>
                          <div class="story-description">
                            <p>Vishal, Continuing with our series highlighting the success of our sellers, we present here the story of Vishal Moradiya from Surat, whose business ...</p>
                            <a href="blog-details.html" class="btn read-btn waves-effect waves-light">Read More..</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 wow fadeIn">
                  <div class="white-bx-title mb-3">
                    <h3>Most Popular</h3>
                  </div>
                  <div class="sidebar-blogs">
                    <div class="sidebar-post">
                      <img src="<?php echo $this->Url->image("vendor/img/popular1.jpg", ['pathPrefix' => '']) ?>" alt="">
                      <div class="post-inner">
                        <h3><a href="#!" title="">Students Have Enough Enjoy the Summer</a></h3>
                        <span>02 November 2016</span>
                      </div>
                    </div>
                    <div class="sidebar-post">
                      <img src="<?php echo $this->Url->image("vendor/img/popular2.jpg", ['pathPrefix' => '']) ?>" alt="">
                      <div class="post-inner">
                        <h3><a href="#!" title="">Hard Work Is Brings Great Results Here</a></h3>
                        <span>02 November 2016</span>
                      </div>
                    </div>
                    <div class="sidebar-post">
                      <img src="<?php echo $this->Url->image("vendor/img/popular3.jpg", ['pathPrefix' => '']) ?>" alt="">
                      <div class="post-inner">
                        <h3><a href="#!" title="">Neque porro quisqua dorem ipsum dolor</a></h3>
                        <span>02 November 2016</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>                
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="down-button-component py-5 bg-white wow fadeInUp">
      <div class="container">
        <div class="business text-center">Start your business with Snapdeal &amp; reach customers across India</div>
        <a class="startDiv mt-3" data-toggle="modal" data-target="#modalLRForm">START SELLING NOW</a> 
      </div>
    </div>
    </div>        
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer wow fadeIn">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="queries">Download our seller apps from here</div>
           <a class="googleApp" href="#!">
            <img src="<?php echo $this->Url->image("vendor/img/google-play.png", ['pathPrefix' => '']) ?>">
          </a>    
        </div>
        <div class="col-md-2 offset-md-2">
          <div class="siteMap">
            <p>Site Map</p>
            <ul>
              <li><a href="">Home</a></li>             
              <li><a href="">Resources</a></li>
              <li><a href="">Seller Diaries</a></li>              
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="siteMap">
            <p>Social</p>
            <a class="social" href="#!" target="_blank">
              <img src="<?php echo $this->Url->image("vendor/img/lin.png", ['pathPrefix' => '']) ?>">
            </a>
            <a class="social" href="#!" target="_blank">
              <img src="<?php echo $this->Url->image("vendor/img/fb.png", ['pathPrefix' => '']) ?>">
            </a>
            <a class="social" href="#!" target="_blank">
              <img src="<?php echo $this->Url->image("vendor/img/twit.png", ['pathPrefix' => '']) ?>">
            </a>
            <a class="social" href="#!" target="_blank">
              <img src="<?php echo $this->Url->image("vendor/img/googlePlus.png", ['pathPrefix' => '']) ?>">
            </a> 
            <a class="social" href="#!" target="_blank">
              <img src="<?php echo $this->Url->image("vendor/img/youtube.png", ['pathPrefix' => '']) ?>">
            </a>
          </div>
        </div>
      </div>
    </div>  

    <!--Copyright-->
    <div class="footer-copyright py-3 mt-4">
      <div class="container">
        © 2019 kkcart. All rights reserved.
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
