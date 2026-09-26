// Define the AngularJS module
var app = angular.module('billing', []);

// Define the controller
app.controller('billingController', ['$scope','$http', function ($scope,$http) {
        // Sample list of products
        $scope.products = [

        ];

        // List to hold the filtered suggestions
        $scope.suggestions = [];
		
        $scope.quantity = 1;
        $scope.sale_date =new Date();
		
		$scope.today = new Date().toISOString().split('T')[0];
		
    $scope.printDiv = function(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
		document.getElementById('clickme').style.display='none';
        window.print();
        document.body.innerHTML = originalContents;

        // Optionally, you can reload the page to ensure everything goes back to normal
        location.reload();
    };
		
        // Function to update suggestions based on the search query
        $scope.updateSuggestions = async function () {
           
            var query = $scope.product_name.toLowerCase();
            $scope.suggestions = await getResultsPage(query);
//                    $scope.suggestions = $scope.products.filter(function (product) {
//                        return product.name.toLowerCase().includes(query);
//                    });
        };

        // Function to select a product (e.g., add to cart)
        $scope.currentProduct = {};
        $scope.selectItem = {};
        $scope.userId=0;
        $scope.selectProduct = function (product,storeProduct) {
            console.log('Selected product:', product);
            //$scope.product_name = product.product.name;
            // Implement the logic to add the product to the cart or process further
             $scope.currentProduct = product;
             $scope.selectItem=storeProduct;
			 
			 // add product in cart
			 
			 event.preventDefault();
            if($scope.quantity>0 && $scope.userId>0){
                $http.post(ajxUrl + '/addtocart/', { 'slug': $scope.currentProduct.product.slug,"user_id":$scope.userId,"quantity":$scope.quantity,"sale_date":$scope.sale_date,"select_product":$scope.selectItem.id}, {
                headers: {
                    'X-CSRF-Token': csrf_token
                }}).then(function (response) {
                $scope.getCartItem();
				
				
				
				
            });
            }
			else{
				alert("Please add Customer Details");
			}
			 
			 //end
			 
			 
			 
             // Optional: Set the input to the selected product
            //$scope.suggestions = []; // Clear suggestions after selection
        };
        $scope.addProduct = function(event){
             event.preventDefault();
            if($scope.quantity>0 && $scope.userId>0){
                $http.post(ajxUrl + '/addtocart/', { 'slug': $scope.currentProduct.product.slug,"user_id":$scope.userId,"quantity":$scope.quantity,"sale_date":$scope.sale_date,"select_product":$scope.selectItem.id}, {
                headers: {
                    'X-CSRF-Token': csrf_token
                }}).then(function (response) {
                $scope.getCartItem();
            });
            }
			else{
				alert("Please add Customer Details");
			}
        };
        $scope.stepBill=1;
        $scope.printBillData = [];
        $scope.paymentDone = function(event){
             event.preventDefault();
            if($scope.quantity>0 && $scope.userId>0){
                $http.post(ajxUrl + '/freePayment/', { "user_id":$scope.userId,"extra_charge":$scope.extra_charge,"discount":$scope.discount,"payment_mode":$scope.payment_mode}, {
                headers: {
                    'X-CSRF-Token': csrf_token
                }}).then(function (response) {
                $scope.printBillData = response.data.data;
               // $scope.getCartItem();
               $scope.stepBill=2;
            });
            }
        };
        $scope.showError = false;
			$scope.showSeccess = false;
			
			$scope.cartitems = [];
			$scope.cartitemtax = [];
			
			$scope.delivary_charge="";
			
			$scope.coupon=[];
			$scope.coupon.coupon_id=0;
			$scope.coupon.data='';
			$scope.loaded = true;
			$scope.loadcartdata=false;
			$scope.loadcartdata1=true;
			$scope.userDetailUpdate=[];
			$scope.step=1;
            $scope.setAdd=false;
             $scope.paymentMethod=1;
        $scope.getCartItem = function(){
            if($scope.userId>0){
                $http.post(ajxUrl + '/getDataCart/', { "user_id":$scope.userId}, {
                headers: {
                    'X-CSRF-Token': csrf_token
                }}).then(function (response) {
               if(response.data.success===1){
					
					$scope.cartitems = response.data.data;
					
					$scope.delivary_charge=response.data.data[0].total_delivery_charge;
			
					$scope.cartitemtax = response.data.tax;
					
					$scope.coupon.coupon_id=response.data.coupon_id;
				
					if(response.data.coupon_id>0){
						$scope.coupon.data=response.data.coupon.coupon_code;
					}
					
					$scope.loadingStatus = false;
					$scope.loadcartdata=true;
					$scope.loadcartdata1=false;
				}else{
					$scope.loadcartdata=true;
					$scope.loadingStatus = false;
					$scope.loadcartdata1=false;
                                        $scope.cartitems = [];
			$scope.cartitemtax = [];
			
			$scope.delivary_charge="";
			
			$scope.coupon=[];
			$scope.coupon.coupon_id=0;
			$scope.coupon.data='';
			$scope.loaded = true;
			$scope.loadcartdata=false;
			$scope.loadcartdata1=true;
			$scope.userDetailUpdate=[];
			$scope.step=1;
            $scope.setAdd=false;
             $scope.paymentMethod=1;
				}
            });
            }
        };
        
        
        
		$scope.getCartItem();
        
        
        
        $scope.checkPhone = function(){
            if($scope.phone_no.length===10){
                  $http.post(ajxUrl + '/checkUser/', { 'phone_no': $scope.phone_no,"name":$scope.name,"address":$scope.address}, {
                headers: {
                    'X-CSRF-Token': csrf_token
                }}).then(function (response) {
                console.log("response.data");
                console.log(response.data);
               $scope.userId = response.data.data;
            });
            }
           
            //e.preventDefault();
        };
		
		  
        
        
         $scope.loadingStatus = false;
        function getResultsPage(serch) {

             $scope.loadingStatus = true;

            $http.post(ajxUrl + '/storeProduct/', { 'search': serch}, {
                headers: {
                    'X-CSRF-Token': csrf_token
                }}).then(function (response) {
                console.log(response.data);
				
				 if(response.data.data !='' ){    

                $scope.suggestions = response.data.data;
    			
                 }
                 
                 else
                 {
                     $scope.suggestions = [];
                 }
                 if(!serch)
                {
                    $scope.suggestions = [];
                }
                
               
                $scope.loadingStatus = false;
                console.log($scope.ListData);
                $scope.totalItems = response.data.total;
            });
        };
        
        $scope.deleteItem=function($event,position){
		$scope.loadingStatus = true;
        $event.preventDefault();

        var info_id = 0;
        var deletename = "";
		info_id = $scope.cartitems[position]['CartItems'].id;
		if($scope.cartitems[position]['CartItems'].combo_id>0){
			deletename = $scope.cartitems[position]['Items'].name;
		}else{
			deletename = $scope.cartitems[position]['Items'].name;
		}
		
        if (!window.confirm("Are you sure to delete " + deletename)) {
            $scope.loaded=true;
            $scope.loadingStatus = false;
            return false;
        }

        $http.post(ajxUrl + '/deletecartItem', {'info_id': info_id},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
            $scope.loadingStatus = false;
			$scope.cartitems.splice(position, 1);
            if(resp.data.success==1){
					$scope.loadingStatus = true;

					$scope.SussessMassage(resp.data.msg);			
					$scope.cartData();
					}else{
					$scope.ErrorMassage(resp.data.msg);
					}
        });
        
        $scope.loaded = true;
        
       // window.location.href=cartsurl;
			
		};
                
                $scope.ErrorMassage = function(msg){

			//reset
			$scope.showSuccess = false;
			
			$scope.doFade = false;

			$scope.showError = true;

			$scope.errorMsg = msg;
			$scope.successMsg = "";
			$timeout(function(){
			$scope.doFade = true;
			}, 4000);
			};
			
			$scope.SussessMassage = function(msg){

			//reset
			$scope.showError = false;
			$scope.doFade = false;

			$scope.showSuccess = true;

			$scope.successMsg = msg;
			$scope.errorMsg = "";
			$timeout(function(){
			$scope.doFade = true;
			}, 2500);
			};
    }]);