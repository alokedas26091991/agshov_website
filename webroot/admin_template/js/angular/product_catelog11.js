var myApp=angular.module("product",['ui.bootstrap', 'ui.bootstrap.modal','ngProgress']);
		
		
         myApp.directive('fileModel', ['$parse', function ($parse) {
            return {
               restrict: 'A',
               link: function(scope, element, attrs) {
                  var model = $parse(attrs.fileModel);
                  var modelSetter = model.assign;
                  
                  element.bind('change', function() {
                     scope.$apply(function() {
                        modelSetter(scope, element[0].files[0]);
                     });
                  });
               }
            };
         }]);
         myApp.service('fileUpload', ['$http', function ($http) {
            this.uploadFileToUrl = function(file, uploadUrl,id,type) {
               var fd = new FormData();
               fd.append('file', file);
            	fd.append('product_id', id);
				fd.append('type', type);
               $http.post(uploadUrl, fd, {
                  transformRequest: angular.identity,
                  headers: {'Content-Type': undefined}
               })
               .success(function() {
               })
               .error(function() {
               });
            }
         }]);
         myApp.controller('productCatelog', ['$scope','$http','$timeout' ,'fileUpload','ngProgressFactory', function($scope,$http,$timeout, fileUpload,ngProgressFactory) {
			 	$scope.show = false;
				$scope.liveProduct=true;
				
				$scope.progressbar = ngProgressFactory.createInstance();
				
				$scope.color = 'firebrick';
				$scope.height = '3px';
				
				$scope.contained_progressbar = ngProgressFactory.createInstance();
				$scope.contained_progressbar.setParent(document.getElementById('panel'));
				$scope.contained_progressbar.setAbsolute();
				
				$scope.progressbar.start();
				$timeout(function(){
				$scope.progressbar.complete();
				$scope.show = true;
				}, 2000);
			 
			 
			 
			 $scope.productId=productId;
			 $scope.step=1;
			
			 
           	 $scope.showModal = false;
             $scope.isPause = false;
			 $scope.searchData="";
			 $scope.listType=3;
			 $scope.ListData=[];
					 $scope.live=0;
					$scope.notlive=0;
					$scope.stock=0;
					$scope.outstock=0;
					
			 $scope.productList=function (){
				  
				 $scope.ListData=[];
					 $scope.live=0;
					$scope.notlive=0;
					$scope.stock=0;
					$scope.outstock=0;
					
				 $http.post(ajxUrl + '/productList/',{'listType':$scope.listType,'search':$scope.search}).then(function (response) {
					 console.log(response.data);
					 $scope.ListData=response.data.data;
					 $scope.live=response.data.live;
					$scope.notlive=response.data.notlive;
					$scope.stock=response.data.stock;
					$scope.outstock=response.data.outstock;
						$scope.loadingStatus = false;
						console.log($scope.ListData);
					});
				 };
				  $scope.productList();
				  $scope.callList=function(lt){
					  $scope.listType=lt;
					  $scope.productList();
					  };
					   $scope.ModalCharge=false;
					   $scope.currentProduct=[];
					    $scope.ListDataPrice=[];
					    $scope.currentProductseller_price=0;
					    $scope.currentProductoffer_price=0;
 $scope.showCharge=function(product,charge,ch){
     console.log(ch);
     $scope.currentProductseller_price=charge;
     $scope.currentProductoffer_price=ch;
	  $scope.ListDataPrice=[];
	 $scope.currentProduct=product;
	 $scope.ModalCharge=true;
	 $scope.loadingStatus = true;
	 $http.post(ajxUrl + '/productCharge/',{'type_id':$scope.currentProduct.type.id}).then(function (response) {
					 console.log(response.data);
					 $scope.ListDataPrice=response.data.data;
					
						$scope.loadingStatus = false;
						console.log($scope.ListDataPrice);
					});
	 
	 };
	 $scope.openchargeUpdateModal=function(productId){ 
	
	 $scope.ModalUpdateCharge=true;
	 $scope.updateproductId=productId;
			 $scope.skulist();
	 };
	 $scope.skulist = function() {

  $http.get(ajxUrl + '/skuListPrice/' + $scope.updateproductId).then(function(response) {

   $scope.skuListData = response.data.data;
  
   $scope.loadsectionData = true;
   $scope.loadingStatus = false;

  });
	 };
	 $scope.closeChargeM=function(){
		 $scope.ModalUpdateCharge=false;
		} ;
	$scope.closeCharge=function(){
		 $scope.ModalCharge=false;
		} ;
		$scope.updatePrice = function($event) {
 
  $scope.progressbar.start();
  var url = ajxUrl + '/updatePrice/' + $scope.updateproductId;
  $http.post(url, {
   'postData': $scope.skuListData,
   'id': $scope.productId
  }).then(function(response) {
   $scope.progressbar.complete();
   //$scope.productId=
   //console.log(response.data.data);
   //$scope.product = response.data.data;
   //$scope.productId = $scope.product.id;
	 $scope.displayMessage("Successfully update product price",true,false);
 	///$timeout(function(){window.location.href = ajxPageUrl + '/catelog';},5000);
   $scope.loadingStatus = false;
  });


 };	
 $scope.offineSuccessMessageDisplay=false;
		$scope.offineErrorMessageDisplay=false;
		$scope.offineMessage="";
	$scope.displayMessage=function(msg,succ,err){
		$scope.offineMessage=msg;
		$scope.offineSuccessMessageDisplay=succ;
		
		$scope.offineErrorMessageDisplay=err;
		$timeout(function(){
			$scope.offineSuccessMessageDisplay=false;
		$scope.offineErrorMessageDisplay=false;
		$scope.offineMessage="";},3000);
		
		
		};
 
 $scope.changeStatus=function(id){
	  $scope.progressbar.start();
	 if(confirm("Are you sure to update")){
		  var url = ajxUrl + '/updateShow/' + id;
  $http.post(url, {
   'postData': $scope.skuListData,
   'id': $scope.productId
  }).then(function(response) {
   $scope.progressbar.complete();
  $scope.productList();
	 $scope.displayMessage("Successfully update product",true,false);
 	///$timeout(function(){window.location.href = ajxPageUrl + '/catelog';},5000);
   $scope.loadingStatus = false;
  });
		 
		 }
	 
	 };
 
		}]);	
        