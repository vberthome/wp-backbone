<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );
/**
 * Helper functions used all over the theme
 */
function wp_backbone_svg_icon( $name, $opts = array() ) {
	$href = get_template_directory_uri() . '/assets/sprite/sprite.svg#' . $name;

	$role = empty( $opts['role'] ) ? 'presentation' : $opts['role'];

	$class = empty( $opts['class'] ) ? 'icon icon--' . $name : 'icon ' . $opts['class'];

	$label = ' aria-label="' . ( empty( $opts['label'] ) ? $name : $opts['label'] ) . '"';

	$label = $role === 'presentation' ? '' : $label;

	return sprintf( '<svg role="%s" class="%s"%s><use xlink:href="%s"/></svg>', $role, $class, $label, $href );
}