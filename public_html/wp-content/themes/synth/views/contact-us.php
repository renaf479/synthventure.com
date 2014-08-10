<?php
$contactUs = new WP_Query(
	array(
		'name'=>'contact-us',
		'post_type'=>'page',
		'post_status'=>'publish',
		'posts_per_page'=>1)
);

while($contactUs->have_posts()): $contactUs->the_post();
?>
	<contact-us title="<?php the_field('title');?>" content="<?php the_field('content');?>" link="<?php the_field('click-thru');?>" link-content="<?php the_field('link');?>" data-in-view="inView($inview, $element, true)"></contact-us>
<?php endwhile;?>