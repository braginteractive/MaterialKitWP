<?php
/**
 * MVPWP functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MVPWP
 */

if ( ! function_exists( 'mvpwp_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mvpwp_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on MVPWP, use a find and replace
	 * to change 'mvpwp' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'mvpwp', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'mvpwp' ),
    'footer' => esc_html__( 'Footer', 'mvpwp' ),
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

  // Add logo upload in customizer WordPress 4.5+
  add_theme_support( 'custom-logo' );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'mvpwp_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'mvpwp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mvpwp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mvpwp_content_width', 640 );
}
add_action( 'after_setup_theme', 'mvpwp_content_width', 0 );



if ( !function_exists( 'mvpwp_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function mvpwp_the_custom_logo() {
    // Try to retrieve the Custom Logo
    $output = '';
    if (function_exists('get_custom_logo'))
        $output = get_custom_logo();

    // Nothing in the output: Custom Logo is not supported, or there is no selected logo
    // In both cases we display the site's name
    if (empty($output))
        $output = '<a class="navbar-brand" href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';

    echo $output;
}
endif;

/**
 * Read more link
 */
function modify_read_more_link() {
  return '<div class="more-link">
            <a class="btn btn-default" href="' . get_permalink() . '">Read More</a>
          </div>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

/**
 * Editing the Tag Widget
 */
function my_widget_tag_cloud_args( $args ) {
  $args['largest'] = 11;
  $args['smallest'] = 11;
  $args['unit'] = 'px';
  return $args;
}
add_filter( 'widget_tag_cloud_args', 'my_widget_tag_cloud_args' );



/**
 * Add scripts
 */
require get_template_directory() . '/inc/scripts.php';

/**
 * Add widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Bootstrap Walker Menu
 */
require get_template_directory() . '/inc/bootstrap-walker.php';

/**
 * Comments
 */
require get_template_directory() . '/inc/comments-callback.php';

/**
 * Include Kirki
 */
require get_template_directory() . '/inc/include-kirki.php';
require get_template_directory() . '/inc/mvpwp-kirki.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Widget - Post Thumnail
 */
require get_template_directory() . '/inc/widget-post-thumbnails.php';
