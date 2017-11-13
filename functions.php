<?php
/**
 * wp_backbone functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_backbone
 */

if ( ! function_exists( 'wp_backbone_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_backbone_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wp_backbone, use a find and replace
	 * to change 'wp_backbone' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp_backbone', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 960, 400, true );

	/**
	 * Support des formats d'articles
	 */
	add_theme_support( 'post-formats', array( 'link', 'gallery', 'image', 'quote', 'status', 'video', 'audio' ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/**
	 * Image d'arrière plan pour l'introduction
	 */
	add_theme_support( 'custom-header', array(
		'width'                  => 1600,
		'height'                 => 200,
		'flex-height'            => true,
		'header-text'            => true,
	) );

}
endif;
add_action( 'after_setup_theme', 'wp_backbone_setup' );

include_once get_template_directory() .'/inc/init.php';
