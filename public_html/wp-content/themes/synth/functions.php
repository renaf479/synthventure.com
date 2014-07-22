<?php 
	function synth_setup() {
		//Enables featured image
		add_theme_support('post-thumbnails');
		
		//Registers Nav
		register_nav_menu('top', 'Nav');
	}
	
	add_action('after_setup_theme', 'synth_setup');
	
	function synth_widgets() {
		//Register Widget locations
	}
	add_action('widgets_init', 'synth_widgets');
	
	function synth_scripts() {
		wp_enqueue_style('main', get_template_directory_uri().'/css/main.css');
		wp_enqueue_script('main', get_template_directory_uri().'/js/main.js');
		
		/*
  // register AngularJS
  //wp_register_script('angular-core', get_bloginfo('template_directory').'/js/angular.js', array(), null, false);

  // register our app.js, which has a dependency on angular-core
  wp_register_script('angular-app', get_bloginfo('template_directory').'/js/main.js');

  // enqueue all scripts
  //wp_enqueue_script('angular-core');
  wp_enqueue_script('angular-app');

  // we need to create a JavaScript variable to store our API endpoint...   
  wp_localize_script( 'angular-core', 'AppAPI', array( 'url' => get_bloginfo('wpurl').'/api/') ); // this is the API address of the JSON API plugin
  // ... and useful information such as the theme directory and website url
  wp_localize_script( 'angular-core', 'BlogInfo', array( 'url' => get_bloginfo('template_directory').'/', 'site' => get_bloginfo('wpurl')) );
  
  
  */
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
	


add_action('wp_enqueue_scripts', 'synth_scripts');

add_filter('show_admin_bar', '__return_false');
add_filter('mce_buttons_2', 'synth_editor_buttons');
add_filter('tiny_mce_before_init', 'synth_mce_before_init');

?>