var myApp = angular.module("product", ['ui.bootstrap', 'ui.bootstrap.modal', 'ngProgress']);

myApp.directive('fileModel', ['$parse', function($parse) {
 return {
  restrict: 'A',
  link: function(scope, element, attrs) {
   var model = $parse(attrs.fileModel);
   var modelSetter = model.assign;

   element.bind('change', function() {
    scope.$apply(function() {
     modelSetter(scope, element[0].files[0]);
    });
   });
  }
 };
}]);


myApp.directive('ckEditor', function() {
  return {
    require: '?ngModel',
    link: function(scope, elm, attr, ngModel) {
      var ck = CKEDITOR.replace(elm[0]);

      if (!ngModel) return;

      ck.on('pasteState', function() {
        scope.$apply(function() {
          ngModel.$setViewValue(ck.getData());
        });
      });

      ngModel.$render = function(value) {
        ck.setData(ngModel.$viewValue);
      };
    }
  };
});

myApp.directive('convertToNumber', function() {
 return {
  require: 'ngModel',
  link: function(scope, element, attrs, ngModel) {
   ngModel.$parsers.push(function(val) {
    return val != null ? parseInt(val, 10) : null;
   });
   ngModel.$formatters.push(function(val) {
    return val != null ? '' + val : null;
   });
  }
 };
});
myApp.service('fileUpload', ['$http', function($http) {
 this.uploadFileToUrl = function(file, uploadUrl, id, type) {
  var fd = new FormData();
  fd.append('file', file);
  fd.append('product_id', id);
  fd.append('type', type);
  $http.post(uploadUrl, fd, {
    transformRequest: angular.identity,
    headers: {
     'Content-Type': undefined
    }
   })
   .success(function() {})
   .error(function() {});
 }
}]);

myApp.service('fileUploadNew', ['$http', function($http) {
 this.uploadFileToUrl = function(file, uploadUrl, id, type) {
  var fd = new FormData();
  fd.append('file', file);
  fd.append('product_id', id);
  fd.append('type', type);
  $http.post(uploadUrl, fd, {
    transformRequest: angular.identity,
    headers: {
     'Content-Type': undefined,
     'X-CSRF-Token': csrf_token
    }
   })
   .success(function() {})
   .error(function() {});
 }
}]);
myApp.controller('productCrt', ['$scope', '$http', '$timeout', 'fileUpload', 'fileUploadNew', 'ngProgressFactory', function($scope, $http, $timeout, fileUpload, fileUploadNew, ngProgressFactory) {
 $scope.show = false;

 $scope.progressbar = ngProgressFactory.createInstance();

 $scope.color = 'firebrick';
 $scope.height = '3px';

 $scope.contained_progressbar = ngProgressFactory.createInstance();
 $scope.contained_progressbar.setParent(document.getElementById('panel'));
 $scope.contained_progressbar.setAbsolute();

 $scope.progressbar.start();
 $timeout(function() {
  $scope.progressbar.complete();
  $scope.show = true;
 }, 200);
 $scope.showat = false;



 $scope.productId = productId;
 $scope.charges=charge;
 $scope.step = 1;
 updateclass(1);
$scope.charges=charge;
 $scope.showModal = false;
 $scope.isPause = false;
 $scope.categories = categories;
 console.log($scope.categories);

 $scope.subcategories = [];
 $scope.type = [];
 $scope.product = {
  category_id: 0,
  sub_category_id: 0,
  type_id: 0,
  brand_id: 0
 };
  $scope.categorieslist = function(id) {
   $scope.product.category_id = id;
   if ($scope.categories && Array.isArray($scope.categories)) {
       var idx = $scope.categories.findIndex(x => x.id == $scope.product.category_id);
       if (idx !== -1 && $scope.categories[idx]) {
           $scope.subcategories = $scope.categories[idx].sub_categories || [];
       } else {
           $scope.subcategories = [];
       }
   }
  };
  $scope.typelist = function(id) {
   $scope.product.sub_category_id = id;
   if ($scope.subcategories && Array.isArray($scope.subcategories)) {
       var idx = $scope.subcategories.findIndex(x => x.id == $scope.product.sub_category_id);
       if (idx !== -1 && $scope.subcategories[idx]) {
           $scope.type = $scope.subcategories[idx].types || [];
       } else {
           $scope.type = [];
       }
   }
  };
  $scope.ModalCharge=false;
 $scope.showCharge=function(){
	 $scope.ModalCharge=true;
	 
	 };
	$scope.closeCharge=function(){
		 $scope.ModalCharge=false;
		} ;
 
 
 $scope.selecttype = function(id) {
  $scope.product.type_id = id;
  console.log($scope.product);
 };
 $scope.currentProductId=0;
 $scope.typeImage=0;
 $scope.uploadProductImage = function(id,type) {
		$scope.currentProductId = id || $scope.productId || ($scope.product ? $scope.product.id : 0);
		$scope.typeImage = type;
  		$scope.showModal = true;
 };

 function updateclass(step) {
  $scope.step = step;

 }
 $scope.validateRequiredFields = function() {
     if (!$scope.product) return true;
     if ($scope.product.gst_percentage === undefined || $scope.product.gst_percentage === null) {
         $scope.product.gst_percentage = 0;
     }
     var isVariant = ($scope.product.variant == 1 || $scope.product.variant == '1' || $scope.product.variant === true);
     if (!isVariant) {
         var name = $scope.product.name;
         if (name === undefined || name === null || String(name).trim() === "") {
             return false;
         }
     }
     return true;
 };

 $scope.changeStep = function(e, step) {
  if(parseInt(step)===3 || parseInt(step)===5){
      if (!$scope.validateRequiredFields()) {
          $scope.displayMessage("please filled-up all required field",false,true);
          if (e && e.preventDefault) e.preventDefault();
          return false;
      }
  }
  var resPromise = $scope.saveProduct(e, step);
  var doStepActions = function() {
   if($scope.step==5 || step==5){
	  $scope.skulist();
   }
   if(step==3){
	  $scope.productImageList();
   }
   if(step==4){
	  $scope.openAattribute();
   }
   $scope.step = step;
   updateclass(step);
  };
  if (resPromise && resPromise.then) {
      resPromise.then(doStepActions);
  } else {
      doStepActions();
  }

 };

 $scope.changeStepnew = function(e, step) {
  if(parseInt(step)===5){
      if ($scope.product.photo == null){
           $scope.displayMessage("please upload image",false,true);
            e.preventDefault();
            return false;
      }
  }
  
  $scope.step = step;
  if($scope.step==5){
	  $scope.skulist();
	  }
	   if($scope.step==3){
	   $scope.productImageList();
	  }
	  if(step==4){
	  $scope.openAattribute(e,step);
	  }


 };

 $scope.productArribute = function() {
    $scope.productListId=$scope.productId;
  $scope.uploadProductSpesalization();
  $scope.step = 4;
 };
 $scope.startUpload = false;
  $scope.doActualUpload = function() {
   var file = $scope.myFile;
   if (!file) {
       $scope.startUpload = false;
       $scope.displayMessage("Please select a file to upload", false, true);
       return;
   }
   var uploadUrl = ajxUrl + '/upload/';
   var fd = new FormData();
   fd.append('file', file);
   fd.append('product_id', $scope.currentProductId);
   fd.append('type', $scope.typeImage);

   $http.post(uploadUrl, fd, {
    transformRequest: angular.identity,
    headers: {
     'Content-Type': undefined,
     'X-CSRF-Token': csrf_token
    }
   }).then(function(response) {
      console.log("Upload response:", response);
      var imgPath = response.data ? (response.data.image || (response.data.data ? (response.data.data.photo || response.data.data.image) : null)) : null;
      if (imgPath) {
          if ($scope.typeImage == 1 || !$scope.product.photo) {
              $scope.product.photo = imgPath;
          }
          if ($scope.productImageData && $scope.productImageData.length > 0) {
              if ($scope.typeImage == 1 || !$scope.productImageData[0].photo) {
                  $scope.productImageData[0].photo = imgPath;
              }
          }
      }
      $scope.startUpload = false;
      $scope.showModal = false;
      $scope.productImageList();
   }, function(err) {
      console.error("Upload error:", err);
      $scope.startUpload = false;
      $scope.displayMessage("Upload failed. Please try again.", false, true);
   });
  };

  $scope.uploadFile = function() {
   $scope.startUpload = true;
   var pId = $scope.currentProductId || $scope.productId || ($scope.product ? $scope.product.id : 0);
   if (!pId || pId == 0) {
       var resPromise = $scope.saveProduct(null, $scope.step);
       if (resPromise && resPromise.then) {
           resPromise.then(function() {
               $scope.currentProductId = $scope.productId;
               $scope.doActualUpload();
           });
       } else {
           $scope.currentProductId = $scope.productId;
           $scope.doActualUpload();
       }
   } else {
       $scope.currentProductId = pId;
       $scope.doActualUpload();
   }
  };

 $scope.uploadFile1 = function(fileType, id) {

  var file = $scope.myFile1;
  console.log('file is ');
  console.dir(file);
  var uploadUrl = ajxUrl + '/uploadSku/';
  // fileUploadNew.uploadFileToUrl(file, uploadUrl,id,1);
  var fd = new FormData();
  fd.append('file', file);
  fd.append('product_id', id);
  fd.append('type', 1);
  $http.post(uploadUrl, fd, {
   transformRequest: angular.identity,
   headers: {
    'Content-Type': undefined,
    'X-CSRF-Token': csrf_token
   }
  }).then(function(response) {

   $scope.skulist();

  });

 };

 $scope.productImage = [];
 $scope.getProductImage = function() {
  $scope.loadingStatus = true;
  $scope.loadsectionData = false;
  $http.get(ajxUrl + '/productimage/' + $scope.productId).then(function(response) {

   $scope.productImage = response.data.data;

   $scope.loadsectionData = true;
   $scope.loadingStatus = false;

  });
 };
 $scope.cancel = function() {
  //$scope.productId=0;
  $scope.showModal = false;;
 };
 $scope.showModalFilter = false;
 $scope.productFilter = [];
   $scope.openAattribute = function(e, step) {
      $scope.skulist();
      var targetStep = (parseInt(step) === 4) ? 5 : (parseInt(step) > 0 ? parseInt(step) : 5);
      $scope.step = targetStep;
      updateclass(targetStep);
   };
 $scope.uploadProductSpesalization = function() {
  //console.log($scope.p_id);
 //$scope.product_id=p_id;
 if($scope.productListId==0){
     $scope.productListId = $scope.productId;
 }
  $scope.productFilter = [];
  $scope.step = 4;
  $scope.showModalFilter = true;
  $http.get(ajxUrl + '/filterList/' + $scope.productListId).then(function(response) {

   $scope.productFilter = response.data.data;
   console.log($scope.productFilter);
   $scope.loadsectionData = true;
   $scope.loadingStatus = false;

  });
 };





 $scope.productvarientFilter = [];
 $scope.showModalFilter=false;
 $scope.productListId=0;
 $scope.openAttribute =function(productId){
	 $scope.productListId=productId;
	 $scope.productFilter = [];
	  $scope.showModalFilter=true;
	  $timeout(function(){$scope.uploadProductSpesalization();},1000);
	 //$scope.uploadProductSpesalization();
	 };
 $scope.filterOptionList = function() {
  
  $scope.productvarientFilter = [];
  //$scope.showModalFilter = true;
  $http.get(ajxUrl + '/filterList/' + $scope.productId).then(function(response) {

   $scope.productvarient = response.data.data;
   console.log($scope.productvarientFilter);
   angular.forEach($scope.productvarient, function(value) {
    $scope.productvarientFilter.push(value.filter);

   });
   $scope.loadsectionData = true;
   $scope.loadingStatus = false;

  });
 };
 $scope.filterOptionListVarient = function() {
  
  $scope.productvarientFilter = [];
  //$scope.showModalFilter = true;
  $http.get(ajxUrl + '/filterListVarient/' + $scope.productId).then(function(response) {

   $scope.productvarient = response.data.data;
   console.log($scope.productvarientFilter);
   $scope.productvarientFilter=$scope.productvarient;
   $scope.loadsectionData = true;
   $scope.loadingStatus = false;
   $scope.getfilteroption();
   $scope.getfilteroption1();

  });
 };

 $scope.filteroption = [];
 $scope.getfilteroption = function() {
  $scope.filteroption = [];
  console.log($scope.newProduct.filter_id);
  if($scope.addSkuShow){
    var filter_id=  $scope.newProduct.filter_id;
  }else{
       var filter_id= $scope.updateProduct.filter_id;
  }
  angular.forEach($scope.productvarientFilter, function(value) {
   if (parseInt(value.id) == parseInt(filter_id)) {
    $scope.filteroption = value.filter_options;
    console.log($scope.filteroption);

   }else{
        console.log($scope.filteroption);
   }

  });
 };
 
  $scope.filteroption1 = [];
 $scope.getfilteroption1 = function() {
  $scope.filteroption1 = [];
  console.log($scope.newProduct.filter_id1);
  if($scope.addSkuShow){
    var filter_id1=  $scope.newProduct.filter_id1;
  }else{
       var filter_id1= $scope.updateProduct.filter_id1;
  }
  angular.forEach($scope.productvarientFilter, function(value) {
   if (parseInt(value.id) == parseInt(filter_id1)) {
    $scope.filteroption1 = value.filter_options;
    console.log($scope.filteroption1);

   }else{
        console.log($scope.filteroption1);
   }

  });
 };
 $scope.startLoader=false;
  $scope.saveProduct = function($event, st) {
     console.log($scope.product);
   
    $scope.startLoader=true;
   $scope.progressbar.start();
   
   if ($scope.productId > 0) {

    var url = ajxUrl + '/updateProduct/' + $scope.productId;
   } else {
    var url = ajxUrl + '/saveData/';
   }
   return $http.post(url, {
    'postData': $scope.product,
    'id': $scope.productId
   },{
              headers: {
                  'X-CSRF-Token': csrf_token
              }}).then(function(response) {
    $scope.progressbar.complete();
     $scope.startLoader=false;
    if (response.data && response.data.data) {
        $scope.product = response.data.data;
        if ($scope.product && ($scope.product.gst_percentage === null || $scope.product.gst_percentage === undefined)) {
            $scope.product.gst_percentage = 0;
        }
        $scope.productId = $scope.product ? $scope.product.id : 0;
    }

    updateclass(st);
    $scope.loadingStatus = false;
    return response;
   });
  };


  $scope.updatePrice = function($event, st) {
   if (!$scope.productId || $scope.productId == 0) {
       if ($scope.product && $scope.product.id > 0) {
           $scope.productId = $scope.product.id;
       }
   }

   var doActualUpdatePrice = function() {
       $scope.progressbar.start();
       if ($scope.skuListData && $scope.skuListData.length > 0) {
           angular.forEach($scope.skuListData, function(item) {
               if (!item.id || item.id == 0) {
                   item.id = $scope.productId;
               }
           });
       }
       var url = ajxUrl + '/updatePrice/' + $scope.productId;
       $http.post(url, {
        'postData': $scope.skuListData,
        'id': $scope.productId
       },{
                 headers: {
                     'X-CSRF-Token': csrf_token
                 }}).then(function(response) {
        $scope.progressbar.complete();
        $scope.displayMessage("Successfully update product price",true,false);
        $timeout(function(){
            var redirectUrl = (typeof ajxPageUrladmin !== 'undefined' ? ajxPageUrladmin : (typeof ajxPageUrl !== 'undefined' ? ajxPageUrl : ajxUrl)) + '/index';
            window.location.href = redirectUrl;
        }, 1000);
        $scope.loadingStatus = false;
       });
   };

   if (!$scope.productId || $scope.productId == 0) {
       var savePromise = $scope.saveProduct($event, 5);
       if (savePromise && savePromise.then) {
           savePromise.then(function(res) {
               if ($scope.productId > 0) {
                   doActualUpdatePrice();
               } else {
                   $scope.displayMessage("Failed to save product details before updating price.", false, true);
               }
           });
       } else {
           if ($scope.productId > 0) {
               doActualUpdatePrice();
           } else {
               $scope.displayMessage("Failed to save product details before updating price.", false, true);
           }
       }
   } else {
       doActualUpdatePrice();
   }
  };
 $scope.requestForAdmin = function($event, st) {
    var step=st;
    if(parseInt(step)===3 || parseInt(step)===5){
        if (!$scope.validateRequiredFields()) {
            $scope.displayMessage("please filled-up all required field",false,true);
            if ($event && $event.preventDefault) $event.preventDefault();
            return false;
        }
    }
  if(parseInt(step)===5){
      if ($scope.product.photo == null){
           $scope.displayMessage("please upload image",false,true);
           $event.preventDefault();
            return false;
      }
  }
  $scope.progressbar.start();
  var url = ajxUrl + '/requestForAdmin/' + $scope.productId;
  $http.post(url, {
   'id': $scope.productId
  },{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function(response) {
   $scope.progressbar.complete();
   if(response.data.success===true){
       
       	 $scope.displayMessage("Request Send successfully",true,false);
     	$timeout(function(){window.location.href = ajxPageUrladmin + '/index';},5000);
       $scope.loadingStatus = false;
   }
   else
   {
       $scope.displayMessage("Admin Approval is not sent.Please fill-up all Mandatory fields",true,false);
       $scope.loadingStatus = false;
   }

  });


 };
 $scope.loadingStatus = false;
 $scope.filterDataSend = function(event,index, opindex) {
	
  $scope.loadingStatus = true;
  for (var i = 0; i < $scope.productFilter[index].filter.filter_options.length; i++) {
   if (i == opindex) {
	 $scope.productFilter[index].filter.filter_options[i].checked = true;
   } else {
    $scope.productFilter[index].filter.filter_options[i].checked = false;
   }
  }
  var sendId = [];
  for (var i = 0; i < $scope.productFilter.length; i++) {
   for (var j = 0; j < $scope.productFilter[i].filter.filter_options.length; j++) {
    if ($scope.productFilter[i].filter.filter_options[j].checked) {
     sendId.push($scope.productFilter[i].filter.filter_options[j].id);

    }

   }

  }
  $http.post(ajxUrl + '/update/', {
   'postData': sendId,
   'id': $scope.productListId
  },{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function(response) {
   $scope.loadingStatus = false;
  });

 };
  $scope.saveattribute = function() {
      	$scope.showat = true;
				
				
				
}
  
 $scope.deletedcheck = function(index, opindex) {
  $scope.loadingStatus = true;
  for (var i = 0; i < $scope.productFilter[index].filter.filter_options.length; i++) {
   if (i == opindex) {
    $scope.productFilter[index].filter.filter_options[i].checked = false;
   }
  }
  var sendId = [];
  for (var i = 0; i < $scope.productFilter.length; i++) {
   for (var j = 0; j < $scope.productFilter[i].filter.filter_options.length; j++) {
    if ($scope.productFilter[i].filter.filter_options[j].checked) {
     sendId.push($scope.productFilter[i].filter.filter_options[j].id);
    }

   }

  }
  $http.post(ajxUrl + '/update/', {
   'postData': sendId,
   'id': $scope.productId
  },{
            headers: {
                'X-CSRF-Token': csrf_token
            }}).then(function(response) {
   $scope.loadingStatus = false;
  });
 };
 $scope.cancelFilter = function() {
  $scope.showSKU = false;;
 };
 $scope.showSKU = false;
 $scope.newProduct = {};
 $scope.addSkuShow=true;
 $scope.multipleSKU = function(product) {
	  $scope.addSkuShow=true;
	 $scope.baseProduct = angular.copy(product);
  $scope.newProduct = angular.copy(product);
  
  $scope.newProduct.supc = '';
  $scope.newProduct.size = '';
  $scope.newProduct.filter_id = 0;
  $scope.newProduct.filter_option_id =0;
   $scope.newProduct.filter_option_id1 =0;
  $scope.filterOptionListVarient();
  $scope.newProduct.filter_id=0;
  $scope.newProduct.filter_id1=0;
  $scope.getfilteroption();
  $scope.getfilteroption1();
  if(!$scope.is_first){
  $scope.skulist();
  
  };
  $scope.showSKU = true;

 };
 $scope.updateSku=function(product1){
	 $scope.addSkuShow=false;
	 
	 $scope.updateProduct=product1;
	 console.log($scope.updateProduct);
	  $scope.getfilteroption();
	 $scope.getfilteroption1();

	 };
 $scope.skuListData = [];
 $scope.is_first=is_first;
 
 $scope.skulist = function() {
  if (!$scope.productId || $scope.productId == 0) {
      if ($scope.product && $scope.product.id > 0) {
          $scope.productId = $scope.product.id;
      }
  }

  var ensureUserProducts = function(items) {
      if (!items || !items.length) return [];
      angular.forEach(items, function(item) {
          if (!item.user_products || !item.user_products.length) {
              item.user_products = [{
                  actual_price: item.actual_price || 0,
                  offer_price: item.offer_price || 0,
                  mrp: item.mrp || 0,
                  total_quantity: item.total_quantity || 0,
                  vendor_discount: item.vendor_discount || 0,
                  delivery_charge: item.delivery_charge || 0,
                  day_of_delivary: item.day_of_delivary || 0,
                  height: item.height || null,
                  width: item.width || null,
                  length: item.length || null,
                  weight: item.weight || null,
                  minimum_order: item.minimum_order || 1,
                  show_in_site: item.show_in_site || 1,
                  is_live: item.is_live || 1
              }];
          }
      });
      return items;
  };

  if (!$scope.productId || $scope.productId == 0) {
      if ($scope.product) {
          $scope.skuListData = ensureUserProducts([$scope.product]);
      }
      return;
  }

  $http.get(ajxUrl + '/skuList/' + $scope.productId).then(function(response) {
   if (response.data && response.data.data && response.data.data.length > 0) {
       $scope.skuListData = ensureUserProducts(response.data.data);
   } else {
       if ($scope.product) {
           $scope.skuListData = ensureUserProducts([$scope.product]);
       }
   }
  
   $scope.loadsectionData = true;
   $scope.loadingStatus = false;

  });

 };
 $scope.productImageData=[];
 $scope.productImageList = function() {
  if (!$scope.productId || $scope.productId == 0) {
      if ($scope.product && $scope.product.id > 0) {
          $scope.productId = $scope.product.id;
      } else {
          $scope.productImageData = [$scope.product];
          return;
      }
  }
  $http.get(ajxUrl + '/productImageList/' + $scope.productId).then(function(response) {

   if (response.data && response.data.data && response.data.data.length > 0) {
       $scope.productImageData = response.data.data;
       if ($scope.productImageData[0] && $scope.productImageData[0].photo) {
           $scope.product.photo = $scope.productImageData[0].photo;
       }
   } else {
       $scope.productImageData = [$scope.product];
   }
  
   $scope.loadsectionData = true;
   $scope.loadingStatus = false;

  });

 };
 $scope.deleteImage=function(id){
     if(confirm("Are you sure delete this image?")){
         
         $http.get(ajxUrl + '/deleteProductImage/' + id).then(function(response) {

                    $scope.productImageList();
  
                    $scope.loadsectionData = true;
                    $scope.loadingStatus = false;
                    

  });
         
         
     }
     
 };
 $scope.startskuadd=false;
 $scope.addSku = function($event) {
  $event.preventDefault();
  $scope.progressbar.start();
   $scope.startskuadd=true;
 
  if($scope.addSkuShow){
	 $scope.newProduct.parent_id = $scope.productId;  
  var postData={
   'postData': $scope.newProduct,
   'id': $scope.productId,
   'is_first':$scope.is_first
    };
	 var url = ajxUrl + '/addSku/';
	 var msg="Successfully add sku";
  }else{
	  var postData={
   'postData': $scope.updateProduct,
   'id': $scope.updateProduct.id,
   'is_first':true
  };
   var url = ajxUrl + '/updateSku/';
    var msg="Successfully update sku";
	  }
  
  $http.post(url,postData,{
            headers: {
                'X-CSRF-Token': csrf_token
            }} ).then(function(response) {
   $scope.progressbar.complete();
   //$scope.productId=
   $scope.is_first=false;
    $scope.startskuadd=false;
  $scope.newProduct =$scope.baseProduct;
  $scope.newProduct.supc='';
  $scope.newProduct.size='';
   $scope.newProduct.filter_id=0;
   $scope.newProduct.filter_id1=0;
   $scope.newProduct.filter_option_id=0;
   $scope.newProduct.filter_option_id1=0;
   //$timeout(function(){$scope.skulist();},200);
    $scope.displayMessage(msg,true,false);
   $scope.addSkuShow=true;
   $scope.skulist();
  });

 };
 $scope.cancelFilter=function(){
	 $scope.showModalFilter=false;
	 };
	 $scope.cancelSKU=function(){
	 $scope.showSKU=false;
	 };
	$scope.cancelAdd=function(){
		$scope.addSkuShow=true;
		}; 
		$scope.offineSuccessMessageDisplay=false;
		$scope.offineErrorMessageDisplay=false;
		$scope.offineMessage="";
	$scope.displayMessage=function(msg,succ,err){
		$scope.offineMessage=msg;
		$scope.offineSuccessMessageDisplay=succ;
		
		$scope.offineErrorMessageDisplay=err;
		$timeout(function(){
			$scope.offineSuccessMessageDisplay=false;
		$scope.offineErrorMessageDisplay=false;
		$scope.offineMessage="";},3000);
		
		
		};
 if ($scope.productId > 0) {

  $scope.product = product;
  console.log($scope.product);
  $scope.categorieslist($scope.product.category_id);
  $scope.typelist($scope.product.sub_category_id);
 }

}]);