synthApp
	.directive('articleOverlay', function() {
		return {
			restrict: 'C',
			replace: true,
			transclude: true,
			template: '<resize/>',
			compile: function(element, attrs, transclude) {
				return function(scope, tElement, tAttrs) {
					transclude(scope, function(clone) {
						var image = angular.element(clone).find('img');
						tElement.append(image);
					});	
				}
			}
		}
	})
	.directive('bgSrc', function() {
		return {
			restrict: 'A',
			scope: {
				bgSrc: '@'
			},
			link: function(scope, element, attrs) {
				element.css({
					'background-image': 'url('+scope.bgSrc+')'
				});
			}
		}
	})
	.directive('resize', function($window) {
		return {
			restrict: 'E',
			link: function(scope, element, attrs) {
				scope.onResize = function() {
					element.css({
						'width': document.body.offsetWidth+'px'
					})
				}
			
				angular.element($window).bind('resize', function() {
					scope.onResize();
				});
				
				//Call it once for init
				scope.onResize();
			}
		}
	})
	
;
	/*
	var app=angular.module('App', []);
app.directive('elheightresize', ['$window', function($window) {
    return {
        link: function(scope, elem, attrs) {
            scope.onResize = function() {
                var header = document.getElementsByTagName('header')[0];
                elem.windowHeight = $window.innerHeight - header.clientHeight;
                $(elem).height(elem.windowHeight);
            }
            scope.onResize();

            angular.element($window).bind('resize', function() {
                scope.onResize();
            })
        }
    }
}])
	*/