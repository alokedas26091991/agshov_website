var app = angular.module('bookingApp', []);

app.controller('BookingController', function($scope, $http,$window) {
   

	$scope.booking_id='';
	$scope.order_id='';
    $scope.booking_no='';
    $scope.package1='';
    $scope.booking_type=0;
    $scope.appointment_type=0;

//   document.getElementById('rzp-button2').onclick = function(e){
//   checkout();
//     e.preventDefault();
// }

function checkout(id){
    //alert(id)
    $.ajax({
    url: cartUrl,
    type: "POST",
    data: {
        
        order_id:$scope.order_id,
    },
    headers: {
                        'X-CSRF-Token': csrf_token
                    },
    success: function(data, textStatus, jqXHR) {
         var options =(data);
         console.log(options.key);
         console.log(options);
options.handler = function (response){
   
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.getElementById('razorpay_order_id').value = response.razorpay_order_id;
    document.razorpayform.submit();
};
//options.theme.image_padding = false;

var rzp = new Razorpay(options);
     rzp.open();
    },
    error: function(jqXHR, textStatus, errorThrown) {
        alert('Error occurred!');
    }

});

}  
	

    $scope.customerType = function (id) {
        

        $http.post(ajxUrl + '/customertype', {'customer_type_id': id}, {
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
           
            if (resp.data.success == 1) {
				
				//alert(resp.dada.data);

               $scope.pack=resp.dada.data;
                
            } 
        });

    };
	
	    $scope.getCustomerDetails = function (id) {
			
			
        

        $http.post(ajxUrl + '/customerdetails', {'booking_type': $scope.booking_type,'package_id':id}, {
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
           
            if (resp.data.success == 1) {
				
				if(resp.data.customer_count==true)
                {
                    //alert(resp.data.customer_count);
                    $scope.booking_type=1;
                    $scope.package_amount=resp.data.package.old_customer_price;
                }
                else
                {
                    $scope.booking_type=0;
                    $scope.package_amount=resp.data.package.new_customer_price;
                    
                }

               $scope.customer=resp.data.data;
			   
			   
			   $scope.patient_name=$scope.customer.patient_name;
			   $scope.patient_email=$scope.customer.patient_email;
			   $scope.patient_mobile=$scope.customer.patient_mobile;
			   $scope.age=$scope.customer.age;
			   $scope.sex=$scope.customer.sex;
			   $scope.category_id=$scope.customer.category_id;
			   $scope.subcategory_id=$scope.customer.subcategory_id;
			   
			   $scope.booking_id=$scope.customer.id;
               $scope.booking_no=$scope.customer.no_of_bookings;
               $scope.package1=resp.data.package.number_of_service;
			   
			   
			   
			
			   
			   
			   
			   //alert(resp.data.package);
			   
			   
			   
			  $scope.fetchSubcategories($scope.customer.category_id);
			   
                
            } 
            else
            {
                $scope.booking_type=0;
                $scope.package_amount=resp.data.package.new_customer_price;
            }
        });

    };

    // Save user's selected response
    $scope.dataSave = function() {

        // if($scope.package_id==null)
        // {
        //     alert("Please Select Package");
        //     return;
        // }
        if($scope.patient_mobile==null)
        {
            alert("Please Select Mobile No");
            return;
        }
        if($scope.age==null)
        {
            alert("Please Select Age");
            return;
        }
        if($scope.sex==null)
        {
            alert("Please Select Sex");
            return;
        }
        // if($scope.category_id==null)
        // {
        //     alert("Please Select Category");
        //     return;
        // }
       

        
        $http.post(ajxUrl +'/bookingsave', {
            booking_type: $scope.booking_type,
            patient_name: $scope.patient_name,
            patient_email: $scope.patient_email,
            patient_mobile:$scope.patient_mobile,
            age:$scope.age,
            sex:$scope.sex,
            category_id:$scope.category_id,
            subcategory_id:$scope.subcategory_id,
            package_id:$scope.package_id,
            expected_appointment_date:$scope.expected_appointment_date,
            expected_appointment_time:$scope.expected_appointment_time,
            appointment_type:$scope.appointment_type,
            appointment_details:$scope.appointment_details,
            booking_id:$scope.booking_id,
            package1:$scope.package1,
            booking_no:$scope.booking_no,
            package_amount:$scope.package_amount

        
        
        
        }, {headers: {
                'X-CSRF-Token': csrf_token
            }
			}).then(function(response) {
            if (response.data.success) {
                //alert("Your Booking is Successfull");
                //$window.location.href='/pages/successful';
                //alert(response.data.booking_id)
                $scope.order_id=response.data.booking_id;
                checkout(response.data.booking_id)

            } else {
                console.log('Error saving response');
            }
        });
    };


    $scope.getPackage = function() {
        $http.get(ajxUrl +'/getpackage')
            .then(function(response) {
                $scope.packages = response.data.data;
              
            }, function(error) {
                console.error('Error fetching categories:', error);
            });
    };
  // Fetch categories on page load
  $scope.getCategories = function() {
    $http.get(ajxUrl +'/getcategories')
        .then(function(response) {
            $scope.categories = response.data.data;
          
        }, function(error) {
            console.error('Error fetching categories:', error);
        });
};

// Fetch subcategories based on selected category
$scope.fetchSubcategories = function(categoryId) {
    if (categoryId) {
        $http.get(ajxUrl +'/getsubcategories/' + categoryId)
            .then(function(response) {
                $scope.subcategories = response.data.data;
            }, function(error) {
                console.error('Error fetching subcategories:', error);
            });
    } else {
        $scope.subcategories = []; // Clear subcategories if no category selected
    }
};

// Initialize by fetching categories
$scope.getCategories();
$scope.getPackage();
    
});

