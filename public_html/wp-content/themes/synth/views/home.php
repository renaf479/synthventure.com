<?php 
	/* Template Name: Homepage */ 
	global $post;
	$catSlug = 'works';
	
	$workArgs = array(
		'category'=>get_category_by_slug($catSlug)->term_id
	);
	$works = get_posts($workArgs);
	$aboutUsImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?> 

<?php get_header(); ?>

	<!-- COVER IMAGE (Static) -->
	<div id="cover">
		<img class="logo" src=""/>
		<div class="tagline"><?php echo get_bloginfo('description', 'display');?></div>
	</div>

	<div class="container">
		<!-- ABOUT US (Static) -->
		<?php if(have_posts()) while(have_posts()): the_post(); ?>
		<div id="about-us" data-bg-src="<?php echo $aboutUsImage[0];?>">
			<div class="left"></div>
			<div class="right">
				<h2 class="title"><?php the_title();?></h2>
				<div class="content"><?php the_content();?></div>
			</div>
		</div>
		<?php endwhile;?>
		
		<!-- WORKS (Post) -->
		<div id="our-work">
			<h2 class="title">Our Work</h2>
			<?php if($works) foreach($works as $post): setup_postdata($post);?>
			<div class="work">
				<h3 class="title"><?php the_title();?></h3>
				<?php the_post_thumbnail('large', array('class'=>'thumbnail'));?>
			</div>
			<?php endforeach;?>
		</div>
	</div>
	<contact-us title="Start Your Project Today" content="Contact us today to start working. We're as excited as you are!" link="http://www.google.com" link-content="Contact Us"></contact-us>
	

<?php get_footer(); ?>

