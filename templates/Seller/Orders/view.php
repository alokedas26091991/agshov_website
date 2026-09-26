<style>
@import "compass/css3";



.checkout-wrap {
  color: #444;
  margin: 40px auto;
  max-width: 890px;
  position: relative;
}
ul.checkout-bar {
  margin: 0 20px;
  li {
    color: #ccc;
    display: block;
    font-size: 13px;
    padding: 14px 20px 14px 80px;
    position: relative;
    &:before {
      background: #ddd;
      border: 2px solid #FFF;
      border-radius: 50%;
      color: #fff;
      font-size: 16px;
      left: 20px;
      line-height: 37px;
      height: 35px;
      position: absolute;
      text-align: center;
      text-shadow: 1px 1px rgba(0, 0, 0, 0.2);
      top: 4px;
      width: 35px;
      z-index: 999;      
    }
     &.active {
      color: #8bc53f;
      font-weight: bold;
      &:before {
        background: #8bc53f; 
        z-index: 99999;
      }
    }
    &.visited {
      background: #ECECEC;
      color: #57aed1;
      z-index: 99999;
      &:before {
       background: #57aed1; 
        z-index: 99999;
      }
    }
    &:nth-child(1) {
      &:before {
        content: "1";
      }
    }
     &:nth-child(2) {
      &:before {
        content: "2";
      }
    }
    &:nth-child(3) {
      &:before {
        content: "3";
      }
    }
     &:nth-child(4) {
      &:before {
        content: "4";
      }
    }
    &:nth-child(5) {
      &:before {
        content: "5";
      }
    }
    &:nth-child(6) {
      &:before {
        content: "6";
      }
    }
  }
  a {
    color: #57aed1;
    font-size: 13px; 
  }
}



@media all and (min-width: 800px) {
 .checkout-bar li.active:after {
    background-color: #8bc53f;
    content:"";
    height: 15px;
    width: 100%;
    left: 50%;
    position: absolute;
    top: -50px;
    z-index: 0;
  }
  .checkout-wrap {
    margin: 80px auto;
  }
  ul.checkout-bar {
  background-color: #EcEcEc;
  border-radius: 15px;
  height: 15px;
  margin: 0 auto;
  padding: 0;
  position: absolute;
  width: 100%;
  &:before {
    background-color: #57aed1;
    border-radius: 15px;
    content: " ";
    height: 15px;
    left: 0;
    position: absolute;
    width: 10%;
  }
   li {
      display: inline-block;
      margin: 50px 0 0;
      padding: 0;
      text-align: center;
      width: 19%;
      &:before {
        height: 45px;
        left: 40%;
        line-height: 45px;
        position: absolute;
        top: -65px;
        width: 45px;
        z-index: 99;
      }
      &.visited {
        background: none;
        &:after {
          background-color: #57aed1;
          content: "";
          height: 15px;
          left: 50%;
          position: absolute;
          top: -50px;
          width: 100%;
          z-index: 99;
        }
      }
    }
  }
}
</style>
<div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">Create Single Listing</h4>
                    </div>
                    <div class="col-7 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10">
                                <div class=""><a href="add_brand.html" class="btn btn-lg btn-upload waves-effect waves-light"><i class="mdi mdi-plus"></i> Upload Signature</a></div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
			<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Earnings -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body border-bottom">                                
                            </div>
                            <div class="card-body">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<div class="checkout-wrap">
  <ul class="checkout-bar">

    <li class="visited first">
      <a href="#">Login</a>
    </li>
    
    <li class="previous visited">Shipping & Billing</li>
    
    <li class="active">Shipping Options</li>
    
    <li class="next">Review & Payment</li>
    
    <li class="">Complete</li>
       
  </ul>
</div>    </div> </div> </div> </div> </div>
    