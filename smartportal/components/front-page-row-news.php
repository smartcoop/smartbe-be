<div id="front-page-row-news">
  <?php
  // get sticky posts, then get other posts to fill up
  $sticky_array = get_option('sticky_posts');
  
  if (!empty( $sticky_array)) {
    $sticky_query = new WP_Query(array(
      'posts_per_page' => 4,
      'post__in'       => get_option('sticky_posts')
    ));
    
    $sticky_count = $sticky_query->found_posts;
  } else {
    $sticky_count = 0;
  }
  
  $regular_query = new WP_Query(array(
    'posts_per_page' => 8 - (2 * $sticky_count),
    'post__not_in'  => get_option('sticky_posts')
  ));
  ?>
  <div class="row">
    <section class="latest-news span8">
      <h2 class="visible-phone">Latest News</h2>
      
      <div class="row">
        <?php if (!empty( $sticky_array)) : ?>
          <?php while ($sticky_query->have_posts()) : $sticky_query->the_post(); ?>
            <?php get_template_part('components/blog-card'); ?>
          <?php endwhile; ?>
        <?php endif; ?>
        
        <?php while ($regular_query->have_posts()) : $regular_query->the_post(); ?>
          <?php get_template_part('components/blog-card'); ?>
        <?php endwhile; ?>
        
        <footer class="span8">
          <ul class="nav nav-chevron inline red">
            <li>
              <a href="/blog"><?php _e('Read our blog', 'smartportal') ?></a>
            </li>
          </ul>
        </footer>
      </div>
      
      <hr class="page-divider visible-phone">
    </section>
    
    <!-- WIDGETS -->
    <div class="span4">
      <div class="widgets-col">
        <?php dynamic_sidebar('front-page-row-news-widgets'); ?>
      </div>
    </div>  
    <!-- / WIDGETS -->
  </div>
</div>