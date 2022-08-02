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


	<!--<div class="well" align="center">
        	<iframe src="https://www.google.com/calendar/embed?src=cs9cion7l50n8h1hqo49jj7278%40group.calendar.google.com&ctz=Europe/Brussels" style="border: 0" width="100%" height="600" frameborder="0" scrolling="no"></iframe>
		<a class="btn btn-mini btn-primary "  href="https://www.google.com/calendar/ical/cs9cion7l50n8h1hqo49jj7278%40group.calendar.google.com/public/basic.ics"> <i class=" icon-save"></i> ICAL </a>

	</div>
        <hr class="page-divider">-->

  
  <?php if(post_type_exists('home-banner') && $paged < 2){ ?>
    <!-- FEATURES -->
    <div class="focus-row hidden-phone">
    <?php 
     /*  get_template_part('components/banners-cards-list'); */
      ?>
    </div>
    <!-- / FEATURES -->
  <?php }else{ ?>
    <header id="page-title" class="page-leader">
      <h1 class="muted"><?php _e("Actualités", 'smartportal'); ?></h1>
    </header>
  <?php } ?>    
    
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
     // posts_nav_link(' ', '<i class="icon-arrow-left"></i> ' . __('Newer news','smartportal'), __('Older news','smartportal') . ' <i class="icon-arrow-right"></i>');
    ?>
  </div>
  
  <?php //get_sidebar('subfooter'); ?>
</section>
</div><!-- /content -->

<?php else : ?>
<?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>
