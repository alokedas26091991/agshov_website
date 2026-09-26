var app = angular.module('sliderDetails', []);
app.directive('checkFileSize', function() {
  return {
    link: function(scope, elem, attr, ctrl) {
      function bindEvent(element, type, handler) {
        if (element.addEventListener) {
          element.addEventListener(type, handler, false);
        } else {
          element.attachEvent('on' + type, handler);
        }
      }

      bindEvent(elem[0], 'change', function() {
       
		if(this.files[0].size/1024/1024>5){
			 alert('File type not supported');
			$("#media-file").val('');
			return true;
			}else if((this.files[0].type=='video/mp4' || this.files[0].type=='audio/mp3')){
				
				return true;
				}else{
					 alert('File type not supported');
					$("#media-file").val('');;
					return true;
					}
      });
    }
  }
});
app.controller('sliderDetailsController', ['$scope', '$http', function ($scope, $http) {
	$scope.media_type=file_type;
	if($scope.media_type=='I'){
			$scope.ShowMedia=false;
			}else{
				$scope.ShowMedia=true;
				}
	$scope.ChangeMedia=function(){
		if($scope.media_type=='I'){
			$scope.ShowMedia=false;
			}else{
				$scope.ShowMedia=true;
				}
	};
	
	}]);