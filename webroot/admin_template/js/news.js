var app = angular.module('news', []);
app.controller('newsCrts', ['$scope', '$http', function ($scope, $http) {
	
	$scope.newsdata=[];
	$scope.details=true;
	console.log($scope.newsdata.is_link+'111111');
	$scope.ckecklink=function(){
		if($scope.newsdata.is_link=='1'){
			$scope.details=false;
			}else{
				$scope.details=true;
				}
		console.log($scope.newsdata.is_link);
		};
	
	
}]);
app.controller('newseditCrts', ['$scope', '$http', function ($scope, $http) {
	
	$scope.newsdata=[];
	console.log(details+'ghfhjgf');
	if(details=='1'){
	$scope.details=false;
	}else{
		$scope.details=true;
		console.log(details+'fg');
		}
	
	$scope.ckecklink=function(){
		if($scope.newsdata.is_link=='1'){
			$scope.details=false;
			}else{
				$scope.details=true;
				}
		//console.log($scope.newsdata.is_link);
		};
	
	
}]);