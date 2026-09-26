var myApp = angular.module("product", ['ui.bootstrap', 'ui.bootstrap.modal', 'ngProgress']);

myApp.directive('fileModel', ['$parse', function($parse) {
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
myApp.service('fileUpload', ['$http', function($http) {
 this.uploadFileToUrl = function(file, uploadUrl, id, type) {
  var fd = new FormData();
  fd.append('file', file);
  fd.append('product_id', id);
  fd.append('type', type);
  $http.post(uploadUrl, fd, {
    transformRequest: angular.identity,
    headers: {
     'Content-Type': undefined
    }
   })
   .success(function() {})
   .error(function() {});
 }
}]);

myApp.service('fileUploadNew', ['$http', function($http) {
 this.uploadFileToUrl = function(file, uploadUrl, id, type) {
  var fd = new FormData();
  fd.append('file', file);
  fd.append('product_id', id);
  fd.append('type', type);
  $http.post(uploadUrl, fd, {
    transformRequest: angular.identity,
    headers: {
     'Content-Type': undefined
    }
   })
   .success(function() {})
   .error(function() {});
 }
}]);
myApp.controller('productCrt', ['$scope', '$http', '$timeout', 'fileUpload', 'fileUploadNew', 'ngProgressFactory', function($scope, $http, $timeout, fileUpload, fileUploadNew, ngProgressFactory) {
 
$scope.categories = categories;

$scope.category_id = category_id;
$scope.sub_category_id = sub_category_id;
$scope.type_id = type_id;
 console.log($scope.categories);

 $scope.subcategories = [];
 $scope.type = [];

 $scope.categorieslist = function() {
 
  $scope.subcategories = $scope.categories[$scope.categories.findIndex(x => x.id == $scope.category_id)].sub_categories;

 };
 $scope.typelist = function() {
  
  $scope.type = $scope.subcategories[$scope.subcategories.findIndex(x => x.id == $scope.sub_category_id)].types;

 };

  if ($scope.category_id > 0) {
     
     //alert(category_id);

 // $scope.product = product;
  //console.log($scope.product);
  //$scope.filter_categories=filter_categories;
  $scope.sub_category_id=sub_category_id;
  $scope.type_=type_id;
  $scope.categorieslist();
  $scope.typelist();
 
 } 

}]);
