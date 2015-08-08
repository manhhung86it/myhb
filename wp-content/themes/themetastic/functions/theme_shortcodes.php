<?php

/* ------------------------------------- */
/* SHORTCODES */
/* ------------------------------------- */

// Language Options
		$themetastic_readmore = __('Read More', 'themetastic');
		$themetastic_in = __('in', 'themetastic');
		$themetastic_in = __('by', 'themetastic');
		$themetastic_view = __('View Details','themetastic');
		$themetastic_enlarge = __('Enlarge','themetastic');
		$themetastic_see_all = __('SEE ALL','themetastic');

/* COLUMN 1/2 */

$template_uri_shortcodes = get_template_directory_uri();


/*___________________________________________________________________________________*/
/*	Column Shortcodes
/*___________________________________________________________________________________*/

	if (!function_exists('columns_builder')) {
		function columns_builder( $atts, $content = null, $tag ) {
	        extract( shortcode_atts(  array(
	                // extra classes
	                'class' => ''
	        ), $atts ) );
	        if ( $class != '' )
	                $class = ' ' . $class;
	        $last = '';
	        $clear = '';
	        // check the shortcode tag to add a "last" class
	        if ( strpos( $tag, '_last' ) > 0 ){
	                $last = ' lastcolumn';
	                $clear = '<div class="clear"></div>';
	                $tag = str_replace("_last", "", $tag);
	        }
	        $output = '<div class="' . $tag . $last . $class . '">' . do_shortcode( $content ) . '</div>'.$clear;
	        return $output;
	    }
	}

	$columns = array(
        'one_half',
        'one_half_last',
        'one_third',
        'one_third_last',
        'two_third',
        'two_third_last',
        'one_fourth',
        'one_fourth_last',
        'three_fourth',
        'three_fourth_last',
        'one_fifth',
        'one_fifth_last',
        'two_fifth',
        'two_fifth_last',
        'three_fifth',
        'three_fifth_last',
        'four_fifth',
        'four_fifth_last',
        'one_sixth',
        'one_sixth_last',
        'five_sixth',
        'five_sixth_last',
    );

	foreach( $columns as $tag ) {
	        add_shortcode( $tag, 'columns_builder' );
	}

//PRE
	if (!function_exists('pre')) {
		function pre( $atts, $content = null ) {
			$content = parse_shortcode_content( $content );
		   return '<pre>' . str_replace("<br />","",$content) . '</pre><div class="clear"></div>';
		}
		add_shortcode('pre', 'pre');
	}

//DROPCAP
	if (!function_exists('dropcap')) {
		function dropcap( $atts, $content = null ) {
			extract(shortcode_atts(array(
				'style' => '',
				'color' => ''
			), $atts));
			$content = parse_shortcode_content( $content );
			if($style == 'square') $style = "minirounding nomarginbottom";
		   return '<p class="dropcap '.$style.' '.$color.'">' . do_shortcode($content) . '</p><div class="clear"></div>';
		}
		add_shortcode('dropcap', 'dropcap');
	}

//LISTS
	if (!function_exists('styledlist')) {
		function styledlist( $atts, $content = null ) {
			extract(shortcode_atts(array(
				'style' => '1',
				'color' => ''
			), $atts));
			$content = parse_shortcode_content( $content );
		   return '<div class="style'.$style.' '.$color.'">' . do_shortcode($content) . '</div><div class="clear"></div>';
		}
		add_shortcode('styledlist', 'styledlist');
	}


/* Video */
function video_builder( $atts ) {
	extract(shortcode_atts(array(
		'source' => '',
		'video_id' => '',
		'height' => '',
		'width' => ''
	), $atts));
	$main_color = str_replace("#","",get_option("themetastic_highlight_color"));
   $return_list = '<div class="scalevid">';
   if($source=="youtube")
   		$return_list .= '<iframe src="http://www.youtube.com/embed/'.$video_id.'?hd=1&amp;wmode=opaque&amp;controls=1&amp;showinfo=0&amp;autohide=1" width="'.$width.'" height="'.$height.'"></iframe></div>';
   else
   		$return_list .= '<iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0&amp;autohide=1&amp;color='.$main_color.'" width="'.$width.'" height="'.$height.'"></iframe></div>';

   		return $return_list;
}
add_shortcode('video', 'video_builder');

/* YOUTUBE VIDEO */

function vid_youtube( $atts ) {
	extract(shortcode_atts(array(
		'video_id' => '',
		'height' => '',
		'width' => ''
	), $atts));
   return '<div class="scalevid"><iframe src="http://www.youtube.com/embed/'.$video_id.'?hd=1&amp;wmode=opaque&amp;controls=1&amp;showinfo=0&amp;autohide=1" width="'.$width.'" height="'.$height.'"></iframe></div>';
}
add_shortcode('video_youtube', 'vid_youtube');

/* VIMEO VIDEO */

function vid_vimeo( $atts ) {
	extract(shortcode_atts(array(
		'video_id' => '',
		'height' => '',
		'width' => ''
	), $atts));
	$main_color = str_replace("#","",get_option("themetastic_highlight_color"));
   return '<div class="scalevid"><iframe src="http://player.vimeo.com/video/'.$video_id.'?title=0&amp;byline=0&amp;portrait=0&amp;autohide=1&amp;color='.$main_color.'" width="'.$width.'" height="'.$height.'"></iframe></div>';
}
add_shortcode('video_vimeo', 'vid_vimeo');


// Spacer
	function spacer_build( $atts ) {
	extract(shortcode_atts(array(
		'height' => '',
		'hidemobile' => '',
		'visiblemobile' => ''
	), $atts));
	$hidemobile = (!empty($hidemobile) && $hidemobile == "on") ? "hidden-phone" : "";
	$visiblemobile = (!empty($visiblemobile) && $visiblemobile == "on") ? "visible-phone" : "";
	
   return '<div class="'.$hidemobile.' '.$visiblemobile.'" style="display:block;clear:both;height:'.$height.'px"></div>';
}
add_shortcode('spacer', 'spacer_build');

// Divider
function divider_build($atts) {
   extract(shortcode_atts(array(
		'before' => '',
		'after' => ''
	), $atts));
	if($before=='') $before=0;
	if($after=='') $after=0;
   return '<div class="divider" style="margin-top:'.$before.';margin-bottom:'.$after.'"></div>';
}
add_shortcode('divider', 'divider_build');



// Center Button
	if (!function_exists('centerbutton')) {
		function centerbutton( $atts,$content = null ) {
			return '<div class="button-container">'.do_shortcode($content).'</div>';
		}
		add_shortcode('centerbutton', 'centerbutton');
	}

	function twitter_build( $atts ) {
		extract(shortcode_atts(array(
			'user' => '',
			'count' => ''
		), $atts));

		$uniq = uniqid("ts_");

		$twitter = '<div class="twitter_container_head"></div><div class="twitter_container"><div class="twitter_shortcode" data-user="'.$user.'" data-count="'.$count.'"></div></div><div class="twitter_container_footer"></div>';
	   	return $twitter;
	}
	add_shortcode('twitter', 'twitter_build');


// Quotes
	function blockquote_build( $atts, $content = null ) {
		   extract(shortcode_atts(array(
				'author' => '',
				'float' => '',
				'style' => ''
			), $atts));
			$content = parse_shortcode_content( $content );

		   if($float!="")$float = "quote".$float;
		   if ($author=="")
		   	return '<blockquote class="'.$float.' '.$style.'"><p>' . do_shortcode($content) . '</blockquote><div class="clear"></div>';
		   else
		   	return '<blockquote class="'.$float.' '.$style.'"><p>' . do_shortcode($content) . '<p><cite>'.$author.'</cite></blockquote><div class="clear"></div>';
		}
		add_shortcode('blockquote', 'blockquote_build');

// Lightbox
	function lboximage( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'thumb' => '',
			'thumbwidth' => '',
			'thumbheight' => '',
			'link' => '',
			'lightbox_link' => '',
			'title' => '',
			'hover' => '',
			'align' => ''
		), $atts));
		global $themetastic_enlarge;

		// Load Hover Script (see register_slider_script,print_slider_script)
		global $add_hover_script;
		$add_hover_script = true;

		$float = $align;
		if($thumbheight!="auto" && $thumbheight!=""){
			$thumbheight = "height='$thumbheight'";
		}
		else $thumbheight = "height='auto'";
		if($thumbwidth!="100%" && $thumbwidth!=""){
			$thumbwidth_px = $thumbwidth."px";
		}
		else {
			$thumbwidth_px = "auto";
			$thumbwidth="auto";
		}

		$unique = "";

		 if($lightbox_link != "") $thumb2 = $lightbox_link;
        else $thumb2 = $thumb;

		if($link!="") $notalone = "notalone";
		else $notalone = "";

		if($align=="left" || $align=="") $align = "left mr";
		else $align = "right ml";

		if(is_numeric($thumb)){
			$thumb = wp_get_attachment_image_src($thumb, 'full'); $thumb = $thumb[0];
		}
		
		if(is_numeric($thumb2)){
			$thumb2 = wp_get_attachment_image_src($thumb2, 'full'); $thumb2 = $thumb2[0];
		}


		$return_list = '<div class="'.$align.'" style="width:'.$thumbwidth_px.';">
							<div class="holderwrap">
								<div class="mediaholder">
									<img src="'.$thumb.'" alt="'.$title.'">
									<div class="cover"></div>
									<a href="'.$thumb2.'" rel="group2" data-rel="group2" class="fancybox" title="'.$title.'"><div class="show icon-search '.$notalone.'"></div></a>';
	if($link!=""){ $return_list .=	'<a href="'.$link.'"><div class="link icon-plus notalone"></div></a>';}
				$return_list .= '</div>
								<div class="foliotextholder">
									<div class="foliotextwrapper">
										<h5 class="itemtitle"><a href="'.$link.'">'.$title.'</a></h5>
									</div>
								</div>
							</div>
						</div>
';


		return $return_list;

	}
	add_shortcode('lightbox', 'lboximage');




//Price Table
	function pricetable_build( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'columns' => ''
		), $atts));

		if($columns==5) $colvar = "fivecols";
		if($columns==4) $colvar = "fourcols";
		if($columns==3) $colvar = "threecols";

		$pricetable_column_count=1;

		return '<div class="pricing '.$colvar.'">'.do_shortcode($content).'</div>';
	}
	add_shortcode('pricetable', 'pricetable_build');

	function pricetable_column_build( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'highlight' => '',
			'title' => '',
			'titlesubline' => '',
			'price' => '',
			'price_currency' => '',
			'button_url' => '',
			'button_text' => '',
			'button_type' => ''
		), $atts));

		if($highlight!="normal") {
			$highlight = "highlight";
		} else {
			$highlight = "";
		}

		// Column Head
		$return_list = '<div class="pricecol '.$highlight.'"><div class="pricewrap">
						<div class="thead">'.$title.'<br/><span class="byline">'.$titlesubline.'</span></div>
						<div class="price"><span class="dollar">'.$price_currency.'</span> '.$price.'</div>'.do_shortcode(parse_shortcode_content($content));
		// Button
		if($button_text!=""){
			if($button_type=="primary"){
				$return_list .='<div class="buy"><a href="'.$button_url.'" class="btn btn-info bold">'.$button_text.'</a></div>';
			}
			else {
				$return_list .='<div class="buy"><a href="'.$button_url.'" class="btn bold">'.$button_text.'</a></div>';
			}
		}
		// Footer
		$return_list .='</div></div>';
		return $return_list;
	}
	add_shortcode('pricetable_column', 'pricetable_column_build');

//VC_Pricetables
	if(!function_exists("pricetable_columns_build")){
		function pricetable_columns_build( $atts, $content = null ) {
			$return_list = "";
			for($i = 1 ; $i<7 ; $i++){
				if(isset($atts["title".$i])){
					if(isset($atts["highlight".$i]) && $atts["highlight".$i]!="highlight") {
						$atts["highlight".$i] = "";
					} else {
						$atts["highlight".$i] = "highlight";
					}
			
					//Content
					$content = explode(",", $atts["content".$i]);
					$column_content = "";
					foreach($content as $contentline){
						$contentline = "<div class='item'>" . $contentline . "</div>";
						$column_content .= $contentline;
					}
			
					// Column Head
					$atts["titlesubline".$i] = empty($atts["titlesubline".$i]) ? "" : '<br/><span class="byline">'.$atts["titlesubline".$i].'</span>';
					$return_list .= '<div class="pricecol '.$atts["highlight".$i].'"><div class="pricewrap">
									<div class="thead">'.$atts["title".$i].$atts["titlesubline".$i].'</div>
									<div class="price"><span class="dollar">'.$atts["price_currency".$i].'</span> '.$atts["price".$i].'</div>'.$column_content;
					// Button
					if($atts["button_text".$i]!=""){
						if($atts["button_type".$i]=="primary"){
							$return_list .='<div class="buy"><a href="'.$atts["button_url".$i].'" class="btn btn-primary bold">'.$atts["button_text".$i].'</a></div>';
						}
						else {
							$return_list .='<div class="buy"><a href="'.$atts["button_url".$i].'" class="btn bold">'.$atts["button_text".$i].'</a></div>';
						}
					}
					// Footer
					$return_list .='</div></div>';
				}
				else { $i--;	break; }
			}
		
		switch($i){
			case '5':
				$colvar = "fivecols";
				break;
			case '3':
				$colvar = "threecols";
				break;
			default:
				$colvar = "fourcols";
		}

		return '<div class="pricing '.$colvar.'">'.$return_list.'</div>';		}
		add_shortcode('pricetable_columns', 'pricetable_columns_build');
}
//Services
	$service_column_count=1;
	$service_columns = 3;

	function service_build( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'columns' => ''
		), $atts));

		global $service_column_count;
		global $service_columns;

		if($columns==4) $service_columns = 4;
		if($columns==3) $service_columns = 3;
		if($columns==2) $service_columns = 2;

		$service_column_count=1;

		return '<div class="row services"><div class="servicewrap">'.do_shortcode($content).'</div></div>';
	}
	add_shortcode('service', 'service_build');

	function service_column_build( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'icon_type' => '',
			'title' => '',
			'titlesubline' => '',
			'button_target' => '',
			'button_url' => ''
		), $atts));
		global $service_column_count;
		global $service_columns;

		if($service_columns==4) $service_columns = "span3";
		if($service_columns==3) $service_columns = "span4";
		if($service_columns==2) $service_columns = "span6";

		$service_column_count++;

		// Column Head
		$return_list = '<div class="'.$service_columns.'">
						<a href="'.$button_url.'" target="'.$button_target.'" class="service">';
		if($icon_type!="none"){
		$return_list .='<div class="serviceicon '.$icon_type.'"></div>';
		}
		$return_list .='<h4>'.$title.'</h4>
						<h5>'.$titlesubline.'</h5>
						<div class="text">'.do_shortcode(parse_shortcode_content($content)).'</div>';
		// Footer
		$return_list .='</a></div>';
		return $return_list;
	}
	add_shortcode('service_column', 'service_column_build');






	function tabs_builder( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );

		// Extract the tab titles for use in the tab widget.
		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

		$output = '<div class="bs-docs-example">';

		$uniq = uniqid("tabs_");

		if( count($tab_titles) ){
		   $output .= '<ul id="'.$uniq.'" class="nav nav-tabs">';

			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#tab-'. sanitize_title( $tab[0] ) .'"  data-toggle="tab">' . $tab[0] . '</a></li>';
			}

		    $output .= '</ul><div id="myTabContent" class="tab-content">';
		    $output .= do_shortcode( $content );
		    $output .= '</div></div><script>jQuery("#myTabContent div:first , #'.$uniq.' li:first").addClass("active in");</script>';
		} else {
			$output .= do_shortcode( $content );
		}

		return $output;
	}
	add_shortcode( 'vc_tabs', 'tabs_builder' );
	add_shortcode( 'tabs', 'tabs_builder' );


	function tab_builder( $atts, $content = null ) {
		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );

		return '<div id="tab-'. sanitize_title( $title ) .'" class="tab-pane fade">'. do_shortcode( $content ) .'</div>';
	}
	add_shortcode( 'vc_tab', 'tab_builder' );
	add_shortcode( 'tab', 'tab_builder' );

	$parent_acc = uniqid("_");

	function toggles_builder( $atts, $content = null ) {
		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		global $parent_acc;
		$output = '<div id="accordion'.$parent_acc.'" class="accordion">'.do_shortcode($content).'</div>';

		return $output;
	}
	add_shortcode( 'toggles', 'toggles_builder' );
	

	function toggle_builder( $atts, $content = null ) {
		$defaults = array( 'title' => 'Toggle', 'active' => '' );
		extract( shortcode_atts( $defaults, $atts ) );
		global $parent_acc;
		$unique = uniqid();

		if($active=="active")$active_in="in";
		else $active_in = "";

		$returnlist = '<div class="accordion-group '.$active.'">
			            <div class="accordion-heading">
			                <a class="accordion-toggle" href="#collapse'.$unique.'" data-parent="#accordion'.$parent_acc.'" data-toggle="collapse">'.$title.'</a>
		            </div>

		            <div id="collapse'.$unique.'" class="accordion-body collapse '.$active_in.'">
		                <div class="accordion-inner">'.do_shortcode($content).'</div>
		            </div>
		        </div>';
		 $parent_acc = uniqid("_");
		 return $returnlist;
	}
	add_shortcode( 'toggle', 'toggle_builder' );
	




// Highlight Content
	function highlightcontent_builder( $atts, $content = null ) {
		$return_list = '<div class="highlightbox contenttable">'.parse_shortcode_content(do_shortcode($content)).'</div><div class="clear"></div>';
		return $return_list;
	}
	add_shortcode( 'highlightbox', 'highlightcontent_builder' );

// LATEST POSTS
	function latest_posts_build( $atts, $content = null  ) {
		extract(shortcode_atts(array(
			'number' => 3,
			'category_info' => '',
			'date_info' => 'on',
			'comments_info' => '',
			'category' => '',
			'excerpt_words'=> '20',
		), $atts));

		global $themetastic_readmore;
		global $themetastic_in;
		global $themetastic_see_all;

		// Load Hover Script (see register_slider_script,print_slider_script)
		global $add_hover_script;
		$add_hover_script = true;

		$content = parse_shortcode_content( $content );

		$ptype = 'post';
		$style = "";
		$type="text";
		$order = "latest";

		$category = get_category_by_slug($category);
		if($category) $catid = $category->term_id;
		else $catid="";

		if($order=='latest'){
			$popargs = array( 'numberposts' => $number, 'orderby' => 'post_date', 'cat' => $catid );
		}else{
			$popargs = array( 'numberposts' => $number, 'orderby' => 'comment_count', 'cat' => $catid );
		}

		$unique = uniqid();
		$poplist = get_posts( $popargs );
		$element_count=1;
		$return_list = '<div class="row blogtextwrap">
		<!--
		########################################
			-	BLOG MODULE  -
		########################################
		-->

		<div class="postarea">

			<!-- Blog Posts -->
			<div class="row span homeposts">';
		foreach ($poplist as $poppost) :
				setup_postdata($poppost);
				$postcustoms = getOptions($poppost->ID);

				// Categories
				if($category_info!="off" && $category_info!=""){
					$entrycategory = "";
					foreach((get_the_category($poppost->ID)) as $dcategory) {
						$entrycategory .= ', <a href="'.get_category_link($dcategory->term_id ).'">'.$dcategory->cat_name.'</a>';
					}
					$entrycategory = substr($entrycategory, 2);
					$return_category = '<div class="categories">'.__("in ","themetastic").$entrycategory.'</div>';
				}
				else $return_category = "";

				// Excerpt
				if($excerpt_words != "" && $excerpt_words > 0){
					$postexcerpt = excerpt_by_id($excerpt_words,$poppost->ID);
					$return_excerpt = '<div class="posttext">'.$postexcerpt.'</div>';
				}
				else $return_excerpt = "";

                // Date
                if($date_info!="off" && $date_info!=""){
					$post_time_day = date_i18n('d', strtotime($poppost->post_date_gmt));
					$post_time_month = date_i18n('M', strtotime($poppost->post_date_gmt));
					$post_time_year = date_i18n('Y', strtotime($poppost->post_date_gmt));
					$return_date = '<div class="date">
										<div class="day">'.$post_time_day.'</div>
										<div class="month">'.$post_time_month.'</div>
									</div>';
				}
				else $return_date = "";

                // Comments
                if($comments_info!="off" && $comments_info!=""){
                	$num_comments = get_comments_number($poppost->ID);
					if ( comments_open() ) {
					 if ( $num_comments == 0 ) {
					  $comments = __('No Comments','themetastic');
					 } elseif ( $num_comments > 1 ) {
					  $comments = $num_comments . __(' Comments','themetastic');
					 } else {
					  $comments = __('1 Comment','themetastic');
					 }
					 $return_comments = '<div class="comments"><a href="' . get_comments_link($poppost->ID) .'">'. $comments.'</a></div>';
					} else {
					 $return_comments = '<div class="comments">'.__('Comments are off for this post.','themetastic').'</div>';
					}
                }
                else $return_comments = "";

                // Content
                $return_list .= '<div class="homepost">
									'.$return_date.'
									<div class="post">
										<div class="postbody">
											<h4><a href="'.get_permalink($poppost->ID).'">'.$poppost->post_title.'</a></h4>
											<div class="postinfo">
												'.$return_category.'
												'.$return_comments.'
											</div>
											'.$return_excerpt.'
										</div>
									</div>
								</div>';
					$element_count++;
      endforeach;
      $return_list .= '
				<div class="clear"></div>
		</div><!-- END OF HOMEPOSTS -->
</div> <!-- END OF ROW -->
<div class="clear"></div>
</div> <!-- END OF BLOGTEXTWRAP -->';
      $wp_query = null;
	  //$wp_query = $temp;
	  wp_reset_query();
      return $return_list;
	}
	add_shortcode('latest_posts', 'latest_posts_build');

// LATEST POSTS
	function latest_portfolio_build( $atts, $content = null  ) {
		extract(shortcode_atts(array(
			'items' => 4,
			'columns' => 4,
			'portfolio' => 'portfolio',
			'height' => ''
		), $atts));

		global $themetastic_readmore;
		global $themetastic_in;
		global $themetastic_see_all;

		$number = $items;

		// Load Hover Script (see register_slider_script,print_slider_script)
		global $add_hover_script;
		$add_hover_script = true;

		$content = parse_shortcode_content( $content );


		$ptype = 'portfolio';
		$pcat = 'category_portfolio';
		$style = "";


		global $post;
		
		$pagecustoms = getOptions($post->ID);
		
		if(isset($pagecustoms["themetastic_activate_sidebar"]) && isset($pagecustoms["themetastic_sidebar"])) $class="withsidebar";
		else $class = "";

		/*if($order=='latest'){
			$popargs = array( 'numberposts' => $number, 'orderby' => 'post_date', 'cat' => $catid );
		}else{
			$popargs = array( 'numberposts' => $number, 'orderby' => 'comment_count', 'cat' => $catid );
		}*/

		$popargs=array(
			'post_type' => $portfolio,
			'posts_per_page' => $number
		);

		switch($columns){
		case "5":
			$display_span = "fivecol";
		break;
		case "3":
			$display_span = "threecol";
		break;
		default:
			$display_span = "fourcol";
		break;
	}



		$unique = uniqid();
		$poplist = get_posts( $popargs );
		$element_count=1;
		$html ='
    <!-- Portfolio -->
    <div class="row '.$display_span.' portfoliowrap" >
        <!-- Portfolio Items -->
        <div class="portfolio '.$class.'">';
		foreach ($poplist as $poppost) :
				setup_postdata($poppost);
				$postcustoms = getOptions($poppost->ID);

				if(isset($postcustoms["themetastic_post_type"])){
					switch ($postcustoms["themetastic_post_type"]) {
						case 'video':
							if($postcustoms["themetastic_video_type"]=="youtube") $blogimageurl_pp = "http://www.youtube.com/watch?v=".$postcustoms["themetastic_youtube_id"];
							elseif($postcustoms["themetastic_video_type"]=="vimeo") $blogimageurl_pp = "http://vimeo.com/".$postcustoms["themetastic_vimeo_id"];
							else $blogimageurl_pp = wp_get_attachment_url( get_post_thumbnail_id($poppost->ID));
						break;
						default:
							$blogimageurl_pp = wp_get_attachment_url( get_post_thumbnail_id($poppost->ID));
						break;
					}
				}

				//Post Features
				if(isset($postcustoms["themetastic_item_categories"])) $themetastic_item_categories = "Off";
				else $themetastic_item_categories = "On";

				if(isset($postcustoms["themetastic_item_features"])) $themetastic_item_features = $postcustoms['themetastic_item_features'];
				else $themetastic_item_features = "linkzoom";

				$p_linkactive = "Off";
				$p_zoomactive = "Off";
				if($themetastic_item_features=="link" || $themetastic_item_features=="linkzoom"){ $p_linkactive = "On"; }
				if($themetastic_item_features=="zoom" || $themetastic_item_features=="linkzoom"){ $p_zoomactive = "On"; }

				if($themetastic_item_features=="linkzoom"){ $notalonemod = "notalone"; } else { $notalonemod = ""; }

				$blogimageurl = empty($height) ? aq_resize(wp_get_attachment_url( get_post_thumbnail_id($poppost->ID)),400) : aq_resize(wp_get_attachment_url( get_post_thumbnail_id($poppost->ID)),400,$height,true);
				$blogimageurl_pp = wp_get_attachment_url( get_post_thumbnail_id($poppost->ID));
					
				if($blogimageurl==""){
					$blogimageurl = $template_uri.'/img/demo/400x300.jpg';
				}

				$categorylinks = get_the_term_list( $poppost->ID, $pcat, '', ', ', '' );
				$categories = get_the_terms($poppost->ID,$pcat);
				$categorylist="";
				if(is_array($categories)){
					foreach ($categories as $category) {
						$categorylist.= $category->slug." ";
					}
				}

			$html .= '
			<div class="entry '. $categorylist.'">
				<div class="holderwrap">
					<div class="mediaholder">
						<img src="'.$blogimageurl.'" alt="">
						<div class="cover"></div>';
			if($p_linkactive=="On"){  $html .= '<a href="'.get_permalink($poppost->ID).'"><div class="link icon-plus '.$notalonemod.'"></div></a>'; }
			if($p_zoomactive=="On"){  $html .= '<a title="'.get_the_title($poppost->ID).'" href="'.$blogimageurl_pp.'" rel="imagegroup" data-rel="imagegroup" class="fancybox"><div class=" show icon-search '.$notalonemod.'"></div></a>'; }
			$html .= '</div>
					<div class="foliotextholder">
						<div class="foliotextwrapper">
							<h5 class="itemtitle"><a href="'.get_permalink($poppost->ID).'">'.get_the_title($poppost->ID).'</a></h5>';
			if($themetastic_item_categories=="On" && !is_wp_error($categorylinks)){ $html .= '<span class="itemcategories">'.$categorylinks.'</span>'; }
			$html .='			</div>
					</div>
				</div>
			</div>';


      endforeach;
      $html .= '</div>
    </div>';
      $wp_query = null;
	  //$wp_query = $temp;
	  wp_reset_query();
      return $html;
	}
	add_shortcode('latest_projects', 'latest_portfolio_build');

//ICONS
	if (!function_exists('tbicon_build')) {
		function tbicon_build( $atts ) {
				$atts["class"] = empty($atts["class"]) ? "" : $atts["class"];
				$size = empty($atts["size"]) ? "" : 'style="font-size:'.$atts["size"].'"';
			   return '<i class="'.$atts["icon"].' '.$atts["class"].'" '.$size.' ></i>';
		}
		add_shortcode('themetasticicon', 'tbicon_build');
	}	

//Service Block
	if (!function_exists('service_shortcode')) {
			function service_shortcode( $atts,$content = "") {
				extract(shortcode_atts(array(
				'title' => 'Service Title',
				'subtitle' => '',
				'href' => '#',
				'target' => '_self',
				'icon' => 'cloud'
			), $atts));

				$html = '<div class="servicewrap">
							<a href="'.$href.'" target="'.$target.'" class="service"><div class="serviceicon"><div class="icon-'.$icon.'"></div></div><h4>'.$title.'</h4>';

				if(!empty($subtitle)) $html .='<h5>'.$subtitle.'</h5>';
				$html .='			<div class="text">'.parse_shortcode_content(do_shortcode($content)).'</div></a>
						</div>';
				return $html;
			}
			add_shortcode( 'service_block', 'service_shortcode' );
		}

//Headlline
	if (!function_exists('themetastic_headline_shortcode')) {
			function themetastic_headline_shortcode( $atts,$content = "") {
				extract(shortcode_atts(array(
				'title' => '',
				'link' => '',
				'linktext' => '',
				'target' => '_self'
			), $atts));

				if($link != "") $return_button = '<div class="linktext"><a href="'.$link.'" target="'.$target.'">'.$linktext.'</a></div>';
				else $return_button = "";
				$html = ' 
				<div class="row moduletitle" style="clear:both;">
		        	<div class="titletext"><h2>'.$title.'</h2></div>';
		        $html .= $return_button;
		        $html .= '</div>';
				return $html;
			}
			add_shortcode( 'themetastic_headline', 'themetastic_headline_shortcode' );
		}

//Client List
	if (!function_exists('clients_list_shortcode')) {
			function clients_list_shortcode( $atts) {
				extract(shortcode_atts(array(
				'images' => '',
				'tooltips' => '',
				'links' => '',
				'custom_links_target' => '_self'
			), $atts));
				
				$images_arr = explode(",", $images);
				$tooltips_arr = explode(",", $tooltips);
				$links_arr = explode(",", $links);
				
				$html = '<div class="row clients"><ul class="clients">';
				$client_count=0;
				foreach($images_arr as $image_id){
					$link = "#";
					$tooltip = "";
					$image = wp_get_attachment_image_src($image_id, 'full'); $image = $image[0];
					if(isset($tooltips_arr[$client_count]))
						$tooltip = $tooltips_arr[$client_count];
					if(isset($links_arr[$client_count]))
						$link = $links_arr[$client_count];
					$client_count++;
					$html .= '<li><a href="'.$link.'" data-rel="tooltip" title="'.$tooltip.'" target="'.$custom_links_target.'"><div class="client"><img src="'.$image.'" alt="'.$tooltip.'"/></div></a></li>';
				}
				$html .= '</ul></div>';
				return $html;
				
			}
			add_shortcode( 'clients_list', 'clients_list_shortcode' );
		}

//Check List
	if (!function_exists('checklist_shortcode')) {
			function checklist_shortcode( $atts,$content="") {
				$content = str_replace("<ul>", "<ul class=\"liststyle\">", $content);
				$content = str_replace("<li>", "<li class=\"icon-ok\">", $content);
				return do_shortcode(parse_shortcode_content($content));
				
			}
			add_shortcode( 'checklist', 'checklist_shortcode' );
		}

//Progressbar
	if (!function_exists('progressbar_shortcode')) {
		function progressbar_shortcode( $atts,$content="") {
			extract(shortcode_atts(array(
				'title' => '',
				'percent' => '0',
				'style' => 'info'
			), $atts));
			$html = '<div class="progress progress-'.$style.'">
						<div class="bar" style="width: '.$percent.'%;">'.$title.'</div>
						<div class="tag">'.$percent.'%</div>
					</div>';			
			return $html;
			
		}
		add_shortcode( 'progressbar', 'progressbar_shortcode' );
	}

//Team
if (!function_exists('team_shortcode')) {
		function team_shortcode( $atts) {
			$html ='<div class="team">';
			for($i = 1 ; $i<5 ; $i++){
				if(isset($atts["name_".$i])){
					if(isset($atts["link_".$i])){
						$link_open = '<a href="'.$atts["link_".$i].'">';
						$link_close = '</a>';
					}
					else{
						$link_open = $link_close = "";
					}
					
					$image = wp_get_attachment_image_src($atts["image_id_".$i], 'full'); $image = $image[0];
					$html .= '<div class="memberwrap">
									<div class="member">
									<p>'.$link_open.'<img src="'.$image.'" alt="">'.$link_close.'</p>
									<h4>'.$link_open.$atts["name_".$i].$link_close.'</h4>
									<h5>'.$atts["position_".$i].'</h5>
									<p>'.do_shortcode($atts["content_".$i]).'</p>
									<ul class="teamsocial">';
					if(!empty($atts["mail_".$i]))				
						$html .= '	<li><a href="mailto:'.$atts["mail_".$i].'" target="_blank" class="so_mail" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="'.$atts["mail_".$i].'">
									<div class="s_icon icon-mail"></div>
									</a><p><a href="mailto:'.$atts["mail_".$i].'" target="_blank" class="so_mail" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="'.$atts["mail_".$i].'"></a></p></li>';
					if(!empty($atts["phone_".$i]))				
						$html .= '	<li><a href="callto:'.$atts["phone_".$i].'" target="_blank" class="so_phone" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="'.$atts["phone_".$i].'">				
									<div class="s_icon icon-phone"></div>
									</a><p><a href="callto:'.$atts["phone_".$i].'" target="_blank" class="so_phone" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="'.$atts["phone_".$i].'"></a></p></li>';
					if(!empty($atts["facebook_".$i]))				
						$html .= '	<li><a href="'.$atts["facebook_".$i].'" target="_blank" class="so_fb" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="Facebook">
									<div class="s_icon social-facebook"></div>
									</a><p><a href="'.$atts["facebook_".$i].'" target="_blank" class="so_fb" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="Facebook"></a></p></li>';
					if(!empty($atts["twitter_".$i]))								
						$html .= '	<li><a href="'.$atts["twitter_".$i].'" target="_blank" class="so_tw" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="Twitter">
									<div class="s_icon social-twitter"></div>
									</a><p><a href="'.$atts["twitter_".$i].'" target="_blank" class="so_tw" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="Twitter"></a></p></li>';
					if(!empty($atts["gplus_".$i]))								
						$html .= '	<li><a href="'.$atts["gplus_".$i].'" target="_blank" class="so_gp" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="Google Plus">
									<div class="s_icon social-gplus"></div>
									</a><p><a href="'.$atts["gplus_".$i].'" target="_blank" class="so_gp" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="Google Plus"></a></p></li>';
					if(!empty($atts["linkedin_".$i]))								
						$html .= '	<li><a href="'.$atts["linkedin_".$i].'" target="_blank" class="so_li" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="LinkedIn">
									<div class="s_icon social-linkedin"></div>
									</a><p><a href="'.$atts["linkedin_".$i].'" target="_blank" class="so_li" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="LinkedIn"></a></p></li>';
				}
				$html .= '</ul><div class="clear"></div></div></div>';					
		}			
		return $html."</div>";
			
		}
		add_shortcode( 'team', 'team_shortcode' );
	}

if (!function_exists('team_member_shortcode')) {
		function team_member_shortcode( $atts) {
			$html ='<div class="team solo">';
			if(isset($atts["name"])){
					if(isset($atts["link"])){
						$link_open = '<a href="'.$atts["link"].'">';
						$link_close = '</a>';
					}
					else{
						$link_open = $link_close = "";
					}
					
					$image = wp_get_attachment_image_src($atts["image_id"], 'full'); $image = $image[0];
					$html .= '<div class="memberwrap">
									<div class="member">
									<p>'.$link_open.'<img src="'.$image.'" alt="">'.$link_close.'</p>
									<h4>'.$link_open.$atts["name"].$link_close.'</h4>
									<h5>'.$atts["position"].'</h5>
									<p>'.do_shortcode($atts["content"]).'</p>
									<ul class="teamsocial">';
					if(!empty($atts["mail"]))				
						$html .= '	<li><a href="mailto:'.$atts["mail"].'" target="_blank" class="so_mail" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="'.$atts["mail"].'">
									<div class="s_icon icon-mail"></div>
									</a><p><a href="mailto:'.$atts["mail"].'" target="_blank" class="so_mail" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="'.$atts["mail"].'"></a></p></li>';
					if(!empty($atts["phone"]))				
						$html .= '	<li><a href="callto:'.$atts["phone"].'" target="_blank" class="so_phone" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="'.$atts["phone"].'">				
									<div class="s_icon icon-phone"></div>
									</a><p><a href="callto:'.$atts["phone"].'" target="_blank" class="so_phone" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="'.$atts["phone"].'"></a></p></li>';
					if(!empty($atts["facebook"]))				
						$html .= '	<li><a href="'.$atts["facebook"].'" target="_blank" class="so_fb" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="Facebook">
									<div class="s_icon social-facebook"></div>
									</a><p><a href="'.$atts["facebook"].'" target="_blank" class="so_fb" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="Facebook"></a></p></li>';
					if(!empty($atts["twitter"]))								
						$html .= '	<li><a href="'.$atts["twitter"].'" target="_blank" class="so_tw" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="Twitter">
									<div class="s_icon social-twitter"></div>
									</a><p><a href="'.$atts["twitter"].'" target="_blank" class="so_tw" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="Twitter"></a></p></li>';
					if(!empty($atts["gplus"]))								
						$html .= '	<li><a href="'.$atts["gplus"].'" target="_blank" class="so_gp" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="Google Plus">
									<div class="s_icon social-gplus"></div>
									</a><p><a href="'.$atts["gplus"].'" target="_blank" class="so_gp" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="Google Plus"></a></p></li>';
					if(!empty($atts["linkedin"]))								
						$html .= '	<li><a href="'.$atts["linkedin"].'" target="_blank" class="so_li" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="LinkedIn">
									<div class="s_icon social-linkedin"></div>
									</a><p><a href="'.$atts["linkedin"].'" target="_blank" class="so_li" data-rel="tooltip" data-animation="true" data-placement="top" data-original-title="LinkedIn"></a></p></li>';
				}
				$html .= '</ul><div class="clear"></div></div></div>';					
				
		return $html."</div>";
			
		}
		add_shortcode( 'team_member', 'team_member_shortcode' );
	}

if(!function_exists("testimonial_shortcode")){
	function testimonial_shortcode($atts){
		extract(shortcode_atts(array(
				'names' => '',
				'quotes' => '0',
			), $atts));
			$html = '<div class="carousel slide" id="testimonials">
						<div class="carousel-inner">';
			
			$names = trim($names);
			$names = explode(",", $names);
			$names = array_filter($names, 'trim');
			
			$quotes = trim($quotes);
			$quotes = explode(",", $quotes);
			$quotes = array_filter($quotes, 'trim');

			
			$counter = 0;
			foreach($names as $name){
				if($counter == 0) $active = "active";
				else { $active = ""; }
				$html .= '	<div class="'.$active.' item">
								<div class="padded">'.$quotes[$counter++].'<cite>'.$name.'</cite></div>
							</div>';
			}
			$html .= '	</div>
						<a class="carousel-control left" href="#testimonials" data-slide="prev">&lsaquo;</a><a class="carousel-control right" href="#testimonials" data-slide="next">&rsaquo;</a>
					</div>';			
			return $html;
			
		}
		add_shortcode( 'testimonial', 'testimonial_shortcode' );
	}
?>