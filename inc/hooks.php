<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_backbone_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_backbone_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_backbone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function wp_backbone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'wp_backbone' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'wp_backbone' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget__title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer column 1', 'wp_backbone' ),
		'id'            => 'footer-column-1',
		'description'   => esc_html__( 'Sidebar displayed on footer.', 'wp_backbone' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer column 2', 'wp_backbone' ),
		'id'            => 'footer-column-2',
		'description'   => esc_html__( 'Sidebar displayed on footer.', 'wp_backbone' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget__title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer column 3', 'wp_backbone' ),
		'id'            => 'footer-column-3',
		'description'   => esc_html__( 'Sidebar displayed on footer.', 'wp_backbone' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget__title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'wp_backbone_widgets_init' );

/**
 * Modifie le template de navigation.
 *
 * @param  string $template
 * @param  string $class
 * @return string
 */
function wp_backbone_navigation_markup_template( $template, $class )
{
	$template = '
	<nav class="nav %1$s" role="navigation">
		<h2 class="h-sr-only">%2$s</h2>
		<div class="nav__links">%3$s</div>
	</nav>';
	return $template;
}
add_filter( 'navigation_markup_template', 'wp_backbone_navigation_markup_template', 10, 2 );

/**
 * La taille des figures avec légende ne doit pas être défini.
 *
 * @param  int $width
 * @return int
 */
function wp_backbone_caption_width($width)
{
	return 0;
}
add_filter( 'img_caption_shortcode_width', 'wp_backbone_caption_width' );

/**
 * Ajout d'un lien d'affichage du sous menu pour les menus avec enfants.
 *
 * @param  object $args
 * @param  object $item
 * @return object
 */
function wp_backbone_menu_item_with_children( $args, $item )
{
	if ( in_array( 'menu-item-has-children', $item->classes ) ) {
		$args->after = '<span class="menu-display-sub-menu js-display-sub-menu">' . wp_backbone_svg_icon( 'plus' ) . '</span>';
	} else {
		$args->after = '';
	}

	return $args;
}
add_filter( 'nav_menu_item_args', 'wp_backbone_menu_item_with_children', 10, 2 );