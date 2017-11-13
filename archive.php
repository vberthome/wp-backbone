<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package travelblog
 */

get_header(); ?>

	<?php get_template_part( 'template-parts/intro', 'archive' ) ?>

	<div id="content" class="site__content site__content--sidebar">
		<main id="main" class="site__main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post() ?>

					<?php get_template_part( 'template-parts/loop', get_post_format() ) ?>

				<?php endwhile ?>

				<?php the_posts_navigation() ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ) ?>

			<?php endif; ?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div>

<?php get_footer();
