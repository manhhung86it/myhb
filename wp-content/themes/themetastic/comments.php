<?php
/**
 * @package WordPress
 * @subpackage themetastic_Theme
 */
?>

<?php
	$namelabel = __( 'Name *', 'themetastic' );
	$emaillabel = __( 'Email *', 'themetastic' );
	$websitelabel = __( 'Website', 'themetastic' );
	$messagelabel = __( 'Message *', 'themetastic' );
	$addreply = __( 'Submit Comment', 'themetastic' );
	$loggedinas = __( 'You are logged in as', 'themetastic' ); 
	$clickhereto = __( 'Click here to', 'themetastic' );
	$logout = __( 'Log out', 'themetastic' );
?>


<?php if ( post_password_required() ) : ?>
	<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'themetastic' ); ?></p>
<?php return; endif; ?>

<?php if ( have_comments() ) { ?>
	<?php $respondstyle = ''; ?>
	
	<div id="comments">
		<div class="wpb_separator wpb_content_element"></div>
		<div class="contenttitle"><div class="titletext"><h2><?php _e( 'Comments', 'themetastic' ); ?></h2></div></div>
        <ul><?php wp_list_comments( array( 'callback' => 'themetastic_comment' ) ); ?></ul>
	</div><div class="clear"></div>
<?php } ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :  ?>
	<div>
		<div class="left marginbottom10"><?php previous_comments_link( __( 'Older Comments ', 'themetastic' ) ); ?></div>
		<div class="right marginbottom10"><?php next_comments_link( __( 'Newer Comments', 'themetastic' ) ); ?> </div>
	</div>
<?php endif;  ?>

<?php if ( comments_open() ) : ?>
	<div class="clear"></div>
	<!-- Comment Form -->   
      <?php  
$comments_args = array(
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<input type="text" name="author" id="author" class="requiredfield" onFocus="if(this.value == \''.$namelabel.'\') { this.value = \'\'; }" onBlur="if(this.value == \'\') { this.value = \''.$namelabel.'\'; }" value=\''.$namelabel.'\'/>',
			'email'  => '<input type="text" name="email" id="email" class="requiredfield" onFocus="if(this.value == \''.$emaillabel.'\') { this.value = \'\'; }" onBlur="if(this.value == \'\') { this.value = \''.$emaillabel.'\'; }" value=\''.$emaillabel.'\'/>',
			'url'    => '<input type="text" name="url" id="url" class="last" onFocus="if(this.value == \''.$websitelabel.'\') { this.value = \'\'; }" onBlur="if(this.value == \'\') { this.value = \''.$websitelabel.'\'; }" value=\''.$websitelabel.'\'/>')),

        'title_reply'=>'<div class="wpb_separator wpb_content_element"></div><div class="contenttitle"><div class="titletext"><h2>Leave a Reply</h2></div></div>',
		'title_reply_to'=>'<div class="contenttitle"><div class="titletext"><h2>Leave a Reply to %s</h2></div></div>',
        'comment_notes_after' => '',
        'comment_field' => '<textarea name="comment" id="comment" class="requiredfield" onFocus="if(this.value == \''.$messagelabel.'\') { this.value = \'\'; }" onBlur="if(this.value == \'\') { this.value = \''.$messagelabel.'\'; }">'.$messagelabel.'</textarea>',
		'label_submit' => __( 'Submit Comment','themetastic' ),
		'cancel_reply_link' => __( '<div class="btn btn-danger btn-small">Cancel Reply</div>' )
);
comment_form($comments_args); 
	?>
<?php endif; ?>