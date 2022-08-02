<?php
/**
 * Template Name: Services
 */

get_header();

/* Check if there is a menu for this page */
$menu_name = get_post_meta(get_the_ID(), "menu", true);
if(!$menu_name) $menu_name = get_post_meta(get_the_ID(), "wpcf-menu", true);

?>


<?php
while(have_posts()): the_post(); 

if($post->post_parent){
	$par = get_post($post->post_parent);
	$par2 = get_post($par->post_parent);
	if($par2){ // sub
		if($par2->post_parent){ // sub sub
			$level = 3;
			$id = $par2->post_parent;
		}else{
			$level = 2;
			$id = $par2;
		}
	}else{ // normal
		$level = 1;
		$id = $par;
	}
}else{ // top
	$level = 0;
	$id = $post->ID;
}
?>

<?php if($post->post_parent): ?>
  <div class="visible-phone mobile-nav-bar">
    <a href="<?= get_permalink($post->post_parent) ?>" class="parent-page"><?= ( get_post_meta($post->post_parent, 'wpcf-label-nav-mobile', true) ? : get_the_title( $post->post_parent)) ?></a>
  </div>
<?php endif; ?>

<div id="content" class="container">

	<article>
		
		<!-- SIDEBAR -->
  <div class="row">
      <div class="span9 <?php if($menu_name) echo 'offset3' ?>">
        <header class="page-leader" id="overview">
          <h1>
              <?php
                  if($level == 1){
                      echo get_the_title($par);
                  }elseif($level == 2){
                      echo get_the_title($par2);
                      echo '<br>';
                      echo '<span class="muted">' . get_the_title() . '</span>';
                  }elseif($level == 3){
                      echo get_the_title($par2->post_parent);
                      echo '<br>';
                      echo '<span class="muted">' . get_the_title() . '</span>';
                  }else{
                      the_title();
                  }
              ?>
          </h1>
        </header>
      </div>
    </div>
    <!-- /SIDEBAR -->
    
    <div class="row">
    
      <!-- SECTION NAV -->
      <?php
      if($menu_name){
        ?>
        <div class="span3 hidden-phone">
          <nav class="section-nav">          
          <?php
          $args = array(
            'menu'  => $menu_name,
            'container'       => '', 
            'menu_class'      => 'nav nav-chevron', 
            'echo'            => true,
            'fallback_cb'     => false,
            'depth'           => 2);
          wp_nav_menu($args);
          ?>
          </nav>
        </div>
        <?php
      }
      ?> 
      <!-- / SECTION NAV -->
  
      <!-- SERVICES CONTENT -->	
      <div class="span9">
        <div class="article">
          <?php if(smartportal_get_the_intro()): ?>
            <p class="lead"><?php echo smartportal_get_the_intro(); ?></p>
          <?php endif; ?>
          <?php the_content(); ?>
        </div>
      </div>
      <!-- / CONTENT -->
    
    </div>
			
	</article>
		
	<?php get_template_part('nav', 'services'); ?>

</div>

<?php endwhile; ?>
<?php get_footer(); ?>