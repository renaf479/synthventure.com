synthApp
	.directive('articleOverlay', function() {
		/**
		* Allows full-width images outside any parent container restrictions
		*/
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
		/**
		* Sets the background-image property of an element
		*/
		return {
			restrict: 'A',
			scope: {
				bgSrc: '@'
			},
			link: function(scope, element, attrs) {
				if(scope.bgSrc) {
					element.css({
						'background-image': 'url('+scope.bgSrc+')'
					});
				}
			}
		}
	})
	.directive('inView', function() {
		/**
		* Angular InView - extending with custom scope
		*/
		return {
			restrict: 'A',
			controller: function($scope, $element) {
				$scope.inView = function(inview) {
					if(inview) {
						$element.addClass('active');
					} else {
						$element.removeClass('active');
					}
				}
			}
		}
	})
	.directive('resize', function($window) {
		/**
		* Detects resizing of DOM window
		*/
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
	.directive('synthCircle', function($timeout) {
		/**
		* Ripple button click effect
		*/
		function offset(elm) { 
			try {return elm.offset();} catch(e) {} 
			var rawDom = elm[0]; 
			var _x = 0; 
			var _y = 0; 
			var body = document.documentElement || document.body; 
			var scrollX = window.pageXOffset || body.scrollLeft; 
			var scrollY = window.pageYOffset || body.scrollTop; 
			_x = rawDom.getBoundingClientRect().left + scrollX; 
			_y = rawDom.getBoundingClientRect().top + scrollY; 
			return { left: _x, top:_y }; 
		}
	
		return {
			restrict: 'C',
			link: function(scope, element, attrs) {
				var duration = 250;
				
				element.bind('click', function(e) {
					e.preventDefault();
					
					var x = e.pageX,
						y = e.pageY,
						setX = parseInt(x - offset(element).left),
						setY = parseInt(y - offset(element).top);
						
					element.append('<svg><circle cx="'+setX+'" cy="'+setY+'" r="0"><animate attributeName="r" from="0" to="'+(this.offsetWidth/2)+'" dur="'+duration+'ms"/></circle></svg>');
				
					$timeout(function() {
						element.find('svg').remove('svg');
						window.location.href = element.find('a').attr('href');
					}, duration)
				});
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