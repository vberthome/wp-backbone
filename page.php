<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package travelblog
 */

get_header(); ?>

	<?php get_template_part( 'template-parts/intro', 'single' ) ?>

	<div id="content" class="site__content">
		<main id="main" class="site__main" role="main">

			<?php while ( have_posts() ) : the_post() ?>

				<?php get_template_part( 'template-parts/content', 'page' ) ?>

				<div class="l-container l-inner-space">
					<?php if ( comments_open() || get_comments_number() ) {
						comments_template();
					} ?>
				</div>

			<?php endwhile ?>

		</main><!-- #main -->
	</div>

<?php get_footer();
