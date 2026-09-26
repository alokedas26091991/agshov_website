
var app = angular.module('cart', ['ngSanitize', 'ui.bootstrap', 'ui.bootstrap.modal']);


app.filter('htmlToPlaintext', function ()
{
    return function (text)
    {
        return  text ? String(text).replace(/<[^>]+>/gm, '') : '';
    };
});
app.controller('cartCrt', ['$scope', '$http', '$timeout', '$log', '$sce', function ($scope, $http, $timeout) {

        $scope.showError = false;
        $scope.showSeccess = false;

        $scope.cartitems = [];
        $scope.cartitemtax = [];
		$scope.delivary_charge="";
        $scope.coupon = [];
        $scope.coupon.coupon_id = 0;
        $scope.coupon.data = '';

        $scope.loadcartdata = false;
        $scope.userDetailUpdate = [];
        $scope.step = 1;
        $scope.setAdd = false;
        $scope.paymentMethod = 2;
        $scope.cartData = function () {
            $scope.loadingStatus = true;
            $http.get(ajxUrl + '/getDataCart/').then(function (response) {
                if (response.data.success === 1) {
                    $scope.cartitems = response.data.data;
                    $scope.cartitemtax = response.data.tax;
					$scope.delivary_charge=response.data.data[0].total_delivery_charge;

                    $scope.coupon.coupon_id = response.data.coupon_id;

                    if (response.data.coupon_id > 0) {
                        $scope.coupon.data = response.data.coupon.coupon_code;
                    }

                    $scope.loadingStatus = false;
                    $scope.loadcartdata = true;
                } else {
                    $scope.loadcartdata = true;
                    $scope.loadingStatus = false;
                }

            });

        };
        $scope.cartData();
        $scope.sendPaymentOrder = function () {
            if (!$scope.setAdd) {
                $scope.ErrorMassage("Please select delivery before placed order.");
                return;
            }
            if ($scope.paymentMethod == 1) {
                location.href = ajxUrl + "/ccavenuePayment";
            } else {
                location.href = ajxUrl + "/freePayment";
            }
        };


        /* save section */
        $scope.getTotal = function () {
            var total = 0;
            var totaltax = 0;
            for (var i = 0; i < $scope.cartitems.length; i++) {
                if (i == 0) {
                    total = $scope.cartitems[i].cod_amt;
                }
                var product = $scope.cartitems[i];

                total += (parseFloat(product.CartItems.item_gross_amount) - parseFloat(product.CartItems.discount_amt)) + parseFloat(product.CartItems.delivery_charge);
            }

            return total+$scope.delivary_charge;
        };

        /*total Delivery Charge */

        $scope.getDelivery = function () {
            return $scope.delivary_charge;
        };

        //* total sub total */

        $scope.getSubtotal = function () {
            var total = 0;
            var totaltax = 0;
            for (var i = 0; i < $scope.cartitems.length; i++) {
                var product = $scope.cartitems[i];

                total += (product.CartItems.item_gross_amount);
            }

            return total;
        };
        //* total discount */

        $scope.getDiscount = function () {
            var total = 0;
            var totaltax = 0;
            for (var i = 0; i < $scope.cartitems.length; i++) {
                var product = $scope.cartitems[i];

                total += parseFloat(product.CartItems.discount_amt);
            }

            return total;
        };



        $scope.getTotalwithTax = function () {
            var total = 0;
            var totaltax = 0;
            for (var i = 0; i < $scope.cartitems.length; i++) {
                var product = $scope.cartitems[i];

                total += (product.CartItems.item_gross_amount - product.CartItems.discount_amt);
            }
            for (var i = 0; i < $scope.cartitemtax.length; i++) {
                var taxamt = $scope.cartitemtax[i];

                totaltax += (total * taxamt.tax_percentage) / 100;
            }
            total = totaltax + total;
            return total;
        };

        $scope.taxamount = function (percentage) {
            var amountfortax = ($scope.getTotal() * percentage) / 100;

            return amountfortax;

        };

        $scope.deleteItem = function ($event, position) {
            $scope.loadingStatus = true;
            $event.preventDefault();

            var info_id = 0;
            var deletename = "";
            info_id = $scope.cartitems[position]['CartItems'].id;
            if ($scope.cartitems[position]['CartItems'].combo_id > 0) {
                deletename = $scope.cartitems[position]['Items'].name;
            } else {
                deletename = $scope.cartitems[position]['Items'].name;
            }

            if (!window.confirm("Are you sure to delete " + deletename)) {
                $scope.loadingStatus = false;
                return;
            }

            $http.post(ajxUrl + '/deletecartItem', {'info_id': info_id}, {
                headers: {
                    'X-CSRF-Token': csrf_token
                }}).then(function (resp) {
                $scope.loadingStatus = false;
                $scope.cartitems.splice(position, 1);
                if (resp.data.success == 1) {
                    $scope.loadingStatus = true;

                    $scope.SussessMassage(resp.data.msg);
                    $scope.cartData();
                } else {
                    $scope.ErrorMassage(resp.data.msg);
                }
            });

        };
        $scope.updateQuentity = function ($event, position, type) {
            $event.preventDefault();
            var info_id = 0;
            var deletename = "";
            info_id = $scope.cartitems[position]['CartItems'].id;
            var quentity = $scope.cartitems[position]['CartItems'].quantity;
            var minimum_order = $scope.cartitems[position]['Products'].minimum_order;

            if (type == 1) {

                quentity = quentity - 1;
                if (quentity == 0) {
                    $scope.deleteItem($event, position);
                } else if (minimum_order > quentity)
                {
                    $scope.ErrorMassage("You will have to buy the minimum order.");
                } else {
                    updateQuantityData(quentity, info_id);

                }
            } else if (type == 2) {
                quentity = quentity + 1;
                updateQuantityData(quentity, info_id);
            }
        };
        $scope.delivary = [];
        $scope.getDelivaryData = function () {
            $http.post(ajxUrl + '/getDelivaryAdd', {}, {
                headers: {
                    'X-CSRF-Token': csrf_token
                }}).then(function (resp) {
                $scope.loadingStatus = false;
                if (resp.data.success == 1) {
                    $scope.loadingStatus = true;
                    $scope.delivary = resp.data.data;
                } else {

                }
            });

        };
        $scope.postData = {};
        $scope.editAddress = function (id, index) {
            $scope.step = 2;
            if (id > 0) {
                $scope.postData = $scope.delivary[index];
            } else {
                $scope.postData = {};
                $scope.postData.id = 0;
            }
        };
        $scope.addDelivaryAddress = function (e) {

           



            

                    $scope.loadingStatus = false;
                    e.preventDefault();
                    $http.post(ajxUrl + '/addDelivaryAddress', {'id': $scope.postData.id, 'postData': $scope.postData}, {
                        headers: {
                            'X-CSRF-Token': csrf_token
                        }}).then(function (resp) {
                        $scope.loadingStatus = false;
                        if (resp.data.success == 1) {
                            $scope.loadingStatus = true;

                            $scope.SussessMassage(resp.data.msg);
                            $scope.getDelivaryData();
                            $scope.step = 1;
							    // Manually hide the modal
							$('#add-new-modal').modal('hide');

							// Ensure the backdrop is removed properly
							$('.modal-backdrop').remove();
							$('body').removeClass('modal-open'); // Prevents scrolling issue
                        } else {
                            $scope.ErrorMassage(resp.data.msg);
                        }
                    });
                    console.log($scope.postData);

               
        


        };
        $scope.canceladd = function () {
                $scope.step = 1;
				$scope.postData = [];

				// Manually hide the modal
				$('#add-new-modal').modal('hide');

				// Ensure the backdrop is removed properly
				$('.modal-backdrop').remove();
				$('body').removeClass('modal-open'); // Prevents scrolling issue

        };
        $scope.setDelivaryadd = function (id, pin) {

          

                    $http.post(ajxUrl + '/setDelivaryadd', {'info_id': info_id = $scope.cartitems[0]['CartItems'].cart_id, 'delivery_id': id}, {
                        headers: {
                            'X-CSRF-Token': csrf_token
                        }}).then(function (resp) {
                        $scope.loadingStatus = false;
                        if (resp.data.success == 1) {
                            
                            
                            $scope.loadingStatus = true;
                            $scope.setAdd = true;
                            $scope.SussessMassage(resp.data.msg);
                            setDelivaryMode(2);
                            //$scope.cartData();
                        } else {
                            $scope.ErrorMassage(resp.data.msg);

                        }
                    });

                 


         

        };
        $scope.setaddress = function (id) {
            alert("Please Choose Delivery Address before Order Place")
        };
        $scope.getDelivaryData();
        $scope.setDelivaryMode = function (pm) {
            $http.post(ajxUrl + '/setDelivaryMode', {'info_id': info_id = $scope.cartitems[0]['CartItems'].cart_id, 'delivary_mode': pm}, {
                headers: {
                    'X-CSRF-Token': csrf_token
                }}).then(function (resp) {
                $scope.loadingStatus = false;
                if (resp.data.success == 1) {

                    $scope.loadingStatus = true;
                    // $scope.setAdd=true;
                    //$scope.SussessMassage(resp.data.msg);			
                    //$scope.cartData();
                } else {
                    //$scope.ErrorMassage(resp.data.msg);
                }
            });
        };
        function updateQuantityData(quentity, infoid) {
            $http.post(ajxUrl + '/updateItem', {'info_id': infoid, 'quantity': quentity}, {
                headers: {
                    'X-CSRF-Token': csrf_token
                }}).then(function (resp) {
                $scope.loadingStatus = false;
                if (resp.data.success == 1) {
                    $scope.loadingStatus = true;

                    $scope.SussessMassage(resp.data.msg);
                    $scope.cartData();
                } else {
                    $scope.ErrorMassage(resp.data.msg);
                }
            });

        }
        $scope.applyCoupon = function () {
            if ($scope.coupon.data == undefined || $scope.coupon.data == "")
                return false;

            $scope.applyCouponStatus = true;
            $http.post(ajxUrl + '/checkcouponcode', {'coupon_code': $scope.coupon.data}, {
                headers: {
                    'X-CSRF-Token': csrf_token
                }}).then(function (resp) {
                if (resp.data.success == 1) {
                    $scope.applyCouponStatus = false;

                    $scope.SussessMassage(resp.data.msg);
                    $scope.cartData();
                } else {
                    $scope.applyCouponStatus = false;
                    $scope.ErrorMassage(resp.data.msg);
                }

            });

        };
        $scope.deleteCupon = function () {
            if ($scope.coupon.coupon_id > 0) {

                $http.post(ajxUrl + '/deletecouponcode', {'coupon_id': $scope.coupon.coupon_id}, {
                    headers: {
                        'X-CSRF-Token': csrf_token
                    }}).then(function (resp) {
                    $scope.coupon.data = "";
                    $scope.coupon.coupon_id = 0;
                    $scope.loadingStatus = true;
                    if (resp.data.success == 1) {
                        $scope.loadingStatus = true;

                        $scope.SussessMassage(resp.data.msg);
                        $scope.cartData();
                    } else {
                        $scope.ErrorMassage(resp.data.msg);
                    }
                    $scope.cartData();
                });

            }

        };

        //for total discount
        $scope.getTotal1 = function () {
            var total1 = 0;
            for (var i = 0; i < $scope.cartitems.length; i++) {
                var product1 = $scope.cartitems[i];
                total1 += parseFloat(product1.CartItems.discount_amt);
            }
            return total1;
        }
        $scope.ErrorMassage = function (msg) {

            //reset
            $scope.showSuccess = false;

            $scope.doFade = false;

            $scope.showError = true;

            $scope.errorMsg = msg;
            $scope.successMsg = "";
            $timeout(function () {
                $scope.doFade = true;
            }, 4000);
        };

        $scope.SussessMassage = function (msg) {

            //reset
            $scope.showError = false;
            $scope.doFade = false;

            $scope.showSuccess = true;

            $scope.successMsg = msg;
            $scope.errorMsg = "";
            $timeout(function () {
                $scope.doFade = true;
            }, 2500);
        };


    }]);


