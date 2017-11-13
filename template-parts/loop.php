<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package travelblog
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('loop'); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="loop__thumbnail">
			<?php the_post_thumbnail() ?>
		</div>
	<?php endif ?>
	<div class="loop__container">
		<header class="loop__header">
			<h2 class="entry-title loop__title">
				<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"> <?php the_title() ?> </a>
			</h2>
		</header><!-- .loop__header -->

		<div class="loop__meta">
			<span class="loop__author">
				<?php echo sprintf( __( 'Publié par <a href="%2$s">%1$s</a>', 'travelblog' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ) ?>
			</span>

			<span class="loop__publish">
				<?php echo sprintf( __( 'Le %s', 'travelblog' ), get_the_date() ) ?>
			</span>
			<?php if ( get_the_category_list() ) : ?>
				<span class="loop__category">
					/ <?php echo get_the_category_list( ' / ' ) ?>
				</span>
			<?php endif ?>
		</div>

		<div class="loop__content">
			<?php
				the_excerpt();
			?>

		</div><!-- .loop__content -->
		<footer class="loop__footer">
			<div class="loop__read-more">
				<a href="<?php the_permalink() ?>" class="button"><?php _e( 'Read more', 'travelblog' ) ?></a>
			</div>
			<div class="loop__comments-number">
				<?php comments_number( 'no comments', 'one comment', '% comments' ); ?>
			</div>
		</footer>
	</div><!-- .loop__container -->
</article><!-- .loop -->
