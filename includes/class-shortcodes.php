<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_wp_share_button_shortcodes{
	
    public function __construct(){
		
		add_shortcode( 'wp_share_button', array( $this, 'wp_share_button_display' ) );
		
		//add_filter('the_content',array( $this, 'wp_share_button_display' ));
   		}
		
		

	public function wp_share_button_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(
					'themes' => 'flat',											
					), $atts);
	
			$html = '';
			
			$wp_share_button_theme = get_option('wp_share_button_theme');
			
			if(empty($wp_share_button_theme)){
				
				$wp_share_button_theme = 'flat';
				}
			
			$themes = $wp_share_button_theme;

			$class_wp_share_button_functions = new class_wp_share_button_functions();
			$wp_share_button_themes_dir = $class_wp_share_button_functions->wp_share_button_themes_dir();
			$wp_share_button_themes_url = $class_wp_share_button_functions->wp_share_button_themes_url();

			echo '<link  type="text/css" media="all" rel="stylesheet"  href="'.$wp_share_button_themes_url[$themes].'/style.css" >';				

			include $wp_share_button_themes_dir[$themes].'/index.php';				

			return $html;
	
	
		}
		
	
			
	}
	
	new class_wp_share_button_shortcodes();