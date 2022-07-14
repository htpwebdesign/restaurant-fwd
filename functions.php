<?php
/**
 * Restaurant FWD functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Restaurant_FWD
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function restaurant_fwd_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Restaurant FWD, use a find and replace
		* to change 'restaurant-fwd' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'restaurant-fwd', get_template_directory() . '/languages' );

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
	add_image_size( 'banner-image', 1600, 500, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'restaurant-fwd' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'restaurant-fwd' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'restaurant_fwd_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'restaurant_fwd_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function restaurant_fwd_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'restaurant_fwd_content_width', 640 );
}
add_action( 'after_setup_theme', 'restaurant_fwd_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function restaurant_fwd_scripts() {
	wp_enqueue_style( 'restaurant-fwd-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'restaurant-fwd-style', 'rtl', 'replace' );

	wp_enqueue_script( 'restaurant-fwd-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	wp_enqueue_style( 'magnific', get_template_directory_uri() . '/css/magnific.css');

	wp_enqueue_script( 'magnific', get_template_directory_uri() . '/js/magnific.js', array('jquery'), 1, true);

	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), 1, true);



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script('isotope', get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery','imagesloaded'), '3.0.6', true);
	wp_enqueue_script('isotope-settings', get_template_directory_uri() . '/js/isotope.js', array('isotope', 'jquery'));
	
	wp_enqueue_script('isotope_init', get_stylesheet_directory_uri() . '/js/isotope-init.js', array('isotope'), '3.0.6', true);	

	//Enqueue the Google Maps script from the Google Server
	wp_enqueue_script( 'google-map',
	'https://maps.googleapis.com/maps/api/js?key=AIzaSyC6hYP8e-Zu4Z-CrfsN-xFjJnkxZItqSPo',
	array(),
	_S_VERSION,
	true );

	// Enqueue ACF helper code to display the Google Map
	wp_enqueue_script( 'google-map-init', get_template_directory_uri() .
	'/js/google-map-script.js', array( 'google-map', 'jquery' ), _S_VERSION,
	true );

}
add_action( 'wp_enqueue_scripts', 'restaurant_fwd_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//cpt taxonomies
require get_template_directory() . '/inc/cpt-taxonomy.php';



// Create Options Page

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

function isotope_food_category($id) {
	$classes = "";
	$terms = wp_get_post_terms( get_the_id(), 'res-food-category');
	foreach ($terms as $term) {
		$classes .= $term->slug. '';
	}
}

// Google Maps API Key

function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyC6hYP8e-Zu4Z-CrfsN-xFjJnkxZItqSPo';
	return $api;
	}
	add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function yoast_to_bottom(){
		return 'low';
	}
	add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom' );