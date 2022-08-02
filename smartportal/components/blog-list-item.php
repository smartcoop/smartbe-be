<article class="blog-entry clearfix">
  <header class="page-leader">
    <div class="blog-entry-img">
      <?php if ( get_the_category() ) : ?>
      
        <?php foreach (get_the_category() as $cat) : ?>
          <?php if (z_taxonomy_image_url($cat->term_id)) { ?>
          <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" />
          <?php } else { ?>
          <div class="timeline-img-placeholder"></div>
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
      
      <?php the_time(get_option('date_format')); ?>
    </span>
  </header>
  <div class="article clearfix">
  <?php the_excerpt(); ?>
  </div>
</article>