<?php
/* ------------------------------------- */
/* BLOG POST COMMENTS */
/* ------------------------------------- */

function themetastic_comment( $comment, $args, $depth ) {

	/* LANGUAGE */
	$commentmoderation = __( 'Your Comment Is Awaiting Moderation.', 'themetastic' );
	$replytext = __( 'Reply', 'themetastic' );

	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
    <!-- Reply Start -->
	<li <?php comment_class("comment"); ?> id="comment-<?php comment_ID(); ?>">

		<div class="commentwrap">
        	<div class="posterpic"><?php echo get_avatar( $comment, 50 ); ?></div>
            <div class="author"><h5><?php comment_author_link(); ?></h5></div>
            <div class="timestamp"><?php printf( __( '%1$s', 'themetastic' ), get_comment_date() ); ?><?php edit_comment_link( __( '(Edit)', 'themetastic' ), ' ' ); ?></div><div class="clear"></div>
            <div class="replylink"><?php echo comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div><div class="clear"></div>
            <div class="postertext"><?php if ( $comment->comment_approved == '0' ) : ?><p><?php _e( 'Your Comment Is Awaiting Moderation.', 'themetastic' ); ?></p><?php endif; ?><?php comment_text(); ?></div><div class="clear"></div>
        </div>
   <!-- Reply End -->
	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'themetastic' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'themetastic'), ' ' ); ?></p></li>
	<?php
			break;
	endswitch;
}
?>