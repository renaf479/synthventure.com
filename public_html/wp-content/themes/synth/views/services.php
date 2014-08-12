<?php 
	/* Template Name: Services */ 
	global $post;
?> 

<?php get_header(); ?>
	<?php while(have_posts()):the_post(); ?>
		<!-- SUBNAV -->
		<div class="subNav">
			<?php
			wp_nav_menu(
				array(
					'container'=>false,
					'theme_location'=> 'services'
				)
			);
			?>	
		</div>
		<h1 class="page-title"><?php the_title(); ?></h1>
		
		<div class="services synth-internal-page">
			<div class="cover">
				<?php the_post_thumbnail('full', array('class'=>'synth-img-cover'));?>
			</div>
			<div class="content">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>
<?php get_footer(); ?>