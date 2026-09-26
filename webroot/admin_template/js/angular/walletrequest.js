

var app = angular.module('wallet', ['ngAnimate','ui.bootstrap', 'ui.bootstrap.modal','ngMessages']);


 
app.controller('walletrequest', ['$scope', '$http', '$location','$timeout', function ($scope, $http, $location,$timeout) {
    
        $scope.wallet_request_commission=wallet_request_commission;
		$scope.changeAmount=function(){
		
		$scope.deduct_amount=($scope.request_amount*(wallet_request_commission/100));
		$scope.net_amount=($scope.request_amount-$scope.deduct_amount);
		
		};
			
			
    }]);
