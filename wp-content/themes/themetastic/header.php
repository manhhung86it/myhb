<?php
	global $wp_query;
    $content_array = $wp_query->get_queried_object();
	if(isset($content_array->ID)){
    	$post_id = $content_array->ID;
	}
	else $post_id=0;

	// WOOcommerce
	//if(function_exists('is_shop') && (is_shop() || is_product() )) $post_id = get_option('woocommerce_shop_page_id');

	if(is_404()) $post_id = get_current_blog_id();


	// Themeoptions
	$themeoptions = getThemeOptions();

	$template_uri = get_template_directory_uri();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" <?php language_attributes();?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes();?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes();?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes();?>> <!--<![endif]-->

<!--
#######################################
	- THE HEAD PART -
######################################
-->
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta http-equiv="Content-Type" content="<?php echo get_bloginfo('html_type'); ?>; charset=<?php echo get_bloginfo('charset'); ?>" />
    <title><?php echo wp_title("",true); ?> <?php if(!is_front_page()) { ?> &raquo; <?php } ?> <?php echo get_bloginfo('name'); ?></title>
    <meta name="robots" content="index, follow" />

    <!-- Options
	================================================== -->
    <?php
		/* Favicons */
		$themetastic_fav16 = $themeoptions['themetastic_favicon16'];
		if($themetastic_fav16==""){$themetastic_fav16 = get_template_directory_uri().'/img/favicon.ico';}
		$themetastic_fav57 = $themeoptions['themetastic_favicon57'];
		if($themetastic_fav57==""){$themetastic_fav57 = get_template_directory_uri().'/img/apple-touch-icon.png';}
		$themetastic_fav72 = $themeoptions['themetastic_favicon72'];
		if($themetastic_fav72==""){$themetastic_fav72 = get_template_directory_uri().'/img/apple-touch-icon-72x72.png';}
		$themetastic_fav114 = $themeoptions['themetastic_favicon114'];
		if($themetastic_fav114==""){$themetastic_fav114 = get_template_directory_uri().'/img/apple-touch-icon-114x114.png';}
	?>

    <?php if (isset($themeoptions["themetastic_responsive"])){ ?>
    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
     <?php } ?>

	<!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="<?php echo $themetastic_fav16 ?>">
	<link rel="apple-touch-icon" href="<?php echo $themetastic_fav57 ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $themetastic_fav72 ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $themetastic_fav114 ?>">

    <?php
		/* Theme Layout */
		$themetastic_themelayout = $themeoptions['themetastic_themelayout'];
		if($themetastic_themelayout=="Full-Width"){ $themetastic_wideclass = "wide"; } else { $themetastic_wideclass = ""; }
	?>
	<?php wp_head(); ?>
</head>

<!--
#######################################
	- THE BODY PART -
######################################
-->


<?php
	if (!empty($post_id)){
		$pagecustoms = getOptions($post_id);
		//Custom Background
		if(isset($pagecustoms["themetastic_custom_background"])){
			$image = wp_get_attachment_image_src($pagecustoms["themetastic_custom_background"], 'full');	$image = $image[0];
			$themeoptions['themetastic_img_bgdefault'] = $image;
			$themeoptions['themetastic_img_bgtype'] = $pagecustoms["themetastic_custom_background_type"];
		}
	}
	$themeoptions['themetastic_stickymenu'] = isset($themeoptions['themetastic_stickymenu']) ? "stickymenu" : "";

	$style="";
	if ($themeoptions['themetastic_themelayout']=="Boxed"){
		if ($themeoptions['themetastic_img_bgtype']!="full") {
			$style='style="background-image: url('.$themeoptions["themetastic_img_bgdefault"].');  }"';
}} 

	//Pagetitle
	if(function_exists('is_product') && is_product() ){
		if(isset($pagecustoms['themetastic_activate_page_title_woo'])){ $headline = "off";} else {$headline = "on";}
		if(isset($pagecustoms['themetastic_header_title_woo'])) $htitle = $pagecustoms['themetastic_header_title_woo']; else $htitle=get_the_title();
		$title_orientation = $pagecustoms["themetastic_title_orientation_woo"];
	}
	else{
		if(isset($pagecustoms['themetastic_activate_page_title'])){ $headline = "off"; $ptclass = "nopagetitle"; } else {$headline = "on"; $ptclass = ""; }
		if(isset($pagecustoms['themetastic_header_title']))$htitle = $pagecustoms['themetastic_header_title']; else $htitle=get_the_title($post_id);
		$title_orientation = isset($themeoptions['themetastic_title_orientation']) ? $themeoptions['themetastic_title_orientation'] : "left";
	}

?>

<body <?php body_class($themeoptions['themetastic_stickymenu']." ".$ptclass); echo " ".$style; ?> data-forumsearch="<?php _e('Search Forum...', 'themetastic'); ?>">

	<?php if($themetastic_themelayout=="Full-Width"){ ?>
		<script> jQuery('body').addClass("fullwidthlayout"); </script>
	<?php } else { ?>
		<script> jQuery('body').addClass("boxedlayout"); </script>
	<?php } ?>
	
	<?php if(!empty($themeoptions['themetastic_headertopline_color']) && $themeoptions['themetastic_headertopline_color']=="highlight"){?>
		<!-- Coloured Pagetitle -->
		<script> jQuery('body').addClass("colored"); </script>
	<?php } ?>

<section class="allwrapper">
	<header>

			<?php if(isset($themeoptions["themetastic_headertopline"])){ ?>
			<!-- Header Text Line -->
			<section class="headertopwrap">
				<div class="headertop">
					<div class="row">
						<div class="span6 headerlefttext">
							<div class="headerleftwrap"><div class="headerleftinner"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Top Line Left") ) {} ?></div><div class="clear"></div></div>
						</div>
						<div class="span6 headerrighttext">
							<div class="headerleftwrap"><div class="headerleftinner"><?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Header Top Line Right") ) {} ?></div><div class="clear"></div></div>

						</div>
					</div>
				</div>
			</section>
			<?php } ?>

			<!-- Header Logo and Menu -->
			<section class="headerwrap">
				<div class="header span12">
						<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo $themeoptions["themetastic_img_logo"]; ?>" alt="" /></a></div>

						<nav class="mainmenu">
							<!-- Regular Main Menu -->
							<?php wp_nav_menu( array( 'menu' => '', 'container_class' => 'ddsmoothmenu', 'container_id' => 'mainmenu', 'theme_location' => 'navigation' ) ); ?>

							<?php if(isset($themeoptions["themetastic_headersearch"])){ ?>
							<!-- Header Search -->
							<div class="headersearch">
								<?php get_search_form(); ?>
							</div>
							<?php } ?>
						</nav>

						<!-- Responsive Main Menu -->
						<div class="row mobilemenu">
							<div class="icon-menu"></div>
							<form id="responsive-menu" action="#" method="post">
								<select>
									<option value=""><?php _e('Menu', 'themetastic'); ?></option>
								</select>
							</form>
						</div>

				</div>
			</section>
			<div class="clear"></div>
	</header>

	<?php if($post_id > 0)	$pagecustoms = getOptions($post_id);

	//Page Slider
	if(isset($pagecustoms["themetastic_activate_slider"])&&$pagecustoms["themetastic_activate_slider"]=="on") {
		$themetastic_slider = $pagecustoms["themetastic_header_slider"];
		$themetastic_slider_height = get_revslider_property($themetastic_slider,"height");
	}else{
		$themetastic_slider ="";
		$themetastic_slider_height = "";
	}

	if($title_orientation == "left"){
		$torient = "";
	} else if($title_orientation == "center"){
		$torient = "text-align: center;";
	}

	if ( is_search() ) {
		$themetastic_searchresults = __('search results for', 'themetastic');
		$allsearch = &new WP_Query("s=$s&showposts=-1");
		$searchcount = $allsearch->post_count;
		wp_reset_query();
		$htitle = "<strong>".$searchcount."</strong> ".$themetastic_searchresults." \"".get_search_query()."\"";
	}
	
	$themetastic_categoryname = __('Category ', 'themetastic');
	$themetastic_archivename = __('Archives ', 'themetastic');
	$themetastic_tags = __('Tag ', 'themetastic');
	$themetastic_all = __('All', 'themetastic');
	$themetastic_readmore =  __('Read More', 'themetastic');
	$themetastic_in = __('in', 'themetastic');
	$themetastic_by = __('by', 'themetastic');
	$themetastic_tagged = __('tagged: ', 'themetastic');

	
	if(is_category() || is_archive()){
		if(is_category()){
			$catname = single_cat_title("", false);
			$htitle = __('Category ', 'themetastic')." ".$catname;
		}

		elseif(is_archive()){
			if(is_tax()){
				$tax_slug = get_post_type();
				$portfolio_counter = 0;
				if(isset($wp_query->query_vars['taxonomy']) && taxonomy_exists($wp_query->query_vars['taxonomy'])) {
					$value    = get_query_var($wp_query->query_vars['taxonomy']);
					if (term_exists($wp_query->query_vars['term'])) {
						$term = get_term_by( 'slug', get_query_var( 'term'  ),$wp_query->query_vars['taxonomy'] );
						$htitle_cat = $term->name;
					}
				}

				$portfolios = get_option("themetastic_theme_portfolios_options");
				$portfolio_slugs = array();
				$portfolio_names = array();
				$j = 1;
				if(is_array($portfolios)){
					foreach($portfolios as $key => $value){
						if($j%2==0){
				            array_push($portfolio_slugs,$value);
				            $j = 0 ;
				        }
				        else{
				            array_push($portfolio_names,$value);
				        }
				    	$j++;
					}
				}		
				foreach ( $portfolio_slugs as $slug ){
						if($slug == $tax_slug) break;
						else $portfolio_counter++;
				}
				$htitle = $portfolio_names[$portfolio_counter]." - ".$htitle_cat;
			}
			else{
				$htitle = $themetastic_archivename." ".single_month_title(' ', false);
			}
		}
	}
	
	?>

	<?php if($themetastic_themelayout=="Full-Width"){ ?>
		<?php if ($headline!="off"){ ?>
			<!-- Page Title -->
			<section class="pagetitlewrap">
				<div class="row pagetitle">
					<h1 style="<?php echo $torient;?>"><?php echo $htitle;?></h1>
					<div class="breadcrumbwrap"><?php the_breadcrumb(); ?></div>
				</div>
			</section>
		<?php } ?>
	<?php } ?>