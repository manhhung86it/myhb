<?php
/*
Template Name: Search
*/
?>
<?php

	//Language Options
	$themetastic_categoryname = __('<strong>Category</strong>', 'themetastic');
	$themetastic_archivename = __('<strong>Archives</strong>', 'themetastic');
	$themetastic_tags = __('<strong>Tag</strong>', 'themetastic');
	$themetastic_all = __('All', 'themetastic');
	$themetastic_searchresults = __('search results for', 'themetastic');

	global $wp_query;
    $content_array = $wp_query->get_queried_object();
	if(isset($content_array->ID)){
    	$post_id = $content_array->ID;
	}
	else $post_id=0;
	$template_uri = get_template_directory_uri();

	//Sidebar & Blog Style
	$themetastic_activate_sidebar="off";
	$blogdateclass = "nodate";
	$blogfullclass = "fullblog";
	
	$allsearch = &new WP_Query("s=$s&showposts=-1");
	$searchcount = $allsearch->post_count;
	wp_reset_query();
	
	// Themeoptions
	$themeoptions = getThemeOptions();
	$searchresultsnum = $themeoptions['themetastic_searchresultsnumber'];
	
	$headline = "on";
	
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
					<h1 style="<?php echo $torient;?>"><?php echo "<strong>".$searchcount."</strong> ".$themetastic_searchresults ?> "<?php the_search_query(); ?></h1>
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
    
        <section class="span12 <?php echo $blogfullclass;?>">

        <!--
        #################################
            -	SEARCH RESULTS 	-
        #################################
        -->
        
		<?php 
        $paged =
            ( get_query_var('paged') && get_query_var('paged') > 1 )
            ? get_query_var('paged')
            : 1;
        $args = array(
            'posts_per_page' => $searchresultsnum,
            'paged' => $paged
        );
        $args =
            ( $wp_query->query && !empty( $wp_query->query ) )
            ? array_merge( $wp_query->query , $args )
            : $args;
        query_posts( $args );
        ?>
        
		<?php if(have_posts()) :
        while(have_posts()) : the_post();
		
			if($searchcount>0){
		
			//Post Time & Info
			$post_time_day = get_post_time('j', true);
			$post_time_month = date_i18n('M', strtotime($post->post_date_gmt));
			$post_time_year = get_post_time('Y', true);
			$post_time_daymonthyear = date_i18n(get_option('date_format'), strtotime($post->post_date_gmt));

			$excerpt_content = excerpt(50);
			if($excerpt_content=="") {
				$excerpt_content = substr(strip_tags(do_shortcode(get_the_content())), 0, 250);
				if(strlen($excerpt_content)>200) $excerpt_content .= "...";
			}
			?>
		
            <article class="blogpost <?php echo $blogdateclass ?>">
                <div class="post">
                    
                    <div class="postbody">
                        
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="posttext" style="margin-bottom: 0px;"><?php echo $excerpt_content; ?></div>
                        
                    </div>
                    
                    <div class="postdivider" style="margin-top: 21px; margin-bottom: 20px;"></div>
                </div>
            </article>
            
        <!-- Loop End -->
        <?php } endwhile; ?>
		
        <!-- Content End -->

        <?php if(function_exists('pagination')){ pagination(); }else{ paginate_links(); } ?>
        </section>
      
        <?php else : ?>
            <article>
                <h4 style="text-align:center;"><?php _e('Oops, we could not find what you were looking for...', 'themetastic'); ?></h4>
            </article>
</section><div class="clear"></div>
        <?php endif; ?>

    
    </section><div class="clear"></div>
    <!-- /Body -->

	<!-- Bottom Spacing -->
    <div class="row top80"></div>

</section><!-- /container -->

<?php get_footer(); ?>