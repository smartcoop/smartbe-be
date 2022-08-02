<?php /* Template Name: Galerie Meyers */ ?>

<?php
/**
 * The template for displaying default page template
 *
 * An optional menu can be displayed on the left.
 *
 */

get_header(); 


/* Check if there is a menu for this page */
$menu_name = get_post_meta(get_the_ID(), "menu", true);
$display_date = types_render_field("display-last-updated", array("output" => "raw"));

if(!$menu_name) $menu_name = get_post_meta(get_the_ID(), "wpcf-menu", true);


?>

<?php if (have_posts()): ?>

  <?php if($post->post_parent): ?>
    <div class="visible-phone mobile-nav-bar">
      <a href="<?= get_permalink($post->post_parent) ?>" class="parent-page"><?= ( get_post_meta($post->post_parent, 'wpcf-label-nav-mobile', true) ? : get_the_title( $post->post_parent)) ?></a>
    </div>
  <?php endif; ?>

<div id="content" role="main" class="container">

  <?php while(have_posts()): ?>
    <?php the_post(); ?>
  
    <article>
      <div class="row">
        <div class="span9 <?php if($menu_name) echo 'offset3' ?>">
          <header class="page-leader" id="overview">
            <h1><?php the_title(); ?></h1>
            <?php if($display_date) { ?>
  		    <span class="text-muted last-modified"><?php _e("mis à jour le","smartportal"); ?> <?php the_date(get_option('date_format')) ?></span>
            <?php } ?>
          </header>
        </div>
      </div>
      <div class="row">
        <?php
        if($menu_name){
          ?>
          <div class="span4 hidden-phone">
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
				<?php 
				
			
		
			if(is_page('11514')):  ?>
				<div class="storify"><iframe src="//storify.com/SMartBe/smart-in-progress/embed?header=false&border=false" width="100%" height="750" frameborder="no" allowtransparency="true"></iframe><script src="//storify.com/SMartBe/smart-in-progress.js?header=false&border=false"></script><noscript>[<a href="//storify.com/SMartBe/smart-in-progress" target="_blank">View the story "SMart in Progress" on Storify</a>]</noscript></div>
			<?php
				endif; 
			?>
				
			
          </div>
          <?php
        }
        ?> 
        <div class="span12">
          <div class="article">
          <?php if(smartportal_get_the_intro()): ?>
            <p class="lead"><?php echo smartportal_get_the_intro(); ?></p>
          <?php endif; ?>
          <?php the_content(); ?>
          </div>
        </div>
      </div>
      
    </article>
  
  <?php endwhile; ?>
  
  <?php //get_sidebar('subfooter'); ?>

</div><!-- /content -->

<?php else : ?>
  <?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>