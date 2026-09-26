var myApp=angular.module("product",[]);
		
		
        
         myApp.controller('productDetail', ['$scope','$http','$timeout', function($scope,$http, $timeout) {
           			 
							$scope.loadingStatus = false;
				// 		    $scope.ans=0;
				// 			$scope.vote=0;
				// 			$scope.login=0;
							$scope.success=false;
							$scope.error=false;
							$scope.invalid=false;
							//$scope.add=false;
					$scope.my = { dum: false };
							$scope.inform=false;
							
							
			
			$scope.checkpin=function(){
			    
			    $http.get('https://api.postalpincode.in/pincode/'+$scope.pincode).then(function (resp) {
			    
			    
					if(resp.data[0].Status=='Success'){	
				$http.post(ajxUrl + '/checkpin1', {'vendor_pin':vendor_pin,'pincode':$scope.pincode},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
            		$scope.loadingStatus = false;
            if(resp.data.success==1){
					$scope.loadingStatus = true;
                    //$scope.add=true;  
					$scope.success=true;
					$scope.my.dum=true;
					$scope.inform=false;
					
					}else if(resp.data.error==0){
					$scope.error=true;
					//$scope.add=false;
					$scope.my.dum=false;
					$scope.inform=false;
					}
					else
					{
					    $scope.invalid=true;
					}
					$timeout(function(){
					 $scope.success=false;
                     $scope.inform=false;
					 $scope.error=false;
                    $scope.invalid=false;
					},2000);
				
        		});
					}
					else
					{
					    $scope.pincode = null;
					  alert("Please enter a valid pincode");
					}
			    });
				};
				
				$scope.like=function(review_id){
				    
				   $http.post(ajxUrl + '/like', {'product_id':product_id,'seller_id':seller_id,'review_id':review_id},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
				    
				    
				    if(resp.data.login==1)
				    {
				        $scope.login=review_id;
				    }
				    else
				    {
				        if(resp.data.success==1){
    					$scope.loadingStatus = true;
                        //$scope.add=true;  
    				    $scope.ans=review_id;
    					
    					}
    					else
    					{
    					   $scope.vote=review_id;
    					}
				    }
            	
        
					$timeout(function(){
					 
                     $scope.vote=false;
                     $scope.ans=false;
                     $scope.login=false;
                     
					},2000);
				
        		});
						
				
				};
				
				$scope.dislike=function(review_id){
				    
				   $http.post(ajxUrl + '/dislike', {'product_id':product_id,'seller_id':seller_id,'review_id':review_id},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
				    
				    
				    if(resp.data.login==1)
				    {
				        $scope.login=review_id;
				    }
				    else
				    {
				        if(resp.data.success==1){
    					$scope.loadingStatus = true;
                        //$scope.add=true;  
    				    $scope.ans=review_id;
    					
    					}
    					else
    					{
    					   $scope.vote=review_id;
    					}
				    }
            	
        
					$timeout(function(){
					 
                     $scope.vote=false;
                     $scope.ans=false;
                     $scope.login=false;
                     
					},2000);
				
        		});
						
				
				};
			$scope.loadAdd=false;	
			$scope.addtocart =function(slug){
			    $scope.loadAdd=true;
			    $scope.loadAdd=true;
			    $http.get(ajxUrl + '/addtocart/'+slug).then(function (resp) {
				    $scope.loadAdd=false;
				    window.location.href=cartsurl;
        		});
			}
				
			$scope.pincodecheck=function(){
						$scope.inform=true;

				};
		}]);	
        
angular.bootstrap(document.getElementById("app3"), ['product']);        
        