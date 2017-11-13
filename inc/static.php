<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );
/**
 * Enqueue all theme scripts and styles
 */

wp_enqueue_style( 'wp_backbone-font', 'https://fonts.googleapis.com/css?family=PT+Serif|Open+Sans' );
wp_enqueue_style( 'wp_backbone-style', get_stylesheet_uri() );

if ( get_header_image() ) {
	wp_add_inline_style( 'wp_backbone-style', '.intro { background-image: url(' . get_header_image() . ') }' );
}

if ( get_header_textcolor() ) {
	wp_add_inline_style( 'wp_backbone-style', '.intro { color: #' . get_header_textcolor() . ' }' );
}

wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-custom.js' );
wp_enqueue_script( 'wp_backbone-script', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), false, true );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}
