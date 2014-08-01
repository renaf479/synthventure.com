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
			link: function(scope, element, attrs) {
				if(attrs.bgSrc) {
					element.css({
						'background-image': 'url('+attrs.bgSrc+')'
					});
				}
			}
		}
	})
	.directive('inView', function($rootScope) {
		/**
		* Angular InView - extending with custom scope
		*/
		return {
			restrict: 'A',
			controller: function($scope, $element) {
				if($rootScope.inView === undefined) {
					$rootScope.inView = function(inview, element, hide) {
						var element 	= angular.element(element),
							className 	= (className)? className: 'active';
						if(inview) {
							element.addClass(className);
						} else if(!inview && hide) {
							element.removeClass(className);
						}							
					}
				}
			}
		}
	})
	.directive('packery', function($timeout) {
		/**
		* Packery.js directive
		*/
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				scope.packery = new Packery(element[0], {
					gutter: 16,
					itemSelector: '.work'
				});

				/*
				           console.log('Running dannyPackery linking function!');
            if($rootScope.packery === undefined || $rootScope.packery === null){
                console.log('making packery!');
                $rootScope.packery = new Packery(element[0].parentElement, {columnWidth: '.item'});
                $rootScope.packery.bindResize();
                $rootScope.packery.appended(element[0]);
                $rootScope.packery.items.splice(1,1); // hack to fix a bug where the first element was added twice in two different positions
            }
            else{
                $rootScope.packery.appended(element[0]);
            }
            $rootScope.packery.layout();
				*/
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
	.directive('synthTile', function() {
		/**
		* Randomizes tile sizes
		*/
		return {
			restrict: 'A',
			link: function(scope, element, attrs) {
				//return Math.random() * (max - min) + min;
				element.css({
					'width': Math.random() * (234 - 150) + 150 + 'px',
					'height': Math.random() * (350 - 150) + 150 + 'px'
				});
			}
		}
	})
;