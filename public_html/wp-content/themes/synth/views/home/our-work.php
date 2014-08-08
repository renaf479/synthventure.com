<?php
	$works = new WP_Query(
		array(
			'posts_per_page'=>10,
			'category'=>get_category_by_slug($catSlug)->term_id)
	);
	$workClass = array('full', 'small', 'full', 'full', 'small', 'thin', 'thin', 'wide', 'thin', 'wide');
	$workHoverClass = array('top', 'right', 'bottom', 'left');
?>
<div id="our-work">
	<h2 class="title">Our Work</h2>
	<div data-packery>
		<?php while($works->have_posts()): $works->the_post();?>
		<a href="<?php the_permalink();?>" class="work <?php echo $workClass[$works->current_post].' '.$workHoverClass[array_rand($workHoverClass, 1)];?>" data-in-view="inView($inview, $element, false)">
			<div class="content">
				<h3 class="title"><?php the_title();?></h3>
			</div>
			<?php the_post_thumbnail('medium', array('class'=>'thumbnail'));?>
		</a>
		<?php endwhile;?>
	</div>
</div>