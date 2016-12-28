<?php

if ( ! function_exists( 'setup' ) ) :
function setup() {

	/** Enable support for Post Thumbnails on posts and pages **/
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	/** This theme uses wp_nav_menu() in two locations **/
	register_nav_menus( array(
		'primary' => __( 'Primary Menu' ),
		'secondary'  => __( 'Secondary Menu' ),
		'menu-top' => __( 'Menu Top' ),
	) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // setup
add_action( 'after_setup_theme', 'setup' );

/**
** Register a Front Page custom **/
function themeslug_filter_front_page( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'front_page', 'themeslug_filter_front_page' );


/**
** Fix relative links on navs for non-root domains **/
function rel_to_absolute($items){
  foreach($items as $item){
    if (strpos($item->url, '/%') === 0) {
      $item->url = get_bloginfo("url") . $item->url;
    }
  }
  return $items;
}
add_filter('wp_nav_menu_objects', 'rel_to_absolute');

/**
 * Registers a widget area.
 */
function widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Menu Bottom' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears menus at the bottom of the content on posts and pages.' ),
		'before_widget' => '<nav id="%1$s" class="column %2$s">',
		'after_widget'  => '</nav>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Copyright and Address Bottom' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears copyright and address at the bottom of the content on posts and pages.' ),
		'before_widget' => '<div id="%1$s" class="column %2$s">',
		'after_widget'  => '</div>',
	) );

}
add_action( 'widgets_init', 'widgets_init' );

/**
 * Hiding a widget title if needed to.
 */
function flexible_widget_titles( $widget_title ) {
// get rid of any leading and trailing spaces
$title = trim( $widget_title );
	// check the first and last character, if [ and ] set the title to empty
	if ( $title[0] == '[' && $title[strlen($title) - 1] == ']' ) $title = '';
	return $title;
}
add_filter( 'widget_title', 'flexible_widget_titles' );

/**
** Handles JavaScript detection.
** Adds a `js` class to the root `<html>` element when JavaScript is detected **/
function javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'javascript_detection', 0 );

/**
** Enqueues scripts and styles **/
function scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css', array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	// Load the html5 shiv.
	if(getenv('DEV_IP')) {
		// Add livereload for local access
		wp_enqueue_script('livereload', 'http://'.getenv('DEV_IP').':35731/livereload.js?snipver=1', null, false, true);
	}

	wp_enqueue_script( 'twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( '', get_template_directory_uri() . '/js/script.min.js', array( 'jquery' ), '', true );

}
add_action( 'wp_enqueue_scripts', 'scripts' );

/** ACF options **/
if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'menu_title'	=> 'How it works',
		'menu_slug' 	=> 'theme-general-settings',
		'icon_url'		=> 'dashicons-list-view',
		'position' => 58
	));

}

/**
 * Adds custom classes to the array of body classes.
 */
function body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'body_classes' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 */
function content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 */
function post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'post_thumbnail_sizes_attr', 10 , 3 );
