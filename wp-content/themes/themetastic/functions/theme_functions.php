<?php

/* ------------------------------------- */
/* WOOCOMMERCE */
/* ------------------------------------- */

add_theme_support( 'woocommerce' );

//NUMBER OF PRODICTS TO DISPLAY ON SHOP PAGE
if(function_exists('is_shop')){ $shop_id = get_option('woocommerce_shop_page_id');
$woo_item = get_post_meta($shop_id, "themetastic_shop_item_page_woo",true);
add_filter('loop_shop_per_page', create_function('$cols', "return $woo_item;"));
}

/* ------------------------------------- */
/* MAIN MENU REGISTRATION */
/* ------------------------------------- */

register_nav_menu( 'navigation', 'Main Menu Navigation' );

// Add Styles for Standard Menu
function add_menuclass($divclass) {
	return preg_replace('/<div class="menu">/', '<div  id="mainmenu" class="menu ddsmoothmenu">', $divclass, 1);
}
add_filter('wp_page_menu','add_menuclass');

/* ------------------------------------- */
/* CUSTOM EXCERPT WORD LENGTH */
/* ------------------------------------- */

function excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);

	return $excerpt;
}

function excerpt_by_id($limit,$post_id) {
	global $post;  
	$save_post = $post;
	$post = get_post($post_id);
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	} 
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	$post = $save_post;
	return $excerpt;
}

/* ------------------------------------- */
/* Get Special Categories */
/* ------------------------------------- */

function getCategories($id){
	$categories = get_the_category($id);
	$output = '';
	if($categories){
		foreach($categories as $category) {
			$output .= '<div class="blogcategory"><a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s",'themetastic' ), $category->name ) ) . '">'.$category->cat_name.'</a></div>';
		}
	return $output;
	}
}

/* ------------------------------------- */
/* FUNCTION TO RETRIEVE POST AND PAGE OPTIONS 
	http://www.wprecipes.com/wordpress-tip-get-all-custom-fields-from-a-page-or-a-post */
/* ------------------------------------- */

function getOptions($id = 0){
    if ($id == 0) :
        global $wp_query;
        $content_array = $wp_query->get_queried_object();
		if(isset($content_array->ID)){
        	$id = $content_array->ID;
		}
    endif;   

    $first_array = get_post_custom_keys($id);

	if(isset($first_array)){
		foreach ($first_array as $key => $value) :
			   $second_array[$value] =  get_post_meta($id, $value, FALSE);
				foreach($second_array as $second_key => $second_value) :
						   $result[$second_key] = $second_value[0];
				endforeach;
		 endforeach;
	 }
	
	if(isset($result)){
    	return $result;
	}
}

/* ------------------------------------- */
/* FUNCTION TO RETRIEVE THEME OPTIONS	 */
/* ------------------------------------- */
	function getThemeOptions(){
		//return array_merge(get_option("tb_metpo_theme_general_options"),get_option("tb_metpo_theme_header_options"),get_option("tb_metpo_theme_body_options"));
		return array_merge(get_option("themetastic_theme_header_options"),get_option("themetastic_theme_footer_options"),get_option("themetastic_theme_layout_options"),get_option("themetastic_theme_favicons_options"),
							get_option("themetastic_theme_color_options"),get_option("themetastic_theme_font_options"),get_option("themetastic_theme_background_options"),get_option("themetastic_theme_search_options"),get_option("themetastic_theme_portfoliodef_options"),get_option("themetastic_theme_blog_options"));
	}


/* ------------------------------------- */
/* ID BY SLUG FUNCTION */
/* ------------------------------------- */

function idbyslug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
};


$content_width = 940; 

/* ------------------------------------- */
/* ADD FIRST AND LAST CSS CLASS TO WIDGETS
   by MathSmath http://wordpress.org/support/topic/how-to-first-and-last-css-classes-for-sidebar-widgets*/
/* ------------------------------------- */

function widget_first_last_classes($params) {
	global $my_widget_num; // Global a counter array
	$this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
	$arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets	

	if(!$my_widget_num) {// If the counter array doesn't exist, create it
		$my_widget_num = array();
	}

	if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
		return $params; // No widgets in this sidebar... bail early.
	}

	if(isset($my_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
		$my_widget_num[$this_id] ++;
	} else { // If not, create it starting with 1
		$my_widget_num[$this_id] = 1;
	}

	$class = 'class="widget-' . $my_widget_num[$this_id] . ' '; // Add a widget number class for additional styling options

	if($my_widget_num[$this_id] == 1 ) { // If this is the first widget
		$class .= ' first ';
	} elseif($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { // If this is the last widget
		$class .= ' last ';
	}

	$params[0]['before_widget'] = str_replace('class="', $class, $params[0]['before_widget']); // Insert our new classes into "before widget"

	return $params;
}
add_filter('dynamic_sidebar_params','widget_first_last_classes');


/* ------------------------------------- */
/* Special Comment Reply Link
/* ------------------------------------- */
function special_comment_reply_link($args = array(), $comment = null, $post = null) {
	        global $user_ID;
	
	        $defaults = array('add_below' => 'comment', 'respond_id' => 'respond', 'reply_text' => __('Reply','themetastic'),
	                'login_text' => __('Log in to Reply','themetastic'), 'depth' => 0, 'before' => '', 'after' => '');
	
	        $args = wp_parse_args($args, $defaults);
	
	        if ( 0 == $args['depth'] || $args['max_depth'] <= $args['depth'] )
	                return;
	
	        extract($args, EXTR_SKIP);
	
	        $comment = get_comment($comment);
	        if ( empty($post) )
	                $post = $comment->comment_post_ID;
	        $post = get_post($post);
	
	        if ( !comments_open($post->ID) )
	                return false;
	
	        $link = '';
	
	        if ( get_option('comment_registration') && !$user_ID )
	                $link = '<a rel="nofollow" class="comment-reply-login tpbutton buttondark leftfloat" href="' . esc_url( wp_login_url( get_permalink() ) ) . '">' . $login_text . '</a>';
	        else
	                $link = "<a class='comment-reply-link tpbutton buttondark leftfloat' href='" . esc_url( add_query_arg( 'replytocom', $comment->comment_ID ) ) . "#" . $respond_id . "' onclick='return addComment.moveForm(\"$add_below-$comment->comment_ID\", \"$comment->comment_ID\", \"$respond_id\", \"$post->ID\")'> - $reply_text</a>";
	        return apply_filters('comment_reply_link', $before . $link . $after, $args, $comment, $post);
	}


/**
* Title		: Aqua Resizer
* Description	: Resizes WordPress images on the fly
* Version	: 1.1.4
* Author	: Syamil MJ
* Author URI	: http://aquagraphite.com
* License	: WTFPL - http://sam.zoy.org/wtfpl/
* Documentation	: https://github.com/sy4mil/Aqua-Resizer/
*
* @param string $url - (required) must be uploaded using wp media uploader
* @param int $width - (required)
* @param int $height - (optional)
* @param bool $crop - (optional) default to soft crop
* @param bool $single - (optional) returns an array if false
* @uses wp_upload_dir()
*
* @return str|array
*/

function aq_resize( $url, $width, $height = null, $crop = null, $single = true, $retina = false ) {

 //validate inputs
 if(!$url OR !$width ) return false;

 //define upload path & dir
 $upload_info = wp_upload_dir();
 $upload_dir = $upload_info['basedir'];
 $upload_url = $upload_info['baseurl'];

 //check if $img_url is local
 if(strpos( $url, $upload_url ) === false) return false;

 //define path of image
 $rel_path = str_replace( $upload_url, '', $url);
 $img_path = $upload_dir . $rel_path;

 //check if img path exists, and is an image indeed
 if( !file_exists($img_path) OR !getimagesize($img_path) ) return false;

 //get image info
 $info = pathinfo($img_path);
 $ext = $info['extension'];
 list($orig_w,$orig_h) = getimagesize($img_path);

 //get image size after cropping
 $dims = image_resize_dimensions($orig_w, $orig_h, $width, $height, $crop);
 $dst_w = $dims[4];
 $dst_h = $dims[5];

 //use this to check if cropped image already exists, so we can return that instead
 $suffix = "{$dst_w}x{$dst_h}";
 $dst_rel_path = str_replace( '.'.$ext, '', $rel_path);
 $destfilename = "{$upload_dir}{$dst_rel_path}-{$suffix}.{$ext}";

 //Retina Image
 if($retina){
  if(!$dst_h) {
   //can't resize, so return original url
   $img_url = $url;
   $dst_w = $orig_w;
   $dst_h = $orig_h;
  }
  //else check if cache exists
  elseif(file_exists(str_replace(".".$ext,"@2x.".$ext,$destfilename)) && getimagesize(str_replace(".".$ext,"@2x.".$ext,$destfilename))) {
   $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}@2x.{$ext}";
  } 
  //else, we resize the image and return the new resized image url
  else {
   if(function_exists('wp_get_image_editor')) {
    $editor = wp_get_image_editor($img_path);
    if ( is_wp_error( $editor ) || is_wp_error( $editor->resize( $width*2, $height*2, $crop ) ) )
     return false;
 
    $resized_img_path = $editor->save();
 
   } else {
    	//$resized_img_path = image_resize( $img_path, $width*2, $height*2, $crop ); // Fallback foo
    	return false;
   }
 
   if(!is_wp_error($resized_img_path)) {
    rename($resized_img_path["path"], str_replace(".".$ext,"@2x.".$ext,$destfilename));
   } else {
    return false;
   }
 
  }
 }
 

 if(!$dst_h) {
  //can't resize, so return original url
  $img_url = $url;
  $dst_w = $orig_w;
  $dst_h = $orig_h;
 }
 //else check if cache exists
 elseif(file_exists($destfilename) && getimagesize($destfilename)) {
  $img_url = "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}";
 } 
 //else, we resize the image and return the new resized image url
 else {
  if(function_exists('wp_get_image_editor')) {
   $editor = wp_get_image_editor($img_path);

   if ( is_wp_error( $editor ) || is_wp_error( $editor->resize( $width, $height, $crop ) ) )
    return false;

   $resized_img_path = $editor->save();

  } else {
   //$resized_img_path = image_resize( $img_path, $width, $height, $crop ); // Fallback foo
   return false;
  }

  if(!is_wp_error($resized_img_path)) {
   $resized_rel_path = str_replace( $upload_dir, '', $resized_img_path);
   $img_url = $upload_url . $resized_rel_path;
  } else {
   return false;
  }

 }

 //return the output
 if($single) {
  //str return
  $image = $img_url;
 } else {
  //array return
  $image = array (
   0 => $img_url,
   1 => $dst_w,
   2 => $dst_h
  );
 }


$image = $suffix == "x" ? "{$upload_url}{$dst_rel_path}.{$ext}" : "{$upload_url}{$dst_rel_path}-{$suffix}.{$ext}"; 

 return $image;
}

/* ------------------------------------- */
/* Color Hex to RGB
/* ------------------------------------- */
function HexToRGB($hex) {
		$hex = ereg_replace("#", "", $hex);
		$color = array();
 
		if(strlen($hex) == 3) {
			$color['r'] = hexdec(substr($hex, 0, 1) . $r);
			$color['g'] = hexdec(substr($hex, 1, 1) . $g);
			$color['b'] = hexdec(substr($hex, 2, 1) . $b);
		}
		else if(strlen($hex) == 6) {
			$color['r'] = hexdec(substr($hex, 0, 2));
			$color['g'] = hexdec(substr($hex, 2, 2));
			$color['b'] = hexdec(substr($hex, 4, 2));
		}
 
		return $color;
	}
	
/* ------------------------------------- */
/* Fix Shortcodes Columns 
/* ------------------------------------- */

function fix_shortcodes($content){
			$columns = 	array("one_half","one_half_last","one_third","one_third_last","two_third","two_third_last","one_fourth","one_fourth_last","three_fourth","three_fourth_last","one_fifth","one_fifth_last","two_fifth","two_fifth_last","three_fifth","three_fith_last","four_fifth","four_fifth_last","one_sixth","one_sixth_last","five_sixth","five_sixth_last","service_block","themetastic_headline","vc_tabs","vc_tab","vc_accordion","vc_accordion_item","highlightbox","clients_list","checklist","progressbar","team","lightbox");
	        $block = join("|",$columns);

			// opening tag
			$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
			
			// closing tag
			$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)/","[/$2]",$rep);
			
			return $rep;
	}
add_filter('the_content', 'fix_shortcodes');
	

/* ------------------------------------- */
/* Allow Contact Form 7 Forms to include shortcodes
/* ------------------------------------- */

	add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' );	
	function mycustom_wpcf7_form_elements( $form ) {
		$form = parse_shortcode_content( $form );
		$array = array (
	                '<p>[' => '[',
	                ']</p>' => ']',
	                ']<br />' => ']'
	        );
	
	    $form = strtr($form, $array);
		$form = do_shortcode( $form );
		return $form;
	}

/* ------------------------------------- */
/* Parse Uneended Half Open Tags
/* ------------------------------------- */	
	
	function parse_shortcode_content( $content ) { 
	 	/* Remove '</p> or <br>' from the start of the string. */ 
	    if ( substr( $content, 0, 6 ) == '<br />' ) 
	        $content = substr( $content, 6 ); 
	    
	    if ( substr( $content, 0, 4 ) == '</p>' ) 
	        $content = substr( $content, 4 ); 
	 
	    /* Remove '<p> or <br>' from the end of the string. */ 
	    if ( substr( $content, -3, 3 ) == '<p>' ) 
	        $content = substr( $content, 0, -3 ); 
	    
	     if ( substr( $content, -6, 6 ) == '<br />' ) 
	        $content = substr( $content, 0, -6 ); 
	 
	    return $content; 
	} 	
	
/* ------------------------------------- */
/* Tag Cloud Widget Font Size
/* ------------------------------------- */

function tagcloud_settings($args){
	$args = array('smallest' => 12, 'largest' => 12, 'unit' => 'px');
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'tagcloud_settings' );

/* ------------------------------------- */
/* Add shortcode support to widgets
/* ------------------------------------- */
add_filter('widget_text', 'do_shortcode');


add_action( 'pre_get_posts',  'set_posts_per_page'  );
function set_posts_per_page( $query ) {

  global $wp_the_query;
  $archive_options = get_option("themetastic_theme_portfoliodef_options");
  
 $amount = empty($archive_options['themetastic_portfolioarchivenumber']) ? get_option('posts_per_page') : $archive_options['themetastic_portfolioarchivenumber'];

  if ( ( ! is_admin() ) && ( $query === $wp_the_query ) && ( $query->is_archive() && $query->is_tax() ) ) {
    $query->set( 'posts_per_page', $amount );
  }
  // Etc..

  return $query;
}


//Change ReadMore [...]
	function new_excerpt_more( $more ) {
		return " ...";
	}
	add_filter('excerpt_more', 'new_excerpt_more');

//Get RevSlider Property
	function get_revslider_property($slider,$property){
		global $wpdb;
		global $table_prefix;
		$table_prefix = $wpdb->base_prefix;

		if (!isset($wpdb->tablename)) {
			$wpdb->tablename = $table_prefix . 'revslider_sliders';
		}
		$revolution_sliders = $wpdb->get_results(
			"
			SELECT params
			FROM $wpdb->tablename
			WHERE alias='$slider'
			"
		);
		//return $revolution_sliders[0];
		if(!empty($revolution_sliders[0]))
			foreach($revolution_sliders[0] as $key => $value){
				$vowels = array("{", "}", '"');
			 	$sliderparams = str_replace($vowels,"",$value);
			 	$sliderparams_array = split(",", $sliderparams);
			 	foreach($sliderparams_array as $sliderparam){
				 	$sliderparam_array = split(":",$sliderparam);
				 	if(isset($sliderparam_array[0]) && $sliderparam_array[0]==$property){
					 	$return_value = $sliderparam_array[1];
					 	return $return_value;
				 	}
			 	}
			}
		if(!empty($return_value))
			return $return_value;
		else return false;
	}

?>