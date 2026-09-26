angular.module('ExampleApp', ['ngDraggable']).
            controller('MainCtrl', function ($scope,$http) {
                $scope.draggableObjects = [
                    {name: 'one'},
                    {name: 'two'},
                    {name: 'three'}
                ];
					$scope.changeState=function(){
					var postData = {
					'marchant_id': marchant_id,
					
					};
					$http.post('/my_app/api/PreferenceLocationDetails/listdata.json',postData).then(function (response) {
					$scope.draggableObjects = response.data.PreferenceLocationDetails;
					
					
					});
					
					};
				
				$scope.changeState();
                $scope.onDropComplete = function (index, obj, evt) {
                    var otherObj = $scope.draggableObjects[index];
					
                    var otherIndex = $scope.draggableObjects.indexOf(obj);
                    $scope.draggableObjects[index] = obj;
                    $scope.draggableObjects[otherIndex] = otherObj;
					
					var postData = {
					'marchant_id': 4,
					'selectObj':obj,
					'dropObj':otherObj
					
					};
					$http.post('/my_app/api/PreferenceLocationDetails/updateorder.json',postData).then(function (response) {
					//$scope.draggableObjects = response.data.PreferenceLocationDetails;
					
					$scope.changeState();
					});
					
					
					
					
                };
            });