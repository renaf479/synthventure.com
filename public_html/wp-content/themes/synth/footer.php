	<footer id="footer">
		<div class="container">
			<?php wp_footer(); ?>
			
			
			
			<?php if ( is_active_sidebar('footer') ) : ?>
				<?php dynamic_sidebar('footer'); ?>
			<?php endif; ?>
			
			<div class="copyright">&copy; 2013-<?php echo date('Y');?> Synth Venture. All Rights Reserved</div>
		</div>
	</footer>
	</body>
</html>