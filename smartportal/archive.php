<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>
<?php if (have_posts()): ?>
<section id="content" role="main" class="container blog-archive-list">
  
  <header id="page-title" class="page-leader">
    <h1 class="muted">
      <?php
        $category = get_the_category(); 
        echo $category[0]->cat_name;
      ?>
    </h1>
  </header>
    
  <div class="row">
    <div class="span8">
      <?php get_template_part("components/blog-list"); ?>
    </div>
    <div class="span4">
      <?php get_template_part("components/blog-list-sidebar"); ?>
    </div>
  </div>
  
  <div class="pager">
    <?php 
      posts_nav_link(' ','<i class="icon-arrow-left"></i> Newer news','Older news <i class="icon-arrow-right"></i>');
    ?>
  </div>
  
  <?php //get_sidebar('subfooter'); ?>
</section>
</div><!-- /content -->

<?php else : ?>
<?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>