<?php
/*
Template Name: Contact
*/
	$template_uri = get_template_directory_uri();

	$pagecustoms = getOptions();

	// Themeoptions
	$themeoptions = getThemeOptions();

	//Sidebar
	if (isset($pagecustoms["themetastic_activate_sidebar"])){$sideo = $pagecustoms['themetastic_sidebar_orientation'];}else{$sideo = "";}
	if (isset($pagecustoms["themetastic_activate_sidebar"])){$sidebar = $pagecustoms["themetastic_sidebar"];}else{$sidebar = "Page Sidebar";}

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
	if(isset($pagecustoms["themetastic_activate_sidebar"])){
		if (isset($pagecustoms["themetastic_sidebar"])){$sidebar = $pagecustoms["themetastic_sidebar"];}else{$sidebar = "Blog Sidebar";}
		$sidebar_orientation = $pagecustoms["themetastic_sidebar_orientation"];
		$themetastic_activate_sidebar="on";
	} else { $themetastic_activate_sidebar="off"; }

	//Google Data
	$gmapaddress = $pagecustoms["themetastic_gmapadress"];
	$gmapzoom = empty($pagecustoms["themetastic_gmapzoom"]) ? 14 : $pagecustoms["themetastic_gmapzoom"];
	$gmapinfo = empty($pagecustoms["themetastic_gmapinfo"]) ? "" : $pagecustoms["themetastic_gmapinfo"];
	
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
					<h1 style="<?php echo $torient;?>"><?php echo $htitle;?></h1>
					<div class="breadcrumbwrap"><?php the_breadcrumb(); ?></div>
				</div>
			</section>
			<?php if($themetastic_slider==""){ ?><div class="row top40"></div><?php } ?>
		<?php } else { ?>
			<div class="row notitleboxedtop"></div>
		<?php } ?>
	<?php } ?>

	<?php if($gmapaddress!=""){ ?>
		<article class="gmap"><div id="gmap_inner"></div></article>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="<?php echo $template_uri;?>/js/jquery.gmap.js"></script>
		<script>
			  jQuery(window).load(function(){
				  //set google map with marker
				  jQuery("#gmap_inner").gMap({
					  markers: [{
						  address: '<?php echo $gmapaddress; ?>'<?php if($gmapinfo!="") {?>,
						  html: '<?php echo $gmapinfo; ?>' <?php } ?>
						}],
					  zoom: <?php echo $gmapzoom;?>
				  });
			  });
		</script>
	<?php } ?>

<!-- Body -->
<div class="row">

    <!-- Content -->
	<?php if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="right") { ?>
    <div class="span9 left">
    <div class="pagewrapright">
    <?php } else if ($themetastic_activate_sidebar=="on" && $sidebar_orientation =="left") { ?>
    <div class="span9 right">
    <div class="pagewrapleft">
	<?php } else { ?>
    <div class="span12">
    <?php } ?>

    <?php if(have_posts()) :
		while(have_posts()) : the_post();
			the_content();
		endwhile;  //have_posts
		else : ?>
		<div>
			<p><?php _e('Oops, we could not find what you were looking for...', 'themetastic'); ?></p>
		</div>
	<?php endif; ?>

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

    <?php if ($themetastic_activate_sidebar=="on"){?>
    <!--
    #####################
        -	SIDEBAR	-
    #####################
    -->
    <aside class="span3 right sidebar">
        <div class="row">

            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar($sidebar) ) : ?>
                <article class="span3 widget">
                    <div class="footertitle"><h4>Sidebar Widget Area</h4></div>
                    <div class="widgetclass">
                    Please configure this Widget Area in the Admin Panel under Appearance -> Widgets
                    </div><div class="clear"></div>
                </article>
            <?php endif; ?>

        </div>
    </aside>
    <!-- /Sidebar -->
    <?php } ?>

</div><div class="clear"></div>
<!-- /Body -->

<!-- Bottom Spacing -->
<div class="row top50"></div>

</section><!-- /container -->

<?php get_footer(); ?>