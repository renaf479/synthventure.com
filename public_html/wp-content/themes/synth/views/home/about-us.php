<?php
$aboutUs = new WP_Query(
	array(
		'name'=>'about-us',
		'post_type'=>'page',
		'post_status'=>'publish',
		'posts_per_page'=>1)
);

while($aboutUs->have_posts()): $aboutUs->the_post(); ?>
<div id="about-us" in-view="inView($inview, $element, false)">
	<div class="left">
		<div class="wrapper">
			<?php echo get_bloginfo('description', 'display');?>
		</div>
	</div>
	<div class="right">
		<div class="wrapper">
			<h2 class="title"><?php the_title();?></h2>
			<div class="content"><?php the_excerpt();?></div>
		</div>
	</div>
</div>
<?php endwhile;?>