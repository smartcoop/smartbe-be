<div class="row">
    <div class="span8">
      <div class="timeline">
      <?php
      $post_counter = 0;
      while(have_posts()): 
        the_post();
        ?>
          <article class="blog-entry clearfix">
            <header class="page-leader">
              <div class="blog-entry-img">
                <?php if ( get_the_category() && function_exists('z_taxonomy_image_url') ) : ?>
                
                  <?php foreach (get_the_category() as $cat) : ?>
                    <?php if ($cat) { ?>
                    <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" />
                    <?php } ?>
                  <?php endforeach; ?>
                
                <?php endif; ?>
              </div>
              <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <span class="date">
                <?php
                  $categories = get_the_category();
                ?>
                
                <?php if( get_the_category() && $categories[0]->cat_name != "Uncategorized" ) {
                  the_category(', '); ?> - 
                <?php
                }
                ?>
                
                <?php the_time(get_option('date_format')); ?> - 
                <?php the_author(); ?>
              </span>
            </header>
            <div class="article clearfix">
            <?php the_excerpt(); ?>
            </div>
          </article>
          <?php $post_counter++; ?>
	      <?php if( $post_counter != count( $posts ) ) echo '<hr class="page-divider">'; ?>
      <?php endwhile; ?>    
      
      </div>
    </div>
    <div class="span4">
      <aside class="blog-sidebar">
        <?php if ( get_the_category_list() ) { ?>
          <ul class="nav nav-chevron red">
            <li><a href="<?php echo get_page_link( 1294 ) ?>"><?php _e('Toutes les actualités', 'smartportal') ?></a></li>
          </ul>
          <ul class="nav nav-chevron">
          <?php wp_list_categories(array('title_li' => '')); ?>
          </ul>
        <?php } ?>
        
        <?php dynamic_sidebar('blog-sidebar'); ?>
      </aside>
    </div>
  </div>
  
  <div class="pager">
    <hr class="page-divider">
    <?php 
      posts_nav_link(' ','<i class="icon-arrow-left"></i> Newer news','Older news <i class="icon-arrow-right"></i>');
    ?>
  </div>