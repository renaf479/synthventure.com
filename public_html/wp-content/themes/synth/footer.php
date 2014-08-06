<?php
	$footer = get_posts(array(
		'name'=>'footer',
		'post_type'=>'page',
		'post_status'=>'publish',
		'posts_per_page'=>1
	));
	
	$footer = $footer[0];	
?>
	<footer id="footer">
		<div class="container">
			<?php wp_footer(); ?>
			
			
			
			<?php if ( is_active_sidebar('footer') ) : ?>
				<?php dynamic_sidebar('footer'); ?>
			<?php endif; ?>
			
			<div class="copyright"><?php the_field('copyright', $footer->ID);?></div>
			
			<synth-logo></synth-logo>

		</div>
	</footer>
	</body>
</html>