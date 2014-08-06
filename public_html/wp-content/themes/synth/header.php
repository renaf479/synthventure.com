<!DOCTYPE html>
<html <?php language_attributes(); ?> data-ng-app="synthApp">
    <head>
    	<meta charset="<?php bloginfo( 'charset' ); ?>" />
    	<meta name="viewport" content="width=device-width"/>
        <title>
        	<?php
				global $page, $paged;
				wp_title('|', true, 'right');
				bloginfo( 'name' );
				$site_description = get_bloginfo('description', 'display');
				if($site_description && (is_home() || is_front_page())) echo " | $site_description";
			?>
        </title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?> data-ng-controller="synthCtrl">
    	<nav id="nav" data-ui-scrollfix="+10">
    		<div class="container">
    			<a href="" class="home">
    				<synth-logo></synth-logo>
    			</a>
				<?php 
					wp_nav_menu(array(
						'container'=>false,
						'theme_location' => 'top'
						)
					);
					
					wp_nav_menu(array(
						'container'=>false,
						'theme_location' => 'top-right'
						)
					);
				?>
    		</div>
		</nav>