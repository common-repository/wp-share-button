<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/
if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_wp_share_button_settings  {
	
	
    public function __construct(){

		add_action( 'admin_menu', array( $this, 'admin_menu' ), 12 );
    }
	

	
	
	public function admin_menu() {
		
		add_menu_page('wp_share_button', __('WP Share Button','wp_share_button'), 'manage_options', 'wp_share_button', array( $this, 'settings_page' ));
		
		
		//add_submenu_page( 'edit.php?post_type=job', __( 'Settings', 'wp_share_button' ), __( 'Settings', 'wp_share_button' ), 'manage_options', 'wp_share_button-settings', array( $this, 'settings_page' ) );
	

		do_action( 'wp_share_button_action_admin_menus' );
		
	}
	
	public function settings_page(){
		
		include( 'menu/settings.php' );
		}
	



	}


new class_wp_share_button_settings();

