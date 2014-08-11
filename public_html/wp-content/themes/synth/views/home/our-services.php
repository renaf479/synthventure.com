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
<div id="our-services" data-bg-src="<?php echo get_field('cover_image')['url'];?>">
	<div class="wrapper">
		<h2 class="title"><?php the_field('title');?></h2>
		<div class="content"><?php the_field('excerpt');?></div>
		<synth-button link="<?php echo the_field('url');?>" link-content="<?php echo the_field('url_button_text');?>"></synth-button>
	</div>
</div>
<?php endwhile;?>