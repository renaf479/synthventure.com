<?php 
	/* Template Name: Internal Page */ 
	global $post;
	
	switch($post->post_name) {
		case 'our-work':
			$catSlug = 'works';
			break;
	}
	
	$workArgs = array(
		'category'=>get_category_by_slug($catSlug)->term_id
	);
	$works = get_posts($workArgs);
	$introImage = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
?> 

<?php get_header(); ?>

	<div class="container">
		<!-- Intro (Static) -->
		<?php if(have_posts()) while(have_posts()): the_post(); ?>
		<div id="intro" data-bg-src="<?php echo $introImage[0];?>">
			<h2 class="title"><?php the_title();?></h2>
			<div class="content"><?php the_content();?></div>
		</div>
		<?php endwhile;?>
		
		<!-- Posts -->
		<div id="posts">
			<?php if($works) foreach($works as $post): setup_postdata($post);?>
			<div class="work">
				<h3 class="title"><?php the_title();?></h3>
				<?php the_post_thumbnail('medium', array('class'=>'thumbnail'));?>
			</div>
			<?php endforeach;?>
		</div>
	</div>

<?php get_footer(); ?>

