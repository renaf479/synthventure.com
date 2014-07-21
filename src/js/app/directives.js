synthApp
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