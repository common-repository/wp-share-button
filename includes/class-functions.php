<?php

/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_wp_share_button_functions{
	


	public function wp_share_button_sites($sites = array()){
		
			$sites = array(
			
							'email'=>array('id'=>'email','title'=>'Email','icon'=>'envelope','can_remove'=>'yes','visible'=>'yes','share_url'=>'mailto:?subject={title}&body={url}'),
									
							'facebook'=>array('id'=>'facebook','title'=>'Facebook','icon'=>'facebook','can_remove'=>'yes','visible'=>'yes','share_url'=>'https://www.facebook.com/sharer/sharer.php?u={url}'),
							
							'twitter'=>array('id'=>'twitter','title'=>'Twitter','icon'=>'twitter','can_remove'=>'yes','visible'=>'yes','share_url'=>'https://twitter.com/intent/tweet?url={url}&text={title}'),
							
							'google-plus'=>array('id'=>'google-plus','title'=>'Google plus','icon'=>'google-plus','can_remove'=>'yes','visible'=>'yes','share_url'=>'https://plus.google.com/share?url={url}'),
							
							'reddit'=>array('id'=>'reddit','title'=>'Reddit','icon'=>'reddit','can_remove'=>'yes','visible'=>'yes','share_url'=>'http://www.reddit.com/submit?title={title}&url={url}'),												

							'linkedin'=>array('id'=>'linkedin','title'=>'Linkedin','icon'=>'linkedin','can_remove'=>'yes','visible'=>'yes','share_url'=>'https://www.linkedin.com/shareArticle?url={url}&title={title}&summary=&source='),

							'delicious'=>array('id'=>'delicious','title'=>'Delicious','icon'=>'delicious','can_remove'=>'yes','visible'=>'yes','share_url'=>'https://delicious.com/post?url={url}&title={title}&notes='),

							'stumbleupon'=>array('id'=>'stumbleupon','title'=>'Stumbleupon','icon'=>'stumbleupon','can_remove'=>'yes','visible'=>'yes','share_url'=>'http://www.stumbleupon.com/submit?url={url}&title={title}'),
							);
		
			return $sites;
		
		
		}






	public function wp_share_button_themes($themes = array()){

			$themes = array(
							'theme1'=>'Theme 1',	
							'theme2'=>'Theme 2',													
							'theme3'=>'Theme 3',	
							'theme4'=>'Theme 4',							
							'theme5'=>'Theme 5',
							'theme6'=>'Theme 6',	
							'theme7'=>'Theme 7',
							'theme8'=>'Theme 8',							
							'theme9'=>'Theme 9',
							'theme10'=>'Theme 10',							
							'theme11'=>'Theme 11',								
							'theme12'=>'Theme 12',								
							'theme13'=>'Theme 13',
							'theme14'=>'Theme 14',							
							'theme15'=>'Theme 15',
							'theme16'=>'Theme 16',
							'theme17'=>'Theme 17',
							'theme18'=>'Theme 18',							
							'theme19'=>'Theme 19',
							'theme20'=>'Theme 20',
							'theme21'=>'Theme 21',
							'theme22'=>'Theme 22',
							'theme23'=>'Theme 23',
							//'theme24'=>'Theme 24',							
							//'theme25'=>'Theme 25',
							'theme26'=>'Theme 26',	
							'theme27'=>'Theme 27',
							'theme28'=>'Theme 28',
							'theme29'=>'Theme 29',							
							'theme30'=>'Theme 30',
							'theme31'=>'Theme 31',	
							'theme32'=>'Theme 32',	
							'theme33'=>'Theme 33',	
							'theme34'=>'Theme 34',	
							'theme35'=>'Theme 35',	
							'theme36'=>'Theme 36',	
							//'theme37'=>'Theme 37',	
							'theme38'=>'Theme 38',	

						);
			
			foreach(apply_filters( 'wp_share_button_themes', $themes ) as $theme_key=> $theme_name)
				{
					$theme_list[$theme_key] = $theme_name;
				}

			return $theme_list;

		}
	
		
	public function wp_share_button_themes_dir($themes_dir = array()){
		
			$main_url = wp_share_button_plugin_dir.'themes/';
			
			$themes_dir = array(
							'theme1'=>$main_url.'theme1',							
							'theme2'=>$main_url.'theme2',							
							'theme3'=>$main_url.'theme3',							
							'theme4'=>$main_url.'theme4',	
							'theme5'=>$main_url.'theme5',								
							'theme6'=>$main_url.'theme6',
							'theme7'=>$main_url.'theme7',
							'theme8'=>$main_url.'theme8',													
							'theme9'=>$main_url.'theme9',
							'theme10'=>$main_url.'theme10',							
							'theme11'=>$main_url.'theme11',
							'theme12'=>$main_url.'theme12',														
							'theme13'=>$main_url.'theme13',
							'theme14'=>$main_url.'theme14',							
							'theme15'=>$main_url.'theme15',	
							'theme16'=>$main_url.'theme16',							
							'theme17'=>$main_url.'theme17',
							'theme18'=>$main_url.'theme18',														
							'theme19'=>$main_url.'theme19',
							'theme20'=>$main_url.'theme20',
							'theme21'=>$main_url.'theme21',							
							'theme22'=>$main_url.'theme22',							
							'theme23'=>$main_url.'theme23',							
							'theme24'=>$main_url.'theme24',	
							'theme25'=>$main_url.'theme25',								
							'theme26'=>$main_url.'theme26',
							'theme27'=>$main_url.'theme27',
							'theme28'=>$main_url.'theme28',													
							'theme29'=>$main_url.'theme29',
							'theme30'=>$main_url.'theme30',							
							'theme31'=>$main_url.'theme31',
							'theme32'=>$main_url.'theme32',														
							'theme33'=>$main_url.'theme33',
							'theme34'=>$main_url.'theme34',							
							'theme35'=>$main_url.'theme35',	
							'theme36'=>$main_url.'theme36',							
							'theme37'=>$main_url.'theme37',
							'theme38'=>$main_url.'theme38',														
							'theme39'=>$main_url.'theme39',
							'theme40'=>$main_url.'theme40',	
							'theme41'=>$main_url.'theme41',							
							'theme42'=>$main_url.'theme42',							
							'theme43'=>$main_url.'theme43',							
							'theme44'=>$main_url.'theme44',	
							'theme45'=>$main_url.'theme45',								
							'theme46'=>$main_url.'theme46',
							'theme47'=>$main_url.'theme47',
							'theme48'=>$main_url.'theme48',													
							'theme49'=>$main_url.'theme49',	
							'theme50'=>$main_url.'theme50',	
																																
							);
			
			foreach(apply_filters( 'wp_share_button_themes_dir', $themes_dir ) as $theme_key=> $theme_dir)
				{
					$theme_list_dir[$theme_key] = $theme_dir;
				}

			
			return $theme_list_dir;

		}


	public function wp_share_button_themes_url($themes_url = array()){
		
			$main_url = wp_share_button_plugin_url.'themes/';
			
			$themes_url = array(
							'theme1'=>$main_url.'theme1',
							'theme2'=>$main_url.'theme2',							
							'theme3'=>$main_url.'theme3',							
							'theme4'=>$main_url.'theme4',														
							'theme5'=>$main_url.'theme5',	
							'theme6'=>$main_url.'theme6',
							'theme7'=>$main_url.'theme7',							
							'theme8'=>$main_url.'theme8',								
							'theme9'=>$main_url.'theme9',
							'theme10'=>$main_url.'theme10',
							'theme11'=>$main_url.'theme11',	
							'theme12'=>$main_url.'theme12',																				
							'theme13'=>$main_url.'theme13',
							'theme14'=>$main_url.'theme14',							
							'theme15'=>$main_url.'theme15',	
							'theme16'=>$main_url.'theme16',	
							'theme17'=>$main_url.'theme17',																				
							'theme18'=>$main_url.'theme18',
							'theme19'=>$main_url.'theme19',							
							'theme20'=>$main_url.'theme20',
							'theme21'=>$main_url.'theme21',							
							'theme22'=>$main_url.'theme22',							
							'theme23'=>$main_url.'theme23',							
							'theme24'=>$main_url.'theme24',	
							'theme25'=>$main_url.'theme25',								
							'theme26'=>$main_url.'theme26',
							'theme27'=>$main_url.'theme27',
							'theme28'=>$main_url.'theme28',													
							'theme29'=>$main_url.'theme29',
							'theme30'=>$main_url.'theme30',							
							'theme31'=>$main_url.'theme31',
							'theme32'=>$main_url.'theme32',														
							'theme33'=>$main_url.'theme33',
							'theme34'=>$main_url.'theme34',							
							'theme35'=>$main_url.'theme35',	
							'theme36'=>$main_url.'theme36',							
							'theme37'=>$main_url.'theme37',
							'theme38'=>$main_url.'theme38',														
							'theme39'=>$main_url.'theme39',
							'theme40'=>$main_url.'theme40',	
							'theme41'=>$main_url.'theme41',							
							'theme42'=>$main_url.'theme42',							
							'theme43'=>$main_url.'theme43',							
							'theme44'=>$main_url.'theme44',	
							'theme45'=>$main_url.'theme45',								
							'theme46'=>$main_url.'theme46',
							'theme47'=>$main_url.'theme47',
							'theme48'=>$main_url.'theme48',													
							'theme49'=>$main_url.'theme49',	
							'theme50'=>$main_url.'theme50',								
																									
							);
			
			foreach(apply_filters( 'wp_share_button_themes_url', $themes_url ) as $theme_key=> $theme_url)
				{
					$theme_list_url[$theme_key] = $theme_url;
				}

			return $theme_list_url;

		}


		
		
		
		
		
		
		
		
		
		
	
	public function wp_share_button_share_plugin()
		{
			
			?>
<iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwordpress.org%2Fplugins%2Fresumes-builder%2F&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80&amp;appId=652982311485932" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>
            
            <br />
            <!-- Place this tag in your head or just before your close body tag. -->
            <script src="https://apis.google.com/js/platform.js" async defer></script>
            
            <!-- Place this tag where you want the +1 button to render. -->
            <div class="g-plusone" data-size="medium" data-annotation="inline" data-width="300" data-href="<?php echo wp_share_button_share_url; ?>"></div>
            
            <br />
            <br />
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo wp_share_button_share_url; ?>" data-text="<?php echo wp_share_button_plugin_name; ?>" data-via="ParaTheme" data-hashtags="WordPress">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>



            <?php

		}

		
		
	
	}
	
	new class_wp_share_button_functions();