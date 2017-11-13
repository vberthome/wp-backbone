<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package travelblog
 */

?>

	<footer id="colophon" class="site__footer" role="contentinfo">
		<div class="l-container">
			<div class="l-row">
				<?php for ( $sidebar = 1 ; $sidebar <= 3 ; $sidebar++ ) : ?>
					<?php if ( is_active_sidebar( 'footer-column-' . $sidebar ) ) : ?>
						<div class="l-column">
							<?php dynamic_sidebar( 'footer-column-' . $sidebar ) ?>
						</div>
					<?php endif ?>
				<?php endfor ?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
