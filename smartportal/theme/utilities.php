<?php

/** 
 * UTILITIES
 * 
 * A collection of utilities functions
 *
 */
 function hide_email($email)

{ $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';

  $key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999);

  for ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];

  $script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';

  $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';

  $script.= 'document.getElementById("'.$id.'").innerHTML="<a href=\\"mailto:"+d+"\\">"+d+"</a>"';

  $script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")"; 

  $script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';

  return '<span id="'.$id.'">[javascript protected email address]</span>'.$script;

}
function shuffle_assoc(&$array) {
        $keys = array_keys($array);

        shuffle($keys);

        foreach($keys as $key) {
            $new[$key] = $array[$key];
        }

        $array = $new;

        return true;
    }
/**
 * Returns a "Continue Reading" link for excerpts
 */
if(!function_exists('smart_continue_reading_link')){
  function smart_continue_reading_link() {
  	return '<div class="read-more"><a href="'. esc_url( get_permalink() ) . '"><span>' . __( 'Read more', 'smartportal' ) . '</span> ></a></div>';
  }
}

/**
 * Returns the excerpt of a post, without a "Continue Reading" link
 */
function smartportal_raw_excerpt() {
  return str_replace(smart_continue_reading_link(), '', get_the_excerpt());
}

/**
 * Returns the intro of a post
 * 
 * @return string The intro
 */
function smartportal_get_the_intro()
{
  // Checks if there is an intro
  preg_match('/\[intro\](.*)\[\/intro\]/is', get_the_content(), $matches);
  
  // Returns the intro
  if (isset($matches[1])) return trim(strip_tags($matches[1], '<a><strong><b><em><i><span><u>'));
  
  return FALSE;
}


/**
 * Returns the site url with or without wpml
 *
 * @return string Site url
 */
if(!function_exists('smart_siteurl')){
  function smart_siteurl(){
    if(function_exists('icl_get_home_url')){
      return icl_get_home_url();
    }else{
      return get_bloginfo('url');
    }
  }
}

/**
 * Returns the slug of a page, using its ID
 */
function smartportal_get_slug($id) {
  $post_data = get_post($id, ARRAY_A);
  $slug = $post_data['post_name'];
  
  return $slug;
}


/**
 * Special Walker to add description on entries of the Primary Nav
 *
 */
 
class Walker_Primary_Nav extends Walker_Nav_Menu
{
	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
		$class_names = ' class="span2 ' . esc_attr( $class_names ) . '"';

		//$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
		$output .= $indent . '<li ' . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'><span>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</span>';
		$item_output .= '<small>' . $item->description . '</small>';
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}

/**
 * Special Walker for SMartbar
 */

class SMartbar_Walker_Nav_Menu extends Walker_Nav_Menu {
 
	function start_lvl( &$output, $depth = 0, $args = array() ) {

		$indent = str_repeat( "\t", $depth );
		$output	   .= "\n$indent<ul class=\"dropdown-menu\">\n";
		
	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$li_attributes = '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = ($args->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;


		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		
		if ( !$element )
			return;
		
		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) ) 
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) ) 
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] ); 
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
				unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);
		
	}
	
}

/**
 * Special Walker for the Services menu
 */

class Walker_Services extends Walker_Nav_Menu {
   function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    global $wp_query;
    
    $indent = ($depth) ? str_repeat("\t", $depth) : '';
    $class_names = $value = '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
    $class_names = ' class="' . esc_attr($class_names) . '"';
    
    $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names . '>';
    
    $attributes = ! empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= ! empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= ! empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= ! empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
    
    $item_output = $args->before;
    
    // Featured image
    $item_output .= apply_filters('menu_item_thumbnail', (isset($args->thumbnail) && $args->thumbnail) ? get_the_post_thumbnail($item->object_id , (isset($args->thumbnail_size)) ? $args->thumbnail_size : 'thumbnail' , $attributes) : '' , $item, $args, $depth);
    
    // Link
    if ($item->menu_order !== 1) {
      $item_output .= '<a' . $attributes . '>';
    }
    
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '<span class="sub">' . $item->description;
    
    if ($item->menu_order !== 1) {
      $item_output .= ' <span class="learn-more">Learn&nbsp;more</span>';
    }
    
    $item_output .= '</span>';
    
    if ($item->menu_order !== 1) {
      $item_output .= '</a>';
    }
    
    $item_output .= $args->after;
    
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

/**
 * Special Walker for the More Services menu
 */
class Walker_More_Services extends Walker_Nav_Menu {
  // Add classes to ul sub-menus
  function start_lvl(&$output, $depth = 0, $args = array()) {
    if ($depth == 0) {
      $classes = 'nav nav-chevron red';
    } else {
      $classes = '';
    }
    
    $output .= "\n" . $indent . '<ul class="' . esc_attr($classes) . '">' . "\n";
  }
  
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    global $wp_query;
    
    $target_entry_id = get_post_meta($item->ID, '_menu_item_object_id', true);
    $classes = implode($item->classes, ' ');
    
    if ($depth == 0) {
      $output .= '<li id="nav-menu-item-'. $item->ID . '" class="span4 ' . $classes . '">';
    } else {
      $output .= '<li id="nav-menu-item-'. $item->ID . '" class="' . $classes . '">';
    }
    
    // Link attributes
    $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
    $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target)     . '"' : '';
    $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn)        . '"' : '';
    $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url)        . '"' : '';
    
    if ($depth == 0) {
      $pattern .= '%1$s<h2><a%2$s>%3$s%4$s%5$s</a></h2>%6$s';
    } else {
      $pattern .= '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s';
    }
    
    $item_output = sprintf(
      $pattern,
      $args->before,
      $attributes,
      $args->link_before,
      apply_filters('the_title', $item->title, $item->ID),
      $args->link_after,
      $args->after
    );
    
    // Build HTML
    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

/**
 * Display navigation to next/previous pages when applicable
 */
if ( ! function_exists( 'smartportal_content_nav' ) ) :
function smart_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'smartportal' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'smartportal' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'smartportal' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif;


/**
 * Cachebusting utility function
 * Returns a date of the last time the file was updated.
 */
 
function getfiledate($path) {
  if( $path[0] != '/' ) { //Checks for the first character in $path is a slash and adds it if it isn't. 
	  $path = '/' . $path;
  }
  return date('U', filemtime( '/' . $path ));
}
/* ****  */

			



?>