<?php

	//Language Options
	$themetastic_readmore = __('Read More', 'themetastic');
	$themetastic_category = __('Category', 'themetastic');
	$themetastic_relates = __('Related Posts', 'themetastic');
	$themetastic_categoryname = __('Category', 'themetastic');
	$themetastic_archivename = __('Archives', 'themetastic');
	$themetastic_tags = __('Tag', 'themetastic');
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

	//Blog Style Options
	$nopostinfo = !isset($themeoptions['themetastic_blogpostinfo_date']) && !isset($themeoptions['themetastic_blogpostinfo_author']) && !isset($themeoptions['themetastic_blogpostinfo_category']) && !isset($themeoptions['themetastic_blogpostinfo_comments']) && !isset($themeoptions['themetastic_blogpostinfo_tags']) ? "style='display:none;'" : "";
	if ($nopostinfo == "style='display:none;'"){ $titlemod = "margin-bottom: 14px;"; } else { $titlemod = ""; }
	$themetastic_bloglayout = $themeoptions['themetastic_blogpostlayout'];
	//$blogdateclass = isset($themeoptions['themetastic_blogsingledate']) ? "" : "nodate";
	$blogdateclass = "nodate";
	if ($nopostinfo == "style='display:none;'" && $blogdateclass == ""){ $titlemod = "margin-bottom: 36px;"; } 

	//Sidebar & Blog Style
	if(isset($pagecustoms["themetastic_activate_sidebar"])){
		if (isset($pagecustoms["themetastic_sidebar"])){$sidebar = $pagecustoms["themetastic_sidebar"];}else{$sidebar = "Blog Sidebar";}
		$sidebar_orientation = $pagecustoms["themetastic_sidebar_orientation"];
		$themetastic_activate_sidebar="on";
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
		$blogfullclass = "fullblog";

		$related_span="span12";
		$related_wrapspan="span12";

		$post_top_width = 1170;
		$post_top_height = "";
		if($themetastic_bloglayout == "Small Media"){
			$bloglayoutclass = "smallmedia";
			$post_top_width = 710;
			$post_top_height = "";
		}
	}

	// Pagetitle
	if(isset($pagecustoms['themetastic_activate_page_title'])){ $headline = "off";} else {$headline = "on";}
	if(isset($pagecustoms['themetastic_header_title']))$htitle = $pagecustoms['themetastic_header_title']; else $htitle= "".get_the_title()."";
	if(have_posts()) $current_cat = get_the_category();

	/* Theme Layout */
	$themetastic_slider="";
	$themetastic_themelayout = $themeoptions['themetastic_themelayout'];


	get_header();
?>

<!-- Main Container -->
<section id="firstcontentcontainer" class="container">

	<?php if($themetastic_themelayout!="Full-Width"){ ?>
		<?php if ($headline!="off"){ ?>
			<!-- Page Title -->
			<section class="pagetitlewrap boxed">
				<div class="row pagetitle">
					<h1 style="<?php //echo $torient;?>"><?php echo $htitle;?></h1>
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

			$entrycategory = "";
			if(is_tax()){
				$entrycategory = get_the_term_list( '', "category_".$tax_slug, '<div class="blogcategory">', '</div><div class="blogcategory">', '</div>' );
			} else {
				foreach((get_the_category()) as $category) {
					$entrycategory .= ', <a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>';
				}
				$entrycategory = substr($entrycategory, 2);
			} ?>

			<?php if($themetastic_bloglayout == "Small Media" && $post_top==""){
				$bloglayoutclass = "nosmallmedia";
			} ?>

            <article class="blogpost singlepost <?php echo $bloglayoutclass;?> <?php echo $blogdateclass;?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php if($themetastic_bloglayout == "Large Media"){ ?>
					
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
							<!--h2 style="<?php echo $titlemod; ?>"><?php the_title(); ?></h2-->
							<div class="postinfo" <?php echo $nopostinfo; ?>>
								<?php if (isset($themeoptions['themetastic_blogpostinfo_date'])){ ?><div class="time"><?php echo $post_time_daymonthyear; ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_blogpostinfo_author'])){ ?><div class="author"><?php echo $themetastic_by ?> <?php the_author_posts_link(); ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_blogpostinfo_category'])){ ?><div class="categories"><?php echo $themetastic_in ?> <?php echo $entrycategory; ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_blogpostinfo_comments']) && comments_open()){ ?><div class="comments"><?php comments_popup_link(__('no Comments', 'themetastic'), __('one Comment', 'themetastic'), __( '% Comments', 'themetastic')); ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_blogpostinfo_tags']) && has_tag()){ ?><div class="tags"><?php echo $themetastic_tagged ?> <?php echo the_tags('', ', ', ''); ?></div><?php } ?>
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
							<h2 style="<?php echo $titlemod; ?>"><!--<?php the_title(); ?>--></h2>
							<div class="postinfo" <?php echo $nopostinfo; ?>>
								<?php if (isset($themeoptions['themetastic_blogpostinfo_date'])){ ?><div class="time"><?php echo $post_time_daymonthyear; ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_blogpostinfo_author'])){ ?><div class="author"><?php echo $themetastic_by ?> <?php the_author_posts_link(); ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_blogpostinfo_category'])){ ?><div class="categories"><?php echo $themetastic_in ?> <?php echo $entrycategory; ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_blogpostinfo_comments']) && comments_open()){ ?><div class="comments"><?php comments_popup_link(__('no Comments', 'themetastic'), __('one Comment', 'themetastic'), __( '% Comments', 'themetastic')); ?></div><?php } ?>
								<?php if (isset($themeoptions['themetastic_blogpostinfo_tags']) && has_tag()){ ?><div class="tags"><?php echo $themetastic_tagged ?> <?php echo the_tags('', ', ', ''); ?></div><?php } ?>
							</div>
                            
                        <?php } ?>

                        <div class="posttext"><?php the_content(); ?></div>

                    </section>
                </section>
            </article>

            <!-- Post Comments -->
            <?php comments_template('', true); ?>
            <!-- Post Comments End -->

            <!-- Loop End -->
            <?php endwhile; ?>

            <?php if (isset($themeoptions['themetastic_blogrelated'])){ ?>

                <!-- Related Posts -->
                <?php
                $tags = wp_get_post_tags($post->ID);

                if ($tags) {
                    $tag_ids = array();
                    foreach($tags as $individual_tag) {
						$tag_ids[] = $individual_tag->term_id;
					}

                    $args=array(
                        'tag__in' => $tag_ids,
                        'post__not_in' => array($post->ID),
                        'showposts'=> 3,
                        'ignore_sticky_posts'=> 1
                    );
                    $temp = $wp_query;
                    $my_query = new wp_query($args);
                    if( $my_query->have_posts() ) {
                        ?>

                        <div class="row relatedposts">
                        
                        <div class="wpb_separator wpb_content_element"></div>

						<div class="contenttitle"><div class="titletext"><h2><?php echo $themetastic_relates; ?></h2></div></div>

                        <div class="<?php echo $related_wrapspan ?> relatedwrap"><div class="row homeposts">

                            <?php
                            while ($my_query->have_posts()) { $my_query->the_post();

                                $newspostcustoms = getOptions($post->ID);
                                $newscategory = get_the_category($post->ID);
                                $newsfirst_category = $newscategory[0]->cat_name;
                                $newsrepl = strtolower((preg_replace('/\s+/', '-', $newsfirst_category)));
                                $newsbase = home_url();
                                $newsimageurl = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

                                $post_time_day = date_i18n('j', strtotime($post->post_date_gmt));
                                $post_time_month = date_i18n('M', strtotime($post->post_date_gmt));
                                $post_time_year = date_i18n('Y', strtotime($post->post_date_gmt));

                                $newsexcerpt = excerpt(15);
                                $thenewsimageurl = aq_resize( $newsimageurl, 50, 50, true );

                                $newscatlist = "";
								foreach((get_the_category($post->ID)) as $category) {
									$newscatlist .= ', <a href="'.get_category_link($category->term_id ).'">'.$category->cat_name.'</a>';
								}
								$newscatlist = substr($newscatlist, 2);

								$num_comments = get_comments_number($post->ID);
								if ( comments_open() ) {
								 if ( $num_comments == 0 ) {
								  $comments = __('No Comments','themetastic');
								 } elseif ( $num_comments > 1 ) {
								  $comments = $num_comments . __(' Comments','themetastic');
								 } else {
								  $comments = __('1 Comment','themetastic');
								 }
								 $write_comments = '<a href="' . get_comments_link($post->ID) .'">'. $comments.'</a>';
								} else {
								 $write_comments =  __('Comments are off for this post.','themetastic');
								}
                            ?>

								<div class="homepost <?php echo $related_span ?>">
									<div class="date">
										<div class="day"><?php echo $post_time_day;?></div>
										<div class="month"><?php echo $post_time_month;?></div>
									</div>
									<div class="post">
										<div class="postbody">
											<h4><a href="<?php echo $newsbase.'/'.$newsrepl.'/'.$post->post_name ?>"><?php echo $post->post_title ?></a></h4>
											<div class="postinfo">
												<div class="categories"><?php echo $themetastic_in ?> <?php echo $newscatlist; ?></div>
												<div class="comments"><?php echo $write_comments ?></div>
											</div>
											<div class="posttext"><?php echo excerpt(20); ?></div>
										</div>
									</div>
								</div>

                            <?php }
							$wp_query = null;
							$wp_query = $temp;
							wp_reset_query();
							?>

                        <div class="clear"></div></div></div></div>

                    <?php } ?>
                <?php } ?>
                <!-- Related Posts End -->

            <?php } ?>

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
            <article class="span12">
                <p><?php _e('Oops, we could not find what you were looking for...', 'themetastic'); ?></p>
            </article>
        <?php endif; ?>

        <?php if ($themetastic_activate_sidebar=="on"){?>
        <!--
        #####################
            -	SIDEBAR	-
        #####################
        -->
        
        <?php if ($themetastic_activate_sidebar=="on") { $sbmod = "style='margin-top: 0px !important;'"; } else { $sbmod = ""; }?>
        
        <aside class="span3 right sidebar" <?php echo $sbmod ?>>
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