<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package travelblog
 */

get_header(); ?>

	<?php get_template_part( 'template-parts/intro', 'single' ) ?>

	<div id="content" class="site__content site__content--sidebar">
		<main id="main" class="site__main" role="main">

		<?php while ( have_posts() ) : the_post() ?>

			<?php get_template_part( 'template-parts/content', get_post_format() ) ?>

			<?php the_post_navigation() ?>

			<?php if ( comments_open() || get_comments_number() ) {
				comments_template();
			} ?>

		<?php endwhile ?>

		</main><!-- #main -->

		<?php get_sidebar(); ?>

	</div>

<?php get_footer();
