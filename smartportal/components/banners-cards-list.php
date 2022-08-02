<?php

$args = array (
  'orderby' => 'id',
  'order' => 'DESC',
  'post_type' => 'home-banner',
  'posts_per_page' => 4
);
$custom_query = new WP_Query( $args );

if ( $custom_query->have_posts() ):
  
 ?>
<div class="row">
  <section class="focus">
    <ul>
    <?php 
      while ( $custom_query->have_posts() ) :
      $custom_query->the_post();
    ?>
    <li class="span3">
      <a href=<?php echo types_render_field("banner-link", array("raw"=>"true")) ?>  class="focus-item clearfix">
      <?php echo types_render_field("banner-artwork", array('size' => 'focus')) ?> 
        <h4><?php the_title(); ?></h4>
        <p><?php echo types_render_field("description", array("raw"=>"true"))  ?></p>
      </a>
    </li>
    <?php 
        endwhile;
    ?>
    </ul>
  </section>
</div>
<?php endif; ?>

<?php wp_reset_query(); ?>