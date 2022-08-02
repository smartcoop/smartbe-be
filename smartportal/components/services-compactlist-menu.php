<!-- PART: NAV-PROJECTS -->

<?php
if (class_exists('Walker_Featured_Services') != true) {
  class Walker_Featured_Services extends Walker_Nav_Menu {
    // Add classes to ul sub-menus
    function start_lvl( &$output, $depth ) {
      $indent = '  ';
      
      if($depth == 0){
        $classes = "nav nav-chevron red";
      }else{
        $classes = "";
      }      
      $output .= "\n" . $indent . '<ul class="' . esc_attr($classes) . '">' . "\n";
    }
      
    function start_el( &$output, $item, $depth, $args ) {
      global $wp_query; 
      
      $target_entry_id = get_post_meta( $item->ID, '_menu_item_object_id', true );
      $featured_image = get_the_post_thumbnail( $target_entry_id, 'medium');;
      $classes = implode($item->classes, " ");
      
      if($depth == 0){
        $output .= '<li id="nav-menu-item-'. $item->ID . '" class="span3 ' . $classes . '">';
      }else{
        $output .= '<li id="nav-menu-item-'. $item->ID . '" class="' . $classes . '">';
      } 
      
      // Link attributes
      $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
      $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
      $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
      $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
      
      $pattern = '';
      
      if($depth == 0){
        $pattern .= '%1$s<h2><a%2$s>%3$s%4$s%5$s</a></h2>%6$s';
      }else{
        $pattern .= '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s';
      } 
      
      $item_output = sprintf( $pattern,
          $args->before,
          $attributes,
          $args->link_before,
          apply_filters( 'the_title', $item->title, $item->ID ),
          $args->link_after,
          $args->after
      );
      
      if($depth == 0){
        $item_output .= $featured_image ? '<a class="picture" href="' . esc_attr($item->url) . '">' . $featured_image . '</a>' : '';
        $item_output .= '<p>' . esc_attr($item->description) . '</p>';
      }
      
      // Build html
      $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
  }
}
?>

<?php
$walker = new Walker_Featured_Services;
$options = array(
  'theme_location'  => 'featured-services',
  'container'       => 'nav',
  'container_class' => '',
  'container_id'    => 'nav-projects',
  'menu_class'      => 'row',
  'menu_id'         => '',
  'echo'            => true,
  'fallback_cb'     => '',
  'before'          => '',
  'after'           => '',
  'link_before'     => '',
  'link_after'      => '',
  'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
  'depth'           => 3,
  'walker'          => $walker
);

wp_nav_menu($options);
?>