synthApp
	.directive('contactUs', function() {	
		/**
		* Generates "Contact Us" module
		*/
		return {
			restrict: 'E',
			replace: true,
			transclude: true,
			templateUrl: 'contact-us.html',
			scope: {
				title: '@',
				content: '@',
				link: '@',
				linkContent: '@',
				inView: '@'
			}
		}
	})
	.directive('ourWork', function() {
		/**
		* Randomizes "Our Work" layout and hover effects
		*/
		return {
			restrict: 'A',
			compile: function(element, attrs) {
				/*
						$workClass = array('full', 'small', 'full', 'full', 'small', 'thin', 'thin', 'wide', 'thin', 'wide');
	$workHoverClass = array('top', 'right', 'bottom', 'left');
				*/
				
				var workClass 		= ['full', 'small', 'full', 'full', 'small', 'thin', 'thin', 'wide', 'thin', 'wide'],
					workHoverClass	= ['top', 'right', 'bottom', 'left'];
				
			}
		}
	})	
;
