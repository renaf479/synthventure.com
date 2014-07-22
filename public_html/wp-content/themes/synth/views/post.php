<?php 
	global $post;
	
	$featuredImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?> 

<?php get_header(); ?>

	<?php while(have_posts()): the_post();?>
	<div class="featured-image" data-bg-src="<?php echo $featuredImage[0];?>"></div>
	<div class="content">
		<h1 class="title"><?php the_title();?></h1>
		<?php the_content();?>
	</div>
	<?php endwhile;?>

<?php get_footer(); ?>