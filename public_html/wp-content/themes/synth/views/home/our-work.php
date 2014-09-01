<?php
$work = new WP_Query(
	array(
		'name'=>'our-work',
		'post_type'=>'page',
		'post_status'=>'publish',
		'posts_per_page'=>1)
);

$works = new WP_Query(
	array(
		'posts_per_page'=>10,
		'category'=>get_category_by_slug($catSlug)->term_id)
);
$workClass = array('full', 'small', 'full', 'full', 'small', 'thin', 'thin', 'wide', 'thin', 'wide');
$workHoverClass = array('top', 'right', 'bottom', 'left');
	
while($work->have_posts()): $work->the_post();
?>
<div id="our-work">
	<h2 class="title"><?php the_field('title');?></h2>
	<div data-packery>
		<?php while($works->have_posts()): $works->the_post();?>
		<a href="<?php the_permalink();?>" class="work <?php echo $workClass[$works->current_post].' '.$workHoverClass[array_rand($workHoverClass, 1)];?>" data-in-view="inView($inview, $element, false)">
			<div class="wrapper">
				<div class="content">
					<h3 class="title"><?php the_title();?></h3>
					<span class="excerpt"><?php the_field('excerpt');?></span>
				</div>
			</div>
			<?php the_post_thumbnail('medium', array('class'=>'thumbnail'));?>
		</a>
		<?php endwhile;?>
	</div>
</div>
<?php endwhile;?>