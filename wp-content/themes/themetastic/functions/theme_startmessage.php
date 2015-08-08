<?php function get_content_in_wp_pointer() {
	$pointer_content  = '<h3>Thanks for choosing <strong>Themetastic</strong>!</h3>';
	$pointer_content .= '<p>Please make sure to follow the instructions about how to <strong>configure the Theme</strong> in the Documentation Folder in the downloaded Zip file first!</p>';
?>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready( function($) {
	$('#wpadminbar').pointer({
		content: '<?php echo $pointer_content; ?>',
		position: {
			my: 'left top',
			at: 'center bottom',
			offset: '-25 0'
		},
		close: function() {
			setUserSetting( 'p7', '1' );
		}
	}).pointer('open');
});
//]]>
</script>
<?php
}
function fb_enqueue_wp_pointer( $hook_suffix ) {
	$enqueue = FALSE;
	$admin_bar = get_user_setting( 'p7', 0 ); // check settings on user
	// check if admin bar is active and default filter for wp pointer is true
	if ( ! $admin_bar && apply_filters( 'show_wp_pointer_admin_bar', TRUE ) ) {
		$enqueue = TRUE;
		add_action( 'admin_print_footer_scripts', 'get_content_in_wp_pointer' );
	}
	// in true, include the scripts
	if ( $enqueue ) {
		wp_enqueue_style( 'wp-pointer' );
		wp_enqueue_script( 'wp-pointer' );
		wp_enqueue_script( 'utils' ); // for user settings
	}
}
add_action( 'admin_enqueue_scripts', 'fb_enqueue_wp_pointer' );



add_filter( 'attachment_fields_to_edit', 'xf_attachment_fields', 10, 2 );

function xf_attachment_fields( $fields, $post ) {

 $meta = get_post_meta($post->ID, 'meta_link', true);
 $fields['meta_link'] = array(
    'label' => 'More Media Management',
    'input' => 'text',
    'value' => $meta,
     // 'html' => '<div class="meta_link"><input type="text" /></div>',
   'show_in_edit' => true,
 );
 return $fields;
}
add_filter( 'attachment_fields_to_save', 'xa_update_attachment_meta', 4);

function xa_update_attachment_meta($attachment){
  global $post;
  update_post_meta($post->ID, 'meta_link', $attachment['attachments'][$post->ID]['meta_link']);
}

add_action('wp_ajax_save-attachment-compat', 'xa_media_xtra_fields', 0, 1);
function xa_media_xtra_fields() {
  $post_id = $_POST['id'];
  $meta = $_POST['attachments'][$post_id ]['meta_link'];
  update_post_meta($post_id , 'meta_link', $meta);
  clean_post_cache($post_id);
}
?>