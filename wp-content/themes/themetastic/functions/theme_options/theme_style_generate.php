<?php
function generateCSS(){
	$absolute_path = __FILE__;
	$path_to_file = explode( 'wp-content', $absolute_path );
	$path_to_wp = $path_to_file[0];
	require_once( $path_to_wp.'/wp-load.php' );
	
	$templateurl = get_template_directory_uri();
	
		// Themeoptions
		$themeoptions = getThemeOptions();
	
	
		/* COLORS */
		$highlightcolor = "#".$themeoptions['themetastic_color_highlight'];
	
		/* GOOGLE FONT */
		$headlinefontfamily = $themeoptions['themetastic_font_headlinefamily'];
	
		/* LOGO MARGINS */
		if(empty($themeoptions["themetastic_img_logo_id"])){
			$logo_height = "23";
		} else {
			$logo_height = wp_get_attachment_image_src($themeoptions["themetastic_img_logo_id"], 'full');
			$logo_height = $logo_height[2];
		}
			
		$logo_margin_top = (int)$themeoptions['themetastic_margin_top'];
		$logo_margin_bottom = (int)$themeoptions['themetastic_margin_bottom'];
		
		$mobile_menu_top = $logo_margin_top+($logo_height/2)-20;
		$mobile_menu_bottom = $logo_margin_bottom+($logo_height/2)-12;
		
		$menu_top = $logo_margin_top+($logo_height/2)-6;
		$menu_bottom = $logo_margin_bottom+($logo_height/2)-18;
		
		$header_search_top = $logo_margin_top+($logo_height/2)-16;
	
		/* SUBMENU */
		$submenuwidth = $themeoptions['themetastic_submenuwidth'];
	
		/* Theme Layout */
		$themetastic_themelayout = $themeoptions['themetastic_themelayout'];
		
		
	$data='/*
/*
Theme Name: Themetastic - Responsive Business WordPress Theme
Theme URI: http://themeforest.net/user/damojo?ref=damojo
Author: Damojo
Author URI: http://themeforest.net/user/damojo?ref=damojo
Version: 1.0.1
License: GNU General Public License version 3.0
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Description: themetastic is a responsive multipurpose wordpress theme with loads of features and layout options.

All PHP code is released under the GNU General Public Licence version 3.0
All HTML/CSS/JAVASCRIPT code is released under Envatos Regular License (http://themeforest.net/licenses/regular_extended)

Tags: buddypress,light, white, black, gray, one-column, two-columns, right-sidebar, custom-header, custom-menu, editor-style, featured-image-header, featured-images, theme-options
	
	
	/* ------------------------------------ */
	/* Damojothemes.com Custom Theme Styles */
	/* ------------------------------------ */
	
	/* BASE */
	/* ------------------------------------ */
	
	body { margin: 0; font-family:' . $headlinefontfamily  . '; font-size: 13px; font-weight: 400; line-height: 22px; color: #777; background-color: #fff; overflow-x: hidden; }
	body.wide { border-top: 3px solid ' . $highlightcolor  . '; }
	body.fullwidthlayout { border-top: 3px solid ' . $highlightcolor  . '; }
	body.boxed { border-top: 0; }
	html { overflow-x: hidden;  -webkit-font-smoothing:antialiased; }
	iframe { border: 0; }
	.themecolor { color: ' . $highlightcolor  . '; }
	.bold { font-weight: 700; }
	strong { font-weight: 700; }
	.normal { font-weight: normal; }
	h1,h2,h3,h4,h5,h6 { margin: 0; margin-bottom: 30px; margin-top: 0px; font-family: ' . $headlinefontfamily  . '; font-weight: 300; line-height: 1; color: #111; opacity: 0.99; }
	h2 { font-size: 27px; }
	h5,h6 { margin-bottom: 15px; color: #111; opacity: 0.99; }
	h1 a,h2 a,h3 a,h4 a,h5 a,h6 a { color: #111; }
	h1 a:hover,h2 a:hover,h3 a:hover,h4 a:hover,h5 a:hover,h6 a:hover { color: #111; }
	::selection { background: ' . $highlightcolor  . '; color: #fff; /* Safari */ }
	::-moz-selection { background: ' . $highlightcolor  . '; color: #fff; /* Firefox */ }
	.top80 { margin-top: 80px !important; }
	.top70 { margin-top: 70px !important; }
	.top60 { margin-top: 60px !important; }
	.top50 { margin-top: 50px !important; }
	.top40 { margin-top: 40px !important; }
	.top30 { margin-top: 30px !important; }
	.top20 { margin-top: 20px !important; }
	.top10 { margin-top: 10px !important; }
	.top5 { margin-top: 5px !important; }
	.top0 { margin-top: 0px !important; }
	.margin5 { margin: 5px; }
	.dividerline { float: left; height: 3px; width: 100%; background: #e5e5e5; margin-top: 30px; }
	.clear { clear: both; display: block; overflow: hidden; visibility: hidden; width: 0; height: 0; }
	.left { float: left; }
	.right { float: right; }
	.mr { margin-right: 15px; margin-bottom: 15px; }
	.ml { margin-left: 15px; margin-bottom: 15px; }
	.centered { text-align: center; }
	img.imgleft { display: inline; float: left; margin-right: 25px; margin-top: 0px; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
	img.imgright { display: inline; float: right; margin-left: 25px; margin-top: 0px; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
	.rounded, .rounded img, .rounded.wpb_revslider_element, .rounded iframe { -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC); }
	.rounded .wpb_video_wrapper iframe { -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC); }
	.notfounderror { font-size: 60px; color: ' . $highlightcolor  . '; text-align: center; }
	
	
	/* LIST STYLES */
	/* ------------------------------------ */
	
	ol, ul.square, ul.circle, ul.disc { margin-left: 20px; }
	ul.square { list-style: square outside; color: #777; }
	ul.circle { list-style: circle outside; color: #777; }
	ul.disc { list-style: disc outside; color: #777; }
	ul.liststyle { margin-top: -3px; margin-bottom: -3px; list-style:none}
	ul.liststyle li { float: left; text-indent: -20px; line-height: 22px; width: 100%; height: auto; background: transparent; margin-left: 5px; padding-top: 2px; padding-bottom: 2px; }
	ul.liststyle li:before { color: #444; }
	
	/* LINK STYLES */
	/* ------------------------------------ */
	
	a:hover, a:active, a:focus { outline: 0; }
	a { color: ' . $highlightcolor  . '; text-decoration: none; -webkit-transition: all 0.3s; -moz-transition: all 0.3s; -o-transition: all 0.3s; -ms-transition: all 0.3s; transition: all 0.3s; }
	a:hover { color: #111; text-decoration: none; }
	a.color { color: ' . $highlightcolor  . '; }
	a.color:hover { color: #353535; text-decoration: none; }
	
	/* PAGE TITLE */
	/* ------------------------------------ */
	
	.pagetitlewrap { float: left; border-bottom: 1px solid #e5e5e5; position: relative; width: 100%; left: 0; margin: 0; padding: 0; margin-top: -1px; background: #f3f3f3; }
	.pagetitle { width: 1170px; margin: 0 auto; padding: 0; }
	.pagetitle h1 { float: left; font-family: ' . $headlinefontfamily  . '; font-weight: 300; font-size: 30px; line-height: 30px; margin:0; color: #666; font-style: normal; text-transform: none; text-align: left; margin-top: 31px; margin-bottom: 32px; padding-left: 0px; }
	.pagetitlewrap.boxed { float: left; position: relative; width: 1230px; left: 50%; margin-left: -615px; margin-bottom: 40px; }

	.colored .pagetitlewrap { background: ' . $highlightcolor  . '; border-bottom: 0;}
	.colored .pagetitlewrap .pagetitle h1 { color: #fff; }
	
	.notitleboxedtop { margin-top: 0px; }
	
	/* BREADCRUMBS */
	/* ------------------------------------ */
	
	.breadcrumbwrap { float: right; margin-top: 36px; margin-right: 0px; font-size: 12px; color: #bbb; }
	.breadcrumbwrap a { color: #bbb; }
	.breadcrumbwrap a:hover { color: #111; }
	
	.colored .pagetitlewrap .breadcrumbwrap, .colored .pagetitlewrap .breadcrumbwrap a, .colored .pagetitlewrap .breadcrumbwrap a:hover { color: #fff; }
	
	/* CONTENT CONTAINER */
	/* ------------------------------------ */
	
	.container { margin-top: 40px; }
	
	.allwrapper { background: #FFF; width: 1170px; padding: 0px 30px; margin: auto; }
	.fullwidthlayout .allwrapper {	background: #FFF; width: 100%; padding: 0; margin-left: 0;}
	
	.allwrapper.boxed { background: #FFF; width: 1170px; padding: 0px 30px; margin: auto; }
	.allwrapper.wide {	background: #FFF; width: 100%; padding: 0; margin-left: 0;}
	
	  @media only screen and (min-width: 980px) and (max-width: 1199px) {
		  	.allwrapper {	width:940px;}
		  	.allwrapper.boxed { background: #FFF; width: 940px; padding: 0px 30px; margin: auto; }
		  	.allwrapper.wide {	background: #FFF; width: 100%; padding: 0; margin-left: 0;}
		}
	
	
		@media only screen and (min-width: 768px) and (max-width: 979px) {
			.allwrapper {	width:724px;}
			.allwrapper.boxed { background: #FFF; width: 724px; padding: 0px 30px; margin: auto; }
			.allwrapper.wide {	background: #FFF; width: 100%; padding: 0; margin-left: 0;}
		}
	
	    @media only screen and (min-width: 480px) and (max-width: 767px) {
			.allwrapper, .allwrapper.boxed, .allwrapper.wide  {	width:100%; padding:0px 20px; margin-left: -20px; }
		}
	
	
	    @media only screen and (min-width: 0px) and (max-width: 479px) {
			.allwrapper, .allwrapper.boxed, .allwrapper.wide {	width:100%; padding:0px 20px; margin-left: -20px; }			
	    }
	
	
	/* BACKGROUND */
	/* ------------------------------------ */
	
	.poswrapper { position: fixed; z-index: -1; width: 0; margin: 0 auto; height: 100%; overflow: visible; }
	.whitebackground { position: fixed; top: 0; left: 50%; z-index: -1; width: 1230px; height: 100%; margin-left: -615px; background: #fff; }
	.wide .whitebackground { position: fixed; top: 0; left: 0; z-index: -1; width: 100%; height: 100%; margin-left: 0; background: #fff; }
	
	/* SOCIAL ICONS */
	/* ------------------------------------ */
	
	.social { }
	.social ul { margin: 0; padding: 0; }
	.social li { float: left; display: inline; margin: 0; padding: 0; margin-right: 0px; }
	.social li:last-child { margin-right: 0; }
	.social li a { float: left; width: 32px; height: 32px; opacity: 1; background: #fff; -webkit-transition: all 0.0s; -moz-transition: all 0.0s; -o-transition: all 0.0s; -ms-transition: all 0.0s; }
	.social .s_icon { float: left; font-size: 14px; color: #666; text-align: center; width: 32px; padding-top: 5px; -webkit-transition: all 0.0s; -moz-transition: all 0.0s; -o-transition: all 0.0s; -ms-transition: all 0.0s; }
	.social li a:hover .s_icon { color: #fff; }
	.social ul li a.so_facebook:hover { background: #4672b3; }
	.social ul li a.so_twitter:hover { background: #099bcc; }
	.social ul li a.so_gplus:hover { background: #da4a38; }
	.social ul li a.so_pinterest:hover { background: #c32524; }
	.social ul li a.so_vimeo:hover { background: #8bb225; }
	.social ul li a.so_youtube:hover { background: #cb322c; }
	.social ul li a.so_linkedin:hover { background: #2e8cc2; }
	.social ul li a.so_rss:hover { background: #e97633; }
	
	/* HEADER TOP LINE */
	/* ------------------------------------ */

	.headertopwrap { position: relative; width: 1230px; left: 50%; margin-left: -615px;  padding: 0px; padding-top: 0px; padding-bottom: 0px; color: #999; font-size: 13px; text-transform: normal;  }
	.boxedlayout .headertopwrap { border-top: 3px solid ' . $highlightcolor  . '; }
	.headertopwrap.boxed { border-top: 3px solid ' . $highlightcolor  . '; }
	.headertopwrap.wide { border-top: 0; }
	.headertop { margin-left: 30px; }
	.headertop .textwidget { margin-top: 5px; }
	.headertop .headerlefttext { color: #666; font-size: 12px; text-transform: normal; padding-left: 0px; box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box; float:left;}
	.headertop .headerleftwidget { float:left;}
	.headertop .headerrighttext { color: #666; padding-right: 0px; box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box; }
	.headertop .headerlefttext a { color: #666; }
	.headertop .headerlefttext a:hover { color: #111; }
	.headertop .icon_wrap { float: left; margin-right: 25px; color: #666; }
	.icon_wrap span { margin-right: 7px; }
	.headertop .headerrighttext .headerrightwidget { margin-left: 30px; }
	.headertop .headerrighttext .headerrightwidget:last-child { margin-left: 0px; }
	.headertop .headerrighttext .headerleftwidget { margin-right: 30px; }
	.headertop .headerrighttext .headerleftwidget:last-child { margin-right: 0px; }
	
	/* HEADER */
	/* ------------------------------------ */
	
	.headerwrap { float: left; position: relative; width: 100%; left: 0; margin: 0; padding: 0; border-top: 1px solid #e5e5e5; border-bottom: 1px solid #e5e5e5; }
	/*.colored .headerwrap { border-bottom: 0; }*/
	.boxedlayout .headerwrap { float: left; position: relative; width: 1230px; left: 50%; margin-left: -615px; }
	.header { position: relative; width: 1170px; left: 50%; margin-left: -585px; z-index: 500; }
	.header .logo { float: left; position: relative; padding-top: 0px; padding-bottom: 0px;  padding-left: 0px; margin-top: '.$logo_margin_top.'px; margin-bottom: '.$logo_margin_bottom.'px; }
	
	/* MAIN NAVIGATION */
	/* ------------------------------------ */
	
	.mainmenu { position: relative; margin-left: 0; height: auto; float: right; }
	.ddsmoothmenu { position: relative; margin: 0; z-index: 99; padding-top: 0px; margin-right: 40px; margin-top: -1px; }
	.ddsmoothmenu ul { z-index: 100; margin: 0; padding: 0; list-style-type: none; margin: 0px; }
	.ddsmoothmenu ul ul { background: #fff; padding-top: 10px; padding-bottom: 10px; padding-right: 2px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; border: 1px solid #e5e5e5; -webkit-box-shadow: -3px 3px 13px rgba(0, 0, 0, 0.07), 3px 3px 13px rgba(0, 0, 0, 0.07); -moz-box-shadow: -3px 3px 13px rgba(0, 0, 0, 0.07), 3px 3px 13px rgba(0, 0, 0, 0.07); box-shadow: -3px 3px 13px rgba(0, 0, 0, 0.07), 3px 3px 13px rgba(0, 0, 0, 0.07);}
	/*Top level list items*/
	.ddsmoothmenu ul li { position: relative; display: inline; float: left; background: transparent; }
	.ddsmoothmenu ul li ul li{ padding: 0; margin: 0; white-space:nowrap;}
	.ddsmoothmenu ul ul ul{ padding: 0; margin: 0;}
	/*Top level menu link items style*/
	.ddsmoothmenu ul li a{ display: block; text-decoration: none; padding-left: 13px; padding-right: 13px; margin-right: 0px; border: 0; }
	.ddsmoothmenu ul li:last-child a { margin-right: 0px; }
	* html .ddsmoothmenu ul li a{ /*IE6 hack to get sub menu links to behave correctly*/ display: inline-block; }
	.ddsmoothmenu ul li a:link, .ddsmoothmenu ul li a:visited{ font-weight: 400; color: #666; padding-bottom: '.$menu_bottom.'px; padding-top: '.$menu_top.'px; height: 15px; font-size: 15px; line-height: 15px; text-transform: none; border-top: 1px solid transparent; -webkit-transition: color 0.2s, background-color 0.2s, border-color 0.2s; -moz-transition: color 0.2s, background-color 0.2s, border-color 0.2s; -o-transition: color 0.2s, background-color 0.2s, border-color 0.2s; -ms-transition: color 0.2s, background-color 0.2s, border-color 0.2s; transition: color 0.2s, background-color 0.2s, border-color 0.2s; }
	.ddsmoothmenu ul li.current-menu-item a, .ddsmoothmenu ul li.current-menu-ancestor a { font-weight: 400; color: ' . $highlightcolor  . '; border-top: 1px solid ' . $highlightcolor  . '; padding-bottom: '.$menu_bottom.'px; padding-top: '.$menu_top.'px; }
	.ddsmoothmenu ul li a:hover,
	.ddsmoothmenu ul li a.selected { color: ' . $highlightcolor  . '; padding-bottom: '.$menu_bottom.'px; padding-top: '.$menu_top.'px; }
	.ddsmoothmenu ul li ul li a:link, .ddsmoothmenu ul li ul li a:visited{
	-webkit-transition: all 0 ease-out; -moz-transition: all 0 ease-out; -o-transition: all 0 ease-out; -ms-transition: all 0 ease-out; transition: all 0 ease-out;
	font-weight: 400; background: #fff; color: #666; border: 0; /*border-bottom: 1px solid #797979; border-top: 1px solid #999999;*/ padding: 0; margin: 0; padding-left: 20px; font-size: 13px; line-height: 20px; padding-top: 5px; padding-bottom: 11px; }
	.ddsmoothmenu ul li ul li a:hover { background: #f3f3f3; color: #111; }
	/*1st sub level menu*/
	.ddsmoothmenu ul li ul{ position: absolute; left: 0; display: none; visibility: hidden; }
	/*Sub level menu list items (undo style from Top level List Items)*/
	.ddsmoothmenu ul li ul li{ display: list-item; float: none; border: 0; padding: 0; margin: 0; margin-right: -2px; }
	/*All subsequent sub menu levels vertical offset after 1st level sub menu */
	.ddsmoothmenu ul li ul li ul { padding: 0; margin-left: 0px; margin-top: -10px; padding-top: 10px; padding-bottom: 10px; padding-right: 2px;
	-webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
	.ddsmoothmenu ul li.current-menu-item ul li ul, .ddsmoothmenu ul li.current-menu-ancestor ul li ul { margin-top: 0px;  margin-top: -11px; }
	/* Sub level menu links style */
	.ddsmoothmenu ul li ul li a{ min-width: ' . $submenuwidth  . 'px; /*width of sub menus*/ margin: 0; border-top-width: 0; margin-right: 0px; height: auto; padding-bottom: 10px; }
	.ddsmoothmenu > ul > li > ul > li > ul { }
	.ddsmoothmenu > ul > li > ul > li > ul li a { border-bottom: 0 !important; }
	.ddsmoothmenu > ul > li > ul > li > ul li:last-child a { border-bottom: 0 !important; }
	.ddsmoothmenu ul li ul li:first-child a { border-top: 0; }
	.ddsmoothmenu ul li ul li:last-child a { border-bottom: 0; }
	.ddsmoothmenu li li ul,
	.ddsmoothmenu li li li ul { margin: 0 0 0 0; }
	/* Holly Hack for IE \*/
	* html .ddsmoothmenu{height: 1%;} /*Holly Hack for IE7 and below*/
	/* CSS classes applied to down and right arrow images */
	.downarrowclass{ position: absolute; top: 16px; right: 30px; opacity: 1; -webkit-transition: opacity 0.2s ease-out; -moz-transition: opacity 0.2s ease-out; -o-transition: opacity 0.2s ease-out; -ms-transition: opacity 0.2s ease-out; transition: opacity 0.2s ease-out; }
	.ddsmoothmenu ul li a:hover .downarrowclass { opacity: 0.4; }
	.ddsmoothmenu ul li a.selected .downarrowclass { opacity: 0.4; }
	.ddsmoothmenu ul li.current-menu-item .downarrowclass, .ddsmoothmenu ul li.current-menu-ancestor .downarrowclass { opacity: 0.4; }
	.rightarrowclass{ visibility: hidden; }
	.downarrowclass{ visibility: hidden; }
	
	
	/**************************************************************
		-	MENU AND FIRST CONTAINER ADJUSTMENTS  -
	***************************************************************/
	
	.nopagetitle #firstcontentcontainer				{	margin-top:40px !important;}
	.fullwidthlayout .pagetitlewrap					{	margin-bottom:40px;}
	#firstcontentcontainer							{	margin-top:0px; }
	
	/* TWOLINE AND THREELINE MENUS */
	/*--------------------------------------*/
	
	.homesliderwrapper								{	margin-top: 0px; }  
	.boxedlayout .homesliderwrapper					{	margin-left: -30px; margin-right: -30px; margin-top:-40px; }  
	
	/*.twolinemenu .mainmenu							{	float:left;padding-left:20px;}
	.twolinemenu .logo								{	padding-bottom:20px;}
	.twolinemenu .ddsmoothmenu >ul>li>a:link,
	.twolinemenu .ddsmoothmenu >ul>li>a:visited		{	padding-top:14px; padding-bottom:23px; }
	.twolinemenu .headersearch						{	top:8px;}
	
	.threelinemenu .mainmenu						{	float:left; padding-left:20px;}
	.threelinemenu .logo							{	padding-bottom:20px;}
	.threelinemenu .ddsmoothmenu >ul>li>a:link,
	.threelinemenu .ddsmoothmenu >ul>li>a:visited	{	padding-top:14px; padding-bottom:13px; }
	.threelinemenu .headersearch					{	top:8px;}
	
	.twolinemenu .pagetitlewrap						{	padding-top:12px;margin-top:70px;}
	.twolinemenu .homesliderwrapper					{	margin-top:70px;} 
	.twolinemenu.nopagetitle #firstcontentcontainer	{	margin-top:163px !important;}
	
	.threelinemenu .pagetitlewrap						{	padding-top:13px;margin-top:120px;}
	.threelinemenu .homesliderwrapper					{	margin-top:121px;}  
	.threelinemenu.nopagetitle #firstcontentcontainer	{	margin-top:214px !important}*/
	
	.tp-captions,
	.tp-parallax									{	-webkit-backface-visibility: hidden;}

	.slotholder										{	position:relative;z-index:1;background: transparent; -webkit-backface-visibility: hidden;-webkit-perspective: 1000;-webkit-transform: translateZ(-1000px);}

	
	/* TOOLTIPS */
	/* ------------------------------------ */
	
	.tooltip-inner { background-color: #666; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
	.tooltip.in { opacity: 1; filter: alpha(opacity=100); }
	.tooltip.top .tooltip-arrow { border-top-color: #666; }
	.tooltip.right .tooltip-arrow { border-right-color: #666; }
	.tooltip.left .tooltip-arrow { border-left-color: #666; }
	.tooltip.bottom .tooltip-arrow { border-bottom-color: #666; }
	
	
	/* HOME SLIDER */
	/* ------------------------------------ */
	
	.homeslider { position: relative; z-index: 1; width: 100%; margin-left: 0px; }
	.nodisplay { display: none; }
	.homeslider .rev_slider_wrapper { position: relative !important; z-index: 1 !important; }
	.rounded .rev_slider_wrapper { -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC); }
	.homesliderwrapper { position: relative; margin-left: 0px; margin-right: 0px; }
	.homesliderwrapper .homeslider { margin-left: 0px; }
	
	.rev_slider_wrapper a { color: #fff; }
	.rev_slider_wrapper a:hover { color: #fff; }
	
	/* START HEIGHT OF REVOLUTION SLIDER */
	/*.homeslider {	height:450px; }*/

    @media only screen and (min-width: 480px) and (max-width: 767px) {
		.homeslider {	height:230px; }

	}

    @media only screen and (min-width: 0px) and (max-width: 479px) {
		.homeslider {	height:150px; }
    }
	    
	
	/* POST SLIDER */
	/* ------------------------------------ */
	
	.postslider { }
	
	/* MODULE DIVIDER */
	/* ------------------------------------ */
	
	.moduletitle { margin-left: 0; width: 100%; margin-top: -6px; margin-bottom: 23px; padding-bottom: 0px; }
	.moduletitle .titletext { float: left; }
	.moduletitle .titletext h2 { line-height: 30px; margin: 0px; text-align: left; padding-right: 10px; }
	.moduletitle .linktext { float: right; margin-top: 9px; }
	.moduletitle .linktext a span { float: right; line-height: 15px; }
	.moduletitle .linktext a { font-size: 15px; color: #bbb; padding-left: 10px; font-weight: 400; }
	.moduletitle .linktext a:hover { color: #111; }
	
	.contenttitle { float: left; margin-left: 0; width: 100%; margin-top: -5px; margin-bottom: 25px; padding-bottom: 0px; }
	.contenttitle .titletext { float: left; }
	.contenttitle .titletext h2 { line-height: 30px; margin: 0px; margin-top: 0px; text-align: left; font-weight: 300; }
	
	/* PAGE DIVIDER */
	/* ------------------------------------ */
	
	.pagedivider { margin-left: 0; height: 0px; width: 100%; margin-top: 40px; margin-bottom: 0px; }
	.dotdivider { float: left; margin-left: 0; width: 100%; background: url(../img/tiles/threedot.png) repeat-x 0 0; height: 7px; margin-top: 10px; margin-bottom: 40px; }
	.divider { float: left; margin-left: 0; width: 100%; background: #fbfbfb; height: 1px; }
	.firstdivider { margin-left: 0; width: 100%; height: 0px; margin-bottom: 40px; }
	
	/* TEXT CONTENT */
	/* ------------------------------------ */
	
	.textcontent { margin-bottom: 0px; }
	p { margin-bottom: 20px; }
	
	/* HOME SERVICES */
	/* ------------------------------------ */
	
	.servicemodifier { float: left; margin-bottom: -40px; }
	.servicewrap { float: left; position: relative; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; width: 100%;}
	.serviceicon { float: left; height: 40px; width: 40px; background: #666; margin-right: 0px;-webkit-transition: all 0.4s; -moz-transition: all 0.4s; -o-transition: all 0.4s; -ms-transition: all 0.4s; transition: all 0.4s; -webkit-border-radius: 30px; -moz-border-radius: 30px; border-radius: 30px; }
	.serviceicon div { height: 40px; width: 40px; text-align: center; }
	a.service h5 { padding-left: 60px; font-weight: 400; margin-top: 5px; margin-bottom: 8px; line-height: 20px; -webkit-transition: all 0.2s; -moz-transition: all 0.4s; -o-transition: all 0.4s; -ms-transition: all 0.4s; transition: all 0.4s; color: #bbb; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; width: 100%;}
	a.service h4 { padding-left: 60px; margin-top: 0px; margin-bottom: 2px; font-size: 27px; line-height: 27px; text-transform: none; font-weight: 300; text-align: left; -webkit-transition: all 0.4s; -moz-transition: all 0.4s; -o-transition: all 0.4s; -ms-transition: all 0.4s; transition: all 0.4s; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; width: 100%;}
	a.service { float: left; margin-bottom: 34px; margin-top: -3px; text-align: left; color: #777; text-decoration: none; -webkit-transition: color 0.4s; -moz-transition: color 0.4s; -o-transition: color 0.4s; -ms-transition: color 0.4s; transition: color 0.4s; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; width: 100%;}
	a.service .text { padding-left: 60px; float: left; padding-top: 5px; margin-top: 3px; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box; width: 100%; }
	a.service:hover .text { }
	a.service:hover h4 { color: ' . $highlightcolor  . '; }
	a.service:hover h5 { color: ' . $highlightcolor  . '; }
	a.service p { margin-bottom: 0; }
	a.service .serviceicon { font-size: 20px; line-height:38px; color: #fff; }
	a.service:hover .serviceicon { background: ' . $highlightcolor  . '; }
	span.hlink { color: ' . $highlightcolor  . '; float: left; margin-top: 8px; -webkit-transition: all 0.4s; -moz-transition: all 0.4s; -o-transition: all 0.4s; -ms-transition: all 0.4s; transition: all 0.4s;}
	span.hlink:hover { color: #111; }
	
	/* TEAM */
	/* ------------------------------------ */
	
	.team { float: left; width: 100%; display:table; /*margin-top: -10px; margin-bottom: -10px;*/ }
	.team:first-child { margin-top: -10px; }
	.team .memberwrap { float: left; width: 25%; text-align: left; text-decoration: none; display:table-cell;  box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box; position:relative; }
	.team .member { -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; position:relative; padding: 30px; background: #fefefe; padding-bottom: 10px; border: 1px solid #e5e5e5; margin: 10px;  }
	.team .member img { -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; width:100%;}
	.team .member h4 { margin-top: 11px; margin-bottom: 0px; font-size: 20px; line-height: 20px; text-transform: none; font-weight: 300; text-align: left; }
	.team .member h5 { font-weight: normal; color: #bbb; font-size: 13px; margin-top: 4px; margin-bottom: 10px; line-height: 20px; }
	
	ul.teamsocial { margin: 0; padding: 0; width: 100%; height: 24px; margin-bottom: 14px; margin-top: -10px; }
	.teamsocial li { float: left; display: inline; margin: 0; padding: 0; margin-right: 3px; }
	.teamsocial li:last-child { margin-right: 0;clear:right; }
	.teamsocial li a { float: left; height: 24px; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; opacity: 1; background: #fefefe; -webkit-transition: all 0.1s; -moz-transition: all 0.1s; -o-transition: all 0.1s; -ms-transition: all 0.1s; }
	.teamsocial .s_icon { font-size: 14px; color: #666; background: transparent; text-align: center; width: 24px; padding-top: 2px; -webkit-transition: all 0.1s; -moz-transition: all 0.1s; -o-transition: all 0.1s; -ms-transition: all 0.1s; }
	.teamsocial li a:hover .s_icon { color: #fff; }
	.teamsocial li a.so_mail:hover { background: #000; border: 0px solid #fff; filter: none; }
	.teamsocial li a.so_phone:hover { background: #000; border: 0px solid #fff; filter: none; }
	.teamsocial li a.so_fb:hover { background: #4672b3; border: 0px solid #fff; filter: none; }
	.teamsocial li a.so_tw:hover { background: #099bcc; border: 0px solid #fff; filter: none; }
	.teamsocial li a.so_gp:hover { background: #da4a38; border: 0px solid #fff; filter: none; }
	.teamsocial li a.so_pi:hover { background: #c32524; border: 0px solid #fff; filter: none; }
	.teamsocial li a.so_vi:hover { background: #8bb225; border: 0px solid #fff; filter: none; }
	.teamsocial li a.so_yt:hover { background: #cb322c; border: 0px solid #fff; filter: none; }
	.teamsocial li a.so_li:hover { background: #2e8cc2; border: 0px solid #fff; filter: none; }
	.teamsocial li a.so_rs:hover { background: #e97633; border: 0px solid #fff; filter: none; }
	
	.team.solo .memberwrap { width:100%; }
	
	/* CLIENTS */
	/* ------------------------------------ */
	
	.clients { margin-left: 0; width: 100%; }
	.clients ul { float: left; margin: 0; padding: 0; width: 100%; position: relative; }
	.clients ul li { float: left; display: inline; width: 20%; }
	.clients ul li a { float: left; width:100%; height:auto;  }
	.clients ul li img { width:100%; height:auto; 
		filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 1 0\'/></filter></svg>#grayscale");
		filter: none;
		-webkit-filter: grayscale(0%);
	}
	.client { border-right: 1px solid #eee; border-left: 1px solid #eee; margin-right: -1px; }
	.clients ul li img:hover {
		filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 10+, Firefox on Android */
		filter: gray; /* IE6-9 */
		-webkit-filter: grayscale(100%); /* Chrome 19+, Safari 6+, Safari 6+ iOS */
	}
	
	/* PRICING */
	/* ------------------------------------ */
	
	.pricing { float: left; width: 100%; margin-top: 0px; }
	.pricing .pricewrap { float: left; text-align: center; border: 1px solid #e5e5e5; margin: 0.8%; margin-top: 10px; margin-bottom: 10px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
	.pricing .pricewrap div { margin: 0; list-style: none; }
	.pricing .thead { font-size: 20px; line-height: 20px; font-weight: 700; padding: 20px; padding-top: 15px; padding-bottom: 15px; background: #f3f3f3; color: #666; border-bottom: 1px solid #e5e5e5; }
	.pricing .thead .byline { font-size: 13px; line-height: 20px; color: #bbb; font-weight: 400; text-transform: none; margin-top: 4px; }
	.pricing .price { font-size: 35px; line-height: 25px; font-weight: bold; padding: 20px; padding-top: 20px; padding-bottom: 15px; background: #fff; color: ' . $highlightcolor  . '; border-bottom: 1px solid #eee; }
	.pricing .price .dollar { color: ' . $highlightcolor  . '; font-size: 17px; margin-right: -5px; margin-left: -10px; font-weight: normal; }
	.pricing .item { background: #fff; color: #777; padding: 20px; padding-top: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee; }
	.pricing .buy { padding-top: 20px; padding-bottom: 20px; background: #f3f3f3; }
	
	.pricecol.highlight .pricewrap { position: relative; z-index: 1; border: 1px solid #e5e5e5; margin-top: 0px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
	.pricing .highlight .thead { background: ' . $highlightcolor  . '; color: #fff; padding-top: 25px; border-bottom: 1px solid #fff; -webkit-border-top-left-radius: 5px;
	-webkit-border-top-right-radius: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px; }
	.pricing .highlight .thead .byline { color: #fff; }
	.pricing .highlight .buy { padding-top: 20px; padding-bottom: 30px; }
	
	.pricing.fivecols .pricecol .pricewrap { float: left; width: 19.8%; }
	.pricing.fourcols .pricecol .pricewrap { float: left; width: 24.8%; }
	.pricing.threecols .pricecol .pricewrap { float: left; width: 33.1%; }
	
	/* CONTENT TALBE */
	/* ------------------------------------ */
	
	.contenttable {
	font-size: 13px;
	float: left;
	-webkit-border-radius: 5px;
	-moz-border-radius: 5px;
	border-radius: 5px;
	padding: 18px;
	padding-left: 30px;
	padding-right: 30px;
	background: #f3f3f3;
	border: 0;
	width: 100%;
	box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;
	}
	.contenttable strong { }
	.contenttable table { border-collapse:collapse; width: 100%; }
	.contenttable table td { padding: 0px; padding-right: 0; padding-bottom: 2px; padding-top: 2px; }
	.contenttable table tr { border-bottom: 0px solid #e5e5e5; }
	.contenttable table tr:last-child { border-bottom: 0; }
	.wpb_wrapper .wpb_wrapper .contenttable { margin-top: -25px; }
	
	/* HOME BLOG POSTS */
	/* ------------------------------------ */
	
	.homeposts { float: left; margin-bottom: -1px; }
	.homepost { float: left; margin-bottom: 10px; border: 1px solid #e5e5e5; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box; 
		padding-top: 18px; padding-left: 8px; padding-right: 20px; padding-bottom: 15px;
	}
	.homeposts .homepost:nth-last-child(-n+2) { margin-bottom: 0px; }
	.homepost h4 { float: left; font-size: 20px; line-height: 30px; margin-top: -5px; margin-bottom: 0px; width: 100%; }
	.homepost .post { float: right; width: 100%; }
	.homepost .postbody  { float: left; padding-left: 66px; }
	.homepost .posttext  { float: left; }
	.homepost .postinfo { margin-top: 0px; margin-bottom: 9px; }
	.contentarea { float: left;  }
	
	/* BLOG POSTS */
	/* ------------------------------------ */
	
	.blogpost { float: left; margin-bottom: 0px; position: relative; width: 100%; }
	.blogpost h2 { box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box; padding-left: 60px; float: left; width: 100%; font-size: 25px; line-height: 30px; margin-top: -6px; margin-bottom: 4px; text-align: left; }
	.blogpost .post { float: right; width: 100%; margin-top: 0px; }
	.blogpost .postbody  { float: left; padding-left: 0px; position: relative; width: 100%; }
	.blogpost .postmedia { margin-bottom: 20px; position: relative; z-index: 1; overflow: hidden; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC);  }
	.blogpost .postmedia img { width: 100%; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
	.blogpost .postmedia-slide { margin-bottom: 16px; position: relative; z-index: 1; overflow: hidden; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC);  }
	.blogpost .scalevid { overflow: hidden; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; background: #f3f3f3; }
	.blogpost .posttext  { float: left; margin-bottom: -8px; padding-left: 0px; padding-right: 140px; min-height: 47px; }
	.blogpost .posttext p { margin-bottom: 0px; }
	.blogpost .postdivider { float: left; margin-left: 0; width: 100%; background: #e5e5e5; height: 1px; margin-top: 41px; margin-bottom: 40px; }
	.blogpost .readmore { float: right; position: absolute; right: 0px; margin-top: 9px; }
	.blogpost .readmore a { float: left; }
	
	.blogpost.sticky h2 a { color: ' . $highlightcolor  . '; }
	.blogpost.sticky h2 a:hover { color: #111; }
	.blogpost.sticky .month, .blogpost.sticky .month, .blogpost.sticky .day, .blogpost.sticky .day  { color: ' . $highlightcolor  . '; }
	
	.blogpost.singlepost .posttext  { padding-right: 0px; margin-bottom: -27px; }
	.blogpost.singlepost .posttext p { margin-bottom: 20px; }
	.blogpost.singlepost .postbody  { margin-bottom: 4px; }
	.blogpost.singlepost .postmedia { margin-bottom: 20px; }
	.blogpost.singlepost .postmedia-slide { margin-bottom: 20px; }
	.blogpost.singlepost .postinfo { margin-bottom: 26px; }

	
	.blogpost.smallmedia .readmore { float: left; position: relative; right: 0px; margin-top: 21px; }
	.blogpost.smallmedia .posttext  { float: left; margin-bottom: -7px; padding-left: 0px; padding-right: 0px; min-height: 0px;  }
	.blogpost.smallmedia .date { margin-left: -10px; }
	.blogpost.smallmedia .postmedia { float: left; width: 270px; margin-bottom: 0px; }
	.blogpost.smallmedia .postbody { float: right; width: 550px; padding-left: 30px; }
	.blogpost.smallmedia h2 { padding-left: 50px; }
	.blogpost.smallmedia .postinfo { padding-left: 50px; }
	
	.blogpost.nosmallmedia .readmore { float: left; position: relative; right: 0px; margin-top: 21px; }
	.blogpost.nosmallmedia .posttext  { float: left; margin-bottom: -7px; padding-left: 0px; padding-right: 0px; width: 100%; min-height: 0px; }
	.blogpost.nosmallmedia .date { margin-left: -10px; }
	.blogpost.nosmallmedia .postmedia { float: left; width: 270px; margin-bottom: 0px; }
	.blogpost.nosmallmedia .postbody { float: right; width: 100%; padding-left: 0px; }
	.blogpost.nosmallmedia h2 { padding-left: 60px; }
	.blogpost.nosmallmedia .postinfo { padding-left: 60px; }
	
	.fullblog .blogpost.smallmedia .postmedia { width: 370px; }
	.fullblog .blogpost.smallmedia .postbody { width: 770px; }
	
	.blogpost.nodate .date { display: none; }
	.blogpost.nodate h2 { padding-left: 0px; }
	.blogpost.nodate .postinfo { padding-left: 0px; }
	
	.blogpost.smallmedia.nodate h2 { padding-left: 0px; }
	.blogpost.smallmedia.nodate .postinfo { padding-left: 0px; }
	
	.blogpost.singlefolio h2 { padding-right: 120px; }
	.blogpost.singlefolio .postinfo { padding-right: 120px; }
	
	/* Postinfo */
	.postinfo { float: left; font-size: 13px; margin-bottom: 9px; width: 100%; box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box; }
	.postinfo .time, .postinfo .tags, .postinfo .author, .postinfo .categories, .postinfo .comments, .postinfo .readmore { float: left; color: #aaa; margin-right: 20px; margin-bottom: 0px; font-size: 12px; text-transform: none; line-height: 18px; }
	.postinfo a { line-height: 18px; }
	.postinfo a:hover { color: #111; }
	.blogpost .postinfo { padding-left: 60px; margin-bottom: 15px; }
	
	/* Post Date Box */
	.blogpost .date, .homepost .date { float: left; width: 40px; position: absolute; margin-top: 0px; }
	.blogpost .month, .homepost .month  { width: 40px; font-size: 14px; line-height: 12px; font-weight: 700; color: #666; text-align: center;  padding-top: 3px; }
	.blogpost .day, .homepost .day { width: 40px; font-size: 27px; line-height: 27px; font-weight: 700; color: #666; text-align: center; margin-top: -3px; }
	.blogpost .year, .homepost .year { width: 40px; font-size: 15px; line-height: 15px; font-weight: normal; text-transform: uppercase; color: #000; text-align: center; padding-top: 7px; }
	.blogpost .date { margin-left: -6px; margin-top: -2px; }
	.homepost .date { margin-left: 5px; }
	.blogpost .month { padding-top: 8px; }
	.datespacer { position: relative; float: left; width: 0px; margin-bottom: 22px; }
	
	/* COMMENTS */
	/* ------------------------------------ */
	
	#comments { float: left; width: 100%; margin-bottom: -10px; margin-top: -3px; }
	#comments h4 { margin-top: 0px; margin-bottom: 23px; }
	#comments .author h5 { margin-top: 8px; margin-bottom: 6px; font-size: 15px; color: #666; font-weight: 400; }
	#comments .author h5 a { color: #666; }
	#comments ol, #comments ul { float: left; position: relative; list-style: none; margin:0; padding:0; zoom: 1.0; width: 100%; }
	#comments ul li { margin: 0; padding: 0; width: 100%; float: left; }
	#comments .commentwrap { position: relative; width: auto; margin-bottom: 20px; padding: 20px; padding-bottom: 0; margin-bottom: 10px; -moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; border: 1px solid #e5e5e5; }
	
	#comments .commentwrap .posterpic{ float: left; width: 50px; height: 50px; margin-right: 15px; }
	#comments .commentwrap .posterpic img { -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
	#comments .commentwrap .postertext{ display: inline-block; margin-top: 22px; margin-bottom: 5px; }
	#comments .depth-1 .commentwrap { margin-left: 0px; }
	#comments .depth-2 .commentwrap { margin-left: 20px; }
	#comments .depth-3 .commentwrap { margin-left: 40px; }
	#comments .depth-4 .commentwrap { margin-left: 60px; }
	#comments .depth-5 .commentwrap { margin-left: 80px; }
	#comments .replylink { position: absolute; right: 20px; top: 15px; }
	.timestamp { float: left; font-size: 12px; margin-top: 0px; color: #bbb; }
	.timestamp a { color: #bbb; }
	
	/* Comments Reply */
	#reply-title { float: left; width: 100%; margin: 0; padding: 0;}
	.responddivider { float: left; margin-left: 0; width: 100%; margin-top: 0px; margin-bottom: 19px; }
	#respond { float: left; width: 100%; margin-top: 0px; margin-bottom: -10px; }
	#respond form { float: left; width: 100%; margin-bottom: 0px; }
	#respond button { margin-bottom: 0px; }
	#respond textarea { width: 100%; max-width: 100%; float: left; height: 150px; }
	#respond input { float: left; width: 32% !important; margin-right:2% !important; }
	#respond input.last { margin-right: 0 !important; }
	#respond #submit { display: block; font-weight: bold; float: left; margin-right: 0 !important; margin-bottom: 10px; margin-top: 10px; width: auto !important; }
	#cancel-comment-reply-link { float: left; margin-top: -3px; margin-bottom: 10px; }
	
	/* Related Posts */
	.relatedposts .homeposts { float: left; width: 100%; }
	.relatedposts .homeposts .homepost { float: left; width: 100% !important; }
	.relatedwrap { margin-left: 0px; width: 100%; }
	.relatedposts { float: left; width: 100%; margin-top: 0px; margin-left: 0; }
	
	/* HIGHLIGHT BOX */
	/* ------------------------------------ */
	
	.highlightbox { float: left; margin-left: 0; background: #f3f3f3; padding: 30px; padding-top: 15px; padding-bottom: 15px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; border: 0; color: #999; font-size: 13px; }
	.highlightbox h1,.highlightbox h2,.highlightbox h3,.highlightbox h4,.highlightbox h5,.highlightbox h6 { margin-top: 0; margin-bottom: 12px; color: #666; }
	.highlightbox h2 { line-height: 35px; }
	.highlightbox .nobottom { margin-bottom: 0; }
	.highlightbox .one_half, .highlightbox .one_third, .highlightbox .two_third, .highlightbox .three_fourth, .highlightbox .one_fourth, .highlightbox .one_fifth, .highlightbox .one_sixth { margin-bottom: 0px; }
	.highlightbox p { margin-bottom: 15px; }
	.highlightbox .btnpos { margin-top: -20px; }
	.btnposright { float: right; }
	.alignright { text-align: right; }
	.aligncenter { text-align: center; }
	
	/* COLUMN SHORTCODES */
	/* ------------------------------------ */
	
	.one_half { width: 48%; }
	.one_third { width: 30.66%; }
	.two_third { width: 65.33%; }
	.three_fourth { width: 74%; }
	.one_fourth { width: 22%; }
	.one_fifth { width: 16.8%; }
	.one_sixth { width: 13.33%; }
	.one_half, .one_third, .two_third, .three_fourth, .one_fourth, .one_fifth, .one_sixth { margin-right: 4%; margin-bottom: 20px; float: left; }
	.lastcolumn { margin-right: 0!important; clear: right; }
	
	/* SIDEBAR */
	/* ------------------------------------ */
	
	.pagewrapright { padding-right: 20px; }
	.pagewrapleft { padding-left: 20px; }
	.sidebar { font-size: 13px; line-height: 22px; margin-top: 60px; }
	.sidebar .footertitle { float: left; width: 100%; }
	.sidebar .footertitle h4 {  float: left; color: #111; font-size: 17px; line-height: 20px; font-weight: 300; margin-top: -3px; margin-bottom: 26px; }
	.sidebar .widget { float: left; margin-bottom: 50px; }
	.sidebar .widget:last-child { margin-bottom: 0; }
	.sidebar .widget ul, .footer .widget ul { float: left; }
	
	/* FOOTER */
	/* ------------------------------------ */
	
	.footerwrap { position: relative; width: 1230px; left: 50%; margin-left: -615px; background: #444; padding: 0px; padding-top: 50px; padding-bottom: 0px; margin-bottom: 0;  }
	.footerwrap.wide { width: 100%; left: 0; margin-left: 0; background: #444; padding: 0px; padding-top: 50px; padding-bottom: 0px; margin-bottom: 0; }
	.footer { margin-left: 30px; font-size: 13px; line-height: 22px; }
	.footerwrap.wide .footer { margin: 0 auto; width: 1170px; }
	.footer .widget { float: left; color: #888; margin-bottom: 50px;  }
	.footer h1,.footer h2,.footer h3,.footer h4,.footer h5,.footer h6 { color: #fff; }
	.footer a { color: #bbb; }
	.footer a:hover { color: #fff; }
	.footer .footertitle { float: left; width: 100%; }
	.footer .widgettitlebg { float: left;  }
	.footer .footertitle h4 { float: left; color: #fff; font-size: 17px; line-height: 20px; font-weight: 400; margin-top: -3px; margin-bottom: 26px; }	
	.footer .widget .widget { margin-bottom:0px; }
	.footer article:first-child { margin-left:0; }
	.footer .widget .widget { margin-top:40px }
	.footer .widget.first { margin-top:0 }
	
	/* SUBFOOTER */
	/* ------------------------------------ */
	
	.subfooterwrap { position: relative; width: 1170px;  left: 50%; margin-left: -585px; padding: 0px; padding-top: 4px; padding-bottom: 9px; background: #353535; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;  }
	.subfooterwrap.wide { position: relative; width: 1170px;  left: 50%; margin-left: -585px; padding: 0px; padding-top: 4px; padding-bottom: 9px; background: #353535; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
	.subfooter { margin-left: 30px; color: #666; font-size: 13px; line-height: 22px; margin: 0 auto; width: 1170px;  }
	.subfooterwrap.wide .subfooter { margin: 0 auto; width: 1170px; }
	.subfooter a { color: #bbb; background: none; }
	.subfooter a:hover { color: #fff; background: none; }
	.subfooter .lefttext { text-align: left; box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box; padding-left: 20px;}
	.subfooter .righttext { text-align: right; box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box; padding-right: 20px; }
	.subfooter .righttext .first {float: right;}
	.subfooter .spacer {padding-right: 15px; }
	.subfooter .textwidget { margin-top: 5px; }
	
	/* WIDGETS */
	/* ------------------------------------ */
	
	.widgetclass { float: left; width: 100%; }
	
	/* Posts */
	.footer .widget_posts { float: left; margin-top: -1px; width: 100%;}
	.footer .widget_posts ul { margin: 0; padding: 0; list-style:none; width: 100%;}
	.footer .widget_posts ul li { float: left; width: 100%; border-bottom: 1px solid #4f4f4f; padding-top:7px; padding-bottom: 7px; }
	.footer .widget_posts ul li span { font-size: 15px; line-height: 15px; text-shadow: none;  margin-right: 1px; margin-left: -4px; color: #bbb; -webkit-transition: all 0.15s; -moz-transition: all 0.15s; -o-transition: all 0.15s; -ms-transition: all 0.15s; transition: all 0.15s; }
	.footer .widget_posts ul li a:hover span { color: #fff; }
	.footer .widget_posts ul li:first-child { border-top: 0; padding-top: 0; }
	.footer .widget_posts ul li:last-child { border-bottom: 0; padding-bottom: 0; }
	
	.sidebar .widget_posts { float: left; margin-top: -1px; width: 100%; }
	.sidebar .widget_posts ul { margin: 0; padding: 0; list-style:none; width: 100%; }
	.sidebar .widget_posts ul li { float: left; width: 100%; border-bottom: 1px solid #eee; border-top: 0; padding-top:7px; padding-bottom: 7px; }
	.sidebar .widget_posts ul li a { color: #111; font-weight: 300; }
	.sidebar .widget_posts ul li span { f font-size: 15px; line-height: 15px; text-shadow: none;  margin-right: 1px; margin-left: -4px; color: ' . $highlightcolor  . '; -webkit-transition: all 0.15s; -moz-transition: all 0.15s; -o-transition: all 0.15s; -ms-transition: all 0.15s; transition: all 0.15s;  }
	.sidebar .widget_posts ul li:first-child { border-top: 0; padding-top: 0; }
	.sidebar .widget_posts ul li:last-child { border-bottom: 0; padding-bottom: 0; }
	
	/* Contact Box */
	.contactbox { float: left; width: 100%; -moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box; background: #292929; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; padding: 20px; }
	
	/* Twitter */
	.twitter-timeline { margin-bottom: -20px; margin-top: -7px; }
	
	/* Tag Cloud */
	.footer .tagcloud a { -webkit-backface-visibility: hidden; float: left; font-size: 12px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;  text-decoration: none; color: #bbb; font-weight: normal; background-color: #353535; padding-bottom: 4px; padding-top: 4px; padding-left: 8px; padding-right: 8px; margin-right: 5px; margin-bottom: 5px; -webkit-transition: background-color 0.2s, color 0.2s; -moz-transition: background-color 0.2s, color 0.2s; -o-transition: background-color 0.2s, color 0.2s; -ms-transition: background-color 0.2s, color 0.2s; transition: background-color 0.2s, color 0.2s; }
	.footer .tagcloud a:hover { background-color: ' . $highlightcolor  . '; color: #fff; }
	.sidebar .tagcloud a { font-size: 12px; float: left; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; font-size: 11px; color: #bbb; text-decoration: none; font-weight: normal; background-color: #fff; border: 1px solid #eee; padding-bottom: 2px; padding-top: 2px; padding-left: 7px; padding-right: 7px; margin-right: 5px; margin-bottom: 5px; -webkit-transition: background-color 0.2s, color 0.2s, border-color 0.2s; -moz-transition: background-color 0.2s, color 0.2s, border-color 0.2s; -o-transition: background-color 0.2s, color 0.2s, border-color 0.2s; -ms-transition: background-color 0.2s, color 0.2s, border-color 0.2s; transition: background-color 0.2s, color 0.2s, border-color 0.2s; }
	.sidebar .tagcloud a:hover { background-color: ' . $highlightcolor  . '; border-color: ' . $highlightcolor  . '; color: #fff; }
	
	/* Categories */
	.widget_flickr { float: left; width: 100%; }
	.widget_flickr ul { float: left; margin: 0; padding: 0; list-style:none; margin-bottom: -10px; }
	.widget_flickr ul li { float: left; margin-right:10px; margin-bottom: 10px; }
	.widget_flickr li a { opacity: 1; -webkit-transition: all 0.2s; -moz-transition: all 0.2s; -o-transition: all 0.2s; -ms-transition: all 0.2s; }
	.widget_flickr li a:hover { opacity: 0.5; }
	
	/* Projects */
	.widget_projects { float: left; width: 100%; }
	.widget_projects ul { float: left; margin: 0; padding: 0; list-style:none; margin-bottom: -10px; margin-right: -10px; }
	.widget_projects ul li { float: left; margin-right:10px; margin-bottom: 10px; }
	.widget_projects li a { -webkit-backface-visibility: hidden; float: left; z-index: 1; position: relative; -webkit-transition: all 0.2s; -moz-transition: all 0.2s; -o-transition: all 0.2s; -ms-transition: all 0.2s; }
	.widget_projects li a img { -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; width: 50px; height: 50px; border: 5px solid #353535; 
		-webkit-backface-visibility: hidden; 
		-webkit-transition: all 0.2s;
		-moz-transition: all 0.2s;
		-o-transition: all 0.2s;
		-ms-transition: all 0.2s;

		filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 1 0\'/></filter></svg>#grayscale");
		filter: none;
		-webkit-filter: grayscale(0%);
	}
	.widget_projects li a img:hover { 
		filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 10+, Firefox on Android */
		filter: gray; /* IE6-9 */
		-webkit-filter: grayscale(100%); /* Chrome 19+, Safari 6+, Safari 6+ iOS */
	 }
	.widget_projects li .overl { z-index: 0; position: absolute; float: left; background: none; width: 60px; height: 60px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;  }
	
	.sidebar .widget_projects li a img { width: 60px; height: 60px; border: 0; }
	
	/* Posts */
	.footer .widget_text, .sidebar .widget_text { float: left; width: 100%; }
	
	/* WORDPRESS STANDARD WIDGETS */
	/* ------------------------------------ */
	
	#calendar_wrap { float: left; width: 100%; font-size: 12px; }
	#wp-calendar { float: left; width: 100%; border-spacing: 5px; }
	#wp-calendar thead { -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
	#wp-calendar thead tr { background: #eee; color: #777; font-size: 12px; }
	#wp-calendar tbody { text-align: center; }
	#wp-calendar caption { font-weight: bold; color: #777; text-align: left; margin-bottom: 8px; margin-top: -7px; }
	#wp-calendar tbody td { padding: 4px; margin: 0; border: 1px solid #eee; color: #777; background: #fefefe; }
	#wp-calendar tbody td a { color: ' . $highlightcolor  . '; }
	#wp-calendar tbody td a:hover { color: #aaa; }
	
	.footer #wp-calendar thead tr { background: #222; color: #777; font-size: 12px; }
	.footer #wp-calendar caption { font-weight: bold; color: #777; text-align: left; margin-bottom: 8px; margin-top: -7px; }
	.footer #wp-calendar tbody td { padding: 4px; margin: 0; border: 1px solid #3e3e3e; color: #777; background: #292929; }
	.footer #wp-calendar tbody td a { color: #aaa; }
	.footer #wp-calendar tbody td a:hover { color: #fff; }
	
	/* Archive & Categories & Meta */
	.widget_archive select, .widget_categories select, .widget_meta select, .widget_recent_entries select { width: 100%; }
	.widget_archive, .widget_categories, .widget_meta, .widget_recent_entries { float: left; }
	.widget_archive ul, .widget_categories ul, .widget_meta ul, .widget_recent_entries ul { margin: 0; padding: 0; list-style:none; }
	.widget_archive ul li, .widget_categories ul li, .widget_meta ul li, .widget_recent_entries ul li { float: left; width: 100%; border-bottom: 1px solid #eee; border-top: 0; padding-top:7px; padding-bottom: 7px; }
	.widget_archive ul li a, .widget_categories ul li a, .widget_meta ul li a, .widget_recent_entries ul li a { float: left; color: #111; font-weight: 300; }
	.widget_archive ul li a:before, .widget_categories ul li a:before , .widget_meta ul li a:before, .widget_recent_entries ul li a:before { float: left; font-family: \'fontello\'; content: \'\\e75e\'; font-size: 15px; line-height: 15px; text-shadow: none;  margin-right: 8px; margin-left: 1px; margin-top: 2px; color: ' . $highlightcolor  . '; -webkit-transition: all 0.15s; -moz-transition: all 0.15s; -o-transition: all 0.15s; -ms-transition: all 0.15s; transition: all 0.15s;}
	.widget_archive ul li a:hover:before, .widget_categories ul li a:hover:before, .widget_meta ul li a:hover:before, .widget_recent_entries ul li a:hover:before { }
	.widget_archive ul li:first-child, .widget_categories ul li:first-child, .widget_meta ul li:first-child, .widget_recent_entries ul li:first-child { border-top: 0; padding-top: 0; }
	.widget_archive ul li:last-child, .widget_categories ul li:last-child, .widget_meta ul li:last-child, .widget_recent_entries ul li:last-child { border-bottom: 0; padding-bottom: 0; }
	/*.widget_recent_entries ul li span.post-date { font-size: 11px; float: left; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; font-size: 11px; line-height: 11px; color: #777; text-decoration: none; font-weight: normal; background-color: #e5e5e5; border: 1px solid #e5e5e5; padding-bottom: 2px; padding-top: 2px; padding-left: 5px; padding-right: 5px; -webkit-transition: background-color 0.2s, color 0.2s; -moz-transition: background-color 0.2s, color 0.2s; -o-transition: background-color 0.2s, color 0.2s; -ms-transition: background-color 0.2s, color 0.2s; transition: background-color 0.2s, color 0.2s; }*/
	.widget_recent_entries ul li span.post-date { float: left; width: 100%; margin-left: 12px; }
	
	.footer .widget_archive select, .footer .widget_categories select, .footer .widget_meta select, .footer .widget_recent_entries select { width: 100%; }
	.footer .widget_archive, .footer .widget_categories, .footer .widget_meta, .footer .widget_recent_entries { float: left; }
	.footer .widget_archive ul, .footer .widget_categories ul, .footer .widget_meta ul, .footer .widget_recent_entries ul { margin: 0; padding: 0; list-style:none; }
	.footer .widget_archive ul li, .footer .widget_categories ul li, .footer .widget_meta ul li, .footer .widget_recent_entries ul li { float: left; width: 100%; color: #bbb; border-bottom: 1px solid #4f4f4f; padding-top:7px; padding-bottom: 7px; }
	.footer .widget_archive ul li a, .footer .widget_categories ul li a, .footer .widget_meta ul li a, .footer .widget_recent_entries ul li a { float: left; font-weight: normal; margin-right: 3px; color: #bbb;}
	.footer .widget_archive ul li a:hover, .footer .widget_categories ul li a:hover, .footer .widget_meta ul li a:hover, .footer .widget_recent_entries ul li a:hover { color: #fff;}
	.footer .widget_archive ul li a:before, .footer .widget_categories ul li a:before , .footer .widget_meta ul li a:before, .footer .widget_recent_entries ul li a:before { color: #bbb; float: left; font-family: \'fontello\'; content: \'\\e75e\'; font-size: 15px; line-height: 15px; text-shadow: none;  margin-right: 8px; margin-left: 1px; margin-top: 2px; -webkit-transition: all 0.15s; -moz-transition: all 0.15s; -o-transition: all 0.15s; -ms-transition: all 0.15s; transition: all 0.15s; }
	.footer .widget_archive ul li a:hover:before, .footer .widget_categories ul li a:hover:before, .footer .widget_meta ul li a:hover:before, .footer .widget_recent_entries ul li a:hover:before { color: #fff; }
	.footer .widget_archive ul li:first-child, .footer .widget_categories ul li:first-child, .footer .widget_meta ul li:first-child, .footer .widget_recent_entries ul li:first-child { border-top: 0; padding-top: 0; }
	.footer .widget_archive ul li:last-child, .footer .widget_categories ul li:last-child, .footer .widget_meta ul li:last-child, .footer .widget_recent_entries ul li:last-child { border-bottom: 0; padding-bottom: 0; }
	
	/* Pages */
	.widget_pages ul { list-style:none; margin: 0; padding: 0; width: 100%; }
	.widget_pages ul li { margin: 0; padding: 0; width: 100%; }
	.widget_pages ul li a {
	float: left;
	margin: 0; display: block; padding-bottom: 8px; padding-top: 8px; padding-left: 0px; padding-right: 0px;
	cursor: pointer; color: #666; font-size: 15px; line-height: 20px; font-weight: 400; border: 0;
	background: #fff;
	border-bottom: 1px solid #eee;
	-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
	width: 100%;
	-moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box;
	-webkit-transition: color 0.15s, background 0.15s; -moz-transition: color 0.15s, background 0.15s; -o-transition: color 0.15s, background 0.15s; -ms-transition: color 0.15s, background 0.15s; transition: color 0.15s, background 0.15s;
	 }
	.widget_pages ul li a:hover { color: ' . $highlightcolor  . ';	
	 }
	.widget_pages ul li ul.children li { -moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box; padding-left: 20px; }
	.widget_pages ul li ul.children li ul.children li { -moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box; padding-left: 40px; }
	.widget_pages ul li.current_page_item a { font-weight: 400; color: ' . $highlightcolor  . '; background: #fff; cursor: default;  }

	.footer .widget_pages ul { list-style:none; margin: 0; padding: 0; width: 100%; }
	.footer .widget_pages ul li { margin: 0; padding: 0; width: 100%; }
	.footer .widget_pages ul li a {
	float: left;
	margin: 0; display: block; padding-bottom: 8px; padding-top: 8px; padding-left: 0px; padding-right: 0px;
	cursor: pointer; color: #bbb; font-size: 15px; line-height: 20px; font-weight: 400; border: 0;
	background: #444;
	border-bottom: 1px solid #4f4f4f;
	-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
	width: 100%;
	-moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box;
	-webkit-transition: color 0.15s, background 0.15s; -moz-transition: color 0.15s, background 0.15s; -o-transition: color 0.15s, background 0.15s; -ms-transition: color 0.15s, background 0.15s; transition: color 0.15s, background 0.15s;
	 }
	.footer .widget_pages ul li a:hover { color: #fff;
	background: #444;
	filter: none;
	 }
	.footer .widget_pages ul li ul.sub-menu li { -moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box; padding-left: 20px; }
	.footer .widget_pages ul li ul.sub-menu li ul.sub-menu li { -moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box; padding-left: 20px; }
	.footer .widget_pages ul li.current_page_item a { font-weight: 400; color: #fff; background: #444; cursor: default; }
	
	
	/* Nav Menu */
	.sidebar .widget_nav_menu ul { list-style:none; margin: 0; padding: 0; width: 100%; }
	.sidebar .widget_nav_menu ul li { margin: 0; padding: 0; width: 100%; }
	.sidebar .widget_nav_menu ul li a {
	float: left;
	margin: 0; display: block; padding-bottom: 8px; padding-top: 8px; padding-left: 0px; padding-right: 0px;
	cursor: pointer; color: #666;  font-weight: 400; border: 0;
	background: #fff;
	border-bottom: 1px solid #eee;
	-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
	width: 100%;
	-moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box;
	-webkit-transition: color 0.15s, background 0.15s; -moz-transition: color 0.15s, background 0.15s; -o-transition: color 0.15s, background 0.15s; -ms-transition: color 0.15s, background 0.15s; transition: color 0.15s, background 0.15s;
	 }
	.sidebar .widget_nav_menu ul li a:hover { 
	color: #8BAA2B;	 }
	.sidebar .widget_nav_menu ul li ul.sub-menu li { -moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box; padding-left: 20px; }
	.sidebar .widget_nav_menu ul li ul.sub-menu li ul.sub-menu li { -moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box; padding-left: 20px; }
	.sidebar .widget_nav_menu ul li.current_page_item a { font-weight: 400; color: #8BAA2B; background: #fff; cursor: default; }
	
	
	.footer .widget_nav_menu { float: left; margin-top: -1px; width: 100%;}
	.footer .widget_nav_menu ul { margin: 0; padding: 0; list-style:none; width: 100%;margin-top: -1px;}
	.footer .widget_nav_menu ul li { float: left; width: 100%; border-bottom: 1px solid #4f4f4f; padding-top:7px; padding-bottom: 7px; }
	.footer .widget_nav_menu ul li span { font-size: 15px; line-height: 15px; text-shadow: none;  margin-right: 1px; margin-left: -4px; color: #bbb; -webkit-transition: all 0.15s; -moz-transition: all 0.15s; -o-transition: all 0.15s; -ms-transition: all 0.15s; transition: all 0.15s; }
	.footer .widget_nav_menu ul li a:hover span { color: #fff; }
	.footer .widget_nav_menu ul li:first-child { border-top: 0; padding-top: 0; }
	.footer .widget_nav_menu ul li:last-child { border-bottom: 0; padding-bottom: 0; }
	
	.footer .widget_nav_menu ul li a:before {
		content: \'\\e75e\';
		font-family: \'fontello\';
		font-style: normal;
		font-weight: normal;
		speak: none;
		display: inline-block;
		text-decoration: inherit;
		width: 1em;
		text-align: center;
		line-height: 1em;
		font-size: 120%;
		text-shadow: 1px 1px 1px rgba(127, 127, 127, 0.3);

	}
	
	.subfooter .widget_nav_menu ul li { width:auto;float:left;background:none;border:0;filter:none; }
	.subfooter .widget_nav_menu ul li a { color: #bbb; background: none; border:0;font-weight:normal;filter:none;}
	.subfooter .widget_nav_menu ul li a:hover { color: #fff;background:none;border:0;font-weight:normal;filter:none;}
	.subfooter .widget_nav_menu ul li.current_page_item a { font-weight: normal; color: #fff; background: none; }

	
	/* Recent Comments */
	
	ul#recentcomments { list-style: none; margin: 0; padding: 0; position: relative; }
	ul#recentcomments li { float: left; font-size: 12px; padding-left: 36px; color: #bbb; width: 100%; border-bottom: 1px solid #eee; padding-top:7px; padding-bottom: 7px; box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;}
	ul#recentcomments li:before { position: absolute; left: 0px; font-family: \'fontello\'; content: \'\\e829\'; font-size: 25px; line-height: 25px; margin-top: 6px; float: left; color: #f0f0f0; text-shadow: 0 1px 0 rgba(0,0,0,0.25);}
	ul#recentcomments li:first-child { border-top: 0; padding-top: 0; }
	ul#recentcomments li:last-child { border-bottom: 0; padding-bottom: 0; }
	ul#recentcomments li a { float: left; width: 100%; padding-left: 19px; color: #111; font-weight: 300; font-size: 13px; }
	ul#recentcomments li a.url { float: none; width: auto; padding-left: 0px; color: ' . $highlightcolor  . '; font-weight: 400; font-size: 12px; }
	ul#recentcomments li a.url:hover { color: #111; }
	ul#recentcomments li a:before { float: left; font-size: 13px; line-height: 13px; text-shadow: none; font-weight: bold; margin-right: 8px; margin-top: 2px; /*padding: 0px 5px;*/ padding-bottom: 3px; color: ' . $highlightcolor  . '; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; -webkit-transition: all 0.15s; -moz-transition: all 0.15s; -o-transition: all 0.15s; -ms-transition: all 0.15s; transition: all 0.15s; }
	
	.footer ul#recentcomments { list-style: none; margin: 0; padding: 0; position: relative; }
	.footer ul#recentcomments li { float: left; font-size: 12px; padding-left: 36px; color: #bbb; width: 100%; border-bottom: 1px solid #4f4f4f; padding-top:7px; padding-bottom: 7px; box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;}
	.footer ul#recentcomments li:before { position: absolute; left: 0px; font-family: \'fontello\'; content: \'\\e829\'; font-size: 25px; line-height: 25px; margin-top: 6px; float: left; color: #4f4f4f; text-shadow: none;}
	.footer ul#recentcomments li:first-child { border-top: 0; padding-top: 0; }
	.footer ul#recentcomments li:last-child { border-bottom: 0; padding-bottom: 0; }
	.footer ul#recentcomments li a { float: left; width: 100%; padding-left: 19px; color: #bbb; font-weight: 300; font-size: 13px; }
	.footer ul#recentcomments li a:hover { color: #fff; }
	.footer ul#recentcomments li a.url { float: none; width: auto; padding-left: 0px; color: #bbb; font-weight: 400; font-size: 12px; }
	.footer ul#recentcomments li a.url:hover { color: #fff; }
	.footer ul#recentcomments li a:before { float: left; font-size: 13px; line-height: 13px; text-shadow: none; font-weight: bold; margin-right: 8px; margin-top: 2px; /*padding: 0px 5px;*/ padding-bottom: 3px; color: #fff; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; -webkit-transition: all 0.15s; -moz-transition: all 0.15s; -o-transition: all 0.15s; -ms-transition: all 0.15s; transition: all 0.15s; }
	
	/* RSS */
	
	.widget_rss ul { list-style: none; margin: 0; padding: 0; }
	.widget_rss ul li { border-bottom: 1px solid #eee; padding-top:7px; padding-bottom: 7px; }
	.widget_rss ul li:first-child { border-top: 0; padding-top: 0; }
	.widget_rss ul li:last-child { border-bottom: 0; padding-bottom: 0; }
	.widget_rss ul li a.rsswidget { float: left; width: 100%; }
	.widget_rss .rss-date { float: left; font-size: 12px; color: #aaa; width: 100%; }
	.widget_rss cite { font-size: 12px; color: #777; width: 100%; }
	
	.footer .widget_rss ul { list-style: none; margin: 0; padding: 0; }
	.footer .widget_rss ul li { border-bottom: 1px solid #4f4f4f;padding-top:7px; padding-bottom: 7px; }
	.footer .widget_rss ul li:first-child { border-top: 0; padding-top: 0; }
	.footer .widget_rss ul li:last-child { border-bottom: 0; padding-bottom: 0; }
	.footer .widget_rss ul li a.rsswidget { float: left; width: 100%; }
	.footer .widget_rss .rss-date { float: left; font-size: 12px; color: #bbb; width: 100%; }
	.footer .widget_rss cite { font-size: 12px; color: #bbb; width: 100%; }
	
	/* Search */
	.searchform input { float: left; width: 100%; -moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box; }
	
	
	/* CAROUSEL */
	/* ------------------------------------ */
	
	.carousel { float: left; position: relative; margin-bottom: 0px; line-height: 1; border: 1px solid #eee; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
	.carousel-inner { float: left; position: relative; width: 100%; overflow: hidden;}
	.carousel .item { font-size: 14px; line-height: 26px; position: relative; display: none; -webkit-transition: 0.6s left; -moz-transition: 0.6s left; -o-transition: 0.6s left; transition: 0.6s left; color: #777; height: auto; background: #f3f3f3; font-family: ' . $headlinefontfamily  . '; }
	.carousel .padded { padding: 35px; }
	.carousel .item > img { display: block; line-height: 1; width: 100%;}
	.carousel .active, .carousel .next, .carousel .prev { display: block; }
	.carousel .active { left: 0; }
	.carousel .next, .carousel .prev { position: absolute; top: 0; width: 100%; }
	.carousel .next { left: 100%; }
	.carousel .prev { left: -100%; }
	.carousel .next.left, .carousel .prev.right { left: 0; }
	.carousel .active.left { left: -100%; }
	.carousel .active.right { left: 100%; }
	.carousel-control { position: absolute; top: 100%; width: 25px; height: 25px; margin-top: -30px; font-size: 25px; font-weight: bold; line-height: 20px; color: #bbb; text-align: center; background: transparent; border: 0px solid #ffffff; -webkit-border-radius: 0px; -moz-border-radius: 0px; border-radius: 0px; opacity: 1; filter: alpha(opacity=100); }
	.carousel-control.right { right: 5px; left: auto; }
	.carousel-control.left { right: 30px; left: auto; }
	.carousel-control:hover { color: #444; text-decoration: none; opacity: 1; filter: alpha(opacity=100); }
	.carousel-caption { font-size: 12px; line-height: 20px; color: #fff; position: absolute; right: 0; bottom: 0; left: 0; padding: 15px; padding-bottom: 10px; padding-top: 10px; background: #333333; background: rgba(0, 0, 0, 0.75); }
	.carousel-caption h4, .carousel-caption p { line-height: 20px; color: #ffffff; }
	.carousel-caption h4 { margin: 0 0 5px; }
	.carousel-caption p { margin-bottom: 0; }
	.carousel .item .image { float: left; margin-right: 15px; margin-bottom: 15px; margin-top: 0px; }
	.carousel .item .image.right { float: right; margin-left: 15px; margin-right: 0; }
	.carousel .item .image.left { float: left; margin-right: 15px; }
	cite { display: block; font-size: 12px; margin-top: 10px; text-transform: uppercase; color: #aaa; }
	blockquote { font-size: 14px; line-height: 26px; color: #777; background: #eee; font-family: ' . $headlinefontfamily  . '; padding: 20px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; border: 0; }
	
	/* PORTFOLIO */
	/* ------------------------------------ */
	
	.portfoliowrap	{ overflow:hidden;position:relative; margin-left: 0;}
	.portfolio		{ overflow:hidden; position:relative; margin-left: -10px; margin-bottom: -10px; margin-top: -10px; }
	.portfolio img	{ width:100%; max-width:none !important; height:auto; }
	.threecol .entry	{ width:393px; float:left;overflow:hidden;position:relative; }
	.fourcol .entry	{ width:295px; float:left;overflow:hidden;position:relative; }
	.fivecol .entry	{ width:236px; float:left;overflow:hidden;position:relative; }
	
	ul.portfoliofilter { margin: 0; padding: 0; margin-bottom: 21px; margin-top: 0px; width: 100%; padding-bottom: 0px; }
	ul.portfoliofilter li { float: left; list-style-type: none; display: inline; margin-right: 10px; margin-bottom: 10px; }
	ul.portfoliofilter li a { font-weight: 400; font-size: 13px; float: left; color: #666; text-transform: none; padding-bottom: 4px; padding-top: 4px; padding-left: 12px; padding-right: 12px;
		background: #fff;				
		border: 1px solid #e5e5e5;
		-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
		-webkit-transition: all 0.3s; -moz-transition: all 0.3s; -o-transition: all 0.3s; -ms-transition: all 0.3s; transition: all 0.3s;
	 }
	ul.portfoliofilter li a:hover { color: ' . $highlightcolor  . '; }
	ul.portfoliofilter li a.selected { color: ' . $highlightcolor  . '; background: #fff; }
	
	.isotope-item { z-index: 2; }
	.isotope-hidden.isotope-item { pointer-events: none; z-index: 1; }
	.isotope,
	.isotope .isotope-item { -webkit-transition-duration: 0.5s; -moz-transition-duration: 0.5s; transition-duration: 0.5s;}
	.isotope { -webkit-transition-property: height, width; -moz-transition-property: height, width; transition-property: height, width; }
	.isotope .isotope-item { -webkit-transition-property: -webkit-transform, opacity; -moz-transition-property: -moz-transform, opacity; transition-property: transform, opacity; }
	
	.foliotextwrapper { padding-left: 10px; padding-right: 10px; }
	.foliotextholder { margin-bottom: 10px; float: left; position:relative; -moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box; -webkit-border-bottom-right-radius: 5px; -webkit-border-bottom-left-radius: 5px; -moz-border-radius-bottomright: 5px; -moz-border-radius-bottomleft: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px; background: #fefefe; border: 1px solid #eee; border-top: 0; width: 100%; padding-bottom: 15px; padding-top: 15px; }
	.foliotextholder .itemtitle	{ float: left; width: 100%; cursor:pointer; text-align: center; font-size: 20px; font-weight: 300; line-height: 25px; margin: 0; -webkit-transition: all 0.2s; -moz-transition: all 0.2s; -o-transition: all 0.2s; -ms-transition: all 0.2s; }
	.foliotextholder .itemtitle a { color: #111; font-weight: 300; }
	.foliotextholder .itemtitle a:hover { }
	.foliotextholder .itemcategories {	float: left; width: 100%; margin-top: 0px; color: ' . $highlightcolor  . '; font-weight: normal; font-size: 13px; line-height: 20px; font-style: normal; cursor:pointer; text-align: center; -webkit-transition: all 0.2s; -moz-transition: all 0.2s; -o-transition: all 0.2s; -ms-transition: all 0.2s; }
	.foliotextholder .itemcategories a { color: ' . $highlightcolor  . '; font-weight: normal; }
	.foliotextholder .itemcategories a:hover { }
	
	.holderwrap { position:relative; -moz-box-sizing: border-box; box-sizing:border-box; -webkit-order-sizing:border-box; margin: 10px; }
	.mediaholder { overflow:hidden; position:relative;
					-webkit-border-radius: 5px 5px 0px 0px;
					-moz-border-radius: 5px 5px 0px 0px;
					border-radius: 5px 5px 0px 0px;
					-webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC);
	}
	
	.mediaholder .cover	{ width:100%; height:100%; position:absolute; top:0px; left:0px; background: none; -webkit-transition: all 0.2s; -moz-transition: all 0.2s; -o-transition: all 0.2s; -ms-transition: all 0.2s;  -moz-opacity:0.0; filter:alpha(opacity=0); opacity:0;
						 -webkit-border-radius: 5px 5px 0px 0px;
						 -moz-border-radius: 5px 5px 0px 0px;
						 border-radius: 5px 5px 0px 0px;
						 -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC);
	
	
	}
	.mediaholder .link	{ padding-left: 8px; padding-top: 8px; width: 32px; height: 32px; color: #fff; /*-webkit-border-radius: 22px; -moz-border-radius: 22px; border-radius: 22px; */font-size: 25px; background: ' . $highlightcolor  . '; cursor:pointer; position:absolute; left:100%; top:100%; margin-left:-40px; margin-top:-40px; -webkit-transition: all 0.2s; -moz-transition: all 0.2s; -o-transition: all 0.2s; -ms-transition: all 0.2s; -moz-opacity:0.0; filter:alpha(opacity=0); opacity:0; 
	-webkit-border-radius: 5px 0px 0px 0px;
	-moz-border-radius: 5px 0px 0px 0px;
	border-radius: 5px 0px 0px 0px;

	
	}
	.mediaholder .show	{ padding-left: 10px; padding-top: 8px; width: 30px; height: 32px; color: #fff; /*-webkit-border-radius: 22px; -moz-border-radius: 22px; border-radius: 22px;*/ font-size: 20px; background: ' . $highlightcolor  . '; font-weight: normal; cursor:pointer;  position:absolute; left:100%; top:100%; margin-left:-40px; margin-top:-40px; -webkit-transition: all 0.2s; -moz-transition: all 0.2s; -o-transition: all 0.2s; -ms-transition: all 0.2s; -moz-opacity:0.0; filter:alpha(opacity=0); opacity:0;
	-webkit-border-radius: 5px 0px 0px 0px;
	-moz-border-radius: 5px 0px 0px 0px;
	border-radius: 5px 0px 0px 0px;
	
	 }
	.link.notalone { left:100%; margin-left:-40px; margin-top: -40px;
			-webkit-border-radius: 0;
	-moz-border-radius: 0;
	border-radius: 0;
		
	}
	.show.notalone { left:100%; margin-left:-80px; margin-top: -40px;
			-webkit-border-radius: 5px 0px 0px 0px;
	-moz-border-radius: 5px 0px 0px 0px;
	border-radius: 5px 0px 0px 0px;
		
	}
	.mediaholder:hover .link, .mediaholder:hover .show { -moz-opacity:1.0; filter:alpha(opacity=100); opacity:1; }
	.mediaholder:hover .cover {	/*-moz-opacity:0.25; filter:alpha(opacity=25); opacity:0.25; */}
	.mediaholder:hover .link, .mediaholder:hover .show { top:100%;}
	.mediaholder img { 
	
		-webkit-backface-visibility: hidden; 
		-webkit-transition: all 0.2s;
		-moz-transition: all 0.2s;
		-o-transition: all 0.2s;
		-ms-transition: all 0.2s;
 
		filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 1 0\'/></filter></svg>#grayscale");
		filter: none;
		-webkit-filter: grayscale(0%);

	}
	.mediaholder:hover img {
	
		/*-webkit-transform: scale(1.1);  
	     -moz-transform: scale(1.1);  
	      -ms-transform: scale(1.1);  
	       -o-transform: scale(1.1);  
	          transform: scale(1.1);*/
	          
		filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0.3333 0.3333 0.3333 0 0 0 0 0 1 0\'/></filter></svg>#grayscale"); /* Firefox 10+, Firefox on Android */
		filter: gray; /* IE6-9 */
		-webkit-filter: grayscale(100%); /* Chrome 19+, Safari 6+, Safari 6+ iOS */

		
	}
	.mediaholder:hover .link.notalone { left:100%; top:100%;}
	.mediaholder:hover .show.notalone {	left:100%; top:100%;}
	.mediaholder .show:hover, .mediaholder .link:hover { }
	
	/* Portfolio Single Navigation */
		
	.projectnavwrapper { position: relative; float: right; width: 100%; margin-top: 43px; margin-bottom: 0px; }
	.projectnav { float: left; position: relative; margin-top: 0px; }
	.launchbtn { margin-top: 0px; float: left; margin-right: 5px; }
	.projectnav a:before {
	    font-family: \'fontello\';
		color: #777;
	    font-style: normal;
	    font-weight: normal;
	    speak: none;
	    display: inline-block;
	    text-decoration: inherit;
	    margin-right: 0;
	    margin-top: 8px;
	    text-align: center;
	    width: 37px;
	    font-size: 15px;
	}
	.projectnav a {
		float: left;
	    z-index: 100;
	    cursor: pointer;
	    position: relative;
	    width: 37px;
	    height: 37px;
	   font-weight: 400; font-size: 13px; float: left; color: #666; text-transform: none; padding-bottom: 0px; padding-top: 0px; padding-left: 0px; padding-right: 0px;
		background: #fff;				
		border: 1px solid #e5e5e5;
		-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
	}
	.projectnav a:hover:before {
		color: ' . $highlightcolor  . '; 
	}
	.previousproject a:before {
	    content: \'\\e765\';
	    -webkit-transition: all 0.3s; -moz-transition: all 0.3s; -o-transition: all 0.3s; -ms-transition: all 0.3s; transition: all 0.3s;
	}
	.nextproject a:before {
	    content: \'\\e766\';
	    -webkit-transition: all 0.3s; -moz-transition: all 0.3s; -o-transition: all 0.3s; -ms-transition: all 0.3s; transition: all 0.3s;
	}
	.nextproject a { margin-left: 5px; }
	
	
	
	/* THEME BUTTON COLOR */
	/* ------------------------------------ */
	
	.btn { font-weight: 700; font-size: 15px; color: #666; background: #f3f3f3 url(img/tiles/transparent.png) repeat; text-shadow: none !important; border: 0 !important; -webkit-box-shadow: none !important; -moz-box-shadow: none !important; box-shadow: none !important; -webkit-transition: all 0.3s !important; -moz-transition: all 0.3s !important; -o-transition: all 0.3s !important; -ms-transition: all 0.3s !important; transition: all 0.3s !important; padding-bottom: 9px !important; padding-left: 14px !important; padding-right: 14px !important; padding-top: 9px !important; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;}
 	.btn:hover { background: #f3f3f3 url(img/tiles/dark5.png) repeat !important; color: #666 !important; }
	.btn-large { font-weight: 700; font-size: 25px; padding-bottom: 10px !important; padding-left: 20px !important; padding-right: 20px !important; padding-top: 10px !important; }
	
	.btn-primary { color: #fff !important; text-shadow: none; background: ' . $highlightcolor  . ' url(img/tiles/transparent.png) repeat; border: 0; }
	.btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { background: ' . $highlightcolor  . ' url(img/tiles/dark25.png) repeat !important; color: #fff !important; }
	.btn-primary:active, .btn-primary.active { background: ' . $highlightcolor  . ' !important; }
	.btn:focus { outline: none; }
	
	.btn-info { color: #ffffff; text-shadow: none; background: #2a80b9 url(img/tiles/transparent.png) repeat; border: 0; }
	.btn-info:hover, .btn-info:active, .btn-info.active, .btn-info.disabled, .btn-info[disabled] { background: #2a80b9 url(img/tiles/dark25.png) repeat !important; color: #fff !important; }
	.btn-info:active, .btn-info.active { background: #2a80b9; }
	
	.btn-warning { color: #ffffff; text-shadow: none; background: #f49c14 url(img/tiles/transparent.png) repeat; border: 0; }
	.btn-warning:hover, .btn-warning:active, .btn-warning.active, .btn-warning.disabled, .btn-warning[disabled] { background: #f49c14 url(img/tiles/dark25.png) repeat !important; color: #fff !important; }
	.btn-warning:active, .btn-warning.active { background: #f49c14; }
	
	.btn-danger { color: #ffffff; text-shadow: none; background: #c1392b url(img/tiles/transparent.png) repeat; border: 0; }
	.btn-danger:hover, .btn-danger:active, .btn-danger.active, .btn-danger.disabled, .btn-danger[disabled] { background: #c1392b url(img/tiles/dark25.png) repeat !important; color: #fff !important; }
	.btn-danger:active, .btn-danger.active { background: #c1392b;}
	
	.btn-inverse { color: #ffffff; text-shadow: none; background: #34495e url(img/tiles/transparent.png) repeat; border: 0; }
	.btn-inverse:hover, .btn-inverse:active, .btn-inverse.active, .btn-inverse.disabled, .btn-inverse[disabled] { background: #34495e url(img/tiles/dark25.png) repeat !important; color: #fff !important;}
	.btn-inverse:active, .btn-inverse.active { background: #34495e; }
	.btn:focus { outline: none; }

	.btn-moderndark { color: #ffffff; text-shadow: none; background: #3a87ad; background-image: none; background-repeat: no-repeat; border: 0; }
	.btn-moderndark:hover, .btn-moderndark:active, btn-moderndark.disabled, .btn-moderndark[disabled] { background: #2f6d8b !important; color: #fff !important; }
	.btn-moderndark:active { background: #2f6d8b; }
	
	.btn-modernlight { color: #ffffff; text-shadow: none; background: rgba(0,0,0,0.75); background-image: none; background-repeat: no-repeat; border: 3px solid #fff !important; }
	.btn-modernlight:hover, .btn-modernlight:active, btn-modernlight.disabled, .btn-modernlight[disabled] { color: #fff !important;  background: rgba(0,0,0,1) !important; }
	.btn-modernlight:active { color: #fff !important; opacity: 1 !important; background: transparent !important; }
	
	
	/*#buddypress button, #buddypress a.button, #buddypress input[type=submit], #buddypress input[type=button], #buddypress input[type=reset], #buddypress ul.button-nav li a, #buddypress div.generic-button a, #buddypress .comment-reply-link, a.bp-title-button,*/
	.form-submit #submit , .standardbtn {
	font-family: ' . $headlinefontfamily  . ' !important; font-weight: 600 !important; font-size: 15px !important; text-shadow: none !important; border: 0 !important; -webkit-box-shadow: none !important; -moz-box-shadow: none !important; box-shadow: none !important; -webkit-transition: all 0.3s !important; -moz-transition: all 0.3s !important; -o-transition: all 0.3s !important; -ms-transition: all 0.3s !important; transition: all 0.3s !important; padding-bottom: 9px !important; padding-left: 14px !important; padding-right: 14px !important; padding-top: 9px !important; color: #fff !important; text-shadow: none; background: ' . $highlightcolor  . ' url(img/tiles/transparent.png) repeat; border: 0; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
	}
	
	.form-submit #submit:hover , .standardbtn:hover,
	.form-submit #submit:active , .standardbtn:active,
	.form-submit #submit:active , .standardbtn.active,
	.form-submit #submit:disabled , .standardbtn.disabled,
	.form-submit #submit:hover , .standardbtn[disabled] {
	  background: ' . $highlightcolor  . ' url(img/tiles/dark25.png) repeat !important; color: #fff !important;	}
	
	.form-submit #submit:active,
	.standardbtn:active,
	.standardbtn.active {
	  background: ' . $highlightcolor  . ' !important;
	}
	
	
	
	/* FORM STYLES */
	/* ------------------------------------ */
	
	#buddypress form#whats-new-form textarea, select, textarea, input[type="text"], input[type="password"], input[type="datetime"], input[type="datetime-local"], input[type="date"], input[type="month"], input[type="time"], input[type="week"], input[type="number"], input[type="email"], input[type="url"], input[type="search"], input[type="tel"], input[type="color"],
	#bbp_search, #buddypress div.dir-search input[type=text], #buddypress .standard-form textarea, #buddypress .standard-form input[type=text], #buddypress .standard-form select, #buddypress .standard-form input[type=password], #buddypress .dir-search input[type=text]  {
		font-family: ' . $headlinefontfamily  . ';
	  display: inline-block; height: 35px; padding: 6px 10px !important; margin-bottom: 10px; font-size: 13px !important; font-weight: 300; line-height: 22px; color: #777 !important; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; background-color: #fff; border: 1px solid #e5e5e5; -webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none; -webkit-transition: border linear 0.2s, box-shadow linear 0.2s; -moz-transition: border linear 0.2s, box-shadow linear 0.2s; -o-transition: border linear 0.2s, box-shadow linear 0.2s; transition: border linear 0.2s, box-shadow linear 0.2s; -moz-box-sizing: border-box; box-sizing: border-box; -webkit-box-sizing: border-box; }
	
	#buddypress form#whats-new-form textarea:focus, #bbp_search:focus, textarea:focus, input[type="text"]:focus, input[type="password"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="color"]:focus, .uneditable-input:focus {
	  border-color: ' . $highlightcolor  . '; outline: 0; -webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none; }
	input:-moz-placeholder, textarea:-moz-placeholder { color: #777 !important; }
	input::-moz-placeholder, textarea::-moz-placeholder { color: #777 !important; }
	input:-ms-input-placeholder, textarea:-ms-input-placeholder { color: #777 !important; }
	input::-webkit-input-placeholder, textarea::-webkit-input-placeholder { color: #777 !important; }
	
	#buddypress form#whats-new-form textarea		{	height:100px;}
	
	/* HEADER SEARCH FORM */
	/* ------------------------------------ */
	
	.headersearch { position: absolute; right: 0px; top: '.$header_search_top.'px; z-index: 102; }
	.headersearch form { float: left; }
	.headersearch input { text-indent: -500px; cursor: pointer; border: 0; width: 35px; background: #fff url(img/tiles/search.png) no-repeat 0px center;
	padding-top: 8px; padding-bottom: 7px; padding-left: 0; padding-right: 0; -webkit-border-radius: 0px; -moz-border-radius: 0px; border-radius: 0px; margin-bottom: 0px;
	-webkit-transition: width 0.3s, background-color 0.3s; -moz-transition: width 0.3s, background-color 0.3s; -o-transition: width 0.3s, background-color 0.3s; -ms-transition: width 0.3s, background-color 0.3s; transition: width 0.3s, background-color 0.3s;
	-webkit-border-radius: 30px; -moz-border-radius: 30px; border-radius: 30px; font-family: ' . $headlinefontfamily  . ';
	 }
	.headersearch input:hover { background-color: #f3f3f3; }
	.headersearch input:focus { color: #777; background-color: #f3f3f3; text-indent: 25px; width: 520px; cursor: text; padding-left: 15px; padding-right: 15px;}
	
	/* HEADER RESPONSIVE MENU FORM */
	/* ------------------------------------ */
	
	.mobilemenu { margin-right: -20px; }
	.mobilemenu form { opacity: 0; float: left; height: 100%; width: 40px; position: relative; margin: 0px; padding: 0px; }
	.mobilemenu	select {  -webkit-appearance: none; border: 1px solid #ddd; outline: none; overflow: hidden; font: 13px "Open Sans", sans-serif; color: #555; margin: 0; width: 100%;  max-width: 100%; display: block; height: auto; padding: 10px 10px; }
	.mobilemenu	select:before { content: \'\\2630\'; }
	.mobilemenu	option { outline: none; border: 0; overflow: hidden; font: 13px "Open Sans", sans-serif; color: #555; margin: 0; width: 100%; max-width: 100%; display: block; padding-left: 15px; }
	.mobilemenu .icon-menu { cursor: pointer; position: absolute; font-size: 30px; background: #666; color: #fff; padding: 5px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }


	
	/* BOOTSTRAP ELEMENTS */
	/* ------------------------------------ */
	
	/* Progress Bars */
	.progress { float: left; width: 100%; -moz-box-shadow: none;
		-webkit-box-shadow: none;
		box-shadow: none; 
		background: #f3f3f3; height: 22px; }
	.progress .bar { font-weight: normal;  -moz-box-shadow: none;
		-webkit-box-shadow: none;
		box-shadow: none; text-shadow: none; }
	.progress .tag { float: left; font-size: 11px; padding-left: 15px; color: #777; font-weight: normal; text-shadow: none; }
	.progress-info .bar { background: #2a80b9;}
	.progress-success .bar { background: ' . $highlightcolor  . ';}
	.progress-warning .bar { background: #f49c14;}
	.progress-danger .bar { background: #c1392b;}
	
	/* Tabs */
	.nav { margin-bottom: 0; }
	.nav > li > a:hover { text-decoration: none; background-color: #fff; }
	.nav-tabs { float: left; border: 0; border-bottom: 1px solid #e5e5e5; width: 100%; }
	.nav-tabs > li { margin-bottom: -1px; margin-right: 5px; }
	.nav-tabs > li > a { color: #666; padding-top: 12px; padding-bottom: 11px; line-height: 20px; font-size: 15px;
		background: #ffffff; 
		font-weight: 400;
		-moz-box-shadow: none;
		-webkit-box-shadow: none;
		box-shadow: none;
		border: 1px solid #e5e5e5;
		-webkit-border-radius: 0px; -moz-border-radius: 0px; border-radius: 0px;
		-webkit-border-top-left-radius: 5px;
		-webkit-border-top-right-radius: 5px;
		-moz-border-radius-topleft: 5px;
		-moz-border-radius-topright: 5px;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		-webkit-transition: color 0.15s, background 0.15s; -moz-transition: color 0.15s, background 0.15s; -o-transition: color 0.15s, background 0.15s; -ms-transition: color 0.15s, background 0.15s; transition: color 0.15s, background 0.15s;
	 }
	.nav-tabs > li > a:hover { 
		font-weight: 400;
		border: 0;
		color: #666;	
		background: #f3f3f3;
		border: 1px solid #e5e5e5;
	 }
	.nav-tabs > .active > a, .nav-tabs > .active > a:hover {
		font-weight: 400;
		border: 0;
		color: ' . $highlightcolor  . '; cursor: default;
		-moz-box-shadow: none;
		-webkit-box-shadow: none;
		box-shadow: none;
		-webkit-border-radius: 0px; -moz-border-radius: 0px; border-radius: 0px;
		-webkit-border-top-left-radius: 5px;
		-webkit-border-top-right-radius: 5px;
		-moz-border-radius-topleft: 5px;
		-moz-border-radius-topright: 5px;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
		background: #fff; border: 1px solid #e5e5e5; border-bottom: 1px solid transparent;
	}
	
	.tab-content {
	float: left;
	padding: 20px;
	padding-bottom: 0;
	background: #fff;
	border: 1px solid #e5e5e5;
	border-top: 1px solid transparent;
	-webkit-border-radius: 0px; -moz-border-radius: 0px; border-radius: 0px;
	-webkit-border-radius: 5px;
	-webkit-border-top-left-radius: 0;
	-moz-border-radius: 5px;
	-moz-border-radius-topleft: 0;
	border-radius: 5px;
	border-top-left-radius: 0;
	}
	
	.accordion-body .wpb_content_element  {margin-bottom:0 !important;}
	
	
	/* Accordions */
	.accordion { margin-bottom: 0px; float: left; width: 100%; }
	.accordion-group { margin-bottom: 5px; border: 0; }
	.accordion-heading { border-bottom: 0; }
	.accordion-heading .accordion-toggle { display: block; padding: 12px 20px; padding-top: 11px; padding-right: 15px;}
	.accordion-toggle { cursor: pointer; color: ' . $highlightcolor  . '; font-size: 15px; font-weight: 400;
	background: #fff; border: 1px solid #e5e5e5; border-bottom: 1px solid transparent;
	-webkit-border-radius: 0px; -moz-border-radius: 0px; border-radius: 0px;
	-webkit-border-top-left-radius: 5px;
	-webkit-border-top-right-radius: 5px;
	-moz-border-radius-topleft: 5px;
	-moz-border-radius-topright: 5px;
	border-top-left-radius: 5px;
	border-top-right-radius: 5px;
	-webkit-transition: color 0.15s, background 0.15s; -moz-transition: color 0.15s, background 0.15s; -o-transition: color 0.15s, background 0.15s; -ms-transition: color 0.15s, background 0.15s; transition: color 0.15s, background 0.15s;
	}
	.accordion-toggle.collapsed { cursor: pointer; color: #666; font-size: 15px; font-weight: 400; border: 0;
	background: #fff; 
	-moz-box-shadow: none;
	-webkit-box-shadow: none;
	box-shadow: none;
	border: 1px solid #e5e5e5; 
	-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
	}
	a.accordion-toggle:hover { color: ' . $highlightcolor  . '; 	
	}
	a.accordion-toggle.collapsed:hover { color: #666;
	background: #f3f3f3; 		
	}
	.accordion-inner {
	-webkit-border-radius: 0px; -moz-border-radius: 0px; border-radius: 0px;
	-webkit-border-bottom-right-radius: 5px;
	-webkit-border-bottom-left-radius: 5px;
	-moz-border-radius-bottomright: 5px;
	-moz-border-radius-bottomleft: 5px;
	border-bottom-right-radius: 5px;
	border-bottom-left-radius: 5px;
	padding: 20px;
	padding-top: 4px;
	background: #fff; border: 1px solid #e5e5e5; border-top: 0;
	}
	.showicon, .hideicon { float: right; background: transparent; font-size: 20px; font-weight: normal; margin-right: 0px; margin-top: 1px; color: #666; }
	.accordion-toggle .hideicon { display: block; }
	.accordion-toggle .showicon { display: none; }
	.accordion-toggle.collapsed .hideicon { display: none; }
	.accordion-toggle.collapsed .showicon { display: block; }
	
	
	/* Alerts */
	.alert { float: left; width: 100%; padding: 8px 35px 8px 14px; margin-bottom: 20px; color: #c09853; font-size: 14px; text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5); background-color: #fcf8e3; border: 0px solid #fbeed5; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box; }
	.alert.alert-block h4 { margin: 0; margin-bottom: 5px; color: #c09853; }
	.alert h4 { margin: 0; }
	.alert .close { position: relative; top: -2px; right: -21px; line-height: 20px; }
	.alert-success { color: #468847; background-color: #dff0d8; border-color: #d6e9c6; border: 0; }
	.alert-danger, .alert-error { color: #b94a48; background-color: #f2dede; border-color: #eed3d7;  border: 0;}
	.alert-info { color: #3a87ad; background-color: #d9edf7; border-color: #bce8f1;  border: 0;}
	.alert-block { padding-top: 14px; padding-bottom: 14px; }
	
	/* Popovers */
	.popover-title { font-weight: bold; }
	
	
	/* Pagination */
	.pagination { float: right; height: 30px; margin: 0; }
	.pagination ul { display: inline-block; *display: inline; margin-bottom: 0; margin-left: 0; -webkit-border-radius: 0; -moz-border-radius: 0; border-radius: 0; *zoom: 1; -webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none; text-align: right; }
	.pagination ul > li { display: inline; }
	.pagination ul > li > a, .pagination ul > li > span {
		font-weight: 400; font-size: 13px; line-height: 20px; height: 20px; float: left; color: #666; text-transform: none; padding-bottom: 4px; padding-top: 4px; padding-left: 12px; padding-right: 12px;
		background: #fff;				
		border: 1px solid #e5e5e5;
		-webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
		-webkit-transition: all 0.3s; -moz-transition: all 0.3s; -o-transition: all 0.3s; -ms-transition: all 0.3s; transition: all 0.3s;
		margin-right: 10px;
		}
	.pagination ul > li > a:hover {
		color: ' . $highlightcolor  . ';	background: #fff; }
	.pagination ul > .active > a, .pagination ul > .active > span { color: ' . $highlightcolor  . '; cursor: default; font-weight: 400; }
	.pagination ul > .disabled > span, .pagination ul > .disabled > a, .pagination ul > .disabled > a:hover, .pagination ul > .active > a, .pagination ul > .active > span, .pagination ul > .active > a:hover {
		color: ' . $highlightcolor  . '; background: #fff;	}
	.pagination ul > li:first-child > a, .pagination ul > li:first-child > span { -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
}
	.pagination ul > li:last-child > a, .pagination ul > li:last-child > span { margin-right: 0px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px;
}
	.pagination-centered { text-align: center; }
	.pagination-right { text-align: right; }
	.span9.left .pagination { margin-right: 20px; }
	.span9.right .pagination { margin-left: 20px; }
	.pagenumbers { float: left: position: absolute; margin-top: 4px; color: #bbb; }
	
	
	
	/* GOOGLE MAPS */
	/* ------------------------------------ */
	
	.gmap { width: 100%; height: 400px; margin-bottom: 35px; background: #eee; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC); overflow:hidden;}
	#gmap_inner { width: 100%; height: 400px; }
	#gmap_inner img { max-width: none; }
	
	/* CONTACT FORM 7 */
	/* ------------------------------------ */
	
	.wpcf7-form { margin-bottom: 0; }
	.wpcf7-form .one_half, .wpcf7-form .one_third, .wpcf7-form .two_third, .wpcf7-form .three_fourth, .wpcf7-form .one_fourth, .wpcf7-form .one_fifth, .wpcf7-form .one_sixth { margin-bottom: 10px; }
	.wpcf7 input[type="text"], .wpcf7 select, .wpcf7 input[type="email"]{ width:100%; max-width:100%; }
	.wpcf7-textarea { width:100%; max-width:100%; height: 100px; }
	div.wpcf7-response-output {	margin: 0; padding: 0.2em 1em; }
	.wpcf7-form-control.captcha	{ margin-bottom:5px;}
	div.wpcf7-mail-sent-ok, div.wpcf7-mail-sent-ng, div.wpcf7-spam-blocked, div.wpcf7-validation-errors { position:relative; float:left; padding: 8px 35px 8px 14px; margin-bottom: 20px; color: #c09853; text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5); background-color: #fcf8e3; border: 1px solid #fbeed5; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; }
	div.wpcf7-mail-sent-ok { color: #468847; background-color: #dff0d8; border-color: #d6e9c6; }
	div.wpcf7-mail-sent-ng { color: #3a87ad; background-color: #d9edf7; border-color: #bce8f1; }
	div.wpcf7-spam-blocked { color: #3a87ad; background-color: #d9edf7; border-color: #bce8f1; }
	div.wpcf7-validation-errors { color: #b94a48; background-color: #f2dede; border-color: #eed3d7; }
	span.wpcf7-form-control-wrap { position: relative; }
	span.wpcf7-not-valid-tip { position: absolute; top: -10px; left: 1px; z-index: 100; border: none; float:left; background-color: #fff; border: 1px solid #EED3D7 font-size: 12px; color: #B94A48; padding: 5px 7px 5px 10px; max-width:92%; }
	.footer span.wpcf7-not-valid-tip { position: absolute; top: -3px; }
	span.wpcf7-not-valid-tip-no-ajax { color: #f00; font-size: 10pt; display: block; }
	
	
	.wpcf7 *::-moz-placeholder	{	opacity:1 !important;}
	
	/* MOBILE MENU */
	/* ------------------------------------ */
	
	#mainmenu { float: none; visibility: visible; }
	.mobilemenu { display: none; }
	
	
	/* VISUAL COMPOSER */
	
	.wpb_content_element { margin-bottom: 25px !important; }
	.topsubstract20 { float: left !important; width: 100% !important; margin-top: -20px !important; margin-bottom: -20px !important;  }
	.nobottom { margin-bottom: 0 !important; }
	.wpb_gallery_slides.wpb_image_grid { float: left; width: 100%; margin-left: 0px; margin-top: 0;}
	.wpb_image_grid_ul { list-style-type: none; width: 100%; margin-left: 0px; margin-top: 0;}
	.wpb_image_grid_ul li { margin: 5px !important; float: left; margin-top: 0;}
	.wpb_image_grid_ul li img { -webkit-border-radius: 5px !important; -moz-border-radius: 5px !important; border-radius: 5px !important; -webkit-mask-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAA5JREFUeNpiYGBgAAgwAAAEAAGbA+oJAAAAAElFTkSuQmCC) !important; }
	.wpb_separator { width: 100%; height: 40px !important; border-top: 1px solid #e5e5e5 !important; border-bottom: 0 !important; margin-top: 40px !important; margin-bottom: 0px !important; }

	.vc_row-fluid { width: 100%; }
	.vc_row-fluid .vc_span4, .wpb_teaser_grid.wpb_carousel .vc_span4 { width: 31.6%; }
	.vc_row-fluid .vc_span4:first-child { margin-left: 0; }
	.vc_row-fluid .vc_span6, .wpb_teaser_grid.wpb_carousel .vc_span6 { width: 48.75%; }
	.vc_row-fluid .vc_span6:first-child { margin-left: 0; }
	.vc_row-fluid .vc_span3, .wpb_teaser_grid.wpb_carousel .vc_span3 { width: 23.12%; }
	.vc_row-fluid .vc_span3:first-child { margin-left: 0; }
	.vc_row-fluid [class*="vc_span"] { margin-left: 2.5%; }
	
	.wpb_row.vc_row-fluid { margin-left: 0px; width: 100%; height: auto;}
	.vc_span12.wpb_column.column_container { margin-left: 0px; width: 100%; }
	.wpb_wrapper { margin-left: 0px; width: 100%; }
	
	.wpb_alert { -webkit-border-radius: 5px !important; -moz-border-radius: 5px !important; border-radius: 5px !important; border: 0 !important; }';
	
	
	if (isset($themeoptions["themetastic_responsive"])){  $data .= '
	
	/* CUSTOM RESPONSIVE STYLES */
	/* ------------------------------------ */
	
	/* WIDE DESKTOP */
	@media only screen and (min-width: 1200px) {
		.whitebackground,.footerwrap, .headertopwrap { width: 1230px; margin-left: -615px; left: 50%; }
		.footerwrap.wide .footer, .subfooterwrap, .subfooterwrap.wide .subfooter, .headertopwrap.wide .headertop { width: 1170px; }
	
		.pagetitle { width: 1170px; }
	
		.portfolio { width: 1190px; }
		.threecol .entry	{ width:396px; }
		.fourcol .entry	{ width: 297px; }
		.fivecol .entry	{ width:238px; }
	
		.portfolio.withsidebar { width: 870px; }
		.threecol .portfolio.withsidebar .entry	{ width:290px; }
		.fourcol .portfolio.withsidebar .entry	{ width: 290px; }
		.fivecol .portfolio.withsidebar .entry	{ width:290px; }
	
		.team .memberwrap { width: 25%; }
		.clients ul li { float: left; display: inline; width: 20%; }
	
		.pricing.fivecols .pricecol .pricewrap { width: 18.1%; }
		.pricing.fourcols .pricecol .pricewrap { width: 23.1%; }
		.pricing.threecols .pricecol .pricewrap { width: 31.4%; }
	}
	
	/* REGULAR DESKTOP */
	@media only screen and (min-width: 980px) and (max-width: 1199px) {
		.whitebackground, .footerwrap, .subfooterwrap, .headertopwrap, .boxedlayout .headerwrap { width: 1000px; margin-left: -500px; left: 50%; }
		.footerwrap.wide .footer, .subfooterwrap, .subfooterwrap.wide .subfooter, .headertopwrap.wide .headertop { width: 940px; }
			
		.subfooterwrap.wide, .subfooterwrap  { width: 940px; left: 50%; margin-left: -470px; }
		.subfooterwrap.wide .subfooter, .subfooterwrap .subfooter { margin: 0 auto; width: 940px; }

		.pagetitle { width: 940px; }
		.pagetitlewrap.boxed { width: 1000px; left: 0; margin-left: -30px; }
	
		.headerwrap { width: 100%;  }
		.header { width: 940px; left: 50%; margin-left: -470px; }
	
		.portfolio { width: 960px; }
		.threecol .entry { width:320px; }
		.fourcol .entry	{	width: 240px;}
		.fivecol .entry	{ width:240px; }
	
		.portfolio.withsidebar { width: 700px; }
		.threecol .portfolio.withsidebar .entry { width:233px; }
		.fourcol .portfolio.withsidebar .entry	{ width: 233px; }
		.fivecol .portfolio.withsidebar .entry	{ width:233px; }
	
		.team .memberwrap { width: 25%; }
		.clients ul li { float: left; display: inline; width: 20%; }
	
		.pricing.fivecols .pricecol .pricewrap { width: 17.6%; }
		.pricing.fourcols .pricecol .pricewrap { width: 22.6%; }
		.pricing.threecols .pricecol .pricewrap { width: 30.9%; }
	
		.blogpost.smallmedia .postmedia { width: 270px; }
		.blogpost.smallmedia .postbody { width: 380px; }
	
		.fullblog .blogpost.smallmedia .postmedia { width: 370px; }
		.fullblog .blogpost.smallmedia .postbody { width: 540px; }
	}
	
	/* SMALL DESKTOP */
	@media only screen and (min-width: 768px) and (max-width: 979px) {
		.whitebackground, .footerwrap, .subfooterwrap, .headertopwrap, .boxedlayout .headerwrap  { width: 784px; margin-left: -392px; left: 50%; }
		.footerwrap.wide .footer,  .subfooterwrap, .subfooterwrap.wide .subfooter, .headertopwrap.wide .headertop { width: 724px; }
	
		.subfooterwrap.wide, .subfooterwrap { width: 724px; left: 50%; margin-left: -362px; }
		.subfooterwrap.wide .subfooter, .subfooterwrap .subfooter { margin: 0 auto; width: 724px; }
	
		.pagetitle { width: 724px; }
		.pagetitlewrap.boxed { width: 784px; left: 0; margin-left: -30px; }
	
		.headerwrap { width: 100%;  }
		.header { width: 724px; left: 50%; margin-left: -362px; }
	
		.portfolio { width: 744px; }
		.portfolio .entry	{	width: 248px;}
	
		.portfolio.withsidebar { width: 538px; }
		.threecol .portfolio.withsidebar .entry { width:269px; }
		.fourcol .portfolio.withsidebar .entry	{ width: 269px; }
		.fivecol .portfolio.withsidebar .entry	{ width:269px; }
	
		.team .memberwrap { width: 33.3%; }
		.clients ul li { float: left; display: inline; width: 25%; }
	
		.pricing.fivecols .pricecol .pricewrap { width: 30.2%; }
		.pricing.fourcols .pricecol .pricewrap { width: 30.2%; }
		.pricing.threecols .pricecol .pricewrap { width: 30.2%; }
	
		.blogpost.smallmedia .postmedia { width: 200px; }
		.blogpost.smallmedia .postbody { width: 288px; }
		.fullblog .blogpost.smallmedia .postmedia { width: 270px; }
		.fullblog .blogpost.smallmedia .postbody { width: 424px; }
	}
	
	/* ALL MOBILE SIZES */
	@media only screen and (max-width: 767px) {
	
		/* VISUAL COMPOSER */
	
		.vc_row-fluid .vc_span1,
		.vc_row-fluid .vc_span2,
		.vc_row-fluid .vc_span3,
		.vc_row-fluid .vc_span4,
		.vc_row-fluid .vc_span5,
		.vc_row-fluid .vc_span6,
		.vc_row-fluid .vc_span7,
		.vc_row-fluid .vc_span8		{	width:100% !important; margin-left:0px !important;  margin-bottom:25px; float:left !important; clear:both;}
	
		.wpb_content_element 				{	margin-bottom: 0px !important; }
		.tab-content .wpb_content_element	{	margin-bottom: 25px !important; }
		.wpb_wrapper .wpb_wrapper .contenttable { margin-top: 0px; }
		
		/* THEME SETTINGS */
		.whitebackground { width: 100%; margin-left: 0; left: 0; }
		.footerwrap, .subfooterwrap { width: 100%; padding-left: 20px; padding-right: 20px; margin-left: -20px; left: 0; }
		.footer, .subfooter { margin-left: 0px; }
		.subfooter .spacer { padding-right: 10px; }
	
		.pagetitlewrap { margin-left: -20px; padding-left: 20px; padding-right: 20px; }
		.pagetitlewrap.boxed { width: 100%; left: 0; margin-left: -20px; }
		.pagetitle { width: 100%; }
		.pagetitle h1 { margin-top: 31px; padding-left: 0; text-align: center; width: 100%; }
		.pagetitlewrap.boxed .pagetitle h1 { margin-top: 33px; padding-left: 0; text-align: center; width: 100%; }
		.breadcrumbwrap, .pagetitlewrap.boxed .breadcrumbwrap { margin-right: 0; width: 100%; text-align: center; margin-top: -25px; margin-bottom: 28px; }
		.boxedspacer { margin: 0 !important; }
	
		.pagetitlewrap.boxed { margin-top: 0; }
		.notitleboxedtop { margin-top: 0px; }
	
		.homesliderwrapper, .boxedlayout .homesliderwrapper { position: relative; margin-left: -20px; margin-right: -20px; }
	
		.headerwrap, .boxedlayout .headerwrap { width: 100%; margin: 0; margin-bottom: 0px; margin-left: -20px; padding-right: 40px; left: 0; }
		.header, .boxedlayout .header { width: 100%; z-index: 500; height: 80px; margin-left: 0; left: 0; }
		.header .logo, .boxedlayout .header .logo { float: left; padding: 0px; margin-left: 20px; position: absolute; }
	
		.mobilemenu, .boxedlayout .mobilemenu { padding-right: 0px; float: right; margin-top: '.$mobile_menu_top.'px; margin-bottom: '.$mobile_menu_bottom.'px; }
	
		.footerwrap.wide, .subfooterwrap.wide, .footerwrap, .subfooterwrap { padding-left: 20px; padding-right: 20px; margin-left: -20px; }
		.footerwrap.wide .footer, .subfooterwrap.wide .subfooter, .headertopwrap.wide .headertop, .headertopwrap .headertop, .footerwrap .footer, .subfooterwrap .subfooter { width: 100%; }
	
		.portfolio { width: 100%; }
		.portfolio .entry	{ width: 49.5%; }
		.mediaholder .show, .mediaholder .itemcategories, .mediaholder .cover, .mediaholder .itemtitle { display: none; }
		.mediaholder .link	{ cursor:pointer; position:absolute; left:0; top:0; color: transparent; background: transparent; width:100%; height:100%; margin-top:0px; margin-left:0px; -webkit-transition: all 0.2s; -moz-transition: all 0.2s; -o-transition: all 0.2s; -ms-transition: all 0.2s; -moz-opacity:1; filter:alpha(opacity=100); opacity:1; -webkit-border-radius: 0px; -moz-border-radius: 0px; -o-border-radius: 0px; border-radius: 0px; }
		.link.notalone { left:0; margin-left:0;}
		.mediaholder:hover .link {	-moz-opacity:1.0; filter:alpha(opacity=100); opacity:1;  width:100%; height:100%; top:0; left:0;}
		.mediaholder:hover .link.notalone { left:0; top:0;}
		.mediaholder:hover .link { top:0;}
		.mediaholder .link:hover {	background: transparent; }
		.mediaholder:hover img {
		filter: url("data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\'><filter id=\'grayscale\'><feColorMatrix type=\'matrix\' values=\'1 0 0 0 0, 0 1 0 0 0, 0 0 1 0 0, 0 0 0 1 0\'/></filter></svg>#grayscale");
		filter: none;
		-webkit-filter: grayscale(0%);
		}
	
		a.service { margin-bottom: 10px; }
		a.service:hover { color: #777; }
		a.service:hover h4 { color: #444; }
		a.service:hover h5 { color: #bbb; }
		a.service:hover .serviceicon { color: #fff; background-color: #666;  }
		.servicewrap { margin-bottom: 0px; }
	
		.headertop, .headertopwrap { width: 100%; margin: 0; padding: 0; left: 0; }
		.boxedlayout .headertopwrap { margin-left: -20px; padding-right: 40px; }
		.boxedlayout .headertopwrap .headertop { margin-left: 20px; }
		.headertop .headerlefttext { width: 100%; margin: 0; padding: 0; left: 0; text-align: center; padding-top: 10px; padding-bottom: 10px; }
	
		.social { position: relative; text-align: center; left: 50%; padding: 0; margin: 0; }
		.social ul { margin: 0; padding: 0; margin-top: 10px; margin-bottom: 10px;  }
	
		.linktext { display: none; }
	
		.one_half, .one_third, .two_third, .three_fourth, .one_fourth, .one_fifth, .one_sixth { width: 100%; }
	
		.span9.right { margin-bottom: 80px; }
		.span9.left { margin-bottom: 80px; }

		.pagewrapright { padding-right: 0px; }
		.pagewrapleft { padding-left: 0px; }
	
		.blogpost .date { /*display: none;*/ margin-left: -6px; }
		.blogpost h2 { padding-left: 57px; }
		.blogpost .posttext  { padding-left: 0px; padding-right: 0px; }
		.blogpost .readmore { float: left; position: relative; right: 0px; margin-top: 20px; }
		.blogpost .postinfo { padding-left: 57px; }
		.blogpost .postbody { padding-left: 0; }
		.blogpost.smallmedia .postmedia { width: 100%; margin-bottom: 25px; }
		.blogpost.smallmedia .postbody { width: 100%; }
		.blogpost.smallmedia h4 { margin-top: 27px; }
		.fullblog .blogpost.smallmedia .postmedia { width: 100%; }
		.fullblog .blogpost.smallmedia .postbody { width: 100%; }
		.blogpost.nodate h2 { padding-left: 0px; }
		.blogpost.nodate .postinfo { padding-left: 0px; }
		.blogpost.singlepost .posttext  { padding-right: 0px; }
	
		.footer .widget { margin-bottom: 50px; }
		
		.subfooter .textwidget { float: left; margin: 0; margin-bottom: 0px; width: 100%; }
		.subfooter .span6.lefttext { float: left; margin: 0; padding: 0; text-align: center; margin-bottom: 5px; width: 100%; }
		.subfooter .span6.righttext { float: left; margin: 0; padding: 0; text-align: center; margin-bottom: 0px; width: 100%;  }
		.subfooter .righttext .first {float: left;}
		
		.subfooter .widget_nav_menu { float: left !important; }
		
		.subfooterwrap.wide, .subfooterwrap { width: 100%; left: 0; margin-left: 0; box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box; padding-left: 20px; padding-right: 20px; }
		.subfooterwrap.wide .subfooter, .subfooterwrap .subfooter { margin: 0; width: 100%; }
	
		.pagetitle h1 { text-align: center; }
	
		.span9.left .pagination { margin: 0; }
		.span9.right .pagination { margin: 0; }
	
		.gmap { height: 200px; }
		#gmap_inner { height: 200px;}
	
	    #optionswrap { display: none; }
	
		.highlightbox .btnpos { margin-top: 0px; }
		.highlightbox .one_fourth .btn { float: left !important; margin-bottom: 15px;  }
	
		.headertop .span6			{	float:none; clear:both;}
		.headertop .themetasticSocials	{	float:none !important; clear:both;}
		.headertop .social			{	left:0; }
		.headertop .social ul		{	text-align:center; margin-top:0px; margin-bottom:0px;}
		.headertop .social ul li	{	float:none; display:inline-block;}
	
		.homesliderwrapper			{	margin-top:0px;}
		
		.clients ul li img { filter: none; -webkit-filter: grayscale(0%); }
		.clients ul li img:hover { filter: none; -webkit-filter: grayscale(0%); }
	}
	
	/* MOBILE LANDSCAPE TO TABLET PORTRAIT */
	@media only screen and (min-width: 480px) and (max-width: 767px) {
		.clients ul li { float: left; display: inline; width: 33.3333%; }
		.team .memberwrap { width: 50%; }
		.pricing.fivecols .pricecol .pricewrap { width: 44.8%; }
		.pricing.fourcols .pricecol .pricewrap { width: 44.8%; }
		.pricing.threecols .pricecol .pricewrap { width: 44.8%; }
	}
	
	/* MOBILE PORTRAIT TO MOBILE LANDSCAPE */
	@media only screen and (min-width: 0px) and (max-width: 479px) {
		.clients ul li { float: left; display: inline; width: 50%; }
		.team .memberwrap { width: 100%; }
		.pricing.fivecols .pricecol .pricewrap { width: 94%; }
		.pricing.fourcols .pricecol .pricewrap { width: 94%; }
		.pricing.threecols .pricecol .pricewrap { width: 94%; }
		#respond input { float: left; width: 100%; margin-right:0; }
		.nav-tabs > li { margin-bottom: 5px; margin-right: 5px; }
		.nav-tabs > .active > a, .nav-tabs > .active > a:hover { border: 1px solid #eee; }
	
		.blogpost.singlefolio h2 { padding-right: 0px; }
		.blogpost.singlefolio .postinfo { padding-right: 0px; }
	
		.vc_responsive div.vc_row-fluid div[class*="vc_span"]	{	float:left !important; }
		.vc_span12.wpb_column.column_container					{	width:100% !important;}
		.pricing.fourcols .pricecol .pricewrap,
		.pricing.twocols .pricecol .pricewrap,
		.pricing.fivecols .pricecol .pricewrap,
		.pricing.threecols .pricecol .pricewrap					{	width:98% !important;}
	
	}
	
	/* MOBILE MENU */
	/* ------------------------------------ */
	
	@media only screen and (max-width: 767px) {
		#mainmenu { float: left; visibility: hidden; height: 0; width: 0;}
		.mainmenu { background: #fff; border-top: 0; border-right: 0; border-bottom: 0; }
		.headersearch { display: none; }
		.mobilemenu { display: block; }
	
		.headerleftwrap .textwidget		{ display:inline-block; }
		.headerleftinner 				{  }
	
		.headerrighttext				{	margin:0; padding:0 !important;}
		.headerrightwidget 				{	text-align:center; float:none !important; clear:both; margin-left:0px !important;}
		.headerrightwidget ul			{	text-align:center}
		.headerrightwidget ul li		{	display:inline-block; text-align:left;}
		.headerrightwidget ul li ul li	{	display:block;}
	
		.headerlefttext				{	margin:0; padding:0 !important;}
		.headerleftwidget 				{	text-align:center; float:none !important; clear:both;}
		.headerleftwidget ul			{	text-align:center}
		.headerleftwidget ul li			{	display:inline-block; text-align:left;}
		.headerleftwidget ul li ul li	{	display:block;}
	
		.headertop .icon_wrap:last-child	{	margin-right:0px;}
	
	}';
	
	} else {  $data .= '
	
		.allwrapper { background: #FFF; width: 940px; padding: 0px 30px; margin: auto; }
	
		.whitebackground, .subfooterwrap, .headertopwrap, .boxedlayout .headerwrap { width: 100%; left: 0; margin: 0; }
		.footerwrap.wide .footer, .subfooterwrap, .subfooterwrap.wide .subfooter, .headertopwrap.wide .headertop { width: 940px;  }
		
		.footerwrap { width: 1000px; left: 0; margin: 0 auto; }
				
		.subfooterwrap.wide, .subfooterwrap  { width: 940px; margin: 0 auto; left: 0; }
		.subfooterwrap.wide .subfooter, .subfooterwrap .subfooter { margin: 0 auto; width: 940px; }

		.pagetitle { width: 940px; }
		.pagetitlewrap.boxed { width: 1000px; left: 0; margin-left: -30px; }
	
		.headerwrap { width: 100%; }
		.headertop { width: 940px; margin: 0 auto; float: none !important; left: 0; }
		.header { width: 940px; margin: 0 auto; float: none !important; left: 0; }
		.subfooter { width: 940px; margin: 0; float: none !important; left: 0; }
	
		.portfolio { width: 960px; }
		.threecol .entry { width:320px; }
		.fourcol .entry	{	width: 240px;}
		.fivecol .entry	{ width:240px; }
	
		.portfolio.withsidebar { width: 700px; }
		.threecol .portfolio.withsidebar .entry { width:233px; }
		.fourcol .portfolio.withsidebar .entry	{ width: 233px; }
		.fivecol .portfolio.withsidebar .entry	{ width:233px; }
	
		.team .memberwrap { width: 25%; }
		.clients ul li { float: left; display: inline; width: 20%; }
	
		.pricing.fivecols .pricecol .pricewrap { width: 17.6%; }
		.pricing.fourcols .pricecol .pricewrap { width: 22.6%; }
		.pricing.threecols .pricecol .pricewrap { width: 30.9%; }
	
		.blogpost.smallmedia .postmedia { width: 270px; }
		.blogpost.smallmedia .postbody { width: 380px; }
	
		.fullblog .blogpost.smallmedia .postmedia { width: 370px; }
		.fullblog .blogpost.smallmedia .postbody { width: 540px; }
	
	';
	}
	
	$data .= '
	
	/* WOO COMMERCE STYLES */
	
	a.wcmenucart-contents i { margin-right: 2px !important; }
	
	h1.page-title { display: none; }
	.woocommerce-pagination { display: none; }
	.woocommerce-result-count { color: #aaa; margin-top: 10px !important;  margin-bottom: 20px !important; }
	.woocommerce-ordering { margin-top: 10px !important; margin-bottom: 20px !important; }
	
	.woocommerce ul.products li.product a img, .woocommerce-page ul.products li.product a img { box-shadow: none !important; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; border: 1px solid #eee !important; border-bottom: 1px solid #ddd !important; }
	.woocommerce ul.products li.product h3 { font-size: 14px !important; line-height: 18px !important; }
	
	div.product div.images, .woocommerce #content div.product div.images, .woocommerce-page div.product div.images, .woocommerce-page #content div.product div.images {
		width: 30% !important;
		margin-bottom: 59px !important;
	}
	div.product div.summary, .woocommerce #content div.product div.summary, .woocommerce-page div.product div.summary, .woocommerce-page #content div.product div.summary {
		width: 65% !important;
	}
	.woocommerce-main-image.zoom img { 	border: 1px solid #eee !important; border-bottom: 1px solid #ddd !important; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
	.images .thumbnails a img { border: 1px solid #eee !important; border-bottom: 1px solid #ddd !important; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
	
	
	#tab-description h2 { font-size: 18px !important; margin-bottom: 19px !important; }
	#tab-reviews #comments h2 { font-size: 18px !important; margin-bottom: 19px !important; margin-top: 3px !important; }
	.related.products { margin-top: 51px !important; }
	.related.products h2 { font-size: 18px !important; margin-bottom: 28px !important; }
	.upsells.products { margin-top: 51px !important; }
	.upsells.products h2 { font-size: 18px !important; margin-bottom: 28px !important; }
	
	div.product .woocommerce-tabs ul.tabs, .woocommerce #content div.product .woocommerce-tabs ul.tabs, .woocommerce-page div.product .woocommerce-tabs ul.tabs, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs {
	margin-bottom: 27px !important; }
	
	.woocommerce .star-rating { color: #ffc321 !important; }
	.woocommerce .price { font-size: 15px !important; font-weight: normal !important; }
	.summary { margin-bottom: 54px !important; }
	.summary.entry-summary .price { font-size: 18px !important; font-weight: normal !important; }
	.woocommerce .added_to_cart { float: left !important; width: 100%; }
	
	.woocommerce .related ul.products li.product { float: left; margin: 0px 3.8% 2.992em 0px !important; padding: 0px; position: relative; width: 22.05% !important; }
	.woocommerce .upsells ul.products li.product { float: left; margin: 0px 3.8% 2.992em 0px !important; padding: 0px; position: relative; width: 22.05% !important; }
	
	table.variations { border-spacing: 10px !important; margin-bottom: 10px !important; }
	table.variations td { padding: 20px !important; }
	table.variations td.label { width: 15% !important;  height: 0px !important; padding: 0px !important; padding-right: 0px !important; background: transparent !important; border-right: 0px solid #eee !important;}
	table.variations td.label label { -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; background: ' . $highlightcolor  . '; padding: 8px !important; margin: 0 !important; margin-top: 0px !important; text-shadow: none !important; color: #fff !important; }
	table.variations td.value { padding: 0 !important; padding-left: 20px !important; margin: 0 !important; }
	table.variations td.value select { margin: 0 !important; }
	a.reset_variations { float: left; margin-top: 5px !important; }
	form.variations_form { margin-bottom: 0px !important; }
	.product_meta { font-size: 12px !important; color: #aaa !important; }
	.product_meta a { color: #aaa !important; }
	.product_meta a:hover { color: #777 !important; }
	.sku_wrapper { margin-right: 18px !important; }
	
	table.group_table { border-spacing: 10px !important; margin-bottom: 10px !important; }
	table.group_table td { padding: 0px !important; }
	table.group_table td.label { width: 120px !important;  height: 0px !important; padding: 0px !important; padding-right: 0px !important; background: transparent !important; border-right: 0px solid #eee !important;}
	table.group_table td.label label { float: left !important; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; background: ' . $highlightcolor  . '; padding: 8px !important; margin: 0 !important; margin-top: 0px !important; text-shadow: none !important; color: #fff !important; }
	table.group_table td.value { padding: 0 !important; padding-left: 20px !important; margin: 0 !important; }
	table.group_table td.value select { margin: 0 !important; }
	
	table.group_table tr td:first-child { width: 60px !important; }
	table.group_table td .amount { float: left !important; border-spacing: 0px !important; margin-top: 6px !important; margin-right: 15px !important; }
	table.group_table td .stock { font-size: 13px !important; border-spacing: 0px !important; margin-top: 6px !important; }
	
	
	/* CHECKOUT */
	#customer_details h3 { font-size: 18px !important; margin-bottom: 18px !important; margin-top: 12px !important; }
	h3#order_review_heading { font-size: 18px !important; margin-bottom: 28px !important; margin-top: 28px !important; }
	#order_comments { height: 300px !important; }
	
	/* ORDER RECIEVED */
	.woocommerce h2 { font-size: 18px !important; margin-bottom: 28px !important; margin-top: 0px !important; }
	.woocommerce header h2 { font-size: 18px !important; margin-bottom: 20px !important; margin-top: 37px !important; }
	.col2-set h3 { font-size: 18px !important; margin-bottom: 20px !important; margin-top: 12px !important; }
	.order_details li { margin-bottom: 10px !important; }
	
	/* CART */
	.cart_totals h2 { font-size: 18px !important; margin-bottom: 16px !important; margin-top: 13px !important; }
	.shipping_calculator h2 { font-size: 18px !important; margin-bottom: 25px !important; margin-top: 0px !important; }
	
	/* Edit Address */
	.col-1.address a.edit { margin-top: 12px !important; }
	.col-2.address a.edit { margin-top: 12px !important; }
	
	/* WOOCOMMERCE WIDGETS */
	#searchform { margin-bottom: 0; }
	#searchform .screen-reader-text { display: none; }
	#searchform #searchsubmit { display: none; }
	#searchform input#s { width: 100%; }
	
	ul.product_list_widget img { float: left !important; box-shadow: none !important; margin: 0 !important; margin-right: 10px !important; border: 1px solid #eee !important; border-bottom: 1px solid #ddd !important; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }  }
	ul.product_list_widget a { font-weight: normal !important; }
	
	ul.product-categories { margin: 0; padding: 0; list-style:none; }
	ul.product-categories li { float: left; width: 100%; color: #777; border-bottom: 1px solid #eee; border-top: 1px solid #fff; padding-top:7px; padding-bottom: 7px; }
	ul.product-categories li a { float: left; font-weight: normal; margin-right: 3px;}
	ul.product-categories li a:before { float: left; content: "&rsaquo;"; font-size: 13px; line-height: 13px; text-shadow: none; font-weight: bold; margin-right: 8px; margin-top: 2px; /*padding: 0px 5px;*/ padding-bottom: 3px; color: ' . $highlightcolor  . '; /*background: #fefefe; border: 1px solid #e5e5e5;*/ -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; -webkit-transition: all 0.15s; -moz-transition: all 0.15s; -o-transition: all 0.15s; -ms-transition: all 0.15s; transition: all 0.15s; }
	ul.product-categories li a:hover:before { color: #aaa; }
	ul.product-categories li:first-child { border-top: 0; padding-top: 0; }
	ul.product-categories li:last-child { border-bottom: 0; padding-bottom: 0; }
	
	.widget_shopping_cart_content { margin-bottom: -20px !important; }
	.widget_shopping_cart_content ul { float: left !important; width: 100% !important; }
	.widget_shopping_cart_content dl.variation { float: left !important; width: 100% !important; padding-top: 5px !important; }
	.widget_shopping_cart_content p.total { float: left !important; width: 100% !important; }
	.widget_shopping_cart_content a.button { margin-right: 7px !important; margin-bottom: 10px !important; }
	.widget_shopping_cart_content a.button.checkout { margin-right: 0 !important; }
	
	/* WOO COMMERCE MOBILE LANDSCAPE TO TABLET PORTRAIT */
	@media only screen and (min-width: 480px) and (max-width: 767px) {
		ul.products li.product, .woocommerce .related ul.products li.product { margin: 0px 3.8% 2.992em 0px; width: 46.2% !important; }
		ul.products li.product, .woocommerce .upsells ul.products li.product { margin: 0px 3.8% 2.992em 0px; width: 46.2% !important; }
		.woocommerce-result-count { float: left; color: #aaa; margin-top: 10px !important;  margin-bottom: 4px !important; }
		.woocommerce-ordering { float: left; width: 100%; margin-top: 10px !important; margin-bottom: 20px !important; }
		.woocommerce-ordering select.orderby { float: left; width: 100%;}
	
		#customer_details .col-1, #customer_details .col-2 { width: 100%; }
		#customer_details .col-2 h3 { margin-top: 28px !important; }
	}
	
	
	/* WOO COMMERCE MOBILE PORTRAIT TO MOBILE LANDSCAPE */
	@media only screen and (min-width: 0px) and (max-width: 479px) {
		ul.products li.product, .woocommerce .related ul.products li.product { margin: 0px 3.8% 2.992em 0px; width: 46.2% !important; }
		ul.products li.product, .woocommerce .upsells ul.products li.product { margin: 0px 3.8% 2.992em 0px; width: 46.2% !important; }
		.woocommerce-result-count { float: left; color: #aaa; margin-top: 10px !important;  margin-bottom: 4px !important; }
		.woocommerce-ordering { float: left; width: 100%; margin-top: 10px !important; margin-bottom: 20px !important; }
		.woocommerce-ordering select.orderby { float: left; width: 100%;}
	
		div.product div.images, .woocommerce #content div.product div.images, .woocommerce-page div.product div.images, .woocommerce-page #content div.product div.images {
			width: 100% !important;
			margin-bottom: 59px !important;
		}
	
		div.product div.summary, .woocommerce #content div.product div.summary, .woocommerce-page div.product div.summary, .woocommerce-page #content div.product div.summary {
			width: 100% !important;
		}
	
		#customer_details .col-1, #customer_details .col-2 { width: 100%; }
		#customer_details .col-2 h3 { margin-top: 28px !important; }
	
		.col-1.address { width: 100% !important; }
		.col-2.address { width: 100% !important; }
	
		p.form-row.form-row-first, p.form-row.form-row-last { width: 100% !important; padding: 0 !important; }
	
		input#password_1 {width: 100% !important;  }
	}
	
	/* WOO SINGLE PAGE */
	
	div.product div.images img, .woocommerce #content div.product div.images img, .woocommerce-page div.product div.images img, .woocommerce-page #content div.product div.images img {
	box-shadow: none !important; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }
	.images .thumbnails { margin-left: 0; }
	.images .thumbnails a { margin-bottom: 10px !important; }
	div.product .product_title, .woocommerce #content div.product .product_title, .woocommerce-page div.product .product_title, .woocommerce-page #content div.product .product_title {
	font-size: 18px; line-height: 25px; margin-top: -7px !important; margin-bottom: 4px !important;
	}
	.quantity { margin-right: 10px !important; }
	.quantity .minus, .woocommerce #content .quantity .minus, .woocommerce-page .quantity .minus, .woocommerce-page #content .quantity .minus {
	line-height: 12px !important; height: 15px !important; padding-bottom: 16px !important; top: 17px !important;
	}
	.quantity .plus, .woocommerce #content .quantity .plus, .woocommerce-page .quantity .plus, .woocommerce-page #content .quantity .plus {
	line-height: 12px !important; height: 18px !important;
	}
	.quantity input.qty, .woocommerce #content .quantity input.qty, .woocommerce-page .quantity input.qty, .woocommerce-page #content .quantity input.qty {
	height: 35px !important;
	}
	/*.single_add_to_cart_button { margin-left: 11px !important;  }*/
	
	
	/* WPML */
	
	.menu-item img.iclflag { margin-bottom: 2px !important; margin-right: 5px !important; }
	.headertop #lang_sel { margin-top: 3px; height: auto; }
	#lang_sel img.iclflag { top: -1px; }
	#lang_sel { z-index: 1000 !important; }
	#lang_sel ul ul { z-index: 1000 !important; }
	/*#icl_lang_sel_widget { margin-top: -1px; }
	#icl_lang_sel_widget img.iclflag { top: -1px !important; margin-right: -3px !important; }
	#lang_sel { z-index: 1000 !important; }
	#lang_sel ul ul { z-index: 1000 !important; border-top: 0 !important; }
	a.lang_sel_sel {  -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; border: 1px solid #eee !important; }
	li.icl-de a { border: 1px solid #eee !important; }
	*/

	#lang_sel ul li a {
		border: 0px solid #e5e5e5;
	}

	#lang_sel > ul {
		border: 1px solid #fff;
	}

	#lang_sel > ul:hover {
		border: 1px solid #e5e5e5;
	}
	
	#lang_sel ul li ul {
		left: -1px;
	}
	#lang_sel ul ul {
		border-top : 0;
	}
	
	#lang_sel ul li ul li {
		border-left: 1px solid #e5e5e5;
		border-right: 1px solid #e5e5e5;
	}
	
	#lang_sel ul li ul li:last-child {
		border-bottom: 1px solid #e5e5e5;
	}
	
	/* BBPRESS & BUDDYPRESS */
	
	
	/** FORUMS **/
	div.bbp-breadcrumb { margin-top: 7px !important; }
	#bbpress-forums div.bbp-search-form { margin-bottom: -10px !important; }
	.bbp-forum-content p { margin-bottom: 0px !important; }
	.bbp-footer div.tr { display: none !important; }
	
	.padder .item-list-tabs				{  margin-left:0; margin-right:0; width:100%; clear:both;}
	.padder div.pagination				{  margin:0px 0px 10px 0px; padding:0; background:transparent; float:left; clear:both;}
	.padder div.item-list-tabs#subnav	{  margin-left:0; margin-right:0; }
	.padder table.forum					{  margin-left:0; margin-right:0; width:100% }
	
	.padder div#item-header							{	position:relative;}
	.padder div#item-header div#item-header-content	{	margin-left:0; position:absolute; left:170px}
	
	.padder div.item-list-tabs#subnav				{	border:none;}
	
	/** Forums Forms **/
	.padder #forums-directory-form					{ clear:both;}
	
	
	/** WHATS NEW **/
	form#whats-new-form #whats-new-textarea			{	border:none;}
	form#whats-new-form textarea					{	height:150px;}
	
	/** THE SEARCH FORMS **/
	.padder #forums-search-form	h3					{   float:left; }
	.padder form.dir-form div.dir-search			{   float:right; width:auto; margin:0; margin-bottom:20px; clear:right}
	.padder form.dir-form div.dir-search:after		{	clear:both}
	
	.padder #groups-directory-form	h3				{   float:left; }
	.padder form.dir-form div.dir-search			{   float:right; width:auto; margin:0; margin-bottom:20px; clear:right}
	.padder form.dir-form div.dir-search:after		{	clear:both}
	
	/* BB PRESS */
	.bbp-reply-title h3, .bbp-topic-title h3, .bbp-forum-title h3 { font-size: 18px !important; }
	.bbp-pagination { margin-top: 20px !important; }
	
	#bbpress-forums { margin-bottom: 30px !important; }
	#bbpress-forums p.bbp-topic-meta img.avatar, #bbpress-forums ul.bbp-reply-revision-log img.avatar, #bbpress-forums ul.bbp-topic-revision-log img.avatar, #bbpress-forums div.bbp-template-notice img.avatar, #bbpress-forums .widget_display_topics img.avatar, #bbpress-forums .widget_display_replies img.avatar, #bbpress-forums p.bbp-topic-meta img.avatar {
	    margin-bottom: -1px !important; margin-right: 0px !important;
	}
	.bbp-search-results, #bbpress-forums ul.bbp-lead-topic, #bbpress-forums ul.bbp-topics, #bbpress-forums ul.bbp-forums, #bbpress-forums ul.bbp-replies {
	    border: 1px solid #eee !important;
	    margin-bottom: 0 !important;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}
	#bbpress-forums li.bbp-header {
	    background: #eee !important;
	}
	#bbpress-forums div.bbp-topic-author img.avatar, #bbpress-forums div.bbp-reply-author img.avatar {
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
	}
	#bbpress-forums #new-post legend { font-size: 18px !important; font-weight: bold !important; }
	
	/* BUDDYPRESS GROUPS */
	
	.item-meta .activity { padding-left: 7px !important; padding-right: 7px !important; }
	.item-list-tabs li#groups-all a { -webkit-border-radius: 3px !important; -moz-border-radius: 3px !important; border-radius: 3px !important; }
	.item-list-tabs li#groups-all { margin-bottom: 15px !important; }
	.item-list-tabs li#home-groups-li { margin-bottom: 15px !important; }
	.item-list-tabs li#activity-personal-li { margin-bottom: 15px !important; }
	.item-list-tabs { border-bottom: 3px solid #eee !important; margin-bottom: 0 !important; }
	#groups-order-select { margin-top: 5px !important; margin-bottom: 5px !important; }
	.item-avatar img { -webkit-border-radius: 3px !important; -moz-border-radius: 3px !important; border-radius: 3px !important; }
	.item-list .item-desc p { margin-bottom: 0px !important; }
	.item-list .item-desc { margin-left: 0px !important; }
	.pag-count { margin-left: 0px !important; }
	.item-list .meta { margin-top: 0px !important; }
	.group-button { margin-bottom: 11px !important; }
	
	/* BUDDYPRESS MEMBERS */
	
	.item-list-tabs li#members-all { margin-bottom: 15px !important; }
	#item-header-avatar img { -webkit-border-radius: 3px !important; -moz-border-radius: 3px !important; border-radius: 3px !important; }
	.activity-avatar img { -webkit-border-radius: 3px !important; -moz-border-radius: 3px !important; border-radius: 3px !important; }
	#item-header-content .activity { padding-left: 7px !important; padding-right: 7px !important; }
	.item-list-tabs ul li { margin-right: 10px !important; }
	.item-list-tabs ul li a { -webkit-border-radius: 3px !important; -moz-border-radius: 3px !important; border-radius: 3px !important; padding: 2px 5px !important; }
	#buddypress .activity-header p { margin: 0 !important; padding: 0 !important; }
	#buddypress .activity-meta { margin: 0 !important; padding: 0 !important; }
	#buddypress ul.item-list { border-top: 0 !important; }
	#buddypress .activity .info { margin-top: 18px !important; }
	
	.avatar-20.photo {
	padding-left: 3px !important;
	padding-right: 3px !important;
	width: 20px !important;
	height: 20px !important;
	-webkit-border-radius: 3px !important;
	-moz-border-radius: 3px !important;
	border-radius: 3px !important;
	vertical-align: top;
	margin-top: 5px;
	padding-top: 2px;
	}
	
	.avatar-50.photo {
	width: 50px !important;
	height: 50px !important;
	-webkit-border-radius: 3px !important;
	-moz-border-radius: 3px !important;
	border-radius: 3px !important;
	vertical-align: top;
	margin-left: 0 !important; 
	}
	
	
	#buddypress .activity-meta .button { margin-top: 10px !important; }
	
	/* BUDDYPRESS WIDGETS */
	
	.widget .item-list { margin-bottom: -10px !important; }
	.widget .item-list li { margin: 0 !important; padding: 0 !important; margin-bottom: 10px !important; }
	.widget .item-list .item-meta { margin-left: 28px !important; }
	.widget .item-title a { font-size: 12px !important; }
	.widget .item-list li:last-child { border-bottom: 0 !important; }
	.widget .item-options { margin: 0 !important; padding: 0 !important; }
	
	
	/* BUDDYPRESS MEDIA QUERIES */
	
	@media only screen and (min-width: 0px) and (max-width: 479px) {
	
		li.bbp-forum-info, li.bbp-topic-title {
			float: left;
			text-align: left;
			width: 35%;
		}
	
		li.bbp-forum-topic-count, li.bbp-topic-voice-count, li.bbp-forum-reply-count, li.bbp-topic-reply-count {
			float: left;
			text-align: center;
			width: 20%;
		}
	
		#bbpress-forums div.bbp-search-form input#bbp_search { width: 100% !important; }
		#bbpress-forums div.bbp-search-form { float: left !important; width: 100% !important; }
	}
	
	
	
	
	/* WP CORE STYLES */
	
	.alignnone {
	    margin: 5px 20px 20px 0;
	}
	
	.aligncenter, div.aligncenter {
	    display:block;
	    margin: 5px auto 5px auto;
	}
	
	.wp-caption {
	    background: #fff;
	    border: 1px solid #f0f0f0;
	    max-width: 96%; /* Image does not overflow the content area */
	    padding: 5px 3px 10px;
	    text-align: center;
	}
	
	.wp-caption.alignnone {
	    margin: 5px 20px 20px 0;
	}
	
	.wp-caption.alignleft {
	    margin: 5px 20px 20px 0;
	}
	
	.wp-caption.alignright {
	    margin: 5px 0 20px 20px;
	}
	
	.wp-caption img {
	    border: 0 none;
	    height: auto;
	    margin:0;
	    max-width: 98.5%;
	    padding:0;
	    width: auto;
	}
	
	.wp-caption p.wp-caption-text {
	    font-size:11px;
	    line-height:17px;
	    margin:0;
	    padding:0 4px 5px;
	}
	
	img.size-auto,
	img.size-large,
	img.size-full,
	img.size-medium {
		max-width: 100%;
		height: auto;
	}
	
	.alignleft,
	img.alignleft {
		display: inline;
		float: left;
		margin-right: 20px;
		margin-top: 0px;
	}
	.alignright,
	img.alignright {
		display: inline;
		float: right;
		margin-left: 20px;
		margin-top: 0px;
	}
	.aligncenter,
	img.aligncenter {
		clear: both;
		display: block;
		margin-left: auto;
		margin-right: auto;
	}
	img.alignleft,
	img.alignright,
	img.aligncenter {
		margin-bottom: 20px;
	}
	
	.bypostauthor {}
	.sticky{}
	.gallery-caption{}
	
	iframe.twitter-timeline{
		width:100% !important;
		min-width:100% !important;
		max-width:100% !important;
		display:none;
	}
	
	
	/*****************************************
		-	BUDDYPRESS FUN  FOR Ver. 1.7.   -
	******************************************/
	#buddypress							{	position:relative;}
	#buddypress div.item-list-tabs 		{	margin:25px 0px 20px;}
	#buddypress div.dir-search			{	margin:0px; position:absolute; right:0px;}
	
	
	#bbp-search-form #bbp_search_submit,
	#buddypress #groups_search_submit,
	#buddypress #members_search_submit		{	display:none !important;}
	
	#buddypress #activity-filter-select,
	#buddypress	#members-order-select,
	#buddypress #groups-order-select	{	margin-right:0px !important;}
	
	#buddypress #activity-filter-select label,
	#buddypress	#members-order-select label,
	#buddypress #groups-order-select label	{	float:left; line-height:33px; margin-right:20px;}
	
	#buddypress #members-order-by,
	#buddypress #activity-filter-by,
	#buddypress #groups-order-by			{	float:right;}
	
	#buddypress form#whats-new-form						{ margin-top: 20px !important; }
	#buddypress form#whats-new-form p.activity-greeting {	line-height:1;}
	#buddypress form#whats-new-form #whats-new-textarea	{	width:100%; padding:0 !important}
	#buddypress #whats-new-textarea	#whats-new			{	width:100%;}
	#buddypress #whats-new-options						{	height:65px !important;display:block !important; overflow:hidden !important}
	
	
	
	@media only screen and (max-width: 678px) {
		#buddypress div.dir-search						{	margin:0px; position:relative !important;clear:both !important;float:left !important;}
		#buddypress div.dir-search input[type="text"]	{	width:100%}
		#buddypress #groups-order-select,
		#buddypress #members-order-select				{	float:left;}
	}
	
	
	
	
	/* WP CORE STYLES */
	
	.alignnone {
	    margin: 5px 20px 20px 0;
	}
	
	.aligncenter, div.aligncenter {
	    display:block;
	    margin: 5px auto 5px auto;
	}
	
	.alignright {
	    float:right;
	    margin: 5px 0 20px 20px;
	}
	
	.alignleft {
	    float:left;
	    margin: 5px 20px 20px 0;
	}
	
	.aligncenter {
	    display: block;
	    margin: 5px auto 5px auto;
	}
	
	a img.alignright {
	    float:right;
	    margin: 5px 0 20px 20px;
	}
	
	a img.alignnone {
	    margin: 5px 20px 20px 0;
	}
	
	a img.alignleft {
	    float:left;
	    margin: 5px 20px 20px 0;
	}
	
	a img.aligncenter {
	    display: block;
	    margin-left: auto;
	    margin-right: auto
	}
	
	.wp-caption {
	    background: #fff;
	    border: 1px solid #f0f0f0;
	    max-width: 96%; /* Image does not overflow the content area */
	    padding: 5px 3px 10px;
	    text-align: center;
	}
	
	.wp-caption.alignnone {
	    margin: 5px 20px 20px 0;
	}
	
	.wp-caption.alignleft {
	    margin: 5px 20px 20px 0;
	}
	
	.wp-caption.alignright {
	    margin: 5px 0 20px 20px;
	}
	
	.wp-caption img {
	    border: 0 none;
	    height: auto;
	    margin:0;
	    max-width: 98.5%;
	    padding:0;
	    width: auto;
	}
	
	.wp-caption p.wp-caption-text {
	    font-size:11px;
	    line-height:17px;
	    margin:0;
	    padding:0 4px 5px;
	}
	
	.bypostauthor {}
	.sticky{}
	.gallery-caption{}
';

$data .= $themeoptions["themetastic_custom_css"];
	
	
	//save and close css file
		$stylesheet_path = get_template_directory().'/style.css';
		$stylesheet = fopen($stylesheet_path, 'w');
		fwrite($stylesheet, $data);
		fclose($stylesheet);
}