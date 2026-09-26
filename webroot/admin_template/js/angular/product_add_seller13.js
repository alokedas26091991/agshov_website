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
		 myApp.directive('convertToNumber', function() {
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, ngModel) {
      ngModel.$parsers.push(function(val) {
        return val != null ? parseInt(val, 10) : null;
      });
      ngModel.$formatters.push(function(val) {
        return val != null ? '' + val : null;
      });
    }
  };
});
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
		 
		  myApp.service('fileUploadNew', ['$http', function ($http) {
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
         myApp.controller('productCrt', ['$scope','$http','$timeout' ,'fileUpload','fileUploadNew','ngProgressFactory', function($scope,$http,$timeout, fileUpload,fileUploadNew,ngProgressFactory) {
			 $scope.show = false;

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
			 updateclass(1);
			 
           	 $scope.showModal = false;
				$scope.isPause = false;
				$scope.categories=categories;
				console.log($scope.categories);
				
				$scope.subcategories=[];
				$scope.type=[];
				$scope.product={
					category_id:0,
					sub_category_id:0,
					type_id:0,
					brand_id:0
					};
				$scope.categorieslist=function(id){
				$scope.product.category_id=id;
				$scope.subcategories=$scope.categories[$scope.categories.findIndex(x => x.id==$scope.product.category_id)].sub_categories;
				
				};
				$scope.typelist=function(id){
				$scope.product.sub_category_id=id;
				$scope.type=$scope.subcategories[$scope.subcategories.findIndex(x => x.id==$scope.product.sub_category_id)].types;
				
				};
				$scope.selecttype=function(id){
					$scope.product.type_id=id;
					console.log($scope.product);
					};
			 $scope.uploadProductImage=function(id){
				
				 $scope.showModal = true;;
				 $scope.getProductImage();
				 };
				 
				 function updateclass(step){
					 $scope.step=step;
					 	
					 }
					$scope.changeStep= function(e,step){
						
						 $scope.saveProduct(e,step);
						 $scope.step=step;
						 updateclass(step);
						 
						};
						
						$scope.changeStepnew= function(e,step){
						$scope.step=step;
						
						 
						};
						
				$scope.productArribute=function(){
					
					$scope.uploadProductSpesalization();
					$scope.step=4;
					};
					$scope.startUpload=false;		
				  $scope.uploadFile = function(fileType) {
              $scope.startUpload=true;
               var file = $scope.myFile;
               console.log('file is ' );
               console.dir(file);
               var uploadUrl = ajxUrl+ '/upload/';
               fileUpload.uploadFileToUrl(file, uploadUrl,$scope.productId,fileType);
			   $timeout(function(){$scope.getProductImage()},200);
			   $timeout(function(){  $scope.startUpload=false;},500);
            };
			
			$scope.uploadFile1 = function(fileType,id) {
               
               var file = $scope.myFile1;
               console.log('file is ' );
               console.dir(file);
               var uploadUrl = ajxUrl+ '/uploadSku/';
               fileUploadNew.uploadFileToUrl(file, uploadUrl,id,1);
			   
            };
			
			$scope.productImage=[];
			$scope.getProductImage=function(){
						$scope.loadingStatus = true;
            $scope.loadsectionData = false;
            $http.get(ajxUrl + '/productimage/'+$scope.productId).then(function (response) {

                $scope.productImage = response.data.data;
                
                $scope.loadsectionData = true;
                $scope.loadingStatus = false;

            });
				 }; 
				 $scope.cancel=function(){
					 //$scope.productId=0;
				 $scope.showModal = false;;
					 };
					 $scope.showModalFilter=false;
					  $scope.productFilter=[];
					 $scope.uploadProductSpesalization=function(){
						 console.log($scope.productId);
						 
						 $scope.productFilter=[];
						 $scope.step=4;
						  $scope.showModalFilter=true;
						  $http.get(ajxUrl + '/filterList/'+$scope.productId).then(function (response) {

                $scope.productFilter = response.data.data;
                console.log($scope.productFilter);
                $scope.loadsectionData = true;
                $scope.loadingStatus = false;

            });
						 };
						 
						 
						 
						 
						 
						  $scope.productvarientFilter=[];
				$scope.filterOptionList=function(){
						 console.log($scope.productId);
						 
						 $scope.productvarientFilter=[];
						  $scope.showModalFilter=true;
						  $http.get(ajxUrl + '/filterList/'+$scope.productId).then(function (response) {

                $scope.productvarient = response.data.data;
                console.log($scope.productvarientFilter);
						angular.forEach($scope.productvarient, function(value){
						$scope.productvarientFilter.push(value.filter);
						
						});
                $scope.loadsectionData = true;
                $scope.loadingStatus = false;

            });
						 };
						 
						 
						 $scope.filteroption=[];
						 $scope.getfilteroption=function(){
							 $scope.filteroption=[];
							 console.log($scope.productvarientFilter);
							 angular.forEach($scope.productvarientFilter, function(value){
									if(value.id==$scope.newProduct.filter_id){
										$scope.filteroption=value.filter_options;
										console.log($scope.filteroption);
										
										}
						
						});
							 };		 
			$scope.saveProduct = function($event,st){
				
				if($scope.product.name==undefined || $scope.product.name==''){
					
					$event.preventDefault();
					return;
					}
					$scope.progressbar.start();
				if($scope.productId>0){
					
					var url=ajxUrl + '/updateProduct/'+$scope.productId;
					}else{
						var url=ajxUrl + '/saveData/';
						}
				$http.post(url,{'postData':$scope.product,'id':$scope.productId}).then(function (response) {
					$scope.progressbar.complete();
					//$scope.productId=
					console.log(response.data.data);
					$scope.product=response.data.data;
					$scope.productId=$scope.product.id;
					
					updateclass(st);
						$scope.loadingStatus = false;
					});
				};	
				
						 
				$scope.updatePrice=function($event,st){
					if($scope.product.name==undefined || $scope.product.name==''){
					
					$event.preventDefault();
					return;
					}
					$scope.progressbar.start();
				var url=ajxUrl + '/updatePrice/'+$scope.productId;
				$http.post(url,{'postData':$scope.product,'id':$scope.productId}).then(function (response) {
					$scope.progressbar.complete();
					//$scope.productId=
					console.log(response.data.data);
					$scope.product=response.data.data;
					$scope.productId=$scope.product.id;
					
					window.location.href=ajxPageUrl+'/catelog';
						$scope.loadingStatus = false;
					});
					
					
					};		 
						 
						 $scope.loadingStatus = false;
			$scope.filterDataSend=function(index,opindex){
				$scope.loadingStatus = true;
				for(var i=0;i<$scope.productFilter[index].filter.filter_options.length;i++){
					if(i==opindex){
						$scope.productFilter[index].filter.filter_options[i].checked=true;
						}else{
							$scope.productFilter[index].filter.filter_options[i].checked=false;
							}
					}
					var sendId=[];
				for(var i=0;i<$scope.productFilter.length;i++){
							for(var j=0;j<$scope.productFilter[i].filter.filter_options.length;j++){
								if($scope.productFilter[i].filter.filter_options[j].checked){
									sendId.push($scope.productFilter[i].filter.filter_options[j].id);
									
									}
								
							}
						
						}
					$http.post(ajxUrl + '/update/',{'postData':sendId,'id':$scope.productId}).then(function (response) {
						$scope.loadingStatus = false;
					});
				
				};
			 $scope.deletedcheck=function(index,opindex){
				 $scope.loadingStatus = true;
					for(var i=0;i<$scope.productFilter[index].filter.filter_options.length;i++){
						if(i==opindex){
							$scope.productFilter[index].filter.filter_options[i].checked=false;
						}
					}
					var sendId=[];
				for(var i=0;i<$scope.productFilter.length;i++){
							for(var j=0;j<$scope.productFilter[i].filter.filter_options.length;j++){
								if($scope.productFilter[i].filter.filter_options[j].checked){
									sendId.push($scope.productFilter[i].filter.filter_options[j].id);
									}
								
							}
						
						}
					$http.post(ajxUrl + '/update/',{'postData':sendId,'id':$scope.productId}).then(function (response) {
						$scope.loadingStatus = false;
					});
					};
					$scope.cancelFilter=function(){
						 $scope.showSKU = false;;
						};
						$scope.showSKU=false;
						$scope.newProduct={};
						$scope.multipleSKU=function(product){
							$scope.newProduct=angular.copy(product);;
							$scope.newProduct.supc='';
							$scope.newProduct.color='';
							$scope.newProduct.color_code='';
							$scope.skulist();
							$scope.showSKU=true;
							
							};
							$scope.skuListData=[];
							$scope.skulist=function(){
								
									$http.get(ajxUrl + '/skuList/'+$scope.productId).then(function (response) {
									
									$scope.skuListData = response.data.data;
									
									$scope.loadsectionData = true;
									$scope.loadingStatus = false;
									
									});
								
								};
								$scope.addSku=function($event){
									$event.preventDefault();
				$scope.progressbar.start();
				$scope.newProduct.product_id=$scope.productId;
				$scope.newProduct.name=$scope.newProduct.supc;
				var url=ajxUrl + '/addSku/';
				$http.post(url,{'postData':$scope.newProduct,'id':0}).then(function (response) {
					//$scope.progressbar.complete();
					//$scope.productId=
					$scope.uploadFile1(1,response.data.data.id);
					$timeout(function(){$scope.skulist();
					    	$scope.progressbar.complete();
					    
					},1000);
					//$scope.skulist();
					});
									
									};
									if($scope.productId>0){
										
										$scope.product=product;
										console.log($scope.product);
										}
							
		}]);	
        