<?php
/*
Plugin Name: WP Share Button
Plugin URI: http://pickplugins.com
Description: Awesome Share Button.
Version: 1.0.6
Author: pickplugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class WPShareButton{
	
	public function __construct(){
	
	define('wp_share_button_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('wp_share_button_plugin_dir', plugin_dir_path( __FILE__ ) );
	define('wp_share_button_wp_url', 'https://wordpress.org/plugins/wp-share-button/' );
	define('wp_share_button_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/wp-share-button' );
	define('wp_share_button_pro_url','http://www.pickplugins.com/' );
	define('wp_share_button_demo_url', 'www.pickplugins.com/demo/wp-share-button/' );
	define('wp_share_button_conatct_url', 'http://www.pickplugins.com/contact/' );
	define('wp_share_button_qa_url', 'http://www.pickplugins.com/questions/' );
	define('wp_share_button_plugin_name', 'WP Share Button' );
	define('wp_share_button_plugin_version', '1.0.6' );
	define('wp_share_button_customer_type', 'free' );	 // pro & free	
	define('wp_share_button_share_url', 'https://wordpress.org/plugins/wp-share-button/' );
	define('wp_share_button_tutorial_video_url', '//www.youtube.com/embed/Fm5nL2Qhi4Q' );
	define('wp_share_button_tutorial_doc_url', 'http://www.pickplugins.com' );	

	// Class
	//require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-types.php');	
	// require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-meta.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-shortcodes.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-functions.php');
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-settings.php');


	// Function's
	require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php');

	//add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
	add_action( 'wp_enqueue_scripts', array( $this, 'wp_share_button_front_scripts' ) );
	add_action( 'admin_enqueue_scripts', array( $this, 'wp_share_button_admin_scripts' ) );
	
	add_action( 'plugins_loaded', array( $this, 'wp_share_button_load_textdomain' ));
	
	}
	
	public function wp_share_button_load_textdomain() {
	  load_plugin_textdomain( 'wp_share_button', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' ); 
	}
	
	
	
	
	public function wp_share_button_install(){
		
		do_action( 'wp_share_button_action_install' );
		}		
		
	public function wp_share_button_uninstall(){
		
		do_action( 'wp_share_button_action_uninstall' );
		}		
		
	public function wp_share_button_deactivation(){
		
		do_action( 'wp_share_button_action_deactivation' );
		}
		
	public function wp_share_button_front_scripts(){
		
		wp_enqueue_script('jquery');
		//wp_enqueue_script('jquery-ui-datepicker');
		
		wp_enqueue_script('wp_share_button_front_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script('wp_share_button_front_js', 'wp_share_button_ajax', array( 'wp_share_button_ajaxurl' => admin_url( 'admin-ajax.php')));
		
		
		wp_enqueue_style('wp_share_button_style', wp_share_button_plugin_url.'css/style.css');
		wp_enqueue_style('font-awesome', wp_share_button_plugin_url.'css/font-awesome.css');
		wp_enqueue_style('jquery-ui', wp_share_button_plugin_url.'admin/css/jquery-ui.css');

		}

	public function wp_share_button_admin_scripts(){
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script('wp_share_button_admin_js', plugins_url( '/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		wp_localize_script( 'wp_share_button_admin_js', 'wp_share_button_ajax', array( 'wp_share_button_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('wp_share_button_admin_style', wp_share_button_plugin_url.'admin/css/style.css');
		wp_enqueue_style('jquery-ui', wp_share_button_plugin_url.'admin/css/jquery-ui.css');
		
		//ParaAdmin
		wp_enqueue_style('ParaAdmin', wp_share_button_plugin_url.'ParaAdmin/css/ParaAdmin.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp_share_button_color_picker', plugins_url('/admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		
		}
	
	
	
	
	}

new WPShareButton();