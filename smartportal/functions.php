<?php
/**
 * Smart Master theme
 * Functions and definitions are loaded from /theme/*
 *
 */

global $testingvar;
$testingvar = "XXXXXXXXXX";

include('theme/setup.php'); // Setup the theme
include(get_template_directory().'/type_candidature_ag_2017.php');  
include(get_template_directory().'/type_intervenant_ca_2017.php');
include(get_template_directory().'/type_intervenant_ca_2018.php');  

//post candidatures 2017 en ordre aléatoire et toutes les langues
add_action( 'pre_get_posts', 'generate_random_category_posts', 100 );
function generate_random_category_posts( $query ) {
    if ($query->is_post_type_archive( 'candidature-ca-2017' )) {
        //$query->set( 'orderby', 'rand' );
		$query->query_vars['suppress_filters'] = true;
		$query->set('orderby', 'title');
		$query->set('order', 'ASC');
    }
}
function style_css() {
	$admin_handle = 'style_css';
	$admin_stylesheet = get_template_directory_uri() . '/style.css';
	wp_enqueue_style( $admin_handle, $admin_stylesheet );
}
add_action('admin_print_styles', 'style_css', 11 );

function add_custom_rewrite_rule() {
    // First, try to load up the rewrite rules. We do this just in case
    // the default permalink structure is being used.
    if( ($current_rules = get_option('rewrite_rules')) ) {

        // Next, iterate through each custom rule adding a new rule
        // that replaces 'movies' with 'films' and give it a higher
        // priority than the existing rule.
        foreach($current_rules as $key => $val) {
            if(strpos($key, 'intervenant-ca-2017') !== false) {
                add_rewrite_rule(str_ireplace('intervenant-ca-2017', 'intervenant-AG-2017', $key), $val, 'top');   
            } // end if
			if(strpos($key, 'intervenant-ca-2018') !== false) {
                add_rewrite_rule(str_ireplace('intervenant-ca-2018', 'intervenant-AG-2018', $key), $val, 'top');   
            } // end if
        } // end foreach

    } // end if/else
    // ...and we flush the rules
    flush_rewrite_rules();
} // end add_custom_rewrite_rule
add_action('init', 'add_custom_rewrite_rule');

// Filter pour map form/pods Candidature CA 2021
add_filter('cf7_2_post_filter-candidature_ca_2021-title','filter_candidature_ca_2021_title',10,3);
function filter_candidature_ca_2021_title($value, $post_id, $form_data){
  //$value is the post field value to return, by default it is empty. If you are filtering a taxonomy you can return either slug/id/array.  in case of ids make sure to cast them integers.(see https://codex.wordpress.org/Function_Reference/wp_set_object_terms for more information.)
  //$post_id is the ID of the post to which the form values are being mapped to
  // $form_data is the submitted form data as an array of field-name=>value pairs
  return 'Candidature : '.$form_data['prenom'].' '.$form_data['nom'];
}
add_filter('cf7_2_post_filter-candidature_ca_2021-slug','filter_candidature_ca_2021_slug',10,3);
function filter_candidature_ca_2021_slug($value, $post_id, $form_data){
  return 'Candidature-'.$form_data['prenom'].'-'.$form_data['nom'];
}

// Filter pour map form/pods Candidature CA 2022
add_filter('cf7_2_post_filter-candidature_ca_2022-title','filter_candidature_ca_2022_title',10,3);
function filter_candidature_ca_2022_title($value, $post_id, $form_data){
  return 'Candidature : '.$form_data['prenom'].' '.$form_data['nom'];
}
add_filter('cf7_2_post_filter-candidature_ca_2022-slug','filter_candidature_ca_2022_slug',10,3);
function filter_candidature_ca_2022_slug($value, $post_id, $form_data){
  return $form_data['prenom'].'-'.$form_data['nom'];
}

?>