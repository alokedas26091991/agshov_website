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
$scope.category_id = category_id;
$scope.sub_category_id = sub_category_id;
$scope.type_id = type_id;

 $scope.subcategories = [];
 $scope.type = [];
 $scope.categorieslist = function() {
  //$scope.category_id = id;
  
  $scope.subcategories = $scope.categories[$scope.categories.findIndex(x => x.id == $scope.category_id)].sub_categories;
  
 };
  $scope.typelist = function() {
  
  $scope.type = $scope.subcategories[$scope.subcategories.findIndex(x => x.id == $scope.sub_category_id)].types;

 };

 if ($scope.category_id > 0) {
     
     //alert(category_id);

 // $scope.product = product;
  //console.log($scope.product);
  $scope.filter_categories=filter_categories;
  $scope.sub_category_id=sub_category_id;
  $scope.type_=type_id;
  $scope.categorieslist();
  $scope.typelist();
 
 }
 

}]);