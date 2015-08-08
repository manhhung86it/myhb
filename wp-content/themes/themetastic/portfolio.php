<?php
/*
Template Name: Portfolio
*/
?>

<?php
	//Language Options
	$themetastic_all = __('All', 'themetastic');

	global $wp_query;
    $content_array = $wp_query->get_queried_object();
	if(isset($content_array->ID)){
    	$post_id = $content_array->ID;
	}
	else $post_id=0;
	$template_uri = get_template_directory_uri();

	//Page Options
	$pagecustoms = getOptions();

	// Themeoptions
	$themeoptions = getThemeOptions();

	//Pagetitle
	if(isset($pagecustoms['themetastic_activate_page_title'])){ $headline = "off";} else {$headline = "on";}
	if(isset($pagecustoms['themetastic_header_title']))$htitle = $pagecustoms['themetastic_header_title']; else $htitle=get_the_title($post_id);
	$title_orientation = $pagecustoms["themetastic_title_orientation"];
	if($title_orientation == "left"){
		$torient = "";
	} else if($title_orientation == "center"){
		$torient = "text-align: center;";
	}

	//Sidebar
	if (isset($pagecustoms["themetastic_activate_sidebar"])){$sideo = $pagecustoms['themetastic_sidebar_orientation'];}else{$sideo = "";}
	if (isset($pagecustoms["themetastic_activate_sidebar"])){$sidebar = $pagecustoms["themetastic_sidebar"];}else{$sidebar = "Page Sidebar";}
	if(isset($pagecustoms["themetastic_activate_sidebar"])){
		if (isset($pagecustoms["themetastic_sidebar"])){$sidebar = $pagecustoms["themetastic_sidebar"];}else{$sidebar = "Page Sidebar";}
		$sidebar_orientation = $pagecustoms["themetastic_sidebar_orientation"];
		$themetastic_activate_sidebar="on";
		$withsidebarmod = "withsidebar";
	} else { $themetastic_activate_sidebar="off"; $withsidebarmod = ""; }

	/* Theme Layout */
	$themetastic_slider="";
	$themetastic_themelayout = $themeoptions['themetastic_themelayout'];


	//Portfolio
	if(isset($pagecustoms["themetastic_portfolio_display_type"])) $themetastic_portfolio_display_type = $pagecustoms["themetastic_portfolio_display_type"];
	else $themetastic_portfolio_display_type = 4;
	if(isset($pagecustoms["themetastic_portfolio_items"])) $themetastic_portfolio_items = $pagecustoms["themetastic_portfolio_items"];
	else $themetastic_portfolio_items = 15;

	if(!empty($pagecustoms["themetastic_portfolio_lock"])){
		$portfolioheightlock = $pagecustoms["themetastic_portfolio_lock"];
	} else {
		$portfolioheightlock = !empty($themeoptions["themetastic_portfoliolock"]) ? $themeoptions["themetastic_portfoliolock"] : "";
	}

	switch($themetastic_portfolio_display_type){
		case "5":
			$display_span = "fivecol";
		break;
		case "4":
			$display_span = "fourcol";
		break;
		case "3":
			$display_span = "threecol";
		break;
	}

	$ptype = $pagecustoms['themetastic_portfolio'];
	$pcat = "category_".$ptype;
	$pcat_array = get_option('themetastic_portfolio_slug');
	//$pcat_index = array_search($ptype, $pcat_array);
	$tax_terms = get_terms($pcat);

	get_header();
?>

<!-- Main Container -->
<section id="firstcontentcontainer" class="container">

		<?php if($themetastic_themelayout!="Full-Width"){ ?>
		<?php if ($headline!="off"){ ?>
			<!-- Page Title -->
			<div class="pagetitlewrap boxed">
				<div class="row pagetitle">
					<h1 style="<?php echo $torient;?>"><?php echo $htitle;?></h1>
					<div class="breadcrumbwrap"><?php the_breadcrumb(); ?></div>
				</div>
			</div>
			<?php if($themetastic_slider==""){ ?><div class="row top40"></div><?php } ?>
		<?php } else { ?>
			<div class="row notitleboxedtop"></div>
		<?php } ?>
	<?php } ?>

<?php if(have_posts()) :
	while(have_posts()) : the_post();

		if( get_the_content() != ""){ ?>

			<div class="row" style="margin-bottom: 14px;">
				<div class="span12">
					<?php the_content(); ?>
				</div>
			</div>

		<?php }
	endwhile;  //have_posts
else :
endif; ?>

<!-- Body -->
<section class="row">

    <!-- Content -->
	<?php if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="right") { ?>
    <section class="span9 left">
    <section class="pagewrapright">
    <?php } else if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="left") { ?>
    <section class="span9 right">
    <section class="pagewrapleft">
	<?php } else { ?>
    <section class="span12">
    <?php } ?>

    <!-- Portfolio -->
    <section class="row <?php echo $display_span; ?> portfoliowrap">

        <!-- Category Filter -->
        <ul class="portfoliofilter clearfix">
            <?php
			if($themetastic_all!="" ){ echo '<li><a class="selected" data-filter="*" href="#">'.$themetastic_all.'</a><span></span></li>'; }
			if(is_array($tax_terms)){
				foreach ( $tax_terms as $tax_term ) {
					$filter_last_item = end($tax_terms);
					if($tax_term!=$filter_last_item){
						echo '<li><a data-filter=".'.$tax_term->slug.'" href="#">'.$tax_term->name.'</a><span></span></li>';
					}else{
						echo '<li><a data-filter=".'.$tax_term->slug.'" href="#">'.$tax_term->name.'</a></li>';
					}
				}
			}
			?>
        </ul>

        <!-- Portfolio Items -->
        <article class="portfolio <?php echo $withsidebarmod ?>">

            <?php
			$paged =
				( get_query_var('paged') && get_query_var('paged') > 1 )
				? get_query_var('paged')
				: 1;
			$args=array(
				'post_type' => $ptype,
				'posts_per_page' => $themetastic_portfolio_items,
				'paged' => $paged
			);

			$temp = $wp_query;
			$wp_query = null;
			$wp_query = new WP_Query();
			$wp_query->query($args);
			?>

			<?php if ($wp_query->have_posts()) : ?>
            <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();

				$postcustoms = getOptions($post->ID);

				//Post Type
				$blogimageurl_pp = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
				if(isset($postcustoms["themetastic_post_type"])){
					switch ($postcustoms["themetastic_post_type"]) {
						case 'video':
							if($postcustoms["themetastic_video_type"]=="youtube") $blogimageurl_pp = "http://www.youtube.com/watch?v=".$postcustoms["themetastic_youtube_id"];
							elseif($postcustoms["themetastic_video_type"]=="vimeo") $blogimageurl_pp = "http://vimeo.com/".$postcustoms["themetastic_vimeo_id"];
							else $blogimageurl_pp = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
						break;
						default:
							$blogimageurl_pp = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
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

				$blogimageurl = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($post->ID)),400,$portfolioheightlock,true);

				if($blogimageurl==""){
					$blogimageurl = $template_uri.'/img/demo/400x300.jpg';
				}

				$categorylinks = get_the_term_list( $post->ID, $pcat, '', ', ', '' );
				if(empty($categorylinks)) $categorylinks = "";
				$categories = get_the_terms($post->ID,$pcat);
				$categorylist="";
				if(is_array($categories)){
					foreach ($categories as $category) {
						$categorylist.= $category->slug." ";
					}
				}

			?>

			<article class="entry <?php echo $categorylist; ?>">
				<div class="holderwrap">
					<div class="mediaholder">
						<img src="<?php echo $blogimageurl; ?>" alt="">
						<div class="cover"></div>
						<?php if($p_linkactive=="On"){ ?><a href="<?php the_permalink(); ?>"><div class="link icon-plus <?php echo $notalonemod; ?>"></div></a><?php } ?>
						<?php if($p_zoomactive=="On"){ ?><a title="<?php the_title(); ?>" href="<?php echo $blogimageurl_pp; ?>" rel="group1" data-rel="group1" class="fancybox"><div class="show icon-search <?php echo $notalonemod; ?>"></div></a><?php } ?>
					</div>
					<div class="foliotextholder">
						<div class="foliotextwrapper">
							<h5 class="itemtitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php if($themetastic_item_categories=="On"){ ?><span class="itemcategories"><?php echo $categorylinks; ?></span><?php } ?>
						</div>
					</div>
				</div>
			</article>

            <?php endwhile; endif; //have_posts ?>

        </article>
    </section>

    <!-- Content End -->
	<?php if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="right") { ?>
    </section>
        <?php if(function_exists('pagination')){ echo'<div class="row" style="margin-top:30px;"></div>'; pagination(); }else{ paginate_links(); } ?>
    </section>
    <?php } else if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="left") { ?>
    </section>
        <?php if(function_exists('pagination')){ echo'<div class="row" style="margin-top:30px;"></div>'; pagination(); }else{ paginate_links(); } ?>
    </section>
    <?php } else { ?>
        <?php if(function_exists('pagination')){ echo'<div class="row" style="margin-top:30px;"></div>'; pagination(); }else{ paginate_links(); } ?>
    </section>
    <?php } ?>

    <?php if ($themetastic_activate_sidebar=="on"){?>
    <!--
    #####################
        -	SIDEBAR	-
    #####################
    -->
    <aside class="span3 right sidebar">
        <section class="row">

            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
                <article class="span3 widget">
                    <div class="footertitle"><h4>Sidebar Widget Area</h4></div>
                    <div class="widgetclass">
                    Please configure this Widget Area in the Admin Panel under Appearance -> Widgets
                    </div><div class="clear"></div>
                </article>
            <?php endif; ?>

        </section>
    </aside>
    <!-- /Sidebar -->
    <?php } ?>

</section><div class="clear"></div>
<!-- /Body -->

<!-- Bottom Spacing -->
<div class="row top50"></div>

</section><!-- /container -->

<?php get_footer(); ?>