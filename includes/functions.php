<?php
/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/
if ( ! defined('ABSPATH')) exit;  // if direct access 
	
	

	
	
	function wp_share_button_open_graph(){
		
		$data = '';
		
		if(is_singular()){
			
			$data.= '<meta property="og:title" content="'.get_the_title(get_the_ID()).'" />';
			$data.= '<meta property="og:url" content="'.get_permalink(get_the_ID()).'" />';
			
			if(has_post_thumbnail()){
				
				$team_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );
				$team_thumb_url = $team_thumb['0'];
				
				$data.= '<meta property="og:image" content="'.$team_thumb_url.'" />';
	
				}
								
			
			}
		

		
		echo $data;
		
		
		}
	add_action('wp_head','wp_share_button_open_graph');

	
	function wp_share_button_filter_the_content($content){
		$html = '';
		$wp_share_button = do_shortcode('[wp_share_button]');
		
		$wp_share_button_display = get_option('wp_share_button_display');
		
		$posttype = get_post_type( get_the_ID() );
		
		if( is_archive() ) $page_type = 'archive';
		elseif( is_singular() ) $page_type = 'single';
		elseif( is_home() ) $page_type = 'home';
		else $page_type = 'none';
		
		$count = 0;
		foreach($wp_share_button_display as $key=>$button_info)
		{
			if ( $page_type == $button_info['page_type'] )
			{	
				if ( $posttype == $button_info['posttype']  )
				{
					$check = $posttype.'_'.$count;

					if( $button_info['position'] == 'before') $html .= $wp_share_button;
					if ( $check == $button_info['posttype'].'_0' ) $html .= $content;
					if( $button_info['position'] == 'after' ) $html .= $wp_share_button;
	
					$count++;
				}
				//else return $content;
			}
			
		}
		if ( empty($html) ) return $content;
		else return $html;
	}
	add_filter('the_content','wp_share_button_filter_the_content');
	


	
	
	
	
	
function wp_share_button_ajax_update_count()
	{	
		$current_site_id = sanitize_text_field($_POST['site_id']);
		$post_id = (int)$_POST['post_id'];
		
		$wp_share_button_sites = get_option( 'wp_share_button_sites' );
		$share_count = get_post_meta( $post_id, 'wp_share_button_share_count', true );


		do_action('wp_share_button_update_count', $post_id, $current_site_id);

		foreach($wp_share_button_sites as $site_key=>$site_info){
				$site_id = $site_info['id'];
				if($current_site_id == $site_id){
						$wp_share_button_share_count[$site_id] = (int)$share_count[$site_id]+1;

					}
				else{
						$wp_share_button_share_count[$site_id] = (int)$share_count[$site_id];
					}
			}
		



		// update count
		update_post_meta( $post_id, 'wp_share_button_share_count', $wp_share_button_share_count );
		
		
		

		
		
		
		
		die();
	}



add_action('wp_ajax_wp_share_button_ajax_update_count', 'wp_share_button_ajax_update_count');
add_action('wp_ajax_nopriv_wp_share_button_ajax_update_count', 'wp_share_button_ajax_update_count');
	

function wp_share_button_add_display_filter()
	{
		$key = $_POST['time'];
		
?>
                        <tr>
                            <td>
                            <select name="wp_share_button_display[<?php echo $key; ?>][location]" >
                                <option value="none">None</option>                           
                                <option value="content">Content</option>                           
                            </select>
                            </td>
                            <td>
                            
                            <select name="wp_share_button_display[<?php echo $key; ?>][position]" >
                                <option value="none">None</option>                            
                                <option value="before">Before</option>
                                <option value="after">After</option>                            
                            </select>
                            </td>
                            
                            <td>
                            <?php 							
							$post_types = get_post_types( '', 'names' );

							?>
                            <select name="wp_share_button_display[<?php echo $key; ?>][posttype]" >
                            <option value="none">None</option>
                            <?php
                            foreach ( $post_types as $post_key ){
								
								
								?>
                                <option value="<?php echo $post_key; ?>"><?php echo $post_key; ?></option>
                                <?php
								}

							?>
                            
                            </select>
                            </td>
                            
                                                
                            <td>
                            <select name="wp_share_button_display[<?php echo $key; ?>][page_type]" >
                                <option value="none">None</option>                            
                                <option value="single">Single</option>
                                <option value="archive">Archive</option>
                                <option value="home">Home</option>                                                  
                            </select>
                            </td>
                            <td>
                            <span class="remove">X</span>
                            </td> 
                            
                                                
                        </tr>

<?php



		
		die();
		
		
		
		}
add_action('wp_ajax_wp_share_button_add_display_filter', 'wp_share_button_add_display_filter');
add_action('wp_ajax_nopriv_wp_share_button_add_display_filter', 'wp_share_button_add_display_filter');
	

function wp_share_button_add_site(){
	
		$site_name = $_POST['site_name'];

		?>
                            <tr><td class="sorting"></td>
                            <td>
                            <input name="wp_share_button_sites[<?php echo $site_name; ?>][title]" type="text" value="<?php echo ucfirst($site_name); ?>" />
                            </td>                 
                            
                            <td>
                            <input name="wp_share_button_sites[<?php echo $site_name; ?>][id]" type="text" value="<?php echo $site_name; ?>" />
                            </td>
                            
                            <td>
                            <input name="wp_share_button_sites[<?php echo $site_name; ?>][share_url]" type="text" value="#" />
                            </td>                            

                            <td>
                            <input name="wp_share_button_sites[<?php echo $site_name; ?>][icon]" type="text" value="<?php echo $site_name; ?>" />
                            </td>
                   
                            <td>
                            <input checked name="wp_share_button_sites[<?php echo $site_name; ?>][visible]" type="checkbox" value="yes" />
                            </td>                   
                   
                   
                            <td>
                            <span class="remove">X</span>
                            <input name="wp_share_button_sites[<?php echo $site_name; ?>][can_remove]" type="hidden" value="yes" />
                            </td>
                            
                            
                            </tr>
        
        <?php
		
		die();
		
	}
		
add_action('wp_ajax_wp_share_button_add_site', 'wp_share_button_add_site');
add_action('wp_ajax_nopriv_wp_share_button_add_site', 'wp_share_button_add_site');
		
		