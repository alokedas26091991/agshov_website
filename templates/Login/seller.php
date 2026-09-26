<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Ropa+Sans&display=swap" rel="stylesheet">
  <!-- Bootstrap core CSS -->
  
  <?=$this->Html->css(['/seller/css/bootstrap.min','/seller/css/mdb.min','/seller/css/style.min']);?>
  <style type="text/css">
    html,
    body,
    .carousel {
      height: 70vh;
    }

    @media (max-width: 740px) {
      html,
      body,
      header,
      .carousel {
        height: 100vh;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {
      html,
      body,
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

<body ng-app="seller" ng-controller="sellerCrt">

  <header>
    <div class="top-header-section">
      <div class="container">
        <div class="top-header-inner">
          <div class="row">
            <div class="col-md-7">
              <div class="logo-left">
                <a href="#">
                 <img src="/seller/img/logo.png" class="img-fluid" alt="">
                </a>
              </div><!--//logo-left-->
            </div>
            <div class="col-md-5">
              <div class="login-area">
                <!-- Default form register -->
                <form class="" action="#!">
                  <div class="form-row top-login-frm">
                    <div class="col">
                      <label>Email/Mobile Number</label>
                      <!-- First name -->
                      <input type="text" id="" class="form-control">
                    </div>
                    <div class="col">
                      <label>Password</label>
                      <!-- Password -->
                      <input type="password" id="" class="form-control">
                    </div>
                    <div class="col-3">
                      <!-- Sign up button -->
                      <div class="pswrd text-right">
                        <a href="#!">Unable to Login?</a>
                      </div>
                      
                      <button class="btn login-btn" type="submit">Login</button>
                    </div>
                  </div>
                </form>
                <!-- Default form register -->
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
        <!-- <a class="navbar-brand" href="#!" target="_blank">
          <strong>MDB</strong>
        </a> -->
        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#!">Resources</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#!">Seller Diaries</a>
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
        <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-1z" data-slide-to="1"></li>
      </ol>
      <!--/.Indicators-->

      <!--Slides-->
      <div class="carousel-inner" role="listbox">

        <!--First slide-->
        <div class="carousel-item active">
          <div class="view" style="background-image: url('/seller/img/01.jpg'); background-repeat: no-repeat; background-size: cover;">
          </div>
        </div>
        <!--/First slide-->

        <!--Second slide-->
        <div class="carousel-item">
          <div class="view" style="background-image: url('/seller/img/02.jpg'); background-repeat: no-repeat; background-size: cover;">
          </div>
        </div>
        <!--/Second slide-->
      </div>
      <!--/.Slides-->
    </div>
    <!--/.Carousel Wrapper-->

    <div class="banner-formDivOuter formPadding gst-form">
      <h2 class="register-now-label">WANT TO SELL ON kk cart? </h2>
      <h5 class="register-now-label gst-label">List your products in less than 10 minutes! </h5>

      <!-- Default form login -->
      <form class="text-center p-3" action="#!">
        <!-- GST No -->
        <label class="sd-input">Enter your GST</label>
        <input type="text" id="" class="form-control mb-3">
        <!-- Sign in button -->
        <button class="btn btn-info btn-block reg-btn" type="submit">Register Now</button>
      </form>
      <!-- Default form login -->
      <div class="professional-service">Need help in getting GST?<br> 
        <a href="#!" target="_blank">Click Here</a> to download the list of professional service providers<br><br>
        <a href="#!" target="_blank">Click Here</a> to watch training videos to know how selling on Snapdeal works</div>
    </div>
  </div>

  <!--Main layout-->
  <main>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">
      <a class="btn btn-outline-white" href="#!" target="_blank"
        role="button">Download MDB
        <i class="fas fa-download ml-2"></i>
      </a>
      <a class="btn btn-outline-white" href="#!" target="_blank" role="button">Start
        free tutorial
        <i class="fas fa-graduation-cap ml-2"></i>
      </a>
    </div>
    <!--/.Call to action-->

    <hr class="my-4">

    <!-- Social icons -->
    <div class="pb-4">
      <a href="#!" target="_blank">
        <i class="fab fa-facebook-f mr-3"></i>
      </a>

      <a href="#!" target="_blank">
        <i class="fab fa-twitter mr-3"></i>
      </a>

      <a href="#!" target="_blank">
        <i class="fab fa-youtube mr-3"></i>
      </a>

      <a href="#!" target="_blank">
        <i class="fab fa-google-plus-g mr-3"></i>
      </a>

      <a href="#!" target="_blank">
        <i class="fab fa-dribbble mr-3"></i>
      </a>

      <a href="#!" target="_blank">
        <i class="fab fa-pinterest mr-3"></i>
      </a>

      <a href="#!" target="_blank">
        <i class="fab fa-github mr-3"></i>
      </a>

      <a href="#!" target="_blank">
        <i class="fab fa-codepen mr-3"></i>
      </a>
    </div>
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3">
      © 2019 kkcart. All rights reserved.
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->

  <!-- Initializations -->
  <?=$this->Html->script(['/seller/js/jquery-3.4.1.min','/seller/js/popper.min','/seller/js/bootstrap.min.js','/seller/js/mdb.min']);?>
  <script>var ajxUrl='<?=$this->Url->build("/admin/products");?>'</script>
	  <?=$this->Html->script(['/admin_template/js/angular-1.5.8/angular.min.js','/admin_template/js/angular-1.5.8/ui-bootstrap-tpls.min','/admin_template/js/angular-1.5.8/angular-ui-bootstrap-modal.js']);?>
  <script type="text/javascript">
    // Animations initialization
    //new WOW().init();
var myApp=angular.module("seller",[]);
myApp.controller('sellerCrt', ['$scope','$http', function($scope,$http) {
	alert(1);
	$scope.checkgst=function(no){
		
		const headerDict = {
  'Content-Type': 'application/json',
  'Accept': 'application/json',
  'Access-Control-Allow-Headers': 'Content-Type',
  'Authorization': 'Bearer 3d80fd20d4540798919e48d7c872d09c8eb93036',
  'client_id':'242324v424244255545343'
};

const requestOptions = {                                                                                                                                                                                 
  headers: headerDict, 
};

 $http.get('https://pro.mastersindia.co/commonapis/searchgstin?gstin=19ABCFA3943R1ZW', requestOptions).then(function (resp) {

                
            });
	};
	$scope.checkgst(1);
}]);

  </script>
</body>

</html>
