<?php

// Imported form Bones project

/*
This file handles the admin area and functions.
You can use this file to make changes to the
dashboard. Updates to this page are coming soon.
It's turned off by default, but you can call it
via the functions file.

Developed by: Eddie Machado
URL: http://themble.com/bones/

Special Thanks for code & inspiration to:
@jackmcconnell - http://www.voltronik.co.uk/
Digging into WP - http://digwp.com/2010/10/customize-wordpress-dashboard/

*/

/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
	// remove_meta_box('dashboard_right_now', 'dashboard', 'core');    // Right Now Widget
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core'); // Comments Widget
	// remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');  // Incoming Links Widget
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');         // Plugins Widget

	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');  // Quick Press Widget
	// remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');   // Recent Drafts Widget
	remove_meta_box('dashboard_primary', 'dashboard', 'core');         //
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');       //

	// removing plugin dashboard boxes
	remove_meta_box('yoast_db_widget', 'dashboard', 'normal');         // Yoast's SEO Plugin Widget

	/*
	have more plugin widgets you'd like to remove?
	share them with us so we can get a list of
	the most commonly used. :D
	https://github.com/eddiemachado/bones/issues
	*/
}
// removing the dashboard widgets
add_action('admin_menu', 'disable_default_dashboard_widgets');


/************* CUSTOMIZE ADMIN *******************/

/*
I don't really recommend editing the admin too much
as things may get funky if WordPress updates. Here
are a few funtions which you can choose to use if
you like.
*/

// Custom Backend Footer
function bones_custom_admin_footer() {
	_e('<span id="footer-thankyou">Developed by <a href="http://centraldesign.be" target="_blank">Central</a></span>. Built using <a href="http://themble.com/bones" target="_blank">Bones</a>.', 'smartportal');
}

// adding it to the admin area
add_filter('admin_footer_text', 'bones_custom_admin_footer');


// Disable unused TINYMCE stuff

if( !function_exists('smartportal_remove_tinymceformats') ){
	function smartportal_remove_tinymceformats($init) {
		// Add block format elements you want to show in dropdown
		$init['theme_advanced_blockformats'] = 'p,h1,h2,h3,h4';
		// Add elements not included in standard tinyMCE dropdown p,h1,h2,h3,h4,h5,h6
		//$init['extended_valid_elements'] = 'code[*]';
		return $init;
	}
	add_filter('tiny_mce_before_init', 'smartportal_remove_tinymceformats' );
}

if( !function_exists('smartportal_editor_mce_buttons') ){
  function smartportal_editor_mce_buttons($buttons) {
    return array(
    "formatselect", "bold", "italic", "link", "unlink", "separator", "separator", "bullist", "numlist", "blockquote", "strikethrough", "separator", "wp_adv");
  }
  add_filter("mce_buttons", "smartportal_editor_mce_buttons", 0);
}

if( !function_exists('smartportal_editor_mce_buttons_2') ){
  function smartportal_editor_mce_buttons_2($buttons) {
    // the second toolbar line
    return array(
      "undo", "redo", "separator", "pastetext", "pasteword", "removeformat", "separator", "spellchecker", "separator", "charmap", "separator", "wp_fullscreen"
    );
  }
  add_filter("mce_buttons_2", "smartportal_editor_mce_buttons_2", 0);
}

?>
