<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package travelblog
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) : ?>
		<h2 class="comments__title">
			<?php
				printf( // WPCS: XSS OK.
					esc_html( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'travelblog' ) ),
					number_format_i18n( get_comments_number() ),
					'<span>' . get_the_title() . '</span>'
				);
			?>
		</h2>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-above" class="comments__navigation" role="navigation">
			<h2 class="h-sr-only"><?php esc_html_e( 'Comment navigation', 'travelblog' ); ?></h2>
			<div class="nav">
				<div class="nav__links">
					<div class="nav__previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'travelblog' ) ); ?></div>
					<div class="nav__next"><?php next_comments_link( esc_html__( 'Newer Comments', 'travelblog' ) ); ?></div>
				</div>
			</div><!-- .nav -->
		</nav><!-- #comment-nav-above -->
		<?php endif; // Check for comment navigation. ?>

		<ol class="comments__list">
			<?php
				wp_list_comments( array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 80
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
		<nav id="comment-nav-below" class="comments__navigation" role="navigation">
			<div class="nav">
				<div class="nav__links">
					<div class="nav__previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'travelblog' ) ); ?></div>
					<div class="nav__next"><?php next_comments_link( esc_html__( 'Newer Comments', 'travelblog' ) ); ?></div>
				</div>
			</div><!-- .nav -->
		</nav><!-- #comment-nav-below -->
		<?php
		endif; // Check for comment navigation.

	endif; // Check for have_comments().


	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

		<p class="comments__empty"><?php esc_html_e( 'Comments are closed.', 'travelblog' ); ?></p>
	<?php
	endif;

	comment_form();
	?>

</div><!-- #comments -->
