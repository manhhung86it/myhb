<?php
define('themetastic_FUNCTIONS', get_template_directory() . '/functions/');
define('themetastic_THEME', get_template_directory_uri());
define('themetastic_JAVASCRIPT', get_template_directory_uri() . '/js');
define('themetastic_CSS', get_template_directory_uri() . '/css');
define('themetastic_TYPE', get_template_directory_uri() . '/type');

/* Admin Functionality */
if (is_admin()){
	require_once(themetastic_FUNCTIONS . '/page_options/theme_page_options.php');
	require_once(themetastic_FUNCTIONS . '/theme_options/theme_settings.php');
	if(function_exists("wpb_map"))
		require_once(themetastic_FUNCTIONS . '/theme_builder.php');
	require_once(themetastic_FUNCTIONS . '/thundercodes/thundercodes.php');
	require_once(themetastic_FUNCTIONS . '/thundercodes/thundercolumns.php');
	require_once(themetastic_FUNCTIONS . '/thundercodes/thundericons.php');
	if(get_option('themetastic_first_import')!="on"){
		require_once(themetastic_FUNCTIONS . '/theme_activate.php');
	}
	require_once themetastic_FUNCTIONS . '/theme_plugins.php';
	require_once(themetastic_FUNCTIONS . '/theme_startmessage.php');
}

/* Theme Functionality */
require_once(themetastic_FUNCTIONS . '/theme_support.php');
require_once(themetastic_FUNCTIONS . '/theme_functions.php');
require_once(themetastic_FUNCTIONS . '/theme_pagination.php');
require_once(themetastic_FUNCTIONS . '/theme_javascriptcss.php');
require_once(themetastic_FUNCTIONS . '/theme_widgets.php');
require_once(themetastic_FUNCTIONS . '/theme_sidebars.php');
require_once(themetastic_FUNCTIONS . '/theme_post_comments.php');
require_once(themetastic_FUNCTIONS . '/theme_post_customtypes.php');
require_once(themetastic_FUNCTIONS . '/theme_breadcrumbs.php');

if(!is_admin()){
	require_once(themetastic_FUNCTIONS . '/theme_shortcodes.php');
	require_once(themetastic_FUNCTIONS . '/theme_shortcodes_bs.php');
}

/* Theme Language */
require_once(themetastic_FUNCTIONS . '/theme_language.php');


function load_media_box(){
 if(function_exists(wp_enqueue_media())) wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'load_media_box');

/*update_option('wpb_js_templates',unserialize('a:1:{s:15:"test_1547537857";a:2:{s:4:"name";s:4:"test";s:8:"template";s:1096:"[vc_row el_position=\"first\"] [vc_column width=\"1/2\"] [vc_column_text el_position=\"first\"] <p>I am text block. Click edit button to change this text.</p>
 [/vc_column_text] [bartag foo=\"Default params value\" el_position=\"last\"] [/vc_column] [vc_column width=\"1/2\"] [vc_tabs interval=\"0\" el_position=\"first last\"] [vc_tab title=\"Tab 1\" tab_id=\"1365510572-1-67\"] [vc_column_text el_position=\"first last\"] <p>I am text block. Click edit button to change this text.</p>
 [/vc_column_text] [/vc_tab] [vc_tab title=\"Tab 2\" tab_id=\"1365510572-2-64\"] [vc_twitter title=\"Twitta\" twitter_name=\"themepunch\" tweets_count=\"2\" el_position=\"first last\"] [/vc_tab] [/vc_tabs] [/vc_column] [/vc_row] [vc_row] [vc_column] [vc_button title=\"Text on the button\" color=\"wpb_button\" size=\"wpb_regularsize\" target=\"_self\" el_position=\"first last\"] [/vc_column] [/vc_row] [vc_row el_position=\"last\"] [vc_column] [vc_message color=\"alert-info\" el_position=\"first last\"] <p>I am message box. Click edit button to change this text.</p>
 [/vc_message] [/vc_column] [/vc_row] ";}}'));*/
 



 
 
?>