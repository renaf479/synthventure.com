
<?php get_header(); ?>

<?php
	if(is_active_sidebar('top')) {
		dynamic_sidebar('homepage-top');
	}
	
	// Run the page loop to output the page content.
   if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>">
 
         <?php if ( ! is_front_page() ) { ?>
            <h2 class="entry-title"></h2>
         <?php } ?>
         <section class="entry-content">
            <?php the_content(); ?>
         </section><!-- .entry-content -->
      </article>
      <!-- #post-## -->
 
   <?php endwhile; ?>

<?php get_footer(); ?>

