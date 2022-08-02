<?php

/** 
 * THEME SETUP 
 * 
 * Setup the SMart Portal theme
 *
 */ 

require_once('utilities.php'); // Load shared utilities
require_once('shortcodes.php'); // Load shared utilities
require_once('filters.php'); // Load shared utilities
require_once('theme-options.php'); // Load shared utilities
require_once('admin-setup.php'); // Wordpress admin setup

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if(!isset($content_width)) $content_width = 584;

/**
 * Call Master setup from framework for core setup
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 */
add_action('after_setup_theme', 'smartportal_setup');
if (!function_exists('smartportal_setup')){
  function smartportal_setup() {
  
  	/* Make Smart Master available for translation.
  	 * Translations can be added to the /languages/ directory.
  	 * If you're building a theme based on Smart Master, use a find and replace
  	 * to change 'smartportal_get_the_intro' to the name of your theme in all the template files.
  	 */
  	 
  	load_theme_textdomain('smartportal', get_template_directory() . '/languages');
  
  	$locale = get_locale();
  	$locale_file = get_template_directory() . "/languages/$locale.php";
  	if ( is_readable( $locale_file ) )
  		require_once( $locale_file );
  
    // This theme styles the visual editor with editor-style.css to match the theme style.
    add_editor_style("ui/css/editor-styles.css");

  	// Add default posts and comments RSS feed links to <head>.
  	add_theme_support( 'automatic-feed-links' );
  
  	// Add support for a variety of post formats
  	// add_theme_support( 'post-formats', array( 'aside', 'link', 'gallery', 'status', 'quote', 'image' ) );
  
  	// This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
  	add_theme_support( 'post-thumbnails' );
  	
  	// Add excerpt to pages
  	add_post_type_support('page', 'excerpt');
  
  	// We'll be using post thumbnails for custom header images on posts and pages.
  	// We want them to be the size of the header image that we just defined
  	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
    // set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions
  	set_post_thumbnail_size(400, 250, true );
  
  	// Add Smart Master's custom image sizes
  	add_image_size( 'large-feature', 400, 300, true ); // Used for large feature (header) images
  	add_image_size( 'small-feature', 500, 300 ); // Used for featured posts if a large-feature doesn't exist
  	add_image_size( 'services', 290 ); // Used for services
  	add_image_size( 'post-image', 930, 400, true ); //(cropped)
  	add_image_size( 'focus', 416, 271, true );

    // Register default navigations
    register_nav_menu('smartbar-links', __('SMartbar links', 'smartportal')); // SMartbar links
    register_nav_menu('smartbar-right', __('SMartbar right', 'smartportal')); // SMartbar right links
    register_nav_menu('primary', __('Primary Nav', 'smartportal')); // Main nav
    register_nav_menu('secondary-nav', __('Secondary nav', 'smartportal')); // Secondary nav
    register_nav_menu('footer', __('Footer', 'smartportal')); // Footer left menu
    register_nav_menu('featured-services', __('Featured services (for homepage)', 'smartportal')); // Featured services
    // register_nav_menu('services', __('Services', 'smartportal')); // Services
  }
}// smartportal_setup


// add permissions to editors

$role = get_role('editor'); 
$role->add_cap('edit_theme_options');

function custom_admin_menu() {

    $user = new WP_User(get_current_user_id());     
    if (!empty( $user->roles) && is_array($user->roles)) {
        foreach ($user->roles as $role)
            $role = $role;
    }

    if($role == "editor") { 
       remove_submenu_page( 'themes.php', 'themes.php' );
    }       
}

add_action('admin_menu', 'custom_admin_menu');


/**
 * Register our sidebars and widgetized areas.
 *
 */
function smartportal_widgets_init() {
  
  register_sidebar(array(
    'name'=> __('Home Intro', 'smartportal'),
    'id' => 'front-page-row-intro-widgets',
    'description' => __('Widget area displayed at the right of the intro on the homepage', 'smartportal'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
  
  register_sidebar(array(
    'name' => __('Home News', 'smartportal'),
    'id' => 'front-page-row-news-widgets',
    'description' => __('Widget area displayed at the right of the blog posts on the home page', 'smartportal'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    //'after_widget' => '</section><hr class="page-divider">',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
  
  register_sidebar(array(
    'name' => __('Home Widgets Row 1', 'smartportal'),
    'id' => 'front-page-row-widgets-1',
    'description' => __('Widget area displayed on a row on the home page', 'smartportal'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
  
  register_sidebar(array(
    'name' => __('Home Widgets Row 2', 'smartportal'),
    'id' => 'front-page-row-widgets-2',
    'description' => __('Widget area displayed on a row on the home page', 'smartportal'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
  
  register_sidebar(array(
    'name' => __('Home Widgets Row 3', 'smartportal'),
    'id' => 'front-page-row-widgets-3',
    'description' => __('Widget area displayed on a row on the home page', 'smartportal'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));
  
  register_sidebar(array(
    'name' => __('Blog Sidebar', 'smartportal'),
    'id' => 'blog-sidebar',
    'description' => __('Widget area displayed on the side of the posts listing page', 'smartportal'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section><hr class="page-divider">',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
  ));
  
  register_sidebar(array(
    'name' => __('Blog Entry Sidebar', 'smartportal'),
    'id' => 'blog-entry-sidebar',
    'description' => __('Widget area displayed on the side of a post article', 'smartportal'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section><hr class="page-divider">',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
  ));
  
  /*
  register_sidebar(array(
    'name' => __('Services Sales Arguments', 'smartportal'),
    'id' => 'services-sales-arguments',
    'description' => __('Widget area displayed at the top of the Services page', 'smartportal'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<header><h1 class="widget-title">',
    'after_title' => '</h1></header>'
  ));
  
  register_sidebar(array(
    'name' => __('Services How It Works', 'smartportal'),
    'id' => 'services-how-it-works',
    'description' => __('Widget area displayed below the intro block on the Services page', 'smartportal'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<header><h1 class="widget-title">',
    'after_title' => '</h1></header>'
  ));
  */
  
  register_sidebar(array(
    'name' => __('Footer Widgets', 'smartportal'),
    'id' => 'bottom-page-widget',
    'description' => __('Widget area displayed at the bottom of every pages of the site', 'smartportal'),
    'before_widget' => '<div class="container">',
    'after_widget' => '</div>',
    'before_title' => '<h2>',
    'after_title' => '</h2>'
  ));
  
  register_sidebar(array(
    'name' => __('Basic Contact Page Widgets', 'smartportal'),
    'id' => 'contact-widgets',
    'description' => __('Widget area displayed next to the contact form on the basic contact page', 'smartportal'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section><hr class="page-divider">',
    'before_title' => '<header><h1 class="widget-title">',
    'after_title' => '</h1></header>'
  ));
}
add_action( 'widgets_init', 'smartportal_widgets_init' );





/**
 * Wrap video embeds in a div
 *
 */

add_filter('embed_oembed_html', 'my_embed_oembed_html', 99, 4);
function my_embed_oembed_html($html, $url, $attr, $post_id) {
  return '<div class="video-container">' . $html . '</div>';
}

