var myApp=angular.module("pro11",['ui.bootstrap', 'ui.bootstrap.modal']);
		
		

         myApp.controller('proCtrl11', ['$scope','$http','$timeout','$window', function($scope,$http,$timeout,$window ) {
            
			$scope.productSearch=[];
		    	$scope.step=false;
			    $scope.logstep=1;
			    $scope.mob=true;
			   $scope.submitLogin=false;
			   $scope.submitreg=false;
			   $scope.submitOtp=false;
			    $scope.submitReg =false;
			    
			    $scope.loadinglogin =false;
			    $scope.submitLogin1 = function ($event)
                {
                  
            var header = {
                headers: {
                    'X-CSRF-Token': csrf_token
                }
            };
            //$event.preventDefault();
            $scope.loadinglogin =true;
            
           
            var logintData ={
                'email': $scope.email,
                'password': $scope.password
            };

            $http.post(ajxUrllogin + '/login', logintData,header,{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (data, status, header, config) {
                $scope.loadinglogin =false;

                if (data.data.status == 1) {
                   
                    $scope.msg = data.data.message;
                    $scope.showDisplayError( $scope.msg);
                    $window.location.href = data.data.redirect;


                } else {
                    $scope.msg = " Email and password do not match. Please try again.";
                   
                     $scope.showDisplayError($scope.msg);


                }

            });


        };
      
			    
			    
			   $scope.registration=function($event){
			       $event.preventDefault();
			        
			     $scope.submitReg =true;
			     
			    $http.post(ajxUrllogin + '/registrationwithotp/', {'email':$scope.emailReg,"mobile":$scope.mobileReg,"password":$scope.passwordReg,"first_name":$scope.nameReg},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
                    
                  
                    
                 if(resp.data.success){    

               $scope.logstep=5;
                
    		    console.log(resp.data.otp)
    			
                 }
                 
                 else
                 {
                     $scope.showDisplayError("Email id or Mobile No is already exists.Please Login!"); 
                 }
                 $scope.submitReg =false;
                 
                

            });
           $event.stopPropagation();
			     
			 }; 
			 $scope.sendOtp=function(){
			     
			     if($scope.email)
			     {
			         
			     
			     $scope.submitLogin =true;
			    $http.post(ajxUrllogin + '/sendotplogin/', {'email':$scope.email},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
                    
                  
                    
                 if(resp.data.success){    

               $scope.logstep=3;
                
    		    console.log(resp.data.otp)
    			
                 }
                 
                 else
                 {
                    $scope.showDisplayError("You do not have account with us.Please create a registration first");
                    $scope.submitLogin =false;
                 }
                 $scope.submitLogin =false;
			    
                 
                

            });
			 }
			 else
			 {
			     $scope.showDisplayError("Please Enter valid Mobile No First");
			 }
			     
			 }; 
			 
			 //forget password
			 $scope.forgetsendOtp=function(){
			 
			    $http.post(ajxUrllogin + '/forgetsendotplogin/', {'email':$scope.email},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
                    
                  
                    
                 if(resp.data.success){    

               $scope.logstep=4;
                
    		    console.log(resp.data.otp)
    			
                 }
                 
                 else
                 {
                    $scope.showDisplayError("Please Enter Mobile Number or Email ID");
                 }
              
                 
                

            });
			     
			 }; 
			 
			 
			 			 //change mobile
			 
			  $scope.changemobileverifyotp=function(){
			    $http.post(ajxUrllogin + '/changemobileverifyotp/', {'email':$scope.email,"otp":$scope.otp,"mobile":$scope.mobile},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
                    
                  
                    
                 if(resp.data.success){    

               window.location.reload();
                
    		    console.log(resp.data.otp)
    			
                 }
                 
                 else
                 {
                    $scope.showDisplayError("Please Enter Valid OTP"); 
                 }
                 
                

            });
			     
			 };
			 
			 
			 $scope.changemobilesendOtp=function(){
			     
			   
			 
			    $http.post(ajxUrllogin + '/changemobilesendotplogin/', {'mobile':$scope.mobile},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
                    
                  
                    
                 if(resp.data.success){ 
                     
               $scope.mob=false;

               $scope.logstep=7;
                
    		    console.log(resp.data.otp)
    			
                 }
                 
                 else
                 {
                    $scope.showDisplayError("This Mobile No is already exist");
                 }
              
                 
                

            });
			     
			 }; 
			 
			 //change mobile
			 
			 $scope.forgetverifyotp=function(){
			    $http.post(ajxUrllogin + '/forgetverifyotp/', {'email':$scope.email,"otp":$scope.otp,"password":$scope.password},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
                    
                  
                    
                 if(resp.data.success){    

               window.location.reload();
                
    		    console.log(resp.data.otp)
    			
                 }
                 
                 else
                 {
                    $scope.showDisplayError("Please Enter Valid OTP"); 
                 }
                 
                

            });
			     
			 };
			 
			 
			 
			 //endforget password
			 
			 $scope.sendOtpreg=function(){
			     $scope.submitreg =true;
			     
			     //alert("asdasd");
			    $http.post(ajxUrllogin + '/sendotpregb/', {'email':$scope.emailReg},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
                    
                  
                    
                 if(resp.data.success){    

               $scope.logstep=5;
                
    		    $scope.showDisplayError("OTP Sent"); 
    			
                 }
                 
                 else
                 {
                     $scope.showDisplayError("OTP Not Generated"); 
                  
                 }
                 $scope.submitreg =false;
                 
                

            });
			     
			 }; 
			  $scope.showmsg=false;
			     $scope.msg="";
			 $scope.showDisplayError=function(msg){
			     $scope.showmsg=true;
			     $scope.msg=msg;
			     $timeout(function(){ $scope.showmsg=false;
			     $scope.msg="";},4000);
			 }
			  $scope.verifyotp=function(){
			    $http.post(ajxUrllogin + '/verifyotp/', {'email':$scope.email,"otp":$scope.otp},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
                    
                  
                    
                 if(resp.data.success){    

               window.location.reload();
                
    		    console.log(resp.data.otp)
    			
                 }
                 
                 else
                 {
                    $scope.showDisplayError("Please Enter Valid OTP"); 
                 }
                 
                

            });
			     
			 };
			 $scope.varificationCodeSubmit=false;
			 $scope.verifyotpregistration=function(){
			     
			      $scope.varificationCodeSubmit=true;
			    $http.post(ajxUrllogin + '/mobileOtpVarification/', {'mobile':$scope.mobileReg,"verification_code":$scope.verification_code},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
                    
                   $scope.varificationCodeSubmit=false;
                    
                 if(resp.data.success){    

               window.location.reload();
                
    		    console.log(resp.data.otp)
    			
                 }
                 
                 else
                 {
                    $scope.showDisplayError("Please Enter Valid OTP"); 
                 }
                 
                

            });
			     
			 };  
			 
			 $scope.login=function(){
			    $http.post(ajxUrllogin + '/index/', {'email':$scope.email,"password":$scope.password},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
                    
                  
                    
                 if(resp.data.success){    

               window.location.reload();
                
    		    console.log(resp.data.otp)
    			
                 }
                 
                 else
                 {
                    $scope.showDisplayError("Please Enter Valid User name and Password"); 
                 }
                 
                

            });
			     
			 };
			 
			 $scope.signupFunction=function(st){
			     $scope.logstep=st;
			 };
			$scope.getSearch=function(id){
            $scope.productId=id;
            
           // alert(seller_id)
            
            
           
                $http.post(ajxUrl + '/searchauto/'+$scope.productId, {'productId':$scope.productId,'seller_id':seller_id},{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
                    
                  
                    
                 if(resp.data.data !='' ){    

                $scope.step=true;
                
    			$scope.productSearch = resp.data.data;
    			
                 }
                 
                 else
                 {
                     $scope.step=false;
                 }
                 if(!$scope.productId)
                {
                    $scope.step=false;
                }
                
                
                
           
                

            });
				 }; 


						 


		}]);
		
	
        