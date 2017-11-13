<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package travelblog
 */

get_header(); ?>

	<?php get_template_part( 'template-parts/intro' ) ?>

	<div id="content" class="site__content site__content--sidebar">
		<main id="main" class="site__main" role="main">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post() ?>

					<?php get_template_part( 'template-parts/loop', get_post_format() ) ?>

				<?php endwhile ?>

				<?php the_posts_navigation() ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div>

<?php get_footer();
