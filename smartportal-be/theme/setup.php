<?php

/** 
 * THEME SETUP 
 * 
 * Setup the SMart Portal child theme
 *
 */ 
 
 
/*
 * Register theme styles
 */
function theme_styles()  
{ 
  wp_register_style('smartportal-be-styles', 
    get_stylesheet_directory_uri() . '/ui/css/theme.css', 
    array(), 
    getfiledate(get_stylesheet_directory() . '/ui/css/theme.css'), 
    'all' );
  wp_enqueue_style( 'smartportal-be-styles' );
}
add_action('wp_enqueue_scripts', 'theme_styles');


/*
 * Register theme javascripts
 */
function theme_scripts() {
	wp_enqueue_script(
		'smartportal-be-scripts',
		get_stylesheet_directory_uri() . '/ui/js/scripts.js',
		array('jquery'),
    getfiledate(get_stylesheet_directory() . '/ui/js/scripts.js'), 
		true
	);
}
add_action('wp_enqueue_scripts', 'theme_scripts');


/*
 * Theme setup
 */
add_action('after_setup_theme', 'smartportalbe_setup');
if (!function_exists('smartportalbe_setup')){
  function smartportalbe_setup() {
    
    // Register complementary navigations
    register_nav_menu('featured-services', __('Featured services', 'smartbe'));
    register_nav_menu('faq-topics', __('FAQ topics', 'smartbe'));
  }
}


/*
 * Excerpt
 */
function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  return $excerpt;
}


/*
 * Publications per page (no limitation)
 */
function publications_per_page($query){
  if($query->is_main_query() && (is_post_type_archive('publications-ep') || is_post_type_archive('publications-bet'))){
    $query->query_vars['posts_per_page'] = -1;
    return;
  }
}
add_action('pre_get_posts', 'publications_per_page', 1);


/*
 * Highlight text with § and /§ delimitation
 */
function replace_content($content){
  // content to replace
  $search = array('/§', '§');
  // replace with
   /*$replace = array('</span>', '<span style="display: inline-block; background-color: #ffeba3; border-radius: 4px;">');*/
 $replace = array('</span>', '<span style="display: inline-block; border-radius: 4px;background-color: #FFEBA3;">');

  $content = str_replace($search, $replace, $content);
  return $content;
}
add_filter('the_content', 'replace_content');


/*
 * Display a nav element of the children for the current page IN A SERVICE
 */
function smartportal_shortcode_subpages_nav_services( $atts, $content=null, $code=""){
  global $post;
  
  $output = '<ul class="nav nav-chevron">';

  $args = array(
    'parent' => $post->ID,
    'depth' => 1,
    'hierarchical' => 0,
    'sort_column' => 'menu_order',
    'echo' => 0,
    'title_li' => null,
    'post_type' => 'services'
  );
  $pages = get_pages($args);
  foreach($pages as $page){
    $title = $page->post_title;
    $link = get_permalink($page->ID);
    $output .= '<li><a href="'.$link.'">'.$title.'</a></li>';
  }

  $output .= '</ul>';

  return $output;
}
add_shortcode( 'nav-subpages-services', 'smartportal_shortcode_subpages_nav_services' );

/*
* Translation date format
*/

add_filter('option_date_format', 'translate_date_format');
function translate_date_format($format) {
        if (function_exists('icl_translate'))
          $format = icl_translate('Formats', $format, $format);
       return $format;
}

/*
* Size for focus thumbnails
*/
add_image_size('comprendre', 232, 161, true);
add_image_size('publication', 208, 264, true);

/*
 * Widgets
 */

include(get_stylesheet_directory() . '/theme/widgets/facebook-like-box.php');



?>