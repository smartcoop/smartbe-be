<?php
/** 
 * SHORT CODES 
 * 
 * Add some custom tags for posts formatting
 *
 */


/*
 * Intro 
 * Tag used to extract an intro to layout on top of the page
 */ 

function smartportal_shortcode_intro_handler( $atts, $content=null, $code="" ) {
	// We remove the intro in content as it's extracted
	// before to be displayed outside of the article body.
	return '';
}
add_shortcode( 'intro', 'smartportal_shortcode_intro_handler' );


/*
 * nav-subpages
 * Tag used to display a nav element of the children for the current page
 */
function smartportal_shortcode_subpages_nav( $atts, $content=null, $code=""){
	global $post;

	$args = array(
		'child_of' => $post->ID,
		'depth' => 1,
		'echo' => 0,
		'title_li' => null
	);

	$output = '<div class="nav-subpages">';
	$output .= '<hr class="page-divider">';
	$output .= '<ul class="nav nav-chevron">';
	$output .= wp_list_pages($args);
	$output .= '</ul>';
	$output .= '</div>';

	return $output;
}
add_shortcode( 'nav-subpages', 'smartportal_shortcode_subpages_nav' );


// Gallery shortcode

// remove the standard shortcode
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'gallery_shortcode_tbs');

function gallery_shortcode_tbs($attr) {
	global $post, $wp_locale;

	$output = "";

	$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
	$attachments = get_posts($args);
	if ($attachments) {
		$output = '<div class="row-fluid"><ul class="thumbnails">';
		foreach ( $attachments as $attachment ) {
			$output .= '<li class="span2">';
			$att_title = apply_filters( 'the_title' , $attachment->post_title );
			$output .= wp_get_attachment_link( $attachment->ID , 'thumbnail', true );
			$output .= '</li>';
		}
		$output .= '</ul></div>';
	}

	return $output;
}

// Buttons
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'default', /* primary, default, info, success, danger, warning, inverse */
	'size' => 'default', /* mini, small, default, large */
	'url'  => '',
	'text' => '', 
	), $atts ) );
	
	if($type == "default"){
		$type = "";
	}
	else{ 
		$type = "btn-" . $type;
	}
	
	if($size == "default"){
		$size = "";
	}
	else{
		$size = "btn-" . $size;
	}
	
	$output = '<a href="' . $url . '" class="btn '. $type . ' ' . $size . '">';
	$output .= $text;
	$output .= '</a>';
	
	return $output;
}

add_shortcode('button', 'buttons'); 

// Alerts
function alerts( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'alert-info', /* alert-info, alert-success, alert-error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	
	$output = '<div class="fade in alert alert-'. $type . '">';
	if($close == 'true') {
		$output .= '<a class="close" data-dismiss="alert">×</a>';
	}
	$output .= $text . '</div>';
	
	return $output;
}

add_shortcode('alert', 'alerts');

// Block Messages
function block_messages( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'alert-info', /* alert-info, alert-success, alert-error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	
	$output = '<div class="fade in alert alert-block alert-'. $type . '">';
	if($close == 'true') {
		$output .= '<a class="close" data-dismiss="alert">×</a>';
	}
	$output .= '<p>' . $text . '</p></div>';
	
	return $output;
}

add_shortcode('block-message', 'block_messages'); 

// Block Messages
function blockquotes( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'float' => '', /* left, right */
	'cite' => '', /* text for cite */
	), $atts ) );
	
	$output = '<blockquote';
	if($float == 'left') {
		$output .= ' class="pull-left"';
	}
	elseif($float == 'right'){
		$output .= ' class="pull-right"';
	}
	$output .= '><p>' . $content . '</p>';
	
	if($cite){
		$output .= '<small>' . $cite . '</small>';
	}
	
	$output .= '</blockquote>';
	
	return $output;
}

add_shortcode('blockquote', 'blockquotes');

?>