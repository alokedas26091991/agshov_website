var gstApp = angular.module('gst', []);
gstApp.controller('gstApp', ["$scope", "$http",  '$location', '$timeout', '$window', '$document',  function ($scope, $http,  $location, $timeout, $window, $document,) {
        $scope.busy = false;
		$scope.step=1;
		$scope.responseData=[];
		$scope.error=false;
		 $scope.getToken = function (e) {
			 $scope.error=false;
			 e.preventDefault();
           $scope.busy = true;
            $scope.filter_course_data = true;
            //send the data and load the new course list
            $http.get(ajxUrl+'/gst/'+$scope.GSTINOfTaxPayerToSearch).then(function (resp) {
				
				if(!resp.data.error){
					$scope.responseData=resp.data.data;
					$scope.address=$scope.responseData.pradr.addr.bno+" "+$scope.responseData.pradr.addr.st
					+" "+$scope.responseData.pradr.addr.bnm+" "+$scope.responseData.pradr.addr.bno+" "+$scope.responseData.pradr.addr.flno
					+" "+$scope.responseData.pradr.addr.loc+" "+$scope.responseData.pradr.addr.dst+" "+$scope.responseData.pradr.addr.stcd
					+" "+$scope.responseData.pradr.addr.pncd;
                $timeout(function () {
					$scope.step=2;
                    $scope.loadingStatus = false;
                    $scope.busy = false;
                   $scope.error=true;

                }, 200);
				}else{
					 	$scope.loadingStatus = false;
                    	$scope.busy = false;
						$scope.error=true;
						$timeout(function () {
						$scope.error=false;
						}, 5000);
					}
            });
        };
		
 }]);