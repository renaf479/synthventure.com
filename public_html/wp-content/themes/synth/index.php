<?php get_header(); ?>

<div id="content">
	<?php while ( have_posts() ) : the_post(); ?>
	
	
	<?php if ( has_post_thumbnail() ) { ?>
    <a href="<?php the_permalink(); ?>">
    <?php the_post_thumbnail( 'medium', array( 'class' => 'left',
            'alt'   => trim( strip_tags( $wp_postmeta->_wp_attachment_image_alt ) )
        ) ); ?>
    </a>
<?php } ?>
	
	
	<?php endwhile; ?>
</div>
<?php get_footer(); ?>