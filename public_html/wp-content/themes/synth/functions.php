<?php 
	function synth_setup() {
		//Enables featured image
		add_theme_support('post-thumbnails');
		
		//Registers Nav
		register_nav_menu('top', 'Nav');
		register_nav_menu('top-right', 'Social');
	}
	add_action('after_setup_theme', 'synth_setup');
	
	function synth_widgets() {
		//Register Widget locations
		register_sidebar(
			array(
				'name' => 'Footer',
				'id' => 'footer',
				'before_widget' => '',
				'after_widget' => '',
				'before_title' => '',
				'after_title' => '',
			)
		);
	}
	add_action('widgets_init', 'synth_widgets');
	
	function synth_scripts() {
		wp_enqueue_style('main', '/assets/css/main.css');
		wp_enqueue_script('main', '/assets/js/main.js', array(), '', true);
	}
	
	function synth_editor_buttons($buttons) {
		array_unshift($buttons, 'styleselect');
		return $buttons;
	}
	
	function synth_mce_before_init($settings) {
		$directives = array(
			array(
				'title'=>'Article Overlay',
				'classes'=>'article-overlay',
				'block'=>'blockquote',
				'wrapper'=>true
			)
		);
		
		$settings['style_formats'] = json_encode($directives);
		return $settings;
	}
	

	// remove junk from head
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
	
	
	add_action('wp_enqueue_scripts', 'synth_scripts');
	
	add_filter('show_admin_bar', '__return_false');
	add_filter('mce_buttons_2', 'synth_editor_buttons');
	add_filter('tiny_mce_before_init', 'synth_mce_before_init');

?>