<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access

	$html_popup_buttons = '';
	$html_button = '';
	$html_more_button = '';	
	
	$post_id = get_the_ID();
	
	$wp_share_button_sites = get_option('wp_share_button_sites');
	$wp_share_button_total = get_option('wp_share_button_total');
	$wp_share_button_more_display = get_option('wp_share_button_more_display');	
		
	$share_count = get_post_meta(get_the_ID(),'wp_share_button_share_count', false);

	$vars = array(
	  '{url}' => get_permalink(),
	  '{title}'=> get_the_title(),		  				  
	  
	);

	$html.= '<div id="wp-share-button-'.$post_id.'" class="wp-share-button '.$themes.'">';
	
	$html.= apply_filters('wp_share_button_filter_buttons_before','');


	$i=0;
	foreach($wp_share_button_sites as $site_key=>$site_info ){
		
		$url = strtr($site_info['share_url'], $vars);
		
		$site_id = $site_info['id'];
		
		
		if(isset($share_count[0][$site_id])){
			
				$share_count_value = $share_count[0][$site_id];
			}
		else{
			
				$share_count_value =0;
			}
		
		if(isset($site_info['visible'])){
			
			if($i<$wp_share_button_total){
			
				include wp_share_button_plugin_dir.'/templates/buttons.php';

				
				}
			else{
					include wp_share_button_plugin_dir.'/templates/popup-buttons.php';

					
				}
				
			$i++;
			
			}
		}
		

		if(($wp_share_button_more_display=='yes') && ($wp_share_button_total < ($i))){
			
			//include wp_share_button_plugin_dir.'/templates/more.php';
			
			$html_more_button.= '<a title="More..." href="#wp-share-button-'.$post_id.'" post-id="'.get_the_ID().'" class="share-button-more" >';
			$html_more_button.= '<span class="button-icon"><i class="fa fa-plus"></i></span>';
			$html_more_button.= '</a>';
			

			}

	$html.= $html_button;
	$html.= $html_more_button;	
	$html.= '<div class="wp-share-button-popup wp-share-button-popup-'.get_the_ID().'"><div class="popup-buttons"><span class="close">X</span>'.$html_popup_buttons.'</div></div>';	

	$html.= '</div>';