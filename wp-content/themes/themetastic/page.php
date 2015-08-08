<?php
	$template_uri = get_template_directory_uri();

	$pagecustoms = getOptions();

	// Themeoptions
	$themeoptions = getThemeOptions();

	//Sidebar
	if (isset($pagecustoms["themetastic_activate_sidebar"])){$sideo = $pagecustoms['themetastic_sidebar_orientation'];}else{$sideo = "";}
	if (isset($pagecustoms["themetastic_activate_sidebar"])){$sidebar = $pagecustoms["themetastic_sidebar"];}else{$sidebar = "Page Sidebar";}

	//Pagetitle
	if(isset($pagecustoms['themetastic_activate_page_title'])){ $headline = "off";} else {$headline = "on";}
	if(isset($pagecustoms['themetastic_header_title']))$htitle = $pagecustoms['themetastic_header_title']; else $htitle=get_the_title();
	$title_orientation = isset($themeoptions['themetastic_title_orientation']) ? $themeoptions['themetastic_title_orientation'] : "left";
	if($title_orientation == "left"){
		$torient = "";
	} else if($title_orientation == "center"){
		$torient = "text-align: center;";
	}

	//Page Slider
	if(isset($pagecustoms["themetastic_activate_slider"])&&$pagecustoms["themetastic_activate_slider"]=="on") {
		$themetastic_slider = $pagecustoms["themetastic_header_slider"];
		$themetastic_slider_height = get_revslider_property($themetastic_slider,"height");
	}else{
		$themetastic_slider ="";
		$themetastic_slider_height = "";
	}

	//Sidebar
	if(isset($pagecustoms["themetastic_activate_sidebar"])){
		if (isset($pagecustoms["themetastic_sidebar"])){$sidebar = $pagecustoms["themetastic_sidebar"];}else{$sidebar = "Blog Sidebar";}
		$sidebar_orientation = $pagecustoms["themetastic_sidebar_orientation"];
		$themetastic_activate_sidebar="on";
	} else { $themetastic_activate_sidebar="off"; }

	/* Theme Layout */
	$themetastic_themelayout = $themeoptions['themetastic_themelayout'];
	$slider_parallax = isset($themeoptions['themetastic_parallax_effects']) ? true : false;
	
	get_header();
?>

<?php if($themetastic_slider!="" && $themetastic_themelayout=="Full-Width"){ ?>
	<div class="homesliderwrapper">
		<div class="row homeslider" style="height:<?php echo $themetastic_slider_height;?>px">
			<?php echo do_shortcode('[rev_slider '.$themetastic_slider.']'); ?>
		</div>
	</div>
    <div class="row firstdivider"></div>
    <?php if ($slider_parallax){ ?><script>jQuery(document).ready(function(){initSliderFun();});</script><?php } ?>
<?php } ?>


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

	<?php if($themetastic_slider!="" && $themetastic_themelayout!="Full-Width"){ ?>
	<article class="homesliderwrapper">
		<div class="row homeslider" style="height:<?php echo $themetastic_slider_height;?>px">
			<?php echo do_shortcode('[rev_slider '.$themetastic_slider.']'); ?>
		</div>
	</article>
    <div class="row firstdivider"></div>
    <?php if ($slider_parallax){ ?><script>jQuery(document).ready(function(){initSliderFun();});</script><?php } ?>	
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
    <section class="span12">
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

    <?php if ($themetastic_activate_sidebar=="on"){?>
    <!--
    #####################
        -	SIDEBAR	-
    #####################
    -->
    <aside class="span3 right sidebar" style="margin-top: 0px !important;">
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