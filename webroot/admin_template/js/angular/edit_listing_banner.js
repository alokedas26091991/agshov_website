var myApp = angular.module("product", ['ui.bootstrap', 'ui.bootstrap.modal', 'ngProgress']);

myApp.directive('convertToNumber', function() {
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, ngModel) {
      ngModel.$parsers.push(function(val) {
        return parseInt(val, 10);
      });
      ngModel.$formatters.push(function(val) {
        return '' + val;
      });
    }
  };
});



myApp.controller('productCrt', ['$scope', '$http', '$timeout',  function($scope, $http, $timeout) {
 


 
 $scope.categories = categories;
 
 console.log($scope.categories);
$scope.category_id = category_id;
$scope.sub_category_id = sub_category_id;

$scope.product_id = product_id;



 $scope.subcategories = [];
 $scope.type = [];
 $scope.product = [];
 $scope.categorieslist = function() {
  //$scope.category_id = id;
  
  $scope.subcategories = $scope.categories[$scope.categories.findIndex(x => x.id == $scope.category_id)].sub_categories;
  
  
 };
  $scope.typelist = function() {
  
  $scope.type = $scope.subcategories[$scope.subcategories.findIndex(x => x.id == $scope.sub_category_id)].types;


 };
 $scope.brandlist = function() {
  
  $scope.brand = $scope.type[$scope.type.findIndex(x => x.id == $scope.type_id)].brands;

 };
 $scope.productlist = function() {
  
  $scope.product = $scope.subcategories[$scope.subcategories.findIndex(x => x.id == $scope.sub_category_id)].products;

 };


 
  $scope.sub_category_id=sub_category_id;

  $scope.product_id=product_id;
 
  $scope.categorieslist();

  $scope.productlist();

 

 

}]);