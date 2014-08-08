<?php
	$footer = get_posts(array(
		'name'=>'footer',
		'post_type'=>'page',
		'post_status'=>'publish',
		'posts_per_page'=>1
	));
	
	$footer = $footer[0];	
?>
	<!-- CONTACT US -->
	<?php include('views/contact-us.php');?>
	
		<footer id="footer">
			<div class="container">
				<?php wp_footer(); ?>
				<?php dynamic_sidebar('footer'); ?>
				
				
				<div class="copyright">
					<div class="content">
						<?php the_field('copyright', $footer->ID);?>
					</div>
					<a href="/">
						<synth-logo></synth-logo>
					</a>
				</div>
			</div>
		</footer>
	</body>
</html>