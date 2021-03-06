<?php
/**
 * pwmap functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pwmap
 */
if ( ! function_exists( 'pwmap_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function pwmap_setup() {
    
    // turn off admin bar when logged in and on front-end
    add_filter('show_admin_bar', '__return_false');
    
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on pwmap, use a find and replace
	 * to change 'pwmap' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'pwmap', get_template_directory() . '/languages' );

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
	add_theme_support( 'post-thumbnails', array('post','climate','hazards') );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'pwmap' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'pwmap_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_image_size( 'archive', 600, 322 );
}
endif;
add_action( 'after_setup_theme', 'pwmap_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pwmap_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'pwmap_content_width', 640 );
}
add_action( 'after_setup_theme', 'pwmap_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pwmap_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pwmap' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pwmap' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pwmap_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pwmap_scripts() {
	wp_enqueue_style( 'pwmap-style', get_stylesheet_uri() );

	wp_enqueue_script( 'pwmap-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'pwmap-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pwmap_scripts' );

/**
 * Register taxonomies.
 */
function register_taxonomies()
{
	locate_template( array( 'taxonomies.php' ), true, true );
}
add_action( 'after_setup_theme', 'register_taxonomies');

/**
 * Register custom post types.
 */
function register_pwm_custom_post_types()
{
	locate_template( array( 'custom-post-types.php' ), true, true );
}
add_action( 'after_setup_theme', 'register_pwm_custom_post_types');

/* Flush rewrite rules for custom post types. */
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

function set_default_meta($post_ID){
    $current_field_value = get_post_meta($post_ID,'Event Date',true);
    $default_meta = '12251999'; // value
    if ($current_field_value == '' && !wp_is_post_revision($post_ID)){
            add_post_meta($post_ID,'Event Date',$default_meta,true);
    }
    return $post_ID;
}
add_action('wp_insert_post','set_default_meta');

/**
 * Enqueue Scripts -- The version number should be changed to correspond to the date the script was last edited.
 */
function pwm_scripts() {
	wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js');
    wp_enqueue_script( 'chosen', get_template_directory_uri() . '/js/lib/chosen.jquery.min.js', array('jquery'), '20170710');
    wp_enqueue_script( 'show-menu', get_template_directory_uri() . '/js/show-menu.js', array('jquery'), '20170723' );
}
add_action( 'wp_enqueue_scripts', 'pwm_scripts' );

/* 
 * Register county terms for county taxonomies
 */
// function register_counties()
// {
// 	locate_template( array( 'counties.php' ), true, true );
// }
// add_action( 'after_setup_theme', 'register_counties');

/* 
 * Register region terms for region taxonomies
 */
// function register_regions()
// {
// 	locate_template( array( 'regions.php' ), true, true );
// }
// add_action( 'after_setup_theme', 'register_regions');

/* 
 * Register hazard terms for hazard taxonomies
 */
// function register_hazards()
// {
// 	locate_template( array( 'hazards.php' ), true, true );
// }
// add_action( 'after_setup_theme', 'register_hazards');


/**
 * Change excerpt length
 */
function custom_excerpt_length( $length ) 
{
return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) 
{
//return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">read more</a>';
	return '...';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


