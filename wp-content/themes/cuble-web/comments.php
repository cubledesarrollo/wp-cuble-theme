<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentytwelve_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>
<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h4><?php _e('Últimos comentarios', 'cuble')?>:</h4>

		<ol class="commentlist">
			<?php wp_list_comments( array( 'callback' => 'cuble_comment', 'style' => 'ol' ) ); ?>
		</ol><!-- .commentlist -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation" role="navigation">
			<h1 class="assistive-text section-heading"><?php _e( 'Comment navigation', 'twentytwelve' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentytwelve' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentytwelve' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a note.
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'twentytwelve' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
	
	<!-- coment form -->
    <?php if ( comments_open() ): ?>
	<button type="button" class="btn" data-toggle="collapse" data-target=".comment-form"><?php _e('Escribe un comentario', 'cuble'); ?></button>
	<div class="comment-form collapse in">
	<?php comment_form(array('title_reply' => __('Deja que tu voz sea escuchada <hr/>', 'cuble'),
	        'comment_field' => '<label for="user-comment">'.__('Tu comentario', 'cuble').':</label><textarea name="comment" class="span6" cols="30" rows="10"></textarea>' )); ?>
	</div>
	<?php endif; ?>
</div><!-- #comments .comments-area -->