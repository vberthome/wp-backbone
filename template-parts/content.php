<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package travelblog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="post__thumbnail">
			<?php the_post_thumbnail() ?>
		</div>
	<?php endif ?>

	<div class="post__content">
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'travelblog' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages :', 'travelblog' ),
				'after'  => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>',
			) );
		?>
	</div><!-- .post__content -->
</article><!-- .post -->
