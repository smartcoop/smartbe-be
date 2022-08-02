<?php
/**

Template Name: Full Width

 */

get_header(); ?>

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
          <header class="page-leader" id="overview">
            <h1><?php the_title(); ?></h1>
            <?php if(smartportal_get_the_intro()): ?>
              <p class="lead"><?php echo smartportal_get_the_intro(); ?></p>
            <?php endif; ?>
          </header>
          <div class="article">
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