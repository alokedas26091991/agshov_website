var app = angular.module('preferenceLocation', []);
app.controller('preferenceLocationCrlt', ['$scope', '$http', function ($scope, $http) {
	
	$scope.ChangeCountry=function(){
		$scope.countries=[];
		$scope.states=[];
		$scope.cities=[];
		$scope.preferenc=[];
		$scope.preferenc.country_id=country_id;
		$scope.preferenc.state_id=state_id;
		$scope.preferenc.city_id=city_id;
		$http.get('/my_app/api/Countries/myCountries.json').then(function (response) {
                $scope.countries = response.data.cities;
				$scope.preferenc.country_id=country_id;
				$scope.changeState();
               
            });
	};
	//$scope.ChangeCountry();
	$scope.changeState=function(){
		var postData = {
					'country_id': $scope.preferenc.country_id,
					
				};
		$http.post('/my_app/api/States/stateList.json',postData).then(function (response) {
                $scope.states = response.data.states;
				
               $scope.changeCity();
            });
		
	};
	$scope.changeCity=function(){
		var postData = {
					'state_id': $scope.preferenc.state_id,
					
				};
		$http.post('/my_app/api/Cities/myCities.json',postData).then(function (response) {
                $scope.cities = response.data.cities;
               
            });
		
	};
	
}]);