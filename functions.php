<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package trends-theme
 */

 if ( ! function_exists( 'theme_setup' ) ) :
 /**
  * Sets up theme defaults and registers support for various WordPress features.
  *
  * Note that this function is hooked into the after_setup_theme hook, which
  * runs before the init hook. The init hook is too late for some features, such
  * as indicating support for post thumbnails.
  */
 function theme_setup() {
 	/*
 	 * Make theme available for translation.
 	 * Translations can be filed in the /languages/ directory.
 	 * If you're building a theme based on RRE Theme, use a find and replace
 	 * to change 'rre-theme' to the name of your theme in all the template files.
 	 */
 	load_theme_textdomain( 'trends-theme', get_template_directory() . '/languages' );

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

  // Enable custom menus
  // =======================
  add_theme_support( 'menus' );

 	// This theme uses wp_nav_menu() in one location.
 	register_nav_menus( array(
 		'macro-trends-menu' => esc_html__( 'Macro Trends', 'trends-theme' ),
 		'sector-reports-menu' => esc_html__( 'Sector Reports', 'trends-theme' )
 	) );

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

 	// Add theme support for selective refresh for widgets.
 	add_theme_support( 'customize-selective-refresh-widgets' );
 }
 endif;
 add_action( 'after_setup_theme', 'theme_setup' );

 // Adds CSS
 // ============
 function theme_styles() {
   wp_enqueue_style( 'fontCSS', 'https://cloud.typography.com/6164354/660168/css/fonts.css' );
   wp_enqueue_style( 'mainCSS', get_template_directory_uri() . '/css/style.css' );
 }
 add_action( 'wp_enqueue_scripts', 'theme_styles');

 // Adds JS
 // ==========
 function theme_js() {

   wp_enqueue_script( 'scrollRevealJS', 'https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js', array('jquery'), '', true);
   wp_enqueue_script( 'bundleJS', get_template_directory_uri() . '/js/bundle.min.js', array('jquery'), '', true);
   wp_enqueue_script( 'addThisJS', 'https:////s7.addthis.com/js/300/addthis_widget.js#pubid=sustainabilityadmin', array('jquery'), '', true);
   wp_enqueue_script( 'jquery-lib', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', array('jquery'), '', true);
   wp_enqueue_script( 'scrolling-js', get_template_directory_uri() . '/js/scrolling-js.js', array('jquery'), '', true);
 }
 add_action( 'wp_enqueue_scripts', 'theme_js');

// Implement Additional files
//==========
//
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
* Load Custom Posts file
*/
require get_template_directory() . '/inc/custom-posts.php';

/**
* Load Custom Taxonomies file
*/
require get_template_directory() . '/inc/custom-taxonomies.php';
