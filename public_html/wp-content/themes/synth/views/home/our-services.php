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