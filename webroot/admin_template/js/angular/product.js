var myApp=angular.module("product",['ui.bootstrap', 'ui.bootstrap.modal']);
		
		
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
            this.uploadFileToUrl = function(file, uploadUrl,id) {
               var fd = new FormData();
               fd.append('file', file);
            	fd.append('product_id', id);
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
         myApp.controller('productCrt', ['$scope','$http' ,'fileUpload', function($scope,$http, fileUpload) {
           	 $scope.showModal = false;
             $scope.isPause = false;
			 $scope.uploadProductImage=function(id){
				 $scope.productId=id;
				 $scope.showModal = true;;
				 $scope.getProductImage($scope.productId);
				 };
				  $scope.uploadFile = function() {
               
               var file = $scope.myFile;
               console.log('file is ' );
               console.dir(file);
               var uploadUrl = ajxUrl+ '/upload/';
               fileUpload.uploadFileToUrl(file, uploadUrl,$scope.productId);
			   $scope.getProductImage($scope.productId);
            };
			$scope.productImage=[];
			$scope.getProductImage=function(id){
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
					 $scope.uploadProductSpesalization=function(id){
						 $scope.productFilter=[];
						 $scope.productId=id;
						  $scope.showModalFilter=true;
						  $http.get(ajxUrl + '/filterList/'+$scope.productId).then(function (response) {

                $scope.productFilter = response.data.data;
                console.log($scope.productFilter);
                $scope.loadsectionData = true;
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
        