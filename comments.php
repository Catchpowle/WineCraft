<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage PlateUp
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

	<h2 class="comments-title">
		<?php printf( _n( '%1$s comment', '%1$s comments', get_comments_number(), PLATEUP_TEXTDOMAIN ), number_format_i18n( get_comments_number() ) ); ?>
	</h2>

	<ol class="comment-list">
		<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size'=> 120,
				)
			);
		?>
	</ol><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', PLATEUP_TEXTDOMAIN ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( '<span class="glyphicon glyphicon-chevron-left"></span> ' . __( 'Older Comments', PLATEUP_TEXTDOMAIN ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments', PLATEUP_TEXTDOMAIN ) . ' <span class="glyphicon glyphicon-chevron-right"></span>' ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfourteen' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>

	<?php
		// Print the comment form without the allowed HTML tags text
		comment_form(
			array(
				'comment_notes_after' => '',
				'title_reply'       => __( 'Leave a Comment', PLATEUP_TEXTDOMAIN ),
				'title_reply_to'    => __( 'Reply to %s', PLATEUP_TEXTDOMAIN ),
			)
		);
	?>

</div><!-- #comments -->
