<?php
$aboutUs = new WP_Query(
	array(
		'name'=>'about-us',
		'post_type'=>'page',
		'post_status'=>'publish',
		'posts_per_page'=>1)
);

while($aboutUs->have_posts()): $aboutUs->the_post(); ?>
<div id="about-us" data-in-view="inView($inview, $element, false)">
	<div class="left">
		<div class="wrapper">
			<synth-logo></synth-logo>
			<?php echo get_bloginfo('description', 'display');?>
		</div>
	</div>
	<div class="right">
		<div class="wrapper">
			<h2 class="title"><?php the_field('title');?></h2>
			<div class="content"><?php the_field('excerpt');?></div>
			<synth-button link="<?php echo the_field('url');?>" link-content="<?php echo the_field('url_button_text');?>"></synth-button>
			
<!--
			
			<contact-us title="<?php the_field('title');?>" content="<?php the_field('content');?>" link="<?php the_field('click-thru');?>" link-content="<?php the_field('link');?>" in-view="inView($inview, $element, true)"></contact-us>
			
			
			<div class="link synth-circle">
			<a href="{{link}}" class="">{{linkContent}}</a>
		</div>
-->
			
			</a>
		</div>
	</div>
</div>
<?php endwhile;?>