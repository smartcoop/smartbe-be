<?php

/**
 * The template for displaying default page template
 *
 * An optional menu can be displayed on the left.
 *
 */
/*
 
Template Name: Pages AGs 2021

*/

get_header();

global $post;
// get pods object
$mypod = pods('formation', $podid);
$podid = $mypod->id();
$title = $mypod->display('title');

?>



<?php if (have_posts()) : ?>

  <?php if ($post->post_parent) : ?>
    <div class="visible-phone mobile-nav-bar">
      <a href="<?= get_permalink($post->post_parent) ?>" class="parent-page"><?= (get_post_meta($post->post_parent, 'wpcf-label-nav-mobile', true) ?: get_the_title($post->post_parent)) ?></a>
    </div>
  <?php endif; ?>

  <div id="content" role="main" class="container">

    <?php while (have_posts()) : ?>
      <?php the_post(); ?>

      <article>
        <div class="row">
          <div class="span4">
            

          </div>
          <div class="span7">
            <header class="page-leader" id="overview">
              <h1><?php the_title(); ?></h1>
              <h2> <?php echo $yourformation; ?></h2>

            </header>

            <div class="article">
              <?php the_content(); ?>

              <div class="clear-both"></div>

            </div>

          </div>
        </div>

      </article>

    <?php endwhile; ?>

    <?php //get_sidebar('subfooter'); 
    ?>

  </div><!-- /content -->

<?php else : ?>
  <?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>