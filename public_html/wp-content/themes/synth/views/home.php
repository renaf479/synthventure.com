<?php 
	/* Template Name: Homepage */ 
	global $post;
	$catSlug = 'works';
	
	$workArgs = array(
		'posts_per_page'=>9,
		'category'=>get_category_by_slug($catSlug)->term_id
	);
	$works = get_posts($workArgs);
	$aboutUsImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
	
	$workClass = array('full', 'small', 'full', 'full', 'small', 'wide', 'full', 'full', 'full');
	
	$servicesArgs = array(
		'name'=>'our-services',
		'post_type'=>'page',
		'post_status'=>'publish',
		'posts_per_page'=>1
	);
	$services = get_posts($servicesArgs);
?> 

<?php get_header(); ?>

	<!-- COVER IMAGE (Static) -->
	<div id="cover">
		<!-- <img class="logo" src=""/> -->
		<div class="tagline"><?php echo get_bloginfo('description', 'display');?></div>
	</div>

	<!-- ABOUT US (PAGE) -->
	<?php if(have_posts()) while(have_posts()): the_post(); ?>
	<div id="about-us" data-bg-src="<?php echo $aboutUsImage[0];?>">
		<div class="wrapper">
			<h2 class="title"><?php the_title();?></h2>
			<div class="content"><?php the_content();?></div>
		</div>
	</div>
	<?php endwhile;?>
	
	<!-- SERVICES (PAGE) -->
	<?php if($services):?>
	<?php
		$services = $services[0];
		$servicesImage = wp_get_attachment_image_src(get_post_thumbnail_id($services->ID), 'full');
	?>
	<div id="our-services" data-bg-src="<?php echo $servicesImage[0];?>">
		<div class="wrapper">
			<h2 class="title"><?php echo $services->post_title;?></h2>
			<div class="content"><?php echo $services->post_content;?></div>
		</div>
	</div>
	<?php endif;?>
	
	<!-- WORKS (Post) -->
	<div id="our-work">
		<h2 class="title">Our Work</h2>
		<div class="container" data-packery>
			<?php if($works) foreach($works as $key=>$post): setup_postdata($post);?>
			<a href="<?php the_permalink();?>" class="work <?php echo $workClass[$key];?>" data-in-view="inView($inview, $element, false)">
				<h3 class="title"><?php the_title();?></h3>
				<?php the_post_thumbnail('medium', array('class'=>'thumbnail'));?>
			</a>
			<?php endforeach;?>
		</div>
	</div>

	<!-- CONTACT US -->
	<contact-us title="Start Your Project Today" content="Contact us today to start working. We're as excited as you are!" link="http://www.google.com" link-content="Contact Us" in-view="inView($inview, $element, true)"></contact-us>
	

<?php get_footer(); ?>

