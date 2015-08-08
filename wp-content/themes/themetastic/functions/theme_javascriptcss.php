<?php
/* ------------------------------------- */
/* ENQUEUE JAVASCRIPTS + CSS */
/* ------------------------------------- */

function loadJSCSS() {

	$absolute_path = __FILE__;
	$path_to_file = explode( 'wp-content', $absolute_path );
	$path_to_wp = $path_to_file[0];
	require_once( $path_to_wp.'/wp-load.php' );

	// Themeoptions
	$themeoptions = getThemeOptions();

	/* Google Font */
	$headlinefonturl = $themeoptions["themetastic_font_headlineurl"];
	
	if (!is_admin()) {
		wp_enqueue_script( 'jquery' );

		//Google Font
		if(!empty($headlinefonturl)) wp_enqueue_style( 'themetastic_googlefont_style',$headlinefonturl);

		//Fontello Icons
	    wp_enqueue_style( 'themetastic_fontello_style',themetastic_TYPE.'/fontello.css');

	    //FancyBox2 Helpers
	    wp_enqueue_style( 'themetastic_fancybox_style',themetastic_JAVASCRIPT.'/fancybox/jquery.fancybox.css?v=2.1.3');

		//Slider Style
		wp_enqueue_style( 'themetastic_slider_style',themetastic_CSS.'/slider.css');
		
		// Enqueue the Theme Styles
		wp_enqueue_style( 'themetastic_bootstrap_style',themetastic_CSS.'/bootstrap.min.css');
		if (isset($themeoptions["themetastic_responsive"])){
			wp_enqueue_style( 'themetastic_bootstrap-responsive_style',themetastic_CSS.'/bootstrap-responsive.min.css');
		}

		// Main CSS
	    wp_enqueue_style( 'themetastic_wp_style',get_stylesheet_directory_uri().'/style.css');

		// Enqueue the Theme JS
		// Basics
		wp_enqueue_script('themetastic_tweenmax', themetastic_JAVASCRIPT."/TweenMax.min.js", array('jquery'),false,true);
		wp_enqueue_script('themetastic_modernizr_script', themetastic_JAVASCRIPT."/jquery.modernizr.min.js", array('jquery'),false,true);
		wp_enqueue_script('themetastic_isotope_script', themetastic_JAVASCRIPT."/jquery.isotope.min.js", array('jquery'),false,true);
		wp_enqueue_script('themetastic_easing_script', themetastic_JAVASCRIPT."/jquery.easing.1.3.js", array('jquery'),false,true);
		wp_enqueue_script('themetastic_fitvid_script', themetastic_JAVASCRIPT."/jquery.fitvid.js", array('jquery'),false,true);
		wp_enqueue_script('themetastic_backstretch_script', themetastic_JAVASCRIPT."/jquery.backstretch.min.js", array('jquery'),false,false);
		wp_enqueue_script('themetastic_bootstrap_script', themetastic_JAVASCRIPT."/bootstrap.min.js", array('jquery'),false,true);
		wp_enqueue_script('themetastic_menu_script', themetastic_JAVASCRIPT."/ddsmoothmenu.js", array('jquery'),false,true);
		//wp_enqueue_script('themetastic_prettyphoto_script', themetastic_JAVASCRIPT."/jquery.prettyPhoto.js", array('jquery'),false,true);
		wp_enqueue_script('themetastic_fancybox_script', themetastic_JAVASCRIPT."/fancybox/jquery.fancybox.pack.js?v=2.1.3", array('jquery'),false,true);
		wp_enqueue_script('themetastic_fancybox_script_media', themetastic_JAVASCRIPT."/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5", array('jquery'),false,true);
		wp_enqueue_script('themetastic_retina_script', themetastic_JAVASCRIPT."/retina.js", array('jquery'),false,true);
		/*if(is_singular() && get_option("thread_comments")) wp_enqueue_script("comment-reply");*/

		// Main Script
		wp_enqueue_script('themetastic_screen_script', themetastic_JAVASCRIPT."/screen.js", array('jquery'),false,true);
		
		//Comments
		if(is_singular() && get_option("thread_comments")) wp_enqueue_script("comment-reply");
		
		//IE8
		add_filter( 'wp_enqueue_scripts', 'wpseie8_enqueue_scripts' );
		function wpseie8_enqueue_scripts() {
		    wp_enqueue_style( 'ie8', themetastic_CSS.'/ie8.css', array(), '1.0.0' );
		    wp_enqueue_script( 'ie8_script', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
		    global $wp_styles;
		    $wp_styles->registered['ie8']->add_data( 'conditional', 'IE 8' ); 
		}
		
	}
	
}
add_action('wp_enqueue_scripts', 'loadJSCSS');



function load_custom_wp_admin_style(){
    wp_register_style( 'custom_wp_admin_css', themetastic_CSS.'/page_options.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');
   
?>