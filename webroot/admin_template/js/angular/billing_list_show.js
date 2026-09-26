// Define the AngularJS module
var app = angular.module('billing', []);

// Define the controller
app.controller('billingController', ['$scope','$http', function ($scope,$http) {
        // Sample list of products
        $scope.products = [

        ];

        
		
    $scope.printDiv = function(divId) {
        var printContents = document.getElementById(divId).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
		document.getElementById('clickme').style.display='none';
        window.print();
        document.body.innerHTML = originalContents;

        // Optionally, you can reload the page to ensure everything goes back to normal
        location.reload();
    };
		


        
        $scope.stepBill=1;
        $scope.invoiceData = [];
        $scope.getInvoiceData = function(event){
            
			 
			 
            
                $http.post(ajxUrl + '/getInvoiceData/', { }, {
                headers: {
                    'X-CSRF-Token': csrf_token
                }}).then(function (response) {
                $scope.invoiceData = response.data.data;
               
               
          
            });
        };
		
		$scope.printBill=function($id){
		

    
		
		
       

        $http.post(ajxUrl + '/getBill', {'id': $id},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
            
            if(resp.data.success==true){
				
				
					
					 $scope.stepBill=2;
					 $scope.printBillData = resp.data.data;

					
					}else{
					
					}
        });
        

			
		};
        
			
			
        
        
        
        
		$scope.getInvoiceData();
        
        
        
       
		
		  
        
        
                
    }]);