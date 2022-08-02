<?php
/**
 * The Single article
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); ?>

<div class="visible-phone mobile-nav-bar">
  <a href="<?php echo get_page_link(get_option('page_for_posts')); ?>" class="parent-page"><?php _e("News"); ?></a>
</div>
<div class="container back-link hidden-phone">
  <a class="" href="<?php echo get_page_link(get_option('page_for_posts')); ?>">&lt; <?php _e("All news", "smartportal") ?></a>
</div>

<?php if (have_posts()): ?>
<?php
while(have_posts()): 
  the_post();
  $postid = get_the_ID();
  ?>
<article id="content" role="main" class="container">
  <div class="row">
    <div class="span4 hidden-phone">
      <?php
      $args = array (
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'post',
        'posts_per_page' => 8
      );
      $latest_news = new WP_Query( $args );
      
      if ( $latest_news->have_posts() ):
      ?>
        <ul class="post-list nav-latest-news">
          <?php
          while ( $latest_news->have_posts() ) :
          $latest_news->the_post();
          ?>
          <li <?php if ( $postid == get_the_ID() ) { ?>class="current"<?php } ?>>
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
            <span classs="muted"><?php the_time(get_option('date_format')); ?></span>
          </li>
          <?php
          endwhile;
          ?>
        </ul>
      <?php endif; ?>
      
      <?php wp_reset_query(); ?>
      
      <div class="widgets-col">      
        <?php get_template_part("components/blog-entry-sidebar"); ?>
      </div>
      
    </div>
    <div class="span8">
      <?php
      if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. 
      ?>
        <div class="featured-image">
            <?php
            the_post_thumbnail('post-image');
            ?>
        </div>
      <?php
      }
      ?>
      <div class="blog-entry">
        <header class="page-leader">
          <h1 class="post-title"><?php the_title(); ?></h1>
          <span class="date">
            <?php
              $categories = get_the_category();
            ?>
            
            <?php if( get_the_category() && $categories[0]->cat_name != "Uncategorized" ) {
              the_category(', '); ?> - 
            <?php
            }
            ?>
            
            <?php the_time(get_option('date_format')); ?>
          </span>  
        </header>
        <div class="article clearfix">
          <?php if(smartportal_get_the_intro()): ?>
            <p class="lead"><?php echo smartportal_get_the_intro(); ?></p>
          <?php endif; ?>
          <?php the_content(); ?>
          <!-- AddThis Button BEGIN 
          <div class="addthis_toolbox addthis_default_style">
          <a class="addthis_button_facebook_share" fb:share:layout="button_count"></a>
          <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
          <a class="addthis_button_linkedin_counter"></a>
          <a class="addthis_button_tweet"></a>
          </div>
          <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
          <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-528b6e06367e63a9"></script>
          <!-- AddThis Button END -->
        </div>
      </div>
    </div>
  </div>
</article><!-- /content -->

<?php endwhile; ?>
    
<?php else : ?>
<?php get_template_part('content', 'empty'); ?>
<?php endif; ?>

<?php get_footer(); ?>