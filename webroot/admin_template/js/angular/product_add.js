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
         myApp.controller('productCrt', ['$scope','$http','$timeout' ,'fileUpload','ngProgressFactory', function($scope,$http,$timeout, fileUpload,ngProgressFactory) {
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
			 $scope.uploadProductImage=function(id){
				
				 $scope.showModal = true;;
				 $scope.getProductImage();
				 };
				 
				 function updateclass(step){
					 $scope.step=step;
					 	for(var i=1; i<5;i++){
							var cls='stepclass'+i;
							var clsp='stepspan'+i;
							$scope[clsp]="step";
							if(step==i){
									$scope[cls]='current';
									$scope[clsp]="current-info audible";
								}else if(i<step){
									$scope[cls]='done';
									}else{
										if($scope.productId==0){
											$scope[cls]='disabled';
										}else{
											$scope[cls]='done';
											}
										
										}
							}
					 }
					$scope.changeStep= function(step){
						$scope.step=step;
						 updateclass(step);
						};
				  $scope.uploadFile = function(fileType) {
               console.log($scope.productId);
               var file = $scope.myFile;
               console.log('file is ' );
               console.dir(file);
               var uploadUrl = ajxUrl+ '/upload/';
               fileUpload.uploadFileToUrl(file, uploadUrl,$scope.productId,fileType);
			   $scope.getProductImage();
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
					 $scope.productId=0;
				 $scope.showModal = false;;
					 };
					 $scope.showModalFilter=false;
					  $scope.productFilter=[];
					 $scope.uploadProductSpesalization=function(){
						 $scope.productFilter=[];
						 
						  $scope.showModalFilter=true;
						  $http.get(ajxUrl + '/filterList/'+$scope.productId).then(function (response) {

                $scope.productFilter = response.data.data;
                console.log($scope.productFilter);
                $scope.loadsectionData = true;
                $scope.loadingStatus = false;

            });
						 };
						 
						 
			$scope.saveProduct = function($event,st){
				$event.preventDefault();
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
					if(st==4){
					    window.location.href=ajxUrl;
					    
					}
					updateclass(2);
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
						 $scope.showModalFilter = false;;
						};
		}]);	
        