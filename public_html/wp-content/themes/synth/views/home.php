<?php 
	/* Template Name: Homepage */ 
	global $post;
	$catSlug = 'works';
	

	

	
	$contactUs = get_posts(array(
		'name'=>'contact-us',
		'post_type'=>'page',
		'post_status'=>'publish',
		'posts_per_page'=>1
	));
?> 

<?php get_header(); ?>

	<!-- COVER IMAGE (Static) -->
	<div id="cover">
		<!-- <img class="logo" src=""/> -->
		<div class="tagline"><?php echo get_bloginfo('description', 'display');?></div>
	</div>

	<!-- ABOUT US (PAGE) -->
	<?php
	$aboutUs = new WP_Query(
		array(
			'name'=>'about-us',
			'post_type'=>'page',
			'post_status'=>'publish',
			'posts_per_page'=>1)
	);
	
	while($aboutUs->have_posts()): $aboutUs->the_post(); ?>
	<div id="about-us">
		<div class="left">
			<?php echo get_bloginfo('description', 'display');?>
		</div>
		<div class="right">
			<div class="wrapper">
				<h2 class="title"><?php the_title();?></h2>
				<div class="content"><?php the_excerpt();?></div>
			</div>
		</div>
	</div>
	<?php endwhile;?>
	
	<!-- SERVICES (PAGE) -->
	<?php
	$services = new WP_Query(
		array(
			'name'=>'our-services',
			'post_type'=>'page',
			'post_status'=>'publish',
			'posts_per_page'=>1)
	);
	while($services->have_posts()): $services->the_post();
	?>
	<div id="our-services" data-bg-src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];?>">
		<div class="wrapper">
			<h2 class="title"><?php the_title();?></h2>
			<div class="content"><?php the_excerpt();?></div>
		</div>
	</div>
	<?php endwhile;?>
	
	<!-- WORKS (Post) -->
	<?php
	$works = new WP_Query(
		array(
			'posts_per_page'=>10,
			'category'=>get_category_by_slug($catSlug)->term_id)
	);
	$workClass = array('full', 'small', 'full', 'full', 'small', 'thin', 'thin', 'wide', 'thin', 'wide');
	?>
	<div id="our-work">
		<h2 class="title">Our Work</h2>
		<div data-packery>
			<?php //if($works) foreach($works as $key=>$post): setup_postdata($post);?>
			<?php while($works->have_posts()): $works->the_post();?>
			<a href="<?php the_permalink();?>" class="work <?php echo $workClass[$works->current_post];?>" data-in-view="inView($inview, $element, false)">
				<h3 class="title"><?php the_title();?></h3>
				<?php the_post_thumbnail('medium', array('class'=>'thumbnail'));?>
			</a>
			<?php endwhile;?>
		</div>
	</div>
	
	<!-- CONTACT US -->
	<?php
	if($contactUs):
		$contactUs = $contactUs[0];			
	?>
		<contact-us title="<?php the_field('title', $contactUs->ID);?>" content="<?php the_field('content', $contactUs->ID);?>" link="<?php the_field('click-thru', $contactUs->ID);?>" link-content="<?php the_field('link', $contactUs->ID);?>" in-view="inView($inview, $element, true)"></contact-us>
	<?php endif;?>
	

<?php get_footer(); ?>

