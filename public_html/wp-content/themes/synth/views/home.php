<?php 
	/* Template Name: Homepage */ 
	global $post;
	$catSlug = 'works';
?> 

<?php get_header(); ?>

	<!-- COVER IMAGE (Homepage PAGE) -->
	<?php while(have_posts()): the_post(); ?>
	<div id="cover" data-bg-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];?>">
<!--
		<div class="wrapper">
			<synth-logo></synth-logo>
		</div>
-->
	</div>
	<?php endwhile;?>

	<!-- ABOUT US (PAGE) -->
	<?php include('home/about-us.php');?>
	
	<!-- SERVICES (PAGE) -->
	<?php include('home/our-services.php');?>
	
	<!-- WORKS (Post) -->
	<?php include('home/our-work.php');?>
	
<?php get_footer(); ?>