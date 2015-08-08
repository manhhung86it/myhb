<?php
$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];
require_once( $path_to_wp.'/wp-load.php' );
require_once( $path_to_wp.'/wp-includes/functions.php');

$template_url_first = get_template_directory_uri();

if(get_option('themetastic_first_import')!="on"){
	themetastic_first_import_check();
}



function themetastic_first_import_check(){
	global $template_url_first;
	update_option('themetastic_first_import','on');
	
	// Theme Options
	
	update_option('themetastic_theme_layout_options',array("themetastic_themelayout" => "Full-Width", "themetastic_custom_css" => "", "themetastic_parallax_effect" => "1", "themetastic_responsive" => "1"));
	
	
	update_option('themetastic_theme_header_options',array("themetastic_img_logo" => $template_url_first."/img/logo.png", "themetastic_resp_img_logo" => $template_url_first."/img/logo@2x.png", "themetastic_headertopline" => "1", "themetastic_margin_top" => "42", "themetastic_margin_bottom" => "45", "themetastic_headertopline_color" => "highlight", "themetastic_headersearch" => "1", "themetastic_submenuwidth" => "135", "themetastic_parallax_effects" => "1"));
	
	
	update_option('themetastic_theme_footer_options',array("themetastic_footerwidgetsactive" => "1", "themetastic_subfooterwidgetsactive" => "1", "themetastic_footerbackground" => $template_url_first."/img/tiles/footeroverlay.jpg"));
	
	
	update_option('themetastic_theme_favicons_options',array("themetastic_favicon16" => $template_url_first."/img/favicon.ico", "themetastic_favicon57" => $template_url_first."/img/apple-touch-icon.png", "themetastic_favicon72" => $template_url_first."/img/apple-touch-icon-72x72.png", "themetastic_favicon114" => $template_url_first."/img/apple-touch-icon-114x114.png"));
	
	
	update_option('themetastic_theme_font_options',array("themetastic_font_headlineurl" => "http://fonts.googleapis.com/css?family=Open+Sans:300,400,700", "themetastic_font_headlinefamily" => "'Open Sans', sans-serif;"));
	
	
	update_option('themetastic_theme_color_options',array("themetastic_color_highlight" => "8baa2b"));
	
	
	update_option('themetastic_theme_background_options',array("themetastic_img_bgdefault" => $template_url_first."/img/tiles/retina_wood.png", "themetastic_img_bgtype" => "tiled"));
	
	
	update_option('themetastic_theme_search_options',array("themetastic_searchresultsnumber" => "10", "themetastic_404page" => "2413"));
	
	
	update_option('themetastic_theme_sidebars_options',array("themetastic_sidebar_builder_name-0" => "Sidebar1", "themetastic_sidebar_builder_slug-0" => "portfolio_515d4bc71e48c", "themetastic_sidebar_builder_name-2" => "Sidebar2", "themetastic_sidebar_builder_slug-2" => "sidebar_1366028838", "themetastic_sidebar_builder_name-3" => "Homebar", "themetastic_sidebar_builder_slug-3" => "sidebar_1366192641"));
	
	
	update_option('themetastic_theme_portfolios_options',array("themetastic_portfolio_builder_name-0" => "Our Portfolio", "themetastic_portfolio_builder_slug-0" => "portfolio"));
	
	
	update_option('themetastic_theme_portfoliodef_options',array("themetastic_portfoliolock" => "225", "themetastic_portfolioarchivesidebar" => "Sidebar Right", "themetastic_portfolioarchivenumber" => "6", "themetastic_portfoliopostlayout" => "Large Media", "themetastic_portfoliorelated" => "1", "themetastic_portfoliopostinfo_author" => "1", "themetastic_portfoliopostinfo_category" => "1"));
	
	
	update_option('themetastic_theme_blog_options',array("themetastic_blogoverviewpostlayout" => "Large Media", "themetastic_blogoverviewsingledate" => "1", "themetastic_blogoverviewpostinfo_author" => "1", "themetastic_blogoverviewpostinfo_category" => "1", "themetastic_blogoverviewpostinfo_comments" => "1", "themetastic_blogoverviewpostinfo_tags" => "1", "themetastic_blogpostlayout" => "Large Media", "themetastic_blogrelated" => "1", "themetastic_blogpostinfo_date" => "1", "themetastic_blogpostinfo_author" => "1", "themetastic_blogpostinfo_category" => "1", "themetastic_blogpostinfo_comments" => "1", "themetastic_blogpostinfo_tags" => "1", "themetastic_blogarchivesidebar" => "Sidebar Right", "themetastic_blogarchivesidebar_select" => "Blog Sidebar"));
	
	
}



?>