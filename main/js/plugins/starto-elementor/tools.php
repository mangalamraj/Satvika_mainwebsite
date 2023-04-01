<?php
if(!function_exists('starto_get_course_price_html') && function_exists('learn_press_get_course'))
{	
	function starto_get_course_price_html($course_id = '')
	{
		$price_html = '';
		if(!empty($course_id))
		{
			$course = learn_press_get_course($course_id);
			$price_html = $course->get_price_html();
		}
		
		return $price_html;
	}
}

if(!function_exists('starto_highlight_keyword'))
{
	function starto_highlight_keyword($str, $search) {
	    $occurrences = substr_count(strtolower($str), strtolower($search));
	    $newstring = $str;
	    $match = array();
	 
	    for ($i=0;$i<$occurrences;$i++) {
	        $match[$i] = stripos($str, $search, $i);
	        $match[$i] = substr($str, $match[$i], strlen($search));
	        $newstring = str_replace($match[$i], '[#]'.$match[$i].'[@]', strip_tags($newstring));
	    }
	 
	    $newstring = str_replace('[#]', '<strong>', $newstring);
	    $newstring = str_replace('[@]', '</strong>', $newstring);
	    return $newstring;
	}
}
	
if(!function_exists('starto_sanitize_title'))
{
	function starto_sanitize_title($title = '')
	{
		if(!empty($title))
		{
			$title = str_replace(' ', '-', $title);
			$title = preg_replace('/[^A-Za-z0-9]/', '-', $title);
			$title = strtolower($title);
			return $title;
		}
	}
}
	
if(!function_exists('starto_get_lazy_img_attr'))
{
	function starto_get_lazy_img_attr()
	{
		$tg_enable_lazy_loading = get_theme_mod('tg_enable_lazy_loading');
		$return_attr = array('class' => '','source' => 'src');
		
		if(!empty($tg_enable_lazy_loading))
		{
			$return_attr = array('class' => 'lazy','source' => 'data-src');
		}
		
		return $return_attr;
	}
}
	
if(!function_exists('starto_get_blank_img_attr'))
{
	function starto_get_blank_img_attr()
	{
		$tg_enable_lazy_loading = get_theme_mod('tg_enable_lazy_loading');
		$return_attr = '';
		
		if(!empty($tg_enable_lazy_loading))
		{
			$return_attr = 'src=""';
		}
		
		return $return_attr;
	}
}

if(!function_exists('starto_get_post_format_icon'))
{
	function starto_get_post_format_icon($post_id = '')
	{
		$return_html = '';
		
		if(!empty($post_id))
		{
			$post_format = get_post_format($post_id);
			
			if($post_format == 'video')
			{
				$return_html = '<div class="post-type-icon"><span class="ti-control-play"></span></div>';	
			}
		}
		
		return $return_html;
	}
}

if(!function_exists('starto_limit_get_excerpt'))
{
	function starto_limit_get_excerpt($excerpt = '', $limit = 50, $string = '...')
	{
		$excerpt = preg_replace(" ([.*?])",'',$excerpt);
		$excerpt = strip_shortcodes($excerpt);
		$excerpt = strip_tags($excerpt);
		$excerpt = substr($excerpt, 0, $limit);
		$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
		$excerpt = $excerpt.$string;
		
		return '<p>'.$excerpt.'</p>';
	}
}

if(!function_exists('starto_get_image_id'))
{
	function starto_get_image_id($url) 
	{
		$attachment_id = attachment_url_to_postid($url);
		
		if(!empty($attachment_id))
		{
			return $attachment_id;
		}
		else
		{
			return $url;
		}
	}
}

function starto_get_instagram_response_without_token_from_json( $user ) {

    $user = trim( $user );
    $url  = 'https://instagram.com/' .$user.'/?__a=1';

    $request = wp_remote_get( $url );

    if (is_wp_error($request) || 200 != wp_remote_retrieve_response_code($request)) {
        return new WP_Error('instagram error', $request);
    }

    $result = json_decode( wp_remote_retrieve_body( $request ) );

    if ( empty( $result ) ) {
        return new WP_Error('instagram error', 'empty result');
    }

    return $result;
}

function starto_get_instagram_response_without_token( $user ) {
	
	$user = trim( $user );
    $url  = 'https://instagram.com/' .$user;

    $request = wp_remote_get( $url );

    if (is_wp_error($request) || 200 != wp_remote_retrieve_response_code($request)) {
        return new WP_Error('instagram error', $request);
    }
    
	$body = wp_remote_retrieve_body( $request );

    $doc = new DOMDocument();

    @$doc->loadHTML( $body );

    $script_tags = $doc->getElementsByTagName( 'script' );

    $json = '';

    foreach ( $script_tags as $script_tag ) {
        if ( strpos( $script_tag->nodeValue, 'window._sharedData = ' ) !== false ) {
            $json = $script_tag->nodeValue;
            break;
        }
    }

    $json   = str_replace( array( 'window._sharedData = ', '};' ), array( '', '}' ), $json );
    $result = json_decode( $json );

    if ( empty( $result ) ) {
        return new WP_Error('instagram error', 'empty result');
    }

    return $result;
}

function starto_get_instagram($username, $access_token, $items = 8)
{   
	$wp_filesystem = starto_get_wp_filesystem();
	
	$photos_arr = array();

    if(!empty($username))
    {
	    $instagram_cache_path = STARTO_UPLOAD.'/instagram_'.$username.'_'.$items.'.cache';
	    
		if(file_exists($instagram_cache_path))
		{
		    $instagram_cache_timer = intval((time()-filemtime($instagram_cache_path))/60);
		}
		else
		{
		    $instagram_cache_timer = 0;
		}
		
		$photos_arr = array();
		
		//Check if already update Instagram cache to new API
		$pp_is_update_instagram_starto = get_option('pp_is_update_instagram_starto');
		
		if(!file_exists($instagram_cache_path) OR $instagram_cache_timer > 15 OR empty($pp_is_update_instagram_starto))
		{
			$result = starto_get_instagram_response_without_token_from_json($username);
		    $result_photos = $result->graphql->user->edge_owner_to_timeline_media->edges;
		
			if(is_array($result_photos) && !empty($result_photos))
			{
				foreach ($result_photos as $key => $item)
				{
					$small_thumb_url = $item->node->thumbnail_resources[0]->src;
					$thumb_url = $item->node->thumbnail_resources[3]->src;
					$large_url = $item->node->thumbnail_resources[4]->src;
					
					$photos_arr[] = array(
						'thumb_url' => $thumb_url,
						'url' => $large_url,
						'link' => 'https://instagram.com/p/'.$item->node->shortcode,
					);
					
					if(($key+1) == $items)
					{
						break;
					}
				} 
			}
			
			if(!empty($photos_arr))
			{
				if(file_exists($instagram_cache_path))
				{
				    unlink($instagram_cache_path);
				}
				
				if(starto_connect_fs())
				{
					//Writing cache file
					$result = $wp_filesystem->put_contents(
					  $instagram_cache_path,
					  serialize($photos_arr)
					);
				}
				else
				{
					$result = file_put_contents($instagram_cache_path, serialize($photos_arr));
				}
				
				if(empty($pp_is_update_instagram_starto))
				{
					//updated Instagram cache to new API
					update_option('pp_is_update_instagram_starto', 1);
				}
			}
			else
			{
				if(starto_connect_fs())
				{
					$file = $wp_filesystem->get_contents($instagram_cache_path);
				}
				else
				{
					$file = file_get_contents($instagram_cache_path);
				}
					
				if(!empty($file))
				{
				    $photos_arr = unserialize($file);			
				}
			}
		}
		else
		{
			if(starto_connect_fs())
			{
				$file = $wp_filesystem->get_contents($instagram_cache_path);
			}
			else
			{
				$file = file_get_contents($instagram_cache_path);
			}
		
			if(!empty($file))
			{
			    $photos_arr = unserialize($file);
			}
		}
    } 
    else 
    {
    	echo 'Invalid Instagram username';
    }
    
    return $photos_arr;
}

function starto_connect_fs()
{
  $wp_filesystem = starto_get_wp_filesystem();

  if( false === ($credentials = request_filesystem_credentials('')) ) 
  {
    return false;
  }

  //check if credentials are correct or not.
  if(!WP_Filesystem($credentials)) 
  { 
    request_filesystem_credentials('');
    return false;
  }

  return true;
}

function starto_get_flickr($settings) 
{
	if (!function_exists('MagpieRSS')) {
	    // Check if another plugin is using RSS, may not work
	    require_once ABSPATH . WPINC . '/class-simplepie.php';
	}
	
	if(!isset($settings['items']) || empty($settings['items']))
	{
		$settings['items'] = 9;
	}
	
	// get the feeds
	if ($settings['type'] == "user") { $rss_url = 'https://api.flickr.com/services/feeds/photos_public.gne?id=' . $settings['id'] . '&per_page='.$settings['items'].'&format=rss_200'; }
	elseif ($settings['type'] == "favorite") { $rss_url = 'https://api.flickr.com/services/feeds/photos_faves.gne?id=' . $settings['id'] . '&format=rss_200'; }
	elseif ($settings['type'] == "set") { $rss_url = 'https://api.flickr.com/services/feeds/photoset.gne?set=' . $settings['set'] . '&nsid=' . $settings['id'] . '&format=rss_200'; }
	elseif ($settings['type'] == "group") { $rss_url = 'https://api.flickr.com/services/feeds/groups_pool.gne?id=' . $settings['id'] . '&format=rss_200'; }
	elseif ($settings['type'] == "public" || $settings['type'] == "community") { $rss_url = 'https://api.flickr.com/services/feeds/photos_public.gne?tags=' . $settings['tags'] . '&format=rss_200'; }
	else {
	    print esc_html__('No "type" parameter has been setup. Check your settings, or provide the parameter as an argument.','starto');
	    die();
	}
	
	$flickr_cache_path = STARTO_UPLOAD.'/flickr_'.$settings['id'].'_'.$settings['items'].'.cache';
		
	if(file_exists($flickr_cache_path))
	{
	    $flickr_cache_timer = intval((time()-filemtime($flickr_cache_path))/60);
	}
	else
	{
	    $flickr_cache_timer = 0;
	}
	
	$photos_arr = array();
	
	if(!file_exists($flickr_cache_path) OR $flickr_cache_timer > 15)
	{
		# get rss file
		$feed = new SimplePie();
		$feed->set_feed_url($rss_url);
		$feed->enable_cache(FALSE);
		$feed->init();
		$feed->handle_content_type();
		
		foreach ($feed->get_items() as $key => $item)
		{
			$enclosure = $item->get_enclosure();
			$img = starto_image_from_description($item->get_description()); 
			$thumb_url = starto_select_image($img, 1);
			$large_url = starto_select_image($img, 4);
			
			$photos_arr[] = array(
				'title' => $enclosure->get_title(),
				'thumb_url' => $thumb_url,
				'url' => $large_url,
				'link' => $item->get_link(),
			);
			
			$current = intval($key+1);
			
			if($current == $settings['items'])
			{
				break;
			}
		} 
		
		if(!empty($photos_arr))
		{
			if(file_exists($flickr_cache_path))
			{
			    unlink($flickr_cache_path);
			}
			
			//Writing cache file
			$wp_filesystem = starto_get_wp_filesystem();
			$wp_filesystem->put_contents(
			  $flickr_cache_path,
			  serialize($photos_arr),
			  FS_CHMOD_FILE
			);
		}
	}
	else
	{
		$wp_filesystem = starto_get_wp_filesystem();
		$file = $wp_filesystem->get_contents($flickr_cache_path);
					
		if(!empty($file))
		{
		    $photos_arr = unserialize($file);			
		}
	}

	return $photos_arr;
}
 
function starto_attachment_field_credit ($form_fields, $post) {
	$form_fields['starto-purchase-url'] = array(
		'label' => esc_html__('Purchase URL', 'starto-elementor'),
		'input' => 'text',
		'value' => esc_url(get_post_meta( $post->ID, 'starto_purchase_url', true )),
	);

	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'starto_attachment_field_credit', 10, 2 );

function starto_attachment_field_credit_save ($post, $attachment) {
	if( isset( $attachment['starto-purchase-url'] ) )
update_post_meta( $post['ID'], 'starto_purchase_url', esc_url( $attachment['starto-purchase-url'] ) );

	return $post;
}

add_filter( 'attachment_fields_to_save', 'starto_attachment_field_credit_save', 10, 2 );
?>