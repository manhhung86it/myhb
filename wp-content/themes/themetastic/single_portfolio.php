<?php

	//Language Options
	$themetastic_relates = __('More Projects', 'themetastic');
	$themetastic_nextproject = __('Next Project &raquo;', 'themetastic');
	$themetastic_previousproject = __('&laquo; Previous Project', 'themetastic');
	$themetastic_all = __('All', 'themetastic');
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

	if(have_posts()) $pagecustoms = getOptions();

	// Themeoptions
	$themeoptions = getThemeOptions();

	//Portfolio Style Options!
	$nopostinfo = !isset($themeoptions['themetastic_portfoliopostinfo_date']) && !isset($themeoptions['themetastic_portfoliopostinfo_author']) && !isset($themeoptions['themetastic_portfoliopostinfo_category']) && !isset($themeoptions['themetastic_portfoliopostinfo_comments']) && !isset($themeoptions['themetastic_portfoliopostinfo_tags']) ? "style='display:none;'" : "";
	if ($nopostinfo == "style='display:none;'"){ $titlemod = "margin-bottom: 14px;"; } else { $titlemod = ""; }
	$themetastic_bloglayout = $themeoptions['themetastic_portfoliopostlayout'];
	//$blogdateclass = isset($themeoptions['themetastic_portfoliosingledate']) ? "" : "nodate";
	$blogdateclass = "nodate";
	if ($nopostinfo == "style='display:none;'" && $blogdateclass == ""){ $titlemod = "margin-bottom: 36px;"; } 
	if ($nopostinfo == "style='display:none;'" && $blogdateclass == "nodate"){ $titlemod = "margin-bottom: 14px; margin-top: 16px;"; } 

	//Sidebar & Blog Style
	if(isset($pagecustoms["themetastic_activate_sidebar"])){
		if (isset($pagecustoms["themetastic_sidebar"])){$sidebar = $pagecustoms["themetastic_sidebar"];}else{$sidebar = "Blog Sidebar";}
		$sidebar_orientation = $pagecustoms["themetastic_sidebar_orientation"];
		$themetastic_activate_sidebar="on";
		$withsidebarmod = "withsidebar";
		$blogfullclass = "";
		$bloglayoutclass = "";

		$related_span="span8";
		$related_wrapspan="span8";

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
		$withsidebarmod = "";
		$blogfullclass = "fullblog";

		$related_span="span12";
		$related_wrapspan="span12";

		$post_top_width = 1170;
		$post_top_height = "";
		$bloglayoutclass = "";
		if($themetastic_bloglayout == "Small Media"){
			$bloglayoutclass = "smallmedia";
			$post_top_width = 710;
			$post_top_height = "";
		}
	}

	// Pagetitle
	if(isset($pagecustoms['themetastic_activate_page_title'])){ $headline = "off";} else {$headline = "on";}
	if(isset($pagecustoms['themetastic_header_title']))$htitle = $pagecustoms['themetastic_header_title']; else $htitle= "".get_the_title()."";
	$title_orientation = $pagecustoms["themetastic_title_orientation"];
	if($title_orientation == "left"){
		$torient = "";
	} else if($title_orientation == "center"){
		$torient = "text-align: center;";
	}

	/* Theme Layout */
	$themetastic_slider="";
	$themetastic_themelayout = $themeoptions['themetastic_themelayout'];


	if(have_posts()) $current_cat = get_the_category();

	//Portfolio
	$ptype = get_post_type();

	get_header();
?>

<!-- Main Container -->
<section id="firstcontentcontainer" class="container">

	<?php if($themetastic_themelayout!="Full-Width"){ ?>
		<?php if ($headline!="off"){ ?>
			<!-- Page Title -->
			<section class="pagetitlewrap boxed">
				<div class="row pagetitle">
					<h1 style="<?php echo $torient;?>"><?php echo $htitle;?></h1>
					<div class="breadcrumbwrap"><?php the_breadcrumb(); ?></div>
				</div>
			</section>
			<?php if($themetastic_slider==""){ ?><div class="row top40"></div><?php } ?>
		<?php } else { ?>
			<div class="row notitleboxedtop"></div>
		<?php } ?>
	<?php } ?>

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
    <section class="span12 <?php echo $blogfullclass;?>">
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
			$post_time_month = date_i18n('M', strtotime(get_the_date()));
			$post_time_year = get_post_time('Y', true);
			$post_time_daymonthyear = date_i18n(get_option('date_format'), strtotime(get_the_date()));

			$postcustoms = getOptions();
			$post_top="";

			//Post Type related Object to display in the Head Area of the post
			if(isset($postcustoms["themetastic_post_type"]))
			switch ($postcustoms["themetastic_post_type"]) {
				case 'image':
					$blogimageurl="";
					$blogimageurl = aq_resize(wp_get_attachment_url( get_post_thumbnail_id() ),$post_top_width,$post_top_height,true);
					if($blogimageurl!=""){
						$post_top = '<img src="'.$blogimageurl.'" alt="'.get_the_title().'">';
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

			$entrycategory = get_the_term_list( '', $pcat, '', ', ', '' );
			?>

			<?php if($themetastic_bloglayout == "Small Media" && $post_top==""){
				$bloglayoutclass = "nosmallmedia";
			} ?>

            <article class="blogpost singlepost singlefolio <?php echo $bloglayoutclass;?> <?php echo $blogdateclass;?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				
				<?php if($themetastic_bloglayout == "Large Media"){ ?>
					<header>
											</header>
				<?php } ?>

                <section class="post">

                    <?php if($themetastic_bloglayout == "Small Media"){ ?>
                        <?php if ($post_top!=""){?>
                            <div class="postmedia">
                                <?php echo $post_top; ?>
                            </div>
                        <?php } ?>
                    <?php } ?>

                    <section class="postbody">

						<?php if($themetastic_bloglayout == "Small Media"){ ?>
							<div class="date">
								<div class="day"><?php echo $post_time_day;?></div>
								<div class="month"><?php echo $post_time_month;?></div>
							</div>
							<!--h2 style="<?php echo $titlemod; ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2-->
							<div class="postinfo" <?php echo $nopostinfo; ?>>
								<?php if (isset($themeoptions['themetastic_portfoliopostinfo_date'])){ ?><div class="time"><?php echo $post_time_daymonthyear; ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_portfoliopostinfo_author'])){ ?><div class="author"><?php echo $themetastic_by ?> <?php the_author_posts_link(); ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_portfoliopostinfo_category'])){ ?><div class="categories"><?php echo $themetastic_in ?> <?php echo $entrycategory; ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_portfoliopostinfo_comments']) && comments_open()){ ?><div class="comments"><?php comments_popup_link(__('no Comments', 'themetastic'), __('one Comment', 'themetastic'), __( '% Comments', 'themetastic')); ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_portfoliopostinfo_tags']) && has_tag()){ ?><div class="tags"><?php echo $themetastic_tagged ?> <?php echo the_tags('', ', ', ''); ?></div><?php } ?>
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
                            
                            <div class="date">
								<div class="day"><?php echo $post_time_day;?></div>
								<div class="month"><?php echo $post_time_month;?></div>
							</div>
							<h2 style="<?php echo $titlemod; ?>"><!--<?php the_title();?>--></h2>
							<div class="postinfo" <?php echo $nopostinfo; ?>>
								<?php if (isset($themeoptions['themetastic_portfoliopostinfo_date'])){ ?><div class="time"><?php echo $post_time_daymonthyear; ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_portfoliopostinfo_author'])){ ?><div class="author"><?php echo $themetastic_by ?> <?php the_author_posts_link(); ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_portfoliopostinfo_category'])){ ?><div class="categories"><?php echo $themetastic_in ?> <?php echo $entrycategory; ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_portfoliopostinfo_comments']) && comments_open()){ ?><div class="comments"><?php comments_popup_link(__('no Comments', 'themetastic'), __('one Comment', 'themetastic'), __( '% Comments', 'themetastic')); ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_portfoliopostinfo_tags']) && has_tag()){ ?><div class="tags"><?php echo $themetastic_tagged ?> <?php echo the_tags('', ', ', ''); ?></div><?php } ?>
							</div>
							
                        <?php } ?>

                        <div class="posttext"><?php the_content(); ?></div>
                        
                        <div class="projectnavwrapper">
                        <?php if(!empty($postcustoms["themetastic_launch_project"])){ ?><a href="<?php echo $postcustoms["themetastic_launch_project"];?>" target="_blank" class="btn btn-primary btn-normal launchbtn"><?php _e("Launch Project","themetastic");?></a><?php } ?>
                        <?php next_post_link('<div class="projectnav previousproject" data-rel="tooltip" title="'.__("Previous Project","themetastic").'">%link</div>', '' ); previous_post_link('<div class="projectnav nextproject" data-rel="tooltip" title="'.__("Next Project","themetastic").'">%link</div>', '' );   ?></div>
                        
                    </section>
                </section>
            </article>

            <?php if ( comments_open() ) {
				$relatedmod = "";
			} else {
				$relatedmod = 'style="border-top: 0; margin-top: 0; padding-top: 0;"';
			} ?>

            <!-- Post Comments -->
            <?php comments_template('', true); ?>
            <!-- Post Comments End -->

            <!-- Loop End -->
            <?php endwhile; ?>


		<?php if (isset($themeoptions['themetastic_portfoliorelated'])){ ?>
        <!-- Related Projects -->
        <article class=" relatedposts" <?php echo $relatedmod ?>>
        
        	 <div class="wpb_separator wpb_content_element"></div>

			<header><div class="row moduletitle"><div class="titletext"><h2><?php echo $themetastic_relates; ?></h2></div></div></header>

            <section class="row fourcol portfoliowrap">
                <div class="portfolio <?php echo $withsidebarmod ?>">

                    <?php
					if ($themetastic_activate_sidebar=="on") { $portfoliopp = 3; } else { $portfoliopp = 4; }
                    $args=array(
                        'post_type' => $ptype,
                        'post__not_in' => array($post_id),
                        'posts_per_page' => $portfoliopp
                    );
                    $temp = $wp_query;
                    $wp_query = null;
                    $wp_query = new WP_Query();
                    $wp_query->query($args);
                    ?>

                    <?php if ($wp_query->have_posts()) : ?>
                    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post();

                        global $post;
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

                        $themeoptions['themetastic_portfolioheightlock'] = empty($themeoptions['themetastic_portfolioheightlock']) ? 225 : $themeoptions['themetastic_portfolioheightlock'];

                        $blogimageurl = aq_resize(wp_get_attachment_url( get_post_thumbnail_id($post->ID)),400,$themeoptions['themetastic_portfolioheightlock'],true);

                        $categorylinks = get_the_term_list( $post->ID, $pcat, '', ', ', '' );
                        $categories = get_the_terms($post->ID,$pcat);
                        $categorylist="";
                        if(is_array($categories)){
                            foreach ($categories as $category) {
                                $categorylist.= $category->slug." ";
                            }
                        }

                    ?>

                    <div class="entry <?php echo $categorylist; ?>">
						<div class="holderwrap">
							<div class="mediaholder">
								<img src="<?php echo $blogimageurl; ?>" alt="">
								<div class="cover"></div>
								<?php if($p_linkactive=="On"){ ?><a href="<?php the_permalink(); ?>"><div class="link icon-plus <?php echo $notalonemod; ?>"></div></a><?php } ?>
								<?php if($p_zoomactive=="On"){ ?><a title="<?php the_title(); ?>" href="<?php echo $blogimageurl_pp; ?>" rel="" data-rel="" class="fancybox"><div class=" show icon-search <?php echo $notalonemod; ?>"></div></a><?php } ?>
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
                    <?php
                    $wp_query = null;
                    $wp_query = $temp;
                    wp_reset_query();
                    ?>

                </div>
            </section>
        </article><div class="clear"></div>
        <?php } ?>
        <!-- Related Projects End -->

        <!-- Content End -->
        <?php if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="right") { ?>
        </section>
            <?php if(function_exists('pagination')){ pagination(); }else{ paginate_links(); } ?>
        </section>
        <?php } else if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="left") { ?>
        </section>
            <?php if(function_exists('pagination')){ pagination(); }else{ paginate_links(); } ?>
        </section>
        <?php } else { ?>
            <?php if(function_exists('pagination')){ pagination(); }else{ paginate_links(); } ?>
        </section>
        <?php } ?>

        <?php else : ?>
            <div class="span12">
                <p><?php _e('Oops, we could not find what you were looking for...', 'themetastic'); ?></p>
            </div>
        <?php endif; ?>



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
    <div class="row top80"></div>

</section><!-- /container -->

<?php get_footer(); ?>