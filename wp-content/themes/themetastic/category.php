<?php
/*
Template Name: Blog Overview
*/
?>
<?php

	//Language Options
	$themetastic_categoryname = __('Category', 'themetastic');
	$themetastic_archivename = __('Archives', 'themetastic');
	$themetastic_tags = __('Tag', 'themetastic');
	$themetastic_all = __('All', 'themetastic');
	$themetastic_readmore =  __('Read More', 'themetastic');
	$themetastic_in = __('in', 'themetastic');
	$themetastic_by = __('by', 'themetastic');
	$themetastic_tagged = __('tagged: ', 'themetastic');

	global $wp_query;
    $content_array = $wp_query->get_queried_object();
	if(isset($content_array->ID)){
    	$post_id = $content_array->ID;
	}
	else $post_id=0;
	$template_uri = get_template_directory_uri();

	$pagecustoms = getOptions();

	// Themeoptions
	$themeoptions = getThemeOptions();

	
	//Blog Style Options
	$nopostinfo = !isset($themeoptions['themetastic_blogoverviewpostinfo_date']) && !isset($themeoptions['themetastic_blogoverviewpostinfo_author']) && !isset($themeoptions['themetastic_blogoverviewpostinfo_category']) && !isset($themeoptions['themetastic_blogoverviewpostinfo_comments']) && !isset($themeoptions['themetastic_blogoverviewpostinfo_tags']) ? "style='display:none;'" : "";
	$themetastic_bloglayout = $themeoptions['themetastic_blogoverviewpostlayout'];
	$blogdateclass = isset($themeoptions['themetastic_blogoverviewsingledate']) ? "" : "nodate";
	$themetastic_archivelayout = $themeoptions['themetastic_blogarchivesidebar'];

	//Sidebar & Blog Style
	if(isset($pagecustoms["themetastic_activate_sidebar"])){
		if (isset($pagecustoms["themetastic_sidebar"])){$sidebar = $pagecustoms["themetastic_sidebar"];}else{$sidebar = "Blog Sidebar";}
		$sidebar_orientation = $pagecustoms["themetastic_sidebar_orientation"];
		$themetastic_activate_sidebar="on";
		$blogfullclass = "";
		$bloglayoutclass = "";

		$post_top_width = 850;
		$post_top_height = "";
		if($themetastic_bloglayout == "Small Media"){
			$bloglayoutclass = "smallmedia";
			$post_top_width = 710;
			$post_top_height = "";
		}
	}
	else {
		$themetastic_activate_sidebar="off";
		$blogfullclass = "fullblog";

		$post_top_width = 1170;
		$post_top_height = "";
		if($themetastic_bloglayout == "Small Media"){
			$bloglayoutclass = "smallmedia";
			$post_top_width = 710;
			$post_top_height = "";
		}
	}


	//Pagetitle
	if(isset($pagecustoms['themetastic_activate_page_title'])){ $headline = "off";} else {$headline = "on";}
	if(isset($pagecustoms['themetastic_header_title']))$htitle = $pagecustoms['themetastic_header_title']; else $htitle=get_the_title($post_id);
	if(isset($pagecustoms['themetastic_title_orientation']))$title_orientation = $pagecustoms["themetastic_title_orientation"]; else $title_orientation = "left";
	if($title_orientation == "left"){
		$torient = "";
	} else if($title_orientation == "center"){
		$torient = "text-align: center;";
	}

	if(have_posts()) $current_cat = get_the_category();

	if(is_category() || is_archive()){
		if(is_category()){
			$catname = single_cat_title("", false);
			$htitle = $themetastic_categoryname." ".$catname;

			if($themetastic_archivelayout=="Full-Width"){
				$themetastic_activate_sidebar="off";
				$blogfullclass = "fullblog";
				$withsidebarmod = "";
			}else if($themetastic_archivelayout=="Sidebar Left"){
				$themetastic_activate_sidebar="on";
				$sidebar_orientation ="left";
				$withsidebarmod = "withsidebar";
			}else if($themetastic_archivelayout=="Sidebar Right"){
				$themetastic_activate_sidebar="on";
				$sidebar_orientation ="right";
				$withsidebarmod = "withsidebar";
			}
			$bloglayoutclass = "";
			$sidebar = $themeoptions['themetastic_blogarchivesidebar_select'];
		}

		elseif(is_archive()){
			wp_link_pages();
			if(is_tax()){
				if(isset($wp_query->query_vars['taxonomy']) && taxonomy_exists($wp_query->query_vars['taxonomy'])) {
					$value    = get_query_var($wp_query->query_vars['taxonomy']);
					if (term_exists($wp_query->query_vars['term'])) {
						$term = get_term_by( 'slug', get_query_var( 'term'  ),$wp_query->query_vars['taxonomy'] );
						$htitle_cat = $term->name;
					}
				}

				$tax_slug = get_post_type();
				$display_span = "fourcol";
				$portfolio_slugs = get_option("themetastic_portfolio_slug");
				$portfolio_counter = 0;
				$portfolio_name = get_option("themetastic_portfolio_name");
					foreach ( $portfolio_slugs as $slug ){
						if($slug == $tax_slug) break;
						else $portfolio_counter++;
					}
				$htitle = "".$portfolio_name[$portfolio_counter]." ".$htitle_cat;

				if($portfoliocategorysidebar=="Full-Width"){
					$themetastic_activate_sidebar="off";
					$blogfullclass = "fullblog";
					$withsidebarmod = "";
				}else if($portfoliocategorysidebar=="Sidebar Left"){
					$themetastic_activate_sidebar="on";
					$sidebar_orientation ="left";
					$withsidebarmod = "withsidebar";
				}else if($portfoliocategorysidebar=="Sidebar Right"){
					$themetastic_activate_sidebar="on";
					$sidebar_orientation ="right";
					$withsidebarmod = "withsidebar";
				}
				$bloglayoutclass = "";
				$sidebar = $themeoptions['themetastic_blogarchivesidebar_select'];
			}
			else{
				$htitle = $themetastic_archivename." ".single_month_title(' ', false);

				if($themetastic_archivelayout=="Full-Width"){
					$themetastic_activate_sidebar="off";
					$blogfullclass = "fullblog";
					$withsidebarmod = "";
				}else if($themetastic_archivelayout=="Sidebar Left"){
					$themetastic_activate_sidebar="on";
					$sidebar_orientation ="left";
					$withsidebarmod = "withsidebar";
				}else if($themetastic_archivelayout=="Sidebar Right"){
					$themetastic_activate_sidebar="on";
					$sidebar_orientation ="right";
					$withsidebarmod = "withsidebar";
				}
				$bloglayoutclass = "";
				$sidebar = $themeoptions['themetastic_blogarchivesidebar_select'];
			}
		}
	}

	/* Theme Layout */
	$themetastic_slider="";
	$themetastic_themelayout = $themeoptions['themetastic_themelayout'];



	if(is_tag()) $htitle = $themetastic_tags." ".single_tag_title(' ', false);

	get_header();
?>

<!-- Main Container -->
<div id="firstcontentcontainer" class="container">

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

<!-- Body -->
<div class="row">

	<?php
    //If this is the Blog
    if(!is_tax()){?>

        <!-- Content -->
        <?php if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="right") { ?>
        <div class="span9 left">
        <div class="pagewrapright">
        <?php } else if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="left") { ?>
        <div class="span9 right">
        <div class="pagewrapleft">
        <?php } else { ?>
        <div class="span12 <?php echo $blogfullclass;?>">
        <?php } ?>

        <!--
        #################################
            -	BLOG	-
        #################################
        -->

		<?php if(have_posts()) :
        while(have_posts()) : the_post();

			//Post Time & Info
			$post_time_day = get_post_time('j', true);
			$post_time_month = date_i18n('M', strtotime($post->post_date_gmt));
			$post_time_year = get_post_time('Y', true);
			$post_time_daymonthyear = date_i18n(get_option('date_format'), strtotime($post->post_date_gmt));

			$postcustoms = getOptions($post->ID);
			$post_top="";

			//Post Type related Object to display in the Head Area of the post
			if(isset($postcustoms["themetastic_post_type"]))
			switch ($postcustoms["themetastic_post_type"]) {
				case 'image':
					$blogimageurl="";
					$blogimageurl = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($post->ID) ),$post_top_width,$post_top_height,true);
					if($blogimageurl!=""){
						$post_top = '<a href="'.get_permalink().'" title="'.get_the_title().'"><img src="'.$blogimageurl.'" alt=""></a>';
					}
				break;
				case 'video':
					$video_width = $postcustoms["themetastic_video_width"];
					$video_height = $postcustoms["themetastic_video_height"];

					if($video_width>$post_top_width)
						$video_width_ratio = $video_width/$post_top_width;
					else
						$video_width_ratio = $post_top_width/$video_width;

					$video_height = round($video_height*$video_width_ratio);
					$video_width = $post_top_width;

					if($postcustoms["themetastic_video_type"]=="youtube"){
						$post_top = '<div class="scalevid"><iframe src="http://www.youtube.com/embed/'.$postcustoms["themetastic_youtube_id"].'?hd=1&amp;wmode=opaque&amp;autohide=1&amp;showinfo=0" width="'.$postcustoms["themetastic_video_width"].'" height="'.$postcustoms["themetastic_video_height"].'" style="border:0"></iframe></div>';
					}
					elseif ($postcustoms["themetastic_video_type"]=="vimeo") {
						$post_top = '<div class="scalevid"><iframe src="http://player.vimeo.com/video/'.$postcustoms["themetastic_vimeo_id"].'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="'.$postcustoms["themetastic_video_width"].'" height="'.$postcustoms["themetastic_video_height"].'" style="border:0"></iframe></div>';
					}
				break;

				case 'slider':
						$themetastic_slider = $postcustoms["themetastic_slider"];
						$post_top = do_shortcode('[rev_slider '.$themetastic_slider.']');
				break;

				default:
				$post_top = "";
				break;
			}

			$entrycategory = "";
			if(is_tax()){
				$entrycategory = get_the_term_list( '', "category_".$tax_slug, '', ', ', '' );
			} else {
				foreach((get_the_category()) as $category) {
					$entrycategory .= ', <a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>';
				}
				$entrycategory = substr($entrycategory, 2);
			} ?>

            <?php if($themetastic_bloglayout == "Small Media" && $post_top==""){
				$bloglayoutclass = "nosmallmedia";
			} ?>

            <div class="blogpost <?php echo $bloglayoutclass;?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if($themetastic_bloglayout == "Large Media"){ ?>
					<div class="date">
						<div class="day"><?php echo $post_time_day;?></div>
						<div class="month"><?php echo $post_time_month;?></div>
					</div>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="postinfo" <?php echo $nopostinfo; ?>>
						<?php if (isset($themeoptions['themetastic_blogoverviewpostinfo_date'])){ ?><div class="time"><?php echo $post_time_daymonthyear; ?></div><?php } ?>
						<?php if (isset($themeoptions['themetastic_blogoverviewpostinfo_author'])){ ?><div class="author"><?php echo $themetastic_by ?> <?php the_author_posts_link(); ?></div><?php } ?>
						<?php if (isset($themeoptions['themetastic_blogoverviewpostinfo_category'])){ ?><div class="categories"><?php echo $themetastic_in ?> <?php echo $entrycategory; ?></div><?php } ?>
						<?php if (isset($themeoptions['themetastic_blogoverviewpostinfo_comments']) && comments_open()){ ?><div class="comments"><?php comments_popup_link(__('no Comments', 'themetastic'), __('one Comment', 'themetastic'), __( '% Comments', 'themetastic')); ?></div><?php } ?>
						<?php if (isset($themeoptions['themetastic_blogoverviewpostinfo_tags']) && has_tag()){ ?><div class="tags"><?php echo $themetastic_tagged ?> <?php echo the_tags('', ', ', ''); ?></div><?php } ?>
					</div>
				<?php } ?>

                <div class="post">

                    <?php if($themetastic_bloglayout == "Small Media"){ ?>
                        <?php if ($post_top!=""){?>
                            <div class="postmedia">
                                <?php echo $post_top; ?>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <div class="postbody">

						<?php if($themetastic_bloglayout == "Small Media"){ ?>
							<div class="date">
								<div class="day"><?php echo $post_time_day;?></div>
								<div class="month"><?php echo $post_time_month;?></div>
							</div>
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<div class="postinfo" <?php echo $nopostinfo; ?>>
								<?php if (isset($themeoptions['themetastic_blogoverviewpostinfo_date'])){ ?><div class="time"><?php echo $post_time_daymonthyear; ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_blogoverviewpostinfo_author'])){ ?><div class="author"><?php echo $themetastic_by ?> <?php the_author_posts_link(); ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_blogoverviewpostinfo_category'])){ ?><div class="categories"><?php echo $themetastic_in ?> <?php echo $entrycategory; ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_blogoverviewpostinfo_comments']) && comments_open()){ ?><div class="comments"><?php comments_popup_link(__('no Comments', 'themetastic'), __('one Comment', 'themetastic'), __( '% Comments', 'themetastic')); ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_blogoverviewpostinfo_tags']) && has_tag()){ ?><div class="tags"><?php echo $themetastic_tagged ?> <?php echo the_tags('', ', ', ''); ?></div><?php } ?>
							</div>
						<?php } ?>

                        <?php if($themetastic_bloglayout == "Large Media"){ ?>
                            <?php if ($post_top!=""){?>
                            	<?php if ($postcustoms["themetastic_post_type"]!='slider') {?>
                                <div class="postmedia">
                                    <?php echo $post_top; ?>
                                </div>
                            	<?php } else {?>
                            		  <div class="postmedia-slide">
                                    <?php echo $post_top; ?>
                                </div>
                            	<?php } ?>
                            <?php } ?>
                        <?php } ?>

                        <div class="posttext"><?php the_excerpt(); ?></div>
						<div class="readmore"><a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php echo $themetastic_readmore ?></a></div>

                    </div>

                    <div class="postdivider"></div>
                </div>
            </div>

            <?php  if($themetastic_bloglayout == "Small Media"){ $bloglayoutclass = "smallmedia"; } ?>

        <!-- Loop End -->
        <?php endwhile; ?>

        <!-- Content End -->
        <?php if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="right") { ?>
        </div>
            <?php if(function_exists('pagination')){ pagination(); }else{ paginate_links(); } ?>
        </div>
        <?php } else if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="left") { ?>
        </div>
            <?php if(function_exists('pagination')){ pagination(); }else{ paginate_links(); } ?>
        </div>
        <?php } else { ?>
            <?php if(function_exists('pagination')){ pagination(); }else{ paginate_links(); } ?>
        </div>
        <?php } ?>

        <?php else : ?>
            <div>
				<h4 style="text-align:center; margin-bottom: 500px;"><?php _e('Oops, we could not find what you were looking for...', 'themetastic'); ?></h4>
            </div>
        <?php endif; ?>

        <?php //If this is the portfolio
    	} else if(is_tax()){ ?>

        	<!-- Content -->
			<?php if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="right") { ?>
            <div class="span9 left">
            <div class="pagewrapright">
            <?php } else if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="left") { ?>
            <div class="span9 right">
            <div class="pagewrapleft">
            <?php } else { ?>
            <div class="span12 <?php echo $blogfullclass;?>">
            <?php } ?>

            <!-- Portfolio -->
            <div class="row <?php echo $display_span; ?> portfoliowrap">

                <!-- Portfolio Items -->
                <div class="portfolio <?php echo $withsidebarmod ?>">

                    <?php if ($wp_query->have_posts()) : ?>
                    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();

                        $postcustoms = getOptions($post->ID);

                        //Post Type
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

                        $categorylinks = get_the_term_list( '', "category_".$tax_slug, '', ', ', '' );
                    ?>

                    <div class="entry <?php echo $categorylist; ?>">
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
									<?php if($themetastic_item_categories=="On"){ ?><span class="itemcategories"><?php echo $categorylinks ?></span><?php } ?>
								</div>
							</div>
						</div>
					</div>

                    <?php endwhile; endif; //have_posts ?>

                </div>
            </div>

            <!-- Content End -->
            <?php if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="right") { ?>
            </div>
                <?php if(function_exists('pagination')){ echo'<div class="row" style="margin-top:30px;"></div>'; pagination(); }else{ paginate_links(); } ?>
            </div>
            <?php } else if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="left") { ?>
            </div>
                <?php if(function_exists('pagination')){ echo'<div class="row" style="margin-top:30px;"></div>'; pagination(); }else{ paginate_links(); } ?>
            </div>
            <?php } else { ?>
                <?php if(function_exists('pagination')){ echo'<div class="row" style="margin-top:30px;"></div>'; pagination(); }else{ paginate_links(); } ?>
            </div>
            <?php } ?>


        <?php } ?>


        <?php if ($themetastic_activate_sidebar=="on"){?>
        <!--
        #####################
            -	SIDEBAR	-
        #####################
        -->
        <div class="span3 right sidebar">
			<div class="row">

                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
                    <div class="span3 widget">
                        <div class="footertitle"><h4>Sidebar Widget Area</h4></div>
                        <div class="widgetclass">
                        Please configure this Widget Area in the Admin Panel under Appearance -> Widgets
                        </div><div class="clear"></div>
                    </div>
                <?php endif; ?>

        	</div>
        </div>
        <!-- /Sidebar -->
        <?php } ?>

    </div><div class="clear"></div>
    <!-- /Body -->

	<!-- Bottom Spacing -->
    <div class="row top50"></div>

</div><!-- /container -->

<?php get_footer(); ?>