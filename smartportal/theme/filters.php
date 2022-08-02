<?php 

/** 
 * FILTERS
 * 
 * Initialize basic filters to preserve constistency between Wordpress 
 * based SMart portals sites 
 *
 */


/**
 * Adds 3 classes to the array of body classes.
 * The first is if the site has only had one author with published posts.
 * The second is if a singular post being displayed
 * The last is the region
 *
 */
function smartportal_body_classes($classes) {
  global $post;
  
	if(function_exists('is_multi_author') && ! is_multi_author())
		$classes[] = 'single-author';

	if(is_singular() && ! is_home())
		$classes[] = 'singular';
  
  if(is_page() && !is_front_page()){ // Add page slug in body classes
    $classes[] = 'slug-' . $post->post_name;
  }
  
  if(get_option('country_code')){ // Add page slug in body classes
    $classes[] = 'region-' . get_option('country_code');
  }
  
	return $classes;
}
add_filter('body_class', 'smartportal_body_classes');


/**
 * Sets the post excerpt length to 40 words.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 */
function smartportal_excerpt_length( $length ) {
	return 40;
}
add_filter('excerpt_length', 'smartportal_excerpt_length');


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and smart_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 */
function smartportal_auto_excerpt_more( $more ) {
	return ' &hellip;' . smart_continue_reading_link();
}
add_filter('excerpt_more', 'smartportal_auto_excerpt_more');


/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 */
function smartportal_custom_excerpt_more($output) {
	if (has_excerpt() && ! is_attachment()) {
		$output .= smart_continue_reading_link();
	}
	return $output;
}
add_filter('get_the_excerpt', 'smartportal_custom_excerpt_more');


?>