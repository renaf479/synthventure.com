<?php 
	/* Template Name: Services */ 
	global $post;
?> 

<?php get_header(); ?>

<?php
	wp_nav_menu(
		array(
			'container'=>false,
			'theme_location'=> 'services',
			'items_wrap'=> '<ul id="%1$s" class="%2$s" synth-services-menu>%3$s</ul>',
		)
	);
?>
	<div class="container">
		<?php while(have_posts()):the_post(); ?>
			<?php the_title(); ?>
		<?php endwhile; ?>
	</div>

<?php get_footer(); ?>