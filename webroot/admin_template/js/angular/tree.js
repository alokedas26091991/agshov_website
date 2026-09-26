angular.module('RecursionHelper', []).factory('RecursionHelper', ['$compile', function($compile){
	return {
		/**
		 * Manually compiles the element, fixing the recursion loop.
		 * @param element
		 * @param [link] A post-link function, or an object with function(s) registered via pre and post properties.
		 * @returns An object containing the linking functions.
		 */
		compile: function(element, link){
			// Normalize the link parameter
			if(angular.isFunction(link)){
				link = { post: link };
			}

			// Break the recursion loop by removing the contents
			var contents = element.contents().remove();
			var compiledContents;
			return {
				pre: (link && link.pre) ? link.pre : null,
				/**
				 * Compiles and re-adds the contents
				 */
				post: function(scope, element){
					// Compile the contents
					if(!compiledContents){
						compiledContents = $compile(contents);
					}
					// Re-add the compiled contents to the element
					compiledContents(scope, function(clone){
						element.append(clone);
					});

					// Call the post-linking function, if any
					if(link && link.post){
						link.post.apply(null, arguments);
					}
				}
			};
		}
	};
}]);

var app = angular.module('tree', ['RecursionHelper','ngAnimate','ui.bootstrap', 'ui.bootstrap.modal','ngMessages']);

app.directive("tree", function(RecursionHelper) {
    return {
        restrict: "EA",
        scope: {family: '='},
        template:
            '<ul><li>' + ' <a href="javascript:void(0)" popover-trigger="'+'click'+'" popover-placement="top"><div class="fonticon-wrap text-primary" style="text-align:center;"  data-ng-click="popo(family)"><span><i class="ft-users"></i></span><span class="fontsz">{{family.name}}</span></div><div class="popover" ng-click=hidepop() ng-show="showPopover"><span>{{ popover.title }}</span>UC-{{ popover.usercode }}<br>SC-{{ popover.sponsorcode }}<br>JD-{{popover.create_date| date:"fullDate"}}<br>TI-{{ popover.topup_amount }}</div></a>'+
                '<ul><li ng-if="family.children.length==1 && family.children[0].position==1" ><ul><li><a href="javascript:void(0)" popover-trigger="'+'click'+'" popover-placement="top" ng-click="addnew(family,2)"><div class="fonticon-wrap text-success" style="text-align:center;"  data-ng-click="add()"><i class="ft-user-plus"></i></div></a></li></ul></li><li ng-repeat="child in family.children| orderBy :position"> ' + 
                    '<tree family="child"></tree>' +
                '</li><li ng-if="family.children.length==1 && family.children[0].position==2" ><ul><li><a href="javascript:void(0)" popover-trigger="'+'click'+'" popover-placement="top" ng-click="addnew(family,1)"><div class="fonticon-wrap text-success" style="text-align:center;"  data-ng-click="add()"><i class="ft-user-plus"></i></div></a></li></ul></li><li ng-if="family.children.length==0"><ul><li><a href="javascript:void(0)" popover-trigger="'+'click'+'" popover-placement="top" ng-click="addnew(family,2)"><div class="fonticon-wrap text-success" style="text-align:center;"  data-ng-click="add()"><i class="ft-user-plus"></i></div></a></li></ul></li><li ng-if="family.children.length==0"><ul><li><a href="javascript:void(0)" popover-trigger="'+'click'+'" popover-placement="top" ng-click="addnew(family,1)"><div class="fonticon-wrap text-success" style="text-align:center;" ><i class="ft-user-plus"></i></div></a></li></ul></li>' +
            '</ul></li></ul>'+
			'<div class="modal fade" modal="showModal" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true"><div class="modal-dialog" role="document"><div class="modal-content"><div class="modal-header"><h3 class="modal-title" id="myModalLabel35"> Add New</h3><button type="button" class="close" ng-click="cancel()" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button></div><form method="post" accept-charset="utf-8" validate="validate" action="/mlm/admin/users/tree/"><div class="modal-body"><p>UP-{{current.name}}({{current.usercode}})({{currentposition}})<p><div style="display:none;"><input type="hidden" name="_method" value="POST"></div><div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="icon-star"></i> </span> </div> <input type="text" class="form-control" name="sponsorcode" id="sponsorcode" placeholder="Sponsor Id" required=""> </div><div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="icon-star"></i> </span> </div> <input type="text" class="form-control" name="upline_code" id="upline_code" placeholder="upline_code" required="" ng-value="current.usercode"> </div><div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="icon-star"></i> </span> </div> <select class="form-control" name="position" required="" ng-model="currentp1" ng-init="currentp1 = currentp" ><option value=""> Select position</option><option value="2" {{currentp=="2"?"selected":""}}> Right</option><option value="1" {{currentp1=="1"?"selected":""}}> Left</option></select> </div> <div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="icon-user"></i> </span> </div> <input type="text" class="form-control" name="name" id="fname" placeholder="Name" required=""> </div> <div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="ft-mail"></i> </span> </div> <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email" required=""> </div><div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="icon-screen-smartphone"></i> </span> </div> <input type="text" class="form-control" name="phone_no" id="inputEmail" placeholder="Phone No" required=""> </div><div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="icon-screen-smartphone"></i> </span> </div> <div class="input select"><select name="country_id" class="form-control" id="country-id"><option value="1">INDIA</option><option value="2">BANGLADESH</option><option value="3">PAKISTAN</option><option value="4">CHINA</option><option value="5">SOUTH AFRICA</option><option value="6">IRAN</option><option value="7">IRAQ</option><option value="8">AFGHANISTAN</option><option value="9">ALGERIA</option><option value="10">ARGENTINA</option><option value="11">AUSTRALIA</option><option value="12">AUSTRIA</option><option value="13">BAHRAIN</option><option value="14">BELGIUM</option><option value="15">BHUTAAN</option><option value="16">BRAZIL</option><option value="17">CANADA</option><option value="18">COLOMBIA</option><option value="19">FINLAND</option><option value="20">France</option><option value="21">GAMBIA</option><option value="22">GERMANY</option><option value="23">GREECE</option><option value="24">INDONESIA</option><option value="25">IRELAND</option><option value="26">ISRAEL</option><option value="27">ITALY</option><option value="28">JAPAN</option></select></div> </div> <div class="input-group mb-3"> <div class="input-group-prepend"> <span class="input-group-text"> <i class="ft-lock"></i> </span> </div> <input type="password" class="form-control" name="password" id="inputPass" placeholder="Password" required=""> </div> <div class="form-group col-sm-offset-1"> <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0"> <input type="checkbox" class="custom-control-input" checked="" id="terms"> <label class="custom-control-label pl-2" for="terms">I agree <a>terms and conditions</a></label> </div> </div> <div class="form-group text-center"> <button type="submit" class="btn btn-warning btn-raised">Get Started</button> </div></div> </form></div> </div></div>',
         controller: 'userTree',
		 link: function(scope, element, attributes) {
            scope.popo=function(d){
				scope.showPopover = true;
				scope.showPopover=true;
				scope.showPopoverID=d.id;
   
    scope.popover = {
        title: d.name,
        usercode: d.usercode,
		sponsorcode: d.sponsorcode,
		topup_amount: d.topup_amount,
		create_date: d.create_date
    };
	
				//alert('hi');
				}; //This will pass to the parent controller: injectedCtrl, where $scope resides.
		scope.hidepop=function(){
				
		scope.showPopover=false;
		};
		scope.addnew=function(f,p){
			scope.current=f;
			scope.currentp=p;
			scope.currentposition=(p==1)?'Left':'Right';
			scope.showPopoverModal();
			//window.location.href=ajxUrl+"/registration";
			};
			scope.cancel=function(){
				scope.showModal=false;
				};
        }
    };
  });
 
app.controller('userTree', ['$scope', '$http', '$location','$timeout', function ($scope, $http, $location,$timeout) {
        $scope.userDetails = [];
		$scope.showPopover = false;
		$scope.addshow=false;
    	
		 $scope.treeFamily = tree;
		 $scope.showModal=false;
		console.log($scope.treeFamily);
        $scope.loadsectionData = false;
        $scope.showPopoverModal=function(){
			$scope.addshow=true;
			console.log($scope.addshow);
			$timeout(function(){$scope.showModal=true;},100);
		
			};
			
			$scope.searchSubmit =function(){
			console.log($scope.searchdata);
			 $scope.loadsectionData = true;
			var pdata= {
                'user_id': $scope.searchdata.branch_id
                
            };
			$http.post(ajxUrl + '/generate', pdata).then(function (data, status, header, config) {
				console.log(data.data.data);
				$scope.userDetails=data.data.data;
				$scope.paymentone=data.data.paymentone;
				$scope.loadsectionData = false;
				
				
				});
			
			};
			
			$scope.popoverTemplate = function(cell){
				alert('hi');
			return 'advancePopoverTemplate.html';

		};

		$scope.popoverFilter = function(cell){
			var response = 'none';
			response ='click';
			return response;
		};

		$scope.open = function($event) {
			$event.preventDefault();
			$event.stopPropagation();
			$scope.opened = true;
		};
		
		$scope.reset = function(val) {
        $scope.plan[val] = undefined;
        $scope.updateAdvance();
    };
			
			
    }]);
