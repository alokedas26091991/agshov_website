var myApp = angular.module("zone", ['ui.bootstrap', 'ui.bootstrap.modal', 'ngProgress']);

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



myApp.controller('option_zone', ['$scope', '$http', '$timeout',  function($scope, $http, $timeout) {
 


 
 $scope.states = states;


 $scope.zones = [];
 
 $scope.zonelist = function() {
  //$scope.category_id = id;
  
  $scope.zones = $scope.states[$scope.states.findIndex(x => x.id == $scope.state_id)].zones;
  
 };
  
 

}]);