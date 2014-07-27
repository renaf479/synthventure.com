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
	});
/*
<our-work class="work" link="<?php the_permalink();?>">
				<h3 class="title"><?php the_title();?></h3>
				<?php the_post_thumbnail('medium', array('class'=>'thumbnail'));?>
			</our-work>
*/