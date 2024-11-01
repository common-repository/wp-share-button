<?php	


/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



if(empty($_POST['wp_share_button_hidden'])){
	
		$wp_share_button_total = get_option( 'wp_share_button_total' );	
		$wp_share_button_sites = get_option( 'wp_share_button_sites' );
		$wp_share_button_theme = get_option( 'wp_share_button_theme' );		
		
		$wp_share_button_more_display = get_option( 'wp_share_button_more_display' );
		
		$wp_share_button_display = get_option( 'wp_share_button_display' );
		$wp_share_button_count_format = get_option( 'wp_share_button_count_format' );						


	}
else{	
		if($_POST['wp_share_button_hidden'] == 'Y') {
			//Form data sent


			$wp_share_button_total = sanitize_text_field($_POST['wp_share_button_total']);
			update_option('wp_share_button_total', $wp_share_button_total);

			$wp_share_button_sites = stripslashes_deep($_POST['wp_share_button_sites']);
			update_option('wp_share_button_sites', $wp_share_button_sites);
			
			$wp_share_button_theme = sanitize_text_field($_POST['wp_share_button_theme']);
			update_option('wp_share_button_theme', $wp_share_button_theme);
			
			$wp_share_button_more_display = sanitize_text_field($_POST['wp_share_button_more_display']);
			update_option('wp_share_button_more_display', $wp_share_button_more_display);
			
			$wp_share_button_display = stripslashes_deep($_POST['wp_share_button_display']);
			update_option('wp_share_button_display', $wp_share_button_display);			
							
			$wp_share_button_count_format = sanitize_text_field($_POST['wp_share_button_count_format']);
			update_option('wp_share_button_count_format', $wp_share_button_count_format);			


			?>
			<div class="updated"><p><strong><?php _e('Changes Saved.', 'wp_share_button' ); ?></strong></p></div>
	
			<?php
			} 
	}	

	
	
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".wp_share_button_plugin_name.' '.__('Settings', 'wp_share_button')."</h2>";?>
		<form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="wp_share_button_hidden" value="Y">
        <?php settings_fields( 'wp_share_button_plugin_options' );
				do_settings_sections( 'wp_share_button_plugin_options' );

		?>

    
    <div class="para-settings wp-share-button-settings">
    
        <ul class="tab-nav"> 
            <li nav="1" class="nav1 active"><?php _e('Options','wp_share_button'); ?></li>
            <li nav="2" class="nav2"><?php _e('Style','wp_share_button'); ?></li>
            <li nav="3" class="nav3"><?php _e('Display','wp_share_button'); ?></li>                   
            <li nav="4" class="nav4"><?php _e('Shortcode','wp_share_button'); ?></li>
            <li nav="5" class="nav5"><?php _e('Help & Support','wp_share_button'); ?></li>            
                                 
        </ul> <!-- tab-nav end --> 
		<ul class="box">
       		<li style="display: block;" class="box1 tab-box active">
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Total max button display','wp_share_button'); ?></p>
                    <p class="option-info"></p> 
                    
                    <input size="15" type="text" name="wp_share_button_total" value="<?php if(!empty($wp_share_button_total)) echo $wp_share_button_total; else echo 4; ?>" />
				</div>          
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Display more buttons','wp_share_button'); ?></p>
                    <p class="option-info"></p> 
                    <select name="wp_share_button_more_display" >
                    <option <?php if($wp_share_button_more_display=='yes') echo 'selected'; ?> value="yes" >Yes</option>
                    <option <?php if($wp_share_button_more_display=='no') echo 'selected'; ?> value="no" >No</option>
                    </select>

				</div>            
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Count format','wp_share_button'); ?></p>
                    <p class="option-info"><?php _e('Full format will display whole number(4000) and short format will display as 4k (i.e 4000).','wp_share_button'); ?></p> 
                    <select name="wp_share_button_count_format" >
                    <option <?php if($wp_share_button_count_format=='full') echo 'selected'; ?> value="full" >Full</option>
                    <option <?php if($wp_share_button_count_format=='short') echo 'selected'; ?> value="short" >Short</option>
                    </select>

				</div>             
            
            
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Sharing sites','wp_share_button'); ?></p>
                    <p class="option-info"><?php _e('you can pass values for url and title dynamically using following string on share url, <ul><li>{title} = Post Title </li><li>{url} = Post url</li> </ul>','wp_share_button'); ?></p> 
                    
                    
                    <table class="widefat " id="wp_share_button_sites">
                        <thead>
                        	<tr>
                            	<th><?php _e('Sort','wp_share_button'); ?></th><th><?php _e('Site name','wp_share_button'); ?></th><th><?php _e('ID','wp_share_button'); ?></th><th><?php _e('Share URL','wp_share_button'); ?></th><th title="Font Awesome Icon ID"><?php _e('FA Icon','wp_share_button'); ?></th><th><?php _e('Visiblity','wp_share_button'); ?></th><th><?php _e('Remove','wp_share_button'); ?></th>
                       		</tr>  
						</thead>
                    <?php 
        
                    
                    if(empty($wp_share_button_sites)){
							
							$class_wp_share_button_functions = new class_wp_share_button_functions();
							
							$wp_share_button_sites = $class_wp_share_button_functions->wp_share_button_sites();

                           // $wp_share_button_sites = $wp_share_button_sites_defaults;
                        }
        
                    foreach ($wp_share_button_sites as $site_key=>$site_info) {
                        if(!empty($site_key))
                            {
                                ?>
                            <tr><td class="sorting"></td>
                            <td>
                            <input name="wp_share_button_sites[<?php echo $site_key; ?>][title]" type="text" value="<?php if(isset($wp_share_button_sites[$site_key]['title'])) echo $wp_share_button_sites[$site_key]['title']; ?>" />
                            </td>                 
                            
                            <td>
                            <input name="wp_share_button_sites[<?php echo $site_key; ?>][id]" type="text" value="<?php if(isset($wp_share_button_sites[$site_key]['id'])) echo $wp_share_button_sites[$site_key]['id']; ?>" />
                            </td>
                            
                            <td>
                            <input name="wp_share_button_sites[<?php echo $site_key; ?>][share_url]" type="text" value="<?php if(isset($wp_share_button_sites[$site_key]['share_url'])) echo $wp_share_button_sites[$site_key]['share_url']; ?>" />
                            </td>                            
                            
                             
                            
                            
                            <td>
                            <input name="wp_share_button_sites[<?php echo $site_key; ?>][icon]" type="text" value="<?php if(isset($wp_share_button_sites[$site_key]['icon'])) echo $wp_share_button_sites[$site_key]['icon']; ?>" />
                            </td>
                   
                            <td>
                            
                            <?php
                            if(!empty($wp_share_button_sites[$site_key]['visible'])){
								
								$checked = 'checked';
								}
							else{
								$checked = '';
								}
							
							?>
                            
                            
                            <input <?php echo $checked; ?> name="wp_share_button_sites[<?php echo $site_key; ?>][visible]" type="checkbox" value="yes" />
                            </td>                   
                   
                   
                            <td>
                            
                            <?php
                            if($site_info['can_remove']=='yes'){
                            ?>
                            
                            <span class="remove">X</span>
        
                            <?php
                            }
                            else{
                                echo '<span class="no-remove" title="Can\'t remove.">...</span>';
                                
                                }
                            
                            ?>
                            
                            <input name="wp_share_button_sites[<?php echo $site_key; ?>][can_remove]" type="hidden" value="<?php echo $site_info['can_remove']; ?>" />
                            
                            
                            </td>
                            
                            
                            </tr>
                                <?php
                                
                                
                            
                            }
                    }
                    
                    ?>
        
                            
                	</table> 
                    <br/>
                    <div class="button add-site" ><?php _e('Add more','wp_share_button'); ?></div>
                    
            	</div>
			</li>
            <li style="display: none;" class="box2 tab-box">
                <div class="option-box">
                    <p class="option-title"><?php _e('Themes.','wp_share_button'); ?></p>
                    <p class="option-info"></p> 
                    
                    <?php
                    
					$class_wp_share_button_functions = new class_wp_share_button_functions();
					$wp_share_button_themes = $class_wp_share_button_functions->wp_share_button_themes();







					foreach($wp_share_button_themes as $theme_key=>$theme_name){
						
						if($wp_share_button_theme == $theme_key){
							$checked = 'checked';
							}
						else{
							$checked = '';
							}
						
						
						?>
                        <label>
                        
                        <input <?php echo $checked; ?> type="radio" name="wp_share_button_theme" value="<?php echo $theme_key; ?>" />
                        <img src="<?php echo wp_share_button_plugin_url.'includes/menu/images/'.$theme_key.'.png'; ?>" />
                        </label><br/>
                        <?php
						
						
						
						}
					
					
					
					
					?>
                    

                    
                    
            	</div>
                
                
            </li>
            <li style="display: none;" class="box3 tab-box">
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Display on these automatically','wp_share_button'); ?></p>
                    <p class="option-info"></p> 
                    
                    <?php
                  // var_dump($wp_share_button_display);
					?>
                    <table class="widefat " id="wp_share_button_display">
                    <thead>
                    <tr>
                    	<th><?php _e('Display on','wp_share_button'); ?></th>
                        <th><?php _e('Position','wp_share_button'); ?></th>
                        <th><?php _e('Postypes','wp_share_button'); ?></th>
                        <th><?php _e('Page type','wp_share_button'); ?></th>
                        <th><?php _e('Remove','wp_share_button'); ?></th>                                             
                                               
                    </tr>
                    </thead>
                    
                    <?php
                    
					if(empty($wp_share_button_display)){
						
					$wp_share_button_display = array(
													'0' => array(	'location'=>'content',
																	'position'=>'after',
																	'posttype'=>'post',																	
																	'page_type'=>'single',
																	),

														);
														
						}

					
					
					
					
					foreach($wp_share_button_display as $key=>$button_info){
						
						?>
                        <tr>
                            <td>
                            
                            <?php $location = $button_info['location']; ?>
                            
                            <select name="wp_share_button_display[<?php echo $key; ?>][location]" >
                                <option <?php if($location=='none') echo 'selected'; ?> value="none"><?php _e('None','wp_share_button'); ?></option>                           
                                <option <?php if($location=='content') echo 'selected'; ?> value="content"><?php _e('Content','wp_share_button'); ?></option>                           
                            </select>
                            </td>
                            <td>
                            <?php $position= $button_info['position']; ?>
                            <select name="wp_share_button_display[<?php echo $key; ?>][position]" >
                                <option <?php if($position=='none') echo 'selected'; ?> value="none"><?php _e('None','wp_share_button'); ?></option>                            	<option <?php if($position=='before') echo 'selected'; ?> value="before"><?php _e('Before','wp_share_button'); ?></option>
                                <option <?php if($position=='after') echo 'selected'; ?> value="after"><?php _e('After','wp_share_button'); ?></option>                            
                            </select>
                            </td>
                            
                            <td>
                            <?php $posttype = $button_info['posttype']; 
							
							$post_types = get_post_types( '', 'names' );

							?>
                            <select name="wp_share_button_display[<?php echo $key; ?>][posttype]" >
                            <option <?php if($posttype=='none') echo 'selected'; ?> value="none"><?php _e('None','wp_share_button'); ?></option>
                            <?php
                            foreach ( $post_types as $post_key ){
								
								
								?>
                                <option <?php if($posttype==$post_key) echo 'selected'; ?> value="<?php echo $post_key; ?>"><?php echo $post_key; ?></option>
                                <?php
								}

							?>
                            
                            </select>
                            </td>
                            
                                                
                            <td>
                            <?php 

							
							$page_type = $button_info['page_type'];
							 ?>
                            <select name="wp_share_button_display[<?php echo $key; ?>][page_type]" >
                                <option <?php if($page_type=='none') echo 'selected'; ?> value="none"><?php _e('None','wp_share_button'); ?></option>                            
                                <option <?php if($page_type=='single') echo 'selected'; ?> value="single"><?php _e('Single','wp_share_button'); ?></option>
                                <option <?php if($page_type=='archive') echo 'selected'; ?> value="archive"><?php _e('Archive','wp_share_button'); ?></option>
                                <option <?php if($page_type=='home') echo 'selected'; ?> value="home"><?php _e('Home','wp_share_button'); ?></option>                                                  
                            </select>
                            </td>
                            <td>
                            <span class="remove">X</span>
                            </td>                            
                                               
                        </tr>
                        
                        <?php
						
						
						
						}
					
					?>

                    </table>
                    
                    
                    
                    <br/>
                    <div class="button add-display-filter" ><?php _e('Add more','wp_share_button'); ?></div>
                    
				</div>
            
            </li> 
            <li style="display: none;" class="box4 tab-box">
            
            
                <div class="option-box">
                    <p class="option-title"><?php _e('Shortcode','wp_share_button'); ?></p>
                    <p class="option-info"><?php _e('Please use following shortcode inside loop on your theme files','wp_share_button'); ?></p> 
                    <?php echo '&lt;?php echo do_shortcode("[wp_share_button]"); ?>'; ?>
				</div>
                      
            </li>
            
            <li style="display: none;" class="box5 tab-box">
            
            
				<div class="option-box">
                    <p class="option-title"><?php _e('Plugin info ?','wp_share_button'); ?></p>
                    <p class="option-info">
					<?php
                    if(wp_share_button_customer_type=="free")
                        {
							$html = sprintf('You are using %s version %s of %s, To get more feature you could try our premium version.',wp_share_button_customer_type,wp_share_button_plugin_version, wp_share_button_plugin_name);
							
							_e($html,'wp_share_button');
							echo '<br />';
							$html = sprintf('<a href="%s">%s</a>',wp_share_button_plugin_name,wp_share_button_pro_url);							
							_e($html,'wp_share_button');
                            
                        }
                    else
                        {
							$html = sprintf('Thanks for using <strong> premium version %s of %s ',wp_share_button_plugin_version,wp_share_button_plugin_name);							
							_e($html,'wp_share_button');	
							
                        }

					?>       

                    
                    </p>

                </div>
                
                
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Need Help ?','wp_share_button'); ?></p>
                    <p class="option-info"><?php _e('Feel free to contact with any issue for this plugin, Ask any question via forum %s ','wp_share_button'); 
					
					echo sprintf('Feel free to contact with any issue for this plugin, Ask any question via forum <a href="%s">%s</a> (free)',wp_share_button_qa_url, wp_share_button_qa_url);
					echo '<br />';
					echo sprintf('please read documentation here <a href="%s">%s</a>',wp_share_button_tutorial_doc_url,wp_share_button_tutorial_doc_url);
					
					?>
                    </p>

                </div>
                
				<div class="option-box">
                    <p class="option-title"><?php _e('Options','wp_share_button'); ?>Submit Reviews...</p>
                    <p class="option-info"><?php _e('Options','wp_share_button'); ?>
                    <?php
                    _e('We are working hard to build some awesome plugins for you and spend thousand hour for plugins. we wish your three(3) minute by submitting five star reviews at wordpress.org. if you have any issue please submit at forum.','wp_share_button');
					
					?>
                    
                    </p>
                	<img src="<?php echo wp_share_button_plugin_url."css/five-star.png";?>" /><br />
                    <a target="_blank" href="<?php echo wp_share_button_wp_reviews; ?>">
                		<?php echo wp_share_button_wp_reviews; ?>
               		</a>

                </div>

				<div class="option-box">
                    <p class="option-title"><?php _e('Video Tutorial','wp_share_button'); ?></p>
                    <p class="option-info"><?php _e('Please watch this video tutorial.','wp_share_button'); ?></p>
                	<iframe width="640" height="480" src="<?php echo wp_share_button_tutorial_video_url; ?>" frameborder="0" allowfullscreen></iframe>
                </div>
     
            </li>            
            
            
            
            
                     
		</ul>
        
        
 <script>
 jQuery(document).ready(function($)
	{
		$(function() {
			$( "#wp_share_button_sites tbody" ).sortable();
			//$( ".items" ).disableSelection();
			});
		
		})

</script>


<p class="submit">
                    <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes','wp_share_button' ); ?>" />
                </p>
		</form>


</div>
