synthApp
	.directive('synthServicesMenu', function() {	
		/**
		* Generates a custom sub-nav for Services
		*/
		return {
			restrict: 'A',
			replace: true,
			transclude: true,
			templateUrl: 'services-nav.html',
			compile: function(element, attrs, transclude) {
				return function(scope, tElement, tAttrs) {
					transclude(scope, function(clone) {
						//console.log(clone);
						var menuItem = angular.element(clone).find('a');
						
						angular.element(menuItem).attr({
							'href':'javascript:void(0)'
							});
						tElement.children().append(menuItem);
						
						//var image = angular.element(clone).find('img');
						//tElement.append(image);
					});	
				}
			}
		}
	})
;
