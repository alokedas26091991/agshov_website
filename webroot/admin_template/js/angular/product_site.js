/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


var courseApp = angular.module('product', ['ngAnimate', 'infinite-scroll', 'rzModule']);
courseApp.run(['$anchorScroll', function ($anchorScroll) {
        $anchorScroll.yOffset = 75; // always scroll by 50 extra pixels
    }]);

courseApp.directive('ripple', function () {
    return function (scope, element, attrs) {
        if (scope.$last) {
            //alert('hi');
            return $.material.init();
        }
    };
});
courseApp.service('anchorSmoothScroll', function () {
	    this.scrollTo = function (eID) {
        // This scrolling function 
        // is from http://www.itnewb.com/tutorial/Creating-the-Smooth-Scroll-Effect-with-JavaScript
        var startY = currentYPosition();
        var stopY = elmYPosition(eID);
        var distance = stopY > startY ? stopY - startY : startY - stopY;
        // alert(startY +'s'+stopY);
        stopY = 0;
        if (distance < 100) {
            scrollTo(0, stopY);
            return;
        }
        var speed = Math.round(distance / 100);
        if (speed >= 20)
            speed = 20;
        var step = Math.round(distance / 25);
        var leapY = stopY > startY ? startY + step : startY - step;
        var timer = 0;
        if (stopY > startY) {
            for (var i = startY; i < stopY; i += step) {
                if (timer > 0) {
                    setTimeout("window.scrollTo(0, " + leapY + ")", (timer * speed) * 2.5);
                } else {
                    setTimeout("window.scrollTo(0, " + leapY + ")", (timer * speed));
                }
                leapY += step;
                if (leapY > stopY)
                    leapY = stopY;
                timer++;
            }
            return;
        }
        for (var i = startY; i > stopY; i -= step) {
            if (timer > 0) {
                setTimeout("window.scrollTo(0, " + leapY + ")", (timer * speed) * 2.5);
            } else {
                setTimeout("window.scrollTo(0, " + leapY + ")", (timer * speed));
            }
            leapY -= step;
            if (leapY < stopY)
                leapY = stopY;
            timer++;
        }

        function currentYPosition() {
            // Firefox, Chrome, Opera, Safari
            if (self.pageYOffset)
                return self.pageYOffset;
            // Internet Explorer 6 - standards mode
            if (document.documentElement && document.documentElement.scrollTop)
                return document.documentElement.scrollTop;
            // Internet Explorer 6, 7 and 8
            if (document.body.scrollTop)
                return document.body.scrollTop;
            return 0;
        }

        function elmYPosition(eID) {
            var elm = document.getElementById(eID);
            var y = elm.offsetTop;
            var node = elm;
            while (node.offsetParent && node.offsetParent != document.body) {
                node = node.offsetParent;
                y += node.offsetTop;
            }
            return y;
        }
    };

});
courseApp.controller('productController', ["$scope", "$http", '$anchorScroll', '$location', '$timeout', '$window', '$document', 'anchorSmoothScroll', function ($scope, $http, $anchorScroll, $location, $timeout, $window, $document, anchorSmoothScroll) {
        $scope.busy = false;
        $scope.page = 1;
        $scope.lastpage = 1;
        $scope.price_min = 0;
        $scope.price_max = 50000;
		$scope.show=1;
	    $scope.slider = {
            min: $scope.price_min,
            max: $scope.price_max,
            minValue: 0,
            maxValue: 50000,
            options: {
                id: 'price_slider',
                floor: 0,
                step: 100,
                minRange: 0,
                noSwitching: true,
                ceil: 50000,
                selectionBarGradient: {
                    from: 'white',
                    to: '#FC0'
                },
                onEnd: function (id, modelValue, highValue, pointerType) {

                    if (pointerType == 'min') {
                        v = modelValue;
                    } else {
                        v = highValue;
                    }
                    objkey = 'offer_price_' + pointerType;
				    newArr = $scope.PriceArray;
                    for (var i = 0; i < newArr.length; i++) {
                        if (newArr[i]['key'] == objkey) {
                            newArr.splice(i, 1);
                        }
                    }
                    $scope.PriceArray = newArr;
                    $scope.PriceArray.push({
                        'key': 'offer_price_' + pointerType,
                        'val': v
                    });
                    $scope.loadProductData();
                },
                translate: function (value) {
                return '<i class="fa fa-inr"></i>' + value;
                }
            }
        };
       
        $scope.filterData = function () {
            $timeout(function () {
                $timeout(function () {
                $scope.$broadcast('rzSliderForceRender');
            });
            });
        };
        $scope.gotoElement = function (eID) {
            // set the location.hash to the id of
            // the element you wish to scroll to.
            // $timeout($location.hash('bottom'));
            $location.hash('bottom');
            $location.hash('');
            //$timeout(anchorSmoothScroll.scrollTo(eID),);
            anchorSmoothScroll.scrollTo(eID);
            // call $anchorScroll()
        };



        $scope.gotoAnchor = function (x) {
            var newHash = x;
            if ($location.hash() !== newHash) {
                // set the $location.hash to `newHash` and'anchor' +
                // $anchorScroll will automatically scroll to it
                $location.hash(x);
            } else {
                // call $anchorScroll() explicitly,
                // since $location.hash hasn't changed

                $anchorScroll();
            }
        };
        $scope.checkBoxes = [];
        $scope.filterArray = [];
        $scope.headingName = headingName;
        $scope.loadingStatus = true;
		$scope.sub_category_id=sub_category_id;
		$scope.category_id=category_id;
		$scope.type_id=type_id;
		$scope.brand_id=brand_id;
		$scope.searchdata=searchval;
		$scope.filterData=[];
	    $scope.headingName = "Filter Course List";
        $scope.changeProductFilter = function (type, v, index, optionIndex) {
		    $scope.headingName = "Filter Course List";
            switch (parseInt((type))) {
                case 1:
                   $scope.sub_category_id=v;
                    break;
                case 2:
                    $scope.type_id=v;
                     break;
                case 3:
                    objkey = 'filter';
                    status = $scope.filter[v];
					if (status == 'true') {
						$scope.filterData.push(v);
						}else{
						newArr = $scope.filterData;
                for (var i = 0; i < newArr.length; i++) {
                    if (newArr[i] == v) {
                        newArr.splice(i, 1);
                    }
                }
                $scope.filterData = newArr;
					}
                    break;
            }
		
		$scope.loadProductData();
        } ;
		$scope.PriceArray=[];
        $scope.PriceArray.push({
            'key': 'offer_price_min',
            'val': $scope.price_min
        });
        $scope.PriceArray.push({
            'key': 'offer_price_max',
            'val': $scope.price_max
        });
        $scope.sort = 'rank';
        $scope.direction = 'asc';
        $scope.priceFilter = function (val) {
            $scope.sort = 'offer_price';
            $scope.direction = val;
            $scope.loadProductData();
        };
        $scope.filter_product_data = false;
        $scope.product = [];
        $scope.loadd=false;
        $scope.loadProductData = function () {
            $scope.lastpage = 0;
            $scope.page = 0;
			$scope.loadingStatus = true;
            $scope.product = [];
            $scope.busy = true;
            $scope.filter_product_data = true;
			var postData;
			postData={'category_id':$scope.category_id,'sub_category_id':$scope.sub_category_id,'type_id':$scope.type_id,'brand_id':$scope.brand_id,'product_specialization':$scope.filterData,'priceData':$scope.PriceArray,'search':$scope.searchdata};
            //send the data and load the new course list
            $http.post(ajxUrl + '/getData?page=1&sort=' + $scope.sort + '&direction=' +$scope.direction, postData,{
            headers: {
                'X-CSRF-Token': csrf_token
            }}
            ).then(function (resp) {
                    //alert(resp.data.data);
                    $scope.product = resp.data.data;
                    if($scope.product.length>0)
                    {
                    $scope.show=1;
                    }
                    else
                    {
                    $scope.show=0;
                    }
                    $scope.page = resp.data.nextpage;
                    $scope.lastpage = resp.data.lastpage;
                    $scope.filter_product_data = false;
                    $scope.busy = false;
                    $scope.loadingStatus = false;
                    $timeout(function(){$scope.loadd=true;},10000);
            });
        };
	
		$scope.loadProductData();
        $scope.nextPage = function () {
            console.log($scope.page);
            if ($scope.busy) {
                console.log("1st");
                return true;
            }
        console.log("3st");
            if ($scope.page > $scope.lastpage) {
                $scope.busy = false;
                $scope.loadingStatus = false;
                return true;
            }
			console.log("4st");
            $scope.busy = true;
			var postData;
			postData={'category_id':$scope.category_id,'sub_category_id':$scope.sub_category_id,'type_id':$scope.type_id,'brand_id':$scope.brand_id,'product_specialization':$scope.filterData,'priceData':$scope.PriceArray,'search':$scope.searchdata};
            $http.post(ajxUrl + '/getData?page='+$scope.page+'&sort=' + $scope.sort + '&direction=' + $scope.direction, postData,{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function (resp) {
                if ($scope.page == 1) {
                    $scope.product = resp.data.data;
                } else {
                    $scope.product = $scope.product.concat(resp.data.data);
                }
                $scope.page = resp.data.nextpage;
                $scope.lastpage = resp.data.lastpage;
                $scope.busy = false;
                $scope.loadingStatus = false;
            });
            };
            $scope.dataSort = function (val) {
            $scope.sort = 'offer_price';
            $scope.direction = val;
            $scope.sort1 = 'id';
            $scope.loadProductData();
            };
            
            $scope.showAll = function () {
            $scope.busy = false;
            $scope.page = 1;
            $scope.lastpage = 1;
            $scope.price_min = 0;
            $scope.filterArray = [];
            $scope.searchdata="";
            $scope.sub_category_id=0;
		    $scope.category_id=0;
		    $scope.type_id=0;
		    $scope.brand_id=0;
            $scope.price_min = 0;
            $scope.price_max = 50000;
            $scope.slider.max = $scope.price_max;
            $scope.slider.min = $scope.price_min;
            $scope.filterArray.push({
                'key': 'offer_price_min',
                'val': $scope.price_min
            });
            $scope.filterArray.push({
                'key': 'offer_price_max',
                'val': $scope.price_max
            });
            $scope.headingName = "All Courses";
            $scope.nextPage();
        };
    }]);

angular.bootstrap(document.getElementById("App2"), ['product']);
