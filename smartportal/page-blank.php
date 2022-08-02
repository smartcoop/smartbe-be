<?php
/*
Template Name: Blank
*/

get_header(); ?>
<?php //if(is_page('1680')){?>
	<!--<a href="https://smartbe.be/en/general-assembly-2019/"><img src="https://smartbe.be/wp-content/uploads/2019/05/slider_AG_1200_500.jpg" alt="General Assembly 2019"></a>-->
<?php //}?> 
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
        <div class="span12">
          <?php the_content(); ?>
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